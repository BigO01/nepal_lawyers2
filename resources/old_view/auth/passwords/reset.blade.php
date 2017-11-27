@extends('public.master')
@section('title','Change Password')

@section('content')
<div class="container" style="margin-top: 5%;">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Reset Password</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection




@push('css')
     <!-- Favicon -->
        <link rel="shortcut icon" href="" type="image/x-icon" />
        <link rel="apple-touch-icon" href="">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Icons">

        <link href="{{ URL::to('public/style.css" rel="stylesheet" type="text/css') }} ">
    
        <link rel="stylesheet" type="text/css" href="{{ URL::to('public/css/semantic.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/bootstrap/css/bootstrap.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/font-awesome/css/font-awesome.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/animate/animate.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/simple-line-icons/css/simple-line-icons.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/owl.carousel/assets/owl.carousel.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/owl.carousel/assets/owl.theme.default.min.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/magnific-popup/magnific-popup.min.css') }} ">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/theme.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-elements.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-blog.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/css/theme-shop.css') }} ">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/settings.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/layers.css') }} ">
        <link rel="stylesheet" href="{{ URL::to('public/vendor/rs-plugin/css/navigation.css') }} ">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/skins/skin-law-firm.css') }} "> 

        <!-- Demo CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/demos/demo-law-firm.css') }} ">

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="{{ URL::to('public/css/custom.css') }} ">

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }} ">
<!-- /********************/ for date picker jquery -->

        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css') }} ">

@endpush

@push('js1')

    
<!-- /********************/  -->
        <!-- Head Libs -->
    <script type="text/javascript" src="{{ URL::to('public/js/jqueryform.js') }} "></script>
    <script src="{{ URL::to('public/vendor/modernizr/modernizr.min.js') }} "></script>

<!-- /********************/ for date picker jquery -->
    

<!-- /********************/ foor gallery file upload  -->

    <script src="{{ URL::to('public/js/gallery.js') }} "></script>
<!-- /********************/  -->
 <style>

</style>

@endpush

@push('js')
        <!-- Vendor -->
        <script src="{{ URL::to('public/vendor/jquery/jquery.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery.appear/jquery.appear.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery.easing/jquery.easing.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery-cookie/jquery-cookie.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/bootstrap/js/bootstrap.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/common/common.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery.validation/jquery.validation.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery.gmap/jquery.gmap.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/jquery.lazyload/jquery.lazyload.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/isotope/jquery.isotope.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/owl.carousel/owl.carousel.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/magnific-popup/jquery.magnific-popup.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/vide/vide.min.js') }} "></script>
        
        <!-- Theme Base, Components and Settings -->
        <script src="{{ URL::to('public/js/theme.js') }} "></script>
        
        <!-- Current Page Vendor and Views -->
        <script src="{{ URL::to('public/vendor/rs-plugin/js/jquery.themepunch.tools.min.js') }} "></script>
        <script src="{{ URL::to('public/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') }} "></script>

        <!-- Current Page Vendor and Views -->
        <script src="{{ URL::to('public/js/views/view.contact.js') }} "></script>

        <!-- Demo -->
        <script src="{{ URL::to('public/js/demos/demo-law-firm.js') }} "></script>  
        
        <!-- Theme Custom -->
        <script src="{{ URL::to('public/js/custom.js') }} "></script>
        
        <!-- Theme Initialization Files -->
        <script src="{{ URL::to('public/js/theme.init.js') }} "></script>

@endpush

