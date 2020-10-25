@extends('user.layout.master')
@section('content')


<!----content start---->
<div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a> <span class="divider">/</span>
        </li>
        <li>
            <a href="#">Submit Paper</a>
        </li>
    </ul>
</div>

<div class="row-fluid sortable">
    <div class="box span12">
        <div class="box-header well" data-original-title>
            <h2><i class="icon-edit"></i>Submit Paper</h2>
            
            <div class="box-icon">
                <a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
                <a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
                <a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
            </div>
        </div>
        <h3>
        </h3>
        <div class="box-content">
            <form class="form-horizontal" enctype="multipart/form-data" action="http://localhost/irsbd/super_user/save_submitted_paper" method="post">
                <fieldset>
                    <legend></legend>
                      <div class="control-group">
                        <label class="control-label" for="typeahead">Email  </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="user_email">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Manuscript Title  </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="paper_title">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Manuscript Author Name </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="author_name">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Manuscript Type </label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="manuscript_type">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Subject Area</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="subject_area">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Suggested Reviewer(At least 3)</label>
                        <div class="controls">
                            <input type="text" class="span6 typeahead" id="typeahead"  name="suggested_reviewer">
                            
                        </div>
                    </div>
                   <div class="control-group">
                        <label class="control-label" for="textarea2">Manuscript Abstract</label>
                        <div class="controls">
                            <textarea class="cleditor" id="textarea2" rows="3" name="abstract"></textarea>
                        </div>
                    </div>
                   
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Select File </label>
                        <div class="controls">
                            <input type="file" class="span6"   name="selected_file">
                            
                        </div>
                    </div>
                    
                     <div class="control-group">
                        <label class="control-label" for="typeahead">Cover Letter </label>
                        <div class="controls">
                            <input type="file" class="span6"   name="cover_letter">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Agreement Letter</label>
                        <div class="controls">
                            <input type="file" class="span6"   name="agreement_letter">
                            
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="typeahead">Other File </label>
                        <div class="controls">
                            <input type="file" class="span6"   name="other_file">
                            
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

		<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">Ã—</button>
				<h3>Settings</h3>
			</div>
			<div class="modal-body">
				<p>Here settings can be configured...</p>
			</div>
			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal">Close</a>
				<a href="#" class="btn btn-primary">Save changes</a>
			</div>
		</div>


        
 @endsection       