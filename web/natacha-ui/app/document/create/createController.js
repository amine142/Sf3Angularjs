'use strict';

var documentModule = angular.module('app.document');

documentModule
    .controller('createDocumentController', ['$scope', 'Document', '$window', function($scope, Document, $window) {

        $scope.document = {};
        
        
        $scope.createDoc= function (document, id, item) {
        
            Document.post(document, id, item)
                .then(function (result) {
                    $scope.cancel();
                    
                    console.log('result', result);
                 
                }, function (error) {
                    console.log('error', error);
                })
        };
        
    }]);


