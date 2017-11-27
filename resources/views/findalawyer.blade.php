@extends('public.master')
@section('title','Find Lawyer')
@section('lawyer',"class=active")

@push('css')
<style type="text/css">
     
.percent{
	display: none;
}

/*Tooltip on Hover*/


.tooltip-col {
    position: relative;
    display: inline-block;
    cursor:pointer;
}
.tooltiptext3 {
    visibility: hidden;
    width: 300px;
    background-color: #353c4e;
    color: #fff;
    text-align: center;
    border-radius: 6px;
    padding: 10px 10px;
    box-sizing: border-box;
    position: absolute;
    z-index: 1;
    top: 30px;
    margin-left: -77px;
}

.tooltiptext3::after {
    content: "";
    position: absolute;
    top: -20px;
    left: 61px;   
    border-width: 10px;
    border-style: solid;
 border-color: transparent transparent #353c4e transparent;
}
.tooltip-col:hover .tooltiptext3 {
    visibility: visible;
}


/*Tooltip on Hover*/

      </style>
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
@endpush

@section('content')
{{-- Main contant start --}}

    <!-- Section: home -->
<section id="attroney" class="divider parallax layer-overlay">
    <div class="row">
     <div class="col-md-12 text-center bg-black">
      <div class="border-1px p-25">
       <h2>Lorem ipsum dolor sit amet, consectetur elit.</h2>
     
     <!-- Appointment Form Starts -->
       {!! Form::open(['route'=>'search','class'=>'form-inline']) !!}
        <div class="row">

        <div class="col-lg-2 col-md-6  col-sm-12 p-10 col-lg-offset-1 " style="">
          <select name="region" class="selectpicker form-control btnSize" data-live-search="true" >
          <option value="">Search By Province</option>
        @foreach( $regions as $region)  
           <option value="{{ $region->id }}">{{ $region->region_name }}</option>
        @endforeach   
          </select>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-12 p-10">
          <select name="state" class="selectpicker form-control btnSize" data-live-search="true">
           <option value="">Search By District</option>
        @foreach( $states as $state)  
           <option value="{{ $state->id }}">{{ $state->state_name }}</option>
        @endforeach   
          </select>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-12 p-10">
          <select name="city" class="selectpicker  form-control btnSize" data-live-search="true">
           <option value="">Search By City</option>
        @foreach( $cities as $city)  
           <option value="{{ $city->id }}">{{ $city->city_name }}</option>
        @endforeach 
          </select>
        </div>

        <div class="col-lg-2 col-md-6 col-sm-12 p-10">
          <select name="name" class="selectpicker  form-control btnSize" data-live-search="true">
           <option value="">Search By Name</option>
        @foreach( $usersName as $name)  
           <option value="{{ $name->first_name }}">{{ $name->first_name }}{{ $name->last_name }}</option>
        @endforeach 
          </select>
        </div>

        <div class="col-lg-2 col-lg-offset-0 col-md-6 col-md-offset-3 col-sm-12  p-10">
          <button type="submit" class="form-control form-control-custom btn btn-info search-focus  " > <i class=" icon_search"></i> Search</button>          
        </div>
        </div>
       {!! Form::close() !!}
      </div>
     </div> 
       <!-- Appointment Form Ends -->
    </div>
</section>
		
		 <!-- Section: Practice Area -->
	   <section class="content">
		<div class="row">
					<div class="col-lg-3">
							<div class="row">
							 <div class="col-lg-9 col-lg-offset-3 c-pt">
							  <div class="sidebar-widget">
								<h4 class="widget-title"><i class="fa fa-balance-scale text-theme-colored mr-10"></i>Law Practice</h4>
								<hr class="mt-0">
								<ul class="nav nav-pills nav-stacked nav-sidebar">
								@foreach($expertises as $aop)
								  	<li><a href="{{ route('findlawyer_list',[$aop->id]) }}" id="{{$aop->id}}">{{$aop->expertise_name}}</a></li>
								@endforeach
								</ul>
							  </div>
							  <div class="sidebar-widget widget m-0">
								<h5 class="widget-title mt-30 mb-10"><i class="fa fa-map-o mr-10 text-theme-colored"></i>Office Addres</h5>
								<hr class="mt-0">
								<ul class="text-widget address">
								  <li><i class="fa fa-map-marker mr-10"></i> <a href="#">{{ $web_info->address }}</a></li>
								  <li><i class="fa fa-phone mr-10"></i> <a href="#">{{ $web_info->contact_number }}</a></li>
								  <li><i class="fa fa-envelope-o mr-10"> </i> <a href="#">{{ $web_info->email }}</a></li>
								</ul>
							  </div>
							</div>
						</div>
					</div>

