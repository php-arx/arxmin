<?php namespace Arxmin\Events;

class InitMenuEvent
{
    public function __construct($menu, $user)
    {
        $this->menu = $menu;
        $this->user = $user;
    }
}