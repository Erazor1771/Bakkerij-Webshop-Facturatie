<!DOCTYPE html>
<html>

<head>
    <meta name="robots" content="noindex">
    <meta charset="UTF-8">
    <title>Bakkerij vd Westen - Webshop</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto&Open+Sans&Oswald&Indie+Flower' rel='stylesheet' type='text/css'>

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('css/mystyle.css')}}">
    <link rel="stylesheet" href="{{url('css/jquery.fancybox.css')}}">
    <link rel="stylesheet" href="{{url('css/jquery.fancybox-buttons.css')}}">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"> <!-- load fontawesome -->

    <!-- JS Files -->
    <script type="text/javascript" src="{{url('js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.fancybox.js')}}"></script>
    <script type="text/javascript" src="{{url('js/jquery.fancybox-buttons.js')}}"></script>
    <script type="text/javascript" src="{{url('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{url('js/css.js')}}"></script>

    <!-- ANGULAR -->
    <!-- all angular resources will be loaded from the /public folder -->
    <script src="{{url('js/angular.min.js')}}"></script> <!-- load our controller -->
    <script src="{{url('js/moment.js')}}"></script>
    <script src="{{url('js/moment_locales.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ngStorage/0.3.6/ngStorage.min.js"></script>
    <script src="{{url('js/controllers/mainCtrl.js')}}"></script> <!-- load main controller -->
    <script src="{{url('js/controllers/cartCtrl.js')}}"></script> <!-- load cart controller -->
    <script src="{{url('js/controllers/timeCtrl.js')}}"></script> <!-- load cart controller -->
    <script src="{{url('js/services/productService.js')}}"></script> <!-- load our service -->
    <script src="{{url('js/services/timeService.js')}}"></script> <!-- load our service -->
    <script src="{{url('js/services/cartService.js')}}"></script> <!-- load our service -->
    <script src="{{url('js/app.js')}}"></script> <!-- load our application -->

</head>

<body ng-app="productApp" ng-controller="mainController">


    <div ng-controller="cartCtrl">

        @include('partials.nav')

    <div class="wrapper-content col-xs-10 col-xs-push-2 no-padding">

        @yield('header')

        @yield('news')

        @yield('sub-header')

        @yield('content')

        @yield('form-content')

        @yield('footer')

    </div>
    </div>

</body>

</html>