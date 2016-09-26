@extends('app')

@section('header')
        <div class="header-default full-height dark-overlay col-xs-10 col-xs-push-2">
            <h1 id="header-homepage" class="white-header no-margin text-align-center">Online uw boodschappen bestellen bij de bakker</h1>
            <h2 id="sub-header-homepage" class="col-xs-8 col-xs-push-2 dark-transparant-background no-margin text-align-center white">Bakkerij van der Westen is gevestigd in Raamsdonksveer & Raamsdonk</h2>
            <div class="clear"></div>
            <a id="cta-button-header" class="button cta-button col-xs-4 col-xs-push-4">Ga naar Webshop <span id="icon-cta-homepage" class="align-right glyphicon glyphicon-share-alt" aria-hidden="true"></span> </a>
        </div>
@endsection

@section('news')

    @include('partials.news_block')

@endsection

@section('content')

    @include('partials.waarom')

    @include('partials.taart_cta')

    @include('partials.info')

@endsection

@section('footer')

    @include('partials.footer')

@endsection