@extends('public.master')
@section('title','Law Firm Registration')

@push('js1')

  <script>
  $( function() {
    $( "#dor" ).datepicker({
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
              <h3 class="text-theme-colored mt-0 pt-5"> Lawfirm Information</h3>
              <hr>
              <h5 class="text-center" ><b>Profile Picture</b></h5>
              {!! Form::open(['route'=>'lawfirm_form','id'=>'lawfirmForm', 'enctype'=>'multipart/form-data']) !!}

                  <input type="hidden" name="id" value="{{ $input['id'] or old('id') }}">
                  <input type="hidden" name="register" value="{{ $input['register'] or old('register')  }}" >
                  <input type="hidden" name="lawfirmID" value="{{ $input['l_id'] }}">


        <div class="center mb-20">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-5">
                                <div class="main-img-preview">
                                    <input type="hidden" name="img" value="{{ $input['img'] or old('img') }}" >
                                        <img class="thumbnail img-preview img-responsive" src="{{ $input['img'] or URL::to('/public/images/dummy.png') }}" title="Preview Logo">
                                        <span class='help-block' id="new_img_help"><strong></strong></span>
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
                      <label for="first_name">Firm Name <small style="color:red;">*</small></label>
                      <input id="first_name" name="first_name" type="text" placeholder="Enter Firm Name" value="{{ $input['fname'] or old('first_name') }}" required="" class="form-control">
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
                  <div class="col-sm-6" id="officepn_div">
                    <div class="form-group">
                      <label for="officepn">Contact Number <small style="color:red;">*</small></label>
                      <input id="officepn" name="officepn" type="number" placeholder="Contact # +977 X XXXX XXX" required="required" class="form-control" value="{{ old('officepn') }}">
                      <span class='help-block' id="officepn_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6" id="dor_div">
                    <div class="form-group">
                      <label for="dor">Date Of Registration <small style="color:red;">*</small></label>
                      <input id="dor" class="form-control input-lg" name="dor" type="text" value="{{ old('dor') }}" placeholder="Date of Registration *" required="required" />
                      <span class='help-block' id="dor_help"><strong></strong></span>
                    </div>
                  </div>
                </div>
        <div class="row">
                  <div class="col-sm-12" id="address_div">
                    <div class="form-group">
                      <label for="address">Address<small style="color:red;">*</small></label>
                      <input id="address" name="address" class="form-control" type="text" value="{{ old('address') }}" required="required" placeholder="Enter Your Address">
                      <span class='help-block' id="address_help"><strong></strong></span>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6" id="state_div">
                    <div class="form-group">
                      <label for="state">District <small style="color:red;">*</small></label>
                      <select id="state" name="state" onchange="cities(this);" class="form-control required" required="required">
                        <option value="">Select Your District</option>
                      @foreach( $states as $state )
                        <option {{ old('state') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}
                        </option>
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
          <div class="col-sm-4 col-sm-offset-4">
            <div class="form-group">
              <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>
            </div>
          </div>
        </div>
                
            {!! Form::close() !!}

        
        
              <!-- Job Form Validation-->
              <script type="text/javascript">
//                $("#lawfirmForm").validate();
                $("#lawfirmForm").attr('novalidate','novalidate');
              </script>
            </div>
          </div>
        </div>
      </div>
    </section>      
   
{{-- Main contant ends --}}

@stop

@push('js')
        
<script type="text/javascript">

        $(document).ready(function() {
        $('#lawfirmForm').attr('novalidate','novalidate');
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
            $('#lawfirmForm').submit(function(event) {
                event.preventDefault();
                $('.has-error').removeClass('has-error');
                                $('.help-block').html('');
                // process the form
                        $.ajax({
                            type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                            url         : "{{url('/lawfirm')}}", // the url where we want to POST
                            data        : $("#lawfirmForm").serialize(),
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
