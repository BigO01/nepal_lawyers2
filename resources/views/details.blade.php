
@extends('public.master')
@section('title', 'Detail')

@push('css')

    <script type="text/javascript" src="{{ URL::to('public/new/src/rating.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('public/new/src/rating.css') }}" type="text/css" media="screen" title="Rating CSS">
    <script type="text/javascript" src="{{ URL::to('public/new/min/rating.js') }}"></script>
    <link rel="stylesheet" href="{{ URL::to('public/new/min/rating.css') }}" type="text/css" media="screen" title="Rating CSS">
    <script type="text/javascript">

        $(function(){                   // Start when document ready
            $('#star-rating').rating(); // Call the rating plugin
        });



//  Example of using ajax

//        $('.container').rating(function(vote, event){
            // write your ajax code here
            // For example;
            // $.get(document.URL, {vote: vote});
//        });
    </script>
  <script type="text/javascript">

      $(function(){                   // Start when document ready
          $('.owl-carousel').owlCarousel({
              loop:true,
              margin:10,
              autoplay:true,
              nav:true,
              navText: [
                  '<i class="fa fa-angle-left"></i>',
                  '<i class="fa fa-angle-right"></i>'
              ],
              responsive:{
                  0:{
                      items:1
                  },
                  600:{
                      items:3
                  },
                  1000:{
                      items:5
                  }
              }
          })// Call the rating plugin
      });
  </script>
@endpush

@section('content')


    <!-- Section: inner-header -->
    <section class="img-fullwidth border-1px" style="background-image: url({{ URL::to('public/profileimages/'.$data->lBG)}}), url({{ URL::to('public/profileimages/'.$data->fBG)}}); background-size:cover; height: 265px">
      <div class="container">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="text-theme-colored font-36">Attorney Details</h3>
            </div>
          </div>
        </div>
      </div>      
    </section>
      
    <!-- Section: Practice Area -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-xs-8 pull-right pl-60">
              <div class="attorney-info">
                <button type="button" class="btn btn-info text-center pull-right  " data-toggle="modal" data-target=".bs-example-modal-lg">Claim my profile</button>

                <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      <!-- Modal Header -->
                      <div class="modal-header text-center">
                        <button type="button" class="close"
                                data-dismiss="modal">
                          <span aria-hidden="true">&times;</span>
                          <span class="sr-only">Close</span>

                        </button>
                        <h2 style="color:#885205 ;" class="modal-title" id="myModalLabel">
                          Claim my profile
                        </h2>
                        <p>Submit your details for claiming your profile </p>

                      </div>

                      <!-- Modal Body -->
                      <div class="modal-body p-70">

                        {!! Form::open(['route' => 'claim','name' => 'claim','class' => 'form-transparent form-line','id' => 'claim']) !!}
                          <input type="hidden" name="id_claim" value="{{ $data->id }}">
                        <!--<form role="form">-->
                          <div class="form-group">
                            <label for="name_claim">Name</label>
                            <input type="text" class="form-control required" name="name_claim" style="color: #626060;"   id="name_claim" placeholder="Enter name" aria-required="true" required />
                          </div>
                          <div class="form-group">
                            <label for="email_claim">Email address</label>
                            <input type="email" name="email_claim" class="form-control required email"   style="color: #626060;"  id="email_claim" placeholder="Enter email" aria-required="true" required />
                          </div>
                          <div class="form-group">
                            <label for="cell_claim">Cell number</label>
                            <input type="tel" class="form-control required  "
                                   style="color: #626060;" name="cell_claim" id="cell_claim" placeholder="Cell number" aria-required="true" required />
                          </div>

                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="checkbox" value="1" required /> <a style="color: #0a6485" href="www.google.com" >terms and conditions</a>
                            </label>
                          </div>
                          <div class="form-group">
                            <button type="submit" class="btn btn-success ">Submit</button>

                          </div>
                        {!! Form::close() !!}

                        <script type="text/javascript">
                            $("#claim").validate();
                        </script>

                      </div>

                      <!-- Modal Footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default"
                                data-dismiss="modal">
                          Close
                        </button>

                      </div>
                    </div>

                  </div>
                </div>

                 <h3 class="mt-0 mb-0">{{ $data->first_name }}{{ $data->last_name }}</h3>
                 <h4 class="mt-0 text-gray">{{ $data->role }}</h4>

              @if(!empty($data->law_firm_id))
                 <span><i class="fa fa-registered fa-2x"></i><h4 class="cil">
                 <b>Firm Name: </b> 
                  <span>
                @foreach ($lawfirm_names as $name)
                  @if($data->law_firm_id == $name->id)
                    <a href="{{$name->id}}"> {{ $name->first_name. $name->last_name }}</a>
                  @endif
                @endforeach   
                  </span>

                 </h4></span>
				      @endif

              </div>
              <div class="mt-30">
                <ul class="nav nav-tabs">
                  
          <li class="active"><a data-toggle="tab" href="#tab2" aria-expanded="false">Profile</a></li>
				  <!-- <li class=""><a data-toggle="tab" href="#tab3" aria-expanded="true">Experience</a></li> -->
				  <li class=""><a data-toggle="tab" href="#tab4" aria-expanded="false">Office Hours</a></li>
				  <li class=""><a data-toggle="tab" href="#tab5" aria-expanded="false">Consultation Fee</a></li>
          <li><a data-toggle="tab" href="#tab1" aria-expanded="false">Gallery</a></li>
