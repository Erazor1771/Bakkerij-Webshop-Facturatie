@extends('app')

@section('content')
    <div class="col-xs-12 no-padding">

        <div class="top-bar-list col-xs-12">
            <h1>Login</h1>
        </div>

        <div class="shopping-cart col-xs-12">
            <div class="col-xs-12 bestel-keuze login-keuze">

                <div class="col-xs-10 col-xs-push-1 no-padding" id="bestel-keuze-alignment">
                    <div class="col-xs-6 bestel-keuze-left">
                        <h3>Heeft u al een account?</h3>
                        <p>Log hieronder in met uw accountgegevens, dit is een combinatie van een e-mailadres<br> en een wachtwoord.
                        </p>
                        <img src="img/anonymous.png" alt="" class="col-xs-4 profile-picture col-xs-push-4">

                        <div class="clear"></div>

                        {!! Form::open(array('url' => '/auth/login')) !!}

                        {!! Form::label('email', 'Email Address', array('class' => 'col-xs-6 col-xs-push-3 text-align-center')) !!}
                        <div class="clear"></div>
                        {!! Form::text('email', '', array('class' => 'col-xs-6 col-xs-push-3', 'placeholder' => 'voorbeeld@gmail.com')) !!}

                        <div class="clear"></div>

                        <div class="has-error">
                            {{ $errors->first('email') }}
                        </div>

                        <div class="clear"></div>

                        {!! Form::label('email', 'Wachtwoord', array('class' => 'col-xs-6 col-xs-push-3 text-align-center label-wachtwoord')) !!}
                        <div class="clear"></div>
                        {!! Form::password('password', array('class' => 'col-xs-6 col-xs-push-3')) !!}

                        <div class="clear"></div>

                        <div class="has-error">
                            {{ $errors->first('password') }}
                        </div>

                        <div class="clear"></div>


                        {!! Form::button('Inloggen <span class="glyphicon glyphicon-chevron-right"></span>', array('id' => 'bestelling-afronden',
                                                                                                                   'class' => 'col-xs-11 cta-button cta-btn-keuze',
                                                                                                                   'type' => 'submit')
                                        )
                        !!}

                        {!! Form::close() !!}

                    </div>

                    <div class="col-xs-6 bestel-keuze-right">
                        <h3>Registreren</h3>
                        <p class="col-xs-10 col-xs-push-1">Eenvoudig en snel uw account registreren. <br><br>
                           Uw priv&eacute; gegevens worden veilig, vertrouwd en versleuteld opgeslagen.
                        </p>

                        <ul class="col-xs-12">
                            <li class="remove-bullet"><b>Tevens heeft u de volgende voordelen met een account: </b></li>
                            <li class="col-xs-11 col-xs-push-2">Bestellingen die u eerder heeft gemaakt kunt u direct opnieuw bestellen!</li>
                            <li class="col-xs-11 col-xs-push-2">Factuurgegevens worden zorgvuldig bewaard.</li>
                            <li class="col-xs-11 col-xs-push-2">Mogelijkheid om producten op te slaan als favoriet</li>
                            <li class="col-xs-11 col-xs-push-2">Mogelijkheid om ingelogd te blijven op dezelfde browser en computer</li>
                            <li class="col-xs-11 col-xs-push-2">More to come... :)</li>
                        </ul>

                        <a href="registreren" class="col-xs-11 cta-button cta-btn-keuze" id="bestelling-afronden">Maak een account aan <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection