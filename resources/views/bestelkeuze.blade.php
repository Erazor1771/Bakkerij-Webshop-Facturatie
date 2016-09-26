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
                <h1>Bestelling Afronden</h1>
            </div>

            <div class="shopping-cart register-margin-top-content col-xs-12">
                <div class="col-xs-12">

                    <div class="col-xs-12 no-padding registreren-content-wrapper bestelkeuze-content-wrapper">

                        <div class="col-xs-10 col-xs-push-1 order-steps hide">

                            <div class="col-xs-2 col-xs-push-2 step-parent">
                                <div class="col-xs-6 col-xs-push-3 step"></div>
                                <div class="clear"></div>
                                <h3 class="col-xs-12">Bestel Keuze</h3>
                            </div>
                            <div class="col-xs-2 col-xs-push-2 step-parent">
                                <div class="col-xs-6 col-xs-push-3 step"></div>
                                <div class="clear"></div>
                                <h3 class="col-xs-12">Bestel Keuze</h3>
                            </div>
                            <div class="col-xs-2 col-xs-push-2 step-parent">
                                <div class="col-xs-6 col-xs-push-3 step"></div>
                                <div class="clear"></div>
                                <h3 class="col-xs-12">Bestel Keuze</h3>
                            </div>
                            <div class="col-xs-2 col-xs-push-2 step-parent">
                                <div class="col-xs-6 col-xs-push-3 step"></div>
                                <div class="clear"></div>
                                <h3 class="col-xs-12">Bestel Keuze</h3>
                            </div>
                        </div>

                        <div ng-hide="bezorgen_afhalen" class="bestelkeuzes-alignment col-xs-10 col-xs-push-1 white-content register-left">

                            <div class="row">
                                <h3 class="col-xs-12">Wilt u uw bestelling afhalen of laten bezorgen?</h3>
                            </div>
                            <div class="row margin-top-20">
                                <div class="col-xs-6">
                                    <div ng-click="ophalen_selected=true;bezorgen_selected=false;bezorgen_afhalen=true;ophalen=true;" class="button button-1-series button-grey col-xs-12 margin-right-btn">Ophalen</div>
                                </div>
                                <div class="col-xs-6">
                                    <div ng-click="bezorgen_selected=true;ophalen_selected=false;bezorgen_afhalen=true;bezorgen=true;" class="button button-1-series button-grey col-xs-12 margin-left-btn">Bezorgen</div>
                                </div>
                            </div>
                            <div class="gap-30"></div>
                        </div>

                        <div ng-show="ophalen_selected" class="bestelkeuzes-alignment col-xs-10 col-xs-push-1 white-content register-left">

                            <div ng-click="bezorgen_afhalen=false;ophalen_selected=false;ophalen=false;" id="previous-step-bestelling">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </div>

                            <div class="row">
                                <h3 class="col-xs-12">Waar wilt u uw bestelling ophalen?</h3>
                            </div>
                            <div class="row margin-top-20">
                                <div ng-click="loadTimeSchedule('Raamsdonksveer', 'Ophalen', generateDays(0));ophalen_selected=false;bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12 margin-top-10">
                                    Ophalen in Raamsdonksveer
                                </div>
                                <div ng-click="loadTimeSchedule('Raamsdonk', 'Ophalen', generateDays(0));ophalen_selected=false;bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12 margin-top-10">
                                    Ophalen in Raamsdonk
                                </div>
                            </div>
                            <div class="gap-30"></div>
                        </div>

                        <div ng-show="bezorgen_selected" class="bestelkeuzes-alignment col-xs-10 col-xs-push-1 white-content register-left">

                            <div ng-click="bezorgen_afhalen=false;bezorgen_selected=false;bezorgen=false;" id="previous-step-bestelling">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </div>

                            <div class="row">
                                <h3 class="col-xs-12">Waar wilt u uw bestelling laten bezorgen?</h3>
                            </div>
                            <div class="row margin-top-20">
                                <div ng-click="loadTimeSchedule('Raamsdonksveer', 'Bezorgen', generateDays(0));bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12">
                                    Laten bezorgen in Raamsdonksveer
                                </div>
                                <div ng-click="loadTimeSchedule('Raamsdonk', 'Bezorgen', generateDays(0));bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12 margin-top-10">
                                    Laten bezorgen in Raamsdonk
                                </div>
                                <div ng-click="loadTimeSchedule('Geertruidenberg', 'Bezorgen', generateDays(0));bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12 margin-top-10">
                                    Laten bezorgen in Geertruidenberg
                                </div>
                                <div ng-click="loadTimeSchedule('Waspik', 'Bezorgen', generateDays(0));bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12 margin-top-10">
                                    Laten bezorgen in Waspik
                                </div>
                                <!--<div ng-click="postNL();bezorgen_selected=false;" class="button button-2-series button-grey col-xs-12 margin-top-10">
                                    Laten bezorgen in een andere plaats (alleen met PostNL)
                                </div>-->
                            </div>
                        </div>

                        <div ng-show="timeschedule" class="bestelkeuzes-alignment col-xs-10 col-xs-push-1 white-content register-left">

                        <div ng-click="previous()" id="previous-step-bestelling">
                            <span class="glyphicon glyphicon-arrow-left"></span>
                        </div>

                         <div class="row">
                            <h3 class="col-xs-12">Op welk tijdstip wilt u uw bezorging ontvangen?</h3>
                         </div>

                            <div class="gap-30"></div>

                            <div ng-click="loadWeekBefore()" class="week-before"></div>

                            <div class="col-xs-2 date-time">
                                <% generateDays(0) %>
                              <span class="span date-label">
                                  <% generateDates(0) %>
                              </span>
                            </div>
                            <div class="col-xs-2 date-time">
                                <% generateDays(1) %>
                                <span class="span date-label">
                                    <% generateDates(1) %>
                                </span>
                            </div>
                            <div class="col-xs-2 date-time">
                                <% generateDays(2) %>
                                <span class="span date-label">
                                    <% generateDates(2) %>
                                </span>
                            </div>
                            <div class="col-xs-2 date-time">
                                <% generateDays(3) %>
                                <span class="span date-label">
                                    <% generateDates(3) %>
                                </span>
                            </div>
                            <div class="col-xs-2 date-time">
                                <% generateDays(4) %>
                                <span class="span date-label">
                                    <% generateDates(4) %>
                                </span>
                            </div>
                            <div class="col-xs-2 date-time">
                                <% generateDays(5) %>
                                <span class="span date-label">
                                    <% generateDates(5) %>
                                </span>
                            </div>
                            <div ng-click="loadWeekAfter()" class="week-after"></div>

                           <!-- TIMES -->
                           <div class="col-xs-2">
                               <div ng-repeat="time in times">
                                   <div ng-if="generateDays(0)==time.day">
                                       <div ng-click="selectedTimeAndDate($event, time.time, generateDates(0))" class="col-xs-12 time-box button-3-series">
                                           <% time.time %>
                                        </div>
                                   </div>
                               </div>
                           </div>

                            <div class="col-xs-2">

                                <div ng-repeat="time in times">
                                    <div ng-if="generateDays(1)==time.day">
                                        <div ng-click="selectedTimeAndDate($event, time.time, generateDates(1))" class="col-xs-12 time-box button-3-series">
                                            <% time.time %>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div ng-repeat="time in times">
                                    <div ng-if="generateDays(2)==time.day">
                                        <div ng-click="selectedTimeAndDate($event, time.time, generateDates(2))" class="col-xs-12 time-box button-3-series">
                                            <% time.time %>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div ng-repeat="time in times">
                                    <div ng-if="generateDays(3)==time.day">
                                        <div ng-click="selectedTimeAndDate($event, time.time, generateDates(3))" class="col-xs-12 time-box button-3-series">
                                            <% time.time %>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div ng-repeat="time in times">
                                    <div ng-if="generateDays(4)==time.day">
                                        <div ng-click="selectedTimeAndDate($event, time.time, generateDates(4))" class="col-xs-12 time-box button-3-series">
                                            <% time.time %>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="col-xs-2">

                                <div ng-repeat="time in times">
                                    <div ng-if="generateDays(5)==time.day">
                                        <div ng-click="selectedTimeAndDate($event, time.time, generateDates(5))" class="col-xs-12 time-box button-3-series">
                                            <% time.time %>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <div ng-show="keuze_overzicht" class="keuze-overzicht-wrapper col-xs-10 col-xs-push-1 white-content register-left">

                                <div ng-click="timeschedule=true;keuze_overzicht=false;" id="previous-step-bestelling">
                                    <span class="glyphicon glyphicon-arrow-left"></span>
                                </div>

                                <div class="row">
                                    <h3 class="col-xs-12">Keuzeoverzicht</h3>
                                </div>

                                <div class="row margin-top-40">
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 bold">
                                            Naam:
                                        </div>
                                        <div class="col-xs-6">
                                            <% personName %>
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Datum:
                                        </div>
                                        <div class="col-xs-6">
                                            <% dateChosen %>
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Tijd:
                                        </div>
                                        <div class="col-xs-6">
                                            <% timeChosen %>
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Bestelkeuze:
                                        </div>
                                        <div class="col-xs-6">
                                            <% bezorgMethode %>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="col-xs-6 bold">
                                            Straat:
                                        </div>
                                        <div class="col-xs-6">
                                            <% straatnaamfactuur %> <% huisnummerfactuur %>
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Woonplaats:
                                        </div>
                                        <div class="col-xs-6">
                                            <% woonplaatsfactuur %>
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Postcode:
                                        </div>
                                        <div class="col-xs-6">
                                            <% postcodefactuur %>
                                        </div>

                                        <div class="col-xs-6 bold">
                                            Telefoonnummer:
                                        </div>
                                        <div class="col-xs-6">
                                            <% telefoonnummer %>
                                        </div>
                                        <!-- <div id="wijzig-adres" class="col-xs-9 col-xs-push-3 button cta-button">Wijzig Adres</div> -->

                                    </div>

                                    <div ng-click="loadLastStepOrder()" id="naar-betalen-btn" class="col-xs-10 col-xs-push-1 button cta-button">Naar Betalen</div>

                                </div>


                                <div class="gap-30"></div>

                        </div>

                        <div ng-show="keuze_betaal_overzicht" class="betaal-overzicht-wrapper col-xs-10 col-xs-push-1 white-content register-left">

                            <div ng-click="keuze_betaal_overzicht=false;keuze_overzicht=true;" id="previous-step-bestelling">
                                <span class="glyphicon glyphicon-arrow-left"></span>
                            </div>

                            <div class="row">
                                <h3 class="col-xs-12">Met welke betaalmethode wilt u uw bestelling plaatsen?</h3>
                            </div>

                            {{ Form::open(array('url' => '/betalen')) }}

                            <div class="row margin-top-40">
                                <div class="col-xs-12 betaal-keuze betaal-keuze-first">

                                    <div class="col-xs-2 radio-betaalkeuze">
                                        {{ Form::radio('betalen', 'contant', true, ['class' => 'radio-btn-betalen']) }}
                                        <img src="img/contant.png" width="32" height="32" class="icon-betalen" id="contant" />
                                    </div>

                                    <div class="col-xs-10 inner-betaal-keuze no-padding">
                                        <h3 class="col-xs-12 no-padding">
                                            Betalen bij ontvangst
                                        </h3>
                                        <p class="col-xs-9 no-padding">
                                            Betaal in &eacute;&eacute;n van onze winkels bij het ophalen van uw bestelling
                                            contant of per pin. Bij bezorging van uw bestelling is alleen contant te betalen.
                                        </p>
                                    </div>
                                </div>

                                <div class="col-xs-12 betaal-keuze">

                                    <div class="col-xs-2 radio-betaalkeuze">
                                        {{ Form::radio('betalen', 'ideal', false, ['class' => 'radio-btn-betalen']) }}
                                        <img src="img/ideal.png" width="32" height="32" class="icon-betalen" id="contant" />
                                    </div>

                                    <div class="col-xs-10 inner-betaal-keuze no-padding">
                                        <h3 class="col-xs-12 no-padding">
                                            iDeal
                                        </h3>
                                        <p class="col-xs-9 no-padding">
                                            Betaal vooraf en eenvoudig met iDeal.
                                            Gebruiksvriendelijk en de meest snelle manier om af te rekenen.
                                        </p>
                                    </div>

                                </div>

                                {{ Form::hidden('naam', "<% personName %>") }}
                                {{ Form::hidden('datum', "<% dateChosen %>") }}
                                {{ Form::hidden('tijd', "<% timeChosen %>") }}
                                {{ Form::hidden('type', "<% bezorgMethode %>") }}
                                {{ Form::hidden('straatnaam', "<% straatnaamfactuur %>") }}
                                {{ Form::hidden('huisnummer', "<% huisnummerfactuur %>") }}
                                {{ Form::hidden('woonplaats', "<% woonplaatsfactuur %>") }}
                                {{ Form::hidden('postcode', "<% postcodefactuur %>") }}
                                {{ Form::hidden('telefoonnummer', "<% telefoonnummer %>") }}
                                {{ Form::hidden('totaalprijs', "<% getCartPrice() %>") }}
                                {{ Form::hidden('cart', "<% cart %>") }}

                                {{ Form::button('Bestelling afrekenen <span class="glyphicon glyphicon-chevron-right"></span>', array('id' => 'betalen-btn',
                                                                                                                  'class' => 'col-xs-10 col-xs-push-1 button cta-button',
                                                                                                                  'type' => 'submit')
                                       )
                                }}

                            </div>

                            {{ Form::close() }}

                            <div class="gap-30"></div>
                        </div>

                        <div ng-hide="my_cart" id="boodschappenlijst" class="col-xs-10 col-xs-push-1 white-content register-left">

                            <div class="row">
                                <h3 class="col-xs-6">Mijn boodschappenlijstje</h3>
                                <h3 class="col-xs-6 totaalprijs-bestelkeuze">
                                    <div ng-if="!ophalen && !bezorgen">
                                        Totaalprijs: <% getCartPrice() | currency : '&euro; ' : 2 %>
                                    </div>
                                    <div ng-if="ophalen">
                                        Totaalprijs: <% getCartPrice() | currency : '&euro; ' : 2 %>
                                    </div>
                                    <div ng-if="bezorgen">
                                        Totaalprijs: <% getEventualCartPrice() | currency : '&euro; ' : 2 %>
                                    </div>
                                </h3>
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

                            <div class="gap-30"></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection