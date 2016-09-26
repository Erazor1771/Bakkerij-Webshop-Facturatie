@extends('app')

@section('content')
    <div class="col-xs-12 no-padding">

        <div class="top-bar-list col-xs-12">
            <h1>Hoe wilt u uw bestelling afronden?</h1>
        </div>

        <div class="shopping-cart col-xs-12">
            <div class="col-xs-10 col-xs-push-1 bestel-keuze">

                <div class="col-xs-12 no-padding" id="bestel-keuze-alignment">
                    <div class="col-xs-6 bestel-keuze-left">
                        <h3>Met een Account</h3>
                        <p>Als u besteld met een account worden al uw bestelgegevens bewaard.<br>
                            Met een account heeft u bepaalde voordelen op onze website. <br><br>
                        </p>
                        <ul class="col-xs-12">
                            <li class="remove-bullet"><b>Onderstaande opties zijn mogelijk met een account:</b></li>
                            <li class="col-xs-11 col-xs-push-2">Bestellingen die u eerder heeft gemaakt kunt u direct opnieuw bestellen!</li>
                            <li class="col-xs-11 col-xs-push-2">Factuurgegevens worden zorgvuldig bewaard.</li>
                            <li class="col-xs-11 col-xs-push-2">Mogelijkheid om producten op te slaan als favoriet</li>
                            <li class="col-xs-11 col-xs-push-2">Mogelijkheid om ingelogd te blijven op dezelfde browser en computer</li>
                            <li class="col-xs-11 col-xs-push-2">More to come... :)</li>
                        </ul>
                        <img src="img/anonymous.png" alt="" class="col-xs-4 profile-picture col-xs-push-4">
                        <a href="login" class="col-xs-11 cta-button cta-btn-keuze" id="bestelling-afronden">Bestellen met Account <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>

                    <div class="col-xs-6 bestel-keuze-right">
                        <h3>Alleen met mijn Factuurgegevens</h3>
                        <p class="col-xs-10 col-xs-push-1">Eenvoudig en snel met uw factuurgegevens bestellen. <br><br>
                            <b>Geen account verreist</b> <br><br>
                            Uw factuurgegevens kunnen worden bewaard voor een volgende bestelling, zodat u niet alles nog een keer hoeft in te vullen.<br><br>
                            Let op: dit geldt alleen als erop dezelfde computer wordt besteld en in dezelfde browser.
                        </p>
                        <a href="bestellen-factuur" class="col-xs-11 cta-button cta-btn-keuze" id="bestelling-afronden">Bestellen zonder Account <span class="glyphicon glyphicon-chevron-right"></span></a>
                    </div>
                </div>

            </div>
        </div>

    </div>

@endsection