@if($data->role == 'lawfirm')
          <li><a data-toggle="tab" href="#tab6" aria-expanded="false">Lawyer List</a></li>
@endif                
                </ul>
                <div class="tab-content">
				          <div id="tab1" class="tab-pane fade">
                    
                    <div class=" row grid-4 gutter-small clearfix" data-lightbox="gallery" >
                    @foreach($imgz as $img)
                      <!-- Portfolio Item Start -->
                      <div class="col-md-3"> 
                        <div class="portfolio-item pt-im ">
                          <a href="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" data-lightbox="gallery-item" title="Title Here 1">
                            <img  pt-im src="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" alt="">
                          </a>
                        </div>
                    </div>
                      <!-- Portfolio Item End -->
                   @endforeach    
                    </div>
                  </div>
                  <div id="tab2" class="tab-pane fade active in">
				  		      <p>{{ $data->l_description }}{{ $data->f_description }}</p>
                  </div>
<!--                   <div id="tab3" class="tab-pane fade">
                    <h5>Experience In:</h5>
                  	<ul class="list angle-double-right">
                      <li>Represented individuals and their S-Corporation with respect to accounting malpractice and overbilling claims against a top 5 accounting firm.</li>
                      <li>Represented an employment services and immigration company and its former officers and employees in civil actions alleging fraud and breach of contract.</li>
                      <li>Represented an employment services and immigration company in a civil forfeiture action resulting in the return of over $500,000 in funds seized by the government.</li>
                      <li>Represented an employment services and immigration company in a civil forfeiture action resulting in the return of over $500,000 in funds seized by the government.</li>
                      <li>Represented an employment services and immigration company in a civil forfeiture action resulting in the return of over $500,000 in funds seized by the government.</li>
                      <li>Represented a government contractor in a theft of trade secrets action.</li>
                    </ul>
					
                  </div> -->
                  
				    <div id="tab4" class="tab-pane fade">
              <ul class="list angle-double-right">
@foreach($dateTime as $time)
                      <li><i class="fa fa-clock-o fa-2x"></i> <span>{{ $time->day }} : {{ $time->time_from }} to {{ $time->time_to }}</span></li>
@endforeach
                    </ul>
            </div>
				  <div id="tab5" class="tab-pane fade">
                    <ul class="list angle-double-right">
                      <li><span class="time-txt">First Meet Fee</span> : {{ $data->l_fee_first }}{{ $data->f_fee_first }}</li>
                      <li><span class="time-txt">Hourly Fee</span> : {{ $data->l_fee_hourly}}{{ $data->f_fee_hourly }}</li>

