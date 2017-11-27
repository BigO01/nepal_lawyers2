<!DOCTYPE html>

<html  lang="en">

<head>

<!-- Meta Tags -->

<meta charset="utf-8">

<meta name="csrf-token" content="{{ csrf_token() }}" />

<meta name="viewport" content="width=device-width,initial-scale=1.0"/>

<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<meta name="description" content="{!! $web_info->description !!}" />

<meta name="keywords" content="{{ $web_info->keywords }}" />

<meta name="author" content="Nepal Lawyer" />

<!-- Page Title -->
<title>{{ $web_info->title }} : @yield('title')</title>

<!-- Favicon and Touch Icons -->

<link href="{{ URL::to('public/webimages/').'/'.$web_info->favicon }}" rel="shortcut icon" type="image/png">

<link href="{{ URL::to('public/new/images/apple-touch-icon.png') }}" rel="apple-touch-icon">

<link href="{{ URL::to('public/new/images/apple-touch-icon-72x72.png') }}" rel="apple-touch-icon" sizes="72x72">

<link href="{{ URL::to('public/new/images/apple-touch-icon-114x114.png') }}" rel="apple-touch-icon" sizes="114x114">

<link href="{{ URL::to('public/new/images/apple-touch-icon-144x144.png') }}" rel="apple-touch-icon" sizes="144x144">

<!-- Stylesheet -->

<link href="{{ URL::to('public/new/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ URL::to('public/new/css/jquery-ui.min.css') }}" rel="stylesheet" type="text/css">

<link href="{{ URL::to('public/new/css/animate.css') }}" rel="stylesheet" type="text/css">

<link href="{{ URL::to('public/new/css/css-plugin-collections.css') }}" rel="stylesheet"/>

<!-- CSS | menuzord megamenu skins -->

<link id="menuzord-menu-skins" href="{{ URL::to('public/new/css/menuzord-skins/menuzord-bottom-trace.css') }}" rel="stylesheet"/>

<!-- CSS | Main style file -->

<link href="{{ URL::to('public/new/css/style-main.css') }}" rel="stylesheet" type="text/css">

<!-- CSS | Theme Color -->

<link href="{{ URL::to('public/new/css/colors/theme-skin-orange.css') }}" rel="stylesheet" type="text/css">

<!-- CSS | Preloader Styles -->

<link href="{{ URL::to('public/new/css/preloader.css') }}" rel="stylesheet" type="text/css">

<!-- CSS | Custom Margin Padding Collection -->

<link href="{{ URL::to('public/new/css/custom-bootstrap-margin-padding.css') }}" rel="stylesheet" type="text/css">

<!-- CSS | Responsive media queries -->

<link href="{{ URL::to('public/new/css/responsive.css') }}" rel="stylesheet" type="text/css">

<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->

<link href="{{ URL::to('public/new/css/style.css') }}" rel="stylesheet" type="text/css">

<!-- external javascripts -->

<script src="{{ URL::to('public/new/js/jquery-2.2.0.min.js') }}"></script>

<script src="{{ URL::to('public/new/js/jquery-ui.min.js') }}"></script>

<script src="{{ URL::to('public/new/js/bootstrap.min.js') }}"></script>

<!-- JS | jquery plugin collection for this theme -->

<script src="{{ URL::to('public/new/js/jquery-plugin-collection.js') }}"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

<!--[if lt IE 9]>

<![endif]-->
 <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
  <script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>


<style>
/* Google API items hidden */
.goog-te-gadget-icon{
  display: none;
}
.goog-te-banner-frame.skiptranslate{
  display:none !important;
}
body[style]{
    background-image: none;
    position: none !important;
    min-height: 0% !important; 
    top: 0px !important;
}




    #img_container {
        position:relative;
    }

    .danbutton {

        cursor: pointer;
        position: absolute;
        bottom: 10px;
        right: 10px;
        width: 100px;
        height: 15px;
        /*position: fixed;*/
        top: 10px;
        z-index: 11;
    }

</style>
<script>
    $(document).ready( function() {
    $("#closeButton").click(function () {
        $("#sheet").css("display", "none");
    });
  $("#closeButton1").click(function () {
            $("#Appointment_Success").css("display", "none");
        });
    });

</script>

    @stack('css')
    @stack('js1')
    

</head>

<!-- Header banner -->

