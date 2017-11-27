
<!DOCTYPE html>
<html>
    <head>					
	<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/59c0fcd64854b82732ff0e41/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
        <!-- Basic -->
        <meta charset="utf-8">
    	<meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   
        <meta http-equiv="X-Content-Security-Policy" content="allow self" />

		<title>Nepal Lawyers : @yield('title')</title>
		<link rel="stylesheet" href="{{ URL::to('public/style.css') }}">
		<script language="JavaScript" src="{{ URL::to('/public/jquery.js') }} " type="text/javascript"></script>
        <script language="JavaScript" src="{{ URL::to('/public/js/bootstrap.js') }} " type="text/javascript"></script>
    <!-- /********************/  -->

	@stack('css')
	@stack('js1')
</head>
<body oncontextmenu="return false;" style="padding-right: 0 !important; " >


	<div class="body">
<header id="header" class="header-no-border-bottom" data-plugin-options="{'stickyEnabled': true, 'stickyEnableOnBoxed': true, 'stickyEnableOnMobile': true, 'stickyStartAt': 115, 'stickySetTop': '-115px', 'stickyChangeLogo': false}">
	{{-- This code is for flash msg --}}

	@if ( $msg = session()->get('msg') )
	                 
	        <div class="alert alert-success alert-dismissible col-lg-12" role="alert">
	            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	              {{ $msg }}
	        </div>
	@endif 
	
{{-- This code is for flash msg till here --}}

	<div class="header-body">
    	<div class="header-container container">
        	<div class="header-row">
            	<div class="header-column">
					<div class="header-logo">
					    <a href="{{ URL::to('/') }}">
					        <img alt="Porto" width="300" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33" src="{{ URL::to('public/images/logofirm.png') }}">
					    </a>
					</div>
            	</div>
            	<div class="header-column">
					<ul class="header-extra-info">

{{-- If user is login --}}				
@if(Auth::check())  
	<li>
	    <div class="feature-box feature-box-call feature-box-style-2">
	        <div class="btn-lg btn btn-primary dropdown dropdown-mega dropdown-mega-signin signin logged" id="headerAccount" >
	        <i class="fa fa-user"></i> {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
	    		<ul class="dropdown-menu">
	        		<li class="lia">
						<div class="dropdown-mega-content">
							<div class="row">
							    <div class="col-md-8">
							        <div class="user-avatar">
										<div class="img-thumbnail">
											<img src="{{ URL::to('/') }}/public/profileimages/{{ Auth::user()->image_path }}" alt="">
										</div>
										<p><strong>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</strong><span>{{ Auth::user()->role }}</span></p>
							        </div>
							    </div>
							    <div class="col-md-4">
							        <ul class="list-account-options">
										<li class="lia">
											<a href="{{ url('/setting') }}">Setting</a>
										</li>
										<li class="lia">
											<a href="{{ url('/profile') }}">My Account</a>
										</li>
										<li class="lia">
											<a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Log Out</a>
											<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                        	{{ csrf_field() }}
	                                    	</form>
										</li>
							        </ul>
							    </div>
							</div>
						</div>
	        		</li>
	    		</ul>
			</div>
	    </div>
	</li>
@endif

{{-- If user is not login --}}
			<?php if(!Auth::check()): ?> 
					    <li class="">
					        <div class="feature-box feature-box-mail feature-box-style-2">
					            <a href="{{ route('login') }}"><button type="button" class=" btn-lg btn btn-primary" style=" "><i class="fa fa-sign-in" style="padding-right: 10px;"></i> Login</button></a>
					        </div>
					    </li>
			<?php endif; ?>

					</ul>
            	</div>
        	</div>
    	</div>
	    <div class="header-container header-nav header-nav-bar header-nav-bar-primary">
	        <div class="container">
	            <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
					Menu <i class="fa fa-bars"></i>
	            </button>
	            
	            <div class="header-nav-main header-nav-main-light header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
					<nav>
					    <ul class="nav nav-pills" id="mainNav">
					        <li>
					            <a href="{{ URL::to('/') }}">
									Home
					            </a>
					        </li>
					        <li>
					            <a href="{{ URL::to('/about') }}">
									About
					            </a>
					        </li> 
					        <li>
					            <a href="{{ URL::to('/contact') }}">
									Contact Us
					            </a>
					        </li> 
					        <li>
					            <a href="{{ URL::to('/findlawyer') }}">
									Find a Lawyer
					            </a>
					        </li>   
					    </ul>
					</nav>
	            </div>
	        </div>
	    </div>
	</div>
</header>



	<!--@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@-->


		@section('content')

		@show


</div> {{-- Body div end--}}
<footer class="short" id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-5">
							<a href="{{ URL::to('/') }}" class="logo mb-md">
								<img alt="Porto Website Template" class="img-responsive" width="200" src="{{ URL::to('public/images/logofirm.png') }}">
							</a>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eu pulvinar magna. Phasellus semper scelerisque purus, et semper nisl lacinia sit amet. Praesent venenatis turpis vitae purus semper, eget sagittis velit venenatis.</p>
						</div>
						<div class="col-md-3 col-md-offset-1">
							<h5 class="mb-sm">Law Firm</h5>
							<ul class="list list-icons mt-xl">
								<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>
								<li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:mail@example.com">mail@example.com</a></li>
							</ul>
						</div>
						<div class="col-md-3">
							<h5 class="mb-sm">Toll Free</h5>
							<span class="phone">(800) 123-4567</span>
							<ul class="social-icons mt-lg">
								<li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
								<li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
								<li class="social-icons-linkedin"><a href="http://www.linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
								<p>© Copyright 2017. All Rights Reserved. | <a href="#">Contact</a></p>
							</div>
						</div>
					</div>
				</div>
			</footer>



@stack('js')
</body>
</html>