<!-- For phone data -->
    <?php
      if( !empty($data->l_phone_price)):
        
        $lfee = explode(',', $data->l_phone_price);
        if( !empty($lfee[0]) ):
          echo  "<li><span class='time-txt'>Phone Regular Fee</span> :". $lfee[0] ."</li>";
        endif;
        if( !empty($lfee[1]) ):
          echo  "<li><span class='time-txt'>Phone Discount Fee</span> :". $lfee[1] ."</li>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_phone_price)):
        
        $ffee = explode(',', $data->f_phone_price);
        if( !empty($ffee[0]) ):
          echo  "<li><span class='time-txt'>Phone Regular Fee</span> :". $ffee[0] ."</li>";
        endif;
        if( !empty($ffee[1]) ):
          echo  "<li><span class='time-txt'>Phone Discount Fee</span> :". $ffee[1] ."</li>";
        endif;

      endif;  
    ?>
        
<!-- For personal data -->    
      <?php
      if( !empty($data->l_personal_price)):
        
        $lfee = explode(',', $data->l_personal_price);
        if( !empty($lfee[0]) ):
          echo  "<li><span class='time-txt'>Personal Regular Fee</span> :". $lfee[0] ."</li>";
        endif;
        if( !empty($lfee[1]) ):
          echo  "<li><span class='time-txt'>Personal Discount Fee</span> :". $lfee[1] ."</li>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_personal_price)):
        
        $ffee = explode(',', $data->f_personal_price);
        if( !empty($ffee[0]) ):
          echo  "<li><span class='time-txt'>Personal Regular Fee</span> :". $ffee[0] ."</li>";
        endif;
        if( !empty($ffee[1]) ):
          echo  "<li><span class='time-txt'>Personal Discount Fee</span> :". $ffee[1] ."</li>";
        endif;

      endif;  
    ?>

<!-- For skype data -->    
      <?php
      if( !empty($data->l_skype_price)):
        
        $lfee = explode(',', $data->l_skype_price);
        if( !empty($lfee[0]) ):
          echo  "<li><span class='time-txt'>Skype Regular Fee</span> :". $lfee[0] ."</li>";
        endif;
        if( !empty($lfee[1]) ):
          echo  "<li><span class='time-txt'>Skype Discount Fee</span> :". $lfee[1] ."</li>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_skype_price)):
        
        $ffee = explode(',', $data->f_skype_price);
        if( !empty($ffee[0]) ):
          echo  "<li><span class='time-txt'>Skype Regular Fee</span> :". $ffee[0] ."</li>";
        endif;
        if( !empty($ffee[1]) ):
          echo  "<li><span class='time-txt'>Skype Discount Fee</span> :". $ffee[1] ."</li>";
        endif;

      endif;  
    ?>    
  
<!-- For email data -->    
      <?php
      if( !empty($data->l_email_price)):
        
        $lfee = explode(',', $data->l_email_price);
        if( !empty($lfee[0]) ):
          echo  "<li><span class='time-txt'>Email Regular Fee</span> :". $lfee[0] ."</li>";
        endif;
        if( !empty($lfee[1]) ):
          echo  "<li><span class='time-txt'>Email Discount Fee</span> :". $lfee[1] ."</li>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_email_price)):
        
        $ffee = explode(',', $data->f_email_price);
        if( !empty($ffee[0]) ):
          echo  "<li><span class='time-txt'>Email Regular Fee</span> :". $ffee[0] ."</li>";
        endif;
        if( !empty($ffee[1]) ):
          echo  "<li><span class='time-txt'>Email Discount Fee</span> :". $ffee[1] ."</li>";
        endif;

      endif;  
    ?>  

                    </ul>
                  </div>
                 
                  <div id="tab6" class="tab-pane fade">
                        <div class="list-dashed">
                         @foreach($firm_lawyers as $lawyer)
                          <article class="post media-post clearfix pb-0 mb-10"> <a href="{{ $lawyer->id }}" class="post-thumb"><img alt="" src="{{ URL::to('public/profileimages/'.$lawyer->image_path) }}" class="img-responsive" width="75"></a>
                            <div class="post-right">
                              <h5 class="post-title mt-0"><a href="{{ $lawyer->id }}">{{ $lawyer->first_name }}{{ $lawyer->last_name }}</a></h5>
                              <p>{{ $lawyer->role }}</p>
                              <a href="{{ $lawyer->id }}" class="btn btn-info btn-sm">View Lawyer</a>
                            </div>
                          </article>
                          @endforeach  
                        </div>
                  </div>

                </div>
              </div>
              <div class="row multi-row-clearfix mt-30">
                <div class="col-md-6">
                	 <div class="askques">
								 	<div class="bg-deep p-30 pt-20 pb-20">
              							<h4 class="line-bottom text-theme-colored text-uppercase mt-0 mb-20">Make an Appointment</h4>

              <!-- Appointment Form -->
