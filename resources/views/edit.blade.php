@extends('public.master')
@section('title','Data Update')


@push('css')
<style>

.imageThumb {
  max-height: 100px;
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
  background: #444;
  border: 1px solid black;
  color: white;
  text-align: center;
  cursor: pointer;
}
.remove:hover {
  background: white;
  color: black;
}

/*** custom checkboxes ***/

input[type=checkbox] { display:none; } /* to hide the checkbox itself */
input[type=checkbox] + label:before {
  font-family: FontAwesome;
  display: inline-block;
}

input[type=checkbox] + label:before { content: "\f096"; } /* unchecked icon */
input[type=checkbox] + label:before { letter-spacing: 10px; } /* space between checkbox and label */

input[type=checkbox]:checked + label:before { content: "\f046"; } /* checked icon */
input[type=checkbox]:checked + label:before { letter-spacing: 5px; } /* allow space for check mark */

</style>


@endpush

@push('js1')
  <script>
  $( function() {
    $( "#dob" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0"
  });
  $( "#dor" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0"
  });
  } );
  </script>
@endpush
 

@section('content')



<!--  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

    <!-- Section: Registration Form -->
<section class="divider"> 
  <div class="container">
    <div class="row">
      <div class="col-sm-2"> 
        <div class="vertical-tab">
          <ul class="nav nav-tabs">
          <li class="active"><a href="#professional" data-toggle="tab"><i class="pe-7s-id"></i>Professional</a></li>
      @if( Auth::user()->role == 'lawfirm')
          <li><a href="#personal_lawfirm" data-toggle="tab"><i class="pe-7s-users"></i>Personal</a></li>
      @elseif( Auth::user()->role == 'lawyer')   
          <li><a href="#personal_lawyer" data-toggle="tab"><i class="pe-7s-users"></i>Personal</a></li>
      @endif
      @if( Auth::user()->role == 'lawyer')
          <li><a href="#education" data-toggle="tab"><i class="pe-7s-light"></i>Education</a></li>
      @endif    
          <li><a href="#gallery" data-toggle="tab"><i class="pe-7s-photo"></i>Gallery</a></li>
          <li><a href="#certificates" data-toggle="tab"><i class="pe-7s-copy-file"></i>Certificates</a></li>
          <li><a href="#awards" data-toggle="tab"><i class="pe-7s-ribbon"></i>Awards</a></li>
          <li><a href="#timing" data-toggle="tab"><i class="pe-7s-timer"></i>Timing</a></li>
      @if( Auth::user()->role == 'lawfirm')
          <li><a href="#lawyers" data-toggle="tab"><i class="pe-7s-id"></i>Lawyers List</a></li>
      @endif          
          </ul>
        </div>
      </div>  
      <div class="col-sm-10"> 
        <div class="tab-content">
          
      <!-- Professional Information Form -->    
          
          <div class="tab-pane fade in active" id="professional">
          <div class="row">
            
            <div class="p-30 pt-0 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> Professional Information</h3>
              <hr>

              {!! Form::open(['route'=>'professional_information','id'=>'pro','name'=>'pro','enctype'=>'multipart/form-data']) !!}

                   <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                   <input type="hidden" name="ref_id" value="{{ $lawyer->id }}">
                    <input type="hidden" name="register" value="{{ Auth::user()->role  }}" >
                    <input type="hidden" name="gender" value="1">
                    <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                  <!-- section one -->       
 
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="website">Web Url <small style="color:blue;">(Optional)</small></label>
                      <input id="website" name="website" type="text" placeholder="Website Url" class="form-control" value="{{ $lawyer->web_url }}">
                    </div>
                  </div>
                </div>
  
    @if( Auth::user()->role == 'lawyer')
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="firmname">LawFirm Name <small style="color:blue;">(Optional)</small></label>
                      <select id="firmname" name="firmname" class="form-control">
                        <option value="">Select Your Firm *</option>
                        @foreach( $lawfirms_id as $fid )     
                            @foreach( $lawfirms_name as $fname )
                                @if( $fname->id == $fid->ref_id )
                          <option {{ $lawyer->law_firm_id == $fid->ref_id ? 'selected' : '' }}
                           value="{{ $fid->ref_id }}" >

                                   {{ $fname->first_name }} {{ $fname->last_name }}
                          </option>
                                @endif 
                        @endforeach
                        @endforeach         
                      </select>
                    </div>
                  </div>
                </div>
    @endif 
      
                            
                <div class="center mb-20">
                    <h5><b>Expertise:</b></h5>
                  <div>
                    @foreach($expertise as $ex)
                      <input id="box1{{$ex->id}}" type="checkbox" name="expertise[]" value="{{$ex->id}}"
                          <?php
                             $dl = explode(',', $lawyer->expertise); 
                              foreach ($dl as $key){ if($key == $ex->id){ echo "checked"; }}  
                          ?>
                       />
                      <label for="box1{{$ex->id}}" class="mr-20">{{ $ex->expertise_name }}</label>
                    @endforeach
                  </div> 
                  <?php if( $errors->has('expertise.0') ) 
                  { echo "<li style='color:red'>Please Fill This field!!!</li>"; } 
                  ?>      
                </div>
        
        
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="yoe">Year Of Experience <small style="color:red;">*</small></label>
                      <input id="yoe" name="yoe" type="number" placeholder="Year Of Experience" required="" class="form-control" value="{{ $lawyer->experience }}">
                      <?php echo $errors->first('yoe', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="bar">Bar Member <small style="color:red;">*</small></label>
                      <select id="bar" name="bar" class="form-control required" required>
                        <option value="0">No</option>
                      @foreach( $bars as $bar )     
                        <option {{ $lawyer->bar_id == $bar->id ? 'selected' : '' }} value="{{ $bar->id }}" >{{ $bar->bar_name }}</option>
                      @endforeach
                      </select>
                      <?php echo $errors->first('bar', "<li style='color:red'>:message</li>") ?> 
                    </div>
                  </div>
                </div>

                <div class="center mb-20">
                    <h5><b>Courts:</b></h5>
                  <div>
                  @foreach($courts as $court)
                    <input id="box11{{$court->id}}" type="checkbox" name="court[]" value="{{$court->id}}"
                      <?php
                            $dl = explode(',', $lawyer->court_names); 
                            foreach ($dl as $key) { if($key == $court->id){ echo "checked"; }}    
                       ?>
                    />   
                    <label for="box11{{$court->id}}" class="mr-20">{{ $court->court_name }}</label>
                  @endforeach
                  </div>
                  <?php if( $errors->has('court.0') ) 
                    { echo "<li style='color:red'>Please Fill This field!!!</li>"; } 
                  ?>         
                </div>

                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="first_fee">First Fee <small style="color:red;">*</small></label>
                      <input id="first_fee" name="firstfee" type="number" placeholder="First Fee" required="required" class="form-control" value="{{ $lawyer->fee_first }}">
                      <?php echo $errors->first('firstfee', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="hourly_fee">Hourly Fee <small style="color:red;">*</small></label>
                      <input id="hourly_fee" name="hourfee" type="number" placeholder="Hourly Fee" required="required" class="form-control" value="{{ $lawyer->fee_hourly }}">
                      <?php echo $errors->first('hourfee', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
      

                <div class="center mb-20">
                  <div class="row"> 
                    <!-- Payments -->              
                    <div class="col-sm-6">
                      <h5><b>Payment Methords:</b></h5>
                      <div>
                       <input id="box1110" type="checkbox" name="payment[]" value="paypal"
                          <?php
                              $payment = explode(',', $lawyer->payment);
                                foreach($payment as $pay){ if($pay == 'paypal'){ echo "checked"; }} 
                           ?>
                        />   
                        <label for="box1110" class="mr-20">Paypal</label> 
                        <input id="box2110" type="checkbox" name="payment[]" value="Khalti"
                          <?php
                              $payment = explode(',', $lawyer->payment);
                                foreach($payment as $pay){ if($pay == 'Khalti'){ echo "checked"; }} 
                          ?>
                        />
                        <label for="box2110" class="mr-20">Khalti</label>           
                      </div>
                      <?php if( $errors->has('payment.0') ) 
                          { echo "<li style='color:red'>Please select your Payment Methods!!! </li>"; } 
                      ?> 
                    </div>
                    <!-- Languages -->
                    <div class="col-sm-6">
                    <h5><b>Languages:</b></h5>
                      <div>
                        @foreach($languages as $l)
                         <input id="boxl{{$l->id}}" type="checkbox" name="language[]" value="{{$l->id}}"
                          <?php
                                $lan = explode(',', $lawyer->languages); foreach ($lan as $key) { if($key == $l->id){ echo "checked"; } }       
                           ?>
                        />
                        <label for="boxl{{$l->id}}" class="mr-20">{{$l->lang_name}}</label>
                        @endforeach
                      </div>
                        <?php if( $errors->has('language.0') ) 
                            { echo "<li style='color:red'>Please select languages.</li>"; } 
                        ?>           
                    </div>
                  </div>      
                </div>
                
                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="skype">Skype Id<small style="color:blue;"> (optional)</small></label>
                        <input id="skype" name="skype" value="{{ $lawyer->contact_video }}" class="form-control" type="text" placeholder="Enter Your Skype Id">
                      </div>
                    </div>
                  </div>

                  <div class="center mb-20">
                    <h5><b>Service Mode:</b></h5>
                    <div class="col-sm-12" >
                      <div class="col-sm-3 col-sm-offset-1"> 
                        <h5 style="color:gray;">
                          <input id="boxphone" type="checkbox" name="service[]" value="phone"
                            <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'phone'){
                                      echo "checked";
                                    }
                                  } 
                             ?>
                           />
                          <label for="boxphone" class="mr-20">By Phone</label> 
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="p_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $phone = explode(',', $lawyer->phone_price); 
                            echo $phone[0];    
                          ?>"
                         />
                      </div>
                      <div class="col-sm-4">
                        <input name="p_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php 
                          $phone = explode(',', $lawyer->phone_price);
                          if (!empty($phone[1])){ echo $phone[1]; } 
                          ?>"
                        />
                      </div>
                    </div>
                    <div class="col-sm-12 mt-10" >
                      <div class="col-sm-3 col-sm-offset-1"> 
                        <h5 style="color:gray;">
                          <input id="boxemail" type="checkbox" name="service[]" value="email"
                              <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'email'){
                                      echo "checked";
                                    }
                                  } 
                             ?>
                           />
                          <label for="boxemail" class="mr-20">By Email</label> 
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="e_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $email = explode(',', $lawyer->email_price); 
                            echo $email[0];    
                          ?>" />
                      </div>
                      <div class="col-sm-4">
                        <input name="e_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                            $email = explode(',', $lawyer->email_price); 
                            if (!empty($email[1])){ echo $email[1]; } 
                          ?>" />
                      </div>
                    </div>
                    <div class="col-sm-12 mt-10" >
                      <div class="col-sm-3 col-sm-offset-1"> 
                        <h5 style="color:gray;">
                          <input id="boxvideo" type="checkbox" name="service[]" value="video"
                              <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'video'){
                                      echo "checked";
                                    }
                                  } 
                              ?>
                          />
                          <label for="boxvideo" class="mr-20">By Video Call</label> 
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="v_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $video = explode(',', $lawyer->skype_price); 
                            echo $video[0];    
                          ?>" />
                      </div>
                      <div class="col-sm-4">
                        <input name="v_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                            $video = explode(',', $lawyer->skype_price); 
                            if (!empty($video[1])){ echo $video[1]; }   
                          ?>" />
                      </div>
                    </div>
                    <div class="col-sm-12 mt-10" >
                      <div class="col-sm-3 col-sm-offset-1"> 
                        <h5 style="color:gray;">
                          <input id="boxperson" type="checkbox" name="service[]" value="person" 
                              <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'person'){
                                      echo "checked";
                                    }
                                  } 
                              ?>
                          />
                          <label for="boxperson" class="mr-20">By Meeting</label> 
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="m_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $phone = explode(',', $lawyer->personal_price); 
                            echo $phone[0];    
                          ?>" />
                      </div>
                      <div class="col-sm-4">
                        <input name="m_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                            $phone = explode(',', $lawyer->personal_price); 
                             if (!empty($phone[1])){ echo $phone[1]; }    
                          ?>" />
                      </div>
                    </div>  
                  </div>      
        
                
                <div class="row">
                  <div class="col-sm-4 col-sm-offset-4 mt-20">
                    <div class="form-group">
                      <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                      <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                    </div>
                  </div>
                </div>
                
             {!! Form::close() !!}
              <!-- Job Form Validation-->
              <script type="text/javascript">
                jQuery("#pro").validate();
              </script>
            </div>
          </div>
          </div>
         
        <!-- Personal Information Form For Lawfirm -->
      @if( Auth::user()->role == 'lawfirm')  
         <div class="tab-pane fade" id="personal_lawfirm">
          <div class="row">
            <div class=" p-30 pt-0 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> Personal Information</h3>
              <hr>
              <h5 class="text-center" ><b>Profile Picture</b></h5>
              {!! Form::open(['route'=>'personal_information','id'=>'personal_firm','name'=>'personal_firm','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="ref_id" value="{{ $lawyer->id }}">
                <input type="hidden" name="register" value="{{ Auth::user()->role  }}" >
                <input type="hidden" name="gender" value="1">
                <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                <input type="hidden" name="officepn" value="{{ Auth::user()->office_contact }}">
                <input type="hidden" name="homepn" value="{{ Auth::user()->home_contact }}">
                  <!-- section one -->
              <div class="center mb-20">
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-5">
                      <div class="main-img-preview">
                        <input type="hidden" name="img" value="{{ Auth::user()->image_path }}" >
                          <img class="thumbnail img-preview img-responsive" src="{{ URL::to('public/profileimages/'.Auth::user()->image_path) }}" title="Preview Logo">
                          <?php echo $errors->first('new_img', "<li style='color:red'>:message</li>") ?> 
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="input-group">
                        <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" readonly>
                        <div class="input-group-btn">
                          <div class="fileUpload btn btn-primary fake-shadow" style="height:45px; padding-top:12px;">
                            <span>
                            <i class="glyphicon glyphicon-upload"></i> Upload Photo</span>
                            <input id="logo-id" name="new_img" type="file" class="attachment_upload" style="position: absolute; opacity:0; font-size: 33px; cursor: pointer; top: 0; right: 0; margin: 0; padding: 0;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>        
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="email">Your Email <small style="color:red;">*</small></label>
                    <input id="email" name="email" type="text" required="" value="{{ Auth::user()->email }}" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="first_name">Your Firm Name <small style="color:red;">*</small></label>
                  <input id="first_name" name="first_name" type="text" placeholder="Enter Your Firm Name" required="" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" class="form-control">
                  <?php echo $errors->first('first_name', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="license">License Number <small style="color:red;">*</small></label>
                  @if( $lawyer->license_number )
                    <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" value="{{ $lawyer->license_number }}" readonly>
                  @else
                    <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" >
                  @endif  
                  <?php echo $errors->first('license', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="mobile">Mobile Number <small style="color:red;">*</small></label>
                  <input id="mobile" name="mobile" type="number" placeholder="Mobile # +977 X XXXX XXX" required="required" value="{{ Auth::user()->contact }}" class="form-control">
                  <?php echo $errors->first('mobile', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="dor">Date Of Registration <small style="color:red;">*</small></label>
                  <input id="dor" class="form-control input-lg" name="dor" type="text"  placeholder="Date of Registration *" required="required" value="{{ $lawyer->dor_site }}" />
                  <?php echo $errors->first('dor', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                  <label for="address">Address<small style="color:red;">*</small></label>
                  <input id="address" name="address" class="form-control" type="text" required="required" placeholder="Enter Your Address" value="{{ Auth::user()->address }}">
                  <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
              </div>
              <div class="row">  
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="region">Province <small style="color:red;">*</small></label>
                    <select class="form-control required" name="region" id="region" onchange="sta(this);" required>
                    @foreach( $regions as $region )
                      <option {{ Auth::user()->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->region_name }}</option>
                    @endforeach 
                    </select>
                    <?php echo $errors->first('region', "<li style='color:red'>:message</li>") ?>
                  </div>
                  </div>             
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="state">District <small style="color:red;">*</small></label>
                    <select id="state" name="state" class="form-control required" required onchange="cities(this);">
                        <option value="">--- Select ---</option>
                        @if(!empty($state->id))    
                            <option {{ Auth::user()->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                        @endif    
                    </select>
                    <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="city">City <small style="color:red;">*</small></label>
                    <select id="city" name="city" class="form-control required" required>
                     @if(!empty($city->id))
                        <option {{ Auth::user()->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->city_name }}</option>
                     @endif    
                    </select>
                    <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="desc">Description <small style="color:red;">*</small></label>
                    <textarea class="form-control" name="desc" rows="5" placeholder="About Yourself">{{ $lawyer->description }}</textarea>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                  </div>
                </div>
              </div>
              
        {!! Form::close() !!}

              
              
              <!-- Job Form Validation-->
              <script type="text/javascript">
              $("#personal_firm").validate();
              </script>
            </div>
        
          </div>
          </div>
      @endif
                  <!-- Personal Information Form For Lawfirm -->
         
      @if( Auth::user()->role == 'lawyer') 
         <div class="tab-pane fade" id="personal_lawyer">
          <div class="row">
            <div class=" p-30 pt-0 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> Personal Information</h3>
              <hr>
              <h5 class="text-center" ><b>Profile Picture</b></h5>

              {!! Form::open(['route'=>'personal_information','id'=>'personal_l','name'=>'personal_l','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="ref_id" value="{{ $lawyer->id }}">
                <input type="hidden" name="register" value="{{ Auth::user()->role  }}" >
                <input type="hidden" name="gender" value="1">
                <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                  <!-- section one -->
              <div class="center mb-20">
                <div class="row">
                  <div class="form-group">
                    <div class="col-sm-2 col-sm-offset-5">
                      <div class="main-img-preview">
                        <input type="hidden" name="img" value="{{ Auth::user()->image_path }}" >
                          <img class="thumbnail img-preview img-responsive" src="{{ URL::to('public/profileimages/'.Auth::user()->image_path) }}" title="Preview Logo">
                          <?php echo $errors->first('new_img', "<li style='color:red'>:message</li>") ?> 
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                      <div class="input-group">
                        <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" readonly>
                        <div class="input-group-btn">
                          <div class="fileUpload btn btn-primary fake-shadow" style="height:45px; padding-top:12px;">
                            <span>
                            <i class="glyphicon glyphicon-upload"></i> Upload Photo</span>
                            <input id="logo-id" name="new_img" type="file" class="attachment_upload" style="position: absolute; opacity:0; font-size: 33px; cursor: pointer; top: 0; right: 0; margin: 0; padding: 0;">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>        
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="email">Your Email <small style="color:red;">*</small></label>
                    <input id="email" name="email" type="text" required="" value="{{ Auth::user()->email }}" class="form-control" readonly>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="first_name">Your Name <small style="color:red;">*</small></label>
                  <input id="first_name" name="first_name" type="text" placeholder="Enter Your Name" required="" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" class="form-control">
                  <?php echo $errors->first('first_name', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="license">License Number <small style="color:red;">*</small></label>
                  @if( $lawyer->license_number )
                    <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" value="{{ $lawyer->license_number }}" readonly>
                  @else
                    <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" >
                  @endif  
                  <?php echo $errors->first('license', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="mobile">Mobile Number <small style="color:red;">*</small></label>
                  <input id="mobile" name="mobile" type="number" placeholder="Mobile # +977 X XXXX XXX" required="required" value="{{ Auth::user()->contact }}" class="form-control">
                  <?php echo $errors->first('mobile', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="officepn">Office Number <small style="color:blue;">(optional)</small></label>
                  <input id="officepn" name="officepn" type="number" placeholder="Office # +977 XXX XXXX XXX" class="form-control" value="{{ Auth::user()->office_contact }}">
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="homepn">Home Number <small style="color:blue;">(optional)</small></label>
                  <input id="homepn" name="homepn" type="number" placeholder="Home # +977 XXX XXXX XXX" class="form-control" value="{{ Auth::user()->home_contact }}">
                </div>
                </div>
                <div class="col-sm-6">
                <div class="form-group">
                  <label for="dor">Date Of Birth <small style="color:red;">*</small></label>
                  <input id="dob" class="form-control input-lg" name="dob" type="text"  placeholder="Date of Birth *" required="required" value="{{ $lawyer->dob }}" />
                  <?php echo $errors->first('dob', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                <div class="form-group">
                  <label for="address">Address<small style="color:red;">*</small></label>
                  <input id="address" name="address" class="form-control" type="text" required="required" placeholder="Enter Your Address" value="{{ Auth::user()->address }}">
                  <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
                </div>
                </div>
              </div>
              <div class="row">  
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="region">Province <small style="color:red;">*</small></label>
                    <select class="form-control required" name="region" id="region" onchange="sta(this);" required>
                    <option value="">--- Select ---</option>
                    @foreach( $regions as $region )
                      <option {{ Auth::user()->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->region_name }}</option>
                    @endforeach 
                    </select>
                    <?php echo $errors->first('region', "<li style='color:red'>:message</li>") ?>
                    <?php echo $errors->first('region', "<li style='color:red'>:message</li>") ?>
                  </div>
                  </div>             
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="state">District <small style="color:red;">*</small></label>
                    <select id="state" name="state" class="form-control required" required onchange="cities(this);">
                        <option value="">--- Select ---</option>
                        @if(!empty($state->id))    
                            <option {{ Auth::user()->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                        @endif   
                    </select>
                    <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="city">City <small style="color:red;">*</small></label>
                    <select id="city" name="city" class="form-control required" required>
                        <option value="">--- Select ---</option>
                      @if(!empty($city->id))  
                        <option {{ Auth::user()->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->city_name }}</option>
                      @endif
                    </select>
                    <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="desc">Description <small style="color:red;">*</small></label>
                    <textarea class="form-control" name="desc" rows="5" placeholder="About Yourself">{{ $lawyer->description }}</textarea>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" name="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                  </div>
                </div>
              </div>
              
        {!! Form::close() !!}

              
              
              <!-- Job Form Validation-->
              <script type="text/javascript">
                jQuery("#personal_l").validate();
              </script>
            </div>
        
          </div>
          </div>
      @endif

          <!-- Education update Form -->
          
          <div class="tab-pane fade" id="education">
          <h3 class="text-theme-colored mt-0 pt-5"> Education</h3>
              <hr>
              
            <div class="row">
              <h3 class="text-center mb-20"><i class="pe-7s-notebook" ></i> Add Your Education </h3>
          {!! Form::open(['route'=>'Education','id'=>'edu','name'=>'edu']) !!}
            <input type="hidden" name="id" value="{{ Auth::user()->id }}">
              
            @foreach( $lawyer_edu as $edu )
                <div class="col-sm-10 col-sm-offset-1 mb-20">
                  <label> Degree: </label>
                  <input type="text" name="education[]" class="form-control" value="{{ $edu->education_name }}">
                  <input type="hidden" name="edu_id[]" value="{{ $edu->id }}">
                </div>  
            @endforeach

              <div class="edu_fields_wrap">
                <div class="col-sm-10 col-sm-offset-1 mb-20">
                  <label> Degree: </label>
                  <input type="text" name="education[]" class="form-control">
                </div>  
              </div>

            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                  <button class="add_edu_button btn-block btn btn-info btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Add More Fields</button>
                </div>  
              </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                  </div>
                </div>
            </div>
        {!! Form::close() !!} 
          
          <!-- Job Form Validation-->
  <script type="text/javascript">
    $("#edu").validate();
  </script>
  <script>
    $(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".edu_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_edu_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-10 col-sm-offset-1"><label> Degree: </label><input class="form-control" type="text" name="education[]" /><i class="pe-7s-trash"></i><a href="#" class="remove_field" style="color:red;">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>
</div>
      

        <!-- Gallery Information Form -->
      
        <!-- Gallery Information Form -->
      
<div class="tab-pane fade" id="gallery">
  <h3 class="text-theme-colored mt-0 pt-5"> Upload Your Gallery</h3>
              <hr>     
        <div class="row">
          {!! Form::open(['route'=>'Gallery','id'=>'glry','name'=>'glry','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="id" value="{{ Auth::user()->id }}">

                <div class="col-sm-12">
                  <div class="field" align="left">
                    <input type="file" class="btn btn-default" accept="image/*" id="files" name="photos[]" multiple />
                  </div>
                  <?php if( $errors->has('photos.0') ) { echo "<li style='color:red'>Photos must be type of <b>jpeg,jpg,png</b> with in <b>5 Mb</b> size. </li>"; } ?>
                </div>
                <div class="col-sm-4 col-sm-offset-4 text-center mt-20">
                  <button class="btn btn-info btn-block btn-lg" type="submit" >Upload</button>
                </div>
          {!! Form::close() !!}
        </div>

      <div class="col-lg-12 mt-20">
        <h4 class="m-20 mb-20" style="color:blue;"> Your Gallery Images:</h4>          
        <div class="col-sm-12">
            
        <div class=" row grid-4 gutter-small clearfix" data-lightbox="gallery" >
                      <!-- Portfolio Item Start -->
          @foreach($photos as $img)            
          <div class="col-md-3 mt-20"> 
            <div class="portfolio-item pt-im ">
              <a href="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" data-lightbox="gallery-item">
                <img  pt-im src="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" alt="">
              </a>
			  <a href="/deletegimage/{{$img->id}}"><i class="fa fa-trash-o"></i>Delete</a>
            </div>
          </div>
        @endforeach
        </div> 


        </div>
      </div>
          <!-- Job Form Validation-->
  <script type="text/javascript">
    $("#glry").validate();
  </script>
<script>
$(document).ready(function() {
  if (window.File && window.FileList && window.FileReader) {
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<span class=\"pip\">" +
            "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\">Remove image</span>" +
            "</span>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });
          
        });
        fileReader.readAsDataURL(f);
      }
    });
  } else {
    alert("Your browser doesn't support to File API")
  }
});
</script> 
</div>      <!-- Certificates Update Form -->
          
          <div class="tab-pane fade" id="certificates">
            <h3 class="text-theme-colored mt-0 pt-5"> Add Your Certificates </h3>
              <hr>
          {!! Form::open(['route'=>'Certificates','id'=>'certificates_form','name'=>'certificates_form','enctype'=>'multipart/form-data']) !!} 
          <input type="hidden" name="id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="role" value="{{ Auth::user()->role }}"> 

            <div class="row">
              <div class="certicicates_fields_wrap">
                <div class="col-sm-10 col-sm-offset-1 mb-20">
                  <label for="filesTitle"> Titel </label>
                  <input id="filesTitle" type="text" name="filesTitle[]" required="required" class="form-control">
                  <?php if( $errors->has('filesTitle.0') ) 
                      { echo "<li style='color:red'>Please give files types of <b>.pdf</b> or <b>.doc</b>.</li>"; } ?>
                  <br>
                  <label for="files"> Certificate </label>
                  <input type="file" id="files" name="files[]" required="required" accept="image/*" class="form-control">
                  <?php if( $errors->has('files.0') ) 
                      { echo "<li style='color:red'>Please give files types of <b>.pdf</b> or <b>.doc</b>.</li>"; } ?>  
                </div>  
              </div>      
            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                  <button class="add_certicicates_button btn-block btn btn-info btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Add More Fields</button>
                </div>  
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                  <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                </div>
              </div>
            </div>
          {!! Form::close() !!}
<!-- Form validatipon -->         
<script type="text/javascript">
    $("#certificates_form").validate();
</script>         
  <script>
    $(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".certicicates_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_certicicates_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-10 col-sm-offset-1 mb-20"><label for="filesTitle"> Titel </label><input id="filesTitle" type="text" name="filesTitle[]" class="form-control" required="required"><br><label for="files"> Certificate </label><input id="files" type="file" accept=".pdf,.doc" name="files[]" class="form-control" required="required"><i class="pe-7s-trash"></i><a href="#" class="remove_field" style="color:red;">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>
          </div>

          <!-- Awards Update Form -->
          
          <div class="tab-pane fade" id="awards">
          <h3 class="text-theme-colored mt-0 pt-5"> Add Your Awards</h3>
              <hr>
          <div class="row">

        {!! Form::open(['route'=>'Awards','id'=>'award_form','name'=>'award_form','enctype'=>'multipart/form-data']) !!} 
          <input type="hidden" name="id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="role" value="{{ Auth::user()->role }}">      
              
              <div class="awards_fields_wrap"> 
                <div class="col-sm-10 col-sm-offset-1 mb-20">
                  <label> Titel </label>
                  <input type="text" name="awardTitle[]" class="form-control">
                  <label> Award </label>
                  <input type="file" accept="image/*" name="award[]"  class="form-control">
                </div>  
              </div>      
            </div>
            <div class="row">
              <div class="col-sm-4 col-sm-offset-2">
                <div class="form-group">
                  <button class="add_awards_button btn-block btn btn-info btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Add More Fields</button>
                </div>  
              </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                  </div>
                </div>
            </div>
      
        {!! Form::close() !!}
  <!-- Form validatipon -->         
<script type="text/javascript">
    $("#award_form").validate();
</script>       
  <script>
    $(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".awards_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_awards_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-10 col-sm-offset-1 mb-20"><label> Titel </label><input type="text" name="awardTitle[]" class="form-control"><label> Award </label><input type="file" accept="image/*" name="award[]" class="form-control"><i class="pe-7s-trash"></i><a href="#" class="remove_field" style="color:red;">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>
          </div>
          
         
         <!-- Lawyers List -->

      <div class="tab-pane fade" id="lawyers">
          <h3 class="text-theme-colored mt-0 pt-5"> Add Your Lawyers</h3>
          <span>(Enter email of lawyer that you want to add in your Lawfirm)</span>
              <hr>
          <div class="row">

        {!! Form::open(['route'=>'sendmaillawyer','id'=>'sendmaillawyer','name'=>'sendmaillawyer','enctype'=>'multipart/form-data']) !!} 
          <input type="hidden" name="id" value="{{ Auth::user()->id }}">
          <input type="hidden" name="role" value="{{ Auth::user()->role }}">
          <input type="hidden" name="firstName" value="{{ Auth::user()->first_name }}">
          <input type="hidden" name="lastName" value="{{ Auth::user()->last_name }}">      
              
              <div class="awards_fields_wrap"> 
                <div class="col-sm-10 col-sm-offset-1 mb-20">
                  <label> Email </label>
                  <input type="email" name="lawyer_email" class="form-control">
                </div>  
              </div>      
            </div>

            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    @if(Auth::user()->status == 1)
                        <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Send Invitation</button>
                    @else
                        <button class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;" disabled>You are not approved yet!</button>
                    @endif    
                  </div>
                </div>
            </div>

            <!-- Lswyers list -->
            <hr>
            <div class="list-dashed">
              @foreach($firm_lawyers as $lawyer)
                <article class="post media-post clearfix pb-0 mb-10"> 
                  <a href="{{ route('detail',[$lawyer->id]) }}" class="post-thumb">
                    <img alt="No image Found" src="{{ URL::to('public/profileimages/'.$lawyer->image_path) }}" class="img-responsive" width="75">
                  </a>
                  <div class="post-right">
                    <h5 class="post-title mt-0">
                      <a href="{{ route('detail',[$lawyer->id]) }}">{{ $lawyer->first_name }}{{ $lawyer->last_name }}</a>
                    </h5>
                    <p>{{ $lawyer->role }}</p>
                    <a href="{{ route('detail',[$lawyer->id]) }}" class="btn btn-info btn-sm">View Lawyer</a>
                  </div>
                </article>
              @endforeach  
            </div>
      
        {!! Form::close() !!}
  <!-- Form validatipon -->         
<script type="text/javascript">
    $("#sendmaillawyer").validate();
</script>       
  <script>
    $(document).ready(function() {
    var max_fields      = 100; //maximum input boxes allowed
    var wrapper         = $(".awards_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_awards_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="col-sm-10 col-sm-offset-1 mb-20"><label> Titel </label><input type="text" name="awardTitle[]" class="form-control"><label> Award </label><input type="file" accept="image/*" name="award[]" class="form-control"><i class="pe-7s-trash"></i><a href="#" class="remove_field" style="color:red;">Remove</a></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
  </script>
</div>



          <!-- Timing Update Form -->
          
          <div class="tab-pane fade" id="timing">
          <h3 class="text-theme-colored mt-0 pt-5"> Add Your Office Timing</h3>
              <hr>
        
        <div class="row">
              <div class="form-group">
              {!! Form::open(['route'=>'Time','id'=>'time_form','name'=>'time_form','enctype'=>'multipart/form-data']) !!} 
              <input type="hidden" name="id" value="{{ Auth::user()->id }}">  
@foreach($day_time as $td)                
                <div class="RegSpLeft2">
                    <div class="col-md-4 mb-md mt-10">
                      <input type="hidden" name="time_id[]" value="{{ $td->id }}">
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
                    
                    <div class="col-md-3 mb-md mt-10">
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
                    <div class="col-md-3 mb-md mt-10">
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
 <div class="RegSpLeft2 mt-10" id="daytime">
                    <div class="col-md-4 mb-md mt-10">
                      <select class="form-control input-lg" name="day[]" data="required">
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
                    
                    <div class="col-md-3 mb-md mt-10">
                      <div class="input-group">
                         <select class="from form-control input-lg" name="timef[]" data="required">
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
                    <div class="col-md-3 mb-md mt-10">
                      <div class="input-group">

                        <select class="to form-control input-lg" name="timet[]" data="required">
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
                  <div class="col-sm-1 mt-15" style="margin-left: -10px">
                    <a href="#" class="pl2 btn btn-primary"><i class="fa fa-plus"></i></a>
                  </div> 
                  <div class="col-sm-1 mt-15"> 
                    <a href="#" class="mi2 btn btn-primary"><i class="fa fa-minus"></i>
                    </a>
                  </div>
                </div>
                <div class="col-sm-4 col-sm-offset-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
                  </div>
                </div>
          </div>
        </div>

    {!! Form::close() !!}  
        
  <!-- Form validatipon -->         
<script type="text/javascript">
    $("#time_form").validate();
</script>       
<script type="text/javascript">
  $(function() {
    $('a.pl2').click(function(e) {
      e.preventDefault();
        $('#daytime').append('   <div class="col-md-4 mb-md mt-10 ">                      <select class="form-control input-lg" name="day[]" data="required"><option value="">Select Day*</option> <option value="Sunday">Sunday</option>  <option value="Monday">Monday</option>  <option value="Tuesday">Tuesday</option>  <option value="Wednesday">Wednesday</option>  <option value="Thursday">Thursday</option>  <option value="Friday">Friday</option>  <option value="Saturday">Saturday</option>  </select>                    </div>                    <div class="col-md-3 mb-md mt-10">                      <div class="input-group">   <select class="from form-control input-lg" name="timef[]" data="required">   <option value="">From*</option>  <option value="01:00 AM">01:00 AM</option>  <option value="02:00 AM">02:00 AM</option>  <option value="03:00 AM">03:00 AM</option>  <option value="04:00 AM">04:00 AM</option>  <option value="05:00 AM">05:00 AM</option>  <option value="06:00 AM">06:00 AM</option>  <option value="07:00 AM">07:00 AM</option>  <option value="08:00 AM">08:00 AM</option>  <option value="09:00 AM">09:00 AM</option>  <option value="10:00 AM">10:00 AM</option>  <option value="11:00 AM">11:00 AM</option>  <option value="12:00 AM">12:00 AM</option>  <option value="01:00 PM">01:00 PM</option>  <option value="02:00 PM">02:00 PM</option>  <option value="03:00 PM">03:00 PM</option>  <option value="04:00 PM">04:00 PM</option>  <option value="05:00 PM">05:00 PM</option>  <option value="06:00 PM">06:00 PM</option>  <option value="07:00 PM">07:00 PM</option>  <option value="08:00 PM">08:00 PM</option>  <option value="09:00 PM">09:00 PM</option>  <option value="10:00 PM">10:00 PM</option>  <option value="11:00 PM">11:00 PM</option>  <option value="12:00 PM">12:00 PM</option></select>    <span class="input-group-addon">        <span class="glyphicon glyphicon-time"></span>    </span></div>                    </div>                                        <div class="col-md-3 mb-md mt-10">                      <div class="input-group"><select class="to form-control input-lg" name="timet[]" data="required"><option value="">To*</option>    <option value="01:00 AM">01:00 AM</option>  <option value="02:00 AM">02:00 AM</option>  <option value="03:00 AM">03:00 AM</option>  <option value="04:00 AM">04:00 AM</option>  <option value="05:00 AM">05:00 AM</option>  <option value="06:00 AM">06:00 AM</option>  <option value="07:00 AM">07:00 AM</option>  <option value="08:00 AM">08:00 AM</option>  <option value="09:00 AM">09:00 AM</option>  <option value="10:00 AM">10:00 AM</option>  <option value="11:00 AM">11:00 AM</option>  <option value="12:00 AM">12:00 AM</option>    <option value="01:00 PM">01:00 PM</option>  <option value="02:00 PM">02:00 PM</option>  <option value="03:00 PM">03:00 PM</option>  <option value="04:00 PM">04:00 PM</option>  <option value="05:00 PM">05:00 PM</option>  <option value="06:00 PM">06:00 PM</option>  <option value="07:00 PM">07:00 PM</option>  <option value="08:00 PM">08:00 PM</option>  <option value="09:00 PM">09:00 PM</option>  <option value="10:00 PM">10:00 PM</option>  <option value="11:00 PM">11:00 PM</option>  <option value="12:00 PM">12:00 PM</option></select>    <span class="input-group-addon">        <span class="glyphicon glyphicon-time"></span>    </span></div>                    </div>');   });
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
          </div>
          
        </div>
      </div>  
    </div>
  </div>
</section>  
  

























<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->



{{-- Main contant start --}}    


@stop

     








@push('js')
<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
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
      <script src="{{ URL::to('public/new/js/ajax.js') }}" ></script>
@endpush
