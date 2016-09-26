angular.module('timeService', [])

    .factory('Times', function($http) {

        return {

            // get all the times
            get : function(location, type, today) {
                return $http.get('api/tijden/'+location+'/'+type+'/'+today+'');
            },
            getCustomerInfo : function() {
                return $http.get('api/getcustomerinfo/');
            }

        }

    });
