@extends('public.master')
@section('title','Data Update')


@push('css')
<style>

.wizard {
        margin: 20px auto;
        background: #fff;
    }
    .sideTabs {
        margin: 25px 0 0;
    }
    .sideTabs  {
        margin: 25px 0 0;
    }
    .sideTabs a:hover {
        background-color: #fbfbfb !important;
        outline: 1px solid #fdfd;
    }
    .wizard .nav-tabs {
        position: relative;
        margin: 40px auto;
        margin-bottom: 0;
        border-bottom-color: #e0e0e0;
    }

    .wizard > div.wizard-inner {
        position: relative;
    }

.connecting-line {
    height: 2px;
    background: #e0e0e0;
    position: absolute;
    width: 80%;
    margin: 0 auto;
    left: 0;
    right: 0;
    top: 50%;
    z-index: 1;
}

.wizard .nav-tabs > li.active > a, .wizard .nav-tabs > li.active > a:hover, .wizard .nav-tabs > li.active > a:focus {
    color: #555555;
    cursor: default;
    border: 0;
    border-bottom-color: transparent;
}

span.round-tab {
    width: 70px;
    height: 70px;
    line-height: 70px;
    display: inline-block;
    border-radius: 100px;
    background: #fff;
    border: 2px solid #e0e0e0;
    z-index: 2;
    position: absolute;
    left: 0;
    text-align: center;
    font-size: 25px;
}
span.round-tab i{
    color:#555555;
}
.wizard li.active span.round-tab {
    background: #fff;
    border: 2px solid #5bc0de;

}
.wizard li.active span.round-tab i{
    color: #5bc0de;
}

span.round-tab:hover {
    color: #333;
    border: 2px solid #333;
}

.wizard .nav-tabs > li {
    width: 25%;
}

.wizard li:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 0;
    margin: 0 auto;
    bottom: 0px;
    border: 5px solid transparent;
    border-bottom-color: #5bc0de;
    transition: 0.1s ease-in-out;
}

.wizard li.active:after {
    content: " ";
    position: absolute;
    left: 46%;
    opacity: 1;
    margin: 0 auto;
    bottom: 0px;
    border: 10px solid transparent;
    border-bottom-color: #5bc0de;
}

.wizard .nav-tabs > li a {
    width: 70px;
    height: 70px;
    margin: 20px auto;
    border-radius: 100%;
    padding: 0;
}

    .wizard .nav-tabs > li a:hover {
        background: transparent;
    }

.wizard .tab-pane {
    position: relative;
    padding-top: 50px;
}

.wizard h3 {
    margin-top: 0;
}
.step1 .row {
    margin-bottom:10px;
}
.step_21 {
    border :1px solid #eee;
    border-radius:5px;
    padding:10px;
}
.step33 {
    border:1px solid #ccc;
    border-radius:5px;
    padding-left:10px;
    margin-bottom:10px;
}
.dropselectsec {
    width: 68%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.dropselectsec1 {
    width: 74%;
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    outline: none;
    font-weight: normal;
}
.mar_ned {
    margin-bottom:10px;
}
.wdth {
    width:25%;
}
.birthdrop {
    padding: 6px 5px;
    border: 1px solid #ccc;
    border-radius: 3px;
    color: #333;
    margin-left: 10px;
    width: 16%;
    outline: 0;
    font-weight: normal;
}


/* according menu */
#accordion-container {
    font-size:13px
}
.accordion-header {
  font-size:13px;
  background:#ebebeb;
  margin:5px 0 0;
  padding:7px 20px;
  cursor:pointer;
  color:#fff;
  font-weight:400;
  -moz-border-radius:5px;
  -webkit-border-radius:5px;
  border-radius:5px
}
.unselect_img{
  width:18px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}
.active-header {
  -moz-border-radius:5px 5px 0 0;
  -webkit-border-radius:5px 5px 0 0;
  border-radius:5px 5px 0 0;
  background:#F53B27;
}
.active-header:after {
  content:"\f068";
  font-family:'FontAwesome';
  float:right;
  margin:5px;
  font-weight:400
}
.inactive-header {
  background:#333;
}
.inactive-header:after {
  content:"\f067";
  font-family:'FontAwesome';
  float:right;
  margin:4px 5px;
  font-weight:400
}
.accordion-content {
  display:none;
  padding:20px;
  background:#fff;
  border:1px solid #ccc;
  border-top:0;
  -moz-border-radius:0 0 5px 5px;
  -webkit-border-radius:0 0 5px 5px;
  border-radius:0 0 5px 5px
}
.accordion-content a{
  text-decoration:none;
  color:#333;
}
.accordion-content td{
  border-bottom:1px solid #dcdcdc;
}



