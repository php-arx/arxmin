<?php namespace Arxmin\helpers;

/**
 * Class ArxminMenuItemHelper
 *
 * @package Arxmin\helpers
 */
class MenuItemHelper
{
    public $data = array(
        'name' => null,
        'type' => 'module',
        'ico' => 'fa-link',
        'link' => null,
    );


    public function __construct($link, $name, $children = null, $ico = null, $type = null)
    {
        $this->data = array_merge($this->data, get_defined_vars());

        return $this->data;
    }

}