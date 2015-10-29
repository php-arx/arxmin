
angular.module('install').controller('installController', installController);


installController.$inject = [
    '$scope',
    '$http',
    '$window'
];


function installController($scope, $http, $window) {

    $scope.scope = $window.__app;

    $scope.database = $window.__app.database;

    $scope.menu = $window.menu;

    $scope.db = {
        success : null
    };

    $scope.checkDb = function(){
        $http.post('install/check-db').success(function(data){
            $scope.db.success = true;
        }).error(function(data){
            $scope.db.success = false;
        });
    }

}
