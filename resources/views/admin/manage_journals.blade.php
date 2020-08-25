@extends('admin.layout.master')
@section('content')
<noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="span10">
                    <!-- content starts -->

                    <div class="box-content">
                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                             {{$message}}
                        </div>
                    @endif
      <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
            <tr>
                <th>Serial No</th>
                <th>Paper Title</th>
                <th>Manuscript File</th>
                <th>Author Name</th>
                <th>Abstract</th>
              
                 <th>Issue</th>
                
                <th>Actions</th>
            </tr>
        </thead>   
        <tbody>
                @foreach($data as $i=>$paper)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{$title}} {{ $paper->paper_title}}</td>
               
                <td class="center"
                        ><a href=" {{url('/')}}/public/storage/papers/{{$paper->file_location}}" class="rm">
                             <i class="icon-download"></i> {{substr($paper->file_location, 11)}}</a>
                </td>
                 <td class="center">{{ $paper->author_name}}</td>
                  <td>{{$paper->abstract}}</td>
                  <td>{{$issue[$paper->issue_id]}}</td>
               
                <td class="center">
                   {!! Form::open(['method'=>'DELETE','url'=>['admin/manage_journals/delete/'.$paper->id],'style'=>'display:inline'])!!}
                  {!! Form::button('<i class="icon-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                   {!! Form::close()!!}
                    
                    <!---<a class="btn btn-danger" href="{{url('admin/manage_journals/delete/'.$paper->id)}}" method="delete" title="Delete" onclick="return check_delete();">
                        <i class="icon-trash icon-white"></i> 
                     
                    </a>-->
                     
                 <a class="btn btn-primary" href="{{url('admin/edit_journal/'.$paper->id)}}" title="Edit">
       
                        <i class="icon-check icon-white"></i>  
						
                    </a>
                    
                    
                    
                </td>
            </tr>
            @endforeach  
        </tbody>
    </table>            
</div>
                    <!-- content ends -->
                </div><!--/#content.span10-->
            </div><!--/fluid-row-->

            <hr>
@endsection


