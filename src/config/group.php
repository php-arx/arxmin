<?php

return array(
    'admin' => array(
        'name' => 'Administrators',
        'permissions' => array(
            'user.create' => 1,
            'user.delete' => 1,
            'user.view' => 1,
            'user.update' => 1,
        )
    ),
    'contributor' => array(
        'name' => 'Contributor',
        'permissions' => array(
            'user.create' => 0,
            'user.delete' => 0,
            'user.view' => 1,
            'user.update' => 1,
        )
    ),
    'visitor' => array(
        'name' => 'Visitors',
        'permissions' => array(
            'user.create' => 0,
            'user.delete' => 0,
            'user.view' => 0,
            'user.update' => 0,
        )
    )
);