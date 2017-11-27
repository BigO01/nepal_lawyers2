@extends('public.master')
@section('title', 'Contact Us')
@section('contact', "class=active")


@section('content')

    <!-- Divider: Contact -->
    <section class="divider">
      <div class="container">

          <div class="heading-line-bottom pb-15 mt-0 mb-30 col-sm-12">
            <h3 class="heading-title text-center" style="color:#F55E45;">Contact Us</h3>
        </div>

        <div class="row pt-30">
          <div class="col-md-4">
            <div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-map-2 text-theme-colored"></i></a>
                  <div class="media-body"> <strong>OUR OFFICE LOCATION</strong>
                    <p>{{ $web_info->address }}</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-call text-theme-colored"></i></a>
                  <div class="media-body"> <strong>OUR CONTACT NUMBER</strong>
                    <p>{{ $web_info->contact_number }}</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-12 col-sm-6 col-md-12">
                <div class="icon-box left media bg-deep p-30 mb-20"> <a class="media-left pull-left" href="#"> <i class="pe-7s-mail text-theme-colored"></i></a>
                  <div class="media-body"> <strong>OUR CONTACT E-MAIL</strong>
                    <p>{{ $web_info->email }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <h3 class="mt-0 mb-30">Interested in discussing?</h3>
            <!-- Contact Form -->
            {!! Form::open(['route'=>'sendemail','id'=>'contactForm']) !!}

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Name <small>*</small></label>
                    <input type="text" placeholder="Enter Name" value="{{ old('name') }}" data-msg-required="Please enter your name." class="form-control" name="name" id="form_name" required>
					         <?php echo $errors->first('name', "<li style='color:red'>:message</li>") ?> 
                  </div>
                </div>

				        <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Subject <small>*</small></label>
                    <input type="text" placeholder="Subject" value="{{ old('subject') }}" data-msg-required="Please enter the subject." class="form-control required" name="subject" id="form_subject" required>
					         <?php echo $errors->first('subject', "<li style='color:red'>:message</li>") ?>
                  </div>
                </div>
            </div>    
 
        	  <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label for="form_email">Email <small>*</small></label>
                    <input type="email" placeholder="Your E-mail" value="{{ old('email1') }}" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." class="form-control" name="email1" id="form_email" required>
					         <?php echo $errors->first('email1', "<li style='color:red'>:message</li>") ?> 
                  </div>
                </div>
			      </div>

      			<div class="row">
      			  <div class="col-sm-12">
                <div class="form-group">
                  <label for="form_name">Message</label>
                  <textarea maxlength="5000" placeholder="Message" data-msg-required="Please enter your message." rows="5" class="form-control required" name="message" id="form_message" rows="5" required></textarea>
                </div>
              </div> 
            </div> 

            <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                <button type="submit" class="btn btn-dark btn-theme-colored btn-flat mr-5" name="submit" data-loading-text="Please wait...">Send your message</button>
              </div>
            </div> 
            </div> 
            {!! Form::close() !!}

            <!-- Contact Form Validation-->
            <script type="text/javascript">
              $("#contactForm").validate();
            </script>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Divider: Google Map -->
    <section>
      <div class="container-fluid p-0">
        <div class="row">

          <!-- Google Map HTML Codes -->
          <div 
            data-address="{{ $web_info->full_address }}"
            data-popupstring-id="#popupstring1"
            class="map-canvas autoload-map"
            data-mapstyle="style2"
            data-height="400"
            data-latlng="{{$web_info->longitude}},{{$web_info->latitude}}"
            data-title="{{ $web_info->location_title }}"
            data-zoom="12"
            data-marker="{{ URL::to('public/new/images/map-icon-blue.png') }}">
          </div>
          <div class="map-popupstring hidden" id="popupstring1">
            <div class="text-center">
              <h3>{{ $web_info->address }}</h3>
              <p>{{ $web_info->full_address }}</p>
            </div>
          </div>

          <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAezXdMpdvu96ZXAIwKSEgg3p-J6D0sT2A"></script>
          <script src="{{ URL::to('public/new/js/google-map-init.js') }}"></script>

        </div>
      </div>
    </section>


@stop

