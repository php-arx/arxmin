require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'angular-storage',
            'angular-base64'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('user', [
        'angular-storage',
        'base64'
    ]);

    require('./userService.js');
});
