
angular.module('notification')
.service('NorificationInterceptor', NotificationInterceptorService);


NotificationInterceptorService.$inject = [];

/**
 * Intercept $http requests and display notifications if a data.notifications is present in the response object.
 */
function NotificationInterceptorService() {
    var _this = this;

    _this.response = responseHandler;
    _this.responseError = responseErrorHandler;


    //////////////////////////////////////////////////

    function responseHandler(response) {
        if (response.data.notifications) {
            notify(response.data.notifications, {
                classes: 'alert-dismissible alert-success'
            });
        }

        return response;
    }

    function responseErrorHandler(response) {
        if (response.data.notifications) {
            notify(response.data.notifications, {
                classes: 'alert-dismissible alert-danger'
            });
        }

        return response;
    }

    function notify(notifications, options) {
        if (typeof notifications === 'string') {
            notifications = {
                title: notifications
            };
        }

        $injector.get('NotificationService')(notifications, options);
    }
}
