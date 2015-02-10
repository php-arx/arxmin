<?php namespace Arxmin;

class ModuleUserController extends ModuleController {


    public $layout = "arxmin::layouts.admin";

    public function __construct()
    {

    }

    /**
     * Create Agency
     */
    public function getIndex()
    {

    }

    /*
     * My Account
     */
    public function getAccount()
    {
        return $this->viewContent('modules.user_form', get_defined_vars());
    }

} 