<script type="text/javascript">
  $(function () {
      $('#date').datepicker();
  });                    
</script>									 
                  {!! Form::open(['route'=>'SetAppointment', 'method'=>'post', 'id'=>'appointment_form','id'=>'popup_appointment_form' ,'class'=>'form-transparent form-line','name'=>'appointment_form', 'files'=>'true']) !!}
                    <input type="hidden" name="lawyer_id" value="{{ $data->id }}">
                    <input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}} @endif">
                                                            
										<div class="row">
										  <div class="col-sm-12">
											<div class="form-group mb-10">
											  <input name="user_name" class="form-control" type="text" required="" placeholder="Enter Name" style="color:grey;" aria-required="true" value="@if(Auth::check()){{Auth::user()->first_name}} @endif" @if(Auth::check()) readonly @endif>
											</div>
										  </div>
										  <div class="col-sm-12">
											<div class="form-group mb-10">
											  <input id="form_email" name="form_email" class="form-control required email" style="color:grey; " type="email" placeholder="Enter Email" aria-required="true" value="@if(Auth::check()){{Auth::user()->email}} @endif" @if(Auth::check()) readonly @endif>
											</div>
										  </div>
                      <div class="col-sm-12">
                      <div class="form-group mb-10">
                        <input id="date" name="form_appontment_date" class="form-control required date" style="color:grey; "  type="text" placeholder="Appoinment Date" aria-required="true">
                      </div>
                      </div>
                      <div class="col-sm-12">
                        <div class="form-group mb-10">
                          <select class="form-control" name="type" id="type" required style="color:grey; ">
                              <option value="">Appointment Type</option>
                               <!--  @if( is_string($data->l_phone_price) OR is_string($data->f_phone_price))
                              <option value="phone">
                                    By Phone
                              </option>
                                @endif
                                @if( is_string($data->l_email_price) OR is_string($data->f_email_price))
                              <option value="email">
                                    By Email
                              </option>
                                @endif
                                @if( is_string($data->l_skype_price) OR is_string($data->f_skype_price))
                              <option value="skype">
                                    By Video Call
                              </option>
                                @endif
                                @if( is_string($data->l_personal_price) OR is_string($data->f_personal_price))
                              <option value="meeting">
                                    By Meeting
                              </option>
                                @endif -->
                                <!-- For phone data -->
    <?php
      if( !empty($data->l_phone_price)):
        
        $lfee = explode(',', $data->l_phone_price);
        if( !empty($lfee[0]) OR !empty($lfee[1]) ):
          echo  "<option value='phone'>By Phone</option>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_phone_price)):
        
        $ffee = explode(',', $data->f_phone_price);
        if( !empty($ffee[0]) OR !empty($ffee[1]) ):
          echo  "<option value='phone'>By Phone </option>";
        endif;

      endif;  
    ?>
        
<!-- For personal data -->    
      <?php
      if( !empty($data->l_personal_price)):
        
        $lfee = explode(',', $data->l_personal_price);
        if( !empty($lfee[0]) OR !empty($lfee[1]) ):
          echo  "<option value='meeting'>By Meeting</option>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_personal_price)):
        
        $ffee = explode(',', $data->f_personal_price);
        if( !empty($ffee[0]) OR !empty($ffee[1]) ):
          echo  "<option value='meeting'>By Meeting</option>";
        endif;

      endif;  
    ?>

