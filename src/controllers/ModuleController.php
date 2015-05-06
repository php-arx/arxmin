<?php namespace Arxmin;
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

use Hook;
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
        parent::__construct();

        $infos = self::getInfos();

        Auth::check();

        $user = Auth::getUser();

        $menu = Arxmin::getMenu();

        $widgets = Arxmin::getWidgets();

        $this->assign(get_defined_vars());
    }

    /*public function missingMethod($parameters = Array()){
        $param = explode('/', $parameters);

        if(Hook::has('modules.'.$param[0])){

        } elseif(class_exists('Arxmin\\Module'.ucfirst(studly_case($param[0])).'Controller')){
            $class = 'Arxmin\\Module'.ucfirst(studly_case($param[0])).'Controller';
            with(new $class)->any
        }
    }*/

    public function anyIndex(){

        $infos = self::getInfos();

        $this->assign(get_defined_vars());
    }

    public function anyDashboard()
    {
        return $this->viewMake('arxmin::modules.dashboard', get_defined_vars());
    }

    public function anyConfig()
    {
        return $this->viewMake('arxmin::modules.dashboard', get_defined_vars());
    }

    public function anyAdmin()
    {
        return $this->viewMake('arxmin::modules.dashboard', get_defined_vars());
    }

    public function anyUser()
    {
        return $this->viewMake('arxmin::modules.dashboard', get_defined_vars());
    }

    public function anyTheme()
    {
        return $this->viewMake('arxmin::modules.dashboard', get_defined_vars());
    }

    /**
    * Label Manager
    */
    public function anyLabelManager(){

        $title = 'Label manager';

        $labels = Label::getAll();

        Hook::put('__app.ajax.create.url', Arxmin::api('label'));
        Hook::put('__app.ajax.read.url', Arxmin::api('labels?format=datatable'));
        Hook::put('__app.ajax.update.url', Arxmin::api('label'));
        Hook::put('__app.ajax.delete.url', Arxmin::api('label'));
        Hook::put('__app.langs', Config::get('app.locales'));

        //dd(Hook::get('__app'));

        return $this->viewMake('arxmin::modules.label-manager', get_defined_vars());
    }

    public function anyStructure(){


        $title = 'Table manager';

        $tables = DB::select('show tables');

        $linkMenu = URL::to('arxmin/dashboard/table').'/';

        array_walk($tables, function(&$item){
            $item = array_values(get_object_vars($item));
            $item = $item[0];
        });

        ddd($tables);

        return $this->viewMake('arxmin::modules.structure', get_defined_vars());
    }

    public function beautify($arrayRep){
            $arrayRep = preg_replace('/[ ]{2}/', "\t", $arrayRep);
            $arrayRep = preg_replace("/\=\>[ \n\t]+array[ ]+\(/", '=> array(', $arrayRep);
            return $arrayRep = preg_replace("/\n/", "\n\t", $arrayRep);
    }

    public function anyJsonViewer(){

        $action = Input::get('action');

        $data = Input::get('data', '{}');

        if (Input::has('config')) {
            $data = json_encode(Config::get(Input::get('config')));
        }

        if($action == 'preview'){

            die('<pre>'.var_export(Input::get('data'), true).'</pre>');
        }

        if($action == 'save'){
            return file_put_contents('test.php', "<?php \n\n return ".$this->beautify(var_export(Input::get('data'), true)).";");
        }



        return $this->viewMake('arxmin::modules.jsonviewer', get_defined_vars());
    }

    public function anyTable($table = null){

        $title = 'Table manager';

        $tables = DB::select('show tables');

        $linkMenu = URL::to('arxmin/dashboard/table').'/';

        array_walk($tables, function(&$item){
            $item = array_values(get_object_vars($item));
            $item = $item[0];
        });

        return $this->viewMake('arxmin::modules.table', get_defined_vars());
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

    public function anyStats(){


        return $this->viewMake('arxmin::modules.stats', get_defined_vars());
    }
}