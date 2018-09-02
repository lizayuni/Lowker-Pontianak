<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>@yield('title') &ndash; Lowker Pontianak</title>
		<meta name="description" content="">
		<meta name="author" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/css/base.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/css/mmenu.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/css/font-awesome.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/css/magnific.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/css/jquery.mCustomScrollbar.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('front/style.css') }}">
		<link rel="shortcut icon" href="#">
		<link rel="apple-touch-icon" href="#">
		<link rel="apple-touch-icon" sizes="72x72" href="#">
		<link rel="apple-touch-icon" sizes="114x114" href="#"> </head>
    @yield('custom_css')
	<body>
		<div id="page">
      @include('front.partials.header')

			@yield('content')

      @include('front.partials.footer')

		</div>
		<!-- #page -->
		<script src="{{ asset('front/js/jquery-1.12.3.min.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script src="{{ asset('front/js/jquery.jscroll.js') }}"></script>
		<script src="{{ asset('front/js/jquery.mmenu.min.all.js') }}"></script>
		<script src="{{ asset('front/js/jquery.fitvids.js') }}"></script>
		<script src="{{ asset('front/js/jquery.magnific-popup.js') }}"></script>
		<script src="{{ asset('front/js/jquery.matchHeight.js') }}"></script>
		<script src="{{ asset('front/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
		<script src="{{ asset('front/js/scripts.js') }}"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js" charset="utf-8"></script>
    @yield('custom_js')
	</body>
</html>
