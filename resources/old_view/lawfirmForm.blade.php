@extends('public.master')
@section('title','Law Firm Registration')


@push('css')


<link href="{{ URL::to('public/style.css') }}" rel="stylesheet" type="text/css">
     <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('public/vendor/bootstrap/css/bootstrap.min.css') }}">
        
    <link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/semantic.min.css') }}">
            <link rel="stylesheet" href="{{ URL::to('public/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/font-awesome/css/font-awesome.min.css') }}">

    
     <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/theme.css') }}">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-elements.css') }}">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-blog.css') }}">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-shop.css') }}">
 <!-- Theme Custom CSS -->
    
        <link rel="stylesheet" href="{{ URL::to('public/css/custom.css') }}">    
<!-- Skin CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/skins/skin-law-firm.css') }}"> 
        
    
    <!-- /********************/ for date picker jquery -->

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


@endpush

@push('js1')
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script type="text/javascript">
    $.noConflict();
    jQuery(document).ready(function ($) {
        $('#CollectedDate').datepicker();	$( function() {
		$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			
			yearRange: "-100:+0"
		});
	} );
    });
</script> 
   
<!-- /********************/  -->
        <!-- Head Libs -->
        <script type="text/javascript" src="{{ URL::to('public/js/jqueryform.js') }}"></script>
        <script src="{{ URL::to('public/vendor/modernizr/modernizr.min.js') }}"></script>


   
<!-- /********************/ foor gallery file upload  -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}
	<script src="{{ URL::to('public/js/gallery.js') }}"></script>
	

 <style>
input[type=number] {-moz-appearance: textfield;}

       input[type=file].v {
           color: transparent;
           display: block;

       }

        .imageThumb {
            max-height: 75px;
            border: 2px solid;
            padding: 1px;
            cursor: pointer;
        }
        .pip {
            display: inline-block;
            margin: 10px 10px 0 0;
        }
        .remove {
            display: block;
            background: #353C4E;
            border: 1px solid #353C4E;
            color: white;
            text-align: center;
            cursor: pointer;
        }
        .remove:hover {
            background: #c39341;
            color: #353C4E;
        }



/* When the pattern is matched */
input[type=tel]:valid {
    color: #555;
}

/* Unmatched */
input[type=tel]:invalid {
    color: red !important;
}    
  }
    </style>
@endpush

@section('content')

