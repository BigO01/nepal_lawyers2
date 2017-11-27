@extends('public.master')
@section('title','Lawyer Registration')


@push('css')
      <!-- Head Libs -->



    <link href="{{ URL::to('/public/style.css') }}" rel="stylesheet" type="text/css">
         <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/public/css/semantic.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/bootstrap/css/bootstrap.min.css') }}">
        
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/public/css/semantic.min.css') }}">
            <link rel="stylesheet" href="{{ URL::to('/public/vendor/bootstrap/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/font-awesome/css/font-awesome.min.css') }}">

     <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme.css') }}">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-elements.css') }}">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-blog.css') }}">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-shop.css') }}">
 <!-- Theme Custom CSS -->
    
        <link rel="stylesheet" href="{{ URL::to('/public/css/custom.css') }}">    
<!-- Skin CSS -->
        <link rel="stylesheet" href="{{ URL::to('/public/css/skins/skin-law-firm.css') }}"> 
        
    
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
        <script type="text/javascript" src="{{ URL::to('/public/js/jqueryform.js') }}"></script>
        <script src="{{ URL::to('/public/vendor/modernizr/modernizr.min.js') }}"></script>


   
<!-- /********************/ foor gallery file upload  -->
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}

	<script src="{{ URL::to('/public/js/gallery.js') }}"></script>

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
                                <h1>Edit your profile</h1>
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
                 {!! Form::open(['route'=>'update_lawyer', 'enctype'=>'multipart/form-data']) !!}

                   <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                   <input type="hidden" name="ref_id" value="{{ $lawyer->id }}">
                    <input type="hidden" name="register" value="{{ Auth::user()->role  }}" >
                    <input type="hidden" name="gender" value="1">
                    <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                  <!-- section one --> 
                   
                    <div class="section-holder">
                        
                         <h2 class="section-title center"></h2>
                        <div class="section current center" section="Personal Information">
                        
                        <div class="row mb-md">
                          
                          	<div class="col-md-12">
                               	     <h4 class=" mb-none"> Profile Picture</h4>

                                </div>
                          
                         </div>
                         <div class="row">
        			<div class="form-group">
             			    <div class="col-md-2 col-md-offset-5">
              					<div class="main-img-preview">

                          <input type="hidden" name="img" value="{{ Auth::user()->image_path }}" >

                					<img class="thumbnail img-preview" src="{{ URL::to('public/profileimages/'.Auth::user()->image_path) }}" alt="Preview" title="Preview">
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
                               <input class="form-control input-lg" name="first_name" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" type="text" placeholder="Full Name *" data="required" /> 
                               <?php echo $errors->first('first_name', "<li style='color:red'>:message</li>") ?> 
                           </div> 
				
                       </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                           <div class="col-md-4">
         
                           	 <input class="form-control input-lg"  name="mobile" value="{{ Auth::user()->contact }}" type="tel" pattern='[\+]\d{11}' title="must be plus number with 11 digits"  placeholder="Mobile # +977 X XXXX XXX *" required data="required" />
                              <?php echo $errors->first('mobile', "<li style='color:red'>:message</li>") ?>
                           </div>
                           
                           	 <div class="col-md-4">
                            		<input class="form-control input-lg" name="homepn" type="tel" pattern='[\+]\d{13}' placeholder="Home Phone # +977 XXX XXXX XXX (Optional)" value="{{ Auth::user()->office_contact }}" /> 
                            	</div>
                            	<div class="col-md-4">
                            		<input class="form-control input-lg" name="officepn" type="tel" pattern='[\+]\d{13}' placeholder="Office Phone # +977 XXX XXXX XXX (Optional)" value="{{ Auth::user()->home_contact }}" /> 
                            	</div>
                         </div> 
                   </div> 
                    
    <div class="row">

    	<div class="form-group">
          @foreach( $lawyer_edu as $edu )              
                <div class="RegSpLeft" id="education">
                    
                    <div class="col-md-8 mb-md">
                        <input type="hidden" name="edu_id[]" value="{{ $edu->id }}">
                        <input class="form-control input-lg" name="education[]" value="{{ $edu->education_name }}" type="text" placeholder="Education * (Click + to Add more than One)" data="required" />

