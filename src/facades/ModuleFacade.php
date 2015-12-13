<?php namespace Arxmin;

use Arx\classes\Facade;

class ModuleFacade extends Facade {

    /**
     * Return Arxmin instanciated in app
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'modules';
    }

    /**
     * Get Current module used
     */
    public static function getCurrent()
    {

    }

}