@extends('app')

@section('header')

    <div class="default-header col-xs-12" style="background-image: url('img/wie-zijn-wij.jpg');">

        <h1 class="col-xs-12 text-align-center small-height-heading">Wie zijn wij?</h1>
        <h2 class="col-xs-8 col-xs-push-2">BAKKERSAMBACHT ZIT IN 'T BLOED</h2>

    </div>

@endsection


@section('content')

    <div class="col-xs-12 default-content-wrapper over-ons-wrapper">
        <div class="col-xs-2"></div>

        <div class="panel-group col-xs-8" id="accordion" role="tablist" aria-multiselectable="true">
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            2015
                        </a>
                    </h4>
                </div>
                <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-expanded="true" aria-labelledby="headingOne">
                    <div class="panel-body">
                        <p>
                            <b>In het begin van 2015</b> sluit Lobke, de vriendin van Gerben, zich ook aan bij de onderneming. We kunnen er met z'n allen voor zorgen dat er kwaliteitsproducten in de winkel liggen en vervolgens onze klanten tevreden zijn.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingTwo">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            2013
                        </a>
                    </h4>
                </div>
                <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                    <div class="panel-body">
                        <p  >
                            <b>In 2013</b> behaalt Gerben, zoon van Ger &amp; Johanny en broertje van Manon en Chantal, zijn diploma van de bakkersopleiding. Hij sluit zich nu ook aan bij de onderneming.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingThree">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            2010
                        </a>
                    </h4>
                </div>
                <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                    <div class="panel-body">
                        <p  >
                            <b>In 2010</b> gaat Chantal, dochter van Ger &amp; Johanny en zus van Manon, zich ook aansluiten in het familiebedrijf. Dit is het uitgelezen moment voor een grote verandering en een nieuwe huisstijl.
                            <br>
                            <b>De grote verandering</b> is dat de winkels: Brood en banketbakkerij Ger van der Westen, gevestigd in Raamsdonk en Brood en Banket Manon, gevestigd in Raamsdonksveer, samen verder gaan met één nieuw logo en onder één nieuwe naam: <b>Bakkerij van der Westen</b>
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfour">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                            2000
                        </a>
                    </h4>
                </div>
                <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfour">
                    <div class="panel-body">
                        <p  >
                            <b>In 2000 </b>heeft Manon, dochter van Ger en Johanny, de bakkerswinkel overgenomen van bakkerij Cees Schuller in de Prins Hendrikstraat 44 te Raamsdonksveer. Iedere dag wordt de winkel in Raamsdonksveer bevoorraad met vers gemaakte producten, welke worden geproduceerd in de bakkerij in Raamsdonk.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingfive">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                            1976
                        </a>
                    </h4>
                </div>
                <div id="collapsefive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingfive">
                    <div class="panel-body">
                        <p  >

                            <b>In 1976</b> kopen Ger en Johanny in Raamsdonk een kleine bakkerij van bakker Van Amelsvoort. Na jarenlang de theorie op school te leren en mee te werken in de bakkerij van zijn vader kan Ger zijn kennis toepassen in zijn eigen bakkerij en Johanny richt zich op de winkel. Het wordt een goed lopende zaak waardoor in de loop der jaren enige uitbreiding heeft plaatsgevonden.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingsix">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                            1950
                        </a>
                    </h4>
                </div>
                <div id="collapsesix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingsix">
                    <div class="panel-body">
                        <p >

                            <b>In 1950</b> neemt Gerrit van der Westen (vader van Ger) het bedrijf van zijn vader over in de Adelstraat in Made. Samen met zijn echtgenote Annie van Beek en hun kinderen hebben zij een mooie bakkerij en winkel gehad. De kinderen van Gerrit en Annie (4 dochters en 2 zonen) werkte na schooltijd in de bakkerij en gingen met brood langs de deuren.
                        </p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading" role="tab" id="headingseven">
                    <h4 class="panel-title">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                            Overig
                        </a>
                    </h4>
                </div>
                <div id="collapseseven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingseven">
                    <div class="panel-body">
                        <p  >
                            De 2 zonen Ad en Ger zijn geïnteresseerd in het bakkersvak en volgen de opleiding tot brood- en banketbakker, zodat zij het familiebedrijf kunnen voortzetten.

                            <b>In 1975</b> neemt zoon Ad de bakkerij in Made over en besluit vervolgens <b>in 1988 </b>zich te specialiseren in het biologische brood en banket. De biologische bakkerij Zonnemaire is gevestigd in Waspik.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-xs-2"></div>

    @include('partials.footer')

@endsection
