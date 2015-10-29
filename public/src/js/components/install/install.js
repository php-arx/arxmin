

'use strict';

angular.module('install', [
    'ui.bootstrap',
    'mgcrea.ngStrap',
    //'famous.angular',
    'sidebar',
    'utils'
]);

require('./installController.js');

// bootstrap the app (async)
angular.element(document).ready(function () {
    angular.bootstrap(document, ['install']);
});

$(function () {

    $('.navbar-toggle').click(function () {
        $('.navbar-nav').toggleClass('slide-in');
        $('.side-body').toggleClass('body-slide-in');
        $('#search').removeClass('in').addClass('collapse').slideUp(200);

    });

    // Remove menu for searching
    $('#search-trigger').click(function () {
        $('.navbar-nav').removeClass('slide-in');
        $('.side-body').removeClass('body-slide-in');
    });
});
