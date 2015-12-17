<?php
	error_reporting(0);
	include("header.php");
	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);

	$sql="select role from user_details where (user_name='".$_SESSION['userName']."')";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	session_start();
	if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
	elseif($result['role']!='admin'){
		header("Location: components.php");
		exit;
	}
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Create Team</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- JS  -->
		<script type="application/x-javascript">
			function changeFunc() {
			var tname = document.getElementById("team_name").value;
			$.ajax({
				type: "POST",
				url: "create_team_result.php",
				data: {team_name:tname}
				}).done(function( result ) {
				$("#message").html(result);
				});
			   }
		</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
		
	</head>
	
	<body style="background: url(img/bg.jpg) #000000;">
	<?php
		echo $header;
	?>
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Enter Team Details</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Team Details</label></center>
							<p>
							<div class="form-group ">
								<input type="text" placeholder="Enter Team Name" name="team_name" id="team_name" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;">
							 </div>
							 <div class="form-group ">
								 <?php
									$username = "root";
									$password = "";
									$hostname = "localhost";
									$dbhandle = mysql_connect($hostname, $username, $password)
									or die("Unable to connect to MySQL");
									$selected = mysql_select_db("microfocus",$dbhandle);
									$result = mysql_query("SELECT * from team_details");
								?>
								Teams Already Present <select id="team">
									<?php
									while ($row = mysql_fetch_array($result)) {
										echo "<option value=".$row{'team_name'}.">".$row{'team_name'}."</option>";
									}
									mysql_close($dbhandle);
									?>
								</select>
							 </div>
							 <p>
							<button type="submit" id="create_team" class="btn btn-primary" onclick="changeFunc();" style="float:right;">Create</button>
							</p>
						<p class="forgot" id="message"></p>
												 
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>