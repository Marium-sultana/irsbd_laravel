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
                <a href="#">Admin Review</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i>Admin Review</h2>
                
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
        <h3>
            <?php
                // $msg=$this->session->userdata('message');
                $msg=''; 
                if($msg)
                {
                    echo $msg;
                    $this->session->unset_userdata('message');
                }
            ?>
        </h3>
        <div class="box-content">
            @if($message = Session::get('success'))
                <div class="alert alert-success">
                        {{$message}}
                </div>
            @endif
            <form class="form-horizontal" enctype="multipart/form-data" action="{{route('userPaper-review',$userPaper->id)}}"
                 method="post">
            @csrf
                <fieldset>
                    <legend></legend>
                    
                    <!-- <input type="hidden" class="span6 typeahead" id="typeahead"  name="paper_id" value="">-->
                    
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Review  </label>
                            <div class="controls">
                                <select name="review">
                                    <option>Review Option.</option>                               
                                    <option value="1">Accepted</option>
                                    <option value="2">Major</option>
                                    <option value="3">Minor</option>
                                    <option value="4">Rejected</option>                                
                                </select>
                            </div>
                         </div>
                    
                        <div class="control-group">
                            <label class="control-label" for="textarea2">Comment</label>
                            <div class="controls">
                                <textarea class="cleditor" id="textarea2" rows="3" name="text"></textarea>
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