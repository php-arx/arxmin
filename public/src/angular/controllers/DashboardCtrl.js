/**
 * Angular Admin - assets/angular/controllers/DashboardCtrl.js
 */


.config(['$stateProvider', function ($stateProvider) {
    $stateProvider
    .state('dashboard', {
        url: '/dashboard',
        views: {
            'main': {
                controller: function ($scope, $sce) {
                    $scope.url = 'dashboard.html';

                    $scope.pageTitle = 'Dashboard';

                },
                templateUrl: 'assets/templates/with-sidebar.tpl.html'
            }
        },
        data: {
            pageTitle: 'Dashboard'
        }
    });
}])
