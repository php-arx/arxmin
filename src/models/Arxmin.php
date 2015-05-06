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

    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    /**
     * Create a new arxmin instance.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     */
    public function __construct($app = null)
    {
        if(!$app){
            $app = \App::getInstance();
        }

        $this->app = $app;
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
     *
     * @param $credentials
     * @param bool $remember
     * @return bool
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
        return Config::get('app.locales', [Config::get('app.locale', 'en')]);
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

        $base = Config::get('arxmin.paths.theme');

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
        return url('/packages').'/'.Config::get('arxmin.theme').$path;
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
        return url(Config::get('arxmin.prefix').'/'.$path, $parameters, $secure);
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

    public static function getApiUrl()
    {
        return Config::get('arxmin.api.base').'/';
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
    public function user()
    {
        return $this->app->auth->user();
    }
    /**
     * Filters a route for a role or set of roles.
     *
     * If the third parameter is null then abort with status code 403.
     * Otherwise the $result is returned.
     *
     * @param string       $route      Route pattern. i.e: "admin/*"
     * @param array|string $roles      The role(s) needed
     * @param mixed        $result     i.e: Redirect::to('/')
     * @param bool         $requireAll User must have all roles
     *
     * @return mixed
     */
    public function routeNeedsRole($route, $roles, $result = null, $requireAll = true)
    {
        $filterName  = is_array($roles) ? implode('_', $roles) : $roles;
        $filterName .= '_'.substr(md5($route), 0, 6);
        $closure = function () use ($roles, $result, $requireAll) {
            $hasRole = $this->hasRole($roles, $requireAll);
            if (!$hasRole) {
                return empty($result) ? $this->app->abort(403) : $result;
            }
        };
        // Same as Route::filter, registers a new filter
        $this->app->router->filter($filterName, $closure);
        // Same as Route::when, assigns a route pattern to the
        // previously created filter.
        $this->app->router->when($route, $filterName);
    }
    /**
     * Filters a route for a permission or set of permissions.
     *
     * If the third parameter is null then abort with status code 403.
     * Otherwise the $result is returned.
     *
     * @param string       $route       Route pattern. i.e: "admin/*"
     * @param array|string $permissions The permission(s) needed
     * @param mixed        $result      i.e: Redirect::to('/')
     * @param bool         $requireAll  User must have all permissions
     *
     * @return mixed
     */
    public function routeNeedsPermission($route, $permissions, $result = null, $requireAll = true)
    {
        $filterName  = is_array($permissions) ? implode('_', $permissions) : $permissions;
        $filterName .= '_'.substr(md5($route), 0, 6);
        $closure = function () use ($permissions, $result, $requireAll) {
            $hasPerm = $this->can($permissions, $requireAll);
            if (!$hasPerm) {
                return empty($result) ? $this->app->abort(403) : $result;
            }
        };
        // Same as Route::filter, registers a new filter
        $this->app->router->filter($filterName, $closure);
        // Same as Route::when, assigns a route pattern to the
        // previously created filter.
        $this->app->router->when($route, $filterName);
    }
    /**
     * Filters a route for role(s) and/or permission(s).
     *
     * If the third parameter is null then abort with status code 403.
     * Otherwise the $result is returned.
     *
     * @param string       $route       Route pattern. i.e: "admin/*"
     * @param array|string $roles       The role(s) needed
     * @param array|string $permissions The permission(s) needed
     * @param mixed        $result      i.e: Redirect::to('/')
     * @param bool         $requireAll  User must have all roles and permissions
     *
     * @return void
     */
    public function routeNeedsRoleOrPermission($route, $roles, $permissions, $result = null, $requireAll = false)
    {
        $filterName  =      is_array($roles)       ? implode('_', $roles)       : $roles;
        $filterName .= '_'.(is_array($permissions) ? implode('_', $permissions) : $permissions);
        $filterName .= '_'.substr(md5($route), 0, 6);
        $closure = function () use ($roles, $permissions, $result, $requireAll) {
            $hasRole  = $this->hasRole($roles, $requireAll);
            $hasPerms = $this->can($permissions, $requireAll);
            if ($requireAll) {
                $hasRolePerm = $hasRole && $hasPerms;
            } else {
                $hasRolePerm = $hasRole || $hasPerms;
            }
            if (!$hasRolePerm) {
                return empty($result) ? $this->app->abort(403) : $result;
            }
        };
        // Same as Route::filter, registers a new filter
        $this->app->router->filter($filterName, $closure);
        // Same as Route::when, assigns a route pattern to the
        // previously created filter.
        $this->app->router->when($route, $filterName);
    }
}