<?php
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arxmin;

use Arx\BaseController as ParentClass;

use Redirect;

class ArxminController extends ParentClass {

    public $layout = 'arxmin::layouts.admin';

    public $data = array();

    public function __construct()
    {
        $this->beforeFilter('arxmin-check');
        $this->beforeFilter('arxmin-auth', array('except' => array('anyLogin')));
    }

    public function missingMethods(){
        dd(func_get_args());
    }

    public function anyIndex(){
        return Redirect::action('Arxmin\\ModuleController@anyDashboard');
    }

    /**
     *
     * @todo better login handler
     * @return \Illuminate\View\View
     */
    public function anyLogin()
    {
        return $this->viewMake('arxmin::user.login', get_defined_vars());
    }

}