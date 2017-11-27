@extends('admin/layout/master')
@section('main-content')
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>{{ $info['pTitle'] }}</h1>
          </div>
          <div><a href="{{URL::to('Adminiscontroller/AddLawfirm')}}" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus">{{$info['sTitle']}}</i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
					  <th>Firm Logo</th>
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
					@forelse( $info['lawfirms'] as $lawfirm )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/profileimages/{{ $lawfirm->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
                      <td>{{ $lawfirm->first_name }}</td>
					  <td>{{ $lawfirm->email }}</td> 
					  <td>
					  		@foreach(explode(',', $lawfirm->expertise) as $lawfirmexp) 
								
								@foreach($info['expertises'] as $expp)
									<?php
										if($lawfirmexp == $expp['id']){
											echo $expp['expertise_name'].',';
											}
									?>
								@endforeach
					  		@endforeach
					  </td>
					  <td>{{ $lawfirm->role }}</td>
                      <td>{{ $lawfirm->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning" href="{{ $info['edit'].'/'.$lawfirm->ref_id }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['delete'].'/'.$lawfirm->ref_id }}">Delete</a></td>
                    
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