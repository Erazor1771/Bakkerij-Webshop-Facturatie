@extends('app')

@section('header')
    <div id="header-openingstijden" class="header-default header-larger-height full-height col-xs-12">
        <h1 class="white-header larger-height-heading no-margin text-align-center">Openingstijden</h1>

        <div id="openingstijden-wrapper" class="col-xs-6 col-xs-push-3">
            <span class="openingstijdtext">Dit is een overzicht van onze openingstijden</span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Maandag</span>
                <span class="right col-xs-9">08:00 - 18:00</span>
            </span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Dinsdag</span>
                <span class="right col-xs-9">Gesloten - Gebak nodig? Op uiterlijk maandag de bestelling doorgegeven.</span>
            </span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Woensdag</span>
                <span class="right col-xs-9">08:00 - 18:00</span>
            </span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Donderdag</span>
                <span class="right col-xs-9">08:00 - 18:00</span>
            </span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Vrijdag</span>
                <span class="right col-xs-9">08:00 - 19:00</span>
            </span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Zaterdag</span>
                <span class="right col-xs-9">07:30 - 15:00</span>
            </span>

            <span class="openingstijd col-xs-12">
                <span class="left col-xs-3">Zondag</span>
                <span class="right col-xs-9">Gesloten</span>
            </span>

        </div>

    </div>
@endsection

@section('footer')

    @include('partials.footer')

@endsection