<!-- For skype data -->    
      <?php
      if( !empty($data->l_skype_price)):
        
        $lfee = explode(',', $data->l_skype_price);
        if( !empty($lfee[0]) OR !empty($lfee[1]) ):
          echo  "<option value='skype'>By Video Call</option>";
        endif;

      endif;  
    ?>
    <?php
      if( !empty($data->f_skype_price)):
        
        $ffee = explode(',', $data->f_skype_price);
        if( !empty($ffee[0]) OR !empty($ffee[1]) ):
          echo  "<option value='skype'>By Video Call</option>";
        endif;

      endif;  
    ?>    
  
<!-- For email data -->    
      <?php
      if( !empty($data->l_email_price)):
        
        $lfee = explode(',', $data->l_email_price);
        if( !empty($lfee[0]) OR !empty($lfee[1]) ):
          echo  "<option value='email'>By Email</option>";
        endif;
      endif;  
    ?>
    <?php
      if( !empty($data->f_email_price)):
        
        $ffee = explode(',', $data->f_email_price);
        if( !empty($ffee[0]) OR !empty($ffee[1]) ):
          echo  "<option value='email'>By Email</option>";
        endif;

      endif;  
    ?>  

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
						<script type="text/javascript">
                  $("#popup_appointment_form").validate();                  
                      </script>
              <!-- Appointment Form Validation-->
            						</div>
								 </div>
				</div>
                <div class="col-md-6">
                  <div class="small-title mb-30">
                    <i class="fa fa-question-circle pull-left"></i>
                    <h4 class="title">FAQ</h4>
                  </div>
                  <div class="panel-group accordion style2" id="accordion2">
                    <div class="panel">
                      <div class="panel-title"> <a href="#accordion21" data-toggle="collapse" data-parent="#accordion2" class="active"> <span class="open-sub"></span> Best Case Strategy </a> </div>
                      <div class="panel-collapse collapse in" id="accordion21">
                        <div class="panel-content">
                          <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-title"> <a href="#accordion22" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Review your Case Documents </a> </div>
                      <div class="panel-collapse collapse" id="accordion22">
                        <div class="panel-content">
                          <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-title"> <a href="#accordion23" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Fight for Justice </a> </div>
                      <div class="panel-collapse collapse" id="accordion23">
                        <div class="panel-content">
                          <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                        </div>
                      </div>
                    </div>
                  </div>      
                </div>
              </div>
            </div>
            <div class="col-sx-12 col-sm-4 col-md-4 col-xs-4 sidebar pull-left" style="padding-right: 0px !important;">
              <div class="attorney-thumb">
@if(!empty($data->l_premium) || !empty($data->f_premium))
                <div class="ribbon"><span>Premium</span></div>
