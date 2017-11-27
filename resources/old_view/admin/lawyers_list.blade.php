@extends('admin/layout/master')
@section('main-content')
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>{{ $info['pTitle'] }}</h1>
          </div>
          <div><a href="{{URL::to('Adminiscontroller/AddLawyer')}}" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus">{{$info['sTitle']}}</i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
					  <th>Lawyer Image</th>
                      <th>Name</th>
					  <th>Email</th>
					  <th>Expertises</th>
					  <th>Role</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['lawyers'] as $lawyer )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/profileimages/{{ $lawyer->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
                      <td>{{ $lawyer->first_name }}</td>
					  <td>{{ $lawyer->email }}</td> 
					  <td>
					  		@foreach(explode(',', $lawyer->expertise) as $lawexp) 
								
								@foreach($info['expertises'] as $expp)
									<?php
										if($lawexp == $expp['id']){
											echo $expp['expertise_name'].',';
											}
									?>
								@endforeach
					  		@endforeach
					  </td>
					  <td>{{ $lawyer->role }}</td>
                      <td>{{ $lawyer->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning" href="{{ $info['edit'].'/'.$lawyer->ref_id }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['delete'].'/'.$lawyer->ref_id }}">Delete</a></td>
                    
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