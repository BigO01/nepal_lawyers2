@extends('public.master')
@section('title','User Registration')


@push('css')        

@endpush


@section('content')

{{-- Main contant start --}}

     <!-- Section: Registration Form -->
    <section class="divider">
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-md-push-1">
            <div class="border-1px p-30 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> MEMBER INFORMATION</h3>
              <hr>
              <h5 class="text-center" ><b>Profile Picture</b></h5>
              {!! Form::open(['route'=>'member','id'=>'memberForm','enctype'=>'multipart/form-data']) !!}
                <input type="hidden" name="id" value="{{ $input['id'] or old('id')  }}">
                <input type="hidden" name="register" value="{{ $input['register'] or old('register')  }}" >

                <div class="center mb-20">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-2 col-md-offset-5">
                                <div class="main-img-preview">         
                                    <input type="hidden" name="img" value="{{ $input['img'] or old('img') }}" >
                                    <img class="thumbnail img-preview img-responsive" src="{{ $input['img'] or old('img') }}" title="Preview Logo">
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
                      <label for="first_name">First Name <small style="color:red;">*</small></label>
                      <input id="first_name" name="first_name" type="text" placeholder="Enter First Name" required="" class="form-control" value="{{ $input['fname'] or old('first_name') }}">
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="last_name">Last Name <small style="color:blue;"> (optional)</small></label>
                      <input id="last_name" name="last_name" type="text" placeholder="Enter Last Name" class="form-control" value="{{ $input['lname'] or old('last_name') }}">
                      <?php echo $errors->first('last_name', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="mobile">Mobile Number <small style="color:red;">*</small></label>
                      <input id="mobile" name="mobile" type="text" placeholder="Mobile # +977 X XXXX XXX" required="" class="form-control required" value="{{ old('mobile') }}">
                      <?php echo $errors->first('mobile', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="officepn">Office Number<small style="color:blue;"> (optional)</small></label>
                      <input id="officepn" name="officepn" class="form-control" type="text" placeholder="Office Phone # +977 XXX XXXX XXX" value="{{ old('officepn') }}">
                      <?php echo $errors->first('officepn', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="homepn">Home Number<small style="color:blue;"> (optional)</small></label>
                      <input id="homepn" name="homepn" class="form-control " type="text" placeholder="Home Phone # +977 XXX XXXX XXX" value="{{ old('homepn') }}">
                       <?php echo $errors->first('homepn', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="address">Address<small style="color:blue;"> (optional)</small></label>
                      <input id="address" name="address" class="form-control" type="text" placeholder="Enter Your Address" value="{{ old('address') }}">
                      <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="state">District <small style="color:red;">*</small></label>
                      <select id="state" name="state" class="form-control required" onchange="cities(this);">
                        <option value="">Select Your District</option>
                    @foreach( $states as $state )
                        <option {{ old('state') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                    @endforeach
                      </select>
                      <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label for="city">City <small style="color:red;">*</small></label>
                      <select id="city" name="city" id="city" class="form-control required">
                      </select>
                      <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
                <div class="row">               
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="gender">Gender <small style="color:red;">*</small></label>
                      <select id="gender" name="gender" class="form-control required">
                        <option value="">Select Your Gender</option>
                        <option value="1">Male</option>
                        <option value="0">Female</option>    
                      </select>
                      <?php echo $errors->first('gender', "<li style='color:red'>:message</li>") ?>
                    </div>
                  </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-4">
                        <div class="form-group">
                          <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                          <button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10"  style="font-size:16px;">Submit</button>
                        </div>
                    </div>
                </div>
                
            {!! Form::close() !!}
<script>
$("#memberForm").validate();
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