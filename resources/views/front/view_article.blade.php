@extends('front.layout.master')
@section('content')
     
<h1 class="title" id="page-title"> Archive </h1>
 <div class="view-content">
      <div class="item-list">
  <ul class="views-summary">
      
    </ul>
          
      </div>
      </div>

<h3>Table of Contents</h3>
        <h4 class="tocSectionTitle">Research Articles</h4>

        @foreach($paperData as $data)
            
            <p align='justify'>
            <b>Title:</b> 
            <a href="{{url('/paper_detail/'.$data->id)}}"> {{$data->paper_title}}</a> 
            <br>
            <b>Author(s): </b>{{$data->author_name}}<br>
            
        @endforeach
    <br>
	 
     <a href="{{url('/')}}/public/storage/papers/{{$data->file_location}}" class="file">DOWNLOAD </a>

                       
	
	
</table>
     
         
		        
    
    
   

@endsection