{{-- Lawyer listing start --}}
					<div class="col-lg-5 c-pt mb-30">

<h3>Total Results: {{ $data->total() }} </h3>
<h5>In this page ({{ $data->count() }} results) </h5>
@foreach($data as $d)						
						<div class="row brdr">
							<div class="col-lg-4 col-md-4 col-sm-4">
								<div class="attorney box-hover-effect effect1">
									<div class="thumb brdrgry">
										<img class="img-fullwidth" src="{{ URL::to('public/profileimages/'.$d->image_path )}}" alt="not found">
									@if(!empty($d->f_premium))	
										<div class="ribbon"><span>Premium</span></div>
									@elseif(!empty($d->l_premium))
										<div class="ribbon"><span>Premium</span></div>	
									@endif
									</div>
								</div>
@if($d->f_badge OR $d->l_badge)								
								<div class="badges">

									
<?php
		$fbadge = explode(',', $d->f_badge);
		$lbadge = explode(',', $d->l_badge);

		foreach ($fbadge as $f) {			  
			foreach ($badges as $key) {
				if($key->id == $f){
					$url = URL::to('public/webimages/'.'/'.$key->image_path);
					echo "<img src='$url' data-toggle='popover' data-placement='bottom' data-content='$key->badge_title' width='22px' height='22px' style='margin-right:5px; padding: 2px; background-color:$key->color; cursor:pointer;' >";
				}	
			}
		}	
		foreach ($lbadge as $l) {			  
			foreach ($badges as $key) {
				if($key->id == $l){
					$url = URL::to('public/webimages/'.'/'.$key->image_path);
					echo "<img src='$url' data-toggle='popover' data-placement='bottom' data-content='$key->badge_title' width='22px' height='22px' style='margin-right:5px; padding: 2px; background-color:$key->color; cursor:pointer;' >";
				}	
			}
		}	
?>				  						
							</div>
							@endif
							<div class="row mt-20">
									<div class="col-lg-12 col-md-12">
										<a class="btn btn-info cfr mt-5" href="{{ url('detail').'/'.$d->id}}">Book appointment</a>
									</div>
								</div>	
							</div>
							<div class="col-lg-8 col-md-8 col-sm-8">
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<a href="{{ url('detail').'/'.$d->id}}">
											<h4 class="cil">
												<strong>{{ $d->first_name }}{{ $d->last_name }}</strong>
											</h4>
										</a>
										<a class="btn btn-info cfr" href="{{ url('detail').'/'.$d->id}}">View detail</a>	
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12 col-md-12">
										<div class="tooltip-col">
										<div class="rating dib">
											<div class="rating-star">
<?php 
	$count = 0; 
	$stars = 0; 
	$star = 0; 

	$star1 = 0;
	$star2 = 0;
	$star3 = 0;
	$star4 = 0;
	$star5 = 0;
?>
@foreach($ratings as $rating)
	@if($rating->rated_id == $d->id)

		<?php $count++; ?>
		<?php $stars += $rating->rating_star; ?>

		@if( $rating->rating_star == 1 )
			<?php $star1++; ?>
		@endif
		@if( $rating->rating_star == 2 )
			<?php $star2++; ?>
		@endif
		@if( $rating->rating_star == 3 )
			<?php $star3++; ?>
		@endif
		@if( $rating->rating_star == 4 )
			<?php $star4++; ?>
		@endif
		@if( $rating->rating_star == 5 )
			<?php $star5++; ?>
		@endif
	
	@endif
@endforeach

<?php 
	
	if($count != 0)
	{
		$star = $stars/$count;
	}

	if($count != 0 AND $star5!=0)
	{
		$star5 = round($star5/$count*100);
	}

	if($count != 0 AND $star4!=0)
	{
		$star4 = round($star4/$count*100);
	}

	if($count != 0 AND $star3!=0)
	{
		$star3 = round($star3/$count*100);
	}

	if($count != 0 AND $star2!=0)
	{
		$star2 = round($star2/$count*100);
	}

	if($count != 0 AND $star1!=0)
	{
		$star1 = round($star1/$count*100);
	}


