
angular.module('sidebar')
.controller('SidebarController', SidebarController);


SidebarController.$inject = [
    '$scope',
    '$filter',
    '$timeout',
    '$window'
];

function SidebarController($scope, $filter, $timeout, $window) {
    var _this = this;
    var __app = $window.__app || {};

    _this.status = false;
    _this.visible = true;
    _this.menu = __app.menu;

    _this.isActive = isActive;

    //console.log('Menu', _this.menu);

    $timeout(function () {
        _this.status = 'loaded';
    });


    //////////////////////////////


    function isActive(item) {

        var current = $window.location.href.split('?')[0];

        var regex = new RegExp(item.link,"gi");

        if (item.link === current) {
            return true;
        } else if(current.match(regex)){
            return true;
        } else {
            var results = $filter('filter')(item.children, {link: current}, true);
            return (results && results.length ? true : false);
        }
    } // isActive
} // SidebarController
