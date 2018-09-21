'use strict';

angular.module('app.post')
        .factory('Api', [
        '$http',
        function ($http) {

            var ROOT_URL = BASE_URL+'posts';

            function get(id) {
                return $http.get(ROOT_URL + '/' + id);
            }

            function getAll() {
                return $http.get(ROOT_URL);
            }

            function post(blogPost) {
                return $http.post(ROOT_URL, blogPost);
            }

            function put(id, data) {
                return $http.put(ROOT_URL + '/' + id, data);
            }

            function remove(id) {
                return $http.delete(ROOT_URL + '/' + id);
            }

            return {
                get: get,
                getAll: getAll,
                post: post,
                put: put,
                remove: remove
            }

        }
    ]);
