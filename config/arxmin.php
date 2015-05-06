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
        'controller' => 'Arxmin\\UserController',
        'model' => 'Arxmin\\UserModel',
        'throttle_limit' => 9,
        'throttle_time_period' => 2,
        'login_cache_field' => 'email',
        'login_form' =>             'arxmin::user.login',
        'signup_form' =>            'arxmin::user.signup',
        'forgot_password_form' =>   'arxmin::user.forgot_password',
        'reset_password_form' =>    'arxmin::user.reset_password',
        'email_reset_password' =>       'arxmin::emails.passwordreset', // with $user and $token.
        'email_account_confirmation' => 'arxmin::emails.confirm', // with $user
        'signup_cache' => 120,
        'signup_email'      => false,
        'signup_confirm'    => false,
    ),

    'acl' => array(
        /*
        |--------------------------------------------------------------------------
        | Arxmin Role Model
        |--------------------------------------------------------------------------
        |
        | This is the Role model used by Arxmin to create correct relations.  Update
        | the role if it is in a different namespace.
        |
        */
        'role' => '\Role',
        /*
        |--------------------------------------------------------------------------
        | Arxmin Roles Table
        |--------------------------------------------------------------------------
        |
        | This is the roles table used by Arxmin to save roles to the database.
        |
        */
        'roles_table' => 'roles',
        /*
        |--------------------------------------------------------------------------
        | Arxmin Permission Model
        |--------------------------------------------------------------------------
        |
        | This is the Permission model used by Arxmin to create correct relations.
        | Update the permission if it is in a different namespace.
        |
        */
        'permission' => '\Permission',
        /*
        |--------------------------------------------------------------------------
        | Arxmin Permissions Table
        |--------------------------------------------------------------------------
        |
        | This is the permissions table used by Arxmin to save permissions to the
        | database.
        |
        */
        'permissions_table' => 'permissions',
        /*
        |--------------------------------------------------------------------------
        | Arxmin permission_role Table
        |--------------------------------------------------------------------------
        |
        | This is the permission_role table used by Arxmin to save relationship
        | between permissions and roles to the database.
        |
        */
        'permission_role_table' => 'permission_role',
        /*
        |--------------------------------------------------------------------------
        | Arxmin role_user Table
        |--------------------------------------------------------------------------
        |
        | This is the role_user table used by Arxmin to save assigned roles to the
        | database.
        |
        */
        'role_user_table' => 'role_user',



        /**
         * Default group strategy
         */
        'group' => array(
            'admin' => array(
                'name' => 'admin',
                'permissions' => array(
                    'user.create' => 1,
                    'user.delete' => 1,
                    'user.view' => 1,
                    'user.update' => 1,
                )
            ),
            'moderator' => array(
                'name' => 'editor',
                'permissions' => array(
                    'user.create' => 0,
                    'user.delete' => 0,
                    'user.view' => 1,
                    'user.update' => 1,
                )
            ),
            'reader' => array(
                'name' => 'viewer',
                'permissions' => array(
                    'user.create' => 0,
                    'user.delete' => 0,
                    'user.view' => 1,
                    'user.update' => 0,
                )
            )
        ),
    )

));