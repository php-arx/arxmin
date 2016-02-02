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
        'position' => 1000,
        'link' => null,
    );

    public function __construct($data = array())
    {
        $this->data = array_merge($this->data, $data);

        return $this->data;
    }

    /**
     *  Return an element from constructor
     */
    public static function make($link, $name, $position = 1000, $children = null, $ico = 'fa fa-link', $type = 'module')
    {
        $t = new self(get_defined_vars());
        return $t->data;
    }

}