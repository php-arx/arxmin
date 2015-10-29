angular.module('datamanager', [
    'ui.bootstrap',
    'mgcrea.ngStrap',
    //'famous.angular',
    'sidebar',
    'utils'
]);

angular.element(document).ready(function () {
    angular.bootstrap(document, ['datamanager']);
});
