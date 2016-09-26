@extends('app')

@section('header')
        <div class="header-medium-height col-xs-12">
           <h1 id="content-header-Inlog-Page" class="black col-xs-12 text-align-center larger-height-heading ">Inloggen</h1>
          
        </div>

@endsection


@section('content')

    @include('partials.inlog_block')

@endsection


@section('footer')

    @include('partials.footer')

@endsection
