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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.webabout', 'method'=>'post', 'id'=>'webabout', 'class'=>'form-horizontal', 'files'=>'true']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['sTitle']}}</legend>
                        <div class="form-group">
							<input type="hidden" name="id" value="{{$info['winfo']['id']}}">
                          <label for="about_text" class="col-lg-2 control-label">About Us Text</label>
                          <div class="col-lg-10">
                            <textarea id="about_text" name="about_text" placeholder="Website About" class="form-control" required>
							{{$info['winfo']['about_us']}}
							</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="skill_text" class="col-lg-2 control-label">Skills Text</label>
                          <div class="col-lg-10">
                            <textarea id="skill_text" name="skill_text" placeholder="Website Skill Text" class="form-control" required>
							{{$info['winfo']['our_skills']}}
							</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="aimg" class="col-lg-2 control-label">About Image</label>
                          <div class="col-lg-10">
                            <input id="aimginput" type="file" name="aimg" accept="image/jpeg, image/png" class="form-control" onChange="adimg(this)">
							<img id="aimg" src="{{URL::to('/') }}/public/aboutimages/{{ $info['winfo']['image_path'] }}" width="100%">
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
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