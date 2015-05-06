/**
 * @example
 * Loader.start(); or Loader.start(identifier);
 * Loader.stop(); or Loader.stop(identifier);
 *
 * @todo Add callbacks (onStart, onStop)
 * @todo Hide the element instead of only stop spinner (and so using ngShow)
 */

angular.module('loader')
.service('Loader', LoaderService);


LoaderService.$inject = [
    'LoaderConfig',
    '$log'
];

function LoaderService(LoaderConfig, $log) {
    var instances = {};

    return {
        deregister: function (key) { $log.debug("★ deregister", key);
            key = key || 'global';

            instances[key] && angular.forEach(instances[key], function (id) {
                if (this == key) {
                    instances[key] = null;
                }
            });
        },
        register: function (key, instance, element) { $log.debug("★ register", key, instance, element);
            key = key || 'global';

            instances[key] = {
                active: false,
                element: element,
                instance: instance,
            };

            return [key, instance];
        },
        isActive: function (key) { $log.debug("★ isActive", key, instances);
            key = key || 'global';

            if (instances[key]) {
                return instances[key].active;
            }

            return false;
        },
        start: function (key) { $log.debug("★ start", key, instances);
            key = key || 'global';

            if (instances[key]) {
                instances[key].active = true;
                instances[key].element.removeClass('ng-hide');
                instances[key].instance.spin(instances[key].element[0]);

                return instances[key];
            }

            return false;
        },
        stop: function (key) { $log.debug("★ stop", key, instances);
            key = key || 'global';

            if (instances[key]) {
                instances[key].active = false;
                instances[key].instance.stop();
                instances[key].element.addClass('ng-hide');

                return instances[key];
            }

            return false;
        }
    };
}
