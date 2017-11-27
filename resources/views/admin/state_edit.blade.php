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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.state', 'method'=>'post', 'id'=>'editregion', 'class'=>'form-horizontal']) !!}
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
                          <label for="rgname" class="col-lg-2 control-label">Provinces Name</label>
                          <div class="col-lg-10">
                            <select name="rgname" class="form-control" required>
								<option value="">---Select---</option>	
								
								@foreach($info['regions'] as $rg)
									<option {{ $info['state']['region_id'] == $rg['id'] ? 'selected' : ''}} value="{{$rg['id']}}">{{ $rg['region_name']}} </option>
								@endforeach
							
							</select>
                          </div>
                        </div>
                        <div class="form-group">
						<input type="hidden" name="id" value="{{ $info['state']['id'] }}">
                          <label for="stname" class="col-lg-2 control-label">District Name</label>
                          <div class="col-lg-10">
                            <input id="stname" type="text" name="stname" placeholder="District Name" class="form-control" required value="{{ $info['state']['state_name'] }}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="lgd" class="col-lg-2 control-label">Longitude</label>
                          <div class="col-lg-10">
                            <input id="lgd" type="number" step=".000001" name="lgd" placeholder="Longitude" class="form-control" value="{{ $info['state']['longitude'] }}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="ltd" class="col-lg-2 control-label">Latitude</label>
                          <div class="col-lg-10">
                            <input id="ltd" type="number" step=".000001" name="ltd" placeholder="Latitude" class="form-control" value="{{ $info['state']['latitude'] }}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['state']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['state']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
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