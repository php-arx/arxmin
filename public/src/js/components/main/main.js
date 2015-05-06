require('../../config.js');

window.__component_name = 'main';

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'bootstrap',
            'angular-bootstrap',
            'angular-bootstrap-tpls',
            'angular-famous',
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

    angular.module(window.__component_name, [
        'ui.bootstrap',
        'mgcrea.ngStrap',
        'sidebar',
        'utils'
    ]);

    require('./mainController.js');

    // bootstrap the app (async)
    angular.element(document).ready(function () {
        angular.bootstrap(document, [window.__component_name]);
    });
});
