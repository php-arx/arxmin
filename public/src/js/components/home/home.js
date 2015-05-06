require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'bootstrap',
            'angular-bootstrap',
            'angular-bootstrap-tpls',
            'masonry',
            'angular-strap',
            'angular-strap-tpl',
            'shared/core',
            'shared/notification',
            'shared/header',
            'shared/sidebar',
            'shared/utils'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('home', [
        'ui.bootstrap',
        'mgcrea.ngStrap',
        //'famous.angular',
        'sidebar',
        'utils'
    ]);

    require('./homeController.js');

    // bootstrap the app (async)
    angular.element(document).ready(function () {
        angular.bootstrap(document, ['home']);
    });

    $(function () {

        $('.navbar-toggle').click(function () {
            $('.navbar-nav').toggleClass('slide-in');
            $('.side-body').toggleClass('body-slide-in');
            $('#search').removeClass('in').addClass('collapse').slideUp(200);

            /// uncomment code for absolute positioning tweek see top comment in css
            //$('.absolute-wrapper').toggleClass('slide-in');

        });

        // Remove menu for searching
        $('#search-trigger').click(function () {
            $('.navbar-nav').removeClass('slide-in');
            $('.side-body').removeClass('body-slide-in');

            /// uncomment code for absolute positioning tweek see top comment in css
            //$('.absolute-wrapper').removeClass('slide-in');

        });
    });
});
