'use strict';

var documentModule = angular.module('app.document');

documentModule
    .controller('createDocumentController', ['$scope', 'Document', '$window', function($scope, Document, $window) {

        $scope.document = {};
      
        
        $scope.createDoc= function (document) {
        
            Document.post(document)
                .then(function (result) {
                    $window.location.href = '#!dossiers/update/'+$scope.parent;
                    $scope.cancel();
                    console.log($scope);
                    console.log('result', result);
                 
                }, function (error) {
                    console.log('error', error);
                })
        };
        
    }]);


