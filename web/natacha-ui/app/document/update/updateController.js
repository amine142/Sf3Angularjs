'use strict';

angular.module('app.document')

    .controller('updateController', [
        '$scope',
        'Api',
        '$window',
        '$routeParams', 
         
        function($scope, Api, $window, $routeParams ) {

        $scope.document = {};

        Api.get($routeParams.id)
            .then(function (response) {
                console.log('response', response);
                $scope.document = response.data;
            }, function (error) {
                console.log('error', error);
            });

        $scope.vm = {};
 
        
        $scope.update = function (document) {

            Api.put(document.id, document)
                .then(function (response) {
                    console.log('response', response);
                    $window.location.href = '#!documents';
                }, function (error) {
                    console.log('error', error);
                });

        };
        
        $scope.back = function() { 
            window.history.back();
        };
        
    }]);
