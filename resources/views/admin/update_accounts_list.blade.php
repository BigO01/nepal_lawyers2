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
					  <th>Certificate/Award</th>
					  <th>Licence Number</th>
                      <th>Name</th>
					  <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['accounts'] as $account )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/profileimages/{{ $account->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
					   <td><img src="{{ URL::to('/') }}/public/AwardsAndCertificates/{{ $account->award }}" alt="Image not found."/ width="75px" height="75px" data-toggle="modal" data-target="#myModal{{$account->id}}">
					   <div id="myModal{{$account->id}}" class="modal fade" role="dialog">
						  <div class="modal-dialog">
							<!-- Modal content-->
							<div class="modal-content">
							  <div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">{{ $account->award_title }}</h4>
							  </div>
							  <div class="modal-body">
							  <img src="{{ URL::to('/') }}/public/AwardsAndCertificates/{{ $account->award }}" alt="Image not found." width="100%">
							  </div>
							  <div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							  </div>
							</div>
						
						  </div>
						</div>
						</td>
                      <td>{{ $account->f_license_number }} {{ $account->l_license_number }}</td>
					  <td>{{ $account->first_name }}</td>
					  <td>{{ $account->role }}</td>
                      <td>{{ $account->status}}</td>
                      <td>
					  		<a class="btn btn-info" onclick="return confirm('Are you sure to Approve?')"href="{{URL::to('Adminiscontroller/UpdateAccountApprove').'/'.$account->id}}">Approve</a>
							<a class="btn btn-warning" onclick="return confirm('Are you sure to Pending?')"href="{{URL::to('Adminiscontroller/UpdateAccountPending').'/'.$account->id}}">Pending</a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure to Disable?') " href="{{URL::to('Adminiscontroller/UpdateAccountDisable').'/'.$account->id}}">Disable</a>
							<a class="btn btn-warning" onclick="return confirm('Are you sure to Block?') " href="{{URL::to('Adminiscontroller/UpdateAccountBlock').'/'.$account->id}}">Block</a>
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