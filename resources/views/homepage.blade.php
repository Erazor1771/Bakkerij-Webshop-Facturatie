@extends('app')

@section('header')
        <div id="homepage-header" class="homepage-overlay full-height col-xs-12">
            <!-- <h1 id="header-homepage" class="white-header no-margin text-align-center"></h1> -->
            <h2 id="sub-header-homepage" class="col-xs-8 col-xs-push-2 no-margin text-align-center black">Online uw boodschappen bestellen bij Bakkerij van der Westen. De bakker voor uw brood, gebak en taart in Raamsdonk en Raamsdonksveer.</h2>
            <div class="clear"></div>
            <a id="cta-button-header" href="webshop" class="button cta-button col-xs-4 col-xs-push-4">Bekijk Webshop<span id="icon-cta-homepage" class="align-right glyphicon glyphicon-share-alt" aria-hidden="true"></span> </a>

            @include('partials.news_block')

        </div>
@endsection

@section('content')

    @include('partials.taart_cta')

    @include('partials.waarom')

@endsection

@section('footer')

    @include('partials.footer')

@endsection