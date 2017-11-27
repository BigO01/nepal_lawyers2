@extends('admin/layout/master')
@section('main-content')
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>{{ $info['pTitle'] }}</h1>
          </div>
          <div><a href="{{URL::to('Adminiscontroller/AddCity')}}" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus">{{$info['sTitle']}}</i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>City Name</th>
					  <th>State Name</th>
                      <th>Longitude</th>
					  <th>Latitude</th>
					  
					  <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php if(count($info['cities'])>0){
						for($i=0; $i<count($info['cities']); $i++ ){?>   
					<tr>
					  <td>{{ $i+1 }}</td>
					  <td>{{ $info['cities'][$i]->city_name }}</td>
					  <td>{{ $info['cities'][$i]->state_name }}</td>
					  <td>{{ $info['cities'][$i]->longitude }}</td>
					  <td>{{ $info['cities'][$i]->latitude }}</td>
                      <td>{{$info['cities'][$i]->status == 1 ? 'Enable' : 'Disable' }}</td>
					   
                      <td>
					  <a class="btn btn-warning" href="{{ $info['edit'].'/'.$info['cities'][$i]->id }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{  $info['delete'].'/'.$info['cities'][$i]->id }}">Delete</a></td>
                    
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