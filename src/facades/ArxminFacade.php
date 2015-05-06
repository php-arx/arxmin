<?php namespace Arxmin;

class ArxminFacade {
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

namespace Arxmin\facades;

use Arxmin\ArxminFacade as ParentClass;

class ArxminFacade extends ParentClass {}