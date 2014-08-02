<?php

return array(

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
     * ex : custom/admin
     *
     * => will link to packages/custom/admin
     *
     * ex : ../assets/admin
     *
     * => will link to public/assets/admin
     */
    'theme' => 'arx/arxmin',

    /**
     * Default used Namespace for routing
     */
    'namespace' => 'Arxmin\\',

    /**
     * Default database (if you need to define an other one => simply add you database connection key
     */
    'database' => array(
        # Precise default database
        'default' => true
    ),

    /**
     * Default group strategy
     */
    'group' => array(
        'admin' => array(
            'name' => 'Administrators',
            'permissions' => array(
                'user.create' => 1,
                'user.delete' => 1,
                'user.view' => 1,
                'user.update' => 1,
            )
        ),
        'moderator' => array(
            'name' => 'Moderator',
            'permissions' => array(
                'user.create' => 0,
                'user.delete' => 0,
                'user.view' => 1,
                'user.update' => 0,
            )
        )
    ),


    /**
     * Paths by default
     */
    'paths' => array(
        'packages' => app_path('packages'),
        'workbench' => realpath(__DIR__.'/../../../../')
    ),
);