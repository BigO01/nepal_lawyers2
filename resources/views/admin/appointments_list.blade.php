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
					  <th>Request From</th>
					  <th>Appointment Date</th>
                      <th>Appointment Message</th>
					  <th>Request For</th>
					  <th>Admin Comments</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['appoints'] as $appoint )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td>{{ $appoint->urtemail }}</td>
                      <td>{{ $appoint->appointment_date }}</td>
					  <td>{{ $appoint->massege }}</td>
					  <td>{{ $appoint->urbemail }}</td>
					  <td>{!! $appoint->descryption !!}</td>
                      <td>{{ $appoint->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['edit'].'/'.$appoint->id }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['del'].'/'.$appoint->id }}">Delete</a></td>
                    
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