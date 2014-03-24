/**
 * Angular Admin - assets/js/main.js
 */


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
