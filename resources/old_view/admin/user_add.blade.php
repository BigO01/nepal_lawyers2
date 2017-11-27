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
				  	 {!! Form::open(['route'=>'Adminiscontroller/save.user', 'method'=>'post', 'id'=>'adduser', 'class'=>'form-horizontal', 'files'=>'true']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['sTitle']}}</legend>
						@if ( $emailvalid = session()->get('emailvalidation') )
							<div class="alert {!! $emailvalid_class = session()->get('emailvalidtion_class') !!} alert-dismissible col-lg-12" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  {{ $emailvalid }}
							</div>
						@endif 
                        <div class="form-group">
                          <label for="ufname" class="col-lg-2 control-label">First Name</label>
                          <div class="col-lg-10">
                            <input id="ufname" type="text" name="ufname" placeholder="First Name" class="form-control" value="{{old('ufname')}}" required>
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="ulname" class="col-lg-2 control-label">Last Name</label>
                          <div class="col-lg-10">
                            <input id="ulname" type="text" name="ulname" placeholder="Last Name" class="form-control" value="{{old('ulname')}}">
                          </div>
                        </div>
						<div class="form-group">
                          <label for="uemail" class="col-lg-2 control-label">Email</label>
                          <div class="col-lg-10">
                            <input id="uemail" type="email" name="uemail" placeholder="Email" class="form-control" value="{{old('uemail')}}" required >
                          </div>
                        </div>
						<div class="form-group">
                          <label for="upswrd" class="col-lg-2 control-label">Password</label>
                          <div class="col-lg-10">
                            <input id="upswrd" type="password" name="upswrd" placeholder="Password" class="form-control" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="uimg" class="col-lg-2 control-label">User Image</label>
                          <div class="col-lg-10">
                            <input id="uimg" type="file" name="uimg" accept="image/jpeg, image/png" class="form-control">
							
                          </div>
                        </div>
						<div class="form-group">
                          <label for="urole" class="col-lg-2 control-label">User Role</label>
                          <div class="col-lg-10">
                            <select name="urole" class="form-control" required>
								<option value="">---Select---</option>
								<option value="admin">Admin</option>
								<option value="guest">User</option>
							</select>
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="status" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control">
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