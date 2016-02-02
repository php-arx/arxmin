<?php namespace Arxmin;

use Arx\classes\ClassLoader;
use Arx\ServiceProviderTrait;
use Arxmin\models\User;
use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use \Arx\classes\Hook;
use \App;

class ArxminServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Use ServiceProviderTrait helpers to autoload providers and facades
     */
    use ServiceProviderTrait;

    /**
     * The providers autoloaded by this module
     *
     * @var array
     */
    protected $providers = [
        'Pingpong\Modules\ModulesServiceProvider',
        'Collective\Remote\RemoteServiceProvider',
        'Zofe\Rapyd\RapydServiceProvider',
        'Former\FormerServiceProvider'
    ];

    /**
     * The facades that will be autoloaded
     *
     * @var array
     */
    protected $facades = [
        'Arxmin' => 'Arxmin\Arxmin',
        'Module' => 'Pingpong\Modules\Facades\Module',
        'SSH' => 'Collective\Remote\RemoteFacade',
        'Former' => 'Former\Facades\Former',
    ];

    protected $commands = [
        'arxmin:install' => 'Arxmin\commands\InstallCommand'
    ];

    /**
     * Bootstrap the application events.
     *
     * @param Illuminate\Routing\Router|Router $router
     */
    public function boot(Router $router)
    {
        $app = $this->app;

        #Add custom middleware
        $router->middleware('arxmin-auth', 'Arxmin\AuthenticateMiddleware');

        # Register custom auth provider
        $this->app['auth']->extend('arxmin', function() use($app)
        {
            return new AuthProvider($app['hash'], User::class);
        });

        # Load lang and views resources
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'arxmin');
        $this->loadViewsFrom( __DIR__ . '/../resources/views', 'arxmin');

        # Get Arxmin Config path
        $configPath = __DIR__ . '/../config/arxmin.php';

        $this->publishes([
            __DIR__.'/../public' => public_path('packages/arx/arxmin'),
        ], 'public');

        # Publish arxmin config to project
        $this->publishes([$configPath => config_path('arxmin.php')], 'arxmin');

        $this->publishes([
            __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        # Merge with default config to override only what you need
        $this->mergeConfigFrom($configPath, 'arxmin');

        # Autoload Directories
        ClassLoader::addDirectories(array(
            __DIR__ . '/controllers',
            __DIR__ . '/models',
            __DIR__ . '/commands',
            __DIR__ . '/helpers',
            __DIR__ . '/middlewares',
            __DIR__ . '/providers',
            __DIR__ . '/migrations',
            __DIR__ . '/events',
        ));

        # Add filters and routes on boot
        include_once __DIR__ . '/routes.php';
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        /**
         * Add usefull helpers on register
         */
        include_once __DIR__ . '/helpers.php';

        /**
         * Register Arxmin with current app setting
         *
         */
        $this->app->bind('arxmin', function ($app) {
            return new Arxmin($app);
        });

        /**
         * Register common arxmin hooks
         */
        Hook::register('arxmin::css');
        Hook::register('arxmin::js');
        Hook::register('arxmin::menu');
        Hook::register('arxmin::rightbar');
        Hook::register('arxmin::widgets');
        Hook::register('arxmin::api.modules');

        $this->registerCommands();
        $this->registerProviders();
        $this->registerFacades();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array(
            'arxmin'
        );
    }

}