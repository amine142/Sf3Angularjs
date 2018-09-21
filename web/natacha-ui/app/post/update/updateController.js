'use strict';

angular.module('app.post')

    .controller('updateController', [
        '$scope',
        'Api',
        '$window',
        '$routeParams',
        function($scope, Api, $window, $routeParams) {

        $scope.blogPost = {};

        Api.get($routeParams.id)
            .then(function (response) {
                console.log('response', response);
                $scope.blogPost = response.data;
            }, function (error) {
                console.log('error', error);
            });


        $scope.update = function (blogPost) {

            Api.put(blogPost.id, blogPost)
                .then(function (response) {
                    console.log('response', response);
                    $window.location.href = '#!post';
                }, function (error) {
                    console.log('error', error);
                });

        };
    }]);