@extends('admin.layout.master')
@section('content')
<noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
                </noscript>

                <div id="content" class="span10">
                    <!-- content starts -->

                    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
            <tr>
                <th>Paper Id</th>
                <th>Paper Title</th>
                <th>Manuscript File</th>
                <th>Author Name</th>
                <th>Abstract</th>
              
                 <th>Issue</th>
             
                <th>Actions</th>
            </tr>
        </thead>   
        <tbody>
            <?php
                foreach($all_journal as $v_journal)
                {
            ?>
            <tr>
                <td><?php echo $v_journal->paper_id?></td>
                <td><?php echo $v_journal->paper_title?></td>
               
                <td class="center"><a href="<?php echo base_url().$v_journal->file_location?>" class="rm">Download</a></td>
                 <td class="center"><?php echo $v_journal->author_name?></td>
                  <td><?php echo $v_journal->abstract?></td>
                  <td><?php echo $v_journal->issue_id?></td>
       
        
               
                <td class="center">
             
                 
                    
                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_journal/<?php echo $v_journal->paper_id?>" title="Delete" onclick="return check_delete();">
                        <i class="icon-trash icon-white"></i> 
                     
                    </a>
                     
                 <a class="btn btn-primary" href="<?php echo base_url();?>super_admin/edit_journal/<?php echo $v_journal->paper_id?>" title="Edit">
       
                        <i class="icon-check icon-white"></i>  
						
                    </a>
                    <?php } ?>
                    
                    
                </td>
            </tr>
              
        </tbody>
    </table>            
</div>
                    <!-- content ends -->
                </div><!--/#content.span10-->
            </div><!--/fluid-row-->

            <hr>
@endsection


