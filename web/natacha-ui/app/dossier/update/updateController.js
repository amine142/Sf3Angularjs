'use strict';
angular.module('app.dossier')

        .controller('updateController', [
            '$scope',
            'Api',
            '$window',
            '$routeParams',
            'DTOptionsBuilder',
            '$uibModal',
            function ($scope, Api, $window, $routeParams, DTOptionsBuilder, $uibModal) {

                $scope.dossier = {};

                Api.get($routeParams.id)
                        .then(function (response) {
                            console.log('response', response);
                            $scope.dossier = response.data;
                        }, function (error) {
                            console.log('error', error);
                        });

                $scope.vm = {};

                $scope.vm.dtOptions = DTOptionsBuilder.newOptions()
                        .withOption('order', [0, 'asc']);
                $scope.update = function (dossier) {

                    Api.put(dossier.id, dossier)
                            .then(function (response) {
                                console.log('response', response);
                                $window.location.href = '#!dossiers';
                            }, function (error) {
                                console.log('error', error);
                            });

                };

                $scope.back = function () {
                    window.history.back();
                };

                $scope.openModal = function (id, child , item) {
                    var template = (child !== null)? 'document/update/update.html':'document/create/create.html'
                    $uibModal.open({
                        templateUrl: template,
                        controller: function ($scope, $uibModalInstance) {

                            $scope.parent = id;
                            $scope.item = item;
                            $scope.child = child;
                            $scope.cancel = function () {
                                $uibModalInstance.close(false);
                            };
                        }
                    })
                };


            }]);
