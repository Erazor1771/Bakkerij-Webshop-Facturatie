@extends('app')

@section('header')
  
  @include('partials.contact-header')

@endsection


@section('content')

	 @include('partials.contactvestigingen')

	  @include('partials.contact-formulier')

	   @include('partials.googleMaps')
  
@endsection




@section('footer')

    @include('partials.footer')

@endsection
