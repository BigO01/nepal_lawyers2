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

				  	 {!! Form::open(['route'=>'Adminiscontroller/save.state', 'method'=>'post', 'id'=>'addstate', 'class'=>'form-horizontal']) !!}

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

                          <label for="rgname" class="col-lg-2 control-label">Province Name</label>

                          <div class="col-lg-10">

                            <select name="rgname" class="form-control" required>

								<option value="">---Select---</option>	

								

								@foreach($info['regions'] as $rg)

									<option value="{{$rg['id']}}">{{ $rg['region_name']}} </option>

								@endforeach

							

							</select>

                          </div>

                        </div>

						<div class="form-group">

                          <label for="stname" class="col-lg-2 control-label">District Name</label>

                          <div class="col-lg-10">

                            <input id="stname" type="text" name="stname" placeholder="District Name" class="form-control" value="{{ old('stname')}}" required>

                          </div>

                        </div>
						<div class="form-group">

                          <label for="lgd" class="col-lg-2 control-label">Longitude</label>

                          <div class="col-lg-10">

                            <input id="lgd" type="number" step=".000001" name="lgd" placeholder="Longitude" class="form-control" value="{{ old('lgd')}}" required>

                          </div>

                        </div>
						<div class="form-group">

                          <label for="ltd" class="col-lg-2 control-label">Latitude</label>

                          <div class="col-lg-10">

                            <input id="ltd" type="number" step=".000001" name="ltd" placeholder="Latitude" class="form-control" value="{{ old('ltd')}}" required>

                          </div>

                        </div>

						 <div class="form-group">

                          <label for="sts" class="col-lg-2 control-label">Status</label>

                          <div class="col-lg-10">

                           <select id="sts" name="status" class="form-control" required>

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