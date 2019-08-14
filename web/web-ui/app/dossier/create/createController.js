'use strict';

angular.module('app.dossier')

    .controller('createController', ['$scope', 'Api', '$window', function($scope, Api, $window) {

        $scope.dossier = {};

        $scope.create = function (dossier) {

            Api.post(dossier)
                .then(function (result) {
                    console.log('result', result);
                    $window.location.href = '#!dossiers';
                }, function (error) {
                    console.log('error', error);
                })
        };
        $scope.back = function() { 
            window.history.back();
        };
    }]);