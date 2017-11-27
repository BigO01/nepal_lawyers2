@extends('public.master')
@section('title','Question Board')
@section('questions',"class=active")

@section('content')

{{-- Main contant start --}}


<section>
<div class="container pt-20">
  <div class="row">
    <div class="col-md-9">
            
      <div class="heading-line-bottom pb-15 mt-0 mb-10 col-sm-12">
        <h3 class="heading-title text-center" style="color:#F55E45;">Question Board</h3>
      </div>
  
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
      

        <div class="col-sm-11 col-sm-offset-1 mt-10" >
          {!! Form::open(['route'=>'answer','name'=>'ans_form','class'=>'quick-contact-form','id'=>'ans_form']) !!}
            @if(!empty(Auth::user()->id))
              <input type="hidden" name="r_id" value="{{ Auth::user()->id }} ">
            @endif  
              <input type="hidden" name="q_id" value="{{ $q_s->Qid }}">
              <input type="text" name="ans" class="form-control" placeholder="Write Your Anwser Here" />
              <?php echo $errors->first('ans', "<li style='color:red'>:message</li>") ?>
            @if(!empty(Auth::user()->id))  
              <button class="btn btn-info mt-10" type="submit" > Submit </button>
            @else
              <a class="btn btn-info mt-10" href="{{ route('login') }}" > Submit </a>
              <p class="mt-10"><span><span style="color:red">* </span>Please login first!</span></p>
            @endif  
          {!! Form::close() !!}

<script type="text/javascript">
  $("#ans_form").validate();
</script>

        </div>

      </div>
      <div class="separator separator-small-line separator-rouned">
        <i class="fa fa-pencil"></i>
      </div>
  @endforeach
  @else
      <h2 style="color:red;" class="text-center" >No Data Found</h2>
@endif
    </div>
      
<!-- Side Bar -->     
      
          <div class="col-sm-12 col-md-3 mt-20">
            <div class="sidebar sidebar-right mt-sm-30">
              <div class="widget">
                <h5 class="widget-title line-bottom">Practice Areas</h5>
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
