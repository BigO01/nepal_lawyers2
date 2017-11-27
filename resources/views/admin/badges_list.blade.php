@extends('admin/layout/master')
@section('main-content')
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>{{ $info['pTitle'] }}</h1>
          </div>
          <div><a href="{{URL::to('Adminiscontroller/AddBadge')}}" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus">{{$info['sTitle']}}</i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>S.No</th>
					  <th>Badge Image</th>
                      <th>Title</th>
					  <th>Background Color</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['badges'] as $badge )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/webimages/{{ $badge->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
                      <td>{{ $badge->badge_title }}</td>
					  <td>{{ $badge->color }}</td>
                      <td>{{ $badge->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['edit'].'/'.$badge->id }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['delete'].'/'.$badge->id }}">Delete</a></td>
                    
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