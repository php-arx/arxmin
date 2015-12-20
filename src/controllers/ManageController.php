<?php namespace Arxmin;

/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

use Arx\BootstrapHelper;
use Arx\classes\Utils;
use Arxmin\helpers\DatacrudHelper;
use Arxmin\helpers\DataformHelper;
use Arxmin\helpers\DatagridHelper;
use Debugbar;
use Hook;
use Symfony\Component\Finder\Finder;
use View, DB, URL, Auth, Input, Config, Exception;
use Zofe\Rapyd\DataGrid\DataGrid;

class ManageController extends BaseController
{

    /**
     * @return \Illuminate\View\View
     */
    public function anyIndex()
    {
        return $this->anyModules();
    }

    public function anyModules($action = "view"){

        $aModules = Arxmin::getModulesAvailables();

        if ($action == 'download') {
            $result = Module::download(
                Input::get('link'),
                Input::get('name'),
                \Module::getPath()
            );
        }

        $title = trans("Modules Discovery");

        /*$oModules = Arxmin::getModules();

        foreach ($oModules as $module) {

            $aModules[] = [
                'title' => $module->name,
                'description' => $module->name,
            ];
        }*/

        return $this->viewMake('arxmin::modules.home', get_defined_vars());
    }

    /**
     * Beautify PHP helpers route
     *
     * @param $arrayRep
     * @return mixed
     */
    public function beautify($arrayRep)
    {
        $arrayRep = preg_replace('/[ ]{2}/', "\t", $arrayRep);
        $arrayRep = preg_replace("/\=\>[ \n\t]+array[ ]+\(/", '=> array(', $arrayRep);
        return $arrayRep = preg_replace("/\n/", "\n\t", $arrayRep);
    }

    public function anyJsonViewer()
    {

        $action = Input::get('action');

        $data = Input::get('data', '{}');

        if (Input::has('config')) {
            $data = json_encode(Config::get(Input::get('config')));
        }

        if ($action == 'preview') {

            die('<pre>' . var_export(Input::get('data'), true) . '</pre>');
        }

        if ($action == 'save') {
            return file_put_contents('test.php', "<?php \n\n return " . $this->beautify(var_export(Input::get('data'), true)) . ";");
        }

        return $this->viewMake('arxmin::shared.jsonviewer', get_defined_vars());
    }

    /**
     * Modules infos
     *
     * @return array
     */
    public function getInfos()
    {
        return sys_getloadavg();
    }
}