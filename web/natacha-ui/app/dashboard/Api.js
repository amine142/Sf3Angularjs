'use strict';

angular.module('app.blogPost')
        .factory('Api', [
        '$http',
        function ($http) {

            var ROOT_URL = '/app_dev.php/dashboard';

            
            function getAll() {
                return $http.get(ROOT_URL);
            }

            return {
                getAll: getAll
            }

        }
    ]);
    


    
       