<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Admin Panel</title>
	<meta name="description" content="Winkle is a Dashboard & Admin Site Responsive Template by hencework." />
	<meta name="keywords" content="admin, admin dashboard, admin template, cms, crm, Winkle Admin, Winkleadmin, premium admin templates, responsive admin, sass, panel, software, ui, visualization, web app, application" />
	<meta name="author" content="hencework"/>

	<!-- Favicon -->
	<link rel="shortcut icon" href="favicon.ico">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

	<!-- Data table CSS -->
	<link href="{{ asset('back/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css') }}" rel="stylesheet" type="text/css"/>

	<!-- Custom CSS -->
	<link href="{{ asset('back/classic/dist/css/style.css') }}" rel="stylesheet" type="text/css">

  <!-- select2 CSS -->
  <link href="{{ asset('back/vendors/bower_components/select2/dist/css/select2.min.css') }}" rel="stylesheet" type="text/css"/>

  <!-- switchery CSS -->
  <link href="{{ asset('back/vendors/bower_components/switchery/dist/switchery.min.css') }}" rel="stylesheet" type="text/css"/>

  <!-- bootstrap-select CSS -->
  <link href="{{ asset('back/vendors/bower_components/bootstrap-select/dist/css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

  <!-- bootstrap-tagsinput CSS -->
  <link href="{{ asset('back/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}" rel="stylesheet" type="text/css"/>

  <!-- bootstrap-touchspin CSS -->
  <link href="{{ asset('back/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css"/>

  <!-- multi-select CSS -->
  <link href="{{ asset('back/vendors/bower_components/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css"/>

  <!-- Bootstrap Switches CSS -->
  <link href="{{ asset('back/vendors/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css"/>

  <!-- Bootstrap Datetimepicker CSS -->
  <link href="{{ asset('back/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css"/>

  @yield('custom_css')
</head>

<body>
	<!--Preloader-->
	<div class="preloader-it">
		<div class="la-anim-1"></div>
	</div>
	<!--/Preloader-->
    <div class="wrapper theme-1-active navbar-top-light">

    <!-- Top Menu Items -->
		@include('back.partials.topnav')
		<!-- /Top Menu Items -->

		<!-- Left Sidebar Menu -->
		@include('back.partials.leftnav')
		<!-- /Left Sidebar Menu -->

		<!-- Main Content -->
		<div class="page-wrapper">
			<div class="container-fluid">
        @yield('content')
			</div>

			<!-- Footer -->
			@include('back.partials.footer')
			<!-- /Footer -->

		</div>
		<!-- /Main Content -->

    </div>
    <!-- /#wrapper -->

	<!-- JavaScript -->

    <!-- jQuery -->
    <script src="{{ asset('back/vendors/bower_components/jquery/dist/jquery.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('back/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>

	<!-- Data table JavaScript -->
	<script src="{{ asset('back/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('back/classic/dist/js/dataTables-data.js') }}"></script>

	<!-- Slimscroll JavaScript -->
	<script src="{{ asset('back/classic/dist/js/jquery.slimscroll.js') }}"></script>

	<!-- Owl JavaScript -->
	<script src="{{ asset('back/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>

	<!-- Switchery JavaScript -->
	<script src="{{ asset('back/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

	<!-- Fancy Dropdown JS -->
	<script src="{{ asset('back/classic/dist/js/dropdown-bootstrap-extended.js') }}"></script>

  <!-- Moment JavaScript -->
  <script type="text/javascript" src="{{ asset('back/vendors/bower_components/moment/min/moment-with-locales.min.js') }}"></script>

  <!-- Bootstrap Colorpicker JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/mjolnic-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>

  <!-- Switchery JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/switchery/dist/switchery.min.js') }}"></script>

  <!-- Select2 JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

  <!-- Bootstrap Select JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>

  <!-- Bootstrap Tagsinput JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

  <!-- Bootstrap Touchspin JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js') }}"></script>

  <!-- Multiselect JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/multiselect/js/jquery.multi-select.js') }}"></script>


  <!-- Bootstrap Switch JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js') }}"></script>

  <!-- Bootstrap Datetimepicker JavaScript -->
  <script type="text/javascript" src="{{ asset('back/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

  <!-- Form Advance Init JavaScript -->
  <script src="{{ asset('back/classic/dist/js/form-advance-data.js') }}"></script>

  <!-- Slimscroll JavaScript -->
  <script src="{{ asset('back/classic/dist/js/jquery.slimscroll.js') }}"></script>

  <!-- Fancy Dropdown JS -->
  <script src="{{ asset('back/classic/dist/js/dropdown-bootstrap-extended.js') }}"></script>

  <!-- Owl JavaScript -->
  <script src="{{ asset('back/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js') }}"></script>

  <!-- Progressbar Animation JavaScript -->
	<script src="{{ asset('back/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('back/vendors/bower_components/jquery.counterup/jquery.counterup.min.js') }}"></script>

	<!-- Init JavaScript -->
	<script src="{{ asset('back/classic/dist/js/init.js') }}"></script>

  @yield('custom_js')


</body>

</html>
