(function() {
    'use strict';

    /**
     * Central App - app/assets/angular/app.js
     */

    function configuration (datepickerPopupConfig) {
        datepickerPopupConfig.showButtonBar = false;
        datepickerPopupConfig.dateFormat = 'yyyy-MM-dd';
        // datepickerPopupConfig.showWeeks = false; // not working...
    }

    angular.module('arxminApp', [
        //'ngSanitize',
        //'ui.bootstrap',
        //'ui.select2',
        //'angularFileUpload'
    ])
    /*.config(['datepickerPopupConfig', configuration])
        .run(['uiSelect2Config', function (uiSelect2Config) {
            uiSelect2Config.allowClear = true;
        }])
        .run(['$rootScope', function ($rootScope) {
            // Allows you to execute debug functions from the view
            $rootScope.log = function () {
                console.log(Array.prototype.slice.call(arguments));
            };
    }]);*/
})();