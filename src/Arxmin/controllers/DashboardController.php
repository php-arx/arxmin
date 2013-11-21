<?php
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arxmin;

use Symfony\Component\Finder\Finder;
use View, Lang, Config, DB, URL;


class DashboardController extends BaseController{

    public $layout = 'arxmin::layouts.dashboard';

    public function anyIndex(){
        $infos = self::getInfos();

        $this->assign(get_defined_vars());
    }

    public function anyHome()
    {
        $infos = self::getInfos();

        $menu = ArxminModel::getMenu();

        $widgets = ArxminModel::getWidgets();

        $this->assign(get_defined_vars());
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