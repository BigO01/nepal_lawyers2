@extends('admin/layout/master')
@section('main-content')
 <div class="content-wrapper">
		<div class="page-title">
			<div>
				<h1><i class="fa fa-user-plus"></i>{{ $info['eTitle'] }}</h1>
			 </div>
		 </div>
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-10">
					
                  <div class="well bs-component">
				  	 {!! Form::open(['route'=>'Adminiscontroller/update.faq', 'method'=>'post', 'id'=>'editfaq', 'class'=>'form-horizontal']) !!}
                  {{ csrf_field() }}
                      <fieldset>
                        <legend>{{ $info['eTitle']}}</legend>
						@if(count($errors))
						<div class="alert alert-danger">
							<ul>
								@foreach($errors->all() as $err)
								<li>{{ $err }}</li>
								@endforeach
							</ul>
						</div>
					@endif
                        <div class="form-group">
						<input type="hidden" name="id" value="{{ $info['faq']['id'] }}">
                          <label for="ques" class="col-lg-2 control-label">Question</label>
                          <div class="col-lg-10">
                            <input id="ques" type="text" name="ques" placeholder="Question" class="form-control" required value="{{ $info['faq']['question'] }}">
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="ans" class="col-lg-2 control-label">Answer</label>
                          <div class="col-lg-10">
                            <textarea class="form-control" id="ans" name="ans" placeholder="Answer Type Here..!!!"><?php echo preg_replace("/<br\W*?\/>/", "",$info['faq']['answer']); ?></textarea>
                          </div>
                        </div>
						 <div class="form-group">
                          <label for="sts" class="col-lg-2 control-label">Status</label>
                          <div class="col-lg-10">
                           <select id="select" name="status" class="form-control" required>
								  <option value="">---Select---</option>
								  <option {{ $info['faq']['status'] == 1 ? 'selected' : ''}} value="1">Enable</option>
								  <option {{ $info['faq']['status'] == 0 ? 'selected' : ''}} value="0">Disable</option>
                            	</select>
                          </div>
                        </div>
                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-primary">{{$info['upBtnTxt']}}</button>
                          </div>
                        </div>
                      </fieldset>
					  {!! Form::close() !!}
                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection