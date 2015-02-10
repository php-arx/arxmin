<?php

return array(

    array(
        'name' => 'Dashboard',
        'type' => 'module',
        'ico' => 'fa-dashboard',
        'link' => action('Arxmin\\ModuleController@anyDashboard')
    ),

    array(
        'name' => 'Content',
        'type' => 'module',
        'ico' => 'fa-pencil',
        'link' => url('/arxmin/dashboard'),
        'items' => array(
            array(
                'name' => 'Page',
                'ico' => 'fa-file-o',
                'type' => 'module',
                'link' => url('/arxmin/module/data-manager?type=page')
            ),

            array(
                'name' => 'Article',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/module/data-manager?type=post')
            ),

            array(
                'name' => 'Label',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/module/label-manager?type=post')
            ),
        )
    ),

    array(
        'name' => 'Structure',
        'type' => 'module',
        'ico' => 'fa-sitemap',
        'link' => url('/arxmin/dashboard'),
        'items' => array(
            array(
                'name' => 'Categories',
                'ico' => 'fa-file-o',
                'type' => 'module',
                'link' => url('/arxmin/module/data-manager?type=form&manage=category')
            ),
            array(
                'name' => 'Taxonomies',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/module/data-manager?type=form&manage=page')
            ),

            array(
                'name' => 'Content Type',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/content/page'),
                'items' => array(
                    array(
                        'name' => 'Add a content type',
                        'ico' => 'fa-file-o',
                        'type' => 'module',
                        'link' => url('/arxmin/module/data-manager?type=form&manage=page')
                    ),
                )
            ),
            # Here you can hook your menu
            Hook::get('arxmin::menu.structure')
        )
    ),

    array(
        'name' => 'Apparence',
        'type' => 'module',
        'ico' => 'fa-image',
        'link' => url('/arxmin/dashboard'),
        'items' => array(

            array(
                'name' => 'Theming',
                'ico' => 'fa-file-o',
                'type' => 'module',
                'link' => url('/arxmin/apparence/content-type')
            ),
        )
    ),

    array(
        'name' => 'Module',
        'type' => 'module',
        'ico' => 'fa-cubes',
        'link' => url('/arxmin/dashboard'),
        'items' => array(
            array(
                'name' => 'Home',
                'type' => 'module',
                'link' => url('/arxmin/dashboard/home')
            )
        )
    ),

    array(
        'name' => 'Users',
        'type' => 'module',
        'ico' => 'fa-user',
        'link' => url('/arxmin/dashboard'),
        'items' => array(
            array(
                'name' => 'Home',
                'type' => 'module',
                'link' => url('/arxmin/dashboard/home')
            ),
        )
    ),

    array(
        'name' => 'Configuration',
        'type' => 'module',
        'ico' => 'fa-sliders',
        'link' => url('/arxmin/dashboard'),
        'items' => array(
            array(
                'name' => 'Home',
                'type' => 'module',
                'link' => url('/arxmin/dashboard/home')
            ),
        )
    ),

    array(
        'name' => 'Stats',
        'type' => 'module',
        'ico' => 'fa-bar-chart-o',
        'link' => url('/arxmin/dashboard'),
        'items' => array(
            array(
                'name' => 'Home',
                'type' => 'module',
                'link' => url('/arxmin/dashboard/home')
            ),
        )
    )
);