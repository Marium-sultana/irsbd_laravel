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
                <a href="#">Edit Member</a>
            </li>
        </ul>
    </div>

    <div class="row-fluid sortable">
        <div class="box span12">
            <div class="box-header well" data-original-title>
                <h2><i class="icon-edit"></i> Edit Member</h2>
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
            $this->session->unset_userdata('message');
            }
            ?>
            </h3>

            <div class="box-content">
                <form name="edit_member" class="form-horizontal" enctype="multipart/form-data" 
                    action="{{route('irsMember-update',$irsMember->id)}}" method="post">
                @csrf
                    <fieldset>
                    <legend></legend>
                <div class="control-group">
                    <label class="control-label" for="typeahead">Member Name  </label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" id="typeahead"  name="member_name" value=" {{$irsMember->member_name}}">
                        <input type="hidden" class="span6 typeahead" id="typeahead"  name="member_id" value=" {{$irsMember->member_id}}">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="textarea2">Email</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" id="typeahead"  name="member_email"
                                value="{{ $irsMember->member_email}}">
                        </textarea>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="textarea2">Profile Link</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" id="typeahead"  
                                name="member_profile_link" value="{{$irsMember->member_profile_link}}">
                        </textarea>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="textarea2">Contact No</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" id="typeahead"  name="member_contact_no"
                                value="{{ $irsMember->member_contact_no}}">
                        </textarea>
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label" for="typeahead"> Image </label>
                    <div class="controls">
                        @if($irsMember->member_image)
                            <img id="previewImg" src="{{url('/')}}/public/storage/member_images/{{$irsMember->member_image}} " 
                                height="200" width="150"/> 
                        @else
                            <img id="previewImg" src="" alt="Preview Image" style="display:none" height="200" width="150"/> 
                        @endif
                    </div>
                </div>  

                <div class="control-group">
                    <label class="control-label" for="typeahead">Image </label>
                    <div class="controls">
                        <input type="file" class="span6"   name="member_image" value="member_image" onchange="previewFile(this);">
                <!-- <input type="file" name="photo" onchange="previewFile(this);" required>-->
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="textarea2">Working Area</label>
                    <div class="controls">
                        <input type="text" class="span6 typeahead" id="typeahead"  
                            name="member_designation" value="{{ $irsMember->member_designation}}">
                        </textarea>
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
$("#previewImg").css('display','block');

}
</script>


<!-- content ends -->
</div><!--/#content.span10-->
</div><!--/fluid-row-->
<hr>
@endsection