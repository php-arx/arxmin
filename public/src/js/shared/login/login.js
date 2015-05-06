require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'angular-bootstrap',
            'angular-bootstrap-tpls'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('login', [
        'ui.bootstrap'
    ]);

    require('./loginController.js');
});
