@extends('app')

@section('content')
<div class="col-xs-12 no-padding">

	<div class="top-bar-list col-xs-12">
		<h1>Mijn lijst</h1>
	</div>

	<div ng-if="!checkIfCartIsEmpty();" class="shopping-cart col-xs-12">
		<div class="alert alert-danger col-xs-10 col-xs-push-1">
			U heeft nog niets in uw bestellijstje zitten, voeg eerst wat producten toe.
		</div>
	</div>

	<div ng-if="checkIfCartIsEmpty();" class="shopping-cart col-xs-12">

		<div class="search-product-content content-top-list col-xs-10 col-xs-push-1">
			<!--<div class="input-group stylish-input-group col-xs-7 col-xs-push-1 float-left">
				<input type="text" class="form-control" placeholder="Voeg hier uw producten toe: Worstenbroodjes, Croissants..." >
                    <span class="input-group-addon">
                        <button type="submit">
							<span class="glyphicon glyphicon-search"></span>
						</button>
                    </span>
			</div>-->
			<div class="content-totalprice col-xs-8">
				<span class="prices col-xs-12 no-padding">
					<span class="col-xs-6 right">Totaalprijs voor ophalen: </span>
					<span class="col-xs-6 left"><% getCartPrice() | currency : '&euro; ' : 2 %></span>
				</span>
				<span class="prices col-xs-12 no-padding">
					<span class="col-xs-6 right">Totaalprijs voor bezorgen: </span>
					<span class="col-xs-6 left"><% getEventualCartPrice() | currency : '&euro; ' : 2 %></span>
				</span>
				<span class="prices col-xs-12 no-padding">
					<span class="col-xs-6 right">Eventuele bezorgkosten: </span>
					<span class="col-xs-6 left"><% verzendkosten | currency : '&euro; ' : 2 %></span>
				</span>
			</div>
			<div class="col-xs-4">
				<a href="bestellen" class="col-xs-12 cta-button" id="bestelling-afronden">Bestelling Afronden <span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>

		<div class="product-in-cart no-padding col-xs-10 col-xs-push-1" ng-repeat="product in cart track by product.id">

				<span class="inner-product-quantity-cart"><% product.quantity %>x</span>
				<img src="<% product.path %>" alt="" class="col-xs-2 product-in-cart-img no-padding" />

				<div class="col-xs-4 product-names-in-cart">
					<span class="product-cart-name col-xs-12"><% product.name %></span>
					<span class="product-cart-price col-xs-12">&euro; <% product.price %> per stuk</span>
				</div>
				<div class="col-xs-1 product-in-cart-padding price-inner-cart"><% product.totalprice | currency : '&euro; ' : 2 %></div>
				<div class="col-xs-4 product-in-cart-padding">

					<div class="product-buttons">
						<button class="delete-button" ng-click="deleteFromCart(product);">
							<span class="glyphicon glyphicon-trash"></span>
						</button>
						<button class="min-button" ng-click="removeFromCart(product);">-</button>
						<input type="text" ng-change="QuantityChanged(product, currentQuantity[product.id]);" ng-model="currentQuantity[product.id]" ng-init="getCurrentQuantity(product);" class="product-aantal"  />
						<button  class="plus-button" ng-click="addToCart(product);">+</button>
					</div>

				</div>
		</div>

		<div class="col-xs-12 gap-30"></div>

		<div class="col-xs-10 col-xs-push-1 seperator"></div>

		<div class="clear"></div>

		<div class="col-xs-10 col-xs-push-1 no-padding">
			<div class="col-xs-4 col-xs-push-8">
				<div class="gap-30"></div>
				<a href="bestellen" class="col-xs-12 cta-button" id="bestelling-afronden">Bestelling Afronden <span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>

	</div>

</div>

@endsection