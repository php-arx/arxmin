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
            $user = UserModel::exists();
        } catch (\Exception $e) {
            $user = array('first_name' => null);
        }

        $requirements = $this->anyCheck();

        $ngApp = 'InstallModule';

        $data = get_defined_vars();

        $this->assign($data);
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
         * @todo : requirements
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