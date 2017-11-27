@extends('admin/layout/master')
@section('main-content')
 <div class="content-wrapper">
		<div class="page-title">
			<div>
				<h1><i class="fa fa-user-plus"></i>{{ $info['sTitle'] }}</h1>
			 </div>
		 </div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-10">
					
                  <div class="well bs-component">
				  	 {!! Form::open(['route'=>'Adminiscontroller/save.slide', 'method'=>'post', 'id'=>'addslide', 'class'=>'form-horizontal','files'=>'true']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['sTitle']}}</legend>
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
                          <label for="heading" class="col-lg-2 control-label">Slide Heading</label>
                          <div class="col-lg-10">
                            <input id="heading" type="text" name="heading" placeholder="Slide Heading" class="form-control" value="{{ old('heading')}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="subheading" class="col-lg-2 control-label">Slide Sub Heading</label>
                          <div class="col-lg-10">
                            <input id="subheading" type="text" name="subheading" placeholder="subheading" class="form-control" value="{{ old('subheading')}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="slidetext" class="col-lg-2 control-label">Slide Text</label>
                          <div class="col-lg-10">
                            <textarea id="slidetext" name="slidetext" placeholder="Slide Text" class="form-control"></textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="slideimg" class="col-lg-2 control-label">Slider Image</label>
                          <div class="col-lg-10">
                            <input id="slideimg_input" type="file" name="slideimg_input" accept="image/png image/jpg image/jpeg"class="form-control" value="{{ old('slideimg_input')}}" required onChange="slideimgfn(this)">
							<img id="slideimg" src="#" widht="100%">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option selected value="1">Enable</option>
								  <option value="0">Disable</option>
                            	</select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button type="reset" class="btn btn-default">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
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