@extends('app')

@section('header')
    <div id="header-webshop" class="header-default full-height  col-xs-12">
        <h2 id="sub-header-webshop" class="col-xs-4 col-xs-push-4 dark-transparant-background no-margin text-align-center white">Webshop</h2>
    </div>
@endsection

@section('content')

    <div class="webshop-content col-xs-12 no-padding">


        <div ng-class="{animate: animate}" class="clickMe move-to-list">
            +<% amount_to_cart %>
        </div>

        <div class="wrapper-filter-zoeken col-xs-12 no-padding">
            <!-- <div class="col-xs-10 col-xs-push-1">
                 <div class="input-group">
                    <input type="text" class="form-control" placeholder="Zoek product...">
                     <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                     </span>
                 </div>
            </div> -->
        </div>

        <div class="accordion-categories col-xs-3">
            @foreach($categories as $categorie)
                @if($i < $counter)
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a ng-click="get('{{$categorie->name}}')" class="
                                    @if($i == 0) pink-background pink-background-hover active-cat @endif
                                    @if($i == 1 || $i == 5 || $i == 9) yellow-background-hover @endif
                                    @if($i == 2 || $i == 6 || $i == 10) grey-background-hover @endif
                                    @if($i == 3 || $i == 7|| $i == 11) green-background-hover @endif
                                    @if($i == 4 || $i == 8 || $i == 12) orange-background-hover @endif"
                                       data-toggle="collapse" href="#collapse{{ $i }}">
                                        {{ $categorie->name }}
                                    </a>
                                </h4>
                            </div>
                            <div id="collapse{{ $i }}" class="panel-collapse collapse" aria-expanded="true">
                                <ul class="list-group">
                                    @foreach($sub_categories as $sub_categorie)
                                        @if($sub_categorie->hoofdcategory == $categorie->name)
                                            <li ng-click="get('{{$sub_categorie->name}}')" class="list-group-item
                                                @if($i == 0) pink-background active-cat @endif
                                                @if($i == 1 || $i == 5 || $i == 9) yellow-background-hover @endif
                                                @if($i == 2 || $i == 6 || $i == 10) grey-background-hover @endif
                                                @if($i == 3 || $i == 7|| $i == 11) green-background-hover @endif
                                                @if($i == 4 || $i == 8 || $i == 12) orange-background-hover @endif
                                            ">
                                                {{ $sub_categorie->name }}
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <span class="hide">{{ $i++ }}</span>
                @endif
            @endforeach
        </div>

        <div class="col-xs-9 no-padding">
            <!-- LOADING ICON =============================================== -->
            <!-- show loading icon if the loading variable is set to true -->
            <p class="text-center" ng-show="loading"><span class="fa fa-spinner fa-pulse fa-3x fa-fw"></span>

            <div ng-hide="loading" ng-repeat="product in products track by product.id">

                <div class="clear" ng-if="$index % 3 == 0"></div>

                <div class="col-xs-4 product-wrapper">

                    <div class="col-xs-12 product-background">
                        <div style="background-image: url('<% product.path %>');" class="product col-xs-12">

                        </div>
                        <div class="col-xs-12 product-name">
                            <% product.name %>
                        </div>
                        <div class="col-xs-12 no-padding product-buttons">
                            <div class="btn-wrappers col-xs-12 no-padding">
                                <button class="min-button" ng-click="removeFromCart(product);">-</button>
                                <input type="text" ng-change="QuantityChanged(product, currentQuantity[product.id]);" ng-model="currentQuantity[product.id]" ng-init="getCurrentQuantity(product);" class="product-aantal"  />
                                <button class="plus-button" ng-click="addToCart(product);">+</button>
                            </div>
                        </div>
                        <div class="price col-xs-12 no-padding">
                            <div class="col-xs-6 prijs-text"><span>Prijs</span></div>
                            <div class="col-xs-6 inner-price"><span><% product.price %></span></div>
                            <div class="clear"></div>
                            <!-- <img class="icons" src="img/icon-postnl.png" alt=""> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>

       <!-- <div class="col-xs-12 no-padding">
            <div id="tip1-header"class=" col-xs-4">Tip 1</div>
            <div id="tip2-header"class=" col-xs-4">Tip 2</div>
            <div id="tip3-header"class=" col-xs-4">Tip 3</div>
            <div id="tip1"class="tips col-xs-4">Wist je dat...<div class="tip1-text">Broden heel erg gezond zijn!</div></div>
            <div id="tip2"class="tips col-xs-4">Wist je dat...<div class="tip1-text">Broden heel erg gezond zijn! Vooral volkoren?</div></div>
            <div id="tip3"class="tips col-xs-4">Wist je dat...<div class="tip1-text">Broden heel erg gezond zijn! Of zoiets met extra tekst, meer tekst ter illustratie</div></div>
        </div> -->

    </div>

@endsection

@section('footer')

    @include('partials.footer')

@endsection