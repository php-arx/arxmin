<?php namespace Arxmin;

use Illuminate\Support\ServiceProvider;
use Arx\classes\Controller;

use \View,\Lang,\Config;

class ArxminServiceProvider extends ServiceProvider {

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
		$this->package('arx/arxmin');

        include __DIR__.'/filters.php';
        include __DIR__.'/routes.php';
        Lang::addNamespace('arxmin', __DIR__.'/../lang');
        Config::addNamespace('arxmin', __DIR__.'/../config');
        View::addNamespace('arxmin', __DIR__.'/../views');
        View::addNamespace('arx', \Arx::path('views'));
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{

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