@extends('public.master')
@section('title','Find Lawyer')

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
		<link rel="stylesheet" href="{{ URL::to('public/css/demos/demo-shop-7.css') }}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{ URL::to('public/css/custom.css') }}">

		<!-- Head Libs -->
		<script src="{{ URL::to('public/vendor/modernizr/modernizr.min.js') }}"></script>
@endpush

{{-- Main contant start --}}
@section('content')

<div role="main" class="main col-md-offset-2">
			 
        
<div class="row">
	<div class="col-md-3">	
<div id="combinationFilters" class="filters">

{{--@@@@@@@@@@@@@@@@@@@ Filters start @@@@@@@@@@@@@@@@@@@@@@--}}

<div class="toggle toggle-primary" data-plugin-toggle>
								<section class="toggle active">
									<label>Practice Area:</label>
									<div class="toggle-content">
	<ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group1">
		<li data-option-value="" class="active"><a href="#">Show All</a></li>
		@foreach($expertises as $aop)
		<li data-option-value=".{{ $aop->id }}">
			<a href="#">{{$aop->expertise_name}}</a>
		</li>
		@endforeach
		
	</ul>
									</div>
								</section>

								<section class="toggle">
									<label>State</label>
									<div class="toggle-content">
	<ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group1">
		<li data-option-value="" class="active"><a href="#">Show All</a></li>
		@foreach($states as $state)
		<li data-option-value=".{{$state->id}}">
			<a href="#">{{$state->state_name}}</a>
		</li>
		@endforeach
	</ul>
									</div>
								</section>
								
								<section class="toggle">
									<label>City</label>
									<div class="toggle-content">
	<ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group1">
		<li data-option-value="" class="active"><a href="#">Show All</a></li>
		@foreach($cities as $city)
		<li data-option-value=".{{$city->id}}">
			<a href="#">{{$city->city_name}}</a>
		</li>
		@endforeach
	</ul>
									</div>
								</section>
								<section class="toggle">
									<label>Reigon:</label>
									<div class="toggle-content">
	<ul class="nav nav-list mb-xlg sort-source team-filter-group" data-filter-group="group2">
		<li data-option-value="" class="active"><a href="#">Show All</a></li>
		@foreach($regions as $region)
		<li data-option-value=".{{ $region->id }}">
			<a href="#">{{$region->region_name}}</a>
		</li>
		@endforeach
	</ul>
									</div>
								</section>
							</div>
{{--@@@@@@@@@@@@@@@@@@@ Filters ends @@@@@@@@@@@@@@@@@@@@@@--}}	

</div>
</div>



			
	<div class="col-md-7">	

		<h1 class="mt-xl mb-none">Law Firm Attorneys</h1>
		<div class="divider divider-primary divider-small mb-xl">
<hr>
		</div>

			
		<div id="test-list">
    		<input type="text"  class="form-control input-lg mb-lg ml-md search" placeholder="Find a Lawyer by Name, Reigon and Expertise" style=" width: 95%" />
<!-- List -->
			<ul class="team-list mt-xs list">

