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
							  <label class="col-lg-2 control-label">Premium Status</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['web_premium']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Website Title</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['title']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Friendly Name</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['web_friendlyname']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Email</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['email']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Contact Number</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['contact_number']}}</span>
							  </div>
						 	</div>
							<legend>Socail Links</legend>
							<div class="row">
							  <label class="col-lg-2 control-label">Facebook Link</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['facebook']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Google Plus Link</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['google']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">LinkedIn Link</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['li']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Twitter Link</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['twitter']}}</span>
							  </div>
						 	</div>
							<legend>SEO Informtion</legend>
							<div class="row">
							  <label class="col-lg-2 control-label">KeyWords</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['keywords']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Google Analytics</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{$info['winfo']['google_analytics']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Description</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['description']}}</span>
							  </div>
						 	</div>
							<legend>Addresses</legend>
							<div class="row">
							  <label class="col-lg-2 control-label">Longitude</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['longitude']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Latitude</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['latitude']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Location Title</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['location_title']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Address</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['address']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Full Address</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['full_address']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">API Key</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['api_key']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Copy Right</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['copyright']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Currency</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['currency']}}</span>
							  </div>
						 	</div>
							<legend>Wesite Images</legend>
							
							<div class="row">
							  <label class="col-lg-2 control-label">Testimonial Background</label>
							  <div class="col-lg-10">
							  	@if($info['winfo']['testimonial_bg'] != '')
								 <img src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['testimonial_bg'] }}" width="100%">
								@else
								<label>Testimonial Background Image not Found.</label>
								@endif
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Ad Banner</label>
							  <div class="col-lg-10">
							  	@if($info['winfo']['ad_banner'] != '')
								 <img src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['ad_banner']}}" width="100%">
								@else
								<label>Ad Banner Image not Found.</label>
								@endif
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Ad Banner Status</label>
							  <div class="col-lg-10">
								 <span class="control-label">{{ $info['winfo']['ad_banner_status']}}</span>
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Logo</label>
							  <div class="col-lg-10">
							  	@if($info['winfo']['logo'] != '')
								 <img src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['logo']}}">
								@else
								<label>Header Logo Image not Found.</label>
								@endif
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Footer Logo</label>
							  <div class="col-lg-10">
							  	@if($info['winfo']['footer_logo'] != '')
								 <img src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['footer_logo']}}">
								@else
								<label>Footer Logo Image not Found.</label>
								@endif
							  </div>
						 	</div>
							<div class="row">
							  <label class="col-lg-2 control-label">Favicon Image</label>
							  <div class="col-lg-10">
							  	@if($info['winfo']['favicon'] != '')
								 <img src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['favicon']}}">
								 @else
								<label>Favicon Image not Found.</label>
								 @endif
							  </div>
						 	</div>
							<div class="row">
							 	<div class="col-lg-2">
									<a class="btn btn-info" href="{{URL::to('/Adminiscontroller/ChangeWebInfo')}}/{{$info['winfo']['id']}}">Change</a>
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