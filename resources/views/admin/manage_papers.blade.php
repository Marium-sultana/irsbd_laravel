@extends('admin.layout.master')
@section('content')
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
                    <th>Serial No.</th>
                    <th>Paper Title</th>
                    <th>Paper</th>
                    <th>Cover Letter</th>
                    <th>Agreement Letter</th>
                    <th>Other File</th>
                    <th>Author Name</th>
                    <th>Publication Status</th>
                    <th>Review Status</th>
                    <th>Comment</th>
                    <th>Actions</th>
                </tr>
            </thead>   
            <tbody>
                @foreach($a_data as $i=>$a_paper)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $a_paper->paper_title}}</td>                        
                        <td class="center">
                            <a href="{{url('/')}}/public/storage/user_papers/{{$a_paper->file_location}}" class="rm">
                                <i class="icon-download"></i> {{substr($a_paper->file_location, 11)}}
                            </a>
                        </td>
                        <td class="center">          
                            <a href="{{url('/')}}/public/storage/cover_letters/{{$a_paper->cover_letter}}" class="rm">
                                <i class="icon-download"></i> {{substr($a_paper->cover_letter, 11)}}
                            </a>
                        </td>
                        <td class="center">          
                            <a href="{{url('/')}}/public/storage/agreement_letter/{{$a_paper->agreement_letter}}" class="rm">
                                <i class="icon-download"></i> {{substr($a_paper->agreement_letter, 11)}}
                            </a>
                        </td>
                        <td class="center">          
                            <a href="{{url('/')}}/public/storage/other_file/{{$a_paper->other_files}}" class="rm">
                                <i class="icon-download"></i> {{substr($a_paper->other_files, 11)}}
                            </a>
                        </td>
                        <td class="center">{{ $a_paper->author_name}}</td>
                        <td class="center">
                            <?php  
                                if($a_paper->status==1)
                                {
                                    echo 'Published';
                                }
                                else{
                                    echo 'Unpublished';
                                }
                            ?>
                        </td>

                        <td class="center">
                            @if( $a_paper->review==1)
                                {{'accepted'}}
                            @elseif( $a_paper->review==2)
                                {{ 'Major'}} 
                            @elseif( $a_paper->review==3)
                                {{'Minor'}} 
                            @elseif( $a_paper->review==4)
                                {{'Rejected'}} 
                            @else
                                {{'Unreviewed'}}
                            @endif
                        </td>
                        <td class="center">{{$a_paper->text}}</td>
                        <td class="center">
                            {!! Form::open(['method'=>'DELETE','url'=>['admin/manage_papers/delete/'.$a_paper->id],'style'=>'display:inline'])!!}
                                {!! Form::button('<i class="icon-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                                {!! Form::close()!!}
                            
                        <a class="btn btn-primary" href="{{url('admin/review_paper/'.$a_paper->id)}}" title="Review">
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



