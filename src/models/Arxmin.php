<?php namespace Arxmin;

use Arr;
use Arx;
use Arx\classes\Exception;
use Arx\classes\File, Arx\classes\Hook;
use Arx\classes\Utils;
use Config, Lang;
use Illuminate\Support\Facades\Auth;
use Schema;

/**
 * Class Arxmin
 *
 * Contains all the business logic of the package
 *
 * @package Arxmin
 */
class Arxmin extends Arx\classes\Singleton
{
    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
    * Admin user logged
    */
    public static $user = null;

    protected $menu = array();

    private static $isInstalled = false;

	private static $_aInstances = array();

    public static $currentModule = null;

    /**
     * Create a new arxmin instance.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    public function __construct($app = null)
    {
        if(!$app){
            $app = \App::getInstance();
        }

        $this->app = $app;
    }

    /**
     * Get Laravel Auth (5.2 or 5.0 compatibility)
     */
    public static function getAuth()
    {
        $auth = auth();

        if (method_exists($auth, 'guard')) {
            return $auth->guard('arxmin');
        } else {
            return Auth::driver('arxmin');
        }
    }

    /**
     * Get last called instance
     *
     * @return mixed
     */
	public static function getInstance(){
		$sClass = get_called_class();

		if (!isset(self::$_aInstances[$sClass])) {
			self::$_aInstances[$sClass] = new $sClass(app());
		}

		return self::$_aInstances[$sClass];
	}

    /**
     * Construct and Arxmin Endpoint
     *
     * @param $endpoint
     * @param array $data
     * @return string
     */
    public static function api($endpoint, $data = array()){
        return Config::get('arxmin.api.base').'/'.$endpoint;
    }


