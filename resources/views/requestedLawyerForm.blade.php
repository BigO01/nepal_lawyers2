@extends('public.master')
@section('title','Lawyer Registration')


@push('js1')
 
     <!-- /********************/ for date picker jquery -->

    <script>
  $( function() {
    $( "#dob" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0"
  });
  } );
  </script>

   
@endpush
 

@section('content')


{{-- Main contant start --}} 

    <!-- Section: Registration Form -->
    <section class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-push-1">
            <div class="border-1px p-30 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> Lawyer Registration</h3>
              <hr>
              <h5 class="text-center" ><b>Profile Picture</b></h5>

                {!! Form::open(['route'=>'lawyer_request', 'id'=>'lawyerForm', 'enctype'=>'multipart/form-data']) !!}
                    <input type="hidden" name="register" value="lawyer" >

              <div class="center mb-20">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-5">
                                <div class="main-img-preview"> 
                                  <input type="hidden" name="img" value="{{ $input['img'] or old('img') }}" >
                                  <img class="thumbnail img-preview" src="{{ URL::to('/public/new/images/dummy.png') }}" alt="Preview" title="Preview">
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
                      <label for="email">Your email <small style="color:red;">*</small></label>
                      <input id="email" name="email" type="email" placeholder="Enter Your Name" value="{{ $email }}" required="" class="form-control" readonly>
                      <?php echo $errors->first('email', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>  

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="fname">Your Name <small style="color:red;">*</small></label>
                      <input id="fname" name="fname" type="text" placeholder="Enter Your Name" value="{{ old('fame') }}" required="" class="form-control">
                      <?php echo $errors->first('fame', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="license">License Number <small style="color:red;">*</small></label>
                      <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" value="{{ old('license') }}">
                      <?php echo $errors->first('license', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>

                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="dob">Date Of Birth <small style="color:red;">*</small></label>
                      <input id="dob" class="form-control input-lg" name="dob" type="text"  placeholder="Date of Birth *" required="required" value="{{ old('dob') }}" />
                       <?php echo $errors->first('dob', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="firmname">LawFirm Name <small style="color:red;">*</small></label>
                      <select id="firmname" name="firmname" class="form-control">
                        <option selected
                          value="{{ $firm->id }}" >
                             {{ $firm->first_name }} {{ $firm->last_name }}
                        </option>        
                      </select>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="password">Password <small style="color:red;">*</small></label>
                      <input id="password" name="password" type="password" placeholder="Password" required="required" class="form-control">
                      <?php echo $errors->first('password', "<li style='color:red'>:message</li>") ?> 
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="password_confirmation">Re-enter Password <small style="color:red;">*</small></label>
                      <input id="password_confirmation" class="form-control input-lg" name="password_confirmation" type="Password" placeholder="Re-enter Password" required="required" />
                      <?php echo $errors->first('password_confirmation', "<li style='color:red'>:message</li>") ?> 
                    </div>
                  </div>
                </div>

                <div class="row mt-10">
                  <div class="form-group">
                    <div class="col-md-12">
                      <div class="checkbox">
                        <label for="check">
                          <input id="check" class="checkbox" type="checkbox" name="checkBox" value="1" required="required" style="display:block;">I Accept the Nepal Lawyers <a href="#">  Terms of conditions </a> including the <a href="#"> Privacy Policy</a>
                        </label>
                        <?php echo $errors->first('checkBox', "<li style='color:red'>:message</li>") ?>  
                      </div>
                    </div>
                  </div>
                </div>
                
        <div class="row">
          <div class="col-sm-4 col-sm-offset-4">
            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
            </div>
          </div>
        </div>
                
    {!! Form::close() !!}


      
              <!-- Job Form Validation-->
              <script type="text/javascript">
                  $("#lawyerForm").validate();
              </script>

            </div>
          </div>
        </div>
      </div>
    </section>

 

{{-- End Main contant  --}}
@stop

            
@push('js')

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
