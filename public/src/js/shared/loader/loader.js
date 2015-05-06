(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['angular'], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('loader', [])

    .config(['$logProvider', function ($logProvider) {
        $logProvider.debugEnabled(false);
    }]);

    require('./loaderProvider.js');

    require('./loaderService.js');

    require('./loaderDirective.js');

});
