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
                          <span class='help-block' id="new_img_help"><strong></strong></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <div class="col-md-6 col-md-offset-3" id="new_img_div">
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
                <div class="col-sm-6" id="first_name_div">
                <div class="form-group">
                  <label for="first_name">Your Firm Name <small style="color:red;">*</small></label>
                  <input id="first_name" name="first_name" type="text" placeholder="Enter Your Firm Name" required="" value="{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}" class="form-control">
                  <span class='help-block' id="first_name_help"><strong></strong></span>
                </div>
                </div>
                <div class="col-sm-6" id="license_div">
                <div class="form-group">
                  <label for="license">License Number <small style="color:red;">*</small></label>
                  @if( $lawyer->license_number )
                    <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" value="{{ $lawyer->license_number }}" readonly>
                  @else
                    <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" >
                  @endif  
                  <span class='help-block' id="license_help"><strong></strong></span>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6" id="mobile_div">
                <div class="form-group">
                  <label for="mobile">Mobile Number <small style="color:red;">*</small></label>
                  <input id="mobile" name="mobile" type="number" placeholder="Mobile # +977 X XXXX XXX" required="required" value="{{ Auth::user()->contact }}" class="form-control">
                  <span class='help-block' id="mobile_help"><strong></strong></span>
                </div>
                </div>
                <div class="col-sm-6" id="dor_div">
                <div class="form-group">
                  <label for="dor">Date Of Registration <small style="color:red;">*</small></label>
                  <input id="dor" class="form-control input-lg" name="dor" type="text"  placeholder="Date of Registration *" required="required" value="{{ $lawyer->dor_site }}" />
                  <span class='help-block' id="dor_help"><strong></strong></span>
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12" id="address_div">
                <div class="form-group">
                  <label for="address">Address<small style="color:red;">*</small></label>
                  <input id="address" name="address" class="form-control" type="text" required="required" placeholder="Enter Your Address" value="{{ Auth::user()->address }}">
                  <span class='help-block' id="address_help"><strong></strong></span>
                </div>
                </div>
              </div>
              <div class="row">  
                <div class="col-sm-4" id="region_div">
                  <div class="form-group">
                    <label for="region">Province <small style="color:red;">*</small></label>
                    <select class="form-control required" name="region" id="region" onchange="sta(this);" required>
                    @foreach( $regions as $region )
                      <option {{ Auth::user()->region_id == $region->id ? 'selected' : '' }} value="{{ $region->id }}">{{ $region->region_name }}</option>
                    @endforeach 
                    </select>
                    <span class='help-block' id="region_help"><strong></strong></span>
                  </div>
                  </div>             
                <div class="col-sm-4" id="state_div">
                  <div class="form-group">
                    <label for="state">District <small style="color:red;">*</small></label>
                    <select id="state" name="state" class="form-control required" required onchange="cities(this);">
                        <option value="">--- Select ---</option>
                        @if(!empty($state->id))    
                            <option {{ Auth::user()->state_id == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                        @endif    
                    </select>
                    <span class='help-block' id="state_help"><strong></strong></span>
                  </div>
                </div>
                <div class="col-sm-4" id="city_div">
                  <div class="form-group">
                    <label for="city">City <small style="color:red;">*</small></label>
                    <select id="city" name="city" class="form-control required" required>
                     @if(!empty($city->id))
                        <option {{ Auth::user()->city_id == $city->id ? 'selected' : '' }} value="{{ $city->id }}">{{ $city->city_name }}</option>
                     @endif    
                    </select>
                    <span class='help-block' id="city_help"><strong></strong></span>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="desc">Description <small style="color:blue;">(Optional)</small></label>
                    <textarea class="form-control" name="desc" rows="5" placeholder="About Yourself">{{ $lawyer->description }}</textarea>
                  </div>
                </div>
              </div>
              
              <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                  <div class="form-group">
                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                    {{--<button type="submit" name="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>--}}
                    <ul class="list-inline pull-right">
                        <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                        <li><button type="submit" class="btn btn-primary next-step">Next</button></li>
                    </ul>
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
                  <!-- Personal Information Form For lawyer -->
         
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