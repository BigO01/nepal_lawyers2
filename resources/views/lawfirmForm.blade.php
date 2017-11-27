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
              {!! Form::open(['route'=>'lawfirm','id'=>'lawfirmForm', 'enctype'=>'multipart/form-data']) !!}

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
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="first_name">Firm Name <small style="color:red;">*</small></label>
                      <input id="first_name" name="first_name" type="text" placeholder="Enter Firm Name" value="{{ $input['fname'] or old('first_name') }}" required="" class="form-control">
                      <?php echo $errors->first('first_name', "<li style='color:red'>:message</li>") ?> 
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
                      <label for="officepn">Contact Number <small style="color:red;">*</small></label>
                      <input id="officepn" name="officepn" type="number" placeholder="Contact # +977 X XXXX XXX" required="required" class="form-control" value="{{ old('officepn') }}">
                      <?php echo $errors->first('officepn', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="dor">Date Of Registration <small style="color:red;">*</small></label>
                      <input id="dor" class="form-control input-lg" name="dor" type="text" value="{{ old('dor') }}" placeholder="Date of Registration *" required="required" />
                      <?php echo $errors->first('dor', "<li style='color:red'>:message</li>") ?> 
                    </div>
                  </div>
                </div>
        <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="address">Address<small style="color:red;">*</small></label>
                      <input id="address" name="address" class="form-control" type="text" value="{{ old('address') }}" required="required" placeholder="Enter Your Address">
                      <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="state">District <small style="color:red;">*</small></label>
                      <select id="state" name="state" onchange="cities(this);" class="form-control required" required="required">
                        <option value="">Select Your District</option>
                      @foreach( $states as $state )
                        <option {{ old('state') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}
                        </option>
                      @endforeach
                      </select>
                      <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="city">City <small style="color:red;">*</small></label>
                      <select id="city" name="city" id="city" class="form-control required" required="required">
                        <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
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
                $("#lawfirmForm").validate();
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
