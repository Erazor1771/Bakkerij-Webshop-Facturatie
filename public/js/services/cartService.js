angular.module('cartService', [])

    .factory('CartFactory', function($http) {

        var savedData = [];

        function set(data) {
            savedData = data;
        }

        function get() {
            return savedData;
        }

        return {
            set: set,
            get: get
        }

    });
