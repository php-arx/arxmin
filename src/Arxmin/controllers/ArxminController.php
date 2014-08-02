<?php
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arxmin;

use Arx\BaseController as ParentClass;


class ArxminController extends ParentClass {

    public $layout = 'arxmin::layouts.admin';

    public $data = array();

    public function __construct()
    {
        global $user;

        $user = UserModel::getAuth();

        $this->assign('user', $user);
    }


    /**
     *
     * @todo better login handler !
     * @return \Illuminate\View\View
     */
    public function anyLogin()
    {
        return $this->viewMake('arxmin::layouts.login', get_defined_vars());
    }

}