<?php if( $errors->has('education.0') ) 
    { echo "<li style='color:red'>Please Fill This field!!!</li>"; } 
?> 
                    </div>
                </div>
          @endforeach
                <div class="RegSpRight">
                  <div class="col-md-2">
                    <a href="#"  class="pl btn btn-primary btn-lg"><i class="fa fa-plus"></i></a>
                  </div>
                  <div class="col-md-2">
                    <a href="#" class="btn btn-primary btn-lg mi"><i class="fa fa-minus"></i></a>
                  </div>
                </div>
             </div>

    </div>
  							
  							<div class="row">
                                                        <div class="form-group">
															<div class="col-md-12"> 
																<input class="form-control input-lg" name="address" type="text" value="{{ Auth::user()->address }}" placeholder="Address *" data="required" />
                                <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
															</div>
														</div>
													</div>
                            <div class="row">
                                <div class="form-group">

                                    <div class="col-md-4">
                                      <select class="form-control input-lg" name="region" id="region" onchange="sta(this);" required>
                                          <option value="">Select Your Region</option>
                                        @foreach( $regions as $region )
                                          <option {{ Auth::user()->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->region_name }}</option>
                                        @endforeach 
                                      </select>
                                      <?php echo $errors->first('region', "<li style='color:red'>:message</li>") ?>
                                    </div>

                                    <div class="col-md-4">
                                      <select class="form-control input-lg" name="state" id="state" onchange="cities(this);" required>
                                        <option value="{{ $state->id }}">{{ $state->state_name }}</option>
                                          </select>
                                        <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
                                    </div>
            
                                    <div class="col-md-4">
                                      <select class="form-control input-lg" name="city" id="city" required>
                                        <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                      </select>
                                    <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
                                  </div>

                  							</div> 
                  						</div>
                    <!-- <div class="row">
                          <div class="form-group">
                                  <div class="col-md-12"> 
                            
	                                <select class="form-control input-lg" name="gender" data="required">
	                                    <option value="">Select a Gender *</option>
	                                    <option value="1">Male</option>
	                                    <option value="0">Female</option>
	                                </select>
                                  <?php echo $errors->first('gender', "<li style='color:red'>:message</li>") ?>
	                           </div>
	                   </div>
	             </div> -->
	             <div class="row">
                          <div class="form-group">
                                  <div class="col-md-12"> 
                            
	                                <select class="form-control input-lg" name="status"  data="required">
	                                    <option value="">Marital Status*</option>
	                                    <option {{ $lawyer->marital_status == 'unmarried' ? 'selected' : '' }} value="3">Single</option>
	                                    <option {{ $lawyer->marital_status == 'married' ? 'selected' : '' }} value="2">Married</option>
	                                    <option {{ $lawyer->marital_status == 'divorce' ? 'selected' : '' }} value="1">Divorced</option>
	                                </select>
                                  <?php echo $errors->first('status', "<li style='color:red'>:message</li>") ?>
	                           </div>
	                   </div>
	             </div>
                    
                      <div class="row">
                           <div class="form-group">
                                 <div class="col-md-12"> 
                          		    <input id="datepicker" class="form-control input-lg" name="dob" value="{{ $lawyer->dob }}" type="text"  placeholder="Date of Birth *"/>
                                <?php echo $errors->first('dob', "<li style='color:red'>:message</li>") ?>  
                                </div> 
                           </div>
                      </div>

			                 <div class="row">
                	     <div class="form-group">
                        	   <div class="col-md-12">
                           			<input class="form-control input-lg" name="website" value="{{ $lawyer->web_url }}" type="text" placeholder="Website (Optional)"  	 /> 
					                   </div>
                            </div>
                        </div>
                  </div>
                        <!-- close section -->
                        <!--section one complete -->
                        
                        
                        
                        
            
                        
                                            <!-- Start section 2 -->
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        
                        <div class="section" section="Professional Information">
                        
                        
                        	<div class="row">
								<div class="form-group">
                    <div class="col-md-12">                             
										<input class="form-control input-lg" name="license" type="text" value="{{ $lawyer->license_number }}" placeholder="License #" data="required" />
                    <?php echo $errors->first('license', "<li style='color:red'>:message</li>") ?>
                  </div>
								</div>
							</div>
							<div class="row">
								<div class="form-group">
                                    <div class="col-md-12">
		<input class="form-control input-lg" name="yoe" type="tel" placeholder="Year of Experience" value="{{ $lawyer->experience }}" pattern='\d{1,2}' data="required"/>
    <?php echo $errors->first('yoe', "<li style='color:red'>:message</li>") ?>
                  </div>
								</div>
                            </div>                  
                               <div class="row mb-md">
                                                            <div class="col-md-12">
                                <h4 class=" mb-none"> Expertise:</h4>

                                </div></div>
                        <div class="row">
                                     <div class="col-md-12">      
 <div class="ui">                           
