'use strict';

angular.module('app.document', ['ngRoute', 'ngLoadingSpinner'])

    .config(['$routeProvider', function($routeProvider) {

        $routeProvider
           
            .when('/documents/create/:id', {
                templateUrl: 'document/create/create.html',
                controller: 'createController'
            })
        ;

    }]);
