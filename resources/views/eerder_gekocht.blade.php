@extends('app')

@section('header')
        <div class="header-medium-height col-xs-12">
        	<h4  class="black col-xs-12 text-align-center larger-height-heading ">EERDER GEKOCHT</h4>
        </div>
        <div class="col-xs-12">
        	<h4  class="grey col-xs-12 text-align-center  "><i>Onderstaande bestellingen heeft u eerder gemaakt. Het is mogelijk om direct uw bestelling te plaatsen.</i> </h4>
        </div>
@endsection

@section('content')

    @include('partials.eerder_gekocht')

@endsection



@section('footer')

    @include('partials.footer')

@endsection
