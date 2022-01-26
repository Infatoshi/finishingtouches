<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='style.css'>
</head>

<body>


    <?php 
// sunday = 1
// monday = 2
// tuesday = 3
// wednesday = 4
// thursday = 5
// friday = 6
// saturday = 7

// $time = strtotime("1 January 2022"), "\n";

$defaultYear = 2022;
$defaultMonth = 1;
$d=cal_days_in_month(CAL_GREGORIAN,$defaultMonth,$defaultYear);
$daysInCurrentMonth = date('t');
$jd=gregoriantojd($defaultMonth,$daysInCurrentMonth,$defaultYear);
$lastDayOfCurrentMonth = jddayofweek($jd,1);
$jd=gregoriantojd($defaultMonth,1,$defaultYear);
$currentMonth = jdmonthname($jd,1);

// echo $daysInCurrentMonth;
// echo "There was $d days in jan 2022";

$rowLength = 7;

$currentDate = 1;
$subDivNumbers = [];

$str = '1 January 2022';

$timestamp = strtotime($str);
$firstDay = date('l', $timestamp);
$fillerDays = 0;
$daysFirstWeek = 0;



// set variables first filler and total days in the first week on the calendar
if ($firstDay == 'Sunday') {
    $fillerDays = 0;
    $daysFirstWeek = 7;
} elseif ($firstDay == 'Monday') {
    $fillerDays = 1;
    $daysFirstWeek = 6;
} elseif ($firstDay == 'Tuesday') {
    $fillerDays = 2;
    $daysFirstWeek = 5;
} elseif ($firstDay == 'Wednesday') {
    $fillerDays = 3;
    $daysFirstWeek = 4;
} elseif ($firstDay == 'Thursday') {
    $fillerDays = 4;
    $daysFirstWeek = 3;
} elseif ($firstDay == 'Friday') {
    $fillerDays = 5;
    $daysFirstWeek = 2;
} elseif ($firstDay == 'Saturday') {
    $fillerDays = 6;
    $daysFirstWeek = 1;
}



if (isset($_POST['forwardSubmit'])) {
    if(empty($_POST['forwardInput'])){
        echo "You must type something";
    } else {
        $forwardInput = $_POST['forwardInput'];
        $fillInMiddle = ' was a forward day because';
        $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
        $nLine = "\n";
        fwrite($myfile, $currentMonth . $currentDate . $fillInMiddle . $nLine . $forwardInput . $nLine . $nLine);
        fclose($myfile);
    }
} elseif (isset($_POST['backwardSubmit'])) {
    if(empty($_POST['backwardInput'])){
        echo "You must type something";
    } else {
        $backwardInput = $_POST['backwardInput'];
        $fillInMiddle = ' was a backward day because';
        $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
        $nLine = "\n";
        fwrite($myfile, $currentMonth . $currentDate . $fillInMiddle . $nLine . $backwardInput . $nLine . $nLine);
        fclose($myfile);
    }
}





// filler days loop
if ($fillerDays !== 0) {
?>
    <div class="container">

        <?php
            for ($x = 0; $x < $fillerDays; $x++) {
        
        ?>
                <div class='fillersubDiv'>
                    <br>
                    <br>
                    <br>
                    <p></p>
                </div>
        <!-- <div class='gridParent'> -->




        <?php 
    
            } 
            

            for ($y = 0; $y < $daysFirstWeek; $y++) {
        
        ?>
                
            <div class="subDiv">
                <?php
                    echo $currentDate;
                    // $arrowLeft = '<--';
                    // $arrowRight = '-->';
                    
                    // echo $subDivNumbers[$currentDate];
                    
                    // if (isset($_POST['forwardSubmit'])) {
                    //     if(empty($_POST['forwardInput'])){
                    //         echo "You must type something";
                    //     } else {
                    //         $forwardInput = $_POST['forwardInput'];
                    //         $fillInMiddle = ' was a forward day because';
                    //         $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
                    //         $nLine = "\n";
                    //         fwrite($myfile, $currentMonth . $currentDate . $fillInMiddle . $nLine . $forwardInput . $nLine);
                    //         fclose($myfile);
                    //     }
                    // } elseif (isset($_POST['backwardSubmit'])) {
                    //     if(empty($_POST['backwardInput'])){
                    //         echo "You must type something";
                    //     } else {
                    //         $backwardInput = $_POST['backwardInput'];
                    //         $fillInMiddle = ' was a backward day because';
                    //         $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
                    //         $nLine = "\n";
                    //         fwrite($myfile, $currentMonth . $currentDate . $fillInMiddle . $nLine . $backwardInput . $nLine);
                    //         fclose($myfile);
                    //     }
                    // }
                    // if(isset($_POST['forward'])){
                        
                        
                    //     echo $arrowRight;
                    //     $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
                    //     $nLine = "\n";
                    //     fwrite($myfile, 'forward' . $nLine);
                    //     fclose($myfile);
                            
                    // } elseif (isset($_POST['backward'])){

                    //     echo $arrowLeft;
                    //     $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
                    //     $nLine = "\n";
                    //     fwrite($myfile, 'backward' . $nLine);
                    //     fclose($myfile);
                      
                    // }
                

                ?>
                <form action="report.php" method="POST">
                <input type='submit' name='backward' value='Backward'>
                <input type='submit' name='forward' value='Forward'>
                </form>   

            </div>


        <?php
            array_push($subDivNumbers, 'forward' . $currentDate);
            $currentDate++;
            
            }
        
    
        ?>



    </div>
    <?php
        
}

