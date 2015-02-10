<?php namespace Arxmin;

use Config;
use Illuminate\Database\Eloquent\Builder;
use Schema as ParentClass;

class SchemaModel extends ParentClass {

    /**
     * SchemaModel Builder
     *
     * @param \Illuminate\Database\Connection $connection
     */
    public static function __construct($connection){

        $connection = Config::get('arxmin.db.default');

        new Builder($connection);
    }
}