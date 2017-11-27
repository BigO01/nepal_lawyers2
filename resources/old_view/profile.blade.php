@extends('public.master')
@section('title', 'Profile')


@push('css')
	<!-- Basic -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">	

		<meta name="keywords" content="HTML5 Template" />
		<meta name="description" content="Porto - Responsive HTML5 Template">
		<meta name="author" content="okler.net">

		<!-- Favicon -->
		<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
		<link rel="apple-touch-icon" href="img/apple-touch-icon.png">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<!-- Web Fonts  -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/vendor/bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/font-awesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/animate/animate.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/simple-line-icons/css/simple-line-icons.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/owl.carousel/assets/owl.carousel.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/owl.carousel/assets/owl.theme.default.min.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/magnific-popup/magnific-popup.min.css') }}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/css/theme.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/css/theme-elements.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/css/theme-blog.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/css/theme-shop.css') }}">

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/settings.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/layers.css') }}">
		<link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/navigation.css') }}">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/css/skins/skin-law-firm.css') }}"> 

		<!-- Demo CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/css/demos/demo-law-firm.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ URL::to('public/vendor/modernizr/modernizr.min.js') }}"></script>
@endpush


@section('content')

			<div role="main" class="main">
<div class="container">
	<div class="row pt-xl">

		<div class="col-sm-12">

			<div class="row mt-xl mb-xl">
<div class="col-sm-4 center">
	<img src="{{ URL::to('public/profileimages/'.Auth::user()->image_path )}}" class="img-responsive mb-xl" alt="">
</div>
<div class="col-sm-8">

	<h1 class="mt-none mb-none">{{ Auth::user()->first_name }}{{ Auth::user()->last_name }}</h1>


	<p class="lead">

	</p>
	<div class="divider divider-primary divider-small mb-xl">
		<hr>
	</div>
	<ul class="list list-icons">
		<li><i class="fa fa-phone"></i> <strong>Phone:</strong>{{Auth::user()->contact}}</li>
		<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">{{Auth::user()->email}}</a></li>
	</ul>
	<span class="thumb-info-social-icons p-none mt-lg pt-lg">
		<a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i><span>Facebook</span></a>
		<a href="http://www.twitter.com"><i class="fa fa-twitter"></i><span>Twitter</span></a>
		<a href="http://www.linkedin.com"><i class="fa fa-linkedin"></i><span>Linkedin</span></a>
	</span>
</div>


			</div>
			<div class="row mt-xl">
<div class="col-sm-12">
	<p class="lead pb-xl">David Doe graduated from Brooklyn Law School in 1979 and consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet.</p>
	<div class="col-sm-5">
		<blockquote>
			<p>"Pellentesque pellentesque eget tempor tellus. Fusce lacllentesque eget tempor tellus ellentesque pelleinia tempor malesuada. Pellentesque pellentesque eget tempor tellus ellentesque pellentesque eget tempor tellus. Fusce lacinia tempor malesuada."</p>
		</blockquote>
	</div>
	<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Nullam convallis, arcu vel pellentesque sodales, nisi est varius diam, ac ultrices sem ante quis sem. Proin ultricies volutpat sapien, nec scelerisque ligula mollis lobortis.</p>
	<p>Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc vehicula lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Vestibulum ante ipsum primis in faucibus orci.</p>
</div>
			</div>
		</div>

		
	</div>

</div>
			</div>

@stop


@push('js')
		<script src="{{ URL::to('public/vendor/jquery/jquery.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery-cookie/jquery-cookie.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/common/common.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery.validation/jquery.validation.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/isotope/jquery.isotope.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/vide/vide.min.js') }}"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="{{ URL::to('public/js/theme.js') }}"></script>
		
		<!-- Current Page Vendor and Views -->
		<script src="{{ URL::to('public/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }}"></script>
		<script src="{{ URL::to('public/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>

		<!-- Current Page Vendor and Views -->
		<script src="{{ URL::to('public/js/views/view.contact.js') }}"></script>

		<!-- Demo -->
		<script src="{{ URL::to('public/js/demos/demo-law-firm.js') }}"></script>	
		
		<!-- Theme Custom -->
		<script src="{{ URL::to('public/js/custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ URL::to('public/js/theme.init.js') }}"></script>
@endpush