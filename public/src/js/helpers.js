/**
 * Angular Admin - assets/js/helpers.js
 */


$.extend($.fn, {
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
