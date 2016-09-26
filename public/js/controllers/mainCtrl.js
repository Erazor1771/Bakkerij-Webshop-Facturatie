angular.module('mainCtrl', [])

// inject the Comment service into our controller
.controller('mainController', function($scope, $http, Products) {


    // object to hold all the data for the new comment form
    $scope.productData = {};

    // loading variable to show the spinning loading icon
    $scope.loading = true;

         Products.firstGet()
        .success(function(data) {
            $scope.products = data;
            $scope.loading = false;
        });

        $scope.get = function($category) {

            $scope.loading = true;

            Products.get($category)
                .success(function(getData) {
                    $scope.products = getData;
                    $scope.loading = false;
                });

        };



    });


