'use strict';

angular.module('app.dossier')

    .controller('updateController', [
        '$scope',
        'Api',
        '$window',
        '$routeParams',
        function($scope, Api, $window, $routeParams) {

        $scope.dossier = {};

        Api.get($routeParams.id)
            .then(function (response) {
                console.log('response', response);
                $scope.dossier = response.data;
            }, function (error) {
                console.log('error', error);
            });


        $scope.update = function (dossier) {

            Api.put(dossier.id, dossier)
                .then(function (response) {
                    console.log('response', response);
                    $window.location.href = '#!dossiers';
                }, function (error) {
                    console.log('error', error);
                });

        };
        
        $scope.back = function() { 
            window.history.back();
        };
    }]);