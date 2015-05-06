<?php namespace Arxmin;

class ModuleUserController extends ModuleController {

    /**
     * Create Agency
     */
    public function getIndex()
    {
        dd('oki');
        return $this->viewContent('modules.dashboard', get_defined_vars());
    }

    /*
     * My Account
     */
    public function getAccount()
    {
        return $this->viewContent('modules.dashboard', get_defined_vars());
    }

} 