<?php namespace Arxmin;

use View;

/**
 * Class BaseController
 * @package Arxmin
 */
class BaseController extends \Arx\BaseController {

    protected $menu;

    public function __construct(){
        if (is_callable('parent::__construct')) {
            parent::__construct();
        }

        $this->assign('theme_url', Arxmin::getThemeUrl());

        \Hook::put('__app.debug', \Config::get('app.debug') ? 1 : 0);
        \Hook::put('__app.theme_url',  Arxmin::getThemeUrl());
        \Hook::put('__app.base_url',  url());
        \Hook::put('__app.api_url',  Arxmin::getApiUrl());

    }

}
