@extends('front.layout.master')
@section('content')


<div id=""> <a name="IJIR (ISSN: ) "></a>  
  <p align="Justify">
    Innovative Research Syndicate (IRS) is a research group those who are integrating education and research for improving research outcomes both nationally and internationally. IRS members lead the way in collaborative research, training, policy initiatives, seminar and research publication. 
  </p>
  <b>
  <h2>
    <font color="#008000" align="Center">
      IRS Members
    </font>
  </h2>
</b>
@foreach($designation_data as $designation)

  <div class="container-fluid">
     
     <h1>
      {{$designation->member_designation}}
     </h1>
     <div class="row">
     @foreach($data[$designation->member_designation] as $member)
      <div class="col-sm-5" >
        @if($member->member_image)
            <img id="previewImg" src="{{url('/')}}/public/storage/member_images/{{$member->member_image}} " height="200" width="150"/> 
        @else
            <img id="previewImg" src="" alt="Preview Image" style="display:none" height="200" width="150"/> 
        @endif
        <div class="center">{!! $member->member_name !!}</div>
      </div>
      @endforeach
   </div>
 </div>
         
  @endforeach  

@endsection