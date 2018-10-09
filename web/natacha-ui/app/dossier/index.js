'use strict';

angular.module('app.dossier', ['ngRoute', 'ngLoadingSpinner'])

    .config(['$routeProvider', function($routeProvider) {

        $routeProvider
            .when('/dossiers', {
                templateUrl: 'dossier/list/list.html',
                controller: 'listController'
            })
            .when('/dossiers/create', {
                templateUrl: 'dossier/create/create.html',
                controller: 'createController'
            })
            .when('/dossiers/update/:id', {
                templateUrl: 'dossier/update/update.html',
                controller: 'updateController'
            })
        ;

    }]);
