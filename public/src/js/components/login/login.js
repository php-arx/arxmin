require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'shared/notification',
            'shared/user'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('login', []);

    require('./loginController.js');

    // bootstrap the app (async)
    angular.element(document).ready(function () {
        angular.bootstrap(document, ['login']);
    });
});
