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
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['questions'] as $question )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td><img src="{{ URL::to('/') }}/public/profileimages/{{ $question->image_path }}" alt="Image not found."/ width="75px" height="75px"></td>
                      <td>{{ $question->user_name }}</td>
					  <td>{{ $question->question }}</td>
					  <td>{{ $question->question_detail }}</td>
                      <td>{{ $question->status == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['enable'].'/'.$question->id }}">Enable</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['disable'].'/'.$question->id }}">Disable</a></td>
                    
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