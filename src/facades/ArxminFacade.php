<?php namespace Arxmin;

use Arx\classes\Facade;

class ArxminFacade extends Facade {

    /**
     * Return Arxmin instanciated in app
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'arxmin';
    }

}