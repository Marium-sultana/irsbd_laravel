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
                
                    <th>Issue Name</th>
                    <th>Year</th>
                    <th>Status</th>
                <!--<th>Actions</th>-->
                </tr>
            </thead>   
            <tbody>
                @foreach($data as $i=>$m_issue)            
                    <tr>
                        <td>{{ $m_issue->issue_name}}</td>
                        <td>{{ $m_issue->year}}</td>
                        <td class="center">
                            {!! Form::open(['method'=>'PUT','url'=>['admin/manage_issue/status/'.$m_issue->id],
                                            'style'=>'display:inline'])!!}
                            @if($m_issue->status === 1)
                                        {!! Form::submit('Active', ['class' => 'btn btn-success btn-sm'] ) !!}
                            @else
                                        {!! Form::submit('Inactive', [ 'class' => 'btn btn-danger btn-sm'] ) !!}
                            @endif
                                    {!! Form::close()!!}
                        </td>
                <!---<td class="center">
                {!! Form::open(['method'=>'DELETE','url'=>['admin/manage_issue/delete/'.$m_issue->id],'style'=>'display:inline'])!!}
                {!! Form::button('<i class="icon-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                {!! Form::close()!!}
                 
                   <!--- <a class="btn btn-danger" href="super_admin/delete_issue/" title="Delete" onclick="return check_delete();">
                        <i class="icon-trash icon-white"></i> -->
                       
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