<select  name="expertise[]" value="{{ old('expertise[]') }}" id="expertise"  class="ui fluid multiple selection dropdown">
  <option value="">Select Your Expertise</option>

@foreach($expertise as $ex)
  <option 

<?php
      $dl = explode(',', $lawyer->expertise); 

          foreach ($dl as $key) {
              if($key == $ex->id){
                echo "selected";
              }
            }
          
 ?>

  value="{{$ex->id}}">{{$ex->expertise_name}}</option>
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
                                    <div class="ui">
  										                <select class="ui fluid multiple selection dropdown" name="court[]" id="court" >
                                        <option value="">Select Courts *
                                        </option>

@foreach($courts as $court)
  <option 

<?php
      $dl = explode(',', $lawyer->court_name); 

          foreach ($dl as $key) {
              if($key == $court->id){
                echo "selected";
              }
            }
          
 ?>

  value="{{$court->id}}">{{$court->court_name}}</option>
@endforeach



                                
                                      </select>
<?php if( $errors->has('court.0') ) 
    { echo "<li style='color:red'>Please Fill This field!!!</li>"; } 
?>                                       
                                    </div>    
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                    <input class="form-control input-lg" name="areaOfPractice" value="{{ $lawyer->area_of_practice }}" type="text" placeholder="Area of Practice" data="required" />
                   <?php echo $errors->first('areaOfPractice', "<li style='color:red'>:message</li>") ?>
                  </div>
								</div>
                            </div>
                            <div class="row mb-md">
								<div class="col-md-12">
									 <h4  class="mb-none">Law Firm Information <span style=" font-size: 1em;">(Optional)</span> </h4>
                                </div>
                            </div>
                            <div class="row mt-xl">
                                <div class="form-group">
									<div class="col-md-12">
									<select class="form-control input-lg" name="firmname">
                    <option value="">Select Your Firm *</option>


                  @foreach( $lawfirms_id as $fid )     
                      @foreach( $lawfirms_name as $fname )
                          @if( $fname->id == $fid->ref_id )
                    <option {{ $lawyer->law_firm_id == $fid->id ? 'selected' : '' }}
                     value="{{ $fid->id }}" >

                             {{ $fname->first_name }} {{ $fname->last_name }}
                    </option>
                          @endif 
                  @endforeach
                  @endforeach

                    </select>
									</div>
								</div>
                            </div>
							<div class="row center mb-md">
                               
									<div class="col-md-12">
										<h4 class=" mb-none">Add New Certifications</h4>
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
													<span class="[ glyphicon glyphicon-ok ]">   
                          </span>
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
													<span class="[ glyphicon glyphicon-ok ]">
                          </span>
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
                    <option {{ $lawyer->bar_id == $bar->id ? 'selected' : '' }} value="{{ $bar->id }}" >{{ $bar->bar_name }}</option>
                @endforeach
                    </select>
                </div>  
							</div><br>
              <div class="row mb-md">
                                
									<div class="col-md-12">
										<h3 class=" mb-none">Free Consultation:</h3>
                    <?php echo $errors->first('free', "<li style='color:red'>:message</li>") ?> 
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
					<div class="row mb-md">
                      
							<div class="col-md-12">
                <h3 class=" mb-none">Select Your Language:</h3>
							</div>
						
					</div>
					<div class="row">
            <div class="col-md-12" >
              
              <div class="form-group">
                <div class="col-md-12"> 
                  <select class="ui fluid multiple selection dropdown" name="language[]" id="language" >
                    <option value="">Select Languages</option>
