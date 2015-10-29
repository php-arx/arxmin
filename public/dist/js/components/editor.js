(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);throw new Error("Cannot find module '"+o+"'")}var f=n[o]={exports:{}};t[o][0].call(f.exports,function(e){var n=t[o][1][e];return s(n?n:e)},f,f.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
angular.module('editor').controller('editorController', editorController);


editorController.$inject = [
    '$window',
    '$scope',
    '$builder',
    '$validator'
];

function editorController($window, $scope, $builder, $validator) { console.log('-> editorController');

    $scope.fields = window.__app.scope.fields;

    for(key in $scope.fields){
        $builder.addFormObject('default', $scope.fields[key]);
    }

    $scope.form = $builder.forms['default'];
    $scope.input = [];

    return $scope.save = function() {

    };

}

},{}],2:[function(require,module,exports){
angular.module('editor', [
    'builder',
    'builder.components',
    'validator.rules'
]);

// bootstrap the app (async)
angular.element(document).ready(function () {
    angular.bootstrap(document, ['editor']);
});

require('./editorController');
},{"./editorController":1}]},{},[2])
//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIi9Wb2x1bWVzL0RBVEEvX1NFUlZFUi9BZG1pbi9ub2RlX21vZHVsZXMvZ3VscC1icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyaWZ5L25vZGVfbW9kdWxlcy9icm93c2VyLXBhY2svX3ByZWx1ZGUuanMiLCIvVm9sdW1lcy9EQVRBL19TRVJWRVIvQWRtaW4vc3JjL2pzL2NvbXBvbmVudHMvZWRpdG9yL2VkaXRvckNvbnRyb2xsZXIuanMiLCIvVm9sdW1lcy9EQVRBL19TRVJWRVIvQWRtaW4vc3JjL2pzL2NvbXBvbmVudHMvZWRpdG9yL2Zha2VfZWQzMjQxMzYuanMiXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUNBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7O0FDMUJBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQSIsImZpbGUiOiJnZW5lcmF0ZWQuanMiLCJzb3VyY2VSb290IjoiIiwic291cmNlc0NvbnRlbnQiOlsiKGZ1bmN0aW9uIGUodCxuLHIpe2Z1bmN0aW9uIHMobyx1KXtpZighbltvXSl7aWYoIXRbb10pe3ZhciBhPXR5cGVvZiByZXF1aXJlPT1cImZ1bmN0aW9uXCImJnJlcXVpcmU7aWYoIXUmJmEpcmV0dXJuIGEobywhMCk7aWYoaSlyZXR1cm4gaShvLCEwKTt0aHJvdyBuZXcgRXJyb3IoXCJDYW5ub3QgZmluZCBtb2R1bGUgJ1wiK28rXCInXCIpfXZhciBmPW5bb109e2V4cG9ydHM6e319O3Rbb11bMF0uY2FsbChmLmV4cG9ydHMsZnVuY3Rpb24oZSl7dmFyIG49dFtvXVsxXVtlXTtyZXR1cm4gcyhuP246ZSl9LGYsZi5leHBvcnRzLGUsdCxuLHIpfXJldHVybiBuW29dLmV4cG9ydHN9dmFyIGk9dHlwZW9mIHJlcXVpcmU9PVwiZnVuY3Rpb25cIiYmcmVxdWlyZTtmb3IodmFyIG89MDtvPHIubGVuZ3RoO28rKylzKHJbb10pO3JldHVybiBzfSkiLCJhbmd1bGFyLm1vZHVsZSgnZWRpdG9yJykuY29udHJvbGxlcignZWRpdG9yQ29udHJvbGxlcicsIGVkaXRvckNvbnRyb2xsZXIpO1xuXG5cbmVkaXRvckNvbnRyb2xsZXIuJGluamVjdCA9IFtcbiAgICAnJHdpbmRvdycsXG4gICAgJyRzY29wZScsXG4gICAgJyRidWlsZGVyJyxcbiAgICAnJHZhbGlkYXRvcidcbl07XG5cbmZ1bmN0aW9uIGVkaXRvckNvbnRyb2xsZXIoJHdpbmRvdywgJHNjb3BlLCAkYnVpbGRlciwgJHZhbGlkYXRvcikgeyBjb25zb2xlLmxvZygnLT4gZWRpdG9yQ29udHJvbGxlcicpO1xuXG4gICAgJHNjb3BlLmZpZWxkcyA9IHdpbmRvdy5fX2FwcC5zY29wZS5maWVsZHM7XG5cbiAgICBmb3Ioa2V5IGluICRzY29wZS5maWVsZHMpe1xuICAgICAgICAkYnVpbGRlci5hZGRGb3JtT2JqZWN0KCdkZWZhdWx0JywgJHNjb3BlLmZpZWxkc1trZXldKTtcbiAgICB9XG5cbiAgICAkc2NvcGUuZm9ybSA9ICRidWlsZGVyLmZvcm1zWydkZWZhdWx0J107XG4gICAgJHNjb3BlLmlucHV0ID0gW107XG5cbiAgICByZXR1cm4gJHNjb3BlLnNhdmUgPSBmdW5jdGlvbigpIHtcblxuICAgIH07XG5cbn1cbiIsImFuZ3VsYXIubW9kdWxlKCdlZGl0b3InLCBbXG4gICAgJ2J1aWxkZXInLFxuICAgICdidWlsZGVyLmNvbXBvbmVudHMnLFxuICAgICd2YWxpZGF0b3IucnVsZXMnXG5dKTtcblxuLy8gYm9vdHN0cmFwIHRoZSBhcHAgKGFzeW5jKVxuYW5ndWxhci5lbGVtZW50KGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKSB7XG4gICAgYW5ndWxhci5ib290c3RyYXAoZG9jdW1lbnQsIFsnZWRpdG9yJ10pO1xufSk7XG5cbnJlcXVpcmUoJy4vZWRpdG9yQ29udHJvbGxlcicpOyJdfQ==
