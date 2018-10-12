'use strict';

angular.module('app.document')
        .factory('Document', [
        '$http',
        function ($http) {

            var ROOT_URL = BASE_URL+'documents';

            function get(id) {
                return $http.get(ROOT_URL + '/' + id);
            }

            function getAll() {
                return $http.get(ROOT_URL);
            }

            function post(document, id, item) {
                return $http.post(ROOT_URL+'/'+id+'/items/'+item, document);
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
