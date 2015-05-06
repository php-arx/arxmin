
angular.module('user')
.service('UserService', UserService);


UserService.$inject = [
    '$rootScope',
    '$window',
    '$timeout',
    'store',
    '$base64'
];

/**
 * Retrieve or set the current user object information.
 * Store it base64 encoded in localstorage or cookie.
 *
 * @example
 * var user = UserService.getCurrent();
 *
 * @example
 * var user = UserService.setCurrent(userObject);
 *
 * @example
 * var user = UserService.user;
 */
function UserService($rootScope, $window, $timeout, store, $base64) {
    var _this = this;

    _this.user = null;

    // try to get the user from the global
    if ($window.__app && $window.__app.user) {
        _this.user = $window.__app.user;
    }

    _this.setCurrent = setCurrent;
    _this.getCurrent = getCurrent;


    //////////////////////////////////////////////////

    /**
     * Set the current user + store the information (localstorage or cookie).
     *
     * @param {object} user User object
     * @return {object} User object
     */
    function setCurrent(user) {
        _this.user = user;

        store.set('user', $base64.encode(JSON.stringify(user)));

        return _this.user;
    }

    /**
     * Get the current user. If not already available, get him from the storage (localstorage or cookie).
     *
     * @return {object} User object
     */
    function getCurrent() {
        if (!_this.user) {
            _this.user = JSON.parse($base64.decode(store.get('user') || 'e30='));
        }

        return _this.user;
    }
}
