@extends('front.layout.master')
@section('content')



<div id=""> 
	<table  width=400 border="0" bordercolor="#111111" >
<tr>
	<td valign="top" bgcolor="#ffeeee">
	
	
        <?php 
        foreach($all_issue as $v_issue)
        {
           
        ?>
        
       <b> <?php echo $v_issue->issue_name;?> </b>
        
        <?php } ?>
	
	</td>
</tr>
</table>
        
	<table>
            
            <?php 
            foreach($all_paper as $v_paper)
            { if($v_paper->issue_id==$v_issue->issue_id)
            {
                ?>
                
           
            
            
	<p align='justify'>
	<b>Title:</b> <a href="<?php echo base_url().$v_paper->file_location;?>"> <?php echo $v_paper->paper_title;?> </a> <br>
	<b>Author(s): </b><?php echo $v_paper->author_name;?><br>
	
	 <?php }} ?> 
</table>
    </div>



@endsection