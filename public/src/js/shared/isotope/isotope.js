(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define([
            'angular'
        ], factory);
    } else {
        factory(angular);
    }
}) (function (angular) {
    'use strict';

    angular.module('isotope', []);

    require('./isotopeDirective.js');
});
