<?php namespace Arxmin;

use Auth;

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

        $this->assign(get_defined_vars());
    }
}