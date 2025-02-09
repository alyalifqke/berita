<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>News HTML-5 Template </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        {{-- <link rel="manifest" href="site.webmanifest"> --}}
		<link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets2/img/favicon.ico') }}">

		<!-- CSS here -->
            <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/owl.carousel.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/ticker-style.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/flaticon.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/slicknav.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/animate.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/magnific-popup.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/fontawesome-all.min.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/themify-icons.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/slick.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/nice-select.css') }}">
            <link rel="stylesheet" href="{{ asset('assets2/css/style.css') }}">
              <!-- Bootstrap CSS -->
            {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
   </head>

   <body>
       
    @php
    $setting = \App\Models\Setting::first();
    @endphp
    <!-- Preloader Start -->
    <!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="assets/img/logo/logo.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
    <!-- Preloader Start -->


        <!-- Header Start -->
        @include('layouts.headerfront')
        <!-- Header End -->

    {{-- @include('layouts.navbar')
        

     
    @include('layouts.modal')
    
    @include('layouts.features') --}}

    <main>
        @yield('content')
    </main>
    
    @include('layouts.frontfooter')
   
	<!-- JS here -->
	
		<!-- All JS Custom Plugins Link Here here -->
        <script src="{{ asset('assets2/js/vendor/modernizr-3.5.0.min.js') }}"></script>
		<!-- Jquery, Popper, Bootstrap -->
		<script src="{{ asset('assets2/js/vendor/jquery-1.12.4.min.js') }}"></script>
        <script src="{{ asset('assets2/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets2/js/bootstrap.min.js') }}"></script>
	    <!-- Jquery Mobile Menu -->
        <script src="{{ asset('assets2/js/jquery.slicknav.min.js') }}"></script>

		<!-- Jquery Slick , Owl-Carousel Plugins -->
        <script src="{{ asset('assets2/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets2/js/slick.min.js') }}"></script>
        <!-- Date Picker -->
        <script src="{{ asset('assets2/js/gijgo.min.js') }}"></script>
		<!-- One Page, Animated-HeadLin -->
        <script src="{{ asset('assets2/js/wow.min.js') }}"></script>
		<script src="{{ asset('assets2/js/animated.headline.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.magnific-popup.js') }}"></script>

        <!-- Breaking New Pluging -->
        <script src="{{ asset('assets2/js/jquery.ticker.js') }}"></script>
        <script src="{{ asset('assets2/js/site.js') }}"></script>

		<!-- Scrollup, nice-select, sticky -->
        <script src="{{ asset('assets2/js/jquery.scrollUp.min.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.nice-select.min.js') }}"></script>
		<script src="{{ asset('assets2/js/jquery.sticky.js') }}"></script>
        
        <!-- contact js -->
        <script src="{{ asset('assets2/js/contact.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.form.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets2/js/mail-script.js') }}"></script>
        <script src="{{ asset('assets2/js/jquery.ajaxchimp.min.js') }}"></script>
        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="{{ asset('assets2/js/plugins.js') }}"></script>
        <script src="{{ asset('assets2/js/main.js') }}"></script>

        <!-- Bootstrap JS (Wajib untuk modal) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
    </body>
</html>



