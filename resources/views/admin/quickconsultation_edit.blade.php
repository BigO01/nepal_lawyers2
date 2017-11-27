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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.quickconsultation', 'method'=>'post', 'id'=>'addcourt', 'class'=>'form-horizontal']) !!}
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
						<input type="hidden" name="id" value="{{ $info['quickconsultation']->id }}">
                          <label for="cname" class="col-lg-2 control-label">User Name</label>
                          <div class="col-lg-10">
                            <input id="cname" type="text" name="cname" placeholder="User Name" class="form-control" required value="{{ $info['quickconsultation']->user_name }}" readonly>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="cname" class="col-lg-2 control-label">User Email</label>
                          <div class="col-lg-10">
                            <input id="cname" type="text" name="cname" placeholder="User Name" class="form-control" required value="{{ $info['quickconsultation']->email }}" readonly>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="cname" class="col-lg-2 control-label">User Contact Number</label>
                          <div class="col-lg-10">
                            <input id="cname" type="text" name="cname" placeholder="User Contact Number" class="form-control" required value="{{ $info['quickconsultation']->contact_number }}" readonly>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="cname" class="col-lg-2 control-label">Quick Message</label>
                          <div class="col-lg-10">
                            <textarea name="cname" placeholder="User Quick Message" class="form-control" readonly>{{ $info['quickconsultation']->quick_message }}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="cname" class="col-lg-2 control-label">Admin Review</label>
                          <div class="col-lg-10">
                            <textarea id="descrip" name="descrip" placeholder="Admin Review" class="form-control">{{ $info['quickconsultation']->descryption}}</textarea>
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['quickconsultation']->status == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['quickconsultation']->status == 0 ? 'selected' : ''}} value="0">Disable</option>
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