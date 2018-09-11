'use strict';

angular.module('app.blogPost', ['ngRoute', 'ngLoadingSpinner'])

    .config(['$routeProvider', function($routeProvider) {

        $routeProvider
            .when('/post', {
                templateUrl: 'blogPost/list/list.html',
                controller: 'listController'
            })
            .when('/post/create', {
                templateUrl: 'blogPost/create/create.html',
                controller: 'createController'
            })
            .when('/post/update/:id', {
                templateUrl: 'blogPost/update/update.html',
                controller: 'updateController'
            })
        ;

    }]);