// forward+backward functions






$colLength = 1;
$fillerDaysLastWeek = 0;


if ($lastDayOfCurrentMonth == 'Saturday') {
    $fillerDaysLastWeek = 0;
} elseif ($lastDayOfCurrentMonth == 'Friday') {
    $fillerDaysLastWeek = 1;
} elseif ($lastDayOfCurrentMonth == 'Thursday') {
    $fillerDaysLastWeek = 2;
} elseif ($lastDayOfCurrentMonth == 'Wednesday') {
    $fillerDaysLastWeek = 3;
} elseif ($lastDayOfCurrentMonth == 'Tuesday') {
    $fillerDaysLastWeek = 4;
} elseif ($lastDayOfCurrentMonth == 'Monday') {
    $fillerDaysLastWeek = 5;
} elseif ($lastDayOfCurrentMonth == 'Sunday') {
    $fillerDaysLastWeek = 6;
}


// controls # of weeks in month -> columns
for ($n = 0; $n < $colLength; $n++) {
    if ($currentDate < $daysInCurrentMonth) {
        $colLength++;
?>
    <!-- <div class='gridParent'> -->
    <div class="container">

    <?php 

    for ($i = 0; $i < 7; $i++){
        if ($currentDate <= $daysInCurrentMonth) {
    
    ?>

        <div class='subDiv'>
            <p>
                <?php
                    echo $currentDate;
                    // $arrowLeft = '<--';
                    // $arrowRight = '-->';
                    
                    // if ($currentDate <= $daysInCurrentMonth) {
                    //     array_push($subDivNumbers, 'day' . $currentDate);
                        
                        
                        
                    //         // echo $subDivNumbers[$currentDate - 1];
                    // }
                    // $inputIntoForward = "forward" . $subDivNumbers[$currentDate - 1]; 
                    // $inputIntoBackward = "backward" . $subDivNumbers[$currentDate - 1];
                    
                    // if (isset($_POST[$inputIntoForward])){
                    //     echo $subDivNumbers[$currentDate];
                    //     echo $arrowRight;
                    //     $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
                    //     $nLine = "\n";
                    //     fwrite($myfile, 'forward' . $nLine);
                    //     fclose($myfile);
                            
                    // } elseif (isset($_POST['backward'])){

                    //     echo $arrowLeft;
                    //     $myfile = fopen("backend.txt", "a") or die("Unable to open file!");
                    //     $nLine = "\n";
                    //     fwrite($myfile, 'backward' . $nLine);
                    //     fclose($myfile);
                      
                    // }
                    
                    
                ?>
            </p>

            <form action="report.php" method="POST">
                <input type='submit' name='backward' value='Backward'>
                <input type='submit' name='forward' value='Forward'>
            </form>

        </div>

        <?php

            } else {
                
            for ($x = 0; $x < $fillerDaysLastWeek; $x++) {
        
        ?>
                <div class='fillersubDiv'>
                    <br>
                    <br>
                    <br>
                    <p></p>
                </div>
        <!-- <div class='gridParent'> -->




        <?php 
    
            } 
                break;
            }
        ?>


        <?php
            if ($currentDate <= $daysInCurrentMonth) {
                
                $currentDate++;
                
                
                    // echo $subDivNumbers[$currentDate - 1];
            }
    }

        ?>

        <!-- </div> -->
        </div>

    <?php
}
}
// print_r($subDivNumbers);
    ?>

</body>

</html>