@if(!empty($web_info->ad_banner))
  
    <div id="sheet">
      <i id="closeButton" class="fa fa-close pull-right danbutton"> Close frame</i>
      <a href="#" >
        <img id="img_container" class="banner" src="{{ URL::to('public/webimages/').'/'.$web_info->ad_banner }}">
      </a>
     </div>
@endif
<!-- Header banner -->

<body class="boxed-layout bg-gray-lightgray pt-0 pb-0 p-sm-0">

  <div class="body-overlay"></div>

  <div id="side-panel" class="dark" data-bg-img="http://placehold.it/1920x600">
  <div class="side-panel-wrap" style="background-color: white;">
    <div id="side-panel-trigger-close" class="side-panel-trigger">
      <a href="#"><i class="icon_close font-30"></i></a>
    </div>

    @if(!Auth::check())
      <div class="row">
        <div class="col-sm-12 text-center">
          <a href="{{ route('login') }}">Login</a>
          <span style="color:black;">|</span>
          <a href="{{ route('login') }}">Register</a>
        </div>
      </div>
      <hr>
    @endif  

      <div class="row mb-20"> 
        <div clas="col-sm-12" style="text-align: center;">
          <button href="#" class="btn btn-sm btn-info hvr-sweep-to-top" data-toggle="modal" data-target="#myModal">Make An Appointment</button>
        </div>
      </div>

      <a href="{{ URL::to('/') }}">
        <img alt="logo" src="{{ URL::to('public/webimages/').'/'.$web_info->logo }}">
      </a>
      <div class="side-panel-nav mt-30">
        <div class="widget no-border">
          <nav>
            <ul class=" nav nav-list">

              <li @yield('home')>
                <a href="{{ URL::to('/') }}">Home</a>
              </li>

              <li @yield('lawyer')>
                <a href="{{ URL::to('/findlawyer') }}">Find Lawyer </a>
              </li>

              <li @yield('about')>
                <a href="{{ URL::to('/about') }}">About Us </a>
              </li>

              <li @yield('contact')>
                <a href="{{ URL::to('/contact') }}">Contact Us </a>
              </li>

              <li @yield('faq')>
                <a href="{{ URL::to('faq') }}">FAQ </a>
              </li>

              <li @yield('questions')>
                <a href="{{ URL::to('questions') }}">Question Board </a>
              </li>

              <li @yield('blog')>
                <a href="{{ URL::to('/findlawyer') }}">Blog</a>
              </li>

            </ul>
          </nav>
        </div>
      </div>

      <div class="clearfix"></div>
        <div class="side-panel-widget mt-30">
          <div class="widget no-border">
            <ul>
              <li class="font-14 mb-5"> 
                <i class="fa fa-phone text-theme-colored"></i> 
                <a href="#" class="text-gray"> {{ $web_info->contact_number }}</a>
              </li>
              <li class="font-14 mb-5"> <i class="fa fa-envelope-o text-theme-colored"></i> <a href="#" class="text-gray"> {{ $web_info->email }}</a> </li>

          </ul>
        </div>

            <div class="widget">

                <ul class="social-icons icon-dark icon-theme-colored icon-sm">

                    <li><a href="{{ $web_info->google }}"><i class="fa fa-google-plus"></i></a></li>

                    <li><a href="{{ $web_info->facebook }}"><i class="fa fa-facebook"></i></a></li>

                    <li><a href="{{ $web_info->twitter }}"><i class="fa fa-twitter"></i></a></li>

                    <li><a href="{{ $web_info->li }}"><i class="fa fa-linkedin"></i></a></li>

                </ul>

            </div>

            <p>{{ $web_info->copyright }}</p>

        </div>

    </div>

</div>


<div id="wrapper" class="clearfix">

    <!-- preloader -->

  <div id="preloader">
    <div id="spinner">
      <img src="{{ URL::to('public/new/images/preloaders/1.gif') }}" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">
      Disable Preloader
    </div>
  </div>

    <!-- Header -->

    <header id="header" class="header">
        <div class="header-top bg-theme-colored sm-text-center">
            <div class="container">
                <div class="row">

                    <div class="col-lg-6 col-md-5" style="padding-left:0px;">

                        <div class="widget no-border m-0" style="display:inline-block;">

                            <ul class="list-inline sm-text-center mt-5 mb-sm-15">

                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-white"></i> <a class="text-white" href="#">Call us at {{ $web_info->contact_number }}</a> </li>

                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#">{{ $web_info->email }}</a> </li>
                                
                            </ul>

                        </div>
            <div id="google_translate_element" style="display:inline-flex;"></div>
                    </div>

                    <div class="col-lg-6 col-md-7">

                        <div class="widget no-border m-0">

                            <a class="bg-white p-5 font-11 pl-10 pr-10 mt-5 pull-right sm-pull-none" href="#" data-toggle="modal" data-target="#myModal">Make An Appointment</a>
