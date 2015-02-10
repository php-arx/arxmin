<?php namespace Arxmin;
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

use Symfony\Component\Finder\Finder;
use View, DB, URL, Auth, Input, Config, Exception;


class ModuleController extends BaseController{

    public $layout = 'arxmin::layouts.admin';

    public $data = array();

    /**
     * General variables
     */
    public function __construct()
    {
        $infos = self::getInfos();

        $user = Auth::getUser();

        $menu = Arxmin::getMenu();

        $widgets = Arxmin::getWidgets();

        $this->assign(get_defined_vars());
    }

    public function anyIndex(){

        $infos = self::getInfos();

        $this->assign(get_defined_vars());
    }

    public function anyDashboard()
    {


        return $this->viewMake('arxmin::modules.dashboard', get_defined_vars());
    }

    /**
    * Label Manager
    */
    public function anyLabelManager(){

        $title = 'Label manager';

        $labels = Label::getAll();

        return $this->viewMake('arxmin::modules.label-manager', get_defined_vars());
    }

    public function anyTable($table = null){

        $title = 'Table manager';

        $tables = DB::select('show tables');

        $linkMenu = URL::to('arxmin/dashboard/table').'/';

        array_walk($tables, function(&$item){
            $item = array_values(get_object_vars($item));
            $item = $item[0];
        });

        return $this->viewMake('arxmin::layouts.table', get_defined_vars());
    }

    public function anyConfiguration(){
        $finder = new Finder();

        $result = $finder->name('*.php')->in(\app_path() . '/config');

        $data = array();

        foreach($result as $file){

            $data[$file->getRelativePath()][$file->getFilename()] = include $file->getPathname();

        }

        $title = 'Lang manager';

        return $this->viewMake('arxmin::layouts.lang', get_defined_vars());
    }


    public function getInfos(){
        return sys_getloadavg();
    }
}