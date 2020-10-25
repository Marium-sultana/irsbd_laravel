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

    <div>
        <ul class="breadcrumb">
            <li>
                <a href="#">Home</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="#">Manage Member</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span16">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Manage Member</h2>
                
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
     
        <div class="box-content">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                        {{$message}}
                </div>
            @endif
            <table class="table table-striped table-bordered bootstrap-datatable datatable">
                <thead>
                    <tr>   
                        <th>Member ID</th>
                        <th>Member Name</th>
                        <th> Working Area</th>
                        <th>Contact No.</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                </thead>   
                <tbody>
                    @foreach($data as $i=>$member)    
                        <tr>
                            <td>{{$member->id}}</td>
                            <td class="center">{{$member->member_name}}</td>
                            <td class="center"> {{$member->member_designation}}</td>
                            <td class="center">{{$member->member_contact_no}}</td>
                            <td class="center">{{$member->member_email}}</td>     
                            <td class="center"> 
                                <a class="btn btn-info" href="{{url('admin/edit_member/'.$member->id)}}" title="Edit">
                                    <i class="icon-edit icon-white"></i>  
                                </a>
                                {!! Form::open(['method'=>'DELETE','url'=>['admin/manage_member/delete/'.$member->id],'style'=>'display:inline'])!!}
                                {!! Form::button('<i class="icon-trash icon-white"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm'] ) !!}
                                {!! Form::close()!!}
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