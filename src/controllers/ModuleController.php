<?php namespace Arxmin;

use Auth, Module;

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

        $auth = Auth::driver('arxmin');

        $isAuth = $auth->check();

        $user = $auth->getUser();

        $menu = Arxmin::getMenu();

        $widgets = Arxmin::getWidgets();

        $moduleName = \Arxmin::getCurrentModule();

        $moduleAssets = Module::asset($moduleName.':');

        $modulePath = Module::getModulePath($moduleName);

        $module_assets = $moduleAssets;

        $this->assign(get_defined_vars());
    }
}