<!-- Modal -->

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                <div class="modal-dialog" role="document">

                                    <div class="modal-content">

                                        <div class="border-1px p-25">

                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>

                                            <h4 class="text-theme-colored text-uppercase m-0">Make an Appointment</h4>

                                            <div class="line-bottom mb-30"></div>

                                            <p>Lorem ipsum dolor sit amet, consectetur elit.</p>

                                            <!-- Appointment Form -->

                      {!! Form::open(['route'=>'SetAppointment', 'method'=>'post', 'id'=>'popup_appointment_form', 'class'=>'form-transparent form-line','name'=>'popup_appointment_form', 'files'=>'true']) !!}
                                                    {{ csrf_field() }}

                                                <div class="row">

                                                    <div class="col-sm-12">

                                                        <div class="form-group mb-10">

                                                            <input id="form_name" name="user_name" class="form-control" style="color:grey; " type="text" required="" placeholder="Enter Name" aria-required="true" value="@if(Auth::check()){{Auth::user()->first_name}} @endif" @if(Auth::check()) readonly @endif>

                                                        </div>

                                                    </div>

                                                    <div class="col-sm-12">

                                                        <div class="form-group mb-10">
                              <input type="hidden" name="user_id" value="@if(Auth::check()){{Auth::user()->id}} @endif">
                                                            <input id="form_email" name="form_email" class="form-control required email" style="color:grey; " type="email" placeholder="Enter Email" aria-required="true" value="@if(Auth::check()){{Auth::user()->email}} @endif" @if(Auth::check()) readonly @endif>

                                                        </div>

                                                    </div>

                                                    <div class="col-sm-12">

                                                        <div class="form-group mb-10">

                                                           <input id="form_appontment_date" name="form_appontment_date" class="form-control required date" style="color:grey; "  type="text" placeholder="Appoinment Date" aria-required="true">

                                                        </div>

                                                    </div>

                                                    <div class="col-sm-12">

                                                        <div class="form-group mb-10">

                                                           <select class="form-control" name="type" id="type" required style="color:grey; ">
                                                      <option value="">Appointment Type</option>
                                                      <option value="phone">By Phone</option>
                                                      <option value="email">By Email</option>
                                                      <option value="skype">By Video Call</option>
                                                      <option value="meeting">By Meeting</option>
                                                    </select>

                                                        </div>

                                                    </div>


                                                </div>

                                                <div class="form-group mb-10">

                                                    <textarea id="form_message" name="form_message" class="form-control required" style="color:grey; " placeholder="Enter Message" rows="5" aria-required="true"></textarea>

                                                </div>

                                                <div class="form-group mb-0 mt-20">

                                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">        
                          @if(Auth::check())      
            <button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">Submit</button>
@else
            <a href="{{ route('login') }}" class="btn btn-dark btn-theme-colored">Submit</a>
            <p class="mt-10"><span><span style="color:red">* </span>Please login first!</span></p>
@endif 
                          <!--<button type="submit" class="btn btn-dark btn-theme-colored" data-loading-text="Please wait...">SEND TO LAWYasdfR</button>-->

                                                </div>
                      {!! Form::close() !!}
                                           <!-- </form>-->



                                            <!-- Appointment Form Validation-->

                                            <script type="text/javascript">

                                                $("#popup_appointment_form").validate({});
                         $(function () {
                                                    $('#form_appontment_date').datepicker();
                                                });
                                            
                      </script>

                                        </div>

                                    </div>

                                </div>

                            </div>
{{-- If user Not login --}}        
  @if(!Auth::check())        
                            <a class="p-5 font-14 pr-10 pull-right sm-pull-none" href="{{ route('login') }}" style="color:white; margin-top:2px;">Login | Register</a>
  @endif

