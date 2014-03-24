/**
 * Angular Admin - assets/angular/controllers/IframeCtrl.js
 */

.config(['$stateProvider', function ($stateProvider) {
    $stateProvider
    .state('iframe', {
        url: '/iframe',
        views: {
            'main': {
                controller: function ($scope, $sce) {
                    // $scope.pageTitle = 'Dashboard';

                    $scope.url = 'iframe.html';
                },
                templateUrl: 'assets/templates/with-sidebar.tpl.html'
            }
        },
        data: {
            pageTitle: 'Iframe'
        }
    });
}])
