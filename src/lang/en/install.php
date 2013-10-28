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

$l['step']['check'] = array(
    'title' => 'Check your configuration',
    'description' => <<<description

description
);

return $l;