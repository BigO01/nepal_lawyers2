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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.slide', 'method'=>'post', 'id'=>'editslide', 'class'=>'form-horizontal','files'=>'true']) !!}
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
							<input type="hidden" name="id" value="{{ $info['slide']['id']}}">
                          <label for="heading" class="col-lg-2 control-label">Slide Heading</label>
                          <div class="col-lg-10">
                            <input id="heading" type="text" name="heading" placeholder="Badge Name" class="form-control" value="{{ $info['slide']['slide_heading']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="subheading" class="col-lg-2 control-label">Slide Sub Heading</label>
                          <div class="col-lg-10">
                            <input id="subheading" type="text" name="subheading" placeholder="Slide Sub Heading" class="form-control" value="{{ $info['slide']['slide_subheading']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="slidetext" class="col-lg-2 control-label">Slide Text</label>
                          <div class="col-lg-10">
                            <textarea id="slidetext" name="slidetext" placeholder="Slide Text" class="form-control">{{ $info['slide']['slide_text']}}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="slideimg_input" class="col-lg-2 control-label">Slide Image</label>
                          <div class="col-lg-10">
                            <input id="slideimg_input" type="file" name="slideimg_input" accept="image/png"class="form-control" value="{{ $info['slide']['image_path']}}" onChange="bimgfn(this)">
							<img id="slideimg" src="{{URL::to('/') }}/public/sliderimages/{{ $info['slide']['image_path'] }}" widht="100%">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['slide']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['slide']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
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