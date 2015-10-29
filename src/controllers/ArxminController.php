<?php namespace Arxmin;

class ArxminController extends BaseController
{

    /**
     * Return to the first link of the dynamic menu
     */
    public function anyIndex()
    {
        $menu = \Arxmin::getMenu();
        return redirect($menu[0]['link']);
    }

}