{{-- If user is login --}}        
  @if(Auth::check())  

          <div data-example-id="split-button-dropdown" class="p-5 font-14 pr-10 pull-right sm-pull-none">
            <div class="btn-group">
              <button class="btn btn-default btn-sm" type="button"><i class="fa fa-user" ></i><span>&nbsp {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span></button>
              <button aria-expanded="false" aria-haspopup="true" data-toggle="dropdown" class="btn btn-sm btn-default dropdown-toggle" type="button">
               <span class="caret"></span> <span class="sr-only">Toggle Dropdown</span> </button>
              <ul class="dropdown-menu">
                <li><a href="{{ url('/setting') }}">Setting</a></li>
              @if( Auth::user()->role == 'lawyer' OR Auth::user()->role == 'lawfirm' )
                  <li><a href="{{ url('/profile') }}">My Profile</a></li>
              @endif
                <li class="divider" role="separator"></li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </li>
              </ul>
            </div> 
          </div>
@endif
                            <ul class="social-icons icon-sm sm-text-center pull-right sm-pull-none mt-sm-15">
                                <li><a href="{{ $web_info->facebook }}"><i class="fa fa-facebook text-white"></i></a></li>
                                <li><a href="{{ $web_info->twitter }}"><i class="fa fa-twitter text-white"></i></a></li>
                                <li><a href="{{ $web_info->google }}"><i class="fa fa-google-plus text-white"></i></a></li>
                                <li><a href="{{ $web_info->li }}"><i class="fa fa-linkedin text-white"></i></a></li>
                            </ul>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
@if(Session::has('Appointment_Success'))
            <div id="Appointment_Success" class="alert alert-success"> <span class="glyphicon glyphicon-ok"></span><em> {!! session('Appointment_Success') !!}</em><span id="closeButton1" style="cursor:pointer;" class="fa fa-close pull-right"></span></div>
        @endif

<!-- <li>
                      <div id="google_translate_element"></div>

<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
}
</script>

<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>                   
               
                    </li> -->

        <div class="header-nav">

            <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">

                <div class="container">



                    <nav>

                        <div id="menuzord-right" class="menuzord red"> <a class="menuzord-brand" href="{{ URL::to('/') }}"><img style="margin-top: -5px;" src="{{ URL::to('public/webimages/').'/'.$web_info->logo }}" alt="logo"></a>

                            <div id="side-panel-trigger" class="side-panel-trigger"><a href="#"><i class="fa fa-bars font-24 text-gray"></i></a></div>

                            <ul class="menuzord-menu">

                                <li @yield('home')><a href="{{ URL::to('/') }}">Home</a>



                                </li>

                                <li @yield('lawyer')><a href="{{ URL::to('/findlawyer') }}">Find A Lawyer</a>

                                <li @yield('blog')><a href="{{ URL::to('/blog') }}">Blog</a>

                                </li>

                                <li @yield('about') ><a href="{{ URL::to('/about') }}">About Us </a>

                                </li>

                                <li  @yield('contact') ><a href="{{ URL::to('/contact') }}">Contact Us </a>

                                </li>

                                <li @yield('faq')> <a href="{{ URL::to('faq') }}">FAQ </a>
                                  
                                </li>

                                <li @yield('questions')><a href="{{ URL::to('questions') }}">Question Board </a>
              
                                </li>

                                <li> <!-- Button trigger modal -->
                                    <a class="search-color" href="#" data-toggle="modal" data-target="#myModal1"> <i class="icon_search search-color"></i>Search</a>

                                </li>

                                    <!-- Modal -->

                                    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

                                        <div class="modal-dialog modal-lg margin-model" role="document">

                                            <div class="modal-content" >

                                                <div class="modal-header">

                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                                                    <h4 class="modal-title" style="text-align: center"id="myModalLabel"></h4>

                                                </div>

                                                <div class="modal-body">

                                                    <div class="row ">

                                                        <div class="col-md-12 mb-10" >



                                                            <div class="  p-45 "  style="text-align: center; height: auto !important; ">



                                                                <h2>Hi, How Can We Help You?</h2>



                                                                {!! Form::open(['route'=>'search1','class'=>'form-inline']) !!}

                                                
                                                                        <div class="row">
                                                                          
                                                                            <div class="col-lg-3 p-10">
                                                                              <select name="city" class="selectpicker  form-control btnSize" data-live-search="true">
                                                                               <option value="">Search By City</option>
                                                                            @foreach( $cities as $city)  
                                                                               <option value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                                            @endforeach 
                                                                              </select>
                                                                            </div>

                                                                            <div class="col-lg-3 p-10">
                                                                              <select name="name" class="selectpicker  form-control btnSize" data-live-search="true">
                                                                               <option value="">Search By Name</option>
                                                                            @foreach( $usersName as $name)  
                                                                               <option value="{{ $name->first_name }}">{{ $name->first_name }}{{ $name->last_name }}</option>
                                                                            @endforeach 
                                                                              </select>
                                                                            </div>

                                                                            <div class="col-lg-3 p-10">
                                                                              <select name="area" class="selectpicker  form-control btnSize" data-live-search="true">
                                                                               <option value="">Search By Practice Area</option>
                                                                            @foreach( $expertises as $exp)  
                                                                               <option value="{{ $exp->id }}">{{ $exp->expertise_name }}</option>
                                                                            @endforeach 
                                                                              </select>
                                                                            </div>

                                                                            <div class="col-lg-3 p-10">
                                                                              <button type="submit" class="form-control form-control-custom btn btn-info search-focus  " > <i class=" icon_search"></i> Search</button>
                                                                              <a href="{{ URL::to('/findlawyer') }}" class="search-color">Advance Search</a>         
                                                                            </div>

                                                                          <!-- </div> -->  
                                                                        </div>
                                                                {!! Form::close() !!}

                                                            </div>





                                                        </div>



                                                    </div>

                                                </div>

                                                <div class="modal-footer pt-20 pb-20"> <h4 class="font-11 m-0 text-center"></h4></div>

                                        </div>
                                        </div>
                                    </div>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>

    </header>


