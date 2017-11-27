@extends('admin/layout/master')
@section('main-content')
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>{{ $info['pTitle'] }}</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
					  <th>User Name</th>
                      <th>Email</th>
					  <th>Contact Number</th>
					  <th>City</th>
					  <th>Legal Area</th>
					  <th>Quick Message</th>
					  <th>Admin Review</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['quickconsultations'] as $quickconsultation )
					<tr>
					  <td>{{ $i }}</td>
					  <td>{{ $quickconsultation->user_name}}</td>
                      <td>{{ $quickconsultation->email}}</td>
					  <td>{{ $quickconsultation->contact_number}}</td>
					  <td>{{ $quickconsultation->cityname}}</td>
					  <td>{{ $quickconsultation->expertisename}}</td>
					  <td>{{ $quickconsultation->quick_message}}</td>
					  <td>{!! $quickconsultation->descryption!!}</td>
                      <td>{{ $quickconsultation->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['edit'].'/'.$quickconsultation->id }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['del'].'/'.$quickconsultation->id }}">Delete</a></td>
                    
					</tr>
					<?php $i++; ?>
					@empty
					<tr>
                      <td colspan="7">Records Not Found</td>
					 </tr>
					 @endforelse
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection