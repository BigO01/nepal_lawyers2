@extends('public.master')
@section('title', 'About Us')
@section('about', "class=active")


@section('content')
    
    <!-- Section: About -->
    <section>
      <div class="container">
        <div class="heading-line-bottom pb-15 mt-0 mb-30 col-sm-12">
          <h3 class="heading-title text-center" style="color:#F55E45;">About Us</h3>
        </div>
        <div class="row">
          <div class="col-md-7">
            <h3 class="mt-0">About Us</h3>
            <p>{{$web_about->about_us}}</p>
            <h3>Our Skills</h3>
            <p>{{$web_about->our_skills}}</p>
            <br>

          </div>
          <div class="col-md-5">
            <div class="thumb"> <img class="img-fullwidth" src="{{ URL::to('/') }}/public/aboutimages/{{$web_about->image_path }}" alt="fskjfhgkjs"> </div>
            <h4 class="mt-20">Why Choose Us?</h4>
            <div class="panel-group accordion style2 mb-0 mt-20" id="accordion_aa">
            @foreach( $faqs as $f)  
              <div class="panel">
                <div class="panel-title"> <a href="#accordion{{$f->id}}" data-toggle="collapse" data-parent="#accordion_aa"> <span class="open-sub"></span> {{ $f->question }} </a> </div>
                <div class="panel-collapse collapse" id="accordion{{$f->id}}">
                  <div class="panel-content">
                    <p>{{ $f->answer }}</p>
                  </div>
                </div>
              </div>
            @endforeach 
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- divider: what makes us different -->

  <!-- Divider: Funfact -->
    {{--<section class="divider layer-overlay overlay-light" data-stellar-background-ratio="0.5" >
      <div class="container pt-50 pb-50">
        <div class="row">
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact style-1 pb-15 pt-15 p-20 bg-lightest">
              <i class="pe-7s-smile text-black-light mt-5 font-48 pull-right" data-text-color="#ccc"></i>
              <h2 class="animate-number text-theme-colored mt-0 font-48" data-value="754" data-animation-duration="2000">0</h2>
              <div class="clearfix"></div>
              <h4 class="text-uppercase font-14">Happy Clients</h4>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact style-1 pb-15 pt-15 p-20 bg-lightest">
              <i class="pe-7s-hammer text-black-light mt-5 font-48 pull-right" data-text-color="#ccc"></i>
              <h2 class="animate-number text-theme-colored mt-0 font-48" data-value="125" data-animation-duration="2500">0</h2>
              <div class="clearfix"></div>
              <h4 class="text-uppercase font-14">Cases Success</h4>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact style-1 pb-15 pt-15 p-20 bg-lightest">
              <i class="pe-7s-magic-wand text-black-light mt-5 font-48 pull-right"></i>
              <h2 class="animate-number text-theme-colored mt-0 font-48" data-value="45" data-animation-duration="3000">0</h2>
              <div class="clearfix"></div>
              <h4 class="text-uppercase font-14">Recovered</h4>
            </div>
          </div>
          <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
            <div class="funfact style-1 pb-15 pt-15 p-20 bg-lightest">
              <i class="pe-7s-portfolio text-black-light mt-5 font-48 pull-right" data-text-color="#ccc"></i>
              <h2 class="animate-number text-theme-colored mt-0 font-48" data-value="225" data-animation-duration="2500">0</h2>
              <div class="clearfix"></div>
              <h4 class="text-uppercase font-14">Cases Done</h4>
            </div>
          </div>
        </div>
      </div>
    </section>
  --}}

@stop