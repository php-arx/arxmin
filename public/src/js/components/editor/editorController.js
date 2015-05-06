
angular.module('editor')
.controller('editorController', editorController);


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
