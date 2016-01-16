<?php namespace Arxmin;

use Auth;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class BaseController for all Controller
 *
 * @package Arxmin
 */
class BaseController extends  \Arx\controllers\BaseController {

    use ValidatesRequests;

    protected $menu;

    public function __construct(){

        global $isAuth, $user;

        # Check if parent is callable
        if (is_callable('parent::__construct')) {
            parent::__construct();
        }

        $auth = Arxmin::getAuth();

        $isAuth = $auth->check();

        $user = $auth->getUser();

        $menu = Arxmin::getMenu();

        $widgets = Arxmin::getWidgets();

        $theme_url = Arxmin::getAssetsUrl();

        # Add Arxmin hook
        $this->assign(get_defined_vars());

        /**
         * Default Javascript variables
         */
        \Hook::put('__app.debug', \Config::get('app.debug') ? 1 : 0);
        \Hook::put('__app.theme_url',  $theme_url);
        \Hook::put('__app.base_url',  url('/'));
        \Hook::put('__app.api_url',  Arxmin::getApiUrl());
    }

}
