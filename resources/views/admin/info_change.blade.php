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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.webinfo', 'method'=>'post', 'id'=>'adduser', 'class'=>'form-horizontal', 'files'=>'true']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['sTitle']}}</legend>
                         <div class="form-group">
							<input type="hidden" name="id" value="{{$info['winfo']['id']}}">
                          <label for="prests" class="col-lg-2 control-label">Premium Status:</label>
                          <div class="col-lg-10">
                             <select id="prests" name="prests" class="form-control">
								  <option value="">---Select---</option>
								  <option {{ $info['winfo']['web_premium'] == 'Enable' ? 'selected' : ''}} value="Enable">Enable</option>
								  <option {{ $info['winfo']['web_premium'] == 'Disable' ? 'selected' : ''}} value="Disable">Disable</option>
                            	</select>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="webtitle" class="col-lg-2 control-label">Website Title</label>
                          <div class="col-lg-10">
                            <input id="webtitle" type="text" name="webtitle" placeholder="Website Title" class="form-control" value="{{$info['winfo']['title']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="webfrndname" class="col-lg-2 control-label">Friendly Name</label>
                          <div class="col-lg-10">
                            <input id="webfrndname" type="text" name="webfrndname" placeholder="Website Friendly Name" class="form-control" value="{{$info['winfo']['web_friendlyname']}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="cemail" class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input id="cemail" type="email" name="cemail" placeholder="Email" class="form-control" value="{{$info['winfo']['email']}}" required >
                          </div>
                        </div>
						<div class="form-group">
                          <label for="contactnumber" class="col-lg-2 control-label">Contact Number</label>
                          <div class="col-lg-10">
                            <input id="contactnumber" type="text" name="contactnumber" placeholder="Contact Number" class="form-control" value="{{$info['winfo']['contact_number']}}">
                          </div>
                        </div>
						 <legend>Social Links</legend>
						  <div class="form-group">
                          <label for="fbl" class="col-lg-2 control-label">Facebook Link</label>
                          <div class="col-lg-10">
                            <input id="fbl" type="text" name="fbl" placeholder="Facebook Link" class="form-control" value="{{$info['winfo']['facebook']}}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="gpl" class="col-lg-2 control-label">Google Plus link</label>
                          <div class="col-lg-10">
                            <input id="gpl" type="text" name="gpl" placeholder="Google Plus link" class="form-control" value="{{$info['winfo']['google']}}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="lil" class="col-lg-2 control-label">LinkedIn Link</label>
                          <div class="col-lg-10">
                            <input id="lil" type="text" name="lil" placeholder="LinkedIn Link" class="form-control" value="{{$info['winfo']['li']}}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="tl" class="col-lg-2 control-label">Twitter Link</label>
                          <div class="col-lg-10">
                            <input id="tl" type="text" name="tl" placeholder="Twitter Link" class="form-control" value="{{$info['winfo']['twitter']}}">
                          </div>
                        </div>
						<legend>SEO Informtion</legend>
						<div class="form-group">
                          <label for="kw" class="col-lg-2 control-label">KeyWords</label>
                          <div class="col-lg-10">
                            <textarea id="kw" name="kw" placeholder="Website Keywords" class="form-control">{{$info['winfo']['keywords']}}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="ga" class="col-lg-2 control-label">Google Analytics</label>
                          <div class="col-lg-10">
                            <textarea id="ga" name="ga" placeholder="Google Analytics link" class="form-control">{{$info['winfo']['google_analytics']}}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="descrip" class="col-lg-2 control-label">Description</label>
                          <div class="col-lg-10">
                            <textarea id="descrip" name="descrip" placeholder="Website Description" class="form-control">{{$info['winfo']['description']}}</textarea>
                          </div>
                        </div>
						<legend>Addresses</legend>
						 <div class="form-group">
                          <label for="longitude" class="col-lg-2 control-label">Longitude</label>
                          <div class="col-lg-10">
                            <input id="longitude" type="text" name="longitude" placeholder="Longitude" class="form-control" value="{{$info['winfo']['longitude']}}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="latitude" class="col-lg-2 control-label">Latitude</label>
                          <div class="col-lg-10">
                            <input id="latitude" type="text" name="latitude" placeholder="Latitude" class="form-control" value="{{$info['winfo']['latitude']}}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="location_title" class="col-lg-2 control-label">Location Title</label>
                          <div class="col-lg-10">
                            <input id="location_title" type="text" name="location_title" placeholder="Location Title" class="form-control" value="{{$info['winfo']['location_title']}}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="address" class="col-lg-2 control-label">Address</label>
                          <div class="col-lg-10">
                            <input id="address" type="text" name="address" placeholder="Address" class="form-control" value="{{$info['winfo']['address']}}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="full_address" class="col-lg-2 control-label">Full Address</label>
                          <div class="col-lg-10">
                            <textarea id="full_address" name="full_address" placeholder="Full Address" class="form-control">{{$info['winfo']['full_address']}}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="apikey" class="col-lg-2 control-label">API Key</label>
                          <div class="col-lg-10">
                            <textarea id="apikey" name="apikey" placeholder="API Key" class="form-control">{{$info['winfo']['api_key']}}</textarea>
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="cr" class="col-lg-2 control-label">Copy Right</label>
                          <div class="col-lg-10">
                            <input id="cr" type="text" name="cr" placeholder="Copyright &copy;" class="form-control" value="{{$info['winfo']['copyright']}}">
                          </div>
                        </div>
						  <div class="form-group">
                          <label for="currency" class="col-lg-2 control-label">Currency</label>
                          <div class="col-lg-10">
                           <select id="currency" name="currency" class="form-control">
								  <option value="">---Select---</option>
								  <option {{ $info['winfo']['currency'] == 'NPR' ? 'selected' : ''}} value="NPR">Nepal Rupee</option>
								  <option {{ $info['winfo']['currency'] == 'USD' ? 'selected' : ''}} value="USD">US Doller</option>
                            	</select>
                          </div>
                        </div>
						<legend class="clegend">Wesite Images</legend> <i>Please Upload Image one at a time.</i>
						<div class="form-group">
                          <div class="col-lg-2">
						  	<label for="tmimg" class="control-label">Testimonial Bakcground</label>
							<i>(Width:1920px * Height:1280px)</i>
                          </div>
						  <div class="col-lg-10">
                            <input id="tmimginput" type="file" name="tmimg" accept="image/jpeg, image/png" class="form-control" onChange="tmimgfn(this)" value="{{ $info['winfo']['testimonial_bg'] }}">
							<img id="tmimg" src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['testimonial_bg'] }}" width="100%">
                          </div>
                        </div>
						<div class="form-group">
                          <div class="col-lg-2">
						  	<label for="aimg" class="control-label">Ad Banner</label>
							<i>(Width:1350px * Height:100px)</i>
                          </div>
						  <div class="col-lg-10">
                            <input id="aimginput" type="file" name="aimg" accept="image/jpeg, image/png" class="form-control" onChange="adimg(this)">
							<img id="aimg" src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['ad_banner'] }}" width="100%">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="ads" class="col-lg-2 control-label">Ad Banner Status</label>
                          <div class="col-lg-10">
                           <select id="ads" name="ads" class="form-control">
								  <option value="">---Select---</option>
								  <option {{ $info['winfo']['ad_banner_status'] == 'Enable' ? 'selected' : ''}} value="Enable">Enable</option>
								  <option {{ $info['winfo']['ad_banner_status'] == 'Disable' ? 'selected' : ''}} value="Disable">Disable</option>
                            	</select>
                          </div>
                        </div>
						<div class="form-group">
                          <div class="col-lg-2">
							  <label for="limg" class="control-label">Logo Image</label>
							  <i>(Width:270px * Height:45px)</i>
						  </div>
                          <div class="col-lg-10">
                            <input id="limginput" type="file" name="limg" accept="image/jpeg, image/png" class="form-control" onChange="logoimg(this)">
							<img id="limg" src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['logo'] }}">
							
                          </div>
                        </div>
						<div class="form-group">
                          <div class="col-lg-2">
							  <label for="flimginput" class="control-label">Footer Logo</label>
							  <i>(Width:90px * Height:90px)</i>
						  </div>
                          <div class="col-lg-10">
                            <input id="flimginput" type="file" name="flimg" accept="image/jpeg, image/png" class="form-control" onChange="flogoimg(this)">
							<img id="flimg" src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['footer_logo'] }}">
							
                          </div>
                        </div>
						<div class="form-group">
                          <div class="col-lg-2">
						  	<label for="fimg" class="control-label">Favicon Icon</label>
                          	<i>(Width:16px * Height:16px)</i>
						  </div>
						  <div class="col-lg-10">
                            <input id="fimginput" type="file" name="fimg" accept="image/jpeg, image/png" class="form-control" onChange="fcimg(this)">
							<img id="fimg" src="{{URL::to('/') }}/public/webimages/{{ $info['winfo']['favicon'] }}">
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