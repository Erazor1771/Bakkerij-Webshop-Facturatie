@extends('app')

@section('header')
         @include('partials.eerder_besteld_header')

@endsection

@section('content')

    @include('partials.single_content')



    @include('partials.singleCat')



    @include('partials.sinlge-item-descrip')

      @include('partials.tips')

@endsection



@section('footer')

    @include('partials.footer')

@endsection
