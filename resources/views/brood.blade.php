@extends('app')

@section('header')

	<div class="default-header col-xs-12" style="background-image: url('img/zonnemaire.jpg');">

		<h1 class="col-xs-12 text-align-center small-height-heading">Biologisch brood</h1>
		<h2 class="col-xs-8 col-xs-push-2">Zonnemaire</h2>

	</div>

@endsection


@section('content')

	<div class="nieuws-Wrapper col-xs-12">
		<div class="nieuws-content col-xs-8 col-xs-push-2">

			<div class="info-text">
				<p>
					Wij bieden u de mogelijkheid om producten bij ons in de winkel te bestellen van de biologische bakkerij Zonnemaire te Waspik.
					Het uitgebreide assortiment kunt u vinden op <a href="http://www.zonnemaire.nl" target="_blank">www.zonnemaire.nl</a>. U dient de gewenste producten (het liefst met nummer) bij ons te bestellen op uiterlijk donderdag,
					dan kunt u de producten op zaterdag vers bij ons ophalen.

					Zij hebben ook een uitgebreid assortiment met glutenvrije producten, zowel houdbaar en dagvers.
				</p>
			</div>

		</div>
		<div class="col-xs-1"></div>
	</div>


@endsection


@section('footer')

    @include('partials.footer')

@endsection
