@extends('app')

@section('content')

    <script type="text/javascript">
        $( document ).ready(function() {

            var height_left_register = $('.register-left').height();
            var padding_left_register = 40;
            var correction_px = 2;
            var height = height_left_register + padding_left_register + correction_px;
            $('.register-right').css('height', height)

        });
    </script>

    <div class="col-xs-12 no-padding">

        <div class="top-bar-list col-xs-12">
            <h1>Registreren</h1>
        </div>

        <div class="shopping-cart register-margin-top-content col-xs-12">
            <div class="col-xs-12 bestel-keuze login-keuze">

                <div class="col-xs-12 no-padding registreren-content-wrapper" id="bestel-keuze-alignment">

                    @IF ($errors->any())
                    <div class="row" id="error-register">
                        <div class="bg-danger text-align-center col-xs-6 col-xs-push-3">
                            Er zijn nog wat foutmeldingen opgetreden tijdens uw registratie.
                            Los de foutmeldingen op en probeer het nog eens.
                        </div>
                    </div>
                    @ENDIF

                    <div class="col-xs-6 white-content register-left">

                        <div class="row">
                            <h3 class="col-xs-12">Persoonlijke gegevens</h3>
                        </div>
                        <div class="row">
                            <p class="col-xs-12">
                                Velden met een X zijn verplicht
                            </p>
                        </div>

                        {!! Form::open(array('url' => '/auth/confirmFactuur')) !!}
                        {{ csrf_field() }}

                        <div class="row row-margin-top">

                            {!! Form::label('titel', 'Titel:', array('class' => 'col-xs-3 text-align-center')) !!}

                            @if (Cookie::get('factuur') != null)
                                @if(Cookie::get('factuur')['titel'] == "Dhr.")
                                    {!! Form::radio('titel', 'Dhr.', true) !!} Dhr.
                                    {!! Form::radio('titel', 'Mevr.') !!} Mevr.
                                @endif
                                @if(Cookie::get('factuur')['titel'] == "Mevr.")
                                    {!! Form::radio('titel', 'Dhr.') !!} Dhr.
                                    {!! Form::radio('titel', 'Mevr.', true) !!} Mevr.
                                @endif
                            @else
                                {!! Form::radio('titel', 'Dhr.', true) !!} Dhr.
                                {!! Form::radio('titel', 'Mevr.') !!} Mevr.
                            @endif

                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('titel') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('voornaam', 'Voornaam:', array('class' => 'col-xs-3 text-align-center label-wachtwoord')) !!}
                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('voornaam', Cookie::get('factuur')['voornaam'], array('class' => 'col-xs-9', 'placeholder' => 'Vul uw voornaam hier in...')) !!}
                            @else
                                {!! Form::text('voornaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw voornaam hier in...')) !!}
                            @endif

                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('voornaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('tussenvoegsel', 'Tussenvoegsel:', array('class' => 'col-xs-3 text-align-center label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('tussenvoegsel', Cookie::get('factuur')['tussenvoegsel'], array('class' => 'col-xs-3')) !!}
                            @else
                                {!! Form::text('tussenvoegsel', '', array('class' => 'col-xs-3')) !!}
                            @endif

                            <p class="help-block remove-bestel-keuze-padding col-xs-6">(bv. van der, de)</p>
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('tussenvoegsel') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('achternaam', 'Achternaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('achternaam', Cookie::get('factuur')['achternaam'], array('class' => 'col-xs-9', 'placeholder' => 'Vul uw achternaam hier in...')) !!}
                            @else
                                {!! Form::text('achternaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw achternaam hier in...')) !!}
                            @endif

                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('achternaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('bedrijfsnaam', 'Bedrijfsnaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('bedrijfsnaam', Cookie::get('factuur')['bedrijfsnaam'], array('class' => 'col-xs-9', 'placeholder' => 'Vul uw achternaam hier in...')) !!}
                            @else
                                {!! Form::text('bedrijfsnaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw bedrijfsnaam hier in...')) !!}
                            @endif
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('bedrijfsnaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('woonplaats', 'Woonplaats:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('woonplaats', Cookie::get('factuur')['factuurwoonplaats'], array('class' => 'col-xs-9', 'placeholder' => 'Vul uw woonplaats hier in...')) !!}
                            @else
                                {!! Form::text('woonplaats', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw woonplaats hier in...')) !!}
                            @endif

                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('woonplaats') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('straatnaam', 'Straatnaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('straatnaam', Cookie::get('factuur')['factuurstraatnaam'], array('class' => 'col-xs-9', 'placeholder' => 'Vul uw straatnaam hier in...')) !!}
                            @else
                                {!! Form::text('straatnaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw straatnaam hier in...')) !!}
                            @endif

                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('straatnaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('huisnummer', 'Huisnummer:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('huisnummer', Cookie::get('factuur')['factuurhuisnummer'], array('class' => 'col-xs-3')) !!}
                            @else
                                {!! Form::text('huisnummer', '', array('class' => 'col-xs-3')) !!}
                            @endif

                            <p class="help-block remove-bestel-keuze-padding col-xs-6">(incl. letter bv. 50 of 50A)</p>
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('huisnummer') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('postcode', 'Postcode:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('postcode', Cookie::get('factuur')['factuurpostcode'], array('class' => 'col-xs-3')) !!}
                            @else
                                {!! Form::text('postcode', '', array('class' => 'col-xs-3')) !!}
                            @endif

                            <p class="help-block remove-bestel-keuze-padding col-xs-6">(bv: 1234 AB)</p>
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('postcode') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('telefoonnummer', 'Tel nr.:', array('class' => 'col-xs-3 label-wachtwoord')) !!}

                            @if (Cookie::get('factuur') != null)
                                {!! Form::text('telefoonnummer', Cookie::get('factuur')['telefoonnummer'], array('class' => 'col-xs-9')) !!}
                            @else
                                {!! Form::text('telefoonnummer', '', array('class' => 'col-xs-9')) !!}
                            @endif

                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('telefoonnummer') }}
                            </div>
                        </div>

                        <div class="row">
                            <p class="help-block remove-bestel-keuze-padding col-xs-9 col-xs-push-3">
                                (vul hier het telefoonnummer in waarop uw overdag bereikbaar bent, bijv: 0162123456 / 0612345678)
                            </p>
                        </div>

                        <div class="row row-margin-top">

                            {!! Form::button('Bevestig Gegevens <span class="glyphicon glyphicon-chevron-right"></span>', array('id' => 'bestelling-afronden',
                                                                                                                  'class' => 'col-xs-9 col-xs-push-3 cta-button cta-btn-keuze cta-btn-keuze-custom-pad',
                                                                                                                  'type' => 'submit')
                                       )
                            !!}
                        </div>

                    </div>

                    <div class="col-xs-6 bestel-keuze-right register-right white-content">

                        <div class="row">
                            <h3 class="col-xs-12">Meer info</h3>
                        </div>
                        <div class="row">
                            <p class="col-xs-10 col-xs-push-1">
                                De gegevens links zijn nodig om uw bestelling te kunnen voltooien.
                                Na deze gegevens wordt u doorgelinkt naar een pagina, waar u uw bestelling verder kunt specificeren.
                            </p>
                        </div>

                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection