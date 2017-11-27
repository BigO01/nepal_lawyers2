@extends('public.master')
@section('title', 'Profile')


@section('content')

<script type="text/javascript">
	$(document).ready(function(){
	document.getElementById("file").onchange = function() {
    document.getElementById("sub").submit();
		};
	});
</script>
    <!-- Section: inner-header -->
    <section class="img-fullwidth border-1px" style="background-image: url({{ URL::to('public/profileimages/'.$data->lBG )}}), url({{ URL::to('public/profileimages/'.$data->fBG)}}); background-size:cover; height: 265px;">
      <div class="container">
        <!-- Section Content -->
        <div class="section-content text-center">
          <div class="row"> 
            <div class="col-md-12">
              <h3 class="text-theme-colored font-36">Attorney Details</h3>
            </div>
          </div>
        </div>
      </div>

      	{!! Form::open(['route'=>'cover','id'=>'sub','enctype'=>'multipart/form-data']) !!}
      	<input type="hidden" name="id" value="{{$data->fID}}{{$data->lID}}">
		    <div class="box" style="text-align: center; background: transparent; border:none; ">
			    <input  style=" 
			    width: 0.1px;
			    height: 0.1px;
			    opacity: 0;
			    overflow: hidden;
			    position: absolute;
			    z-index: -1;
			    max-width: 80%;
			    font-size: 1.25rem;
			    font-weight: 700;
			    text-overflow: ellipsis;
			    white-space: nowrap;
			    cursor: pointer;
			    display: inline-block;
			    overflow: hidden;
			    padding: 0.625rem 1.25rem;
			  " 
			            type="file" name="img" id="file" class="inputfile inputfile-4" accept="image/*">
			    <label for="file"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg></figure> <span>Chnge cover image</span></label>
  			</div>
  			<?php echo $errors->first('img', "<li style='color:red'>:message</li>") ?> 
		{!! Form::close() !!}       
    </section>
      
    <!-- Section: Practice Area -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-8 col-xs-8 pull-right pl-60">
              <div class="attorney-info">
                 <h3 class="mt-0 mb-0">{{ $data->first_name }}{{ $data->last_name }}</h3>
                 <h4 class="mt-0 text-gray">{{ $data->role }}</h4>

              @if(!empty($data->law_firm_id))
                 <span><i class="fa fa-registered fa-2x"></i><h4 class="cil">
                 <b>Firm Name: </b> 
                  <span>
                @foreach ($lawfirm_names as $name)
                  @if($data->law_firm_id == $name->id)
                    <a href="{{$name->id}}"> {{ $name->first_name. $name->last_name }}</a>
                  @endif
                @endforeach   
                  </span>

                 </h4></span>
				      @endif

              </div>
              <div class="mt-30">
                <ul class="nav nav-tabs">
                  
          <li class="active"><a data-toggle="tab" href="#tab2" aria-expanded="false">Profile</a></li>
				  <li class=""><a data-toggle="tab" href="#tab3" aria-expanded="true">Experience</a></li>
				  <li class=""><a data-toggle="tab" href="#tab4" aria-expanded="false">Office Hours</a></li>
				  <li class=""><a data-toggle="tab" href="#tab5" aria-expanded="false">Consultation Fee</a></li>
          <li><a data-toggle="tab" href="#tab1" aria-expanded="false">Gallery</a></li>
@if($data->role == 'lawfirm')
          <li><a data-toggle="tab" href="#tab6" aria-expanded="false">Lawyer List</a></li>
@endif                
                </ul>
                <div class="tab-content">
				          <div id="tab1" class="tab-pane fade">
                    
                    <div class=" row grid-4 gutter-small clearfix" data-lightbox="gallery" >
                    @foreach($imgz as $img)
                      <!-- Portfolio Item Start -->
                      <div class="col-md-3"> 
                        <div class="portfolio-item pt-im ">
                          <a href="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" data-lightbox="gallery-item" title="Title Here 1">
                            <img  pt-im src="{{ URL::to('public/clientphotos/watermark'.$img->image_path )}}" alt="">
                          </a>
                        </div>
                    </div>
                      <!-- Portfolio Item End -->
                   @endforeach    
                    </div>
                  </div>
                  <div id="tab2" class="tab-pane fade active in">
				  		      <p>{{ $data->l_description }}{{ $data->f_description }}</p>
                  </div>
                  <div id="tab3" class="tab-pane fade">
                    <h5>Experience In:</h5>
                  	<ul class="list angle-double-right">
                      <li>Represented individuals and their S-Corporation with respect to accounting malpractice and overbilling claims against a top 5 accounting firm.</li>
                      <li>Represented an employment services and immigration company and its former officers and employees in civil actions alleging fraud and breach of contract.</li>
                      <li>Represented an employment services and immigration company in a civil forfeiture action resulting in the return of over $500,000 in funds seized by the government.</li>
                      <li>Represented an employment services and immigration company in a civil forfeiture action resulting in the return of over $500,000 in funds seized by the government.</li>
                      <li>Represented an employment services and immigration company in a civil forfeiture action resulting in the return of over $500,000 in funds seized by the government.</li>
                      <li>Represented a government contractor in a theft of trade secrets action.</li>
                    </ul>
					
                  </div>
                  
				    <div id="tab4" class="tab-pane fade">
              <ul class="list angle-double-right">