?>

									@if(number_format($star,1) > 0 )
										<img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
									@else
										<img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
									@endif
									@if(number_format($star,1) > 1.5)	
										<img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
									@else
										<img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
									@endif
									@if(number_format($star,1) > 2.5)
										<img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
									@else
										<img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
									@endif
									@if(number_format($star,1) > 3.5)
										<img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
									@else
										<img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
									@endif
									@if(number_format($star,1) > 4.5 )	
										<img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
									@else
										<img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
									@endif

						<!-- Hover Bar for rating detail -->

									<span class="tooltiptext3">
										<div class="col-xs-12 col-md-12">
											<div class="row rating-desc">
											 <div class="col-xs-3 col-md-3 ">
												<span class="glyphicon glyphicon-star"></span> 5
								             </div>
								             <div class="col-xs-8 col-md-9">
												<div class="progress progress-striped">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $star5 }}"
													  aria-valuemin="0" aria-valuemax="100" style="width: {{ $star5 }}% ">
													  {{ $star5 }}%
													</div>
												</div>
								             </div>
								             <!-- end 5 -->
								             <div class="col-xs-3 col-md-3 ">
												<span class="glyphicon glyphicon-star"></span> 4
								             </div>
								             <div class="col-xs-8 col-md-9">
												<div class="progress">
													<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="{{ $star4 }}"
													  aria-valuemin="0" aria-valuemax="100" style="width: {{ $star4 }}% ">{{ $star4 }}%
													</div>
												</div>
								             </div>
								             <!-- end 4 -->
								             <div class="col-xs-3 col-md-3 ">
												<span class="glyphicon glyphicon-star"></span> 3
								             </div>
								             <div class="col-xs-8 col-md-9">
												<div class="progress">
													<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="{{ $star3 }}"
													  aria-valuemin="0" aria-valuemax="100" style="width: {{ $star3 }}% ">{{$star3}}%</div>
												</div>
								             </div>
								             <!-- end 3 -->
								             <div class="col-xs-3 col-md-3 ">
												<span class="glyphicon glyphicon-star"></span> 2
								             </div>
								             <div class="col-xs-8 col-md-9">
												<div class="progress">
													<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="{{ $star2 }}"
														  aria-valuemin="0" aria-valuemax="100" style="width: {{ $star2 }}% ">{{$star2}}%</div>
												</div>
								             </div>
								             <!-- end 2 -->
												<div class="col-xs-3 col-md-3 ">
													<span class="glyphicon glyphicon-star"></span> 1
												</div>
												<div class="col-xs-8 col-md-9">
												  <div class="progress">
													  <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="{{ $star1 }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $star1 }}% ">{{$star1}}%</div>
												  </div>
												</div>
											</div>
										</div>
									</span>



												<span class="ccy">

{{ number_format($star,1) }}
												</span>
												<span class="db">Rating by: {{ $count }}</span>
											</div>
										</div>
										</div>
										<div class="reviews dib cfr">
											<span class="dib"><strong>{{ $count }} Consults</strong></span>
										</div>
									</div>
								</div>
								<hr class="chr">
								<div class="row">
									<div class="col-lg-8 col-md-8">
										<i class="icon_pin_alt cfsimargin: auto;"></i><span>{{ $d->region_name }},
@foreach($states as $s) 
    @if($d->state_id == $s->id)   
        {{ $s->state_name }}, 
    @endif 
@endforeach
@foreach($cities as $c) 
    @if($d->city_id == $c->id)   
        {{ $c->city_name }} 
    @endif 
@endforeach</span>
										<span class=" db experience"><strong>Experience :</strong> {{$d->lexperience}}{{$d->fexperience}} years</span>
										<span class="db expertise"><strong>Expertises :</strong> 
<?php 

	$df = explode(',', $d->f_expertise_id);
	$dl = explode(',', $d->l_expertise_id);
		foreach ($df as $key) {
			foreach($expertises as $ex){
				if($key == $ex->id){
				  	echo $ex->expertise_name .", ";
				  		}
				  	}
				  }
		foreach ($dl as $key) {
			foreach($expertises as $ex){
				if($key == $ex->id){
				  	echo $ex->expertise_name .", ";
				  		}
				  	}
				  }

?>
										</span>
									</div>
									<div class="col-lg-4 col-md-4">
										<div class="rating-number">
											<span class="db"><strong class="cf">Consultion Fee:</strong></span>
										@if( $web_info->web_premium == 'Disable' )	
											
											<a class="db consult" href="{{ url('detail').'/'.$d->id}}">Free</a>
											<a class="db consult btn btn-success" href="#" disabled>
												<span style='color:red;text-decoration:line-through;'>
												  <span style='color:white;'>
												  	रु {{ $d->f_fee_first }}{{ $d->l_fee_first }}
												  </span>
												</span>	
											</a>

										@elseif( $web_info->web_premium == 'Enable' )
											<a class="db consult" href="{{ url('detail').'/'.$d->id}}" >रु {{ $d->f_fee_first }}{{ $d->l_fee_first }}</a>

										@endif		
										</div>
									</div>
								</div>
							</div>
						</div>
