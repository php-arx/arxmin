<?php namespace Arxmin;

# Override Schema with Arxmin Schema Model
use Arxmin\SchemaModel as Schema;

use Request, Response, Input, DB, Hash, Redirect;

class TestController extends BaseController {

    public $layout = 'arxmin::install';

    public function __construct(){

        # Protect with csrf
        $this->beforeFilter('arxmin-csrf', array('only' => array('getCheck', 'getInfo')));
    }

    /**
     * Show install page
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        return $this->getInstall();
    }

    public function getInstall(){
        try {
            $user = UserModel::exists();
        } catch (\Exception $e) {
            $user = array('first_name' => null);
        }

        $requirements = $this->anyCheck();

        $ngApp = 'InstallModule';

        $data = get_defined_vars();

        return $this->viewMake('arxmin::install', $data);
    }

    public function postInstall(){

        $data = Input::all();

        if(DB::connection()->getDatabaseName())
        {
            echo "connected sucessfully to database ".DB::connection()->getDatabaseName();
        }

        if(!Schema::hasTable('arxmin')){
            Schema::create('arxmin', function ($table) {
                $table->increments('id');
                $table->string('name');
                $table->text('value')->nullable();
                $table->string('type')->default('string');
                $table->string('context')->nullable();
                $table->timestamps();
            });
        }

        # Set Super Admin User

        Arxmin::set('arxmin.super_username', Input::get('username'));
        Arxmin::set('arxmin.super_email', Input::get('email'));
        Arxmin::set('arxmin.super_password', Hash::make(Input::get('password')));
        Arxmin::set('arxmin.project_name', Input::get('project'));
        Arxmin::set('arxmin.project_category', Input::get('category'));


        # Create Default Role



        # Create A User as super admin
        $user = new UserModel();

        $user->username = Input::get( 'username' );
        $user->email = Input::get( 'email' );
        $user->password = Input::get( 'password' );
        $user->password_confirmation = Input::get( 'password_confirmation' );

        // Save if valid. Password field will be hashed before save
        $user->save();

        if ( $user->id )
        {
            k();
        }
        else
        {
            // Get validation errors (see Ardent package)
            $error = $user->errors()->all(':message');
            d(Input::all());
            dd($error);
        }

        return Redirect::action('Arxmin\\ModuleController@anyDashboard');
    }

    public function anyCheckDb(){
        try {

            DB::connection()->getDatabaseName();
            return Response::json(array('success' => true));

        } catch (Exception $e) {
            return Response::json($e, 400);
        }
    }

    public function anyCheck(){

        $requirements = array();

        # Server information.
        $requirements['software']['value'] = $_SERVER['SERVER_SOFTWARE'];

        # Test PHP version
        $requirements['php']['value'] = phpversion();

        # Test PHP register_globals setting.
        $requirements['php_register_globals']['value'] = trim(ini_get('register_globals'));

        # Requirements
        $requirements['memory_limit']['value'] =  ini_get('memory_limit');

        $requirements['short_open_tag']['value'] = ini_get('short_open_tag');

        $requirements['mcrypt']['value'] = extension_loaded('mcrypt');

        $requirements['gd']['value'] = extension_loaded('gd');

        $requirements['pdo']['value'] = defined('PDO::ATTR_DRIVER_NAME');

        $requirements['imagick']['value'] = extension_loaded('imagick');

        //check if we can execute code

        $requirements['exec'] = function_exists('exec');

        /**
         * @todo : requirements validation
         */
        foreach($requirements as $key => $value){
            if(is_array($requirements[$key])){
                $requirements[$key]['comment'] = 'Valid';
            }
        }

        if(Request::isJson()){
            return Response::json($requirements);
        }

        return $requirements;
    }

    public function getPhpinfo(){
        die(\phpinfo());
    }
}