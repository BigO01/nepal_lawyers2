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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.city', 'method'=>'post', 'id'=>'addcity', 'class'=>'form-horizontal']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['eTitle']}}</legend>
						@if(count($errors))
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $err)
								<li>{{ $err }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                        <div class="form-group">
							<input type="hidden" name="id" value="{{ $info['city']['id']}}">
                          <label for="stname" class="col-lg-2 control-label">State Name</label>
                          <div class="col-lg-10">
                            <select name="stname" class="form-control" required>
								<option value="">---Select---</option>	
								
								@foreach($info['states'] as $st)
									<option {{ $info['city']['state_id'] == $st['id'] ? 'selected' : ''}} value="{{$st['id']}}">{{ $st['state_name']}} </option>
								@endforeach
							
							</select>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="ctname" class="col-lg-2 control-label">City Name</label>
                          <div class="col-lg-10">
                            <input id="ctname" type="text" name="ctname" placeholder="City Name" class="form-control" value="{{ $info['city']['city_name'] }}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="ltd" class="col-lg-2 control-label">Latitude</label>
                          <div class="col-lg-10">
                            <input id="ltd" type="text" name="ltd" placeholder="Longitude" class="form-control" value="{{ $info['city']['longitude'] }}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="lgd" class="col-lg-2 control-label">Longitude</label>
                          <div class="col-lg-10">
                            <input id="lgd" type="text" name="lgd" placeholder="Longitude" class="form-control" value="{{ $info['city']['longitude'] }}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['city']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['city']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
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