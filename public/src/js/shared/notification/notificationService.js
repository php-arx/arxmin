
angular.module('notification')
.service('NotificationService', NotificationService);


NotificationService.$inject = [
    '$rootScope',
    'notify'
];

/**
 * Allow to display simple notifications.
 *
 * @see https://github.com/cgross/angular-notify#notifyconfigobject
 * @see https://github.com/cgross/angular-notify#notifystringobject
 *
 * @example
 * NotificationService('Everything is fine!', {
 *     classes: 'alert-success'
 * });
 *
 * @example
 * NotificationService({
 *     title: 'Everything is fine!',
 *     content: 'Everything is fine in every location!'
 * }, {
 *     classes: 'alert-success',
 *     messageTemplate: '<strong>{{ title }}</strong><p>{{ content }}</p>',
 *     position: 'center'
 * });
 *
 * @example
 * NotificationService('Everything is fine!', {
 *     classes: 'alert-success',
 *     messageTemplate: '<strong>{{ title }}</strong><p>{{ content }}</p>',
 *     position: 'center'
 * }, {
 *     duration: 5000,
 *     startTop: 150
 * });
 */
function NotificationService($rootScope, notify) {
    return function (notifications, options, config) {
        if (notifications) {
            if (!angular.isArray(notifications)) {
                notifications = [notifications];
            }

            angular.forEach(notifications, notifyHelper);

            function notifyHelper(notification) {
                var _scope = $rootScope.$new();

                if (typeof notification === 'string') {
                    notification = {
                        title: notification
                    };
                }

                _scope = angular.extend(_scope, notification);


                // @see https://github.com/cgross/angular-notify#notifyconfigobject
                config = angular.extend({}, config);

                notify.config(config);


                // @see https://github.com/cgross/angular-notify#notifystringobject
                options = angular.extend({
                    classes: 'alert-dismissible alert-info',
                    messageTemplate: '<img class="pull-left" ng-src="{{ image }}" ng-if="image" /><strong ng-if="title">{{ title }}</strong><span ng-if="text">{{ text }}</span>',
                    position: 'right',
                    scope: _scope
                }, options);

                notify(options);
            }
        }
    };
}
