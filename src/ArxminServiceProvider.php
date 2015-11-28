<?php namespace Arxmin;

use Arx\classes\ClassLoader;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Routing\Router;
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


    /**
     * Register the providers.
     */
    public function registerProviders()
    {
        foreach ($this->providers as $provider) {
            $this->app->register($provider);
        }
    }
    /**
     * Register the facades.
     */
    public function registerFacades()
    {
        AliasLoader::getInstance($this->facades);

        # Auto-register alias
        foreach ($this->facades as $alias => $name) {
            AliasLoader::getInstance()->alias($alias, $name);
        }
    }

    /**
     * Bootstrap the application events.
     *
     * @param Illuminate\Routing\Router $router
     */
    public function boot(Router $router)
    {
        #Add custom middleware
        $router->middleware('arxmin-auth', 'Arxmin\AuthenticateMiddleware');

        $this->app['auth']->extend('arxmmin-auth',function()
        {
            return new \Arxmin\AuthProvider();
        });

        # Load lang and views resources
        $this->loadTranslationsFrom(__DIR__ . '/../resources/lang', 'arxmin');
        $this->loadViewsFrom( __DIR__ . '/../resources/views', 'arxmin');

        # Get Arxmin Config path
        $configPath = __DIR__ . '/../config/arxmin.php';

        # Publish arxmin config to project
        $this->publishes([$configPath => config_path('arxmin.php')], 'arxmin');

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
            __DIR__ . '/migrations'
        ));

        # Register custom auth provider
        $this->app['auth']->extend('arxmin',function()
        {
            return new AuthProvider(new User);
        });

        # Add filters and routes
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
         * need to load helpers before other third-parties vendors
         */
        include_once __DIR__ . '/helpers.php';

        /**
         * Register Arxmin
         */
        $this->app->bind('arxmin', function ($app) {
            return new Arxmin($app);
        });

        /**
         * Register hooks
         */
        Hook::register('arxmin::css');
        Hook::register('arxmin::js');
        Hook::register('arxmin::menu');
        Hook::register('arxmin::rightbar');
        Hook::register('arxmin::widgets');
        Hook::register('arxmin::api.modules');

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