<?php
// $arrowLeft = '<--';
// $arrowRight = '-->';

if(isset($_POST['forward'])){
                        
                        
    // echo $arrowRight;
    echo 'Why was this day a forward day?';
    ?>
<form action="index.php" method="POST">
<input type="text" name="forwardInput" value="">
<input type="submit" name="forwardSubmit" value="Confirm">
 

</form>
<?php
    // $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
    // $nLine = "\n";
    // fwrite($myfile, 'forward' . $nLine);
    // fclose($myfile);
        
} elseif (isset($_POST['backward'])){

    echo 'Why was this day a backward day?';
    ?>
<form action="index.php" method="POST">
<input type="text" name="backwardInput" value="">
<input type="submit" name="backwardSubmit" value="Confirm">
 

</form>
<?php

    // echo $arrowLeft;
    // $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
    // $nLine = "\n";
    // fwrite($myfile, 'backward' . $nLine);
    // fclose($myfile);
  
}


?>