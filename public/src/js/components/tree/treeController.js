angular.module('tree')
    .controller('treeController', treeController);

treeController.$inject = [
    '$window',
    '$scope'
];

function treeController($window, $scope) {

    $scope.list = [{
        "id": 1,
        "title": "node1",
        "items": []
    }, {
        "id": 2,
        "title": "node2",
        "items": [{
            "id": 21,
            "title": "node2.1",
            "items": [{
                "id": 211,
                "title": "node2.1.1",
                "items": []
            }, {
                "id": 212,
                "title": "node2.1.2",
                "items": []
            }],
        }, {
            "id": 22,
            "title": "node2.2",
            "items": []
        }],
    }, {
        "id": 3,
        "title": "node3",
        "items": []
    }, {
        "id": 4,
        "title": "node4",
        "items": []
    }];

    $scope.selectedItem = {};

    $scope.options = {};

    $scope.remove = function(scope) {
        scope.remove();
    };

    $scope.toggle = function(scope) {
        scope.toggle();
    };

    $scope.newSubItem = function(scope) {
        console.log('Add item');
        var nodeData = scope.$modelValue;
        nodeData.items.push({
            id: nodeData.id * 10 + nodeData.items.length,
            title: nodeData.title + '.' + (nodeData.items.length + 1),
            items: []
        });
    };
}
