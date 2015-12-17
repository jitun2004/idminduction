<?php
	error_reporting(0);
	include("header.php");
	session_start();
	if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<link rel="icon" href="css/images/l2.png" type="image/gif" sizes="16x16">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	
	<title>IDM Quiz</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	
	<link rel="stylesheet" type="text/css" href="css/style.css" /> 
	
</head>

<body>
<?php
	echo $header;
?>
	<div id="page-wrap">

		<h1>Questions for RBPM</h1>
		
        <?php
            
            $answer1 = $_POST['question-1-answers'];
            $answer2 = $_POST['question-2-answers'];
            $answer3 = $_POST['question-3-answers'];
            $answer4 = $_POST['question-4-answers'];
        
            $totalCorrect = 0;
            
            if ($answer1 == "B") { $totalCorrect++; }
            if ($answer2 == "A") { $totalCorrect++; }
            if ($answer3 == "C") { $totalCorrect++; }
            if ($answer4 == "A"){ $totalCorrect++; }
            
            echo "<div id='results'>$totalCorrect / 4 correct</div>";
            
        ?>
	
	</div>


</body>

</html>