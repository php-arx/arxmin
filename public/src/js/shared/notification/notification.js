require('../../config.js');

(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular',
            'angular-notify'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('notification', ['cgNotify'])

    // allow to use the notification interceptor
    .config(function ($httpProvider) {
        $httpProvider.interceptors.push('notificationInterceptor');
    });

    require('./notificationService.js');
    require('./notificationInterceptorService.js');
});
