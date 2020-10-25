<!DOCTYPE html>
<html lang="en">
	<head>	
		@include('user.layout.top')
	</head>

	<body>
			<!-- topbar starts -->
		@include('user.layout.navbar')
		<!-- topbar ends -->
			<div class="container-fluid">
				<div class="row-fluid">
					
				<!-- left menu starts -->
					@include('user.layout.menu')
					<div id="content" class="span10">
				<!-- content starts -->								
						@yield('content')
			<footer>
				
			</footer>
			
		</div><!--/.fluid-container-->

		<!-- external javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->

		<!-- jQuery -->
		@include('user.layout.bottom')
		
			
	</body>
</html>
