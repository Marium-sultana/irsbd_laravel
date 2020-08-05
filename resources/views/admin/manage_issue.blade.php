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
               
                <th>Issue Name</th>
                <th>Year</th>
               
                <th>Actions</th>
            </tr>
        </thead>   
        <tbody>
            <?php
                foreach($all_issue as $v_paper)
                {
            ?>
            <tr>
               
                <td><?php echo $v_paper->issue_name?></td>
               <td><?php echo $v_paper->year?></td>
                <td class="center">
                 
                    <a class="btn btn-danger" href="<?php echo base_url();?>super_admin/delete_issue/<?php echo $v_paper->issue_id?>" title="Delete" onclick="return check_delete();">
                        <i class="icon-trash icon-white"></i> 
                     
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