@extends('public.master')
@section('title','User Registration')


@push('css')        
   <!-- Favicon -->
    <link rel="shortcut icon" href="#" type="image/x-icon" />
    <link rel="apple-touch-icon" href="#">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- Web Fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Icons">
    <link href="{{ URL::to('/public/style.css') }}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/public/css/semantic.min.css') }} ">

    <link rel="stylesheet" href="{{ URL::to('/public/vendor/bootstrap/css/bootstrap.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/font-awesome/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/animate/animate.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/simple-line-icons/css/simple-line-icons.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/owl.carousel/assets/owl.carousel.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/owl.carousel/assets/owl.theme.default.min.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/magnific-popup/magnific-popup.min.css') }} ">

    <!-- Theme CSS -->
    <link rel="stylesheet" href="{{ URL::to('/public/css/theme.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/css/theme-elements.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/css/theme-blog.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/css/theme-shop.css') }} ">

    <!-- Current Page CSS -->
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/settings.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/layers.css') }} ">
    <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/navigation.css') }} ">

    <!-- Skin CSS -->
    <link rel="stylesheet" href="{{ URL::to('/public/css/skins/skin-law-firm.css') }} ">

    <!-- Demo CSS -->
    <link rel="stylesheet" href="{{ URL::to('/public/css/demos/demo-law-firm.css') }} ">

    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ URL::to('/public/css/custom.css') }} ">

    

@endpush


@section('content')

{{-- Main contant start --}}
            <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
 
 <div role="main" class="main">
            
     <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Member Form</h1>
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
                               {!! Form::open(['route'=>'member', 'enctype'=>'multipart/form-data']) !!}
                                
                                
                                 <input type="hidden" name="id" value="{{ $input['id'] or old('id')  }}">
                                 <input type="hidden" name="register" value="{{ $input['register'] or old('register')  }}" >
                                    <div class="section-holder"></div>
                                        <div class="section current center">
                                            <h2 class="heading-primary text-uppercase mb-md center">Member Information</h2>
                                            <div class="row">
                                                <label>
                                                    <div class="col-md-12">
                                                        <h4 class=" mb-none"> Profile Picture</h4>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-2 col-md-offset-5">
                                                        <div class="main-img-preview">
                                                            <input type="hidden" name="img" value="{{ $input['img'] or old('img') }}" > {{-- URL::to('/public/images/dummy.png') --}}
                                                            <img class="thumbnail img-preview img-responsive" src="{{ $input['img'] or old('img') }}" title="Preview Logo">
                                                            <?php echo $errors->first('new_img', "<li style='color:red'>:message</li>") ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4 col-md-offset-4">
                                                        <div class="input-group">
                                                            <input id="fakeUploadLogo" class="form-control fake-shadow" placeholder="Choose File" readonly>
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
                                                    <div class="col-md-6">
                                                        <input class="form-control input-lg" type="text" name="first_name" placeholder="First Name" value="{{ $input['fname'] or old('first_name') }}">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <input class="form-control input-lg" name="last_name" type="text" placeholder="Last Name" value="{{ $input['lname'] or old('last_name') }}">
                                                        <?php echo $errors->first('last_name', "<li style='color:red'>:message</li>") ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-4">
                                                        <input class="form-control input-lg" name="mobile" type="tel" pattern='[\+]\d{3}\d{1}\d{4}\d{3}' value="{{ old('mobile') }}" placeholder="Mobile # +977 X XXXX XXX" required>
                                                        <?php echo $errors->first('mobile', "<li style='color:red'>:message</li>") ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input class="form-control input-lg" name="homepn" type="tel" pattern='[\+]\d{3}\d{3}\d{4}\d{3}' value="{{ old('homepn') }}" placeholder="Home Phone # +977 XXX XXXX XXX"> 
                                                        <?php echo $errors->first('homepn', "<li style='color:red'>:message</li>") ?>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <input class="form-control input-lg" name="officepn" type="tel" pattern='[\+]\d{3}\d{3}\d{4}\d{3}' value="{{ old('officepn') }}" placeholder="Office Phone # +977 XXX XXXX XXX">
                                                        <?php echo $errors->first('officepn', "<li style='color:red'>:message</li>") ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12"> 
                                                        <input class="form-control input-lg" name="address" value="{{ old('address') }}" type="text" placeholder="Address" data="required" />
                                                        <?php echo $errors->first('address', "<li style='color:red'>:message</li>") ?>
                                                    </div> 
                                                </div> 
                                            </div> 
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                         <select class="form-control input-lg" name="state" onchange="cities(this);" required>
                                                             <option value="">Select Your State</option>
                                                        @foreach( $states as $state )
                                                             <option {{ old('state') == $state->id ? 'selected' : '' }} value="{{ $state->id }}">{{ $state->state_name }}</option>
                                                        @endforeach 
                                                         </select>
                                                         <?php echo $errors->first('state', "<li style='color:red'>:message</li>") ?>
                                                    </div>
            
                                                    <div class="col-md-6">
                                                         <select class="form-control input-lg" name="city" id="city" required>
                                                             <option value="">Select Your City</option>
                                                        
                                                         </select>
                                                         <?php echo $errors->first('city', "<li style='color:red'>:message</li>") ?>
                                                    </div> 
                                                </div> 
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                         <select class="form-control input-lg" name="gender" required>
                                                             <option value="">Select a Gender</option>
                                                             <option value="1">Male</option>
                                                             <option value="0">Female</option>
                                                         </select>
                                                         <?php echo $errors->first('gender', "<li style='color:red'>:message</li>") ?>
                                                    </div>
                                                </div>
                                            </div>
                                            
<div id="getRequestedData"></div>


                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <input class="next btn btn-lg btn-primary pull-right" type="submit" value="Submit">
                                                    </div>
                                                </div>
                                            </div>           
                                        </div>
                                    {!! Form::close() !!}
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
            
            <!--////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
          
 </div>      
            
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
    <script src="{{ URL::to('public/js/ajax.js') }}" ></script>    
@endpush