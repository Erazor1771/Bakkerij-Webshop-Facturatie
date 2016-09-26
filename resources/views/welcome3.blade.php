@extends('app')

@section('header')
       <div class="header-nieuws full-height  col-xs-10 col-xs-push-2">
       
            <h2 id="sub-header-nieuws" class="col-xs-8 col-xs-push-2 dark-transparant-background  no-margin text-align-center white">Nieuws</h2>
            <h2 id="sub-sub-header-nieuws" class="col-xs-8 col-xs-push-2 dark-transparant-background no-margin text-align-center white">Recent in het nieuws!</h2>
            <div class="clear"></div>
           
        </div>

@endsection


@section('content')

   @include('partials.nieuws')

@endsection


@section('footer')

    @include('partials.footer')

@endsection
