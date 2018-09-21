'use strict';

angular.module('app.dashboard')
        .factory('Api', [
        '$http',
        function ($http) {

            var ROOT_URL = BASE_URL+'dashboard';

            
            function getAll() {
                return $http.get(ROOT_URL);
            }

            return {
                getAll: getAll,
            }

        }
    ]);
 angular.module('app.dashboard')
        .factory('Menu', [
        '$http',
        function ($http) {

            var ROOT_URL = BASE_URL+'dashboard/menu';

            
            function getAll() {
                return $http.get(ROOT_URL);
            }
           
            return {
                getAll: getAll
            }

        }
    ]);
       
       