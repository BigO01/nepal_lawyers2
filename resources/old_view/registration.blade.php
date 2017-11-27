@extends('public.master')
@section('title','Registration')


@push('css')
        {{-- <!-- Favicon --> --}}
        <link rel="shortcut icon" href="#" type="image/x-icon" />
        <link rel="apple-touch-icon" href="#">

        {{-- <!-- Mobile Metas --> --}}
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        {{-- <!-- Web Fonts  --> --}}
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

       {{-- <!-- Vendor CSS --> --}}
     
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/bootstrap/css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/font-awesome/css/font-awesome.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/animate/animate.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/simple-line-icons/css/simple-line-icons.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/owl.carousel/assets/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/owl.carousel/assets/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/magnific-popup/magnific-popup.min.css') }} ">

        {{-- <!-- Theme CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-elements.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-blog.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/css/theme-shop.css') }} ">

        {{-- <!-- Current Page CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/settings.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/layers.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('/public/vendor/rs-plugin/css/navigation.css') }} ">

        {{-- <!-- Skin CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/skins/skin-law-firm.css') }} "> 

        {{-- <!-- Demo CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/demos/demo-law-firm.css') }} ">

        {{-- <!-- Theme Custom CSS --> --}}
        <link rel="stylesheet" href="{{ URL::to('/public/css/custom.css') }} ">
@endpush

@push('js1')        
        {{-- <!-- For CAPTCHA --> --}}
        <script src='https://www.google.com/recaptcha/api.js'></script>

        {{-- <!-- Head Libs --> --}}
        <script src="{{ URL::to('/public/vendor/modernizr/modernizr.min.js') }} "></script>
@endpush


@section('content')


{{-- Main contant start --}}


        <div role="main" class="main">
        
                <section class="page-header">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h1>Login</h1>
                            </div>
                        </div>
                    </div>
                </section>
                
            <div class="container">

                    <div class="row">
                        <div class="col-md-12">

                            <div class="featured-boxes">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="featured-box featured-box-primary align-left mt-xlg">
                                            <div class="box-content">
                                                <h4 class="heading-primary text-uppercase mb-md">Login</h4>

                                    {{-- <!--@@@@@@@@@@@@@@ Login Form @@@@@@@@@@@@@@@@@@@-->--}}

                                                <form id="frmSignIn" method="POST" action="{{ route('login') }}">
                                                {{ csrf_field() }}
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label>E-mail Address</label>
                                                                
                                                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <a class="pull-right" href="{{ route('password.request') }}">(Lost Password?)</a>
                                                                <label>Password</label>
                                                                <!-- <input type="password" value="" class="form-control input-lg" required> -->
                                                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color:red">{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                            <label>Captcha</label>
                                                                 {!! Recaptcha::render() !!}
                                                                 {{-- Add in validation  'g-recaptcha-response' =  'required|recaptcha', --}}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong style="color:red">Captcha Field Must Be Selected!</strong>
                                    </span>
                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <span class="remember-
                                                            box checkbox">

                                                                <label for="rememberme">
                                                                    <!-- <input type="checkbox" id="rememberme" name="rememberme" reduired >Remember Me -->
                                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                                </label>
                                                            </span>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <input type="submit" value="Login" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                                        </div>
                                                    </div>                                                       
        
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="featured-box featured-box-primary align-left mt-xlg">
{{-- This code is for flash msg --}}
    @if ( $feedback = session()->get('feedback') )
                 
        <div class="alert {!! $feedback_class = session()->get('feedback_class') !!} alert-dismissible col-lg-12" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              {{ $feedback }}
        </div>
    @endif 
{{-- This code is for flash msg till here --}}

                                            <div class="box-content">
                                                <h4 class="heading-primary text-uppercase mb-md">Register An Account</h4>
                                    
                                    {{-- <!--@@@@@@@@@@@@@@ Registration Form @@@@@@@@@@@@@@@@@@@-->--}}
                                            {!! Form::open(['route'=>'send','id'=>'frmSignUp']) !!}
                                              {{ csrf_field() }}

                                                <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <label>First Name</label>
                                                                {!! Form::text('f_name', '',['placeholder'=>'First Name','data'=>'required','class'=>'form-control input-lg','required'=>'required']) !!}
                                {{-- This is error for f_name --}}
                                                                <?php echo $errors->first('f_name', "<li style='color:red'>:message</li>") ?> 
                                                            </div>

                                                            <div class="col-md-6">
                                                                <label>Last Name</label>
                                                                {!! Form::text('l_name', '',['placeholder'=>'Last Name','class' => 'form-control input-lg','data'=>'required','required'=>'required']) !!}
                                {{-- This is error for l_name --}} 
                                                                <?php echo $errors->first('l_name', "<li style='color:red'>:message</li>") ?> 
                                                            </div>
                                                        </div>
                                                    </div>

                                {{-- This Row is for email --}}   
                                                 
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label>E-mail Address</label>
                                                                <input type="email" name="email_l" class="form-control input-lg" placeholder="Email" value="{{ old('email_l') }}" >
                                {{-- This is error for email --}}
                                                                @if ($errors->has('email_l'))
                                                                    <span class="help-block">
                                                                        <strong style="color:red">{{ $errors->first('email_l') }}</strong>
                                                                    </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row center">
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                            <h2 class="mb-none">OR</h2>
                                                            </div>
                                                            </div>
                                                            </div>
                                                    <div class="row center">
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <a href="login/facebook"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" style="background-color:#3b5998;height:45px; text-align: center;border: none; "><i class="fa fa-facebook" style="padding-right: 10px;"></i> Sign Up with Facebook</button></a>
                                                            </div>
                                                            
                                                            <div class="col-md-6">
                                                                <a href="login/google"><button type="button" class="mb-xs mt-xs mr-xs btn btn-primary" style="background-color: #d34836;height:45px; text-align: center;border: none;"><i class="fa fa-google-plus" style="padding-right: 10px;"></i> Sign Up with Google</button></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-offset-9 col-md-3 col-sm-4 col-sm-offset-4 col-xs-4 col-xs-offset-5">
                                                            <input type="submit" value="Register" class="btn btn-primary mb-xl" data-loading-text="Loading...">
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
            </div>
      

{{-- Main contant ends --}}

@stop

@push('js')
            {{-- <!-- Vendor --> --}}
        <script src="{{ URL::to('/public/vendor/jquery/jquery.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery.appear/jquery.appear.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery.easing/jquery.easing.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery-cookie/jquery-cookie.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/common/common.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery.validation/jquery.validation.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery.gmap/jquery.gmap.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/jquery.lazyload/jquery.lazyload.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/isotope/jquery.isotope.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/owl.carousel/owl.carousel.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/magnific-popup/jquery.magnific-popup.min.js') }} "></script>
        <script src="{{ URL::to('/public/vendor/vide/vide.min.js') }} "></script>
        
        {{-- <!-- Theme Base, Components and Settings --> --}}
        <script src="{{ URL::to('/public/js/theme.js') }} "></script>
        
         {{-- <!-- Theme Custom --> --}}
        <script src="{{ URL::to('/public/js/custom.js') }} "></script>
        
        {{-- <!-- Theme Initialization Files --> --}}
        <script src="{{ URL::to('/public/js/theme.init.js') }} "></script>
@endpush



