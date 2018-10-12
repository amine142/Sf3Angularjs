'use strict';

angular.module('app.document')

        .controller('listController', ['$scope', 'Api', '$filter', 
            function ($scope, Api, $filter ) {

                $scope.documents = [];
                

            }]);