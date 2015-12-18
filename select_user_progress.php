<?php
	error_reporting(0);
	include("header.php");
	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);

	$sql="select role from user_details where (user_name='".$_SESSION['userName']."')";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	session_start();
	/*if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
	elseif($result['role']!='admin'){
		header("Location: /idminduction/progress/select_user_progress.php");
		exit;
	}*/
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Check Progress</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
		
	</head>
	
	<body style="background: url(img/bg.jpg) #000000;">
	<?php
		echo $header;
		$username = "root";
		$password = "";
		$hostname = "localhost";
		$dbhandle = mysql_connect($hostname, $username, $password)
		or die("Unable to connect to MySQL");
		$selected = mysql_select_db("microfocus",$dbhandle);
		$result = mysql_query("SELECT first_name from user_details where role='trainee'");

	?>
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Select Trainee</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						<form action="modify_user.php" method="POST">
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Select Trainee to see Progress</label></center>
							<br>
							 <div class="form-group ">
								<label for="User">Trainee: </label>&nbsp;&nbsp;<select id="user" name="user">
									<?php
									while ($row = mysql_fetch_array($result)) {
										echo "<option value=".$row{'first_name'}.">".$row{'first_name'}."</option>";
									}
									mysql_close($dbhandle);
									?>
								</select>
							 </div>
							 <p>
							<button type="submit" id="select_User" class="btn btn-primary" style="float:right;">Submit</button>
							</form>					 
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>

