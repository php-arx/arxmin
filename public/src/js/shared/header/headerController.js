
angular.module('header')
.controller('HeaderController', HeaderController);


HeaderController.$inject = [
    '$scope',
    '$timeout'
];

function HeaderController($scope, $timeout) {
    var _this = this;
    var __app = window.__app || {};


    $timeout(function () {
        initialize();
    });

    //////////////////////////////

    function initialize() {}
}
