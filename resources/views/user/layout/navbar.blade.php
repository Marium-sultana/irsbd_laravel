<div class="navbar">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".top-nav.nav-collapse,.sidebar-nav.nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
				
				
				<!-- theme selector starts -->
				
				<!-- theme selector ends -->
				
				<!-- user dropdown starts -->
			<div class="btn-group pull-right" >
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					<i class="icon-user"></i>
						<span class="hidden-phone"> {{Session::get('user')['name']}}</span>
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					
					<li><a href="{{url('user/logout')}}">Logout</a></li>
				</ul>
			</div>
				<!-- user dropdown ends -->
				
			<div class="top-nav nav-collapse">
				<ul class="nav">
					<li><a href="{{url('/')}}">Visit Site</a></li>
					
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
</div>