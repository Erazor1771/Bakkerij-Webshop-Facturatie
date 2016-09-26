var productApp = angular.module('productApp', ['mainCtrl', 'timeCtrl', 'Cart', 'productService','timeService', 'cartService', 'ngStorage'], function($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});

var adminApp = angular.module('adminApp', ['adminCtrl', 'newsCtrl'], function($interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

});


