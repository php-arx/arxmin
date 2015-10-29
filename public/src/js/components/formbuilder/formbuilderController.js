
angular.module('formbuilder')
.controller('formbuilderController', formbuilderController);


formbuilderController.$inject = [
    '$scope', '$builder', '$validator'
];

function formbuilderController($scope, $builder, $validator) { console.log('-> formbuilderController');

    $scope.fields = window.__app.scope.fields;

    for(key in $scope.fields){
        $builder.addFormObject('default', $scope.fields[key]);
    }

    $scope.form = $builder.forms['default'];
    $scope.input = [];

    return $scope.save = function() {

    };
}
