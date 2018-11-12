'use strict';

angular.module('app.document')

    .controller('updateDocumentController', [
        '$scope',
        'Document',
        '$window',
        '$routeParams', 
         
        function($scope, Document, $window, $routeParams ) {

        $scope.document = {};
       
        Document.get($scope.child)
            .then(function (response) {
                console.log('response', response);
                $scope.document = response.data; 
                $scope.document.parent = $scope.parent;
                $scope.document.item = $scope.item;
            }, function (error) {
                console.log('error', error);
            });
        $scope.vm = {};
 
        
        $scope.updateDoc = function (document) {

            Document.put(document.id, document)
                .then(function (response) {
                    console.log('response', response);
                    $window.location.href = '#!dossiers/update/'+$scope.parent;
                    $scope.cancel();
                }, function (error) {
                    console.log('error', error);
                });

        };
        
        $scope.back = function() { 
            window.history.back();
        };
        
    }]);
