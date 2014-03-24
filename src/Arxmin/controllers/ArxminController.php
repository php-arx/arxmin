<?php
/**
 * DashboardController
 *
 * @project : arx/arxmin
 * @author : Daniel Sum <daniel@cherrypulp.com>
 */

namespace Arxmin;

use Symfony\Component\Finder\Finder;
use View, Lang, Config, DB, URL, Request, Response;


class ArxminController extends BaseController{

    public $layout = 'arxmin::layouts.admin';

    public $data = array();

    public function anyIndex()
    {
        $user = UserModel::auth();
    }
}