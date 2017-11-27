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
                <div class="form-group col-md-12">
                  <label for="useremail">Email Address</label>
                  <input id="useremail" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="userpassword">Password</label>
                  <input id="userpassword" type="password" class="form-control" name="password" required>
                  @if ($errors->has('password'))
                      <span class="help-block">
                          <strong style="color:red">{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
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
$("#loginForm").validate();
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
                <div class="form-group col-md-6">
                  <label for="cfname">First Name</label>
                {!! Form::text('f_name',  '',['id'=>'cfname','placeholder'=>'First Name','data'=>'required','class'=>'form-control','required'=>'required','minlength'=>'4']) !!}
                <?php echo $errors->first('f_name', "<li style='color:red'>:message</li>") ?>
                </div>
                <div class="form-group col-md-6">
                  <label for="clname">Last Name</label>
                    {!! Form::text('l_name', '',['id'=>'clname', 'placeholder'=>'Last Name','class' => 'form-control','data'=>'required','required'=>'required','minlength'=>'4']) !!}
                    <?php echo $errors->first('l_name', "<li style='color:red'>:message</li>") ?> 
                </div>
              </div>
              <div class="row">
                <div class="form-group col-md-12">
                  <label for="cemail">Email</label>
                  <input type="email" id="cemail" name="email_l" class="form-control" placeholder="Email" required="required" value="{{ old('email_l') }}" >
                    @if ($errors->has('email_l'))
                        <span class="help-block">
                            <strong style="color:red">{{ $errors->first('email_l') }}</strong>
                        </span>
                    @endif
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
<script>
//$("#registerForm").validate();
$("#registerForm").onsubmit(function(e){
        e.preventDefault();
        //var val = obj.value;
        //$.post('getcity', {state_id : val} ,function(city){
        //    $("#city").html(city);
        //}).success();
    });
</script>
          </div>

        </div><!-- end row  -->
      </div><!-- end container -->
    </section>
  </div>

{{-- Main contant ends --}}

@stop


