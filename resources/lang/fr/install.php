<?php //

$l = array();

$l['menu'] = array(
    array(
        'name' => 'Welcome in ARX :first_name !',
        'link' => url('arxmin/install')
    ),
    array(
        'name' => 'Verify requirements',
        'link' => url('docs')
    ),
    array(
        'name' => 'Installation',
        'link' => 'https://github.com/cherrylabs/arx-contrib',
        '@ttr' => array(
            'target' => '_blank'
        )
    )
);

$l['action'] = array(
    'refresh' => 'Refresh',
    'delete' => 'delete',
    'submit' => 'submit'
);

$l['step']['check'] = array(
    'title' => 'Check your configuration',
    'description' => 'Check configuration',
    'requirements' => 'Requirements',
    'value' => 'Value',
    'comments' => 'Comments'
);

$l['step']['db'] = array(
    'title' => 'Choose the default connection for Arxmin',
    'description' => <<<description

description
);

$l['step']['project'] = array(
    'title' => 'Configure your project',
    'description' => <<<description

description
);

$l['dbconfig'] = array(
    'sqlite' => array(
        'driver'   => 'sqlite',
        'database' => __DIR__.'/../database/production.sqlite',
        'prefix'   => '',
    ),

    'mysql' => array(
        'driver'    => 'mysql',
        'host'      => 'localhost',
        'database'  => 'database',
        'username'  => 'root',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ),

    'pgsql' => array(
        'driver'   => 'pgsql',
        'host'     => 'localhost',
        'database' => 'database',
        'username' => 'root',
        'password' => '',
        'charset'  => 'utf8',
        'prefix'   => '',
        'schema'   => 'public',
    ),

    'sqlsrv' => array(
        'driver'   => 'sqlsrv',
        'host'     => 'localhost',
        'database' => 'database',
        'username' => 'root',
        'password' => '',
        'prefix'   => '',
    ),
);

return $l;