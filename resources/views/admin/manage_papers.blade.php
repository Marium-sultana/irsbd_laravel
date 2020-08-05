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
                <th>Paper</th>
                <th>Cover Letter</th>
                <th>Agreement Letter</th>
                <th>Other File</th>
                <th>Author Name</th>
                <th>Publication Status</th>
                 <th>Review Status</th>
                <th>Comment</th>
                <th>Actions</th>
            </tr>
        </thead>   
        <tbody>
            <?php if(!empty($all_paper)){ 
                foreach($all_paper as $v_paper)
                {
            ?>
            <tr>
                <td><?php echo $v_paper->paper_id?></td>
                <td><?php echo $v_paper->paper_title?></td>
               
                <td class="center"><a href="<?php echo base_url().$v_paper->file_location?>" class="rm">Download</a></td>
                 <td class="center"><a href="<?php echo base_url().$v_paper->cover_letter?>" class="rm">Download</a></td>
                  <td class="center"><a href="<?php echo base_url().$v_paper->agreement_letter?>" class="rm">Download</a></td>
                   <td class="center"><a href="<?php echo base_url().$v_paper->other_file?>" class="rm">Download</a></td>
                 <td class="center"><?php echo $v_paper->author_name?></td>
                <td class="center"><?php  
                    if($v_paper->status==1)
                    {
                        echo 'Published';
                    }
                    else{
                        echo 'Unpublished';
                    }
                    
                   
 

                ?></td>
                <td class="center"><?php if( $v_paper->text==1)
    {echo 'accepted';}
elseif( $v_paper->text==2)
    {echo 'Major';} 
elseif( $v_paper->text==3)
    {echo 'Minor';} 
    elseif( $v_paper->text==4)
    {echo 'Rejected';} 
    else{ echo 'Unreviewed';}?></td>
                  <td class="center"><?php echo $v_paper->text?></td>
                <td class="center">
                 
                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_paper/<?php echo $v_paper->paper_id?>" title="Delete" onclick="return check_delete();">
                        <i class="icon-trash icon-white"></i> 
                     
                    </a>
                     
                 <a class="btn btn-primary" href="<?php echo base_url();?>super_admin/review_paper/<?php echo $v_paper->paper_id?>" title="Review">
                        <i class="icon-check icon-white"></i>  
						
                    </a>
                   
                    
                    
                </td>
            </tr>
            <?php }} ?> 

        </tbody>
    </table>            
</div>
                    <!-- content ends -->
                </div><!--/#content.span10-->
            </div><!--/fluid-row-->

            <hr>
@endsection



