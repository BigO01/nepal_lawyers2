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
					  <th>User Name</th>
                      <th>Question</th>
					  <th>Question Detail</th>
					  <th>Answer</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['answers'] as $answer )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/profileimages/{{ $answer->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
                      <td>{{ $answer->user_name }}</td>
					  <td>{{ $answer->question }}</td>
					  <td>{{ $answer->question_detail }}</td>
					   <td>{{ $answer->answer }}</td>
                      <td>{{ $answer->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['enable'].'/'.$answer->id }}">Enable</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['disable'].'/'.$answer->id }}">Disable</a></td>
                    
					</tr>
					<?php $i++; ?>
					@empty
					<tr>
                      <td colspan="8">Records Not Found</td>
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