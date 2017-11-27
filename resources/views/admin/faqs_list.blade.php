@extends('admin/layout/master')
@section('main-content')
<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1>{{ $info['pTitle'] }}</h1>
          </div>
          <div><a href="{{URL::to('Adminiscontroller/AddFaq')}}" class="btn btn-primary btn-flat"><i class="fa fa-lg fa-plus">{{$info['sTitle']}}</i></a></div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <table id="sampleTable" class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Serial Number</th>
                      <th>Question</th>
					  <th>Answer</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
				  	
				  	<?php $i=1; ?>
					@forelse( $info['faqs'] as $faq )
                    
					<tr>
					  <td>{{ $i }}</td>
                      <td>{{ $faq['question'] }}</td>
					  <td><?php echo $faq['answer'] ; ?></td>
                      <td>{{ $faq['status'] == 1 ? 'Enable' : 'Disable' }}</td>
                      <td>
					  <a class="btn btn-warning cmb" href="{{ $info['edit'].'/'.$faq['id'] }}">Edit</a>
					  <a class="btn btn-danger" onclick="return confirm('Are you sure?')" href="{{ $info['delete'].'/'.$faq['id'] }}">Delete</a></td>
                    
					</tr>
					<?php $i++; ?>
					@empty
					<tr>
                      <td colspan="4">Records Not Found</td>
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