@endforeach		
{{ $data->links() }}		
{{-- Lawyer listing ends --}}	
					</div>


					<div class="col-lg-4">
						<div class="row">
							<div class="col-lg-9 c-pt">
								<div class="faq">
									  <div class="small-title mb-30">
										<i class="fa fa-question-circle pull-left"></i>
										<h4 class="title">FAQ</h4>
									  </div>
									  <div class="panel-group accordion style2" id="accordion2">
									@foreach($faqs as $faq)      
						              <div class="panel">
						                <div class="panel-title"> <a data-parent="#accordion{{$faq->id}}" data-toggle="collapse" href="#accordiona{{$faq->id}}" aria-expanded="true"> <span class="open-sub"></span> <strong>{{ $faq->question }}</strong></a> </div>
						                <div id="accordiona{{$faq->id}}" class="panel-collapse collapse" role="tablist" aria-expanded="true">
						                  <div class="panel-content">
						                    <p>{{ $faq->answer }}</p>
						                  </div>
						                </div>
						              </div>
						        	@endforeach   
								  </div>
							 	 </div>
								 <div class="askques">
								 	<div class="bg-deep p-30 pt-20 pb-20">
              <h4 class="line-bottom text-theme-colored text-uppercase mt-0 mb-20">Make an Appointment</h4>

              <!-- Appointment Form -->

            {!! Form::open(['route'=>'SetAppointment', 'method'=>'post', 'id'=>'appointment_form', 'class'=>'form-transparent form-line','name'=>'popup_appointment_form', 'files'=>'true']) !!}
 			<input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}} @endif">


                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="form_name" name="user_name" class="form-control" style="color:grey; " type="text" required="" placeholder="Enter Name" aria-required="true" value="@if(Auth::check()){{Auth::user()->first_name}} @endif" @if(Auth::check()) readonly @endif>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="form_email" name="form_email" class="form-control required email" style="color:grey; " type="email" placeholder="Enter Email" aria-required="true" value="@if(Auth::check()){{Auth::user()->email}} @endif" @if(Auth::check()) readonly @endif>
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <input id="appontment_date" name="form_appontment_date" class="form-control required date" style="color:grey; "  type="text" placeholder="Appoinment Date" aria-required="true">
                    </div>
                  </div>
                  <div class="col-sm-12">
                    <div class="form-group mb-10">
                      <select class="form-control" name="type" id="type" required style="color:grey; ">
                        <option value="">Appointment Type</option>
                        <option value="phone">By Phone</option>
                        <option value="email">By Email</option>
                        <option value="skype">By Video Call</option>
                        <option value="meeting">By Meeting</option>
                    </select>
                    </div>
                  </div>
                </div>
                <div class="form-group mb-10">
                  <textarea id="form_message" name="form_message" class="form-control required" style="color:grey; " placeholder="Enter Message" rows="5" aria-required="true"></textarea>
                </div>
                <div class="form-group mb-0 mt-20">
                  <input name="form_botcheck" class="form-control" type="hidden" value="">
@if(Auth::check())      
            <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Submit</button>
@else
            <a href="{{ route('login') }}" class="btn btn-dark btn-theme-colored">Submit</a>
            <p class="mt-10"><span><span style="color:red">* </span>Please login first!</span></p>
@endif 
                </div>
            {!! Form::close() !!}

              <!-- Appointment Form Validation-->
              <script type="text/javascript">
                $("#appointment_form").validate();
                $(function () {
                   $('#appontment_date').datepicker();
                });
              </script>

            </div>
								 </div>
							</div>
							<div class="col-lg-3">
							</div>
						</div>
					</div>
					
				<!--</div>
			</div>-->
		</div>
	   </section>
	    <section class="search-alphabet">
	   		<div class="container">
				<a class="search-alpha" href="{{ route('findlawyers',['a']) }}">A</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['b']) }}">B</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['c']) }}">C</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['d']) }}">D</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['e']) }}">E</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['f']) }}">F</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['g']) }}">G</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['h']) }}">H</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['i']) }}">I</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['j']) }}">J</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['k']) }}">K</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['l']) }}">L</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['m']) }}">M</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['n']) }}">N</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['o']) }}">O</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['p']) }}">P</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['q']) }}">Q</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['r']) }}">R</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['s']) }}">S</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['t']) }}">T</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['u']) }}">U</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['v']) }}">V</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['w']) }}">W</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['x']) }}">X</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['y']) }}">Y</a><span class="search-exc"> |</span>
				<a class="search-alpha" href="{{ route('findlawyers',['z']) }}">Z</a>
			</div>
	   </section>
		
@stop

@push('js')
<script src="{{ URL::to('public/new/expert-ajax.js') }}"></script>
@endpush