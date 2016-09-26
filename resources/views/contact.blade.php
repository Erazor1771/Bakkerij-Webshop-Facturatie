@extends('app')

@section('header')

	<div class="default-header col-xs-12" style="background-image: url('img/header-homepage.jpg');">

		<h1 class="col-xs-12 text-align-center small-height-heading">Contact</h1>
		<h2 class="col-xs-10 col-xs-push-1">Onze contactgegevens vindt u hieronder</h2>

	</div>

@endsection


@section('content')

	@include('partials/google_maps')

	<div class="default-content-wrapper form-wrapper col-xs-12" id="contact">
		<div class="col-xs-6 col-xs-push-6">

			<div class="contact-form-top-wrapper col-xs-12 no-padding">
					<h3>Contact Formulier</h3>
					<p>Wilt u ons eenvoudig een mail sturen met uw vraag gebruik dan het onderstaand contact formulier.
						Dit contactformulier is voor Raamsdonksveer en Raamsdonk samen.</p>
			</div>

			{{ Form::open(['url' => '/contact/sendContactForm']) }}

				@if ($errors->has())
					<div class="error-box col-xs-12 alert alert-danger">
						@foreach ($errors->all() as $error)
							{{ $error }}<br>
						@endforeach
					</div>
					<div class="clear"></div>
				@endif

				@if (session()->has('data'))
					<div class="succes-box col-xs-12 alert alert-success">
						Formulier is succesvol ingevuld. U ontvangt zo spoedig mogelijk een e-mail ter bevestiging.
					</div>
					<div class="clear"></div>
				@endif

					<div class="contact-form-input col-xs-12 no-padding">
						{{ Form::text('naam', null, array('class' => 'form-control input-lg', 'placeholder' => 'Naam*')) }}
					</div>

					<div class="contact-form-input col-xs-12 no-padding">
						{{ Form::email('email', null, array('class' => 'form-control input-lg', 'placeholder' => 'Email*')) }}
					</div>

					<div class="contact-form-input col-xs-12 no-padding">
						{{ Form::text('onderwerp', null, array('class' => 'form-control input-lg', 'placeholder' => 'Onderwerp*')) }}
					</div>

					<div class="contact-form-input col-xs-12 no-padding">
						{{ Form::textarea('bericht', null, array('class' => 'form-control input-lg textarea', 'placeholder' => 'Tekst*')) }}
					</div>

					<div class="btn-contact-formulier-verzenden col-xs-12 no-padding">
						{{ Form::button('Verzenden', array('type' => 'submit', 'class' => 'white btn-contact-formulier btn-lg col-xs-6')) }}
					</div>

			{{ Form::close() }}
		</div>
	</div>

@endsection

@section('footer')

    @include('partials.footer')

@endsection
