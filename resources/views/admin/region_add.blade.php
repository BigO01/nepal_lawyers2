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

				  	 {!! Form::open(['route'=>'Adminiscontroller/save.region', 'method'=>'post', 'id'=>'addregion', 'class'=>'form-horizontal']) !!}

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

                          <label for="rgname" class="col-lg-2 control-label">Provinces Name</label>

                          <div class="col-lg-10">

                            <input id="rgname" type="text" name="rgname" placeholder="Provinces Name" class="form-control" value="{{ old('rgname')}}" required>

                          </div>

                        </div>
						 <div class="form-group">

                          <label for="lgd" class="col-lg-2 control-label">Longitude</label>

                          <div class="col-lg-10">

                            <input id="lgd" type="number" step=".000001" name="lgd" placeholder="Longitude" class="form-control" value="{{ old('lgd')}}">

                          </div>

                        </div>
						 <div class="form-group">

                          <label for="ltd" class="col-lg-2 control-label">Latitude</label>

                          <div class="col-lg-10">

                            <input id="ltd" type="number" step=".000001" name="ltd" placeholder="Latitude" class="form-control" value="{{ old('ltd')}}">

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