@endif              
                <img src="{{ URL::to('public/profileimages/'.$data->image_path )}}" alt="Profile" class="img-fullwidth img-responsive">
                <button type="button" class="btn btn-info text-center mt-20" data-toggle="modal" data-target=".review">Rate and review your lawyer</button>
              </div>
              <div class="attorney-address mt-30">
                <ul>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-balance-scale"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Practices:</span>
                  			<?php 

                  				  $df = explode(',', $data->f_expertise_id);
                  				  $dl = explode(',', $data->l_expertise_id);
                  				  foreach ($df as $key) {
                  				  	foreach($expertises as $ex){
                  				  		if($key == $ex->id){
                  				  			echo "<br>". $ex->expertise_name;
                  				  		}
                  				  	}
                  				  }
                  				  foreach ($dl as $key) {
                  				  	foreach($expertises as $ex){
                  				  		if($key == $ex->id){
                  				  			echo "<br>".$ex->expertise_name;
                  				  		}
                  				  	}
                  				  }

                  			?>
                      
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-book"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Education:</span>
                    @foreach($edu as $e) 
                    	@if($data->id == $e->lawyer_id)   
                        	<br>{{ $e->education_name }}
                        @endif 
					          @endforeach
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Address:</span>
                        <br>{{ $data->region_name }}, 
                    @foreach($state as $s) 
                        @if($data->state_id == $s->id)   
                            {{ $s->state_name }}, 
                        @endif 
                    @endforeach
                    @foreach($city as $c) 
                        @if($data->city_id == $c->id)   
                            {{ $c->city_name }} 
                        @endif 
                    @endforeach
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Courts:</span>
        <?php 
          $cf = explode(',', $data->f_court);
          $cl = explode(',', $data->l_court);
          foreach ($cf as $key) {
            foreach($courts as $ex){
              if($key == $ex->id){
                echo "<br>". $ex->court_name;
              }
            }
          }
          foreach ($cl as $key) {
            foreach($courts as $ex){
              if($key == $ex->id){
                echo "<br>".$ex->court_name;
              }
            }
          }
        ?>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Bar:</span>
                    @foreach($bars as $b) 
                        @if($data->l_bar == $b->id)   
                            {{ $b->bar_name }}, 
                        @endif 
                    @endforeach
                    @foreach($bars as $b) 
                        @if($data->f_bar == $b->id)   
                            {{ $b->bar_name }} 
                        @endif 
                    @endforeach
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  

<!-- Rating model -->

  <!-- start raiting -->
  <section>


    <div class="modal fade review" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
      <div class="modal-dialog modal-lg">
        <div class="modal-content pl-15 pr-15" >
          <div class="text-center">
            <h4>Rate your lawyer and give a review according to your satisfaction.</h4>
          </div>
          <div class="row">
            <div class="col-lg-4 center ">
              <img src="{{ URL::to('public/profileimages/'.$data->image_path )}}"  style="height: 215px;width: 215px; margin: auto " class="img-responsive pr-10">
            </div>
            <div class="col-lg-8 ">

               {!! Form::open(['route'=>'rating', 'method'=>'post','class'=>'quick-contact-form','name'=>'quick_contact_form','id'=>'quick_contact_form1' ,'files'=>'true']) !!}
                <input type="hidden" name="lawyer_id" value="{{ $data->id }}">
                <input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}} @endif">

                <div class="form-group">
                  <div class="panel">
                    <div class="panel-content">


                      <h3 class="icon-box-title pt-15 mt-0 mb-10">{{$data->first_name}} {{$data->last_name}}</h3>
                      <div id="star-rating" >
                        <input type="radio" name="rate" class="rating" value="1" >
                        <input type="radio" name="rate" class="rating" value="2" >
                        <input type="radio" name="rate" class="rating" value="3" >
                        <input type="radio" name="rate" class="rating" value="4" >
                        <input type="radio" name="rate" class="rating" value="5" >
                      </div>
                      <?php echo $errors->first('rate', "<li style='color:red'>:message</li>") ?> 
                      <script>
                          function countChar11(val) {
                              var len = val.value.length;
                              if (len >= 1001) {
                                  val.value = val.value.substring(0, 1000);
                              } else {
                                  $('#charNum11').text(1000 - len);
                              }
                          };
                      </script>
                      <h5 class="widget-title">Write your review</h5>
                      <textarea style="overflow:hidden;" id="field" class="form-control" required placeholder="Write review here" name="comment" rows="3" col="10" onkeyup="countChar11(this)"></textarea>
                      <?php echo $errors->first('comment', "<li style='color:red'>:message</li>") ?> 

                      <div id="charNum11">1000</div>
                      <script type="text/javascript">
                          $("#quick_contact_form1").validate();
                      </script>
                    </div>
                  </div>
                </div>


                <div class="form-group">
            @if(Auth::check()) 
                  <button type="submit" class="btn btn-dark btn-theme-colored btn-sm mt-0" >Submit Review</button>
            @else
                  <a href="{{ route('login') }}" class="btn btn-dark btn-theme-colored btn-sm mt-0" >Submit Review</a>
                  <p class="mt-10"><span><span style="color:red">* </span>Please login first!</span></p>
            @endif   
                </div>
              {!! Form::close() !!}

            </div>

          </div>



        </div>

      </div>
    </div>


  </section>
  <!-- end raiting -->






