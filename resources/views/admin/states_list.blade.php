@extends('admin/layout/master')

@section('main-content')

<div class="content-wrapper">

        <div class="page-title">

          <div>

            <h1>{{ $info['pTitle'] }}</h1>

          </div>

          <div><a href="{{URL::to('Adminiscontroller/AddState')}}" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus">{{$info['sTitle']}}</i></a></div>

        </div>

        <div class="row">

          <div class="col-md-12">

            <div class="card">

              <div class="card-body">

                <table id="sampleTable" class="table table-hover table-bordered">

                  <thead>

                    <tr>

                      <th>S. N0</th>

                      <th>Name</th>

                      <th>Provinces Name</th>
					  <th>Longitude</th>
					  <th>Latitude</th>

					  <th>Districts</th>

                      <th>Action</th>

                    </tr>

                  </thead>

                  <tbody>

				 

                 	<?php if(count($info['states'])>0){

						for($i=0; $i<count($info['states']); $i++ ){?>   

					<tr>

					  <td>{{ $i+1 }}</td>

					  <td>{{ $info['states'][$i]->state_name }}</td>

					  

					  <td>{{ $info['states'][$i]->region_name }}</td>
					  <td>{{ $info['states'][$i]->longitude }}</td>
					  <td>{{ $info['states'][$i]->latitude }}</td>

                      <td>{{$info['states'][$i]->status == 1 ? 'Enable' : 'Disable' }}</td>

					   

                      <td>

					  <a class="btn btn-warning cmb" href="{{ $info['edit'].'/'.$info['states'][$i]->id }}">Edit</a>

					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['delete'].'/'.$info['states'][$i]->id }}">Delete</a></td>

                    

					</tr>

					<?php }

					}

					else{?>

					<tr>

                      <td colspan="5">Records Not Found</td>

					 </tr>

					<?php } ?>

                  </tbody>

                </table>

              </div>

            </div>

          </div>

        </div>

      </div>

@endsection