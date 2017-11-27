@extends('public.master')
@section('title','Get Started')


@push('css')
<!-- Favicon -->
<link rel="shortcut icon" href="#" type="image/x-icon" />
<link rel="apple-touch-icon" href="#">

<!-- Mobile Metas -->
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

<!-- Web Fonts  -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

	{{-- <!-- Vendor CSS --> --}}
     
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/bootstrap/css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/font-awesome/css/font-awesome.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/animate/animate.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/simple-line-icons/css/simple-line-icons.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/owl.carousel/assets/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/owl.carousel/assets/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/magnific-popup/magnific-popup.min.css') }} ">

        {{-- <!-- Theme CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-elements.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-blog.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-shop.css') }} ">

        {{-- <!-- Current Page CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/settings.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/layers.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/navigation.css') }} ">

        {{-- <!-- Skin CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/skins/skin-law-firm.css') }} "> 

        {{-- <!-- Demo CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/demos/demo-law-firm.css') }} ">

        {{-- <!-- Theme Custom CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/custom.css') }} ">

@endpush        
@push('js1')
        {{-- <!-- Head Libs --> --}}
        <script src="{{ URL::to('/public/vendor/modernizr/modernizr.min.js') }} "></script>
@endpush


{{-- Main contant start --}}

@section('content')


	<div role="main" class="main">

<section class="page-header">
	<div class="container">

<div class="row">
	<div class="col-md-12">
<h1>Get Started</h1>
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
<h4 class="heading-primary text-uppercase mb-md center">Complete Your Account</h4>
<div class="row">
<div class="col-md-12 center mtb">

<h2 class="mb-none">{{ $data['email'] or old('email') }} </h2>
</div>
	
</div>

						{{-- Form Start Here --}}

 {!! Form::open(['route'=>'signup2','id'=>'frmSignUp']) !!}
   {{ csrf_field() }}

{{-- These are hidden fields --}}

<div class="row">
<div class="form-group">

@if($data)
    <div class="col-md-6">
        <input type="hidden" name="email" value="{{ $data['email'] or old('email') }}" class="form-control input-lg" required="required">
	</div>

	<div class="col-md-6">
        <input type="hidden" name="fname" value="{{ $data['fname'] or old('fname') }}" class="form-control input-lg" required="required">
	</div>
   
    <div class="col-md-6">
        <input type="hidden" name="lname" value="{{ $data['lname'] or old('lname') }}" class="form-control input-lg" required="required">
	</div>

	<div class="col-md-6">
        <input type="hidden" name="img" value="{{ $data['img'] or old('img') }}" class="form-control input-lg" required="required">
	</div>
@endif
	
</div>
	</div>

{{-- Hidden fields ends here --}}	

	<div class="row">
		<div class="form-group">
			<div class="col-md-12">
	 			 <label for="sel1">Select Reigon</label>
	  			<select class="form-control input-lg" id="sel1" name="region" required="required">
				    <option value="">Select An Option </option>  
				    
			@foreach( $regions as $region )
				    <option {{ old('region') == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->region_name }} </option>
			@endforeach	
				    
	  			</select>
			</div>
		</div>
	</div>
	
	<div class="row">
		<div class="form-group">
			<div class="col-md-6">
				<label>Password</label>
				<input type="password" name="password" value="" class="form-control input-lg" required="required" minlength="8">
				<?php echo $errors->first('password', "<li style='color:red'>:message</li>") ?> 
			</div>
			<div class="col-md-6">
				<label>Re-enter Password</label>
				<input type="password" name="password_confirmation" value="" class="form-control input-lg" required="required">
				<?php echo $errors->first('password_confirmation', "<li style='color:red'>:message</li>") ?> 
			</div>
		</div>
	</div>
	<div class="col-md-12 center mtb">
<h2 class="mt-xl mb-none">I want to</h2>

<?php echo $errors->first('register', "<li style='color:red'>:message</li>") ?> 	
</div>

<div class="row">
	<div class="form-group">

		<div class="col-xs-12 col-sm-4 center">  

            <input type="radio" name="register" value="lawyer" id="lawyer" {{ old('register') == 'lawyer' ? 'checked' : '' }} />
            <div class="btn-group">
                <label for="lawyer" class="btn btn-lg btn-default">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="lawyer" class="btn btn-lg btn-primary">
                    Register as Lawyer
                </label>
            </div>
        </div>
      
        <div class="col-xs-12 col-sm-4 center">
            <input type="radio" name="register" value="lawfirm" id="lawfirm" {{ old('register') == 'lawfirm' ? 'checked' : '' }}  />
            <div class="btn-group">
                <label for="lawfirm" class="btn btn-lg btn-default">
                    <span class="[ glyphicon glyphicon-ok ]"></span>
                    <span> </span>
                </label>
                <label for="lawfirm" class="btn btn-lg btn-primary">
                     Register as Law Firm
                </label>
            </div>
        </div>

         <div class="col-xs-12 col-sm-4 center">
            <input type="radio" name="register" value="guest" id="member" {{ old('register') == 'guest' ? 'checked' : '' }} />
            	<div class="btn-group">
                	<label for="member" class="btn btn-lg btn-default">
                    	<span class="[ glyphicon glyphicon-ok ]"></span>
                    	<span> </span>
                	</label>
                <label for="member" class="btn btn-lg btn-primary">
                     Become a Member
                </label>
            </div>
        </div>

    </div>{{-- form-group --}}
</div>{{-- Row end --}}

	<div class="row">
		<div class="container">
			<div class="form-group">
				<div class="col-md-12">
					<div class="checkbox">
  						<label>
  							<input class="checkbox" type="checkbox" name="checkBox" value="1" required="required" style="display:block;">I Accept the Nepal Lawyers <a href="#">  Terms of conditions </a> including the <a href="#"> Privacy Policy</a>
  						</label>
  						<?php echo $errors->first('checkBox', "<li style='color:red'>:message</li>") ?> 
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<input type="submit" value="Submit" class="mtb btn btn-lg btn-primary pull-right mb-xl" >
			
		</div>
	</div>

{!! Form::close() !!}



	</div>
</div>
	</div>
</div>

	</div>
</div>
	</div>

</div>

	</div>

{{-- Main contant ends --}}

@stop


@push('js')
    {{-- <!-- Vendor --> --}}
<script src="{{ URL::to('/public/vendor/jquery/jquery.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery.appear/jquery.appear.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery.easing/jquery.easing.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery-cookie/jquery-cookie.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/common/common.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery.validation/jquery.validation.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery.gmap/jquery.gmap.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/jquery.lazyload/jquery.lazyload.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/isotope/jquery.isotope.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/owl.carousel/owl.carousel.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/magnific-popup/jquery.magnific-popup.min.js') }} "></script>
<script src="{{ URL::to('/public/vendor/vide/vide.min.js') }} "></script>

{{-- <!-- Theme Base, Components and Settings --> --}}
<script src="{{ URL::to('/public/js/theme.js') }} "></script>

 {{-- <!-- Theme Custom --> --}}
<script src="{{ URL::to('/public/js/custom.js') }} "></script>

{{-- <!-- Theme Initialization Files --> --}}
        <script src="{{ URL::to('/public/js/theme.init.js') }} "></script>
@endpush