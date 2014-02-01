<?php namespace Arxmin;
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

use Symfony\Component\Finder\Finder;
use View, Lang, Config, DB, URL, Auth, Confide, Redirect;


class MyController extends BaseController{

    public $layout = 'arxmin::layouts.bootstrap';

    public function __construct()
    {
        if(!\Confide::user()){
            return Redirect::to('user/login');
        } else {

        }
    }

    public function anyIndex(){
        $infos = self::getInfos();

        $this->assign(get_defined_vars());
    }

    public function anyDashboard()
    {
        $infos = self::getInfos();

        $user = Auth::getUser();

        $menu = ArxminModel::getMenu();

        $widgets = ArxminModel::getWidgets();

        return View::make('arxmin::my.dashboard', get_defined_vars());
    }

    public function anyLang(){

        $finder = new Finder();

        $result = $finder->name('*.php')->in(\app_path() . '/lang');

        $data = array();

        foreach($result as $file){

            $data[$file->getRelativePath()][$file->getFilename()] = include $file->getPathname();

        }

        $title = 'Lang manager';

        return View::make('arxmin::layouts.lang', get_defined_vars());
    }

    public function anyTable($table = null){

        $title = 'Table manager';

        $tables = DB::select('show tables');

        $linkMenu = URL::to('arxmin/dashboard/table').'/';

        array_walk($tables, function(&$item){
            $item = array_values(get_object_vars($item));
            $item = $item[0];
        });

        return View::make('arxmin::layouts.table', get_defined_vars());
    }

    public function anyConfiguration(){
        $finder = new Finder();

        $result = $finder->name('*.php')->in(\app_path() . '/config');

        $data = array();

        foreach($result as $file){

            $data[$file->getRelativePath()][$file->getFilename()] = include $file->getPathname();

        }

        $title = 'Lang manager';

        return View::make('arxmin::layouts.lang', get_defined_vars());
    }


    public function getInfos(){
        return sys_getloadavg();
    }
}