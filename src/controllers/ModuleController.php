<?php namespace Arxmin;

/**
 * ModuleController
 *
 * ModuleController template to use when you create your ModuleController
 *
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

use Auth;

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

        $auth->check();

        $user = $auth->getUser();

        $menu = Arxmin::getMenu();

        $widgets = Arxmin::getWidgets();

        $this->assign(get_defined_vars());
    }
}