<!-- Rating and comments of lawyers -->

  <section>
  <div class="container">
    <div class="section-title icon-bg text-center mb-60 ">
      <div class="row " >
        <div class="col-md-12">
          <h2 class="mt-0 page-title"><i class="fa fa-quote-left" aria-hidden="true"></i>
            Reviews by Clients</h2>
        </div>
      </div>
    </div>
  @if(!empty($rating[0]))
    @foreach($rating as $rat)
    <div class="row mb-20">
      <div class="col-xs-3" >
        <img src="{{ URL::to('public/profileimages'.'/'.$rat->image_path) }}"  style="height: 65px; width: 65px;" class="img-responsive pr-10 pull-right">
      </div>
      <div class="col-xs-9">
        <h4 class="icon-box-title mt-0">{{ $rat->first_name}} {{ $rat->last_name}}</h4>
       
                  @if($rat->rating_star > 0 )
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
                  @else
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
                  @endif
                  @if($rat->rating_star > 1.5) 
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
                  @else
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
                  @endif
                  @if($rat->rating_star > 2.5)
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
                  @else
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
                  @endif
                  @if($rat->rating_star > 3.5)
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
                  @else
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
                  @endif
                  @if($rat->rating_star > 4.5 )  
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star-color.png')}}">
                  @else
                    <img class="rs" src="{{ URL::to('public/new/images/rating-star.png')}}">
                  @endif

        <p class="mt-10">{{ $rat->comment }}</p>
      </div>
    </div>

    @endforeach
  @else
  <h3 class="text-center" style="color:blue;"> No Rated Yet</h3>
  @endif  


  </div>

  </section>


  <!-- end reviews -->




  <!--lawyers slider starts-->

<section class="pb-30 pt-70">
  <div class="section-title icon-bg text-center mb-60">
    <div class="row " >
      <div class="col-md-12">
        <h2 class="mt-0 page-title"><i class="fa fa-legal"></i>Similar lawyers</h2>
      </div>
    </div>
  </div>

  <div class="owl-carousel">
    @foreach($similer as $simi)
    <div class="item">
      <div class="content text-center">
        <a href="{{ url('detail').'/'.$simi->id}}">  
          <img class="img-fullwidth abc" src="{{ URL::to('public/profileimages/'.$simi->image_path )}}" alt="{{ URL::to('public/images/dummy.png')}}">
        </a> 
        <a href="{{ url('detail').'/'.$simi->id}}">
          <h4 class="author text-theme-colored">{{$simi->first_name}} {{ $simi->last_name }}</h4>
        </a>
        <h6 class="title text-dark"><b>Experince:</b> {{ $simi->fexperience }}{{ $simi->lexperience }} Years</h6>  
                  <h6 class="title text-dark">
                    <?php 
                      $df = explode(',', $simi->f_expertise_id);
                      $dl = explode(',', $simi->l_expertise_id);
                      $cou = 0;

                      foreach ($df as $key) {
                        $cou++;
                        if($cou < 5){    
                            foreach($expertises as $ex){
                              if($key == $ex->id){
                                echo $ex->expertise_name." / ";
                              }
                            }
                        }    
                      }
                      foreach ($dl as $key) {
                         $cou++;
                        if($cou < 5){ 
                            foreach($expertises as $ex){
                              if($key == $ex->id){
                                echo $ex->expertise_name." / ";
                              }
                            }
                        }    
                      }
                    ?>
                  </h6>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
      </div>
    </div>
    @endforeach

  </div>

    <div class="section-title icon-bg text-center mb-60 size">
      <div class="row">
        <div class="col-md-12">
          <a href="{{ url('/findlawyer') }}" class="btn btn-default btn-lg">View More</a>
        </div>
      </div>
    </div>

</section>


  <!--lawyers slider ends-->



@stop