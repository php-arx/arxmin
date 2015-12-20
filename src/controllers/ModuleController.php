<?php namespace Arxmin;

use Auth, Module;
use SebastianBergmann\GlobalState\Exception;

/**
 * Class ModuleController
 *
 * ModuleController template to use when you create your ModuleController
 *
 * @package Arxmin
 */
abstract class ModuleController extends BaseController
{
    public $layout = 'arxmin::layouts.admin';
    public $data = array();

    /**
     * General variables
     */
    public function __construct()
    {
        parent::__construct();

        try {
            $moduleName = \Arxmin::getCurrentModule();

            $moduleAssets = Module::asset($moduleName.':');

            $modulePath = Module::getModulePath($moduleName);

            $module_assets = $moduleAssets;
        } catch (Exception $e) {

        }

        $this->assign(get_defined_vars());
    }
}