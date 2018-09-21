'use strict';

// Declare app level module which depends on views, and components
var app = angular.module('app', [
  'ngRoute',
  'app.dashboard',
  'app.post'
]); 

app.config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
  $locationProvider.hashPrefix('!');

  $routeProvider.otherwise({redirectTo: '/dashboard'});
}]);
