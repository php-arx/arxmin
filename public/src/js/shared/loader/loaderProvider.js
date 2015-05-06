
angular.module('loader')
.provider('LoaderConfig', LoaderConfigProvider);


function LoaderConfigProvider() {
    var defaults = {
        lines: 11,
        length: 5,
        width: 4,
        radius: 10,
        corners: 1,
        rotate: 0,
        direction: 1,
        color: '#fff',
        speed: 0.8,
        trail: 35,
        shadow: false,
        hwaccel: false,
        className: 'spinner',
        zIndex: 2e9,
        top: '50%',
        left: '50%'
    };

    return {
        setConfig: function (config) {
            angular.extend(defaults, config);
        },
        setCropConfig: function (config) {
            angular.extend(config.crop, config);
        },
        $get: function () {
            return defaults;
        }
    };
} // LoaderConfigProvider
