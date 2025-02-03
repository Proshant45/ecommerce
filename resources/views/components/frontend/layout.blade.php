<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tohoney - Home Page</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('assets')}}/images/favicon.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- all css here -->
    <!-- bootstrap v4.0.0-beta.2 css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">
    <!-- owl.carousel.2.0.0-beta.2.4 css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/owl.carousel.min.css">
    <!-- font-awesome v4.6.3 css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/font-awesome.min.css">
    <!-- flaticon.css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/flaticon.css">
    <!-- jquery-ui.css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/jquery-ui.css">
    <!-- metisMenu.min.css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/metisMenu.min.css">
    <!-- swiper.min.css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/swiper.min.css">
    <!-- style css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/styles.css">
    <!-- responsive css -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/responsive.css">
    <!-- modernizr css -->
    <script src="{{asset('assets')}}/js/vendor/modernizr-2.8.3.min.js"></script>
    @vite('resources/css/bootstrap.css')
</head>
<body>
<x-frontend.navbar/>
    {{$slot}}
<x-frontend.footer/>

<!-- Modal area start -->
<!-- jquery latest version -->
<script src="{{asset('assets')}}/js/vendor/jquery-2.2.4.min.js"></script>
<!-- bootstrap js -->
<script src="{{asset('assets')}}/js/bootstrap.min.js"></script>
<!-- owl.carousel.2.0.0-beta.2.4 css -->
<script src="{{asset('assets')}}/js/owl.carousel.min.js"></script>
<!-- scrollup.js -->
<script src="{{asset('assets')}}/js/scrollup.js"></script>
<!-- isotope.pkgd.min.js -->
<script src="{{asset('assets')}}/js/isotope.pkgd.min.js"></script>
<!-- imagesloaded.pkgd.min.js -->
<script src="{{asset('assets')}}/js/imagesloaded.pkgd.min.js"></script>
<!-- jquery.zoom.min.js -->
<script src="{{asset('assets')}}/js/jquery.zoom.min.js"></script>
<!-- countdown.js -->
<script src="{{asset('assets')}}/js/countdown.js"></script>
<!-- swiper.min.js -->
<script src="{{asset('assets')}}/js/swiper.min.js"></script>
<!-- metisMenu.min.js -->
<script src="{{asset('assets')}}/js/metisMenu.min.js"></script>
<!-- mailchimp.js -->
<script src="{{asset('assets')}}/js/mailchimp.js"></script>
<!-- jquery-ui.min.js -->
<script src="{{asset('assets')}}/js/jquery-ui.min.js"></script>
<!-- main js -->
<script src="{{asset('assets')}}/js/scripts.js"></script>
</body>

</html>
