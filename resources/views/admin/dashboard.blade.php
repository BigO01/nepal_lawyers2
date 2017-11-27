@extends('admin/layout/master')
@section('main-content')
 <div class="content-wrapper">
		<div class="page-title">
			<div>
				<h1><i class="fa fa-dashboard"></i>{{ $info['sTitle'] }}</h1>
			 </div>
		 </div>
        <div class="row mt-20">
          <div class="col-md-8">
            <div class="card">
              <h3 class="card-title">Vector Map</h3>
              <div class="card-body">
                <div id="demo-map" style="height: 400px"></div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Users</h4>
                <p> <b>20</b></p>
              </div>
            </div>
            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Likes</h4>
                <p> <b>20</b></p>
              </div>
            </div>
            <div class="widget-small danger"><i class="icon fa fa-comments-o fa-3x"></i>
              <div class="info">
                <h4>Comments</h4>
                <p> <b>200</b></p>
              </div>
            </div>
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>Uploades</h4>
                <p> <b>20</b></p>
              </div>
            </div>
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Stars</h4>
                <p> <b>20</b></p>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="col-md-8">
            <div class="card">
              <h3 class="card-title">Chart</h3>
              <div class="embed-responsive embed-responsive-16by9">
                <canvas id="lineChartDemo" class="embed-responsive-item"></canvas>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="card">
              <h3 class="card-title">Chat</h3>
              <div class="messanger">
                <div class="messages">
                  <div class="message"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/tonypeterson/48.jpg">
                    <p class="info">Hello there!<br>Good Morning</p>
                  </div>
                  <div class="message me"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
                    <p class="info">Hi<br>Good Morning</p>
                  </div>
                  <div class="message"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/tonypeterson/48.jpg">
                    <p class="info">How are you?</p>
                  </div>
                  <div class="message me"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg">
                    <p class="info">I'm Fine.</p>
                  </div>
                </div>
                <div class="sender">
                  <input type="text" placeholder="Send Message">
                  <button type="button" class="btn btn-primary"><i class="fa fa-lg fa-fw fa-paper-plane"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
@endsection