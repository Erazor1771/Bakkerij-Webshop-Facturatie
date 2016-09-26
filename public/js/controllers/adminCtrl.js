angular.module('adminCtrl', [])

// inject the Comment service into our controller
    .controller('adminController', function($scope, $http) {

        $scope.items = [];
        $scope.lastpage=1;
        $scope.thelastpage = 0;
        $scope.products = '';
        $scope.deleteURL = '/admin/product/delete/';
        $scope.loading = true;

        $scope.init = function() {
            $scope.lastpage=1;
            $http({
                url: 'api/products',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function(data, status, headers, config) {
                $scope.thelastpage = data.last_page;
                $scope.products = data.data;
                $scope.currentpage = data.current_page;
                $scope.loading = false;
            });
        };

        $scope.init();

        $scope.getFirstPage = function() {
            $scope.loading = true;
            $scope.lastpage = 1;
            $http({
                url: 'api/products',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.products = data.data;
                $scope.loading = false;
            });
        };

        $scope.getLastPage = function() {
            $scope.loading = true;
            $scope.lastpage = $scope.thelastpage;
            $http({
                url: 'api/products',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.products = data.data;
                $scope.loading = false;
            });
        };

        $scope.nextPage = function() {
            $scope.loading = true;
            $scope.lastpage +=1;
            $http({
                url: 'api/products',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.products = data.data;
                $scope.loading = false;
            });
        };

        $scope.previousPage = function() {
            $scope.loading = true;
            if($scope.lastpage == 1)
            {
                $scope.lastpage=1;
            } else {
                $scope.lastpage -=1;
            }
            $http({
                url: 'api/products',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.products = data.data;
                $scope.loading = false;
            });
        };

        $scope.reloadProducts = function() {
            $scope.loading = true;
            $http({
                url: 'api/products',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.products = data.data;
                $scope.loading = false;
            });
        };

        $scope.deleteProduct = function($id) {
            $scope.loading = true;
            $http({
                method  : 'POST',
                url     : 'product/delete/' + $id
            }).success(function(data) {
                $scope.reloadProducts();
                $scope.loading = false;
            });

        };

        $scope.searchProducts = function() {
            if($scope.search_value != ''){
                $scope.loading = true;
                $http({
                    method  : 'POST',
                    url     : 'product/search/' + $scope.search_value
                }).success(function(data) {
                    $scope.products = data;
                    $scope.loading = false;
                });
            } else {
                $scope.init();
            }
        };

    });


