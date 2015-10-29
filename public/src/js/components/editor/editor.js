require('angular-form-builder');

angular.module('editor', [
    'builder',
    'builder.components',
    'validator.rules'
]);

// bootstrap the app (async)
angular.element(document).ready(function () {
    angular.bootstrap(document, ['editor']);
});

require('./editorController');