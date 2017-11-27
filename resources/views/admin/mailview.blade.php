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
				  	 {!! Form::open(['route'=>'adminmailer', 'method'=>'post', 'id'=>'viewemail', 'class'=>'form-horizontal','files'=>'true']) !!}
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
                          <label for="senderemail" class="col-lg-2 control-label">Sender Email</label>
                          <div class="col-lg-10">
						  	<select class="form-control" name="senderemail" id="senderemail" required>
							<option value="">---Select---</option>
                           		@foreach($info['emails'] as $email)
									<option value="{{$email->email}}">{{$email->email}}</option>
								@endforeach
						  	</select>
						  </div>
                        </div>
						<div class="form-group">
                          <label for="receiveremail" class="col-lg-2 control-label">Receiver Email</label>
                          <div class="col-lg-10">
                            <input id="receiveremail" type="email" name="emailreceiver" placeholder="Receiver Email" class="form-control" value="{{ old('receiveremail')}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="receivername" class="col-lg-2 control-label">Receiver Name</label>
                          <div class="col-lg-10">
                            <input id="emailname" type="text" name="emailname" placeholder="Receiver Name" class="form-control" value="{{ old('emailname')}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="emailsubject" class="col-lg-2 control-label">Email Subject</label>
                          <div class="col-lg-10">
                            <input id="emailsubject" type="text" name="emailsubject" class="form-control" value="{{ old('emailsubject')}}" required>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="emailbody" class="col-lg-2 control-label">Email Subject</label>
                          <div class="col-lg-10">
                            <textarea id="emailbody" name="emailbody" class="form-control" required> </textarea>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">Send Email</button>
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