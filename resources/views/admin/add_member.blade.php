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
                <a href="#">Add IRS Member</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i>Add IRS Member</h2>
                
                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
                </div>
            </div>
        <h3>
            <?php
            // $msg=$this->session->userdata('message');
            $msg = '';
                if($msg)
                {
                    echo $msg;
                    //$this->session->unset_userdata('message');
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

            <form class="form-horizontal" enctype="multipart/form-data" action="{{url('admin/member')}}" method="post">
            @csrf
                <fieldset>
                    <legend></legend>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Member Name  </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="member_name">                            
                        </div>
                    </div>
                           
                   <div class="control-group">
                        <label class="control-label" for="textarea2">Working Area</label>
                        <div class="controls">
                            <select name="member_designation">
                                <option>Select Working Area</option>
                                <option value="Coordinator">Coordinator</option>
                                <option value="Publication Division">Publication Division</option>
                                <option value="Research Division">Research Division</option>
                                <option value="Finance Division">Finance Division</option>
                                <option value="Knowledge Sharing Division">Knowledge Sharing Division</option>
                                <option value="Technical Support Division">Technical Support Division</option>                                                           
                            </select>
                        </div>
                    </div>
                      
               
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Contact No  </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="member_contact_no">                            
                        </div>
                    </div>
              
                    
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Image </label>
                        <div class="controls">
                            <input type="file" class="span6"   name="member_image" onchange="previewFile(this);">                           
                        </div>
                    </div>

                    <div class="control-group" style="display:none" id="preview_div">
                        <div class="controls">
                           <img id="previewImg" src="" alt="Preview Image" height="200" width="150"/>                             
                        </div>
                    </div>
             
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Email  </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="member_email">                           
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead"> Profile Link  </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="member_profile_link">                            
                        </div>
                    </div>
                
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Save </button>
                        <button type="reset" class="btn">Cancel</button>
                    </div>
                </fieldset>
            </form>   

        </div>
    </div><!--/span--></div><!--/row-->
    

                    <!-- content ends -->
 </div><!--/#content.span10-->
</div><!--/fluid-row-->

<hr>

 <script type="text/javascript">

        function previewFile(input){
            var file = $("input[type=file]").get(0).files[0];

            if(file){
                var reader = new FileReader();

            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
            }

            reader.readAsDataURL(file);
            }
            //$("#preview_div").show();
           $("#preview_div").css('display','block');
        }


</script>
        
@endsection