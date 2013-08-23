<?php namespace Arx\Arxmin;

use Illuminate\Support\ServiceProvider;
use Arx\facades\View;
use Arx\classes\Controller;

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
        View::addNamespace('arxmin', __DIR__.'/../../views');
        View::addNamespace('arx', \Arx::path().'/views');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
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