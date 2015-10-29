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

/**
 * @deprecated please use auto resolvers !
 */
namespace Arxmin\facades;

use Arxmin\ArxminFacade as ParentClass;

class ArxminFacade extends ParentClass {}