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
					  <th>Rated By</th>
					  <th>Rated To</th>
					  <th>Stars</th>
					  <th>Comments</th>
					  <th>Rated Date/Time</th>
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
					  <td>{{ $appoint->urbemail }}</td>
					  <td>{{ $appoint->rating_star }}</td>
					  <td>{{ $appoint->comment }}</td>
					  <td>{{ $appoint->date }}</td>
                      <td>{{ $appoint->status == 1 ? 'Approved' : 'Not Approved' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['approve'].'/'.$appoint->id }}">Approve</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['disable'].'/'.$appoint->id }}">Disable</a></td>
                    
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