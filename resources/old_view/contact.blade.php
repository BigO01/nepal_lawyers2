@extends('public.master')
@section('title', 'Contact Us')


@push('css')
	<!-- Favicon -->
<link rel="shortcut icon" href="#" type="image/x-icon" />
<link rel="apple-touch-icon" href="#">

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


<section class="page-header">
	<div class="container">

<div class="row">
	<div class="col-md-12">
<h1>Contact Us</h1>
	</div>
</div>
	</div>
</section>

<div class="container">

	<div class="row">
<div class="col-md-12">

	<div class="featured-boxes">
<div class="row">
	
	<div class="col-sm-12">
<div class="featured-box featured-box-primary align-left mt-xlg">
	<div class="box-content">
	
{{-- This code is for flash msg --}}
    @if ( $feedback = session()->get('feedback') )
                 
        <div class="alert {!! $feedback_class = session()->get('feedback_class') !!} alert-dismissible col-lg-12" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{ $feedback }}
        </div>
    @endif 
{{-- This code is for flash msg till here --}}

	<div class="row pt-xl">
<div class="col-md-7">
	<h1 class="mt-xl mb-none">Contact Us</h1>
	<div class="divider divider-primary divider-small mb-xl">
<hr>
	</div>
	<p class="lead mb-xl mt-lg">Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit.</p>



	{!! Form::open(['route'=>'sendemail','id'=>'contactForm']) !!}
      

		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" placeholder="Your Name" value="{{ old('name') }}" data-msg-required="Please enter your name." maxlength="100" class="form-control input-lg" name="name" id="name" required>
					<?php echo $errors->first('name', "<li style='color:red'>:message</li>") ?> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<input type="email" placeholder="Your E-mail" value="{{ old('email') }}" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control input-lg" name="email" id="email" required>
					<?php echo $errors->first('email', "<li style='color:red'>:message</li>") ?> 
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<input type="text" placeholder="Subject" value="{{ old('subject') }}" data-msg-required="Please enter the subject." maxlength="100" class="form-control input-lg" name="subject" id="subject" required>
					<?php echo $errors->first('subject', "<li style='color:red'>:message</li>") ?>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="form-group">
				<div class="col-md-12">
					<textarea maxlength="5000" placeholder="Message" data-msg-required="Please enter your message." rows="5" class="form-control input-lg" name="message" id="message" required></textarea>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<input type="submit" name="submit" value="Send Message" class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
			</div>
		</div>

	{!! Form::close() !!}

</div>
<div class="col-md-4 col-md-offset-1">

	<h4 class="mt-xl mb-none">Our Office</h4>
	<div class="divider divider-primary divider-small mb-xl">
<hr>
	</div>

	<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name</li>
<li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>
<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
	</ul>

	<h4 class="pt-xl mb-none">Business Hours</h4>
	<div class="divider divider-primary divider-small mb-xl">
<hr>
	</div>

	<ul class="list list-icons list-dark mt-xlg">
<li><i class="fa fa-clock-o"></i> Monday - Friday - 9am to 5pm</li>
<li><i class="fa fa-clock-o"></i> Saturday - 9am to 2pm</li>
<li><i class="fa fa-clock-o"></i> Sunday - Closed</li>
	</ul>

</div>
	</div>
</div>

<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
<div id="googlemaps" class="google-map google-map-footer"></div>
	</div>


	</div>
</div>
	
	</div>
</div>
	</div>

</div>

	</div>


@stop


@push('js')
	<!-- Vendor -->
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
		<!-- <script src="{{ URL::to('public/js/views/view.contact.js') }}"></script>
 -->
		<!-- Demo -->
		<script src="{{ URL::to('public/js/demos/demo-law-firm.js') }}"></script>	
		
		<!-- Theme Custom -->
		<script src="{{ URL::to('public/js/custom.js') }}"></script>
		
		<!-- Theme Initialization Files -->
		<script src="{{ URL::to('public/js/theme.init.js') }}"></script>


		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAezXdMpdvu96ZXAIwKSEgg3p-J6D0sT2A"></script>
		<script>


			// Map Markers
			var mapMarkers = [{
				address: "New York, NY 10017",
				html: "<strong>New York Office</strong><br>New York, NY 10017",
				icon: {
					image: "img/pin.png",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];

			// Map Initial Location
			var initLatitude = 40.75198;
			var initLongitude = -73.96978;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: (($.browser.mobile) ? false : true),
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 16
			};

			var map = $('#googlemaps').gMap(mapSettings),
				mapRef = $('#googlemaps').data('gMap.reference');

			// Map Center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$('#googlemaps').gMap("centerAt", options);
			}

			// Create an array of styles.
			var mapColor = "#cfa968";

			var styles = [{
				stylers: [{
					hue: mapColor
				}]
			}, {
				featureType: "road",
				elementType: "geometry",
				stylers: [{
					lightness: 0
				}, {
					visibility: "simplified"
				}]
			}, {
				featureType: "road",
				elementType: "labels",
				stylers: [{
					visibility: "off"
				}]
			}];

			var styledMap = new google.maps.StyledMapType(styles, {
				name: 'Styled Map'
			});

			mapRef.mapTypes.set('map_style', styledMap);
			mapRef.setMapTypeId('map_style');

		</script>
@endpush