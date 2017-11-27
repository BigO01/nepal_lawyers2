@extends('public.master')
@section('title','My Questions')


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
                <li role="presentation" class="active"><a href="{{ route('user_question') }}">My Questions</a></li>
                <li role="presentation"><a href="{{ route('user_appoinment') }}">My Appoinments</a></li>
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
              <h3 class="text-theme-colored mt-0 pt-5"> Your Questions List</h3>
              <hr>
             <!--###############################-->
@if(!empty($que_ans))    
    @foreach($que_ans as $q_s)  
      <!-- Questions -->
      <div class="icon-box pb-20 mb-20 col-sm-12">
        <a href="#" class="icon icon-gray pull-left mb-0 mr-10">
          <img src="{{ URL::to('public/profileimages'.'/'.$q_s->image_path ) }}" class="img-responsive" >
        </a>
        <h3 class="icon-box-title pt-15 mt-0 mb-10">{{ $q_s->first_name }} {{ $q_s->last_name }}</h3>
        <ul class="list-inline font-12 mb-20 mt-10">
          <li>posted by <a href="#" class="text-theme-colored">{{ $q_s->first_name }} |</a></li>
          <li><span class="text-theme-colored">{{ $q_s->Qdate }}</span></li>
        </ul>
        <hr>
        <p class="text-gray">{{ $q_s->question }}<br>{{ $q_s->question_detail }}</p>
        
        @if(!empty($answer) )
          @foreach($answer as $a)
            @if( $a->question_id == $q_s->Qid )
              <!-- Anwsers -->
              <div class="col-sm-11 col-sm-offset-1 mt-10" >
                <a href="#" class="icon icon-gray pull-left mb-0 mr-10">
                  <img src="{{ URL::to('public/profileimages'.'/'.$a->image_path ) }}" class="img-responsive" style="height: 65px; width: 65px;">
                </a>
                <h4 class="icon-box-title pt-15 mt-0 mb-10">{{ $a->first_name }} {{ $a->last_name }}</h4>
                <ul class="list-inline font-12 mb-20 mt-10">
                  <li>posted by <a href="#" class="text-theme-colored">{{ $a->first_name }} {{ $a->last_name }} |</a></li>
                  <li><span class="text-theme-colored">{{ $a->Adate }}</span></li>
                 </ul>
                <p class="text-gray">{{ $a->answer }}</p>
              </div>
            @endif  
          @endforeach
        @endif

      </div>
      <div class="separator separator-small-line separator-rouned">
        <i class="fa fa-pencil"></i>
      </div>
  @endforeach
  @else
      <h2 style="color:red;" class="text-center" >No Data Found</h2>
@endif
    </div>
             <!--###############################-->
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