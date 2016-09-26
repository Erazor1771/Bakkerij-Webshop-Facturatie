<!DOCTYPE html>
<html lang="en">
<head>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,500,400italic,500italic,700,900,700italic,900italic&Open Sans&Oswald&Raleway' rel='stylesheet' type='text/css'>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Bakkerij van der Westen | Admin </title>

    <!-- Bootstrap -->
    <link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{url('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{url('vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{url('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="{{url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{url('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- select2 -->
    <link href="{{url('vendors/select2/dist/css/select2.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-wysiwyg -->
    <link href="{{url('vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{url('css/custom.css')}}" rel="stylesheet">

    <!-- all angular resources will be loaded from the /public folder -->
    <script src="{{url('js/angular.min.js')}}"></script> <!-- load our controller -->
    <script src="{{url('js/controllers/adminCtrl.js')}}"></script>
    <script src="{{url('js/controllers/newsCtrl.js')}}"></script>
    <script src="{{url('js/services/adminService.js')}}"></script>
    <script src="{{url('js/app.js')}}"></script> <!-- load our application -->

    <!-- jQuery -->
    <script src="{{url('js/jquery.min.js')}}"></script>

</head>

<body class="nav-md" ng-app="adminApp">
<div class="container body">
    <div class="main_container">


@include('admin.partials.navigation')
@include('admin.partials.top_navigation')

@yield('content')

        @include('admin.partials.footer')

    </div>
</div>

<!-- Bootstrap -->
<script src="{{url('js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{url('vendors/fastclick/lib/fastclick.js')}}"></script>
<!-- NProgress -->
<script src="{{url('vendors/nprogress/nprogress.js')}}"></script>
<!-- Chart.js -->
<script src="{{url('vendors/Chart.js/dist/Chart.min.js')}}"></script>
<!-- gauge.js -->
<script src="{{url('vendors/gauge.js/dist/gauge.min.js')}}"></script>
<!-- bootstrap-progressbar -->
<script src="{{url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
<!-- iCheck -->
<script src="{{url('vendors/iCheck/icheck.min.js')}}"></script>
<!-- Skycons -->
<script src="{{url('vendors/skycons/skycons.js')}}"></script>
<!-- Flot -->
<script src="{{url('vendors/Flot/jquery.flot.js')}}"></script>
<script src="{{url('vendors/Flot/jquery.flot.pie.js')}}"></script>
<script src="{{url('vendors/Flot/jquery.flot.time.js')}}"></script>
<script src="{{url('vendors/Flot/jquery.flot.stack.js')}}"></script>
<script src="{{url('vendors/Flot/jquery.flot.resize.js')}}"></script>
<!-- Flot plugins -->
<script src="{{url('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
<script src="{{url('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
<script src="{{url('vendors/flot.curvedlines/curvedLines.js')}}"></script>
<!-- DateJS -->
<script src="{{url('vendors/DateJS/build/date.js')}}"></script>
<!-- JQVMap -->
<script src="{{url('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
<script src="{{url('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
<script src="{{url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
<!-- bootstrap-daterangepicker -->
<script src="{{url('js/moment.js')}}"></script>
<script src="{{url('js/daterangepicker.js')}}"></script>
<!-- select2 -->
<script src="{{url('vendors/select2/dist/js/select2.min.js')}}"></script>
<!-- bootstrap-wysiwyg -->
<script src="{{url('vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
<script src="{{url('vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
<script src="{{url('vendors/google-code-prettify/src/prettify.js')}}"></script>
<!-- Custom Theme Scripts -->
<script src="{{url('js/custom.min.js')}}"></script>

</body>
</html>