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
                <a href="#">Update Issue Image</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Update Issue Image</h2>
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
        <h3>
        <?php
        //$msg=$this->session->userdata('message');
        $msg = '';
        if($msg)
        {
            echo $msg;
            // $this->session->unset_userdata('message');
        }
        ?>
        </h3>
            <div class="box-content">
                @if(count($errors) > 0)
                    <div class="alert alert-danger" role="alert">
                        <ul>
                        @foreach($errors->all() as $error)
                            <li style="padding:10px">{{$error}}</li>
                        @endforeach
                        </ul>
                    </div>
                @endif
                <form class="form-horizontal" enctype="multipart/form-data" action="{{url('admin/add_banner')}}" method="post">
                @csrf
                    <fieldset>
                    <legend></legend>
                    <input type="hidden" class="span6 typeahead" id="typeahead"  name="image_id" value="1">
                <div class="control-group">
                    <label class="control-label" for="typeahead">Update Issue Image </label>
                    <div class="controls">
                        <input type="file" class="span6"  name="selected_file">
                    </div>
                </div>


                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">Save </button>
                    <button type="reset" class="btn">Cancel</button>
                </div>
                    </fieldset>
                </form>   
            </div>
        </div><!--/span-->
    </div><!--/row-->
                <!-- content ends -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->
<hr>

@endsection