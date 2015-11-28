<?php

return Hook::get('arxmin::config', array(

    'api' => array(
        'base' => url('arxmin/api/v1')
    ),

    /**
     * route default prefix
     *
     * put false if you want to disable it
     */
    'prefix' => 'arxmin',

    /**
     * Default theme packages
     *
     * You can custom your own assets by rename it
     *
     * => will link to public/packages/arx/arxmin
     */
    'theme' => 'arx/arxmin/dist',

    /**
     * Default used Namespace for the routing
     */
    'namespace' => 'Arxmin\\',

    /**
     * Default database (if you need to define an other one => simply add you database connection key here
     */
    'database' => array(
        'default' => Config::get('database.default')
    ),

    /**
     * Paths used for packages and workbench
     */
    'paths' => array(
        'packages' => app_path('packages'),
        'workbench' => base_path('workbench'),
        'theme' => public_path('packages/arx/arxmin/dist')
    ),

    /**
     * Auth configuration
     */
    'auth' => array(
        'filter' => 'arxmin-auth',
        'controller' => 'Arxmin\\AuthController',
        'model' => 'Arxmin\\UserModel',
    ),

));