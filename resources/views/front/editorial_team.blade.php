@extends('front.layout.master')
@section('content')




<?php foreach ($editorial_team as $v_word) { ?>
     <?php echo $v_word->text ?>
<?php } ?> 
</p>
 </div>
   



@endsection