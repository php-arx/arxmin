<?php namespace Arxmin;

use Arxmin\Role;
use Arxmin\User;

use Request, Response, Input, DB, Hash, Redirect, Exception, Auth;
use Validator;

class InstallController extends BaseController {

    public $layout = 'arxmin::install';

    /**
     * Show install page
     *
     * @return \Illuminate\View\View
     */
    public function getIndex()
    {
        try {
            $user = User::exists();
        } catch (\Exception $e) {
            $user = array('first_name' => null);
        }

        $requirements = $this->anyCheck();

        $ngApp = 'InstallModule';

        $data = get_defined_vars();

        \Hook::put('__app.database', \Config::get('database'));

        return $this->viewMake('arxmin::install', $data);
    }

    /**
     * Install the admin
     *
     * @return $this|\Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function postIndex()
    {

        $data = Input::all();

        $validation = Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        if($validation->fails()){
            return Redirect::back()->withErrors($validation->errors());
        }

        # Set Super Admin User
        Arxmin::setOption('arxmin.project_name', Input::get('project'));
        Arxmin::setOption('arxmin.project_category', Input::get('category'));
        Arxmin::setOption('arxmin.super_first_name', Input::get('first_name'));
        Arxmin::setOption('arxmin.super_last_name', Input::get('last_name'));
        Arxmin::setOption('arxmin.super_email', Input::get('email'));
        Arxmin::setOption('arxmin.super_password', bcrypt(Input::get('password')));

        return Redirect::to('arxmin/manage/modules');
    }

    /**
     * Update database connection config
     */
    public function anyUpdateDb()
    {
        $config = var_export(Input::all());

        if(file_exists(base_path('config/database.php'))){
            $backup = file_get_contents(base_path('config/database.php'));
            file_put_contents(base_path('config/database_bckp.php'), $backup);
        }

        file_put_contents(base_path('config/database.php'), $config);

        return Response::json($config, 200);
    }

    /**
     * Check the Database connection with the new Db Config
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function anyCheckDb(){
        try {

            DB::connection()->getDatabaseName();
            return Response::json(array('success' => true));

        } catch (Exception $e) {
            return Response::json($e, 400);
        }
    }

    /**
     * Check if configuration is ok
     *
     * @return array|\Symfony\Component\HttpFoundation\Response
     */
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

    /**
     * Simply Show a PhpInfo
     */
    public function getPhpinfo(){
        die(\phpinfo());
    }
}