<div class="span2 main-menu-span">
	<div class="well nav-collapse sidebar-nav">
		<ul class="nav nav-tabs nav-stacked main-menu">
			<li class="nav-header hidden-tablet">Main</li>
			<li><a class="ajax-link" href="{{url('user/submit_paper')}}"><i class="icon-home"></i><span class="hidden-tablet"> Manuscript Submission </span></a></li>
			<li><a class="ajax-link" href="{{url('user/view_submitted_paper')}}"><i class="icon-picture"></i><span class="hidden-tablet"> Check Submitted Manuscripts</span></a></li> 
			<li><a class="ajax-link" href="{{url('user/inbox/{id}')}}"><i class="icon-picture"></i><span class="hidden-tablet"> Inbox</span></a></li> 
			<li><a class="ajax-link" href="{{url('user/change_pass')}}"><i class="icon-home"></i><span class="hidden-tablet"> Change Password </span></a></li>
		</ul>
		<label id="for-is-ajax" class="hidden-tablet" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
	</div><!--/.well -->
</div><!--/span-->
			<!-- left menu ends -->
			
<noscript>
	<div class="alert alert-block span10">
		<h4 class="alert-heading">Warning!</h4>
		<p>
			You need to have 
				<a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> 
			enabled to use this site.
		</p>
	</div>
</noscript>