angular.module('Cart', ['cartService', 'ngStorage'])

// inject the Comment service into our controller
    .controller('cartCtrl', function($scope, $http, $sessionStorage, $timeout) {

        $scope.vari = 1;
        $scope.currentQuantity = [];
        $scope.verzendkosten = 2.50;
        $scope.total = 0;
        $scope.ophalen = false;
        $scope.bezorgen = false;
        $scope.amount_to_cart = 0;

        // Product add animation
        var loading = true;
        var clickMe = $('.clickMe');
        var mijnLijst = $('.targetMe');
        // @TODO : Calculate how far from top mijn-lijst is (515px)

        var fromtop = mijnLijst.offset().top - $(window).scrollTop(); // top of screen to mijn lijst btn
        var fromright = 290 + (((($(window).width() / 12) * 9) / 12) * 3); // to +- first product item

        clickMe.css('top', fromtop);
        clickMe.css('left', fromright);

        if($sessionStorage.products != "" && $sessionStorage.products !== undefined){
            $scope.cart = JSON.parse($sessionStorage.products);
        } else{
            $scope.cart = [];
        }

        if($sessionStorage.productCounter != "" && $sessionStorage.productCounter !== undefined){
            $scope.productCounter = $sessionStorage.productCounter;
        } else {
            $scope.productCounter = 0;
        }

        $scope.checkIfCartIsEmpty = function() {

            if($scope.cart != '') {
                return true;
            } else {
                return false;
            }

        };

        $scope.addToCart = function (product) {

                var id = product.id;

                var found = false;
                $scope.cart.forEach(function (item) {
                    if (item.id === product.id) {
                        item.quantity++;
                        $scope.productCounter++;
                        item.totalprice += parseFloat(item.price, 6);
                        $scope.currentQuantity[id] = item.quantity;
                        found = true;
                    }
                });
                if (!found) {
                    $scope.currentQuantity[id] = 1;
                    $scope.cart.push(angular.extend({quantity: 1, totalprice: parseFloat(product.price, 6)}, product));
                    $scope.productCounter += 1;
                    console.log($scope.cart);
                }

                $scope.amount_to_cart = 1;
                moveMe();

                $scope.saveProducts($scope.cart);
                $scope.saveProductCounter($scope.productCounter);

        };

        $scope.QuantityChanged = function (product, quantity) {

            if(quantity < 9999) {
                var id = product.id;
                quantity = parseFloat(quantity, 6);

                var found = false;
                $scope.cart.forEach(function (item) {
                    if (item.id === product.id) {

                        if (quantity == 0) {
                            $scope.productCounter = $scope.productCounter - item.quantity;
                            $scope.cart.splice($scope.cart.indexOf(item), 1);
                        }
                        else if (item.quantity < quantity) {
                            $scope.productCounter = $scope.productCounter + (quantity - item.quantity);
                        }
                        else if (item.quantity > quantity) {
                            $scope.productCounter = $scope.productCounter - (item.quantity - quantity);
                        }

                        item.quantity = quantity;
                        item.totalprice = parseFloat(item.price * quantity, 6);

                        $scope.currentQuantity[id] = item.quantity;
                        found = true;
                    }
                });
                if (!found) {
                    $scope.cart.push(angular.extend({
                            quantity: quantity,
                            totalprice: parseFloat(product.price * quantity, 6)
                        },
                        product));
                    $scope.productCounter += quantity;
                }

                $scope.amount_to_cart = quantity;
                moveMe();

                this.saveProducts($scope.cart);
                this.saveProductCounter($scope.productCounter);
            }

        };

        $scope.removeFromCart = function(product){

            var id = product.id;

            $scope.cart.forEach(function (item) {
                if (item.id === product.id) {
                    if(item.quantity != 0) {
                        item.quantity--;
                        $scope.productCounter--;
                        item.totalprice -= parseFloat(item.price, 6);
                        $scope.currentQuantity[id] = item.quantity;

                        if(item.quantity == 0){
                            $scope.cart.splice($scope.cart.indexOf(item), 1);
                        }
                    }
                }

            });

            this.saveProducts($scope.cart);
            this.saveProductCounter($scope.productCounter);

        };

        $scope.deleteFromCart = function(product){

            $scope.cart.forEach(function (item) {
                if (item.id === product.id) {
                    $scope.productCounter = $scope.productCounter - item.quantity;
                    $scope.cart.splice($scope.cart.indexOf(item), 1);
                }
            });

            this.saveProducts($scope.cart);
            this.saveProductCounter($scope.productCounter);

        };


        $scope.getCartPrice = function () {
            $scope.total = 0;
            $scope.cart.forEach(function (product) {
                $scope.total += product.price * product.quantity;
            });

            return $scope.total;
        };

        $scope.getEventualCartPrice = function () {
            $scope.total = 0;
            $scope.cart.forEach(function (product) {
                $scope.total += product.price * product.quantity;
            });

            if($scope.total < 10) {
                $scope.total = $scope.total + 2.50;
            }

            return $scope.total;
        };

        $scope.getSingeProductCarCount = function (productID) {

            var quantity = 0;

            $scope.cart.forEach(function (item) {
                if (item.id === productID) {
                    quantity = item.quantity;
                }
            });

            return quantity;
        };

        $scope.checkId= function(product){

            $scope.cart.forEach(function (item) {
                if(item.id !== product.id) {
                    $scope.checkid = true;
                    return $scope.checkid;
                } else {
                    $scope.checkid = false;
                    return $scope.checkid;
                }
            });

        };

        $scope.getCurrentQuantity = function(product){

            var id = product.id;
            var found = false;

            $scope.cart.forEach(function (item) {
                if (item.id === product.id) {
                    $scope.currentQuantity[id] = item.quantity;
                    found = true;
                    return item.quantity;
                }
            });
            if(found == false){
                $scope.currentQuantity[id] = 0;
                return 0;
            }

        };

        // save cart data to sessionStorage
        $scope.saveProducts = function(cart) {
            $sessionStorage.products =  JSON.stringify(cart);
        };
        // save product counter to sessionStorage
        $scope.saveProductCounter = function(nrOfProducts) {
            $sessionStorage.productCounter = nrOfProducts;
        };

        $scope.clearStorage = function()
        {
            $sessionStorage.$reset();
        };



            function moveMe(target){
                //do caclculation here:

                // reset div

                if(loading == true) {

                    loading = false;

                    clickMe.css('display', 'block');

                    var target = $('.targetMe');
                    var left = target.offset().left - clickMe.offset().left;
                    var left_offset = clickMe.offset().left;


                    clickMe.css({transform: 'translate(' + (left+50) + 'px)', opacity: 0});

                    $scope.animate = true;

                    setTimeout(function () {
                        clickMe.css({transform: 'translate(0px)', opacity: 1, 'display' : 'none'});
                        loading = true;
                    }, 2500);
                }


            }





    });



