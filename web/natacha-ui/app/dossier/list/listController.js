'use strict';

angular.module('app.dossier')

        .controller('listController', ['$scope', 'Api', '$filter', 'DTOptionsBuilder', 'DTColumnBuilder','DTColumnDefBuilder', 
            function ($scope, Api, $filter, DTOptionsBuilder, DTColumnBuilder, DTColumnDefBuilder ) {

                $scope.dossiers = [];
                var $vm = this;
                Api.getAll()
                        .then(function (result) {
                            console.log('result', result);
                            $scope.dossiers = result.data;


                        }, function (error) {
                            console.log('error', error);
                        });
                $scope.vm = {};
 
                $scope.vm.dtOptions = DTOptionsBuilder.newOptions()
                                    .withOption('order', [0, 'asc']);
                $scope.remove = function (id) {
                    Api.remove(id)
                            .then(function (result) {
                                console.log('result', result);
                                $scope.dossiers = $filter('filter')($scope.dossiers, function (value, index, array) {
                                    return value.id !== id;
                                });

                            }, function (error) {
                                console.log('error', error);
                            });
                }

            }]);