<?php
$qnumber = $_POST['qnumber'];

  //validating number of question for the first time
    if($qnumber>0)
    {
        session_start();
        $_SESSION['Qnumber']=$qnumber;

    }
    else
	{
        echo "Invalid number";
    }

?>