{{-- Main contant start --}}
   <div role="main" class="main">

                <section class="page-header">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Law Firm Form</h1>
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
            <!-- BEGIN MULTI-STEP FORM -->
            <div class="sections">
               {!! Form::open(['route'=>'lawfirm', 'enctype'=>'multipart/form-data']) !!}

                  <input type="hidden" name="id" value="{{ $input['id'] or old('id') }}">
                  <input type="hidden" name="register" value="{{ $input['register'] or old('register')  }}" >
                   
                  <!-- section one --> 
                   
                    <div class="section-holder">
                        
                         <h2 class="section-title center"></h2>
                        <div class="section current center" section="Firm's Information">
                        
                        <div class="row mb-md">
                          
                          	<div class="col-md-12">
                               	     <h4 class=" mb-none"> Law Firm Logo</h4>
                                </div>
                          
                         </div>
                         <div class="row">
        			<div class="form-group">
             			      <div class="col-md-2 col-md-offset-5">
              					<div class="main-img-preview">
                        <input type="hidden" name="img" value="{{ $input['img'] or old('img') }}" >
                					<img class="thumbnail img-preview" src="{{ $input['img'] or URL::to('/public/images/dummy.png') }}" alt="Preview" title="Preview">
                          <?php echo $errors->first('new_img', "<li style='color:red'>:message</li>") ?> 
              					</div>
            			      </div>
        			</div>
    			</div> 
    			<div class="row">
        		  <div class="form-group">
        			<div class="col-md-4 col-md-offset-4">
          			  <div class="input-group">
                			<input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" disabled="disabled">
                				<div class="input-group-btn">
                  					<div class="fileUpload btn btn-primary fake-shadow">
                    						<span><i class="glyphicon glyphicon-upload"></i> Upload Photo</span>
                    							<input id="logo-id" name="new_img" type="file" class="attachment_upload">
                  					</div>
         				       </div>
             			 </div>
              			</div>
              		</div>
              	     </div>
              	     <div class="row">
                        <div class="form-group">
                           <div class="col-md-12">
                               <input class="form-control input-lg" name="first_name" value="{{ $input['fname'] or old('first_name') }}" type="text" placeholder="Law Firm Name *" data="required" /> 
                               <?php echo $errors->first('first_name', "<li style='color:red'>:message</li>") ?> 
                           </div> 
				
                       </div>
                    </div>
                    <div class="row">
			<div class="form-group">
                         	<div class="col-md-12">                             
					<input class="form-control input-lg" name="license" value="{{ old('license') }}" type="text" placeholder="License #" data="required" />
          <?php echo $errors->first('license', "<li style='color:red'>:message</li>") ?>
				</div>
			</div>
			</div>
			<div class="row">
                           <div class="form-group">
                                 <div class="col-md-12"> 
                          		  <input id="datepicker" class="form-control input-lg" name="dor" value="{{ old('dor') }}" type="text"  placeholder="Date of Registration *" required />
                                <?php echo $errors->first('dor', "<li style='color:red'>:message</li>") ?> 
                                </div> 
                           </div>
                      </div>
                     
                    
               
  							
  							<div class="row">
                          <div class="form-group">
															<div class="col-md-12"> 
																<input class="form-control input-lg" name="address" type="text" value="{{ old('address') }}" placeholder="Address *" data="required" />
                                <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
															</div>
														</div>
													</div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-6">           
                                      <select class="form-control input-lg" name="state" onchange="cities(this);" data="required" >
                                        <option value="">Select Your State *</option>
                                      @foreach( $states as $state )
                                          <option {{ old('state') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                                      @endforeach 
                                        </select>
                                        <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
									                 </div>
									     
									<div class="col-md-6">             
										<select class="form-control input-lg" name="city" id="city" data="required" >
                      <option value="">Select Your City *</option>
                      </select>
                      <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
									</div>
							</div> 
						</div>
			<div class="row">
                        <div class="form-group">
                           	 
                            	<div class="col-md-12">
                            		<input class="form-control input-lg" name="officepn" value="{{ old('officepn') }}" type="tel" pattern='[\+]\d{13}' placeholder="Office Phone # +977 XXX XXXX XXX *" data="required" />
                                 <?php echo $errors->first('officepn', "<li style='color:red'>:message</li>") ?>
                            	</div>
                         </div> 
                   </div>			
                    <div class="row">
                      <div class="form-group">
                          <div class="col-md-12"> 
	                            <select class="ui fluid multiple selection dropdown" name="court[]"  id="court" required data="required" >
	                              <option value="">Select Courts *</option>
	                            @foreach( $courts as $court )     
                                <option value="{{ $court->id }}" >{{ $court->court_name }}</option>
                              @endforeach
                              </select>
<?php if( $errors->has('court.0') ) 
    { echo "<li style='color:red'>Please Fill This field!!!</li>"; } 
?>                               
	                         </div>
	                   </div>
	             </div>
	           
                    			
                      
			<div class="row">
                	     <div class="form-group">
                        	       <div class="col-md-12">
                           			<input class="form-control input-lg" name="website" value="{{ old('website') }}" type="url" placeholder="Website (Optional)"  	 /> 
					</div>
                            </div>
                        </div>
                  </div>
                        <!-- close section -->
                        <!--section one complete -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                                            <!-- Start section 2 -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="section" section="Professional Information">
                      
                        
                        	
				                  
                               <div class="row mb-md">
                                                            <div class="col-md-12">
                                <h4 class=" mb-none"> Expertise:</h4>

                                </div></div>
                                 <div class="row">
								<div class="form-group">
                                    <div class="col-md-12">
		              <input class="form-control input-lg" name="yoe" value="{{ old('yoe') }}" type="tel" placeholder="Year of Experience" pattern='\d{1,2}' required data="required" />
   <?php echo $errors->first('yoe', "<li style='color:red'>:message</li>") ?>                  
									</div>
								</div>
                            </div>  
                        <div class="row">
                                     <div class="col-md-12">      
 <div class="ui">                           
    <select  name="expertise[]" id="expertise"  class="ui fluid multiple selection dropdown" required data="required" >
      <option value="">Select Your Expertise</option>

@foreach( $expertises as $expertise )   
      <option value="{{ $expertise->id }}">{{ $expertise->expertise_name }}</option>
@endforeach

    </select>
<?php if( $errors->has('expertise.0') ) 
    { echo "<li style='color:red'>Please Fill This field!!!</li>"; } 
?>        
                            </div>  
                            </div>
                            </div>
			<br>
                        
                              <div class="row">
                          <div class="form-group">
                            <div class="col-md-12"> 
                            
	                                <select class="ui fluid multiple selection dropdown" name="language[]" id="language" required data="required">
	                                    <option value="">Select Languages</option>
	                                    @foreach( $languages as $language )     
                                        <option {{ old('language') == $language->id ? 'selected' : '' }} value="{{ $language->id }}" >{{ $language->lang_name }}</option>
                                      @endforeach
                                  </select>
<?php if( $errors->has('language.0') ) 
    { echo "<li style='color:red'>Please select languages.</li>"; } 
?>                                   
	                         </div>
	                   </div>
	             </div> 
                         
                       
							
                            <div class="row mb-md">
								
									<div class="col-md-12">
										<h3 class=" mb-none">Bar Association Member:</h3>
									</div>
								
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6 ">
									<div class="form-group">                        
										<input type="radio" name="bar" id="baryes" />
											<div class="btn-group">
												<label for="baryes" class="btn btn-lg btn-default">
													<span class="[ glyphicon glyphicon-ok ]"></span>
													<span> </span>
												</label>
												<label for="baryes" class="btn btn-lg btn-primary">
													Yes
												</label>
											</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<input type="radio" name="bar" value="0" id="barno" />
											<div class="btn-group">
												<label for="barno" class="btn btn-lg btn-default">
													<span class="[ glyphicon glyphicon-ok ]"></span>
														<span> </span>
												</label>
												<label for="barno" class="btn btn-lg btn-primary">
													No
												</label>
											</div>
									</div>
								</div>
<?php echo $errors->first('bar', "<li style='color:red'>:message</li>") ?>                
                <div class="col-md-12">
                    <select class="form-control input-lg" name="bar">
                    <option value="">Select Your Bar *</option>
                  @foreach( $bars as $bar )     
                      <option {{ old('bar') == $bar->id ? 'selected' : '' }} value="{{ $bar->id }}" >{{ $bar->bar_name }}</option>
                  @endforeach
                    </select>
                </div> 
							</div><br>
                            <div class="row mb-md">
                                
									<div class="col-md-12">
										<h3 class=" mb-none">Free Consultation:</h3>
									</div>
								
							</div>
							<div class="row">
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
                                        <input type="radio" name="free" value="1" id="freeyes"  />
											<div class="btn-group">
												<label for="freeyes" class="btn btn-lg btn-default">
													<span class="[ glyphicon glyphicon-ok ]"></span>
													<span> </span>
												</label>
												<label for="freeyes" class="btn btn-lg btn-primary">
													Yes
												</label>
											</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6">
									<div class="form-group">
										<input type="radio" name="free" id="freeno" value="0" />
											<div class="btn-group">
												<label for="freeno" class="btn btn-lg btn-default">
													<span class="[ glyphicon glyphicon-ok ]"></span>
													<span> </span>
												</label>
												<label for="freeno" class="btn btn-lg btn-primary">
													No
												</label>
											</div>
									</div>
								</div>
							</div><br>                        
				
    
<div class="row center mb-md">
                               
									<div class="col-md-12">
										<h4 class=" mb-none"> Certifications</h4>
									</div>
								
							</div>
                            <div class="row mb-lg">
								<div class="col-md-4 col-md-offset-4">
									<input type="file" accept=".pdf,.doc" class="form-control attachment_upload" id="images2" name="files[]" onchange="preview_images2();" multiple/>
<?php if( $errors->has('files.0') ) 
    { echo "<li style='color:red'>Please give files types of <b>.pdf</b> or <b>.doc</b>.</li>"; } 
?>                  
								</div>
							</div>
							<div class="row mb-lg" id="image_preview2">
							</div>
                          
                   
                        <div class="row center mb-md">
                        
							<div class="col-md-12">
							    <h4 class=" mb-none"> Photo Gallery</h4>

                            </div>
						
					</div>
					
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<input class="v form-control row "  type="file" accept="image/*"  id="files" name="photos[]"  multiple />
            <?php if( $errors->has('photos.0') ) 
    { echo "<li style='color:red'>Photos must be type of <b>jpeg,jpg,png</b> with in <b>5mb</b> size. </li>"; } 
?> 
					</div><br><br>
				</div>
                        
                        
                        
                            
                           
                            
                          
        
                        
                            
                           
                            
                          
        
        
                        </div>
                        <!-- close section -->
                        
                        
                                            <!-- Start section 3 -->
                
                        
                        <div class="section" section="Avaliability">
                          <div class="row mb-md">
							
								<div class="col-md-12">
									<h4 class=" mb-none"> Available Day and Time (Click + to Add more than One)</h4>
								</div>
							
						</div>
												  
												<div class="row">
							<div class="form-group">
								<div class="RegSpLeft2" id="daytime">
										<div class="col-md-4 mb-md">
											<select class="form-control input-lg" name="day[]" data="required" required>
<option value="">Select Day*</option>
 <option value="Sunday">Sunday</option>
  <option value="Monday">Monday</option>
  <option value="Tuesday">Tuesday</option>
  <option value="Wednesday">Wednesday</option>
  <option value="Thursday">Thursday</option>
  <option value="Friday">Friday</option>
  <option value="Saturday">Saturday</option>
  </select>
<?php if( $errors->has('day.0') ) 
    { echo "<li style='color:red'>Please select a day!!! </li>"; } 
?>   
										</div>
										<div class="col-md-3 mb-md">
											<div class="input-group">
   <select class="from form-control input-lg" name="timef[]" data="required" required >
   <option value="">From*</option>
  <option value="01:00 AM">01:00 AM</option>
  <option value="02:00 AM">02:00 AM</option>
  <option value="03:00 AM">03:00 AM</option>
  <option value="04:00 AM">04:00 AM</option>
  <option value="05:00 AM">05:00 AM</option>
  <option value="06:00 AM">06:00 AM</option>
  <option value="07:00 AM">07:00 AM</option>
  <option value="08:00 AM">08:00 AM</option>
  <option value="09:00 AM">09:00 AM</option>
  <option value="10:00 AM">10:00 AM</option>
  <option value="11:00 AM">11:00 AM</option>
  <option value="12:00 AM">12:00 AM</option>
  <option value="01:00 PM">01:00 PM</option>
  <option value="02:00 PM">02:00 PM</option>
  <option value="03:00 PM">03:00 PM</option>
  <option value="04:00 PM">04:00 PM</option>
  <option value="05:00 PM">05:00 PM</option>
  <option value="06:00 PM">06:00 PM</option>
  <option value="07:00 PM">07:00 PM</option>
  <option value="08:00 PM">08:00 PM</option>
  <option value="09:00 PM">09:00 PM</option>
  <option value="10:00 PM">10:00 PM</option>
  <option value="11:00 PM">11:00 PM</option>
  <option value="12:00 PM">12:00 PM</option>
</select>

    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>

<?php if( $errors->has('timef.0') ) 
    { echo "<li style='color:red'>Please select a Time From!!! </li>"; } 
?> 
										</div>
                                        <div class="col-md-3 mb-md">
                      <div class="input-group">

<select class="to form-control input-lg" name="timet[]" data="required" required >
<option value="">To*</option>
    <option value="01:00 AM">01:00 AM</option>
  <option value="02:00 AM">02:00 AM</option>
  <option value="03:00 AM">03:00 AM</option>
  <option value="04:00 AM">04:00 AM</option>
  <option value="05:00 AM">05:00 AM</option>
  <option value="06:00 AM">06:00 AM</option>
  <option value="07:00 AM">07:00 AM</option>
  <option value="08:00 AM">08:00 AM</option>
  <option value="09:00 AM">09:00 AM</option>
  <option value="10:00 AM">10:00 AM</option>
  <option value="11:00 AM">11:00 AM</option>
  <option value="12:00 AM">12:00 AM</option>
    <option value="01:00 PM">01:00 PM</option>
  <option value="02:00 PM">02:00 PM</option>
  <option value="03:00 PM">03:00 PM</option>
  <option value="04:00 PM">04:00 PM</option>
  <option value="05:00 PM">05:00 PM</option>
  <option value="06:00 PM">06:00 PM</option>
  <option value="07:00 PM">07:00 PM</option>
  <option value="08:00 PM">08:00 PM</option>
  <option value="09:00 PM">09:00 PM</option>
  <option value="10:00 PM">10:00 PM</option>
  <option value="11:00 PM">11:00 PM</option>
  <option value="12:00 PM">12:00 PM</option>
</select>
    <span class="input-group-addon">
        <span class="glyphicon glyphicon-time"></span>
    </span>
</div>
<?php if( $errors->has('timet.0') ) 
    { echo "<li style='color:red'>Please select a Time To!!! </li>"; } 
?>
                    </div>
									</div>
								<div class="RegSpRight2">
									<div class="col-md-1">
										<a href="#"  class="pl2 btn btn-primary btn-lg"><i class="fa fa-plus"></i></a>
									</div>
									<div class="col-md-1">
										<a href="#" class="mi2 btn btn-primary btn-lg"><i class="fa fa-minus"></i>
										</a>
									</div>
								</div>
							</div>
						</div>

												
							
							<div class="row mb-md">
								
									<div class="col-md-12">
										<h4 class=" mb-none"> Service Mode</h4>

									</div>
								
							</div>
							<div class="row">
								<div class="form-group">
									<div class="col-md-12">             
										<div class="ui">                           
											<select  name="service[]" id="service" class="mb-xl ui fluid multiple selection dropdown" required data="required">
                        <option value="">Select Service Mode</option>
                        <option {{ old('service') == 'Phone' ? 'selected' : '' }} value="Phone">By Phone</option>
                        <option {{ old('service') == 'Video' ? 'selected' : '' }} value="Video">By Video</option>
                        <option {{ old('service') == 'Email' ? 'selected' : '' }} value="Email">By Email</option>
                        <option {{ old('service') == 'Person' ? 'selected' : '' }} value="Person">In Person</option>
                        <option {{ old('service') == 'Any' ? 'selected' : '' }} value="Any">Any</option>      
                      </select>
<?php if( $errors->has('service.0') ) 
    { echo "<li style='color:red'>Please select your service modes!!! </li>"; } 
?>                       
										</div>
								    </div>
							   </div>
						   </div>
						   <div class="row">
                        <div class="form-group">
                           <div class="col-md-12">
                               <input class="form-control input-lg" name="skype" value="{{ old('skype') }}" type="text" placeholder="If Video Please provide your Skype ID *"  /> 
                           </div> 
				
                       </div>
                    </div>
						<div class="row mb-md">
							<div class="col-md-12">
								<h4 class="mb-none">Fee (in Nepali Rupees)</h4>													
															
							</div>
						</div>
						<div class="row">
							<div class="form-group">
								<div class="col-md-6">
									<input class="form-control input-lg" name="firstfee" value="{{ old('firstfee') }}" type="tel" pattern='\d{1,8}'placeholder="First Time (Rs)" data="required" required />
                   <?php echo $errors->first('firstfee', "<li style='color:red'>:message</li>") ?>
								</div>
								<div class="col-md-6">
									<input class="form-control input-lg" name="hourfee" value="{{ old('hourfee') }}" type="tel" pattern='\d{1,8}'placeholder="Hourly Rate (Rs)" data="required" required />
                   <?php echo $errors->first('hourfee', "<li style='color:red'>:message</li>") ?>
								</div>
							</div>
						</div>
						<div class="row mb-md">
							
								<div class="col-md-12">
									<h4 class=" mb-none"> Payment Methods</h4>

								</div>
							
						</div>
						<div class="row">
							<div class="col-md-12">      
								<div class="ui">                           
									<select  name="payment[]" id="payment" class="mb-xl ui fluid multiple selection dropdown" data="required" required >
                    <option value="">Select Payment Option</option>
                    <option {{ old('payment') == 'Credit_card' ? 'selected' : '' }} value="Credit_card">Credit card</option>
                    <option {{ old('payment') == 'Check' ? 'selected' : '' }} value="Check">Check</option>
                    <option {{ old('payment') == 'Cash' ? 'selected' : '' }} value="Cash">Cash</option>
                    <option {{ old('payment') == 'Money_Order' ? 'selected' : '' }} value="Money_Order">Money Order</option>
                    <option {{ old('payment') == 'Cashier_Check' ? 'selected' : '' }} value="Cashier_Check">Cashier Check</option>
                    <option {{ old('payment') == 'Traveler_Check' ? 'selected' : '' }} value="Traveler_Check">Traveler Check</option>
                    <option {{ old('payment') == 'Wire_Transfer' ? 'selected' : '' }} value="Wire_Transfer">Wire Transfer</option>
                  </select>
<?php if( $errors->has('payment.0') ) 
    { echo "<li style='color:red'>Please select your Payment Methods!!! </li>"; } 
?>                   	
								</div>  
							</div>
						</div>
						</div>
						<!-- close section -->


                       <!-- <div class="section final" section="Summary">
                        </div> close section -->
                        
                   <div class="clear"></div>
                </div>
                <!-- BEGIN NAVIGATION -->
                <div class="section-holder">
                <div class="back btn btn-lg btn-primary">Back</div>
		<div class="next btn btn-lg btn-primary">Next</div>
                  <!--   <div class="back">Back</div>
                    <div class="next">Next</div> -->
                    <div class="clear"></div>
                </div>
                <!-- END NAVIGATION -->
                    
      
            <!-- BEGIN PROGRESS BAR -->
           
            <!-- END PROGRESS BAR -->
        <!-- END MULTI-STEP FORM -->
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
 </div>     
{{-- Main contant ends --}}

@stop
            
@push('js')
<script src="{{ URL::to('public/vendor/jquery/jquery.min.js') }}"></script>	
		<script type="text/javascript">
							$(function() {
								$('a.pl2').click(function(e) {
									e.preventDefault();
									$('#daytime').append('   <div class="col-md-4 mb-md">                      <select class="form-control input-lg" name="day[]" data="required"><option value="">Select Day*</option> <option value="Sunday">Sunday</option>  <option value="Monday">Monday</option>  <option value="Tuesday">Tuesday</option>  <option value="Wednesday">Wednesday</option>  <option value="Thursday">Thursday</option>  <option value="Friday">Friday</option>  <option value="Saturday">Saturday</option>  </select>                    </div>                    <div class="col-md-3 mb-md">                      <div class="input-group">   <select class="from form-control input-lg" name="timef[]" data="required">   <option value="">From*</option>  <option value="01:00 AM">01:00 AM</option>  <option value="02:00 AM">02:00 AM</option>  <option value="03:00 AM">03:00 AM</option>  <option value="04:00 AM">04:00 AM</option>  <option value="05:00 AM">05:00 AM</option>  <option value="06:00 AM">06:00 AM</option>  <option value="07:00 AM">07:00 AM</option>  <option value="08:00 AM">08:00 AM</option>  <option value="09:00 AM">09:00 AM</option>  <option value="10:00 AM">10:00 AM</option>  <option value="11:00 AM">11:00 AM</option>  <option value="12:00 AM">12:00 AM</option>  <option value="01:00 PM">01:00 PM</option>  <option value="02:00 PM">02:00 PM</option>  <option value="03:00 PM">03:00 PM</option>  <option value="04:00 PM">04:00 PM</option>  <option value="05:00 PM">05:00 PM</option>  <option value="06:00 PM">06:00 PM</option>  <option value="07:00 PM">07:00 PM</option>  <option value="08:00 PM">08:00 PM</option>  <option value="09:00 PM">09:00 PM</option>  <option value="10:00 PM">10:00 PM</option>  <option value="11:00 PM">11:00 PM</option>  <option value="12:00 PM">12:00 PM</option></select>    <span class="input-group-addon">        <span class="glyphicon glyphicon-time"></span>    </span></div>                    </div>                                        <div class="col-md-3 mb-md">                      <div class="input-group"><select class="to form-control input-lg" name="timet[]" data="required"><option value="">To*</option>    <option value="01:00 AM">01:00 AM</option>  <option value="02:00 AM">02:00 AM</option>  <option value="03:00 AM">03:00 AM</option>  <option value="04:00 AM">04:00 AM</option>  <option value="05:00 AM">05:00 AM</option>  <option value="06:00 AM">06:00 AM</option>  <option value="07:00 AM">07:00 AM</option>  <option value="08:00 AM">08:00 AM</option>  <option value="09:00 AM">09:00 AM</option>  <option value="10:00 AM">10:00 AM</option>  <option value="11:00 AM">11:00 AM</option>  <option value="12:00 AM">12:00 AM</option>    <option value="01:00 PM">01:00 PM</option>  <option value="02:00 PM">02:00 PM</option>  <option value="03:00 PM">03:00 PM</option>  <option value="04:00 PM">04:00 PM</option>  <option value="05:00 PM">05:00 PM</option>  <option value="06:00 PM">06:00 PM</option>  <option value="07:00 PM">07:00 PM</option>  <option value="08:00 PM">08:00 PM</option>  <option value="09:00 PM">09:00 PM</option>  <option value="10:00 PM">10:00 PM</option>  <option value="11:00 PM">11:00 PM</option>  <option value="12:00 PM">12:00 PM</option></select>    <span class="input-group-addon">        <span class="glyphicon glyphicon-time"></span>    </span></div>                    </div>');   });
								$('a.mi2').click(function (e) {
									e.preventDefault();
									if ($('#daytime select').length > 3) {
										$('#daytime').children().last().remove();
										$('#daytime').children().last().remove();
                    $('#daytime').children().last().remove();
									}
								});
							});
							</script>
<script type="text/javascript" src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
   

     <script  src="{{ URL::to('public/jquery.js') }}" type="text/javascript"></script>
    <script  src="{{ URL::to('public/multistep.js') }}" type="text/javascript"></script>
    <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>-->
    
    <script src="{{ URL::to('public/js/semantic.min.js') }}"></script>
<script src="{{ URL::to('public/placeholders.min.js') }}"></script>
     <script >
     
	$(function(){
		multi_step_form({
			container: '.sections',
			section: '.section'
		}); 
	});
</script> 


  <script>
    $('#language').dropdown();
    </script>
  
  <script>
    $('#court').dropdown();
    </script>
  <script>
    $('#expertise').dropdown();
    </script>
    <script>
    $('#payment').dropdown();
    </script>
	<script>
    $('#service').dropdown();
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
    var brand = document.getElementById('logo-id');
    brand.className = 'attachment_upload';
    brand.onchange = function() {
        document.getElementById('fakeUploadLogo').value = this.value.substring(12);
    };

    // Source: http://stackoverflow.com/a/4459419/6396981
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#logo-id").change(function() {
        readURL(this);
    });
});

    </script>


<script>
function preview_images() 
{
 var total_file=document.getElementById("images").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview').append("<div class='col-md-2'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>
<script>
function preview_images2() 
{
 var total_file=document.getElementById("images2").files.length;
 for(var i=0;i<total_file;i++)
 {
  $('#image_preview2').append("<div class='col-md-2'><img class='img-responsive' src='"+URL.createObjectURL(event.target.files[i])+"'></div>");
 }
}
</script>  
<script src="{{ URL::to('public/js/ajax.js') }}" ></script>  
@endpush
