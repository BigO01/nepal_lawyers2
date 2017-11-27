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
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.bar', 'method'=>'post', 'id'=>'addbar', 'class'=>'form-horizontal']) !!}
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
						<input type="hidden" name="id" value="{{ $info['bar']['id'] }}">
                          <label for="cname" class="col-lg-2 control-label">Bar Name</label>
                          <div class="col-lg-10">
                            <input id="bname" type="text" name="bname" placeholder="Bar Name" class="form-control" required value="{{ $info['bar']['bar_name'] }}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['bar']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['bar']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
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