    /**
     * addPlugin to the page
     *
     * @todo more reflexive paths
     */
    public static function loadPlugin($pluginOrArray){

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

    /**
     * Get availables langs
     *
     * @param string $type
     * @return mixed
     */
    public static function getLocales($type = 'array')
    {
        $locales = Config::get('app.locales');

        if ($type == 'select') {
            $data = [];
            foreach ($locales as $key => $item) {
                $data[$key] = $item['name'];
            }
            return $data;
        } elseif ($type == 'keys') {
            return array_keys($locales);
        }

        return $locales;
    }

    /**
     * Get a list of available modules from Arx.io
     * @param array $params
     * @return array|bool|mixed
     * @throws \Exception
     */
    public static function getModulesAvailables($params = ['type' => 'array'])
    {
        Arr::mergeWithDefaultParams($params);

        $result = Utils::getJSON('http://www.arx.io/api/v1/modules', true);

        if ($params['type'] == 'list') {
            return array_column($result, 'name');
        } elseif ($params['type'] == 'infolist') {
            return array_map(function($item){
                return $item['name'] . ' : ' . $item['description'];
            }, $result);
        }

        return $result;
    }

    /**
     * Set Option
     */
    public static function setOption($name, $value, $context = null, $type = null)
    {
        return Option::setEntry($name, $value, $context, $type);
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
        return Option::getEntry($name, $default, $decode);
    }

    /**
     * Check if Arxmin as a particular option
     *
     * @param $name
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public static function hasOption($name){
        return Option::hasEntry($name);
    }

    /**
     * Get appsolute path of the current arxmin theme
     *
     * @deprecated please use getAssetsPath instead
     * @param null $path
     * @return string
     */
    public static function getThemePath($path = null){
        return self::getAssetsPath($path);
    }

    /**
     * Get Assets path
     *
     * @param null $path
     * @return string
     */
    public static function getAssetsPath($path = null){

        $base = Config::get('arxmin.paths.theme');

        if (!is_dir($base)) {
            $base = base_path('/workbench/arx/arxmin/public/dist');
        }

        return $base.$path;
    }

    /**
     * Get url of the current arxmin theme
     *
     * @deprecated please use getAssetsUrl instead
     * @param null $path
     * @return string
     */
    public static function getThemeUrl($path = null){
        return self::getAssetsUrl($path);
    }

    /**
     * Get Assets full url
     *
     * @param null $path
     * @return string
     */
    public static function getAssetsUrl($path = null, $params = [], $secure = null){
        return url('/packages', $params, $secure).'/'.Config::get('arxmin.theme').$path;
    }

    /**
     * Generate an url for the application.
     *
     * @param  string  $path
     * @param  mixed   $parameters
     * @param  bool    $secure
     * @return string
     */
    public static function url($path = null, $parameters = array(), $secure = null)
    {
        return url(Config::get('arxmin.prefix').'/'.$path, $parameters, $secure);
    }

    /**
     * Check if Arxmin User is Auth
     */
    public static function isAuth()
    {
        if (self::$user) {
            return self::$user;
        }

        return false;
    }

    /**
     * Check if Arxmin is installed
     */
    public static function isInstalled()
    {
        if (self::$isInstalled) {
            return true;
        }

        if (!Schema::hasTable('arxmin_options')) {
            Throw new Exception('Please run arxmin:install command first');
        }

        self::$isInstalled = true;

        return true;
    }

    /**
     * Get Arxmin Menu and assign to current instance
     *
     * @return array|string
     */
    public static function getMenu()
    {
        $instance = self::getInstance();

        $menu = Lang::get('arxmin::menu');

        $menu = array_merge(Hook::get('arxmin::menu'), $menu);

        $menu = Arr::sort($menu, 'position');

        $instance->menu = $menu;

        return $menu;
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

    public static function getApiUrl()
    {
        return Config::get('arxmin.api.base').'/';
    }

    /**
     * Get modules
     *
     * @return mixed
     */
    public static function getModules()
    {
        $modules = Module::getOrdered();

        return $modules;
    }

    /**
     * Guess the current module name
     *
     * @param string $type
     * @return string
     * @throws \Exception
     */
    public static function getCurrentModule($type = 'name')
    {
        if (!self::$currentModule) {
            self::guestCurrentModule();
        }

        try {
            $module = Module::getUsedNow();
        } catch (Exception $e) {
            return false;
        }

        if ($type == 'name') {
            return $module->name;
        } elseif($type == 'path'){
            return $module->path;
        } else {
            return $module;
        }
    }

    /**
     * Method to guess the current module used
     *
     * @todo : improve this method
     */
    public static function guestCurrentModule()
    {
        $aDebug = debug_backtrace(1);
        $modules = \Module::all();

        if(isset($aDebug[1])){
            foreach ($aDebug as $item) {
                if (isset($item['file'])) {
                    foreach ($modules as $module) {
                        if (strpos($item['file'], $module->path)) {
                            self::$currentModule = $module->name;
                            Module::setCurrent($module->name);
                            break;
                        }
                    }
                }
            }
        } else {
            Throw new \Exception('Cannot set current module dynamically');
        }
    }

    /**
     * Checks if the current user has a role by its name
     *
     * @param string $name Role name.
     *
     * @return bool
     */
    public function hasRole($role, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->hasRole($role, $requireAll);
        }
        return false;
    }

    /**
     * Check if the current user has a permission by its name
     *
     * @param string $permission Permission string.
     *
     * @return bool
     */
    public function can($permission, $requireAll = false)
    {
        if ($user = $this->user()) {
            return $user->can($permission, $requireAll);
        }
        return false;
    }

    /**
     * Get the currently authenticated user or null.
     *
     * @return Illuminate\Auth\UserInterface|null
     */
    public function user(\Auth $auth)
    {
        return $auth->driver('arxmin')->getUser();
    }

    /**
     * Register a new menu link
     * @param $data
     * @param array $params
     * @param string $ref
     * @return array
     * @throws \Exception
     */
    public static function registerMenu($data = [
        'name' => null,
        'link' => null,
        'type' => 'module',
        'ico' => 'fa-pencil'
    ], $params = ['position' => null], $ref = 'arxmin::menu')
    {
        $params = Arr::mergeWithDefaultParams($params);

        $menu = Hook::get($ref);

        if ($params['position'] !== null) {
            Arr::insert($menu, [$data], $params['position']);
        } else {
            $menu[] = $data;
        }

        Hook::set($ref, $menu);

        return Hook::get($ref);
    }

    /**
     * Translate language of the interface
     *
     * @param null $id
     * @param array $parameters
     * @param string $domain
     * @param null $locale
     * @return string
     */
    public static function trans($id = null, $parameters = array(), $domain = 'messages', $locale = null){
        return trans($id, $parameters, $domain, $locale);
    }
}