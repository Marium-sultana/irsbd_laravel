@extends('user.layout.master')
@section('content')


<!----content start---->
<div class="box-content">
                   @if($message = Session::get('success'))
                        <div class="alert alert-success">
                             {{$message}}
                        </div>
                    @endif
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
            <tr>
               
                <th>Paper Title</th>
                <th>Paper</th>
                <th>Cover Letter</th>
                <th>Agreement Letter</th>
                <th>Other File </th>
                <th>Author Name</th>
                <th>Publication Status</th>
                <th>Review Status</th>
                <th>Comment</th>
               
            </tr>
        </thead>   
        <tbody>
            <tr>
            @foreach($data as $i=>$u_paper)
               
                <td>{{ $u_paper->paper_title}}</td>
               
                <td class="center">
                    <a href="{{url('/')}}/public/storage/user_papers/{{$u_paper->file_location}}" class="rm">
                        <i class="icon-download"></i> {{substr($u_paper->file_location, 11)}}
                    </a>
                </td>

                <td class="center">          
                    <a href="{{url('/')}}/public/storage/cover_letters/{{$u_paper->cover_letter}}" class="rm">
                        <i class="icon-download"></i> {{substr($u_paper->cover_letter, 11)}}
                    </a>
                </td>
                
                <td class="center">          
                    <a href="{{url('/')}}/public/storage/agreement_letter/{{$u_paper->agreement_letter}}" class="rm">
                        <i class="icon-download"></i> {{substr($u_paper->agreement_letter, 11)}}
                    </a>
                </td>

                <td class="center">          
                    <a href="{{url('/')}}/public/storage/other_file/{{$u_paper->other_files}}" class="rm">
                        <i class="icon-download"></i> {{substr($u_paper->other_files, 11)}}
                    </a>
                </td>

                 <td class="center">{{ $u_paper->author_name}}</td>
                 <td class="center">
                    <?php  
                        if($u_paper->status==1)
                        {
                            echo 'Published';
                        }
                        else{
                            echo 'Unpublished';
                        }
                    ?>
                </td>
                 <td class="center"></td>
                  <td class="center"></td>
            </tr>
            @endforeach
        </tbody>
    </table>            
</div>


        
 @endsection       