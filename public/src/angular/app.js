/**
 * Angular Admin - assets/angular/app.js
 */

var app = angular.module('ngAdmin', [
    'ngSanitize',
    'chieffancypants.loadingBar',
    'ui.state',
    'ui.route'
])

// .constant('', {})

.config(['$stateProvider', '$urlRouterProvider', 'cfpLoadingBarProvider', function ($stateProvider, $urlRouterProvider, cfpLoadingBarProvider) {
    $urlRouterProvider
    .otherwise('/login');

    $stateProvider
    .state('login', {
        url: '/login',
        views: {
            'main': {
                controller: function ($scope) {
                    $scope.url = 'login.html';
                },
                templateUrl: 'assets/templates/wide.tpl.html'
            }
        },
        data: {
            pageTitle: 'Login'
        }
    });

    cfpLoadingBarProvider.includeSpinner = true;
}])

.run(['$rootScope', function ($rootScope) {
    // Allows you to execute debug functions from the view
    $rootScope.log = function () {
        console.log(Array.prototype.slice.call(arguments));
    };
}])

.controller('AppCtrl', ['$scope', '$location', '$state', function ($scope, $location, $state) {
    $scope.onLoginSubmit = function () {console.log($('form').$valid);
        if ($('form').$valid) {
            $state.href('/dashboard');
        }
    };

    $scope.$on('$stateChangeSuccess', function (event, toState, toParams, fromState, fromParams) {
        if (angular.isDefined(toState.data.pageTitle)) {
            $scope.pageTitle = toState.data.pageTitle + ' | Angular Admin' ;
        }
    });

    $scope.$on('$viewContentLoaded', function () {
        $(window).trigger('resize.angular-admin');
    });

    $(document)
    .on('click', '[ui-route] a', function (e) {
        e.preventDefault();

        var $this = $(this),
            route = $this.parents('[ui-route]').attr('ui-route');

        document.location.href = '#'+route;
    });
}])
