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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.post', 'method'=>'post', 'id'=>'editpost', 'class'=>'form-horizontal', 'files'=>'true']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['eTitle']}}</legend>
                       
						<div class="form-group">
                          <label for="post_title" class="col-lg-2 control-label">Post Title</label>
                          <div class="col-lg-10">
                            <input type="hidden" name="id" value="{{ $info['post']['id'] }}">
							<input id="user_id" type="hidden" name="user_id" value="211">
							<input id="post_title" type="text" name="post_title" placeholder="Post Title" class="form-control" value="{{ $info['post']['post_title'] }}" required>
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="desc" class="col-lg-2 control-label">Description</label>
                          <div class="col-lg-10">
                            <textarea id="desc" name="desc" placeholder="Post Description" class="form-control">{{ $info['post']['descryption'] }}</textarea>
                          </div>
                        </div>		
						<div class="form-group">
                          <label for="uimg" class="col-lg-2 control-label">Post Image</label>
                          <div class="col-lg-10">
                            <input id="uimg" type="file" name="pimg" accept="image/jpeg, image/png" class="form-control" onChange="readURL(this)" >
							<img id="profileimg" src="{{URL::to('/') }}/public/blogimages/{{ $info['post']['image_path'] }}" width="100%">		
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="status" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control">
								  <option value="">---Select---</option>
								  <option {{ $info['post']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['post']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
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