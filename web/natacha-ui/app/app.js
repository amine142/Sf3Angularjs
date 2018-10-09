'use strict';

// Declare app level module which depends on views, and components
var app = angular.module('app', [
  'app.dashboard',
  'app.dossier',
  'datatables',
  'ngRoute'
]); 

app.config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
  $locationProvider.hashPrefix('!');

  $routeProvider.otherwise({redirectTo: '/dashboard'});
}]);
