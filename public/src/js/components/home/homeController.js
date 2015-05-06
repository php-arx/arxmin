
angular.module('home')
.controller('HomeController', HomeController);


HomeController.$inject = [
    '$window'
];


function HomeController($window) {

    $scope.menu = $window.menu;

    $scope.myGridLayoutOptions = {
        dimensions: [2,2], // specifies number of columns and rows
    };

    $scope.grids = [{bgColor: "orange"}, {bgColor: "red"}, {bgColor: "green"}, {bgColor: "yellow"}];
}
