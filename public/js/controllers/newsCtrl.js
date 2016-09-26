angular.module('newsCtrl', [])

// inject the Comment service into our controller
    .controller('newsController', function($scope, $http) {

        $scope.items = [];
        $scope.lastpage=1;
        $scope.thelastpage = 0;
        $scope.news = '';
        $scope.deleteURL = '/admin/news/delete/';
        $scope.loading = true;

        $scope.init = function() {
            $scope.lastpage=1;
            $http({
                url: 'api/news',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function(data, status, headers, config) {
                $scope.thelastpage = data.last_page;
                $scope.news = data.data;
                $scope.currentpage = data.current_page;
                $scope.loading = false;
            });
        };

        $scope.init();

        $scope.getFirstPage = function() {
            $scope.loading = true;
            $scope.lastpage = 1;
            $http({
                url: 'api/news',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.news = data.data;
                $scope.loading = false;
            });
        };

        $scope.getLastPage = function() {
            $scope.loading = true;
            $scope.lastpage = $scope.thelastpage;
            $http({
                url: 'api/news',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.news = data.data;
                $scope.loading = false;
            });
        };

        $scope.nextPage = function() {
            $scope.loading = true;
            $scope.lastpage +=1;
            $http({
                url: 'api/news',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.news = data.data;
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
                url: 'api/news',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.news = data.data;
                $scope.loading = false;
            });
        };

        $scope.reloadNewsItems = function() {
            $scope.loading = true;
            $http({
                url: 'api/news',
                method: "GET",
                params: {page:  $scope.lastpage}
            }).success(function (data, status, headers, config) {
                $scope.news = data.data;
                $scope.loading = false;
            });
        };

        $scope.deleteNewsItems = function($id) {
            $scope.loading = true;
            $http({
                method  : 'POST',
                url     : 'product/news/' + $id
            }).success(function(data) {
                $scope.reloadProducts();
                $scope.loading = false;
            });

        };

        $scope.searchNewsItems = function() {
            if($scope.search_value != ''){
                $scope.loading = true;
                $http({
                    method  : 'POST',
                    url     : 'news/search/' + $scope.search_value
                }).success(function(data) {
                    $scope.news = data;
                    $scope.loading = false;
                });
            } else {
                $scope.init();
            }
        };

    });


