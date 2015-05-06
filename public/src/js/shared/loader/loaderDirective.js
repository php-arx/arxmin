/**
 * @example
 * <loader options="optionsObject" ng-show="isLoading" id="my-loader"></loader>
 *
 * @example
 * <div loader="optionsObject" ng-show="isLoading" id="my-loader"><p>Loading...</p></div>
 *
 * @todo Generate key instead of using "undefined"
 */

var Spinner = require('spin');


angular.module('loader')
.directive('loader', LoaderDirective);


LoaderDirective.$inject = [
    'LoaderConfig',
    'Loader',
    '$parse',
    '$timeout',
    '$log'
];

function LoaderDirective(LoaderConfig, Loader, $parse, $timeout, $log) {
    return {
        restrict: 'AE',
        scope: true,
        transclue: true,
        link: function (scope, element, attrs) {
            if (!Spinner) {
                return $log.error('☠ Spinner is missing!');
            }

            scope.key = attrs.id || 'global';
            scope.element = element;

            scope.element.addClass('ng-hide');

            function register(options) { $log.debug("∅ register", options, scope.key);
                options = angular.extend(LoaderConfig, scope.$eval(options || attrs.options));

                Loader.register(scope.key, new Spinner(options), scope.element);

                if (attrs.show) {
                    Loader.start(scope.key);
                }
            } // register

            scope.$watch(attrs.loader, register);
            scope.$watch(attrs.options, register);

            if (attrs.ngShow) {
                scope.$watch(attrs.ngShow, function (isLoading) { $log.debug("∅ observe ngShow", isLoading);
                    if (isLoading) {
                        Loader.start(scope.key);
                    } else {
                        $timeout(function () {
                            Loader.stop(scope.key);
                        });
                    }
                });
            }

            if (attrs.id) {
                attrs.$observe('id', function (id) {
                    scope.key = id;
                });
            }

            scope.$on('$destroy', function () {
                Loader.stop(scope.key);
                Loader.deregister(scope.key);
            });
        }
    };
}
