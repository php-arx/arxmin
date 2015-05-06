require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'ckeditor',
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
            'shared/utils',
            'angular-form-builder-components'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('editor', [
        'ui.bootstrap',
        'mgcrea.ngStrap',
        //'famous.angular',
        'sidebar',
        'utils',
        'builder',
        'builder.components',
        'validator.rules'
    ]);

    require('./editorController.js');

    // bootstrap the app (async)
    angular.element(document).ready(function () {
        angular.bootstrap(document, ['editor']);
    });
});
