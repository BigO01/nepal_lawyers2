@extends('public.master')
@section('title','FAQ')
@section('faq',"class=active")

@section('content')

{{-- Main contant start --}}


<section>
      <div class="container pt-20">
        <div class="heading-line-bottom pb-15 mt-0 mb-30 col-sm-12">
            <h3 class="heading-title text-center" style="color:#F55E45;">FAQ</h3>
        </div>

        <h3>Total Results: {{ $faqs->total() }} </h3>
        <h5>In this page ({{ $faqs->count() }} results) </h5>
        <div class="row">
          <div class="col-md-9">
            <div id="accordion1" class="panel-group accordion">
        @foreach($faqs as $faq)      
              <div class="panel">
                <div class="panel-title"> <a data-parent="#accordion{{$faq->id}}" data-toggle="collapse" href="#accordiona{{$faq->id}}" aria-expanded="true"> <span class="open-sub"></span> <strong>{{ $faq->question }}</strong></a> </div>
                <div id="accordiona{{$faq->id}}" class="panel-collapse collapse" role="tablist" aria-expanded="true">
                  <div class="panel-content">
                    <p>{{ $faq->answer }}</p>
                  </div>
                </div>
              </div>
        @endforeach      
            </div>
          </div>
<!-- Side Bar -->         
          
        <div class="col-sm-12 col-md-3 mt-20">
            <div class="sidebar sidebar-right mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">Practice Area</h5>
                <div class="categories">
                  <ul class="list list-border angle-double-right">
                  @foreach($expertises as $exp)
                    <li><a href="{{ route('findlawyer_list',[$exp->id]) }}">{{ $exp->expertise_name }}</a></li>
                  @endforeach  
                  </ul>
                </div>
              </div>
            </div>
          </div>          
    

          
        </div>
      </div>
    </section>


{{-- Main contant ends --}}

@stop
