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
					  <th>Post Title</th>
                      <th>Comments</th>
					  <th>Status</th>
					  <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	<?php $i=1; ?>
					@forelse( $info['comments'] as $comment )
                    
					<tr>
					  <td>{{ $i }}</td>
					  <td>{{ $comment->post_title }}</td>
                      <td>{{ $comment->comment  }}</td>
					  <td>{{ $comment->status }}</td>
					  <td>
					  		<a class="btn btn-info" onclick="return confirm('Are you sure to Approve?')"href="{{URL::to('Adminiscontroller/PostCommentApprove').'/'.$comment->id}}">Approve</a>
							<a class="btn btn-warning" onclick="return confirm('Are you sure to Pending?')"href="{{URL::to('Adminiscontroller/PostCommentPending').'/'.$comment->id}}">Pending</a>
							<a class="btn btn-danger" onclick="return confirm('Are you sure to Disable?') " href="{{URL::to('Adminiscontroller/PostCommentDisable').'/'.$comment->id}}">Disable</a>
							<a class="btn btn-warning" onclick="return confirm('Are you sure to Block?') " href="{{URL::to('Adminiscontroller/PostCommentBlock').'/'.$comment->id}}">Block</a>
					</td>
					</tr>
					<?php $i++; ?>
					@empty
					<tr>
                      <td colspan="6">Records Not Found</td>
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