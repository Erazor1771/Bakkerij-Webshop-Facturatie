angular.module('adminService', [])

    .factory('AdminProducts', function($http) {

    return {

        get : function() {
            return $http.get('api/products');
        }

    }

});