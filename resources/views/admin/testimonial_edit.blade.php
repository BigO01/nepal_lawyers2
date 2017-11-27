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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.testimonial', 'method'=>'post', 'id'=>'addtestimonial', 'class'=>'form-horizontal','files'=>'true']) !!}
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
                          <label for="uname" class="col-lg-2 control-label">User Name</label>
                          <div class="col-lg-10">
						  <input type="hidden" name="id" value="{{ $info['testi']['id']}}">
                            <input id="uname" type="text" name="uname" placeholder="User Name" class="form-control" value="{{ $info['testi']['name']}}"" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="desig" class="col-lg-2 control-label">Designation</label>
                          <div class="col-lg-10">
                            <input id="desig" type="text" name="desig" placeholder="Designation" class="form-control" value="{{ $info['testi']['designation']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="msg" class="col-lg-2 control-label">Message</label>
                          <div class="col-lg-10">
                            <textarea id="msg" type="text" name="msg" placeholder="Message" class="form-control" required>{{ $info['testi']['message']}}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="uimg_input" class="col-lg-2 control-label">User Image</label>
                          <div class="col-lg-10">
                            <input id="uimg_input" type="file" name="uimg" accept="image/png , image/jpeg , image/jpg" class="form-control" value="{{ $info['testi']['image_path']}}" onChange="uimgfn(this)">
							<img id="uimg" src="{{URL::to('/') }}/public/testimonialimages/{{ $info['testi']['image_path'] }}" width="100%">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['testi']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['testi']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
                            	</select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Update Record</button>
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