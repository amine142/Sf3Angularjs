'use strict';

angular.module('app.blogPost')

    .controller('createController', ['$scope', 'Api', '$window', function($scope, Api, $window) {

        $scope.blogPost = {};

        $scope.create = function (blogPost) {

            Api.post(blogPost)
                .then(function (result) {
                    console.log('result', result);
                    $window.location.href = '#!post';
                }, function (error) {
                    console.log('error', error);
                })
        };
    }]);