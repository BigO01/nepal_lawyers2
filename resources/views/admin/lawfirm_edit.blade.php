@extends('admin/layout/master')
@section('main-content')
 <div class="content-wrapper">
		<div class="page-title">
			<div>
			
				<h1><i class="fa fa-user-plus"></i>{{ $info['eTitle'] }}</h1>
			 </div>
		 </div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-10">
                  <div class="well bs-component">
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.lawfirm', 'method'=>'post', 'id'=>'editlawfirm', 'class'=>'form-horizontal', 'files'=>'true']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['eTitle']}}</legend>
						@if ( $emailvalid = session()->get('emailvalidation') )
							<div class="alert {!! $emailvalid_class = session()->get('emailvalidtion_class') !!} alert-dismissible col-lg-12" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  {{ $emailvalid }}
							</div>
						@endif 
                        <div class="form-group">
							
							<?php $tem=$info['lawf'];
							 $tem[0]->ref_id ;?>
							<input type="hidden" name="id" value="{{ $tem[0]->ref_id }}">
							<input type="hidden" name="lid" value="{{ $tem[0]->id }}">
                          <label for="ufname" class="col-lg-2 control-label">Firm Name</label>
                          <div class="col-lg-10">
                            <input id="ufname" type="text" name="ufname" placeholder="Firm Name" class="form-control" value="{{ $tem[0]->first_name }}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="uemail" class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input id="uemail" type="email" name="uemail" placeholder="Email" class="form-control" value="{{ $tem[0]->email }}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="exp" class="col-lg-2 control-label">Service's Year</label>
                          <div class="col-lg-10">
                            <input id="exp" type="number" max="99" min="0" step=".1"  name="exp" placeholder="Experience" class="form-control" value="{{ $tem[0]->experience }}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="expertise" class="col-lg-2 control-label">Badges</label>
                          <div class="col-lg-10">
						    
							
							@foreach($info['badges'] as $badge)
								<input type="checkbox" id="{{$badge['id']}}" name="badge[]" value="{{$badge['id']}}"
								@for($t=0; $t<count($tem->lbadge); $t++)
									@if($tem->lbadge[$t]==$badge['id'])
									{ checked }
									@endif
								@endfor >
    <label for="{{$badge['id']}}">{{$badge['badge_title']}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
								
								@endforeach
								
                            
                          </div>
                        </div>
						<div class="form-group">
                          <label for="expertise" class="col-lg-2 control-label">Expertise</label>
                          <div class="col-lg-10">
						    
							
							@foreach($info['expertises'] as $expertise)
								<input type="checkbox" id="{{$expertise['id']}}" name="expertise[]" value="{{$expertise['id']}}"
								@for($t=0; $t<count($tem->lexpertise); $t++)
									@if($tem->lexpertise[$t]==$expertise['id'])
										checked
									@endif
								@endfor>
    <label for="{{$expertise['id']}}">{{$expertise['expertise_name']}}&nbsp;&nbsp;&nbsp;&nbsp;</label>
								
								@endforeach
								
                            
                          </div>
                        </div>
						<div class="form-group">
                          <label for="rgname" class="col-lg-2 control-label">Province</label>
                          <div class="col-lg-10">
						  	<select id="region" onchange="sta(this);" name="rgname" class="form-control" >
								<option value="">---Select---</option>
							@foreach($info['regions'] as $region)
								<option {{ $tem[0]->region_id == $region['id'] ? 'selected' : ''}} value="{{$region['id']}}"> {{$region['region_name']}} </option>
								@endforeach
                          	</select>
						  </div>
                        </div>
						<div class="form-group">
                          <label for="stname" class="col-lg-2 control-label">District</label>
                          <div class="col-lg-10">
						  	<select id="state" onchange="cities(this);" name="stname" class="form-control" >
								<option value="">---Select---</option>
							@foreach($info['states'] as $state)
								<option {{ $tem[0]->state_id == $state['id'] ? 'selected' : ''}} value="{{$state['id']}}">{{$state['state_name']}}</option>
							@endforeach
                          	</select>
						  </div>
                        </div>
						<div class="form-group">
                          <label for="ctname" class="col-lg-2 control-label">City</label>
                          <div class="col-lg-10">
						  	<select id="city" name="ctname" class="form-control" >
								<option value="">---Select---</option>
							@foreach($info['cities'] as $city)
								<option {{ $tem[0]->city_id == $city['id'] ? 'selected' : ''}} value="{{$city['id']}}">{{$city['city_name']}}</option>
								@endforeach
                          	</select>
						  </div>
                        </div>
						<div class="form-group">
                          <label for="uimg" class="col-lg-2 control-label">LawFirm Logo</label>
                          <div class="col-lg-10">
                            <input id="uimg" type="file" name="uimg" accept="image/jpeg, image/png" class="form-control" value="{{ $tem[0]->image_path }}">
							<img id="profileimg" src="{{URL::to('/') }}/public/profileimages/{{ $tem[0]->image_path}}" width="100px" height="100px">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="pa" class="col-lg-2 control-label">Premium Account</label>
                          <div class="col-lg-10">
                           <input class="cmt" type="checkbox" {{ $tem[0]->premium == 'on' ? 'checked' : ''}} name="pa">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="status" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="status" name="status" class="form-control">
								  <option value="">---Select---</option>
								  <option {{ $tem[0]->status == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $tem[0]->status == 0 ? 'selected' : ''}} value="0">Disable</option>
                            	</select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">{{$info['upBtnTxt']}}</button>
                          </div>
                        </div>
                      </fieldset>
					  {!! Form::close() !!}
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

@endsection