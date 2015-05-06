/**
 * MainController
 */
angular.module(window.__component_name)
.controller('MainController', MainController);


MainController.$inject = [
    '$window'
];

function MainController($window) {
    $scope.menu = $window.menu;
}