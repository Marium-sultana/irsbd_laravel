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
                <a href="#">Edit Uploaded Paper</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Edit  Uploaded Paper</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
            <h3>
                <?php
            // $msg = $this->session->userdata('message');
                    $msg = '';
                        if ($msg) {
                            echo $msg;
                            //$this->session->unset_userdata('message');
                        }
                ?>
            </h3>
            <div class="box-content">
                @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{$message}}
                    </div>
                @endif
        <!--{!! Form::model($uploadedPaper,['route'=>['journalPaper-update',$uploadedPaper->id],
                        'class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'edit_journal','method'=>'put']) !!}-->
                <form name="edit_journal" class="form-horizontal" enctype="multipart/form-data" 
                    action="{{route('journalPaper-update',$uploadedPaper->id)}}" method="post">               
                @csrf                
                    <fieldset>
                        <legend></legend>
                        <div class="control-group">
                    <!--- {!!Form::label('paper_title', 'Title',['class' => 'control-label','for'=>'paper_title']); !!}-->
                            <label class="control-label" for="typeahead">Title </label>
                            <div class="controls">
                            <!---{!!Form::text('paper_title', $uploadedPaper->paper_title,['class' => 'span6 typeahead','id'=>'paper_title']); !!}-->
                            <input type="text" class="span6 typeahead" id="typeahead"  name="paper_title" 
                                value="{{$uploadedPaper->paper_title}}">
                            <!--  <input type="hidden" class="span6 typeahead" id="typeahead"  name="paper_id" value="">-->

                            </div>
                        </div>
                    
                        <div class="control-group">
                    <!--- {!!Form::label('author_name', 'Author Name',['class' => 'control-label','for'=>'author_name']); !!}--->
                            <label class="control-label" for="textarea2">Author Name</label>
                            <div class="controls">
                        <!---  {!!Form::text('author_name', null,['class' => 'span6 typeahead','id'=>'author_name']); !!}--->
                                <input type="text" class="span6 typeahead" id="typeahead"  name="author_name" 
                                    value="{{$uploadedPaper->author_name}}">                               
                                </textarea>
                            </div>
                        </div>
                            
                        <div class="control-group">
                            <label class="control-label" for="typeahead">Main Manuscript file  </label>
                            <div class="controls">
                                <input type="file" class="span6"   name="selected_file">
                                <span>
                                    <a href="{{url('/')}}/public/storage/papers/{{$uploadedPaper->file_location}}" >
                                        <i class="icon-download"></i> {{substr($uploadedPaper->file_location, 11)}}</a>
                                </span>
                            </div>
                        
                        </div>
        
                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Update </button>
                            <button type="reset" class="btn">Cancel</button>
                        </div>
                        </fieldset>

                    </form>   

                </div>
             </div><!--/span-->

        </div><!--/row-->

<script type="text/javascript">




</script>

                    <!-- content ends -->
    </div><!--/#content.span10-->
</div><!--/fluid-row-->
<hr>
@endsection


