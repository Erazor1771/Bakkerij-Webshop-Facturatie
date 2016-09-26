angular.module('productService', [])

.factory('Products', function($http) {

    return {

        // get specialiteiten
        firstGet : function() {
            return $http.get('api/webshop/specialiteiten');
        },
        // get all the products
        get : function($category) {
            return $http.get('api/webshop/'+$category+'');
        }

    }

});