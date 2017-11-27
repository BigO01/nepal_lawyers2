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
					  <th>User Image</th>
                      <th>Claimed Name</th>
					  <th>Claimed Email</th>
					  <th>Claimed By Name</th>
					  <th>Claimed By Email/Phone Number</th>
					  <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['cliamprofiles'] as $account )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/profileimages/{{ $account->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
					  <td>{{ $account->first_name }}</td>
					  <td>{{ $account->claimedemail }}</td>
					  <td>{{ $account->user_name }}</td>
					  <td>{{ $account->email }}||{{ $account->contact }}</td>
					  <td>{{ $account->role }}</td>
                      <td>{{ $account->status}}</td>
                      <td>
					  		<a class="btn btn-info" onclick="return confirm('Are you sure to Approve?')"href="{{URL::to('Adminiscontroller/ClaimAccountApprove').'/'.$account->id}}">Approve</a>
							<a class="btn btn-warning" onclick="return confirm('Are you sure to Pending?')"href="{{URL::to('Adminiscontroller/ClaimAccountPending').'/'.$account->id}}">Pending</a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure to Disable?') " href="{{URL::to('Adminiscontroller/ClaimAccountDisable').'/'.$account->id}}">Disable</a>
							<a class="btn btn-warning" onclick="return confirm('Are you sure to Block?') " href="{{URL::to('Adminiscontroller/ClaimAccountBlock').'/'.$account->id}}">Block</a>
					</td>
                    
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