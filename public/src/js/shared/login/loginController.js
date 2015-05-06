
angular.module('login')
.controller('LoginController', LoginController);


LoginController.$inject = [
    '$window',
    '$modal'
];


function LoginController($window, $modal) {
    var _this = this;
    var defaults = $window.__app || {};

    _this.open = openModal;


    //////////////////////////////////////////////////

    function openModal(e) {
        e.preventDefault();

        // prevent angular jQlite fail
        var template = angular.element('#modal-login-tpl').html() || $('#modal-login-tpl').html();

        var modalInstance = $modal.open({
            backdrop: true,
            controller: ModalInstanceCtrl,
            template: template,
            size: 'md',
            windowClass: 'modal-login'
        });
    }


    ModalInstanceCtrl.$inject = ['$scope', '$modalInstance'];

    function ModalInstanceCtrl($scope, $modalInstance) {
        $scope.cancel = function () {
            $modalInstance.dismiss();
        };
    }
}
