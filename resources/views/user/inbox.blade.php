@extends('user.layout.master')
@section('content')


<!----content start---->

<div class="box-content">

<style>
button.accordion {
    background-color: #eee;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #ddd;
}

button.accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
}

button.accordion.active:after {
    content: "\2212";
}

div.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
</style>

<?php foreach($all_paper as $v_paper)
{?>


    <button class="accordion">
        <?php 
        if( $v_paper->text==1)
            {echo 'CONGRATULATIONS!!! Your paper '. $a . ' is ACCEPTED';}
        elseif( $v_paper->text==2)
            { $a= $v_paper->paper_title;
                echo 'Sorry! Your paper '. $a . ' needs MAJOR correction';} 
        elseif( $v_paper->text==3)
            { $a= $v_paper->paper_title;
                echo 'Sorry! Your paper '. $a . ' needs MINOR correction';} 
            elseif( $v_paper->text==4)
            { $a= $v_paper->paper_title;
                echo 'Sorry! Your paper '. $a . ' is  REJECTED';} 
            
            else{
                $a= $v_paper->paper_title;
                echo "your paper  $v_paper->paper_title  is under REVIEW";}
            ?>
    </button>
    <div class="panel">
        <p><?php echo $v_paper->text;?></p>
    </div>
<?php }?>


<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].onclick = function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight){
            panel.style.maxHeight = null;
            } else {
            panel.style.maxHeight = panel.scrollHeight + 'px';
            } 
        }
    }
</script>
</tbody>
</table>
</div>

        
 @endsection       