@foreach($languages as $l)
  <option 

<?php
      $lan = explode(',', $lawyer->languages); 

          foreach ($lan as $key) {
              if($key == $l->id){
                echo "selected";
              }
            }
          
 ?>

  value="{{$l->id}}">{{$l->lang_name}}</option>
@endforeach



                    </select>
<?php if( $errors->has('language.0') ) 
    { echo "<li style='color:red'>Please select languages.</li>"; } 
?>                     
                </div>
              </div>

            </div>


					</div><br>
    

                          
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
@foreach($day_time as $td)								
              <div class="form-group">
                <div class="RegSpLeft2" id="daytime">
                    <div class="col-md-4 mb-md">
                      <select class="form-control input-lg" name="day[]" data="required">
                        <option value="">Select Day*</option>
                        <option {{ $td->day == 'Sunday' ? 'selected' : '' }} value="Sunday">Sunday</option>
                        <option {{ $td->day == 'Monday' ? 'selected' : '' }} value="Monday">Monday</option>
                        <option {{ $td->day == 'Tuesday' ? 'selected' : '' }} value="Tuesday">Tuesday</option>
                        <option {{ $td->day == 'Wednesday' ? 'selected' : '' }} value="Wednesday">Wednesday</option>
                        <option {{ $td->day == 'Thursday' ? 'selected' : '' }} value="Thursday">Thursday</option>
                        <option {{ $td->day == 'Friday' ? 'selected' : '' }} value="Friday">Friday</option>
                        <option {{ $td->day == 'Saturday' ? 'selected' : '' }} value="Saturday">Saturday</option>
                      </select>


<?php if( $errors->has('day.0') ) 
    { echo "<li style='color:red'>Please select a day!!! </li>"; } 
