<?php namespace Arxmin\helpers;

/**
 * Class ArxminMenuItemHelper
 *
 * @package Arxmin\helpers
 */
class TaskHelper
{
    public $data = array(
        'name' => null,
        'position' => 1000,
        'type' => 'module',
        'ico' => 'fa-link',
        'link' => null,
    );

    public function __construct($data = array())
    {
        $this->data = array_merge($this->data, get_defined_vars());

        return $this->data;
    }

    /**
     *  Return an element from constructor
     */
    public static function make($link, $name, $position = null, $children = null, $ico = null, $type = null)
    {
        return new self(get_defined_vars());
    }

}