@foreach($data as $d)										<!-- List -->
	
				<li class="col-md-12 mb-xl {{ $d->region_id }} {{ $d->state_id }} {{ $d->city_id }}		

				<?php 

				  $dl = explode(',', $d->l_expertise_id);
				  foreach ($dl as $key) {
				  	echo $key." ";
				  }

				?>

				<?php 

				  $df = explode(',', $d->f_expertise_id);
				  foreach ($df as $key) {
				  	echo $key." ";
				  }

				?>

				 center isotope-item capital-law new-york">
					<div class="lawyer lawyer-list">
						<figure class="lawyer-image-area">
							<a href="#" title="lawyer Name" class="lawyer-image">
								<img src="{{ URL::to('public/profileimages/'.$d->image_path )}}" alt="Picture">
							</a>	
						</figure>
						<div class="lawyer-details-area">
							<h2 class="lawyer-name"><a href="{{ url('detail').'/'.$d->id}}" title="lawyer Name"><span class="name">{{$d->first_name}}{{ $d->last_name }}<span></a></h2>
        					
        					{{-- Rating start --}}
        					<div class="tooltip-col"> 
        						<div class="lawyer-ratings">
									<div class="ratings-box">
										<div class="rating" style="width:60%"></div>  
									</div>
								</div>
         						<span class="tooltiptext3">
         						<div class="col-xs-12 col-md-12">
         							<div class="row rating-desc">
             							<div class="col-xs-3 col-md-3 ">
										  	<span class="glyphicon glyphicon-star"></span>5
										</div>
             							<div class="col-xs-8 col-md-9">
										  	<div class="progress progress-striped">
										      	<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
										          	<span class="sr-only">80%</span>
										      	</div>
										  	</div>
             							</div>
             <!-- end 5 -->
             <div class="col-xs-3 col-md-3 ">
  <span class="glyphicon glyphicon-star"></span>4
             </div>
             <div class="col-xs-8 col-md-9">
  <div class="progress">
      <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="20"
          aria-valuemin="0" aria-valuemax="100" style="width: 60%">
          <span class="sr-only">60%</span>
      </div>
  </div>
             </div>
             <!-- end 4 -->
             <div class="col-xs-3 col-md-3 ">
  <span class="glyphicon glyphicon-star"></span>3
             </div>
             <div class="col-xs-8 col-md-9">
  <div class="progress">
      <div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20"
          aria-valuemin="0" aria-valuemax="100" style="width: 40%">
          <span class="sr-only">40%</span>
      </div>
  </div>
             </div>
             <!-- end 3 -->
             <div class="col-xs-3 col-md-3 ">
  <span class="glyphicon glyphicon-star"></span>2
             </div>
             <div class="col-xs-8 col-md-9">
  <div class="progress">
      <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="20"
          aria-valuemin="0" aria-valuemax="100" style="width: 20%">
          <span class="sr-only">20%</span>
      </div>
  </div>
             </div>
             <!-- end 2 -->
             <div class="col-xs-3 col-md-3 ">
  <span class="glyphicon glyphicon-star"></span>1
             </div>
             <div class="col-xs-8 col-md-9">
  <div class="progress">
      <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80"
          aria-valuemin="0" aria-valuemax="100" style="width: 15%">
          <span class="sr-only">15%</span>
      </div>
  </div>
             </div></div></div></span>
          </div> {{-- Rating end --}}
    


		<div class="lawyer-short-desc">
			<i class="fa fa-map-marker"></i>
			<span class="reigon">{{ $d->region_name }}</span>	
		</div>
		<div class="lawyer-short-desc mb-sm">
			<span>Experience: {{ $d->fexperience }} {{ $d->lexperience }}</span>			
		</div>

		<div class="lawyer-actions expertise">


{{-- Show experties names --}}
			<?php 

				  $df = explode(',', $d->f_expertise_id);
				  $dl = explode(',', $d->l_expertise_id);
				  foreach ($df as $key) {
				  	foreach($expertises as $ex){
				  		if($key == $ex->id){
				  			echo "<span class='btn btn-borders btn-default mr-xs mb-sm'>". $ex->expertise_name ."</span>";
				  		}
				  	}
				  }
				  foreach ($dl as $key) {
				  	foreach($expertises as $ex){
				  		if($key == $ex->id){
				  			echo "<span class='btn btn-borders btn-default mr-xs mb-sm'>". $ex->expertise_name ."</span>";
				  		}
				  	}
				  }

			?>
	
	<span class="mb-lg" style="color: #155c9e; cursor:pointer;" data-toggle="collapse" data-target="#show{{ $d->fexperience }}{{ $d->lexperience }}" >View More <i class="fa fa-chevron-circle-down"></i></span>	

			<!-- <button type="button" class="btn btn-info mr-xs mb-sm" data-toggle="collapse" data-target="#show{{ $d->fexperience }}{{ $d->lexperience }}">Read More</button> -->
  	<div id="show{{ $d->fexperience }}{{ $d->lexperience }}" class="collapse">
			
	</div>

		</div>

		<div class="lawyer-actions pull-right">
			<a href="mailto:example@example.com" class="btn btn-primary" title="Contact">
				<i class="fa fa-envelope"></i>
				<span>{{ $d->email }}</span>
			</a>
			<a href="#" class="btn btn-primary" title="Contact">
				<i class="fa fa-phone"></i>
				<span>{{ $d->contact }}</span>
			</a>	
		</div>
	</div>
</div>
</li>	


@endforeach

</ul>

</div>
</div>
</div>
</div>

{{-- Main contant ends --}}

@stop
          
		
		
@push('js')
		<!-- Vendor -->
		<script type="text/javascript" src="{{ URL::to('public/js/list.js') }}"></script>
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

