@extends('app')

@section('content')

    <script type="text/javascript">
        $( document ).ready(function() {

            var height_left_register = $('.register-left').height();
            var padding_left_register = 40;
            var correction_px = 2;
            var height = height_left_register + padding_left_register + correction_px;
            $('.register-right').css('height', height)

            var woonplaats = $("#woonplaatsinput");
            var straatnaam = $("#straatnaaminput");
            var huisnummer = $("#huisnummerinput");
            var postcode = $("#postcodeinput");
            var factuurwoonplaats = $("#factuurwoonplaatsinput");
            var factuurstraatnaam = $("#factuurstraatnaaminput");
            var factuurhuisnummer = $("#factuurhuisnummerinput");
            var factuurpostcode = $("#factuurpostcodeinput");
            var checkfactuur = $("#checkfactuurinput");
            var factuur_content = $(".factuurcontentshow");

            if(factuurwoonplaats.val() != '' ||
               factuurstraatnaam.val() != '' ||
               factuurhuisnummer.val() != '' ||
               factuurpostcode.val() != ''
            ){
                factuur_content.prop('checked', true);
                factuur_content.css("display", "block");
            }

            $(checkfactuur).change(function() {
                if($(this).is(":checked")) {
                    factuur_content.css("display", "block");
                } else{
                    factuur_content.css("display", "none");
                }
            });

            $(woonplaats).on('input', function() {
                var current_value = $(this).val();
                factuurwoonplaats.val(current_value);
            });
            $(straatnaam).on('input', function() {
                var current_value = $(this).val();
                factuurstraatnaam.val(current_value);
            });
            $(huisnummer).on('input', function() {
                var current_value = $(this).val();
                factuurhuisnummer.val(current_value);
            });
            $(postcode).on('input', function() {
                var current_value = $(this).val();
                factuurpostcode.val(current_value);
            });

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

                        {!! Form::open(array('url' => '/auth/register')) !!}
                        {{ csrf_field() }}

                        <div class="row row-margin-top">
                            {!! Form::label('titel', 'Titel:', array('class' => 'col-xs-3 text-align-center')) !!}
                            {!! Form::radio('titel', 'Dhr.', true) !!}
                            Dhr.
                            {!! Form::radio('titel', 'Mevr.') !!}
                            Mevr.
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('titel') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('voornaam', 'Voornaam:', array('class' => 'col-xs-3 text-align-center label-wachtwoord')) !!}
                            {!! Form::text('voornaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw voornaam hier in...')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('voornaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('tussenvoegsel', 'Tussenvoegsel:', array('class' => 'col-xs-3 text-align-center label-wachtwoord')) !!}
                            {!! Form::text('tussenvoegsel', '', array('class' => 'col-xs-3')) !!}
                            <p class="help-block remove-bestel-keuze-padding col-xs-6">(bv. van der, de)</p>
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('tussenvoegsel') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('achternaam', 'Achternaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('achternaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw achternaam hier in...')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('achternaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('bedrijfsnaam', 'Bedrijfsnaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('bedrijfsnaam', '', array('class' => 'col-xs-9', 'placeholder' => '(niet verplicht) Vul uw bedrijfsnaam hier in...')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('bedrijfsnaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('woonplaats', 'Woonplaats:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('woonplaats','', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw woonplaats hier in...', 'id' => 'woonplaatsinput')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('woonplaats') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('straatnaam', 'Straatnaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('straatnaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw straatnaam hier in...', 'id' => 'straatnaaminput')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('straatnaam') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('huisnummer', 'Huisnummer:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('huisnummer', '', array('class' => 'col-xs-3', 'id' => 'huisnummerinput')) !!}
                            <p class="help-block remove-bestel-keuze-padding col-xs-6">(incl. letter bv. 50 of 50A)</p>
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('huisnummer') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('postcode', 'Postcode:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('postcode', '', array('class' => 'col-xs-3', 'id' => 'postcodeinput')) !!}
                            <p class="help-block remove-bestel-keuze-padding col-xs-6">(bv: 1234 AB)</p>
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('postcode') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('telefoonnummer', 'Tel nr.:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                            {!! Form::text('telefoonnummer', '', array('class' => 'col-xs-9')) !!}
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
                            {!! Form::label('checkfactuur', 'Wilt u de bestelling op een ander adres bezorgd hebben dan het bovenstaande factuuradres?', array('class' => 'label-wachtwoord col-xs-10')) !!}
                            {!! Form::checkbox('checkfactuur', 'true', false, array('class' => 'checkbox-checkfactuur', 'id' => 'checkfactuurinput')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('checkfactuur') }}
                            </div>
                        </div>

                        <div class="factuurcontentshow">
                            <div class="row">
                                <h3 class="col-xs-12">Bezorgadres</h3>
                            </div>

                            <div class="row row-margin-top">
                                {!! Form::label('factuurwoonplaats', 'Woonplaats:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                                {!! Form::text('factuurwoonplaats', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw woonplaats hier in...', 'id' => 'factuurwoonplaatsinput')) !!}
                            </div>
                            <div class="row">
                                <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                    {{ $errors->first('factuurwoonplaats') }}
                                </div>
                            </div>

                            <div class="row row-margin-top">
                                {!! Form::label('factuurstraatnaam', 'Straatnaam:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                                {!! Form::text('factuurstraatnaam', '', array('class' => 'col-xs-9', 'placeholder' => 'Vul uw straatnaam hier in...', 'id' => 'factuurstraatnaaminput')) !!}
                            </div>
                            <div class="row">
                                <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                    {{ $errors->first('factuurstraatnaam') }}
                                </div>
                            </div>

                            <div class="row row-margin-top">
                                {!! Form::label('factuurhuisnummer', 'Huisnummer:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                                {!! Form::text('factuurhuisnummer', '', array('class' => 'col-xs-3', 'id' => 'factuurhuisnummerinput')) !!}
                                <p class="help-block remove-bestel-keuze-padding col-xs-6">(incl. letter bv. 50 of 50A)</p>
                            </div>
                            <div class="row">
                                <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                    {{ $errors->first('factuurhuisnummer') }}
                                </div>
                            </div>

                            <div class="row row-margin-top">
                                {!! Form::label('factuurpostcode', 'Postcode:', array('class' => 'col-xs-3 label-wachtwoord')) !!}
                                {!! Form::text('factuurpostcode', '', array('class' => 'col-xs-3', 'id' => 'factuurpostcodeinput')) !!}
                                <p class="help-block remove-bestel-keuze-padding col-xs-6">(bv: 1234 AB)</p>
                            </div>
                            <div class="row">
                                <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                    {{ $errors->first('factuurpostcode') }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-xs-6 bestel-keuze-right register-right white-content">

                        <div class="row">
                            <h3 class="col-xs-12">Inloggegevens</h3>
                        </div>
                        <div class="row">
                            <p class="col-xs-10 col-xs-push-1">
                                Het e-mailadres en wachtwoord zijn nodig om toegang te krijgen tot de gegevens.
                                Ook zullen we je via dit e-mailadres op de hoogte houden van de status van bestellingen.
                            </p>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('email', 'E-mailadres:', array('class' => 'col-xs-3 text-align-center')) !!}
                            {!! Form::text('email', '', array('class' => 'col-xs-9', 'placeholder' => 'voorbeeld@gmail.com')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('email') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('email', 'Wachtwoord:', array('class' => 'col-xs-3 text-align-center label-wachtwoord')) !!}
                            {!! Form::password('password', array('class' => 'col-xs-9')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('password') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">
                            {!! Form::label('password_confirmation', 'Wachtwoord Bevestigen:', array('class' => 'col-xs-3 text-align-center label-wachtwoord')) !!}
                            {!! Form::password('password_confirmation', array('class' => 'col-xs-9')) !!}
                        </div>
                        <div class="row">
                            <div class="has-error text-align-center col-xs-9 col-xs-push-3">
                                {{ $errors->first('password_confirmation') }}
                            </div>
                        </div>

                        <div class="row row-margin-top">

                            {!! Form::button('Account aanmaken <span class="glyphicon glyphicon-chevron-right"></span>', array('id' => 'bestelling-afronden',
                                                                                                                  'class' => 'col-xs-9 col-xs-push-3 cta-button cta-btn-keuze cta-btn-keuze-custom-pad',
                                                                                                                  'type' => 'submit')
                                       )
                            !!}
                        </div>



                        {!! Form::close() !!}

                    </div>

                </div>

            </div>
        </div>

    </div>

@endsection