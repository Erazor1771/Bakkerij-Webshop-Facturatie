@extends('app')

@section('header')

	<div class="default-header col-xs-12" style="background-image: url('img/header-homepage.jpg');">

		<h1 class="col-xs-12 text-align-center small-height-heading">Tips</h1>
		<h2 class="col-xs-8 col-xs-push-2">Van de Bakker</h2>

	</div>

@endsection


@section('content')

	<div class="nieuws-Wrapper col-xs-12">
		<div class="nieuws-content col-xs-10 col-xs-push-1">

			<div class="info-text">

				<p>
					<b>Een aantal weetjes en tips die wel eens handig zijn om te weten:</b>
				</p>
				<p>
				<p>
					1. Bewaar ons roggebrood uit eigen bakkerij in de koelkast. Dan kunt u het een week bewaren. Buiten de koelkast slechts 1 of 2 dagen!
				</p>
				<br> <p>
					2. Wij kunnen in de winkel in Raamsdonksveer &amp; Raamsdonk een brood, stokbrood, krentenbrood, enz. op de gewenste dikte snijden. U mag zeggen hoeveel mm u de snee wil en het kan allemaal. Vraag desnoods om een demonstratie als u het graag wil zien.
				</p>
				<p>
					3. In ons assortiment is een meergranenbrood opgenomen dat heet: Goudblond. Dat is een brood zónder melk en E-nummers. Het is heerlijk brood met veel zonnebloempitten en pompoenpitten.
				</p>
			</div>
			<div class="col-xs-1"></div>
		</div>
	</div>


@endsection


@section('footer')

    @include('partials.footer')

@endsection
