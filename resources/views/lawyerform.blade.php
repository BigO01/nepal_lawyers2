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
              <h3 class="text-theme-colored mt-0 pt-5"> Lawyer Information</h3>
              <hr>
              <h5 class="text-center" ><b>Profile Picture</b></h5>

                {!! Form::open(['route'=>'lawyer', 'id'=>'lawyerForm', 'enctype'=>'multipart/form-data']) !!}

                   <input type="hidden" name="id" value="{{ $input['id'] or old('id') }}">
                    <input type="hidden" name="register" value="{{ $input['register'] or old('register')  }}" >
                    <input type="hidden" name="lawyerID" value="{{ $input['l_id'] }}"

        <div class="center mb-20">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-5" id="img_div">
                                <div class="main-img-preview"> 
                                  <input type="hidden" name="img" value="{{ $input['img'] or old('img') }}" >
                                  <img class="thumbnail img-preview" src="{{ $input['img'] or URL::to('/public/images/dummy.png') }}" alt="Preview" title="Preview">
                                  <span class='help-block' id="img_help"><strong></strong></span>
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
                  <div class="col-sm-6" id="first_name_div">
                    <div class="form-group">
                      <label for="first_name">Name <small style="color:red;">*</small></label>
                      <input id="first_name" name="first_name" type="text" placeholder="Enter Your Name" value="{{ $input['fname'] or old('first_name') }}" required="" class="form-control">
                      <span class='help-block' id="first_name_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6" id="license_div">
                    <div class="form-group">
                      <label for="license">License Number <small style="color:red;">*</small></label>
                      <input id="license" name="license" class="form-control required" type="text" placeholder="Enter Your License Number" required="required" value="{{ old('license') }}">
                      <span class='help-block' id="license_help"><strong></strong></span>
                    </div>
                  </div>
                </div>
        <div class="row">
                  <div class="col-sm-4" id="mobile_div">
                    <div class="form-group">
                      <label for="mobile">Mobile Number <small style="color:red;">*</small></label>
                      <input id="mobile" name="mobile" type="number" placeholder="Mobile # +977 X XXXX XXX" required="required" class="form-control" value="{{ old('mobile') }}">
                      <span class='help-block' id="mobile_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="officepn">Office Number<small style="color:blue;"> (optional)</small></label>
                      <input id="officepn" name="officepn" class="form-control" type="number" placeholder="Office Phone # +977 XXX XXXX XXX" value="{{ old('officepn') }}">
                    </div>
                  </div>
          <div class="col-sm-4">
                    <div class="form-group">
                      <label for="homepn">Home Number<small style="color:blue;"> (optional)</small></label>
                      <input id="homepn" name="homepn" class="form-control" type="number" placeholder="Home Phone # +977 XXX XXXX XXX" value="{{ old('homepn') }}">
                    </div>
                  </div>
                </div>
        <div class="row">
                  <div class="col-sm-12" id="address_div">
                    <div class="form-group">
                      <label for="address">Address<small style="color:red;">*</small></label>
                      <input id="address" name="address" class="form-control" type="text" required="required" placeholder="Enter Your Address" value="{{ old('address') }}">
                      <span class='help-block' id="address_help"><strong></strong></span>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6" id="state_div">
                    <div class="form-group">
                      <label for="state">District <small style="color:red;">*</small></label>
                      <select id="state" name="state" class="form-control required" required="required" onchange="cities(this);">
                        <option value="">Select Your District</option>
                      @foreach( $states as $state )
                          <option {{ old('state') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                      @endforeach 
                      </select>
                       <span class='help-block' id="state_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6" id="city_div">
                    <div class="form-group">
                      <label for="city">City <small style="color:red;">*</small></label>
                      <select id="city" name="city" id="city" class="form-control required" required="required">
        
                      </select>
                      <span class='help-block' id="city_help"><strong></strong></span>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6" id="gender_div">
                    <div class="form-group">
                      <label for="gender">Gender <small style="color:red;">*</small></label>
                      <select id="gender" name="gender" class="form-control required" required="required">
                        <option value="">-- Select --</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>    
                      </select>
                      <span class='help-block' id="gender_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6" id="status_div">
                    <div class="form-group">
                      <label for="status">Marital Status <small style="color:red;">*</small></label>
                      <select id="status" name="status" class="form-control required" required="required">
                        <option value="">-- Select --</option>
                        <option {{ old('status') == 3 ? 'selected' : '' }} value="3">Single</option>
                        <option {{ old('status') == 2 ? 'selected' : '' }} value="2">Married</option>
                        <option {{ old('status') == 1 ? 'selected' : '' }} value="1">Divorced</option>            
                      </select>
                      <span class='help-block' id="status_help"><strong></strong></span>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6" id="dob_div">
                    <div class="form-group">
                      <label for="dob">Date Of Birth <small style="color:red;">*</small></label>
                      <input id="dob" class="form-control input-lg" name="dob" type="text"  placeholder="Date of Birth *" required="required" value="{{ old('dob') }}" />
                       <span class='help-block' id="dob_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="firmname">LawFirm Name <small style="color:blue;">(Optional)</small></label>
                      <select id="firmname" name="firmname" class="form-control">
                        <option value="">-- Select --</option>
                  @foreach( $firm_id as $fid )     
                    @foreach( $firm_name as $fname )
                      @if( $fname->id == $fid->ref_id )
                        <option {{ old('firmname') == $fname->id ? 'selected' : '' }}
                          value="{{ $fname->id }}" >
                             {{ $fname->first_name }} {{ $fname->last_name }}
                        </option>
                      @endif 
                    @endforeach
                  @endforeach           
                      </select>
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
        $('#lawyerForm').attr('novalidate','novalidate');
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

            $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
            });
            // process registration form the form
                $('#lawyerForm').submit(function(event) {
                    event.preventDefault();
                    $('.has-error').removeClass('has-error');
                                    $('.help-block').html('');
                    // process the form
                            $.ajax({
                                type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                url         : "{{url('/lawyer')}}", // the url where we want to POST
                                data        : $("#lawyerForm").serialize(),
                                dataType    : 'json', // what type of data do we expect back from the server
                                encode      : true,
            //                    contentType: "application/json",
                                success : function(data){
                                    toastr.success(data.message, 'Success!');
                                    var APP_URL = "{{ url('/') }}";
                                setTimeout(function() {
                                    window.location.replace(data.redirect);
                                }, 500);
                                },
                                error : function(data){
                                var errors = $.parseJSON(data.responseText);
                                $.each(errors,function(index, value) {
                                    toastr.error(value, 'Error!');
                                    $('#'+index+'_help').html("<strong>"+value+"</strong>");
                                    $('#'+index+'_div').addClass('has-error');
                                });
                                }
                            });
                });

});

    </script>  

  <script src="{{ URL::to('public/new/js/ajax.js') }}" ></script>
@endpush
