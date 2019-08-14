'use strict';

angular.module('app.dashboard', ['ngRoute', 'ngLoadingSpinner'])

    .config(['$routeProvider', function($routeProvider) {

        $routeProvider
            .when('/dashboard', {
                templateUrl: 'dashboard/layout/get.html',
                controller: 'layoutController'
            })
        ;

    }]);