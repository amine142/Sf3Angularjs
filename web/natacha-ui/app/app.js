'use strict';

// Declare app level module which depends on views, and components
var app = angular.module('app', [
  'app.dashboard',
  'app.document',
  'app.dossier',
  'datatables',
  'ngRoute',
  'ui.bootstrap'
]); 

app.config(['$locationProvider', '$routeProvider', function($locationProvider, $routeProvider) {
  $locationProvider.hashPrefix('!');

  $routeProvider.otherwise({redirectTo: '/dashboard'});
}]);