{{-- Main content start --}}
<!-- Start main-content -->
<div class="main-content">


        @section('content')

        @show

</div>
<!-- End main content -->

{{-- Main content End --}}

</div> <!-- End wraper -->

  <!-- Footer -->
 <footer id="footer" class="footer pb-0 bg-lighter">
    <div class="container pb-20">
      <div class="row">
        <div class="col-sm-6 col-md-3 custom-center">

            <a href="index.html"><div class="widget "> <img  alt="" src="{{ URL::to('public/webimages/').'/'.$web_info->footer_logo }}"></a>
            <p class="font-12 mt-20 mb-10">{{ str_limit($web_info->about, 365, ' ...') }}</p>
          <div class="custom-center">
            <a class="btn btn-default btn-transparent btn-xs btn-flat mt-15 " style="color: grey!important;" href="{{ URL::to('/about') }}">Read more</a>
          </div>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget">
            <h5 class="widget-title line-bottom">Archives</h5>
            <ul class="list-divider list-border">
              <li><a href="{{ route('findlawyer_list',['22']) }}"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Criminal Law</a></li>
              <li><a href="{{ route('findlawyer_list',['24']) }}"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Family Law</a></li>
              <li><a href="{{ route('findlawyer_list',['29']) }}"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Accident Law</a></li>
              <li><a href="{{ route('findlawyer_list',['30']) }}"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Case Education Law</a></li>
              <li><a href="{{ route('findlawyer_list',['31']) }}"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Money Laundering</a></li>
              <li><a href="{{ route('findlawyer_list',['32']) }}"><i class="fa fa-check-square-o mr-10 text-black-light"></i> Sexual Ofences</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget">
            <h5 class="widget-title line-bottom">Pages</h5>
            <ul class="list-border">
              <li><a href="{{ URL::to('/') }}">Home</a></li>
              <li><a href="{{ URL::to('/findlawyer') }}">Find A Lawyer</a></li>
              <li><a href="{{ URL::to('/blog') }}">Blog</a></li>
              <li><a href="{{ URL::to('/about') }}">About Us</a></li>
              <li><a href="{{ URL::to('/contact') }}">Contact Us</a></li>
              <li><a href="{{ URL::to('faq') }}">FAQ </a></li>
              <li><a href="{{ URL::to('questions') }}">Question Board </a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget">
            <h5 class="widget-title line-bottom">Quick Contact</h5>
            {!! Form::open(['route'=>'sendemail','id'=>'footer_quick_contact_form','name'=>'footer_quick_contact_form','class'=>'quick-contact-form']) !!}  
              <div class="form-group">
                <input type="text" placeholder="Enter Name" value="{{ old('name') }}" data-msg-required="Please enter your name." class="form-control" name="name" id="form_name" style="color:black;" required>
                <?php echo $errors->first('name', "<li style='color:red'>:message</li>") ?> 
              </div>
              <div class="form-group">
                <input type="email" placeholder="Your E-mail" value="{{ old('email1') }}" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." style="color:black;" class="form-control" name="email1" id="form_email" required>
                <?php echo $errors->first('email1', "<li style='color:red'>:message</li>") ?> 
              </div>
              <div class="form-group">
                <input type="text" placeholder="Subject" value="{{ old('subject') }}" data-msg-required="Please enter the subject." class="form-control required" name="subject" id="form_subject" style="color:black;" required>
                <?php echo $errors->first('subject', "<li style='color:red'>:message</li>") ?>
              </div>
              <div class="form-group">
                <textarea maxlength="5000" placeholder="Message" data-msg-required="Please enter your message." rows="5" class="form-control required" name="message" id="form_message" rows="5" style="color:black;" required></textarea>
              </div>
              <div class="form-group custom-center">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-default btn-transparent text-gray btn-xs btn-flat mt-0" data-loading-text="Please wait...">Send Message</button>
              </div>
            {!! Form::close() !!}

            <!-- Quick Contact Form Validation-->
            <script type="text/javascript">
              $("#footer_quick_contact_form").validate();
            </script>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="horizontal-contact-widget mt-30 pt-30 text-center">
            <div class="col-sm-12 col-sm-4">
              <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10"></i>
                <h5 class="text-theme-colored">Call Us</h5>
                <p>Phone: <a href="#">{{ $web_info->contact_number }}</a></p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                <h5 class="text-theme-colored">Address</h5>
                <p>{{ $web_info->address }}</p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                <h5 class="text-theme-colored">Email</h5>
                <p><a href="#">{{ $web_info->email }}</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>


     <div class="row">
         <div class=" text-center">
             <h3>News Letter</h3>
             <p>Subscribe to our weekly Newsletter and stay tuned.</p>
              {!! Form::open(['route'=>'subscribe', 'method'=>'post', 'class'=>'form-inline']) !!}
                  {{ csrf_field() }}
                 <div class="form-group">
                     <label class="sr-only" for="exampleInputAmount">Amount (in dollars)</label>
                     <div class="input-group">
                         <div class="input-group-addon"><i class=" icon_mail_alt"></i></div>
                         <input type="email" name="email" class="form-control" id="exampleInputAmount" placeholder="Enter email" required>
                     </div>
                 </div>
                 <button type="submit" class="btn btn-default " style="height: 43px;" >Subscribe</button>
             {!! Form::close() !!}

         </div>
     </div>
      <div class="row">
        <div class="col-md-12">
          <ul class="list-inline social-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-50 mb-30">
            <li><a href="{{ $web_info->facebook }}"  style="color: #b22323 !important;"  ><i class="fa fa-facebook"></i></a> </li>
            <li><a href="{{ $web_info->twitter }}"  style="color: #b22323 !important;"><i class="fa fa-twitter"></i></a> </li>
            <li><a href="{{ $web_info->google }}" style="color: #b22323 !important;" ><i class="fa fa-pinterest"></i></a> </li>
            <li><a href="{{ $web_info->google }}" style="color: #b22323 !important;"><i class="fa fa-google-plus"></i></a> </li>
            <li><a href="{{ $web_info->li }}" style="color: #b22323 !important;"><i class="fa fa-youtube"></i></a> </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-black-222 p-20">
      <div class="row text-center">
        <div class="col-md-12">
          <p class="font-11 m-0">{{ $web_info->copyright }}</p>
        </div>
      </div>
    </div>
  </footer>
<!-----footer ends-->



  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>


<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="{{ URL::to('public/new/js/custom.js') }}"></script>
  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
      var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
      (function(){
          var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
          s1.async=true;
          s1.src='https://embed.tawk.to/59c0fcd64854b82732ff0e41/default';
          s1.charset='UTF-8';
          s1.setAttribute('crossorigin','*');
          s0.parentNode.insertBefore(s1,s0);
      })();
  </script>
  <!--End of Tawk.to Script-->
  <!--Google translator start-->
    <script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', includedLanguages: 'en,hi,ne', layout: google.translate.TranslateElement.InlineLayout.SIMPLE, autoDisplay: false}, 'google_translate_element');
}
</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <!--Google translatore end-->
@stack('js')


{{-- This code is for flash msg --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
     <?php
        $msg = session()->get('msg');
     if ( !empty($msg) ){     
        echo "<script type='text/javascript'>
                $.alert({
                    title: 'Notification!',
                    content: '$msg'
                });  
              </script>";
      }
     ?>
    
{{-- This code is for flash msg till here --}}
</body>
</html>


