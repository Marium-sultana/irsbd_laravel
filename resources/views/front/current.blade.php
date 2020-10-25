@extends('front.layout.master')
@section('content')



<div id=""> 
	<table  width=400 border="0" bordercolor="#111111" >
		<tr>
		<td valign="top" bgcolor="#ffeeee"> 
		<b>  {{$issueData->issue_name}} </b>
		</td>
		</tr>
	</table>

	<table>                
		@foreach($paperData as $data)    
			<p align='justify'>
			<b>Title:</b> 
			<a href="{{url('/')}}/public/storage/papers/{{$data->file_location}}"> {{$data->paper_title}}</a> 
			<br>
			<b>Author(s): </b>{{$data->author_name}}<br>	
		@endforeach
	</table>
</div>

@endsection