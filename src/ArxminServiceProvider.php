<?php namespace Arxmin;

use Arx\classes\ClassLoader;
use Illuminate\Support\ServiceProvider;
use \Arx\classes\Hook;
use \View, \Config, \App;

class ArxminServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'arxmin');
        $this->loadViewsFrom( __DIR__ . '/../resources/views', 'arxmin');

        # Get Arxmin Config path
        $configPath = __DIR__ . '/../config/arxmin.php';

        # Publish arxmin config to project
        $this->publishes([$configPath => config_path('arxmin.php')], 'arxmin');

        # Merge with default config to override only what you need
        $this->mergeConfigFrom($configPath, 'arxmin');

        # Add Directories
        ClassLoader::addDirectories(array(
            __DIR__ . '/controllers',
            __DIR__ . '/models',
            __DIR__ . '/commands',
            __DIR__ . '/helpers',
            __DIR__ . '/middlewares',
            __DIR__ . '/providers',
            __DIR__ . '/migrations'
        ));

        # Add helpers filters and routes
        include_once __DIR__ . '/helpers.php';
        include_once __DIR__ . '/filters.php';
        include_once __DIR__ . '/routes.php';

        Hook::put('config.app.aliases.Arxmin', 'Arxmin\\facades\\ArxminFacade');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Register Arxmin
         */

        $this->app->bind('arxmin', function ($app) {
            return new Arxmin($app);
        });

        $this->app->bindShared('command.arxmin.migration', function ($app) {
            return new MigrationCommand();
        });

        /**
         * Register hooks
         */
        Hook::register('arxmin::css');
        Hook::register('arxmin::js');
        Hook::register('arxmin::menu');
        Hook::register('arxmin::rightbar');
        Hook::register('arxmin::widgets');
        Hook::register('arxmin::dashboard_widgets');
        Hook::register('arxmin::api.modules');

        $app = $this->app;

        $app['arxmin.modules.data'] = new Post();
        $app['arxmin.modules.labels'] = new Label();
        $app['arxmin.modules.options'] = new Option();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(
            'command.arxmin.migration'
        );
    }

}