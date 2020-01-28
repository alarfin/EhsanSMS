<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>SMS Dashboard</title>
    <meta name="description" content="SMS, SMS Service, low rate SMS, SMS Concept, free SMS">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Mohammad Al Arfin (Rokon)">
    <!--base css styles-->
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/assets/font-awesome/css/font-awesome.min.css">
    <!--page specific css styles-->
    <!--flaty css styles-->
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/css/flaty.css">
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/css/flaty-responsive.css">
    <link rel="shortcut icon" href="{{asset('public/BackEnd')}}/img/favicon.html">
	@yield('styles')
</head>

<body>

    <!-- BEGIN Theme Setting -->
    @include('inc.theme_setting')
    <!-- END Theme Setting -->

    <!-- BEGIN Navbar -->
    @include('inc.top_menu')
    <!-- END Navbar -->

    <!-- BEGIN Container -->
    <div class="container" id="main-container">
        <!-- BEGIN Sidebar -->
		@if (Auth::user()->role=='root')
			@include('inc.left_sidebar')
		@else
			@include('inc.client_sidebar')
		@endif

        <!-- END Sidebar -->

        <!-- BEGIN Content -->
        <div id="main-content">

            <!-- BEGIN Main Content -->
            @yield('content')
            <!-- END Main Content -->

			<!-- Footer Section Start -->
            @include('inc/footer')
			<!-- Footer Section End -->

            <a id="btn-scrollup" class="btn btn-circle btn-lg" href="#"><i class="fa fa-chevron-up"></i></a>
        </div>
        <!-- END Content -->
    </div>
    <!-- END Container -->

    <!--basic scripts-->
    <script src="{{asset('public/BackEnd')}}/assets/bootstrap/js/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{asset('public/BackEnd')}}/assets/jquery/jquery-2.1.1.min.js"><\/script>')
    </script>
    <script src="{{asset('public/BackEnd')}}/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/jquery-cookie/jquery.cookie.js"></script>

    <!--page specific plugin scripts-->
    <script src="{{asset('public/BackEnd')}}/assets/flot/jquery.flot.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/flot/jquery.flot.resize.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/flot/jquery.flot.pie.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/flot/jquery.flot.stack.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/flot/jquery.flot.crosshair.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/flot/jquery.flot.tooltip.min.js"></script>
    <script src="{{asset('public/BackEnd')}}/assets/sparkline/jquery.sparkline.min.js"></script>

    <!--flaty scripts-->
    <script src="{{asset('public/BackEnd')}}/js/flaty.js"></script>
    <script src="{{asset('public/BackEnd')}}/js/flaty-demo-codes.js"></script>
	@yield('scripts')

</body>

</html>
