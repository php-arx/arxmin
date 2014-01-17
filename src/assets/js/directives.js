/**
 * Directives
 */

// We use body directive instead of jQuery.ready
myApp.directive('body', function () {
    return {

        restrict: 'ACE',
        link: function ($scope, $element, $attrs) {
//            $('[rel^="external"], [rel*="external"]').attr('target', '_blank');
//
//            $element.scrollspy({target: '.navbar-collapse', offset: 65});
//
//            if ($(window.location.hash).length) {
//                $(window.location.hash).scrollToMe();
//            }
//
//            $('[href^="#"]')
//            .each(function () {
//                var $el = $(this), $target = $($el.attr('href'));
//
//                if (!$target.length || $el.is('[data-toggle], [data-target], [data-slide]')) {
//                    return;
//                }
//
//                $el.on('click', function (e) {
//                    e.preventDefault();
//
//                    $target.scrollToMe(- $('#navigation').outerHeight());
//                });
//            });
        } // link

    };
}); // body