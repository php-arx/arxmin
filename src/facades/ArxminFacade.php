<?php namespace Arxmin;

use Arx\classes\Facade;

class ArxminFacade extends Facade {
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'arxmin';
    }
}