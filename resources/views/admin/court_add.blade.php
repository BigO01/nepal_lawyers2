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
				  	 {!! Form::open(['route'=>'Adminiscontroller/save.court', 'method'=>'post', 'id'=>'addcourt', 'class'=>'form-horizontal']) !!}
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
                          <label for="cname" class="col-lg-2 control-label">Court Name</label>
                          <div class="col-lg-10">
                            <input id="cname" type="text" name="cname" placeholder="Court Name" class="form-control" value="{{ old('cname')}}" required>
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