@foreach($dateTime as $time)
                      <li><i class="fa fa-clock-o fa-2x"></i> <span>{{ $time->day }} : {{ $time->time_from }} to {{ $time->time_to }}</span></li>
@endforeach
                    </ul>
            </div>
				  <div id="tab5" class="tab-pane fade">
                    <ul class="list angle-double-right">
                      <li><span class="time-txt">First Meet Fee</span> : {{ $data->l_fee_first }}{{ $data->f_fee_first }}</li>
                      <li><span class="time-txt">Hourly Fee</span> : {{ $data->l_fee_hourly}}{{ $data->f_fee_hourly }}</li>
                    </ul>
                  </div>
                 
                  <div id="tab6" class="tab-pane fade">
                        <div class="list-dashed">
                         @foreach($firm_lawyers as $lawyer)
                          <article class="post media-post clearfix pb-0 mb-10"> <a href="{{ $lawyer->id }}" class="post-thumb"><img alt="" src="{{ URL::to('public/profileimages/'.$lawyer->image_path) }}" class="img-responsive" width="75"></a>
                            <div class="post-right">
                              <h5 class="post-title mt-0"><a href="{{ $lawyer->id }}">{{ $lawyer->first_name }}{{ $lawyer->last_name }}</a></h5>
                              <p>{{ $lawyer->role }}</p>
                              <a href="{{ $lawyer->id }}" class="btn btn-info btn-sm">View Lawyer</a>
                            </div>
                          </article>
                          @endforeach  
                        </div>
                  </div>

                </div>
              </div>
              <div class="row multi-row-clearfix mt-30">
                <div class="col-md-8 col-md-offset-2">
                  <div class="small-title mb-30">
                    <i class="fa fa-question-circle pull-left"></i>
                    <h4 class="title">FAQ</h4>
                  </div>
                  <div class="panel-group accordion style2" id="accordion2">
                    <div class="panel">
                      <div class="panel-title"> <a href="#accordion21" data-toggle="collapse" data-parent="#accordion2" class="active"> <span class="open-sub"></span> Best Case Strategy </a> </div>
                      <div class="panel-collapse collapse in" id="accordion21">
                        <div class="panel-content">
                          <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-title"> <a href="#accordion22" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Review your Case Documents </a> </div>
                      <div class="panel-collapse collapse" id="accordion22">
                        <div class="panel-content">
                          <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                        </div>
                      </div>
                    </div>
                    <div class="panel">
                      <div class="panel-title"> <a href="#accordion23" data-toggle="collapse" data-parent="#accordion2"> <span class="open-sub"></span> Fight for Justice </a> </div>
                      <div class="panel-collapse collapse" id="accordion23">
                        <div class="panel-content">
                          <p>Ut cursus massa at urnaaculis estie. Sed aliquamellus vitae ultrs condmentum leo massa mollis estiegittis miristum nulla.</p>
                        </div>
                      </div>
                    </div>
                  </div>      
                </div>
              </div>
            </div>
            <div class="col-sx-12 col-sm-4 col-md-4 col-xs-4 sidebar pull-left" style="padding-right: 0px !important;">
              <div class="attorney-thumb">
@if(!empty($data->l_premium) || !empty($data->f_premium))
                <div class="ribbon"><span>Premium</span></div>
@endif              
                <img src="{{ URL::to('public/profileimages/'.$data->image_path )}}" alt="Profile" class="img-fullwidth img-responsive">
              </div>
              <div class="attorney-address mt-30">
                <ul>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-balance-scale"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Practices:</span>
			<?php 

				  $df = explode(',', $data->f_expertise_id);
				  $dl = explode(',', $data->l_expertise_id);
				  foreach ($df as $key) {
				  	foreach($expertises as $ex){
				  		if($key == $ex->id){
				  			echo "<br>". $ex->expertise_name;
				  		}
				  	}
				  }
				  foreach ($dl as $key) {
				  	foreach($expertises as $ex){
				  		if($key == $ex->id){
				  			echo "<br>".$ex->expertise_name;
				  		}
				  	}
				  }

			?>
                        

                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-book"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Education:</span>
                    @foreach($edu as $e) 
                    	 
                        	<br>{{ $e->education_name }}
                       
					          @endforeach
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="media">
                      <div class="media-left">
                        <i class="fa fa-map-marker"></i>
                      </div>
                      <div class="media-body">
                        <p><span>Address:</span>
                        <br>{{ $data->region_name }}, 
@foreach($state as $s) 
    @if($data->state_id == $s->id)   
        {{ $s->state_name }}, 
    @endif 
@endforeach
@foreach($city as $c) 
    @if($data->city_id == $c->id)   
        {{ $c->city_name }} 
    @endif 
@endforeach
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@stop
