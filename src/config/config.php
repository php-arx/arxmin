<?php

return array(


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
     * Default database (if you need to define an other one => simply add you database connection key
     */
    'database' => array(
        'default' => Config::get('database.default')
    ),

    /**
     * Default group strategy
     */
    'group' => array(
        'admin' => array(
            'name' => 'Admin',
            'permissions' => array(
                'user.create' => 1,
                'user.delete' => 1,
                'user.view' => 1,
                'user.update' => 1,
            )
        ),
        'moderator' => array(
            'name' => 'Editor',
            'permissions' => array(
                'user.create' => 0,
                'user.delete' => 0,
                'user.view' => 1,
                'user.update' => 1,
            )
        ),
        'reader' => array(
            'name' => 'Viewer',
            'permissions' => array(
                'user.create' => 0,
                'user.delete' => 0,
                'user.view' => 1,
                'user.update' => 0,
            )
        )
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

        'filter' => 'arxminauth',

        'controller' => 'Arxmin\\UserController',

        'model' => 'Arxmin\\UserModel',

        /*
        |--------------------------------------------------------------------------
        | Login Throttle
        |--------------------------------------------------------------------------
        |
        | Defines how many login failed tries may be done within
        | the 'throttle_time_period', which is in minutes.
        |
        */

        'throttle_limit' => 9,
        'throttle_time_period' => 2,

        /*
        |--------------------------------------------------------------------------
        | Login Throttle Field
        |--------------------------------------------------------------------------
        |
        | Login throttle is done using the remote ip address
        | and a provided credential. Email and username are likely values.
        |
        | Default: email
        |
        */
        'login_cache_field' => 'email',

        /*
        |--------------------------------------------------------------------------
        | Form Views
        |--------------------------------------------------------------------------
        |
        | The VIEWS used to render forms with Confide methods:
        | makeLoginForm, makeSignupForm, makeForgotPasswordForm
        | and makeResetPasswordForm.
        |
        | By default, the out of the box confide views are used
        | but you can create your own forms and replace the view
        | names here. For example
        |
        |  // To use app/views/user/signup.blade.php:
        |
        | 'signup_form' => 'user.signup'
        |
        |
        */
        'login_form' =>             'arxmin::user.login',
        'signup_form' =>            'arxmin::user.signup',
        'forgot_password_form' =>   'arxmin::user.forgot_password',
        'reset_password_form' =>    'arxmin::user.reset_password',

        /*
        |--------------------------------------------------------------------------
        | Email Views
        |--------------------------------------------------------------------------
        |
        | The VIEWS used to email messages for some Confide events:
        |
        | By default, the out of the box confide views are used
        | but you can create your own forms and replace the view
        | names here. For example
        |
        |  // To use app/views/email/confirmation.blade.php:
        |
        | 'email_account_confirmation' => 'email.confirmation'
        |
        |
        */

        'email_reset_password' =>       'confide::emails.passwordreset', // with $user and $token.
        'email_account_confirmation' => 'confide::emails.confirm', // with $user

        'signup_cache' => 120,

        'signup_email'      => false,
        'signup_confirm'    => false,
    )
);