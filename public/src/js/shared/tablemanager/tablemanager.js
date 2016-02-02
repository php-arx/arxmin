angular.module('tablemanager', [
    'ui.bootstrap',
    'mgcrea.ngStrap',
    'sidebar',
    'utils'
]);

//require('tablemanagerController.js');

// bootstrap the app (async)
angular.element(document).ready(function () {
    angular.bootstrap(document, ['tablemanager']);
});
