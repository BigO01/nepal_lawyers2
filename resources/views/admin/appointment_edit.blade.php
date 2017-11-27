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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.appointment', 'method'=>'post', 'id'=>'addcourt', 'class'=>'form-horizontal']) !!}
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
						<input type="hidden" name="id" value="{{ $info['appoint']->id }}">
                          <label for="rb" class="col-lg-2 control-label">Requested By</label>
                          <div class="col-lg-10">
                            <input id="rb" type="text" name="rb" placeholder="Requested By" class="form-control" required value="{{ $info['appoint']->urtemail }}" readonly>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="rb" class="col-lg-2 control-label">Requested To</label>
                          <div class="col-lg-10">
                            <input id="rb" type="text" name="rb" placeholder="Rquest to Admin" class="form-control" required value="{{ $info['appoint']->urbemail }}" readonly>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="rb" class="col-lg-2 control-label">Appoinment Message</label>
                          <div class="col-lg-10">
                            <textarea id="rb" name="apmsg" placeholder="Appoinment Message" class="form-control" required readonly>{{ $info['appoint']->massege }}</textarea>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="rb" class="col-lg-2 control-label">Appoinment Date</label>
                          <div class="col-lg-10">
                            <input id="rb" name="apmsg" placeholder="Appoinment Date" class="form-control" required value="{{ $info['appoint']->appointment_date }}" readonly>
                          </div>
                        </div>
						<div class="form-group">
                          <label for="rb" class="col-lg-2 control-label">Appoinment Description</label>
                          <div class="col-lg-10">
                            <textarea id="descrip" name="descrip" placeholder="Appoinment Description" class="form-control">{{$info['appoint']->descryption}}</textarea>
                          </div>
                        </div>
						
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['appoint']->status == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['appoint']->status == 0 ? 'selected' : ''}} value="0">Disable</option>
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