@media( max-width : 585px ) {

    .wizard {
        width: 90%;
        height: auto !important;
    }

    span.round-tab {
        font-size: 16px;
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard .nav-tabs > li a {
        width: 50px;
        height: 50px;
        line-height: 50px;
    }

    .wizard li.active:after {
        content: " ";
        position: absolute;
        left: 35%;
    }
}
    .img-responsive{
      width: 100%;
    }
    h3{
      text-align: center;
    }
      ul.mbm_social {
            margin:0 !important;
            display: table;
            font-size: 0;
            float:none;
            width:100%;
            background:#fff;
            text-align:center;
          }
          .mbm_social li {
            text-align: center;
            list-style: outside none none;
            padding: 0;
            font-family: "Montserrat", sans-serif;
            text-transform: uppercase;
          }
          .mbm_social > li:last-child {
              margin: 0;
          }
          .mbm_social a {
            position: relative;
            float: left;
            line-height: 40px;
            margin: 0 8px 0 0;
            color:#fff;
            -webkit-box-align: center;
            -webkit-align-items: center;
                -ms-flex-align: center;
                    align-items: center;
            -webkit-box-pack: center;
            -webkit-justify-content: center;
                -ms-flex-pack: center;
                    justify-content: center;
            margin: 0 px;
            width: 40px;
            height: 31px;
            text-decoration: none;
            text-shadow: 0 1px 0 rgba(0, 0, 0, 0.2);
            -webkit-transition: all .15s ease;
            transition: all .15s ease;
            z-index: 2;
            font-family: "Montserrat", sans-serif;
            text-transform: uppercase;
            -webkit-backface-visibility: hidden;
                    backface-visibility: hidden;
          }
          .mbm_social a:hover {
            color: #fff;
          }
          .mbm_social a:hover .tooltip {
            display: block;
            visibility: visible;
            opacity: 1;
            -webkit-transform: translate(0, -33px);
                    transform: translate(0, -33px);
          }
          .mbm_social a:active {
            box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.5) inset;
          }
          .mbm_social .tooltip {
            opacity: 0;
            position: absolute;
            top: 2px;
            left: 50%;
            z-index: 1;
            -webkit-transition: all .15s ease;
            transition: all .15s ease;
            -webkit-backface-visibility: hidden;
              backface-visibility: hidden;
          }
          .mbm_social .tooltip span {
              font-size: 10px;
              font-weight: bold;
              left: -50%;
              line-height: 1;
              padding: 6px 8px 5px;
              position: relative;
              text-transform: uppercase;
              z-index: 1;
          }
          .mbm_social .tooltip span:after {
            position: absolute;
            content: " ";
            width: 0;
            height: 0;
            top: 100%;
            left: 50%;
            margin-left: -8px;
            border: 8px solid transparent;
          }
          .mbm_social .social-twitter {
            background: #00abdc;
            background: -webkit-linear-gradient(#00abdc, #00abdc);
            background: linear-gradient(#00abdc, #00abdc);
            border-bottom: 1px solid #00abdc;
          }
          .mbm_social .social-twitter:hover {
            color: #fff;
            text-shadow: 0px 1px 0px #00abdc;
          }
          .mbm_social .social-twitter span {
            background: #00abdc ;
            background: -webkit-linear-gradient(#00abdc, #00abdc);
            background: linear-gradient(#00abdc, #00abdc);
            color: #fff;
          }
          .mbm_social .social-twitter span:after {
            border-top-color: #00abdc;
          }
          .mbm_social .social-linkedin {
            background: #286580 ;
            background: -webkit-linear-gradient(#286580, #286580);
            background: linear-gradient(#286580, #286580);
            border-bottom: 1px solid #286580;
          }
          .mbm_social .social-linkedin:hover {
            color: #fff ;
            text-shadow: 0px 1px 0px #286580;
          }
          .mbm_social .social-linkedin span {
            background: #286580 ;
            background: -webkit-linear-gradient(#286580, #286580);
            background: linear-gradient(#286580, #286580);
            color: #fff;
          }
          .mbm_social .social-linkedin span:after {
            border-top-color: #286580 ;
          }
          .mbm_social .social-facebook {
            background: #325c94 ;
            background: -webkit-linear-gradient(#4562a0, #385693);
            background: linear-gradient(#4562a0, #385693);
            border-bottom: 1px solid #2f487c;
          }
          .mbm_social .social-facebook:hover {
            color: #fff;
            text-shadow: 0px 1px 0px #2f487c;
          }
          .mbm_social .social-facebook span {
            background: #3b5a9b;
            background: -webkit-linear-gradient(#5873aa, #3b5a9b);
            background: linear-gradient(#5873aa, #3b5a9b);
            color: #fff;
          }
          .mbm_social .social-facebook span:after {
            border-top-color: #325c94;
          }
          .mbm_social .social-google-plus {
            background: #ea4335;
            background: -webkit-linear-gradient(#ea4335, #ea4335);
            background: linear-gradient(#ea4335, #ea4335);
            border-bottom: 1px solid #ea4335;
          }
          .mbm_social .social-google-plus:hover {
            color: #fff ;
            text-shadow: 0px 1px 0px #ea4335;
          }
          .mbm_social .social-google-plus span {
            background: #ea4335;
            background: -webkit-linear-gradient(#ea4335, #ea4335);
            background: linear-gradient(#ea4335, #ea4335);
            color: #fff ;
          }
          .mbm_social .social-google-plus span:after {
            border-top-color: #ea4335 ;
          }
          .mbm_social i {
            position: relative;
            top: 1px;
            font-size: 14px;
          }
          .mbm_social small {
              font-size: 14px;
              margin: 0 0 0 9px;
             vertical-align: middle;
          }

/*** custom checkboxes ***/

input[type=checkbox] { display:none; } /* to hide the checkbox itself */
input[type=checkbox] + label:before {
  font-family: FontAwesome;
  display: inline-block;
}

input[type=checkbox] + label:before { content: "\f096"; } /* unchecked icon */
input[type=checkbox] + label:before { letter-spacing: 10px; } /* space between checkbox and label */

input[type=checkbox]:checked + label:before { content: "\f046"; } /* checked icon */
input[type=checkbox]:checked + label:before { letter-spacing: 5px; } /* allow space for check mark */

</style>


@endpush

@push('js1')
  <script>
  $( function() {
    $( "#dob" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0"
  });
  $( "#dor" ).datepicker({
    changeMonth: true,
    changeYear: true,
    yearRange: "-100:+0"
  });
  } );
  </script>
@endpush
 

@section('content')



<!--  $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->

    <!-- Section: Registration Form -->
<section class="divider"> 
      <div class="container">
        <div class="col-md-3">
              <div class="box">
                <img src="profile.jpg" alt="Profile Image" class="img-responsive">
                <h3>Rajendra Sharestha</h3>
                <ul class="mbm_social">
                  <li><a class="social-facebook" href="#">
                    <i class="fa fa-facebook"></i>
                    <div class="tooltip"><span>facebook</span></div>
                    </a>
                  </li>
                  <li><a class="social-twitter" href="#">
                    <i class="fa fa-twitter"></i>
                    <div class="tooltip"><span>Twitter</span></div>
                    </a>
                  </li>
                  <li><a class="social-google-plus" href="#">
                    <i class="fa fa-google-plus"></i>
                    <div class="tooltip"><span>google</span></div>
                    </a>
                  </li>
                  <li><a class="social-linkedin" href="#">
                    <i class="fa  fa-linkedin"></i>
                    <div class="tooltip"><span>linkedin</span></div>
                    </a>
                  </li>
                </ul>
              </div>
               <nav class="nav-sidebar">
                <ul class="nav tabs sideTabs">
                      <li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-user" aria-hidden="true"></i> | Profile</a></li>
                      <li class=""><a href="#tab2" data-toggle="tab"><i class="fa fa-certificate" aria-hidden="true"></i> | Certificate</a></li>
                      <li class=""><a href="#tab3" data-toggle="tab"><i class="fa fa-trophy" aria-hidden="true"></i> | Awards</a></li>
                </ul>
              </nav>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active text-style" id="tab1">
      <section>
          <div class="wizard">
              <div class="wizard-inner">
                  <div class="connecting-line"></div>
                  <ul class="nav nav-tabs" role="tablist">
                      <li role="presentation" class="active">
                          <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" title="Step 1">
                              <span class="round-tab">
                                  <i class="pe-7s-id"></i>
                              </span>
                          </a>
                      </li>
                      <li role="presentation" class="disabled">
                          <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" title="Step 2" id="step2_tab">
                              <span class="round-tab">
                                  <i class="glyphicon glyphicon-pencil"></i>
                              </span>
                          </a>
                      </li>
                      <li role="presentation" class="disabled">
                          <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab" title="Step 3" id="step3_tab">
                              <span class="round-tab">
                                  <i class="glyphicon glyphicon-picture"></i>
                              </span>
                          </a>
                      </li>
                      <li role="presentation" class="disabled">
                          <a href="#complete" data-toggle="tab" aria-controls="complete" role="tab" title="Complete" id="step4_tab">
                              <span class="round-tab">
                                  <i class="glyphicon glyphicon-ok"></i>
                              </span>
                          </a>
                      </li>
                  </ul>
              </div>

              {{--<form role="form">--}}
                  <div class="tab-content">
                      <div class="tab-pane active" role="tabpanel" id="step1">
                                    {!! Form::open(['route'=>'professional_information','id'=>'pro','name'=>'pro','enctype'=>'multipart/form-data']) !!}

                          <div class="step1">
<div class="row">

            <div class="p-30 pt-0 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> Professional Information</h3>
              <hr>


                   <input type="hidden" name="id" value="{{ Auth::user()->id }}">
                   <input type="hidden" name="ref_id" value="{{ $lawyer->id }}">
                    <input type="hidden" name="register" value="{{ Auth::user()->role  }}" >
                    <input type="hidden" name="gender" value="1">
                    <input type="hidden" name="last_name" value="{{ Auth::user()->last_name }}">
                  <!-- section one -->

                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="website">Web Url <small style="color:blue;">(Optional)</small></label>
                      <input id="website" name="website" type="text" placeholder="Website Url" class="form-control" value="{{ $lawyer->web_url }}">
                    </div>
                  </div>
                </div>

    @if( Auth::user()->role == 'lawyer')
                <div class="row">
                  <div class="col-sm-12">
                    <div class="form-group">
                      <label for="firmname">LawFirm Name <small style="color:blue;">(Optional)</small></label>
                      <select id="firmname" name="firmname" class="form-control">
                        <option value="">Select Your Firm *</option>
                        @foreach( $lawfirms_id as $fid )
                            @foreach( $lawfirms_name as $fname )
                                @if( $fname->id == $fid->ref_id )
                          <option {{ $lawyer->law_firm_id == $fid->ref_id ? 'selected' : '' }}
                           value="{{ $fid->ref_id }}" >

                                   {{ $fname->first_name }} {{ $fname->last_name }}
                          </option>
                                @endif
                        @endforeach
                        @endforeach
                      </select>
                    </div>
                  </div>
                </div>
    @endif


                <div class="center mb-20" id="expertise_div">
                    <h5><b>Expertise:</b></h5>
                  <div>
                    @foreach($expertise as $ex)
                      <input id="box1{{$ex->id}}" type="checkbox" name="expertise[]" value="{{$ex->id}}"
                          <?php
                             $dl = explode(',', $lawyer->expertise);
                              foreach ($dl as $key){ if($key == $ex->id){ echo "checked"; }}
                          ?>
                       />
                      <label for="box1{{$ex->id}}" class="mr-20">{{ $ex->expertise_name }}</label>
                    @endforeach
                  </div>
                  <span class='help-block' id="expertise_help"><strong></strong></span>
                </div>


                <div class="row">
                  <div class="col-sm-6" id="yoe_div">
                    <div class="form-group">
                      <label for="yoe">Year Of Experience <small style="color:red;">*</small></label>
                      <input id="yoe" name="yoe" type="number" placeholder="Year Of Experience" required="" class="form-control" value="{{ $lawyer->experience }}">
                      <span class='help-block' id="yoe_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6" id="bar_div">
                    <div class="form-group">
                      <label for="bar">Bar Member <small style="color:red;">*</small></label>
                      <select id="bar" name="bar" class="form-control required" required>
                        <option value="0">No</option>
                      @foreach( $bars as $bar )
                        <option {{ $lawyer->bar_id == $bar->id ? 'selected' : '' }} value="{{ $bar->id }}" >{{ $bar->bar_name }}</option>
                      @endforeach
                      </select>
                      <span class='help-block' id="bar_help"><strong></strong></span>
                    </div>
                  </div>
                </div>

                <div class="center mb-20" id="court_div">
                    <h5><b>Courts:</b></h5>
                  <div>
                  @foreach($courts as $court)
                    <input id="box11{{$court->id}}" type="checkbox" name="court[]" value="{{$court->id}}"
                      <?php
                            $dl = explode(',', $lawyer->court_names);
                            foreach ($dl as $key) { if($key == $court->id){ echo "checked"; }}
                       ?>
                    />
                    <label for="box11{{$court->id}}" class="mr-20">{{ $court->court_name }}</label>
                  @endforeach
                  </div>
                  <span class='help-block' id="court_help"><strong></strong></span>
                </div>

                <div class="row">
                  <div class="col-sm-6" id="firstfee_div">
                    <div class="form-group">
                      <label for="first_fee">First Fee <small style="color:red;">*</small></label>
                      <input id="first_fee" name="firstfee" type="number" placeholder="First Fee" required="required" class="form-control" value="{{ $lawyer->fee_first }}">
                      <span class='help-block' id="firstfee_help"><strong></strong></span>
                    </div>
                  </div>
                  <div class="col-sm-6" id="hourfee_div">
                    <div class="form-group">
                      <label for="hourly_fee">Hourly Fee <small style="color:red;">*</small></label>
                      <input id="hourly_fee" name="hourfee" type="number" placeholder="Hourly Fee" required="required" class="form-control" value="{{ $lawyer->fee_hourly }}">
                      <span class='help-block' id="hourfee_help"><strong></strong></span>
                    </div>
                  </div>
                </div>


                <div class="center mb-20">
                  <div class="row">
                    <!-- Payments -->
                    <div class="col-sm-6" id="payment_div">
                      <h5><b>Payment Methords:</b></h5>
                      <div>
                       <input id="box1110" type="checkbox" name="payment[]" value="paypal"
                          <?php
                              $payment = explode(',', $lawyer->payment);
                                foreach($payment as $pay){ if($pay == 'paypal'){ echo "checked"; }}
                           ?>
                        />
                        <label for="box1110" class="mr-20">Paypal</label>
                        <input id="box2110" type="checkbox" name="payment[]" value="Khalti"
                          <?php
                              $payment = explode(',', $lawyer->payment);
                                foreach($payment as $pay){ if($pay == 'Khalti'){ echo "checked"; }}
                          ?>
                        />
                        <label for="box2110" class="mr-20">Khalti</label>
                      </div>
                      <span class='help-block' id="payment_help"><strong></strong></span>
                    </div>
                    <!-- Languages -->
                    <div class="col-sm-6" id="language_div">
                    <h5><b>Languages:</b></h5>
                      <div>
                        @foreach($languages as $l)
                         <input id="boxl{{$l->id}}" type="checkbox" name="language[]" value="{{$l->id}}"
                          <?php
                                $lan = explode(',', $lawyer->languages); foreach ($lan as $key) { if($key == $l->id){ echo "checked"; } }
                           ?>
                        />
                        <label for="boxl{{$l->id}}" class="mr-20">{{$l->lang_name}}</label>
                        @endforeach
                      </div>
                        <span class='help-block' id="language_help"><strong></strong></span>
                    </div>
                  </div>
                </div>

                 <div class="row">
                    <div class="col-sm-12">
                      <div class="form-group">
                        <label for="skype">Skype Id<small style="color:blue;"> (optional)</small></label>
                        <input id="skype" name="skype" value="{{ $lawyer->contact_video }}" class="form-control" type="text" placeholder="Enter Your Skype Id">
                      </div>
                    </div>
                  </div>

                  <div class="center mb-20" id="service_div">
                    <h5><b>Service Mode:</b></h5>
                    <div class="col-sm-12" >
                      <div class="col-sm-3 col-sm-offset-1">
                        <h5 style="color:gray;">
                          <input id="boxphone" type="checkbox" name="service[]" value="phone"
                            <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'phone'){
                                      echo "checked";
                                    }
                                  }
                             ?>
                           />
                          <label for="boxphone" class="mr-20">By Phone</label>
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="p_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $phone = explode(',', $lawyer->phone_price);
                            echo $phone[0];
                          ?>"
                         />
                      </div>
                      <div class="col-sm-4">
                        <input name="p_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                          $phone = explode(',', $lawyer->phone_price);
                          if (!empty($phone[1])){ echo $phone[1]; }
                          ?>"
                        />
                      </div>
                    </div>
                    <div class="col-sm-12 mt-10" >
                      <div class="col-sm-3 col-sm-offset-1">
                        <h5 style="color:gray;">
                          <input id="boxemail" type="checkbox" name="service[]" value="email"
                              <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'email'){
                                      echo "checked";
                                    }
                                  }
                             ?>
                           />
                          <label for="boxemail" class="mr-20">By Email</label>
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="e_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $email = explode(',', $lawyer->email_price);
                            echo $email[0];
                          ?>" />
                      </div>
                      <div class="col-sm-4">
                        <input name="e_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                            $email = explode(',', $lawyer->email_price);
                            if (!empty($email[1])){ echo $email[1]; }
                          ?>" />
                      </div>
                    </div>
                    <div class="col-sm-12 mt-10" >
                      <div class="col-sm-3 col-sm-offset-1">
                        <h5 style="color:gray;">
                          <input id="boxvideo" type="checkbox" name="service[]" value="video"
                              <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'video'){
                                      echo "checked";
                                    }
                                  }
                              ?>
                          />
                          <label for="boxvideo" class="mr-20">By Video Call</label>
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="v_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $video = explode(',', $lawyer->skype_price);
                            echo $video[0];
                          ?>" />
                      </div>
                      <div class="col-sm-4">
                        <input name="v_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                            $video = explode(',', $lawyer->skype_price);
                            if (!empty($video[1])){ echo $video[1]; }
                          ?>" />
                      </div>
                    </div>
                    <div class="col-sm-12 mt-10">
                      <div class="col-sm-3 col-sm-offset-1">
                        <h5 style="color:gray;">
                          <input id="boxperson" type="checkbox" name="service[]" value="person"
                              <?php
                                $lang = explode(',', $lawyer->service_mode);
                                  foreach($lang as $lan){
                                    if($lan == 'person'){
                                      echo "checked";
                                    }
                                  }
                              ?>
                          />
                          <label for="boxperson" class="mr-20">By Meeting</label>
                        </h5>
                      </div>
                      <div class="col-sm-4">
                        <input name="m_p[]" class="form-control" type="text" placeholder="Regular Price" value="<?php
                            $phone = explode(',', $lawyer->personal_price);
                            echo $phone[0];
                          ?>" />
                      </div>
                      <div class="col-sm-4">
                        <input name="m_p[]" class="form-control" type="text" placeholder="Discounted Price" value="<?php
                            $phone = explode(',', $lawyer->personal_price);
                             if (!empty($phone[1])){ echo $phone[1]; }
                          ?>" />
                      </div>
                    </div>
                    <span class='help-block' id="service_help"><strong></strong></span>
                  </div>


                {{--<div class="row">--}}
                  {{--<div class="col-sm-4 col-sm-offset-4 mt-20">--}}
                    {{--<div class="form-group">--}}
                      {{--<input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />--}}
                      {{--<button type="submit" class="btn btn-block btn-primary btn-sm mt-20 pt-10 pb-10" style="font-size:16px;">Submit</button>--}}
                    {{--</div>--}}
                  {{--</div>--}}
                {{--</div>--}}


              <!-- Job Form Validation-->
              <script type="text/javascript">
//                jQuery("#pro").validate();
                jQuery("#pro").attr('novalidate','novalidate');
              </script>
            </div>
          </div>
                          </div>
                          <ul class="list-inline pull-right">
                              <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                              <li><button type="submit" class="btn btn-default next-step">Next</button></li>
                          </ul>
                          {!! Form::close() !!}
                      </div>
                      <div class="tab-pane" role="tabpanel" id="step2">
                          {{--<div class="step2">--}}
                              {{--<div class="step_21">--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-6 col-xs-6">--}}
                                          {{--<label class="radio-inline">--}}
                                            {{--<input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> I am in INDIA--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-6 col-xs-6">--}}
                                          {{--<label class="radio-inline">--}}
                                            {{--<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> I am in ABROAD--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="step-22">--}}
                                  {{--<h5><strong>How would you like to go Abroad ?</strong></h5>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Any How--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Migrate Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox">On a Migrate Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Work Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Invest Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Travel Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Assessment--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Other Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Dependent Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<h5><strong>Which country would you be interested in ?</strong></h5>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Anywhere Aboard--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Australia--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox">Canada--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Denmark--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> America--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> New Zealand--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Austria--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Norway--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> UK--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Hong Kong--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Singapore--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> France--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> South Africa--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Ireland--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Belgium--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Germany--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Philippines--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Netherlands--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Malaysia--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Switzerland--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Sweden--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<h5><strong>How would you like to go Abroad ?</strong></h5>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> Any How--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Migrate Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox">On a Migrate Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Work Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Invest Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Travel Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                                  {{--<div class="row">--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Assessment--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Other Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                      {{--<div class="col-md-4 col-xs-6">--}}
                                          {{--<label>--}}
                                            {{--<input type="checkbox"> On a Dependent Visas--}}
                                          {{--</label>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                          {{--</div>--}}
                          @include('edit_personal')
                          {{--<ul class="list-inline pull-right">--}}
                              {{--<li><button type="button" class="btn btn-default prev-step">Previous</button></li>--}}
                              {{--<li><button type="submit" class="btn btn-primary next-step">Next</button></li>--}}
                          {{--</ul>--}}
                      </div>
                      <div class="tab-pane" role="tabpanel" id="step3">
                          {{--<div class="step33">--}}
                          {{--<h5><strong>Basic Details</strong></h5>--}}
                          {{--<hr>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Visa Status</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<select name="visa_status" id="visa_status" class="dropselectsec">--}}
                                          {{--<option value="">Please Select Visa Status or Any Visa You Are Holding</option>--}}
                                          {{--<option value="2">Student Visas</option>--}}
                                          {{--<option value="1">Migrate Visas</option>--}}
                                          {{--<option value="4">Travel Visas</option>--}}
                                          {{--<option value="5">Work Visas</option>--}}
                                          {{--<option value="6">Other Visas</option>--}}
                                          {{--<option value="3">Settle Abroad</option>--}}
                                          {{--<option value="7">Invest Visas</option>--}}
                                          {{--<option value="8">Assessment</option>--}}
                                          {{--<option value="9">Dependent Visas</option>--}}
                                      {{--</select>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Date of birth</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<div class="row">--}}
                                          {{--<div class="col-md-4 col-xs-4 wdth">--}}
                                              {{--<select name="visa_status" id="visa_status" class="dropselectsec1">--}}
                                                  {{--<option value="">Date</option>--}}
                                                  {{--<option value="2">1</option>--}}
                                                  {{--<option value="1">2</option>--}}
                                                  {{--<option value="4">3</option>--}}
                                                  {{--<option value="5">4</option>--}}
                                                  {{--<option value="6">5</option>--}}
                                                  {{--<option value="3">6</option>--}}
                                                  {{--<option value="7">7</option>--}}
                                                  {{--<option value="8">8</option>--}}
                                                  {{--<option value="9">9</option>--}}
                                              {{--</select>--}}
                                          {{--</div>--}}
                                          {{--<div class="col-md-4 col-xs-4 wdth">--}}
                                              {{--<select name="visa_status" id="visa_status" class="dropselectsec1">--}}
                                                  {{--<option value="">Month</option>--}}
                                                  {{--<option value="2">Jan</option>--}}
                                                  {{--<option value="1">Feb</option>--}}
                                                  {{--<option value="4">Mar</option>--}}
                                                  {{--<option value="5">Apr</option>--}}
                                                  {{--<option value="6">May</option>--}}
                                                  {{--<option value="3">June</option>--}}
                                                  {{--<option value="7">July</option>--}}
                                                  {{--<option value="8">Aug</option>--}}
                                                  {{--<option value="9">Sept</option>--}}
                                              {{--</select>--}}
                                          {{--</div>--}}
                                          {{--<div class="col-md-4 col-xs-4 wdth">--}}
                                              {{--<select name="visa_status" id="visa_status" class="dropselectsec1">--}}
                                                  {{--<option value="">Year</option>--}}
                                                  {{--<option value="2">1990</option>--}}
                                                  {{--<option value="1">1991</option>--}}
                                                  {{--<option value="4">1992</option>--}}
                                                  {{--<option value="5">1993</option>--}}
                                                  {{--<option value="6">1994</option>--}}
                                                  {{--<option value="3">1995</option>--}}
                                                  {{--<option value="7">1996</option>--}}
                                                  {{--<option value="8">1997</option>--}}
                                                  {{--<option value="9">1998</option>--}}
                                              {{--</select>--}}
                                          {{--</div>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Marital Status</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<label class="radio-inline">--}}
                                        {{--<input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Single--}}
                                      {{--</label>--}}
                                      {{--<label class="radio-inline">--}}
                                        {{--<input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Married--}}
                                      {{--</label>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Highest Education</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<select name="highest_qualification" id="highest_qualification" class="dropselectsec">--}}
                                          {{--<option value=""> Select Highest Education</option>--}}
                                          {{--<option value="1">Ph.D</option>--}}
                                          {{--<option value="2">Masters Degree</option>--}}
                                          {{--<option value="3">PG Diploma</option>--}}
                                          {{--<option value="4">Bachelors Degree</option>--}}
                                          {{--<option value="5">Diploma</option>--}}
                                          {{--<option value="6">Intermediate / (10+2)</option>--}}
                                          {{--<option value="7">Secondary</option>--}}
                                          {{--<option value="8">Others</option>--}}
                                      {{--</select>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Specialization</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<input type="text" name="specialization" id="specialization" placeholder="Specialization" class="dropselectsec" autocomplete="off">--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Year of Passed Out</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<select name="year_of_passedout" id="year_of_passedout" class="birthdrop">--}}
                                          {{--<option value="">Year</option>--}}
                                          {{--<option value="1980">1980</option>--}}
                                          {{--<option value="1981">1981</option>--}}
                                          {{--<option value="1982">1982</option>--}}
                                          {{--<option value="1983">1983</option>--}}
                                          {{--<option value="1984">1984</option>--}}
                                          {{--<option value="1985">1985</option>--}}
                                          {{--<option value="1986">1986</option>--}}
                                          {{--<option value="1987">1987</option>--}}
                                          {{--<option value="1988">1988</option>--}}
                                          {{--<option value="1989">1989</option>--}}
                                          {{--<option value="1990">1990</option>--}}
                                          {{--<option value="1991">1991</option>--}}
                                          {{--<option value="1992">1992</option>--}}
                                          {{--<option value="1993">1993</option>--}}
                                          {{--<option value="1994">1994</option>--}}
                                          {{--<option value="1995">1995</option>--}}
                                          {{--<option value="1996">1996</option>--}}
                                          {{--<option value="1997">1997</option>--}}
                                          {{--<option value="1998">1998</option>--}}
                                          {{--<option value="1999">1999</option>--}}
                                          {{--<option value="2000">2000</option>--}}
                                          {{--<option value="2001">2001</option>--}}
                                          {{--<option value="2002">2002</option>--}}
                                          {{--<option value="2003">2003</option>--}}
                                          {{--<option value="2004">2004</option>--}}
                                          {{--<option value="2005">2005</option>--}}
                                          {{--<option value="2006">2006</option>--}}
                                          {{--<option value="2007">2007</option>--}}
                                          {{--<option value="2008">2008</option>--}}
                                          {{--<option value="2009">2009</option>--}}
                                          {{--<option value="2010">2010</option>--}}
                                          {{--<option value="2011">2011</option>--}}
                                          {{--<option value="2012">2012</option>--}}
                                          {{--<option value="2013">2013</option>--}}
                                          {{--<option value="2014">2014</option>--}}
                                          {{--<option value="2015">2015</option>--}}
                                      {{--</select>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Total Experience</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<div class="row">--}}
                                          {{--<div class="col-md-6 col-xs-6 wdth">--}}
                                              {{--<select name="visa_status" id="visa_status" class="dropselectsec1">--}}
                                                  {{--<option value="">Month</option>--}}
                                                  {{--<option value="2">Jan</option>--}}
                                                  {{--<option value="1">Feb</option>--}}
                                                  {{--<option value="4">Mar</option>--}}
                                                  {{--<option value="5">Apr</option>--}}
                                                  {{--<option value="6">May</option>--}}
                                                  {{--<option value="3">June</option>--}}
                                                  {{--<option value="7">July</option>--}}
                                                  {{--<option value="8">Aug</option>--}}
                                                  {{--<option value="9">Sept</option>--}}
                                              {{--</select>--}}
                                          {{--</div>--}}
                                          {{--<div class="col-md-6 col-xs-6 wdth">--}}
                                              {{--<select name="visa_status" id="visa_status" class="dropselectsec1">--}}
                                                  {{--<option value="">Month</option>--}}
                                                  {{--<option value="2">Jan</option>--}}
                                                  {{--<option value="1">Feb</option>--}}
                                                  {{--<option value="4">Mar</option>--}}
                                                  {{--<option value="5">Apr</option>--}}
                                                  {{--<option value="6">May</option>--}}
                                                  {{--<option value="3">June</option>--}}
                                                  {{--<option value="7">July</option>--}}
                                                  {{--<option value="8">Aug</option>--}}
                                                  {{--<option value="9">Sept</option>--}}
                                              {{--</select>--}}
                                          {{--</div>--}}
                                      {{--</div>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                              {{--<div class="row mar_ned">--}}
                                  {{--<div class="col-md-4 col-xs-3">--}}
                                      {{--<p align="right"><stong>Have you taken the IETLS Exam ?</stong></p>--}}
                                  {{--</div>--}}
                                  {{--<div class="col-md-8 col-xs-9">--}}
                                      {{--<select name="ielts" id="ielts" class="dropselectsec">--}}
                                          {{--<option value="">Select IETLS option</option>--}}
                                          {{--<option>Yes</option>--}}
                                          {{--<option>No</option>--}}
                                      {{--</select>--}}
                                  {{--</div>--}}
                              {{--</div>--}}
                          {{--</div>--}}
                          @include('edit_gallery')
                          <ul class="list-inline pull-right">
                              <li><button type="button" class="btn btn-default prev-step">Previous</button></li>
                              <!-- <li><button type="button" class="btn btn-default next-step">Skip</button></li> -->
                              <li><a href="#step4_tab"><button type="submit" class="btn btn-primary btn-info-full next-step">Next</button></a></li>
                          </ul>
                      </div>
                      <div class="tab-pane" role="tabpanel" id="complete">
                          <div class="step44">
                              <h5>Whats Next</h5>
                              <hr>
                              <div id="accordion-container">
                                  <h2 class="accordion-header"> Your Assigned Branch Office & Consultant</h2>
                                  <div class="accordion-content">
                                    <a href="#">
              Our Migrationideas consultant <strong>advisor </strong> will contact you shortly with the list of suggested products for you.<br>
                        <br><strong>Branch Office</strong><br>
          Hyderabad,<br>
                  Suite 111, 1st Floor,<br>
                  Babu Khan Mall, Opp Kalanikethan Wedding Mall,<br>
                  Somajiguda,<br>                                                Hyderabad - 500 016,<br>
                  Andhra Pradesh<br>
                  Contact:  040 - 49596666,<br>

                  E-Mail: hyderabad@migrationideas.com.<br>


  <br>

          </a>
                                  </div>
                                  <h2 class="accordion-header"> Upload Resume</h2>
                                  <div class="accordion-content">
                                    <label for="exampleInputFile">File input</label>
                                      <input type="file" id="exampleInputFile">
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="clearfix"></div>
                  </div>
              {{--</form>--}}
          </div>
      </section>
                </div>
                <div class="tab-pane text-style" id="tab2">
                  <h3>Certificate Content will show here</h3>
                </div>
                <div class="tab-pane text-style" id="tab3">
                  <h3>Award Content will show here</h3>
                </div>
            </div>
        </div>
      </div>
</section>


@push('js')
<script>
$(document).ready(function () {
    //Initialize tooltips
    $('.nav-tabs > li a[title]').tooltip();
    //Wizard
        $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {

            var $target = $(e.target);

            if ($target.parent().hasClass('disabled')) {
                return false;
            }
        });

        $(".next-step").click(function (e) {

            var $active = $('.wizard .nav-tabs li.active');
            $active.next().removeClass('disabled');
            nextTab($active);

        });

        $(".prev-step").click(function (e) {
            var $active = $('.wizard .nav-tabs li.active');
            prevTab($active);
        });

        $.ajaxSetup({
            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
            });
                // process registration form the form
                    $('#pro').submit(function(event) {
                        event.preventDefault();
                        $('.has-error').removeClass('has-error');
                        $('.help-block').html('');
                        // process the form
                                $.ajax({
                                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                    url         : "{{url('/professional_information')}}", // the url where we want to POST
                                    data        : $("#pro").serialize(),
                                    dataType    : 'json', // what type of data do we expect back from the server
                                    encode      : true,
                //                    contentType: "application/json",
                                    success : function(data){
                                    if(data.status == 'success'){
                                        toastr.success(data.message, 'Success!');
                                        $('#step2_tab').trigger('click');
                                    }else{
                                        toastr.error(data.message, 'Error!');
                                    }
                                        var APP_URL = "{{ url('/') }}";
//                                    setTimeout(function() {
//                                        window.location.replace(data.redirect);
//                                    }, 500);
                                    },
                                    error : function(data){
                                    var errors = $.parseJSON(data.responseText);
                                    console.log(errors);
                                    $.each(errors,function(index, value) {
                                        toastr.error(value, 'Error!');
                                        $('#'+index+'_help').html("<strong>"+value+"</strong>");
                                        $('#'+index+'_div').addClass('has-error');
                                    });
                                    }
                                });
                    });

                // process registration form the form
                    $('#personal_firm').submit(function(event) {
                        event.preventDefault();
                        $('.has-error').removeClass('has-error');
                        $('.help-block').html('');
                        // process the form
                                $.ajax({
                                    type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                    url         : "{{url('/personal_information')}}", // the url where we want to POST
                                    data        : $("#personal_firm").serialize(),
                                    dataType    : 'json', // what type of data do we expect back from the server
                                    encode      : true,
                //                    contentType: "application/json",
                                    success : function(data){
                                    if(data.status == 'success'){
                                        toastr.success(data.message, 'Success!');
                                        $('#step3_tab').trigger('click');
                                    }else{
                                        toastr.error(data.message, 'Error!');
                                    }
                                        var APP_URL = "{{ url('/') }}";
//                                    setTimeout(function() {
//                                        window.location.replace(data.redirect);
//                                    }, 500);
                                    },
                                    error : function(data){
                                    var errors = $.parseJSON(data.responseText);
                                    console.log(errors);
                                    $.each(errors,function(index, value) {
                                        toastr.error(value, 'Error!');
                                        $('#'+index+'_help').html("<strong>"+value+"</strong>");
                                        $('#'+index+'_div').addClass('has-error');
                                    });
                                    }
                                });
                    });

                // process registration form the form
                    $('#personal_l').submit(function(event) {
                                            event.preventDefault();
                                            $('.has-error').removeClass('has-error');
                                            $('.help-block').html('');
                                            // process the form
                                                    $.ajax({
                                                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                                        url         : "{{url('/personal_information')}}", // the url where we want to POST
                                                        data        : $("#personal_l").serialize(),
                                                        dataType    : 'json', // what type of data do we expect back from the server
                                                        encode      : true,
                                    //                    contentType: "application/json",
                                                        success : function(data){
                                                        if(data.status == 'success'){
                                                            toastr.success(data.message, 'Success!');
                                                            $('#step3_tab').trigger('click');
                                                        }else{
                                                            toastr.error(data.message, 'Error!');
                                                        }
                                                            var APP_URL = "{{ url('/') }}";
                    //                                    setTimeout(function() {
                    //                                        window.location.replace(data.redirect);
                    //                                    }, 500);
                                                        },
                                                        error : function(data){
                                                        var errors = $.parseJSON(data.responseText);
                                                        console.log(errors);
                                                        $.each(errors,function(index, value) {
                                                            toastr.error(value, 'Error!');
                                                            $('#'+index+'_help').html("<strong>"+value+"</strong>");
                                                            $('#'+index+'_div').addClass('has-error');
                                                        });
                                                        }
                                                    });
                                        });

                // process registration form the form
                    $('#glry').submit(function(event) {
                                            event.preventDefault();
//                                            var formData = new FormData($(this)[0]);
                                            $('.has-error').removeClass('has-error');
                                            $('.help-block').html('');
                                            var form_data = new FormData();
                                            var file_data = $('#files').prop('files');
                                            form_data.append('file', file_data);
                                            // process the form
                                                    $.ajax({
                                                        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
                                                        url         : "{{url('/Gallery')}}", // the url where we want to POST
                                                        data        : $(this).serialize(),
                                                        dataType    : 'json', // what type of data do we expect back from the server
                                                        processData: false,
//                                                        encode      : true,
                                                        cache       : false,
                                                        async       : false,
                                                        contentType: false,
                                                        success : function(data){
                                                        if(data.status == 'success'){
                                                            toastr.success(data.message, 'Success!');
//                                                            $('#step4_tab').trigger('click');
                                                        }else{
                                                            toastr.error(data.message, 'Error!');
                                                        }
                                                            var APP_URL = "{{ url('/') }}";
                    //                                    setTimeout(function() {
                    //                                        window.location.replace(data.redirect);
                    //                                    }, 500);
                                                        },
                                                        error : function(data){
                                                        var errors = $.parseJSON(data.responseText);
                                                        console.log(errors);
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
  

























<!-- $$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$$ -->



{{-- Main contant start --}}    


@stop

     








@push('js')
<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
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
