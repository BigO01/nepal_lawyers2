@extends('public.master')
@section('title','My Appoinments')


@push('css')        
   <!-- Favicon -->

@endpush


@section('content')

{{-- Main contant start --}}
          
     <section class="divider">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <img src="{{ URL::to('public/profileimages/'.Auth::user()->image_path) }}" alt="No Image Found">
            <ul class="nav nav-pills nav-stacked mt-30">
                <li role="presentation"><a href="{{ url('/setting') }}">Profile</a></li>
                <li role="presentation"><a href="{{ route('user_question') }}">My Questions</a></li>
                <li role="presentation" class="active"><a href="{{ route('user_appoinment') }}">My Appoinments</a></li>
                <li role="presentation">
                  <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                      {{ csrf_field() }}
                    </form>
                </li>  
            </ul>
          </div>
          <div class="col-sm-9">
            <div class="border-1px p-30 mb-0">
              <h3 class="text-theme-colored mt-0 pt-5"> Your Appointments List</h3>
              <hr>
            @if(!empty($appoinments))
              @foreach($appoinments as $appoinment)
                  <div class="panel panel-default">
                    <div class="panel-heading"><b>Appointment Date:</b> {{ $appoinment->appointment_date }}</div>
                    <div class="panel-body">
                     <b>Message: </b>{{ $appoinment->massege }} <br>
                     <p  class="mt-20"><b>Appointment With:</b> Nepal Lawyers</p>
                    </div>
                  </div>
              @endforeach
            @else
                <h3 style="color: blue;" class="text-center" > No Record Found </h3>
            @endif
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>

            
{{-- End Main contant  --}}
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