
angular.module('login')
.controller('LoginController', LoginController);


LoginController.$inject = [
    '$window'
];


function LoginController($window) {
    var _this = this;
    var defaults = $window.__app || {};

    _this.test = 'Hello world!';

    // ...
}
