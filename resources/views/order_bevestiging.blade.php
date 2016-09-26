@extends('app')

@section('content')

    <script type="text/javascript">
        $( document ).ready(function() {

            // set circle height
            var circle = $('.step');
            var height_circle = $('.step').width() + 30;
            circle.css('height', height_circle);


            $( ".button-1-series" ).click(function() {

                $(".button-1-series").css('color', '#000');
                $(".button-1-series").css('background-color', '#e5e5e5');

                $(this).css('color', '#FFF');
                $(this).css('background-color', '#c7387a');
            });

            $( ".button-2-series" ).click(function() {

                $(".button-2-series").css('color', '#000');
                $(".button-2-series").css('background-color', '#e5e5e5');

                $(this).css('color', '#FFF');
                $(this).css('background-color', '#c7387a');
            });

        });
    </script>

    <div ng-controller="TimeController">

        <div class="col-xs-12 no-padding">

            <div class="top-bar-list col-xs-12">
                <h1>Bestelling afgerond!</h1>
            </div>

            <div class="shopping-cart register-margin-top-content col-xs-12">
                <div class="col-xs-12">
                    <div class="gap-30"></div>


                        <div ng-hide="my_cart" id="boodschappenlijst" class="col-xs-10 col-xs-push-1 white-content register-left">

                            <div class="row">
                                <h3 class="col-xs-12">Mijn Order Bevestiging</h3>
                            </div>

                            <div class="col-xs-12 no-padding">

                                <div class="row margin-top-40">
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 bold">
                                            Naam:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['naam'] }}
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Datum:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['datum'] }}
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Tijd:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['tijd'] }}
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Bestelkeuze:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['type'] }}
                                        </div>
                                        <div class="col-xs-6 bold">
                                            Betaalkeuze:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['betaalmethode'] }}
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 bold">
                                            Straat:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['factuurstraatnaam'] }} {{ Session::get('user_info')['factuurhuisnummer'] }}
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Woonplaats:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['factuurwoonplaats'] }}
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Postcode:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['factuurpostcode'] }}
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Telefoonnummer:
                                        </div>
                                        <div class="col-xs-6">
                                            {{ Session::get('user_info')['telefoonnummer'] }}
                                        </div>

                                    </div>

                                </div>


                                <div class="gap-30"></div>

                            </div>

                            <div class="row margin-top-40">
                                <div class="product-in-cart no-padding col-xs-12" ng-repeat="product in cart">

                                    <span class="inner-product-quantity-cart inner-product-quantity-cart-order"><% product.quantity %>x</span>
                                    <img src="<% product.path %>" alt="" class="col-xs-2 product-in-cart-img no-padding" />

                                    <div class="col-xs-5 col-xs-push-1 product-names-in-cart">
                                        <span class="product-cart-name col-xs-12"><% product.name %></span>
                                        <span class="product-cart-price col-xs-12">&euro; <% product.price %> per stuk</span>
                                    </div>
                                    <div class="col-xs-1 product-in-cart-padding price-inner-cart">&euro; <% product.totalprice | number:2 %></div>
                                </div>
                            </div>

                            @if(strpos(Session::get('user_info')['type'], 'Ophalen') !== false)
                                <h3>Totaalprijs: <% getCartPrice() | currency : '&euro; ' : 2 %></h3>
                            @endif
                            @if(strpos(Session::get('user_info')['type'], 'Bezorgen') !== false)
                                <h3>Totaalprijs: <% getEventualCartPrice() | currency : '&euro; ' : 2 %></h3>
                            @endif

                            <div class="gap-30"></div>
                        </div>

                    </div>
                </div>

                <% clearStorage() %>

            </div>
        </div>


    </div>



@endsection