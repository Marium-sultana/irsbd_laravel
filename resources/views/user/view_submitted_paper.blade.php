@extends('user.layout.master')
@section('content')


<!----content start---->
<div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable datatable">
        <thead>
            <tr>
               
                <th>Paper Title</th>
                <th>Paper</th>
                <th>Cover Letter</th>
                <th>Agreement Letter</th>
                <th>Other File </th>
                <th>Author Name</th>
                <th>Publication Status</th>
                <th>Review Status</th>
                <th>Comment</th>
               
            </tr>
        </thead>   
        <tbody>
            <?php
                foreach($all_user as $v_paper)
                {
            ?>
            <tr>
               
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
                 <td class="center"><?php echo $v_paper->review?></td>
                  <td class="center"><?php echo $v_paper->text?></td>
            </tr>
                <?php } ?>
        </tbody>
    </table>            
</div>


        
 @endsection       