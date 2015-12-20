<?php

	error_reporting(0);
	
	$question = $_POST['question'];
	$optionA = $_POST['optionA'];
	$optionB = $_POST['optionB'];
	$optionC = $_POST['optionC'];
	$optionD = $_POST['optionD'];
	$answer = $_POST['answer'];
	//$Modified_by ="me";
	session_start();
	$Modified_by =$_SESSION['userName'];
	$Component = $_SESSION['Component'];
	
	function WriteQuestion($question ,$optionA ,$optionB,$optionC ,$optionD,$answer,$Component,$Modified_by )
	{	
		$con = mysql_connect("localhost","root","");
		$db= mysql_select_db("microfocus", $con);	
		$sql="INSERT INTO quiz_detail(Component,Question,A,B,C,D,Ans,Modified_by) VALUES ('".$Component."','".$question."','".$optionA."','".$optionB."','".$optionC."','".$optionD."','".$answer."','".$Modified_by."')";
		$query=mysql_query($sql);
		mysqli_close($con);
	}	
	if ( !isset($_SESSION['Qnumber'])) {
		header("Location: index.php");
		exit;
	}
	else if ($_SESSION['Qnumber'] ==0) 
	{		
		$redirect = "Location:Quiz_Done.php?username=".$Modified_by;
	}
	else
	{	
		$redirect = "Location:Quiz_StartWrite.php?username=".$Modified_by;
	}
	WriteQuestion($question ,$optionA ,$optionB,$optionC ,$optionD,$answer,$Component,$Modified_by );
	header($redirect);



?>