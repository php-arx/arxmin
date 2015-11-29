<?php namespace Arxmin;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;

/**
 * Class BaseController for all Controller
 *
 * @package Arxmin
 */
class BaseController extends \Arx\BaseController {

    use DispatchesCommands, ValidatesRequests;

    protected $menu;

    public function __construct(){

        # Check if parent is callable
        if (is_callable('parent::__construct')) {
            parent::__construct();
        }

        # Add Arxmin hook
        $this->assign('theme_url', Arxmin::getThemeUrl());
        \Hook::put('__app.debug', \Config::get('app.debug') ? 1 : 0);
        \Hook::put('__app.theme_url',  Arxmin::getThemeUrl());
        \Hook::put('__app.base_url',  url());
        \Hook::put('__app.api_url',  Arxmin::getApiUrl());
    }

}
