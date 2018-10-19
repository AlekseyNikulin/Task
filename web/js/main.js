
var app = angular.module("MyApp", [
    'ngAnimate',
    'ui.bootstrap',
]);

var taskPageSize = 10;

app.filter('offset', function() {
    return function(input, start) {
        start = parseInt(start, 10);
        return input.slice(start);
    };
});

app.service('taskService', function($http) {
    this.get = function(id) {
        url = "/api/v1/task";
        return id ? $http.get( url + '/' + id) : $http.get(url);
    };
});

app.controller("PaginationCtrl", ['$scope','taskService', function($scope, taskService) {
    $scope.itemsPerPage = taskPageSize;
    $scope.currentPage = 0;
    $scope.items = [];
    $scope.itemsMemory = [];
    $scope.itemId = [];
    taskService.get().then(function(data){
        $scope.items = data.data;
    });
    $scope.range = function() {
        var rangeSize = 5;
        var ret = [];
        var start;
        start = $scope.currentPage;
        if ( start > $scope.pageCount()-rangeSize ) {
            start = $scope.pageCount()-rangeSize+1;
        }

        for (var i=start; i<start+rangeSize; i++) {
            ret.push(i);
        }
        return ret;
    };

    $scope.prevPage = function() {
        if ($scope.currentPage > 0) {
            $scope.currentPage--;
        }
    };

    $scope.prevPageDisabled = function() {
        return $scope.currentPage === 0 ? "disabled" : "";
    };

    $scope.pageCount = function() {
        return Math.ceil($scope.items.length/$scope.itemsPerPage)-1;
    };

    $scope.nextPage = function() {
        if ($scope.currentPage < $scope.pageCount()) {
            $scope.currentPage++;
        }
    };

    $scope.nextPageDisabled = function() {
        return $scope.currentPage === $scope.pageCount() ? "disabled" : "";
    };

    $scope.setPage = function(n) {
        $scope.currentPage = n;
    };

    $scope.taskModal = function(data){
        if(data) {
            $scope.task_selected = data;
            $('#myModal').modal();
        }
    };

    $scope.taskOne = function (item){
        if(typeof $scope.itemsMemory[item.id] !== "undefined"){
            $scope.taskModal($scope.itemsMemory[item.id]);
        } else {
            taskService.get(item.id).then(function(data){
                if(data) {
                    $scope.itemsMemory[item.id] = data.data;
                    $scope.taskModal(data.data);
                }
            });
        }
    };
}]);
