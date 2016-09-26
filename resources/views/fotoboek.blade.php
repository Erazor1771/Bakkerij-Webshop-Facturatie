@extends('app')

@section('header')

	<div class="default-header col-xs-12" style="background-image: url('img/header-homepage.jpg');">

		<h1 class="col-xs-12 text-align-center small-height-heading">Fotoboek</h1>
		<h2 class="col-xs-8 col-xs-push-2">Voorbeelden van gemaakte taarten</h2>

		<!--
			<div class="clear"></div>
			<a id="cta-button-header" href="webshop" class="button cta-button col-xs-4 col-xs-push-4">
				Stel taart samen
				<span id="icon-cta-homepage" class="align-right glyphicon glyphicon-share-alt" aria-hidden="true"></span>
			</a>
		-->

	</div>

@endsection

@section('content')
	<script type="text/javascript">
		$(document).ready(function(){
			$(".fancybox").fancybox({
				openEffect: "none",
				closeEffect: "none",
				padding:0, margin:0,

				beforeShow: function () {
				$("body *:not(.fancybox-overlay, .fancybox-overlay *)").addClass("blur");
				},
				afterClose: function () {
				$("body *:not(.fancybox-overlay, .fancybox-overlay *)").removeClass("blur");
				}
			});
		});
	</script>

	<div class="col-xs-12 no-padding">

			@foreach($photos as $photo)
				<a class="col-xs-3 fancybox thumbnail" rel="gallery" href="{{url($photo->path)}}" title="{{ $photo->description }}">
					<img class="img-responsive" alt="" src="{{url($photo->path)}}" />
				</a>
			@endforeach

	</div>

@endsection



@section('footer')

    @include('partials.footer')

@endsection
