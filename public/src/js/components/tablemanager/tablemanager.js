require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'underscore',
            'bootstrap',
            'angular-bootstrap',
            'angular-bootstrap-tpls',
            'masonry',
            'angular-strap',
            'angular-strap-tpl',
            'jquery-table-editor',
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

    angular.module('tablemanager', [
        'ui.bootstrap',
        'mgcrea.ngStrap',
        'sidebar',
        'utils'
    ]);

    require('./tablemanagerController.js');

    // bootstrap the app (async)
    angular.element(document).ready(function () {
        angular.bootstrap(document, ['tablemanager']);
    });
});
