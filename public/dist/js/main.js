/**
 * angular-admin - v0.0.1 - 2014-03-19
 * 
 *
 * Copyright (c) 2014 [object Object]
 * Licensed  <>
 */


(function (window, angular, undefined) {$.extend($.fn, {
    background: function () {
        return this.each(function () {
            var $this = $(this);

            $this.find('img')
            .on('load.angular-admin.background', function () {
                if ('backgroundSize' in document.documentElement.style) { // or Modernizr.backgroundsize
                    $this.css({
                        backgroundImage: 'url('+$(this).addClass('sr-only').attr('src')+')'
                    });
                } else {
                    // @TODO Do aspect-ratio max height/width depending to the container
                }

                $this.parent()
                .addClass('background-container');
            });
        });
    }, // background

    disable: function () {
        // @TODO Deep testing
        return this.each(function () {
            var context = this.context
                selector = context.localName+'.'+context.className.replace(' ', '.');

            $(document)
            .on('click.angular-admin.disable', selector, function (e) {
                var $this = $(this);

                if ($this.hasClass('disabled')) {
                    e.preventDefault();
                } else {
                    setTimeout(function () {
                        $this.attr('disabled', 'disabled').addClass('disabled');

                        setTimeout(function () {
                            $this.removeAttr('disabled').removeClass('disabled');
                        }, 1000);
                    }, 400);
                }
            });
        });
    }, // disable

    fullHeight: function () {
        return this.each(function () {
            var $this = $(this);

            $(window)
            .on('resize.angular-admin.fullHeight', function () {
                var h = $(this).height();

                $this.height(h);
            })
            .on('load.angular-admin.fullHeight', function () {
                $(window).trigger('resize.angular-admin.fullHeight');
            });
        });
    }, // fullHeight

    outerHTML: function () {
        return $('<i></i>').append(this.clone()).html();
    }, // outerHTML

    scrollToMe: function (offset) {
        var $this = $(this);

        offset = offset || $this.data('offsetTop') || 0;

        $('body').animate({scrollTop: $this.offset().top + offset}, 500);
    }, // scrollToMe
});


var UTIL = {
    fire: function (func, funcname, args) {
        var namespace = window.Page;

        funcname = (funcname === undefined) ? 'init' : funcname;

        if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
            namespace[func][funcname](args);
        }
    }, // fire

    loadEvents: function () {
        UTIL.fire('common');

        $.each(document.body.className.split(/\s+/), function (i, classnm) {
            UTIL.fire(classnm);
        });

        UTIL.fire('common', 'finalize');
    } // loadEvents
}; // UTIL


var IE = (function () {
    var version = 3,
        div = document.createElement('div'),
        all = div.getElementsByTagName('i');

    while (
        div.innerHTML = '<!--[if gt IE ' + (++version) + ']><i></i><![endif]-->',
        all[0]
    );

    return version > 4 ? version : false;
} ()); // IE


// @TODO Make isMobile callable for returning which mobile it is
var isMobile = {
    Android: function () {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function () {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
}; // isMobile


var isRetina = (function () {
    var root = (typeof exports == 'undefined' ? window : exports),
        mediaQuery = "(-webkit-min-device-pixel-ratio: 1.5),(min--moz-device-pixel-ratio: 1.5),(-o-min-device-pixel-ratio: 3/2),(min-resolution: 1.5dppx)";

    if (root.devicePixelRatio > 1) {
        return true;
    }

    if (root.matchMedia && root.matchMedia(mediaQuery).matches) {
        return true;
    }

    return false;
}) (); // isRetina

// Modified http://paulirish.com/2009/markup-based-unobtrusive-comprehensive-dom-ready-execution/
var Page = {
    common: {
        init: function () {
            $('a[rel^="external"], a[rel*="external"]').attr('target', '_blank');

            // lazyload & retina
            $('img[data-src]')
            .unveil(150, function () {
                $(this).load(function () {
                    this.style.opacity = 1;
                });
            });

            $('.carousel')
            .each(function () {
                var $this = $(this);

                $this.find('div.carousel-inner').add('.carousel-inner .item')
                .height($this.height());
            });

            $('.full-height').fullHeight();

            $('.background').background();

            // manage hash
            // if ($(window.location.hash).length) {
            //     $(window.location.hash).scrollToMe();
            // }

            // $('a[href^="#"]')
            // .each(function () {
            //     var $el = $(this), $target = $($el.attr('href'));

            //     if (!$target.length || $el.is('[data-toggle], [data-target], [data-slide]')) {
            //         return;
            //     }

            //     $el
            //     .on('click', function (e) {
            //         e.preventDefault();

            //         $target.scrollToMe();
            //     });
            // });

            // Focus state for append/prepend inputs
            $('.input-prepend, .input-append')
            .on('focus', 'input', function () {
                $(this).closest('.control-group, form').addClass('focus');
            })
            .on('blur', 'input', function () {
                $(this).closest('.control-group, form').removeClass('focus');
            });
        }, // init

        finalize: function () {
            // IE specific
            if (IE) {
                $('html').removeClass('no-js').addClass('lt-ie' + (IE + 1));

                $('input, textarea').placeholder();

                $('img').each(function () {
                    var $this = $(this);

                    $this.css({
                        height: 'auto',
                        width: $this.attr('width') + 'px'
                    });
                });
            }
        } // finalize
    }, // common
}; // Page


// expose Page
window.Page = Page;


$(document)
.ready(UTIL.loadEvents);


$(window)
.on('resize.angular-admin', function () {
    $('.layout-container, .content-iframe').height('auto').height($('.layout-container').outerHeight());
})
.load(function () {
    $('html').addClass('loaded');
    $(window).trigger('resize.angular-admin');
});

var app = angular.module('ngAdmin', [
    'ngSanitize',
    'chieffancypants.loadingBar',
    'ui.state',
    'ui.route'
])

// .constant('', {})

.config(['$stateProvider', '$urlRouterProvider', 'cfpLoadingBarProvider', function ($stateProvider, $urlRouterProvider, cfpLoadingBarProvider) {
    $urlRouterProvider
    .otherwise('/login');

    $stateProvider
    .state('login', {
        url: '/login',
        views: {
            'main': {
                controller: function ($scope) {
                    $scope.url = 'login.html';
                },
                templateUrl: 'assets/templates/wide.tpl.html'
            }
        },
        data: {
            pageTitle: 'Login'
        }
    });

    cfpLoadingBarProvider.includeSpinner = true;
}])

.run(['$rootScope', function ($rootScope) {
    // Allows you to execute debug functions from the view
    $rootScope.log = function () {
        console.log(Array.prototype.slice.call(arguments));
    };
}])

.controller('AppCtrl', ['$scope', '$location', '$state', function ($scope, $location, $state) {
    $scope.onLoginSubmit = function () {console.log($('form').$valid);
        if ($('form').$valid) {
            $state.href('/dashboard');
        }
    };

    $scope.$on('$stateChangeSuccess', function (event, toState, toParams, fromState, fromParams) {
        if (angular.isDefined(toState.data.pageTitle)) {
            $scope.pageTitle = toState.data.pageTitle + ' | Angular Admin' ;
        }
    });

    $scope.$on('$viewContentLoaded', function () {
        $(window).trigger('resize.angular-admin');
    });

    $(document)
    .on('click', '[ui-route] a', function (e) {
        e.preventDefault();

        var $this = $(this),
            route = $this.parents('[ui-route]').attr('ui-route');

        document.location.href = '#'+route;
    });
}])

.config(['$stateProvider', function ($stateProvider) {
    $stateProvider
    .state('dashboard', {
        url: '/dashboard',
        views: {
            'main': {
                controller: function ($scope, $sce) {
                    $scope.url = 'dashboard.html';

                    $scope.pageTitle = 'Dashboard';

                },
                templateUrl: 'assets/templates/with-sidebar.tpl.html'
            }
        },
        data: {
            pageTitle: 'Dashboard'
        }
    });
}])

.config(['$stateProvider', function ($stateProvider) {
    $stateProvider
    .state('iframe', {
        url: '/iframe',
        views: {
            'main': {
                controller: function ($scope, $sce) {
                    // $scope.pageTitle = 'Dashboard';

                    $scope.url = 'iframe.html';
                },
                templateUrl: 'assets/templates/with-sidebar.tpl.html'
            }
        },
        data: {
            pageTitle: 'Iframe'
        }
    });
}])
}) (window, window.angular);