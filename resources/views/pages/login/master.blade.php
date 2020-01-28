<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>@yield('login_title', 'Login Pannel')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--base css styles-->
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/assets/font-awesome/css/font-awesome.min.css">
    <!--page specific css styles-->

    <!--flaty css styles-->
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/css/flaty.css">
    <link rel="stylesheet" href="{{asset('public/BackEnd')}}/css/flaty-responsive.css">
    <link rel="shortcut icon" href="{{asset('public/BackEnd')}}/img/favicon.html">
</head>

<body class="login-page">

    <!-- BEGIN Main Content -->
    @yield('content')
    <!-- END Main Content -->

    <!--basic scripts-->
    <script src="{{asset('public/BackEnd')}}/jquery.min.js"></script>
	<script src="{{asset('public/BackEnd')}}/js/jquery.validate.js"></script>
    <script>
        window.jQuery || document.write('<script src="{{asset('public/BackEnd')}}/assets/jquery/jquery-2.1.1.min.js"><\/script>')
    </script>
    <script src="{{asset('public/BackEnd')}}/assets/bootstrap/js/bootstrap.min.js"></script>
	@yield('scripts')
	<script src="{{asset('public/BackEnd')}}/js/field-validator.js"></script>
    <script type="text/javascript">
        function goToForm(form) {
            $('.login-wrapper > form:visible').fadeOut(500, function() {
                $('#form-' + form).fadeIn(500);
            });
        }
        $(function() {
            $('.goto-login').click(function() {
                goToForm('login');
            });
            $('.goto-forgot').click(function() {
                goToForm('forgot');
            });
            $('.goto-register').click(function() {
                goToForm('register');
            });
        });
    </script>
</body>

</html>
