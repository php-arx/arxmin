(function() {
    'use strict';

    /**
    * MenuService
    */
    angular.module('centralApp').factory('MenuService', ['$http', function ($http) {

        var menu = {

        };

        return {
            getMenu : function(){
                return menu;
            },

            getFirst : function(){
                return menu;
            }
        };
    }]); // MenuService
})();