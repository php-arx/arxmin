<?php
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arxmin;

use Symfony\Component\Finder\Finder;
use View, Lang, Config, DB, URL, Request, Response;


class InstallController extends BaseController{

    public $layout = 'arxmin::install';

    public function anyIndex()
    {

        try {
            UserModel::exists();
        } catch (\Exception $e) {
            $user = array('first_name' => null);
        }

        $requirements = $this->anyCheck();

        $data = get_defined_vars();

        $this->assign($data);
    }

    public function anyCheck(){

        # Server information.
        $requirements['software'] = $_SERVER['SERVER_SOFTWARE'];

        # Test PHP version
        $requirements['php'] = phpversion();

        # Test PHP register_globals setting.
        $requirements['php_register_globals'] = trim(ini_get('register_globals'));

        # Requirements
        $requirements['memory_limit'] =  ini_get('memory_limit');

        $requirements['short_open_tag'] = ini_get('short_open_tag');

        $requirements['mcrypt'] = extension_loaded('mcrypt');

        $requirements['gd'] = extension_loaded('gd');

        $requirements['pdo'] = defined('PDO::ATTR_DRIVER_NAME');

        $requirements['imagick'] = extension_loaded('imagick');

        //check if we can execute code

        $requirements['exec'] = function_exists('exec');

        if(Request::isJson()){
            return Response::json($requirements);
        }

        return $requirements;
    }

    public function getPhpinfo(){
        die(\phpinfo());
    }
}