?>                         
                    </div>
                    
                    <div class="col-md-3 mb-md">
                      <div class="input-group">
                         <select class="from form-control input-lg" name="timef[]" data="required">
                            <option value="">From*</option>
                            <option {{ $td->time_from == '01:00 AM' ? 'selected' : '' }} value="01:00 AM">01:00 AM</option>
                            <option {{ $td->time_from == '02:00 AM' ? 'selected' : '' }} value="02:00 AM">02:00 AM</option>
                            <option {{ $td->time_from == '03:00 AM' ? 'selected' : '' }} value="03:00 AM">03:00 AM</option>
                            <option {{ $td->time_from == '04:00 AM' ? 'selected' : '' }} value="04:00 AM">04:00 AM</option>
                            <option {{ $td->time_from == '05:00 AM' ? 'selected' : '' }} value="05:00 AM">05:00 AM</option>
                            <option {{ $td->time_from == '06:00 AM' ? 'selected' : '' }} value="06:00 AM">06:00 AM</option>
                            <option {{ $td->time_from == '07:00 AM' ? 'selected' : '' }} value="07:00 AM">07:00 AM</option>
                            <option {{ $td->time_from == '08:00 AM' ? 'selected' : '' }} value="08:00 AM">08:00 AM</option>
                            <option {{ $td->time_from == '09:00 AM' ? 'selected' : '' }} value="09:00 AM">09:00 AM</option>
                            <option {{ $td->time_from == '10:00 AM' ? 'selected' : '' }} value="10:00 AM">10:00 AM</option>
                            <option {{ $td->time_from == '11:00 AM' ? 'selected' : '' }} value="11:00 AM">11:00 AM</option>
                            <option {{ $td->time_from == '12:00 AM' ? 'selected' : '' }} value="12:00 AM">12:00 AM</option>
                            <option {{ $td->time_from == '01:00 PM' ? 'selected' : '' }} value="01:00 PM">01:00 PM</option>
                            <option {{ $td->time_from == '02:00 PM' ? 'selected' : '' }} value="02:00 PM">02:00 PM</option>
                            <option {{ $td->time_from == '03:00 PM' ? 'selected' : '' }} value="03:00 PM">03:00 PM</option>
                            <option {{ $td->time_from == '04:00 PM' ? 'selected' : '' }} value="04:00 PM">04:00 PM</option>
                            <option {{ $td->time_from == '05:00 PM' ? 'selected' : '' }} value="05:00 PM">05:00 PM</option>
                            <option {{ $td->time_from == '06:00 PM' ? 'selected' : '' }} value="06:00 PM">06:00 PM</option>
                            <option {{ $td->time_from == '07:00 PM' ? 'selected' : '' }} value="07:00 PM">07:00 PM</option>
                            <option {{ $td->time_from == '08:00 PM' ? 'selected' : '' }} value="08:00 PM">08:00 PM</option>
                            <option {{ $td->time_from == '09:00 PM' ? 'selected' : '' }} value="09:00 PM">09:00 PM</option>
                            <option {{ $td->time_from == '10:00 PM' ? 'selected' : '' }} value="10:00 PM">10:00 PM</option>
                            <option {{ $td->time_from == '11:00 PM' ? 'selected' : '' }} value="11:00 PM">11:00 PM</option>
                            <option {{ $td->time_from == '12:00 PM' ? 'selected' : '' }} value="12:00 PM">12:00 PM</option>
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

                        <select class="to form-control input-lg" name="timet[]" data="required">
                            <option value="">To*</option>
                            <option {{ $td->time_to == '01:00 AM' ? 'selected' : '' }} value="01:00 AM">01:00 AM</option>
                            <option {{ $td->time_to == '02:00 AM' ? 'selected' : '' }} value="02:00 AM">02:00 AM</option>
                            <option {{ $td->time_to == '03:00 AM' ? 'selected' : '' }} value="03:00 AM">03:00 AM</option>
                            <option {{ $td->time_to == '04:00 AM' ? 'selected' : '' }} value="04:00 AM">04:00 AM</option>
                            <option {{ $td->time_to == '05:00 AM' ? 'selected' : '' }} value="05:00 AM">05:00 AM</option>
                            <option {{ $td->time_to == '06:00 AM' ? 'selected' : '' }} value="06:00 AM">06:00 AM</option>
                            <option {{ $td->time_to == '07:00 AM' ? 'selected' : '' }} value="07:00 AM">07:00 AM</option>
                            <option {{ $td->time_to == '08:00 AM' ? 'selected' : '' }} value="08:00 AM">08:00 AM</option>
                            <option {{ $td->time_to == '09:00 AM' ? 'selected' : '' }} value="09:00 AM">09:00 AM</option>
                            <option {{ $td->time_to == '10:00 AM' ? 'selected' : '' }} value="10:00 AM">10:00 AM</option>
                            <option {{ $td->time_to == '11:00 AM' ? 'selected' : '' }} value="11:00 AM">11:00 AM</option>
                            <option {{ $td->time_to == '12:00 AM' ? 'selected' : '' }} value="12:00 AM">12:00 AM</option>
                            <option {{ $td->time_to == '01:00 PM' ? 'selected' : '' }} value="01:00 PM">01:00 PM</option>
                            <option {{ $td->time_to == '02:00 PM' ? 'selected' : '' }} value="02:00 PM">02:00 PM</option>
                            <option {{ $td->time_to == '03:00 PM' ? 'selected' : '' }} value="03:00 PM">03:00 PM</option>
                            <option {{ $td->time_to == '04:00 PM' ? 'selected' : '' }} value="04:00 PM">04:00 PM</option>
                            <option {{ $td->time_to == '05:00 PM' ? 'selected' : '' }} value="05:00 PM">05:00 PM</option>
                            <option {{ $td->time_to == '06:00 PM' ? 'selected' : '' }} value="06:00 PM">06:00 PM</option>
                            <option {{ $td->time_to == '07:00 PM' ? 'selected' : '' }} value="07:00 PM">07:00 PM</option>
                            <option {{ $td->time_to == '08:00 PM' ? 'selected' : '' }} value="08:00 PM">08:00 PM</option>
                            <option {{ $td->time_to == '09:00 PM' ? 'selected' : '' }} value="09:00 PM">09:00 PM</option>
                            <option {{ $td->time_to == '10:00 PM' ? 'selected' : '' }} value="10:00 PM">10:00 PM</option>
                            <option {{ $td->time_to == '11:00 PM' ? 'selected' : '' }} value="11:00 PM">11:00 PM</option>
                            <option {{ $td->time_to == '12:00 PM' ? 'selected' : '' }} value="12:00 PM">12:00 PM</option>
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
@endforeach                  
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
											<select  name="service[]" value="{{ old('service[]') }}" id="service" class="mb-xl ui fluid multiple selection dropdown">
												<option value="">Select Service Mode</option>
                        <option 
