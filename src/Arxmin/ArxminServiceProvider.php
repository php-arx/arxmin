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

        Lang::addNamespace('arxmin', __DIR__.'/../lang');
        Config::addNamespace('arxmin', __DIR__.'/../config');
        View::addNamespace('arxmin', __DIR__.'/../views');

        include_once __DIR__.'/../start/global.php';
        include_once __DIR__.'/../start/artisan.php';
        include_once __DIR__.'/../helpers.php';
        include_once __DIR__.'/models/LangModel.php';

        include_once __DIR__.'/../filters.php';
        include_once __DIR__.'/../routes.php';
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
		return array('Zizaco\Confide\ConfideServiceProvider');
	}

}