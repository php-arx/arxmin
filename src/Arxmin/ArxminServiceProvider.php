<?php namespace Arxmin;

use Arx\classes\ClassLoader;
use Illuminate\Support\ServiceProvider;
use Arx\classes\Hook;
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
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'arxmin');
        $this->loadViewsFrom( __DIR__ . '/../views', 'arxmin');

        $configPath = __DIR__ . '/../config/config.php';
        $this->publishes([$configPath => config_path('config.php')], 'arxmin::config');
        $this->mergeConfigFrom($configPath, 'arxmin::config');

        # Add Directories
        ClassLoader::addDirectories(array(
            __DIR__ . '/controllers',
            __DIR__ . '/models',
            __DIR__ . '/commands',
            __DIR__ . '/helpers',
            __DIR__ . '/providers',
            __DIR__ . '/migrations'
        ));

        include_once __DIR__ . '/../start/global.php';


        if (App::runningInConsole()) {
            include_once __DIR__ . '/../start/artisan.php';
        }


        include_once __DIR__ . '/../helpers.php';
        include_once __DIR__ . '/../filters.php';
        include_once __DIR__ . '/../routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

        /**
         * Register a new hook
         */
        Hook::register('arxmin::css');
        Hook::register('arxmin::js');
        Hook::register('arxmin::menu');
        Hook::register('arxmin::rightbar');
        Hook::register('arxmin::widgets');
        Hook::register('arxmin::dashboard_widgets');
        Hook::register('arxmin::api.modules');

        $app = $this->app;

        $app['arxmin.modules.data'] = new Data();
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
        return array();
    }

}