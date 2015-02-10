<?php namespace Arxmin;

use Arx;
use Arx\classes\File, Arx\classes\Hook;
use Symfony\Component\Finder\Finder;
use Config, Schema, Crypt, Hash, Lang;

class Arxmin extends Arx\classes\Singleton
{

    protected $menu = array();

    private static $isInstalled = false;


	private static $_aInstances = array();

	public static function getInstance(){
		$sClass = get_called_class();

		if (!isset(self::$_aInstances[$sClass])) {
			self::$_aInstances[$sClass] = new $sClass;
		}

		return self::$_aInstances[$sClass];
	}

    /**
     * Construct and Arxmin Endpoint
     *
     * @param $endpoint
     * @param array $data
     */
    public static function api($endpoint, $data = array()){
        return Config::get('arxmin::config.api.base').'/'.$endpoint;
    }

	/**
	 *
	 *
	 * @param $credentials
	 * @param bool $remember
	 */
	public static function attempt($credentials, $remember = false){

		#1. try to get the super user admin

		$email = Arxmin::getOption( 'arxmin.super_email' );
		$password = Arxmin::getOption( 'arxmin.super_password' );

		if ( $credentials['email'] == $email && $password == Hash::make( $credentials['password'] ) ) {
			Session::put( 'super_admin', true );
			return true;
		}


	}


    /**
     * addPlugin to the page
     *
     * @todo more reflexive paths
     */
    public static function loadPlugin(){

        $files = func_get_args();

        if(count($files) == 1 && is_array($files[0])){
            $files = $files[0];
        }

        # 1. Check if plugin exist
        foreach ($files as $file) {

            $min = '';

            if(!Config::get('app.debug')){
                $min = '.min.';
            }

            $css = '/plugins/'.$file.'/'.$file.$min.'.css';
            $js = '/plugins/'.$file.'/'.$file.$min.'.js';

            if(is_file(self::getThemePath($css))){
                Hook::add('arxmin::css', self::getThemeUrl($css));
            };

            if(is_file(self::getThemePath($js))){
                Hook::add('arxmin::js', self::getThemeUrl($js));
            }
        }
    }

    public static function getLangs()
    {
        return Config::get('app.locales');
    }

    /**
     * Set Option
     */
    public static function setOption($name, $value, $context = null, $type = null)
    {
        return Option::set($name, $value, $context, $type);
    }

    /**
     * Get Option
     *
     * @param $name
     * @param null $default
     * @param bool $decode
     * @return mixed|string
     */
    public static function getOption($name, $default = null, $decode = true){
        return Option::get($name, $default, $decode);
    }

    /**
     * Get appsolute path of the current theme
     * @param null $path
     * @return string
     */
    public static function getThemePath($path = null){

        $base = Config::get('arxmin::config.paths.theme');

        if (!is_dir($base)) {
            $base = base_path('/workbench/arx/arxmin/public/dist');
        }

        return $base.$path;
    }

    /**
     * Get url of the current theme
     *
     * @param null $path
     * @return string
     */
    public static function getThemeUrl($path = null){
        return url('/packages').'/'.Config::get('arxmin::config.theme').$path;
    }

    /**
     * Generate a url for the application.
     *
     * @param  string  $path
     * @param  mixed   $parameters
     * @param  bool    $secure
     * @return string
     */
    public static function url($path = null, $parameters = array(), $secure = null)
    {
        return url(Config::get('arxmin::config.prefix').'/'.$path, $parameters, $secure);
    }

    /**
     * @param $data
     */
    public static function install($data){

        if ( ! self::isInstalled()) {

        }

        return false;
    }

    /**
     * Check if User is Auth
     */
    public static function isAuth()
    {
        dd(\Auth::check());
    }

    /**
     * Check if Arxmin is installed
     */
    public static function isInstalled()
    {
        if (self::$isInstalled) {
           return true;
        }

        if( Schema::hasTable('users') && Schema::hasTable('roles') ){
            self::$isInstalled = true;
            return true;
        }

        return false;
    }

    public static function getMenu()
    {
        $instance = self::getInstance();

        $finder = new Finder();

        $menu = self::getDbMenu();

        $appPath = Config::get('arxmin::config.paths.workbench');

        /*$results = $finder->name('manifest.json')->in($appPath);

        foreach($results as $file){

            $json = json_decode(file_get_contents($file->getRealpath()), true);
            $menu[$file->getRelativePath()] = $json;
        }*/

        $instance->menu = $menu;

        return $menu;

    }

    /**
     * Get Menu
     *
     * @return string
     */
    public static function getDbMenu(){

        return Lang::get('arxmin::menu');
    }

    /**
     * Retrieve current available widgets
     *
     * @todo make widgets structure
     */
    public static function getWidgets()
    {
        return array(
            array(
                'name' => 'Lang Manager',
                'type' => 'iframe',
                'link' => '/arxmin/dashboard/lang'
            ),
        );
    }
}