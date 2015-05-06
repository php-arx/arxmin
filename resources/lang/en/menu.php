<?php

return array(

    array(
        'name' => 'Dashboard',
        'type' => 'module',
        'ico' => 'fa-dashboard',
        'link' => url('/arxmin/module/dashboard')
    ),

    array(
        'name' => 'Content',
        'type' => 'module',
        'ico' => 'fa-pencil',
        'link' => url('/arxmin/module/data-manager'),
        'children' => array(
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
                'link' => url('/arxmin/module/label-manager')
            ),
        )
    ),

    array(
        'name' => 'Structure',
        'type' => 'module',
        'ico' => 'fa-sitemap',
        'link' => url('/arxmin/module/structure'),
        'children' => array(
            array(
                'name' => 'Categories',
                'ico' => 'fa-file-o',
                'type' => 'module',
                'link' => url('/arxmin/module/structure/categories')
            ),
            array(
                'name' => 'Taxonomies',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/module/structure/taxonomies')
            ),
            array(
                'name' => 'Menus',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/module/structure/taxonomies')
            ),

            array(
                'name' => 'Content Type Forms',
                'ico' => 'fa-plus-square-o',
                'type' => 'module',
                'link' => url('/arxmin/module/structure/forms'),
                'children' => array(
                    array(
                        'name' => 'Add a content type',
                        'ico' => 'fa-file-o',
                        'type' => 'module',
                        'link' => url('/arxmin/module/structure/forms/add')
                    ),
                )
            ),
        )
    ),

    array(
        'name' => 'Apparence',
        'type' => 'module',
        'ico' => 'fa-image',
        'link' => url('/arxmin/module/theme'),
        'children' => array(
            array(
                'name' => 'Theming',
                'ico' => 'fa-file-o',
                'type' => 'module',
                'link' => url('/arxmin/module/theme')
            ),
        )
    ),

    array(
        'name' => 'Module',
        'type' => 'module',
        'ico' => 'fa-cubes',
        'link' => url('/arxmin/module/admin')
    ),

    array(
        'name' => 'Users',
        'type' => 'module',
        'ico' => 'fa-user',
        'link' => url('/arxmin/module/user')
    ),

    array(
        'name' => 'Configuration',
        'type' => 'module',
        'ico' => 'fa-sliders',
        'link' => url('/arxmin/module/config'),
    ),

    array(
        'name' => 'Stats',
        'type' => 'module',
        'ico' => 'fa-bar-chart-o',
        'link' => url('/arxmin/module/stats')
    )
);