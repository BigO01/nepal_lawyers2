

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/resources/assets/admin/css/main.css') }} ">
	 <link rel="stylesheet" type="text/css" href="{{URL::to('/resources/assets/admin/css/custom.css') }} ">
    <title>Vali Admin</title>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--if lt IE 9-->
    script(src='https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js')
    script(src='https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js')
    
  </head>
  <body class="sidebar-mini fixed">
  @if(Auth::check())
    @if(Auth::user()->hasRole('owner')||Auth::user()->hasRole('admin'))
	<div class="wrapper">
      <!-- Navbar-->
      <header class="main-header hidden-print"><a href="index.html" class="logo">Vali</a>
        <nav class="navbar navbar-static-top">
          <!-- Sidebar toggle button--><a href="#" data-toggle="offcanvas" class="sidebar-toggle"></a>
          <!-- Navbar Right Menu-->
          <div class="navbar-custom-menu">
            <ul class="top-nav">
              <!--Notification Menu-->
              <li class="dropdown notification-menu"><a href="#" data-toggle="dropdown" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-bell-o fa-lg"></i></a>
                <ul class="dropdown-menu">
                  <li class="not-head">You have 4 new notifications.</li>
                  <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Lisa sent you a mail</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Server Not Working</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li><a href="javascript:;" class="media"><span class="media-left media-icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                      <div class="media-body"><span class="block">Transaction xyz complete</span><span class="text-muted block">2min ago</span></div></a></li>
                  <li class="not-footer"><a href="#">See all notifications.</a></li>
                </ul>
              </li>
              <!-- User Menu-->
              <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-user fa-lg"></i> {{ Auth::user()->first_name}}</a>
                <ul class="dropdown-menu settings-menu">
                 
				  <li><a href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                  <li><a href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" ><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
				  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                                        	{{ csrf_field() }}
	                                    	</form>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Side-Nav-->
      <aside class="main-sidebar hidden-print">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image"><img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image" class="img-circle"></div>
            <div class="pull-left info">
              <p>John Doe</p>
              <p class="designation">Frontend Developer</p>
            </div>
          </div>
          <!-- Sidebar Menu-->
          <ul class="sidebar-menu">
            <li class="active"><a href="index.html"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
			<li class="treeview"><a href="#"><i class="fa fa-clone"></i><span>Regions</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddRegion')}}"><i class="fa fa-clone"></i>Add Region</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListRegion')}}"><i class="fa fa-list"></i>Regions List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-flag-o "></i><span>States</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddState')}}"><i class="fa fa-flag-o"></i>Add State</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListState')}}"><i class="fa fa-list"></i>States List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-list-alt"></i><span>Cities</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddCity')}}"><i class="fa fa-building"></i>Add City</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListCity')}}"><i class="fa fa-list"></i>Cities List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-users"></i><span>Users</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddUser')}}"><i class="fa fa-user-plus"></i>Add User</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListUser')}}"><i class="fa fa-list"></i>Users List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-users"></i><span>Lawfirms</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddLawfirm')}}"><i class="fa fa-user-plus"></i>Add Lawfirm</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListPremiumLawfirm')}}"><i class="fa fa-list"></i>Premium Lawfirms List</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListLawfirm')}}"><i class="fa fa-list"></i>Lawfirms List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-users"></i><span>Lawyers</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddLawyer')}}"><i class="fa fa-user-plus"></i>Add Lawyer</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListPremiumLawyer')}}"><i class="fa fa-list"></i>Premium Lawyers</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListLawyer')}}"><i class="fa fa-list"></i>Lawyers List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-cogs"></i><span>Expertises</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddExpertise')}}"><i class="fa fa-cog"></i>Add Expertise</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListExpertise')}}"><i class="fa fa-list"></i>Expertises List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-gavel"></i><span>Courts</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddCourt')}}"><i class="fa fa-plus-circle"></i>Add Court</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListCourt')}}"><i class="fa fa-list"></i>Courts List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-gavel"></i><span>Bars</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddBar')}}"><i class="fa fa-plus-circle"></i>Add Bar</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListBar')}}"><i class="fa fa-list"></i>Bars List</a></li>
              </ul>
            </li>
			<li class="treeview"><a href="#"><i class="fa fa-language"></i><span>Languages</span><i class="fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                <li><a href="{{URL::to('Adminiscontroller/AddLanguage')}}"><i class="fa fa-plus-circle"></i>Add Language</a></li>
				<li><a href="{{URL::to('Adminiscontroller/ListLanguage')}}"><i class="fa fa-list"></i>Languages List</a></li>
              </ul>
            </li>
           
            
            
            
          </ul>
        </section>
      </aside>
     			@yield('main-content')
    </div>
    <!-- Javascripts-->
    <script src="{{ URL::to('resources/assets/admin/js/jquery-2.1.4.min.js')}}"></script>
    <script src="{{ URL::to('resources/assets/admin/js/essential-plugins.js')}}"></script>
    <script src="{{ URL::to('resources/assets/admin/js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::to('resources/assets/admin/js/plugins/pace.min.js')}}"></script>
    <script src="{{ URL::to('resources/assets/admin/js/main.js')}}"></script>
	<script src="{{ URL::to('resources/assets/admin/js/custom.js')}}"></script>
	
    <script type="text/javascript" src="{{ URL::to('resources/assets/admin/js/plugins/chart.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('resources/assets/admin/js/plugins/jquery.vmap.min.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('resources/assets/admin/js/plugins/jquery.vmap.world.js')}}"></script>
    <script type="text/javascript" src="{{ URL::to('resources/assets/admin/js/plugins/jquery.vmap.sampledata.js')}}"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	var data = {
      		labels: ["January", "February", "March", "April", "May"],
      		datasets: [
      			{
      				label: "My First dataset",
      				fillColor: "rgba(220,220,220,0.2)",
      				strokeColor: "rgba(220,220,220,1)",
      				pointColor: "rgba(220,220,220,1)",
      				pointStrokeColor: "#fff",
      				pointHighlightFill: "#fff",
      				pointHighlightStroke: "rgba(220,220,220,1)",
      				data: [65, 59, 80, 81, 56]
      			},
      			{
      				label: "My Second dataset",
      				fillColor: "rgba(151,187,205,0.2)",
      				strokeColor: "rgba(151,187,205,1)",
      				pointColor: "rgba(151,187,205,1)",
      				pointStrokeColor: "#fff",
      				pointHighlightFill: "#fff",
      				pointHighlightStroke: "rgba(151,187,205,1)",
      				data: [28, 48, 40, 19, 86]
      			}
      		]
      	};
      	var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      	var lineChart = new Chart(ctxl).Line(data);
      
      	var map = $('#demo-map');
      	map.vectorMap({
      		map: 'world_en',
      		backgroundColor: '#fff',
      		color: '#333',
      		hoverOpacity: 0.7,
      		selectedColor: '#666666',
      		enableZoom: true,
      		showTooltip: true,
      		scaleColors: ['#C8EEFF', '#006491'],
      		values: sample_data,
      		normalizeFunction: 'polynomial'
      	});
      });
    </script>
	<!--<script type="text/javascript">$('#sampleTable').DataTable();</script>-->
  	@endif
	@else-if
		<script>
			var APP_URL = {!! json_encode(url('/login')) !!};
			window.location = APP_URL;
			//window.location = "{URL::to('/home')}";//here double curly bracket
		</script>
	@endif
  </body>
</html>