<?php
    $lang = explode(',', $lawyer->service_mode);
      foreach($lang as $lan){
        if($lan == 'phone'){
          echo "selected";
        }
      } 
 ?>
                         value="Phone">By Phone</option>
                        <option 
<?php
    $lang = explode(',', $lawyer->service_mode);
      foreach($lang as $lan){
        if($lan == 'Video'){
          echo "selected";
        }
      } 
 ?>
                         value="Video">By Video</option>
                        <option 
<?php
    $lang = explode(',', $lawyer->service_mode);
      foreach($lang as $lan){
        if($lan == 'Email'){
          echo "selected";
        }
      } 
 ?>
                         value="Email">By Email</option>
                        <option 
<?php
    $lang = explode(',', $lawyer->service_mode);
      foreach($lang as $lan){
        if($lan == 'Person'){
          echo "selected";
        }
      } 
 ?>
                         value="Person">In Person</option>
                        <option 
<?php
    $lang = explode(',', $lawyer->service_mode);
      foreach($lang as $lan){
        if($lan == 'Any'){
          echo "selected";
        }
      } 
 ?>
                         value="Any">Any</option>	
	
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
                               <input class="form-control input-lg" name="skype" value="{{ $lawyer->contact_video }}" type="text" placeholder="If Video Please provide your Skype ID *" /> 
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
									<input class="form-control input-lg" name="firstfee" value="{{ $lawyer->fee_first }}" type="number" placeholder="First Time (Rs)" data="required" />
                  <?php echo $errors->first('firstfee', "<li style='color:red'>:message</li>") ?>
								</div>
								<div class="col-md-6">
									<input class="form-control input-lg" name="hourfee" value="{{ $lawyer->fee_hourly }}" type="number" placeholder="Hourly Rate (Rs)" data="required" />
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
									<select  name="payment[]" value="{{old('payment[]')}}" id="payment" class="mb-xl ui fluid multiple selection dropdown" >
                    <option value="">Select Payment Option</option>

                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Credit_card'){
          echo "selected";
        }
      } 
 ?>
                     value="Credit_card">Credit card</option>
                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Check'){
          echo "selected";
        }
      } 
 ?>
                     value="Check">Check</option>
                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Cash'){
          echo "selected";
        }
      } 
 ?>
                     value="Cash">Cash</option>
                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Money_Order'){
          echo "selected";
        }
      } 
 ?>
                     value="Money_Order">Money Order</option>
                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Cashier_Check'){
          echo "selected";
        }
      } 
 ?>
                     value="Cashier_Check">Cashier Check</option>
                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Traveler_Check'){
          echo "selected";
        }
      } 
 ?>
                     value="Traveler_Check">Traveler Check</option>
                    <option 
<?php
    $payment = explode(',', $lawyer->payment);
      foreach($payment as $pay){
        if($pay == 'Wire_Transfer'){
          echo "selected";
        }
      } 
 ?>
                     value="Wire_Transfer">Wire Transfer</option>
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

{{-- End Main contant  --}}
@stop

            
@push('js')
<script></script>	
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
    <script type="text/javascript">
    $(function() {
        $('a.pl').click(function(e) {
            e.preventDefault();
            $('#education').append('   <div class="col-md-8"> <div class="form-group"> <input class="form-control input-lg" name="education[]" type="text" placeholder="Education" data="required" /> </div> </div> </div> ');   });
        $('a.mi').click(function (e) {
            e.preventDefault();
            if ($('#education input').length > 1) {
                $('#education').children().last().remove();
            }
        });
    });
    </script>

    <script  src="{{ URL::to('/public/multistep.js') }}" type="text/javascript"></script>
    
    <script src="{{ URL::to('/public/js/semantic.min.js') }}"></script>
<script src="{{ URL::to('/public/placeholders.min.js') }}"></script>
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
