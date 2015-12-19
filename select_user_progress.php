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
		
		<script type="application/x-javascript">
			function roleFunc(val) {
			var urole = val;

			$.ajax({
				type: "POST",
				url: "select_role_result.php",
				data: {role:urole}
				}).done(function( result ) {
				$("#users").html(result);
				});
			   }
		</script>
		
		<script type="application/x-javascript">
			function progressLogic() {
			var uname = document.getElementById("user").value;

			$.ajax({
				type: "POST",
				url: "progress_result.php",
				data: {user:uname}
				}).done(function( result ) {
				$("#progress_result").html(result);
				});
			   }
		</script>
		
	</head>
	
	<body style="background: url(img/bg.jpg) #000000;">
	<?php
		echo $header;
	?>
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Select User</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Select user </label></center>
							<br>
							<div class="form-group ">
								<label team="team">Roles(s):</label>
								<label class='radio-inline'>
									<input type='radio' id='role' name='role' value='Trainee' onclick="roleFunc(this.value)">Trainee
								</label>
								<label class='radio-inline'>
									<input type='radio' id='role' name='role' value='Others' onclick="roleFunc(this.value);">Others
								</label>
							</div>
							 <div class="form-group " id="users"></div>
							 <p>
							<button type="submit" class="btn btn-primary" style="float:right;" onclick="progressLogic()">Submit</button>
													
					</div>
						
					<div class="col-sm-4"></div>
				</div>
				
				<div class="row" style="margin-top:30px">
					<div class="col-sm-2" ></div>
						<div class="col-sm-8" id="progress_result"></div>
					<div class="col-sm-4"></div>
				</div>
			
		</div>
	</body>
	
</html>

