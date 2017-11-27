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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.badge', 'method'=>'post', 'id'=>'editbadge', 'class'=>'form-horizontal','files'=>'true']) !!}
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
							<input type="hidden" name="id" value="{{ $info['badge']['id']}}">
                          <label for="bdname" class="col-lg-2 control-label">Badge Name</label>
                          <div class="col-lg-10">
                            <input id="bdname" type="text" name="bdname" placeholder="Badge Name" class="form-control" value="{{ $info['badge']['badge_title']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="color" class="col-lg-2 control-label">Background Color</label>
                          <div class="col-lg-10">
                            <input id="color" type="text" name="color" placeholder="Select Color" class="form-control" value="{{ $info['badge']['color']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="bimg_input" class="col-lg-2 control-label">Png Image</label>
                          <div class="col-lg-10">
                            <input id="bimg_input" type="file" name="bimg_input" accept="image/png"class="form-control" value="{{ $info['badge']['image_path']}}" onChange="bimgfn(this)">
							<img id="bimg" src="{{URL::to('/') }}/public/webimages/{{ $info['badge']['image_path'] }}" widht="100px" height="100px">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['badge']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['badge']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
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