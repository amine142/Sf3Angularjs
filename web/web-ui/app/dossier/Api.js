'use strict';

angular.module('app.dossier')
        .factory('Api', [
        '$http',
        function ($http) {

            var ROOT_URL = BASE_URL+'dossiers';

            function get(id) {
                return $http.get(ROOT_URL + '/' + id);
            }

            function getAll() {
                return $http.get(ROOT_URL);
            }

            function post(dossier) {
                return $http.post(ROOT_URL, dossier);
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
