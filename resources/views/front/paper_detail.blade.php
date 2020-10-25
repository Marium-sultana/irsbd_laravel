@extends('front.layout.master')
@section('content')



<meta name="keywords" content="{{$paperDetail->paper_title}}"/>
 
 
 <h1 class="title" id="page-title"> Archive </h1>
 <div class="view-content">
    <div class="item-list">
		<div id="topBar">
		</div>
		
		<div id="articleTitle">
			<h3>{{$paperDetail->paper_title}}</h3>
		</div>
		<div id="authorString">
			<em>{{$paperDetail->author_name}}</em>
		</div>
		<br />
		<div id="articleAbstract">
			<h4>Abstract</h4>
			<br />
			<div>{{$paperDetail->abstract}}</div>
			<br />
		</div>
	
			
				
	<div id="articleFullText">
		<h4>Full Text:</h4>
			<a href="{{url('/')}}/public/storage/papers/{{$paperDetail->file_location}}" class="file" target="_parent">
				DOWNLOAD PDF
			</a>								
	</div>
</div>

</div>
 



@endsection