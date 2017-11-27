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
                      <fieldset>
                        <legend>{{ $info['sTitle']}}</legend>
                       		<div class="row">
							  <label class="col-lg-2 control-label">About Text</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['about_us'] }}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Skills Text</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['our_skills'] }}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">About Image</label>
							  <div class="col-lg-10">
							  	@if($info['winfo']['image_path'] != '')
								 <img src="{{URL::to('/') }}/public/aboutimages/{{ $info['winfo']['image_path']}}" width="100%">
								@endif
							  </div>
						 	</div>
							<div class="row">
							 	<div class="col-lg-2">
									<a class="btn btn-info" href="{{URL::to('/Adminiscontroller/ChangeWebAbout')}}/{{$info['winfo']['id']}}">Change</a>
								</div>
						 	</div>
                      </fieldset>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>

@endsection