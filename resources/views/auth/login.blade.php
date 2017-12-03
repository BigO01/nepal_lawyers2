@extends('public.master')
@section('title','Registration')
@section('login',"class=active")

@section('content')

{{-- This code is for flash msg --}}

     <?php
        $feedback = session()->get('feedback');
     if ( !empty($feedback) ){     
        echo "<script type='text/javascript'>
                var delayMillis = 3000;
                setTimeout(function() {
                    alert('$feedback');
                  }, delayMillis);
         </script>";
      }
     ?>
    
{{-- This code is for flash msg till here --}}


{{-- Main contant start --}}
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
    <section class="inner-header divider layer-overlay overlay-dark" data-bg-img="http://placehold.it/1920x1280">
      <div class="container pt-30 pb-30">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row"> 
            <div class="col-md-6 col-md-offset-3 text-center">
              <h1 class=" font-36" style="margin-top: 0px; margin-bottom: 0px; color:white;">Login/Register</h1>
            </div>
          </div>
        </div>
      </div>      
    </section>

    <section>
      <div class="container">
        <div class="row">

{{-- Login form --}}  

          <div class="col-md-4 mb-40">
            <h4 class="text-gray mt-0 pt-5"> Login</h4>
            <hr>
            <p>Enter Your Email Address And Password Please.</p>           
            <form name="login-form" id="loginForm" method="POST" class="clearfix" action="{{ route('login') }}">
                  {{ csrf_field() }}
              <div class="row">
                <div class="form-group col-md-12" id="email_div">
                  <label for="useremail">Email Address</label>
                  <input id="useremail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                    <span class='help-block' id="email_help"><strong></strong></span>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12" id="password_div">
                  <label for="userpassword">Password</label>
                  <input id="userpassword" type="password" class="form-control" name="password" required>
                        <span class='help-block' id="password_help"><strong></strong></span>
                </div>
              </div>
              <?php //print_r($errors); ?>
              {{--<div class="row">--}}
                {{--<div class="form-group col-md-12">--}}
                  {{--<label for="form_password">Captcha</label>--}}
                       {{--{!! Recaptcha::render() !!}--}}
                      {{--@if ($errors->has('g-recaptcha-response'))--}}
                          {{--<span class="help-block">--}}
                              {{--<strong style="color:red">Captcha Field Must Be Selected!</strong>--}}
                          {{--</span>--}}
                      {{--@endif--}}
                {{--</div>--}}
              {{--</div>--}}
              <div class="clear text-center pull-right">
                <a class="text-theme-colored font-weight-600 font-12" href="{{ route('password.request') }}">Forgot Your Password?</a>
              </div><br>
              <div class="checkbox pull-left mt-15">
                <label for="form_checkbox">
                  <input id="form_checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me 
                </label>
              </div>
              <div class="form-group pull-right mt-10">
                <button type="submit" class="btn btn-dark btn-sm">Login</button>
              </div>
            </form>
<script>
//$("#loginForm").validate();
</script>
          </div>

{{-- Regisration form --}}

          <div class="col-md-7 col-md-offset-1" >

            {!! Form::open(['route'=>'send','id'=>'registerForm','class'=>'register-form cmxform','name'=>'reg-form']) !!}
                {{ csrf_field() }}
              <div class="icon-box mb-0 p-0">
                <h4 class="text-gray pt-10 mt-0 mb-0">Registration Form</h4>
              </div>
              <hr>
              <p class="text-gray">Give Your Name And Email for Registration OR Register With Your Facebook/Google Account.</p>
              <div class="row">
                <div class="form-group col-md-6" id="f_name_div">
                  <label for="cfname">First Name</label>
                {!! Form::text('f_name',  '',['id'=>'cfname','placeholder'=>'First Name','data'=>'required','class'=>'form-control','required'=>'required','minlength'=>'4']) !!}
                <span class='help-block' id="f_name_help"><strong></strong></span>
                </div>
                <div class="form-group col-md-6" id="l_name_div">
                  <label for="clname">Last Name</label>
                    {!! Form::text('l_name', '',['id'=>'clname', 'placeholder'=>'Last Name','class' => 'form-control','data'=>'required','required'=>'required','minlength'=>'4']) !!}
                    <span class='help-block' id="l_name_help"><strong></strong></span>
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12" id="email_l_div">
                  <label for="cemail">Email</label>
                  <input type="email" id="cemail" name="email_l" class="form-control" placeholder="Email" required="required" value="{{ old('email_l') }}" >
                    <span class='help-block' id="email_l_help"><strong></strong></span>
                </div>
              </div>
              <div class="form-group col-md-6 col-md-offset-3">
                <button class="btn btn-dark btn-lg btn-block mt-15" type="submit">Register Now</button>
              </div>
              <div class="col-sm-12 text-center">  
                <h2 class="text-center mt-0">OR</h2>
              </div>
              <div class="row mt-30">
                <div class="form-group col-md-6">
                  <a class="btn btn-dark btn-lg btn-block no-border " href="login/facebook" data-bg-color="#3b5998">Register with facebook</a>
                </div>
                <div class="form-group col-md-6">
                  <a class="btn btn-dark btn-lg btn-block no-border" href="login/google" data-bg-color="#d34836">Register with google</a>
                </div>
              </div>
            {!! Form::close() !!}
          </div>

        </div><!-- end row  -->
      </div><!-- end container -->
    </section>
  </div>

{{-- Main contant ends --}}

@stop

@push('js')
<script>
//$("#registerForm").validate();
$(document).ready(function() {
$('#registerForm').attr('novalidate','novalidate');
$('#loginForm').attr('novalidate','novalidate');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
});
    // process registration form the form
    $('#registerForm').submit(function(event) {
        event.preventDefault();
        $('.has-error').removeClass('has-error');
                        $('.help-block').html('');
        // process the form
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'send', // the url where we want to POST
                    data        : $("#registerForm").serialize(),
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode      : true,
//                    contentType: "application/json",
                    success : function(data){
                        toastr.success(data.message, 'Success!');
                        $('#registerForm').find("input[type=text], input[type=email]").val("");
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

// process login form the form
    $('#loginForm').submit(function(event) {
        event.preventDefault();
        $('.has-error').removeClass('has-error');
                        $('.help-block').html('');
        // process the form
                $.ajax({
                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                    url         : 'login', // the url where we want to POST
                    data        : $("#loginForm").serialize(),
                    dataType    : 'json', // what type of data do we expect back from the server
                    encode      : true,
//                    contentType: "application/json",
                    success : function(data){
//                        toastr.success(data.message, 'Success!');
//                        $('#registerForm').find("input[type=text], input[type=email]").val("");
                    toastr.success(data.message, 'Success!');
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
@endpush


