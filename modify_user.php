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
		<title>Create User</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- JS  -->
		<script type="application/x-javascript">
			function changeFunc() {
			var fname = document.getElementById("fname").value;
			var lname = document.getElementById("lname").value;
			var email = document.getElementById("email").value;
			var role = document.getElementById("role").value;
			var team = document.getElementById("team").value;
			var uid = document.getElementById("user_id").value;
			$.ajax({
				type: "POST",
				url: "modify_user_result.php",
				data: {first_name:fname, last_name:lname,email_id:email,access_role:role,department:team,user_id:uid}
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
		$userName=$_POST['user'];
		$sql="select * from user_details where (first_name='".$userName."')";
		$query=mysql_query($sql);
		$result=mysql_fetch_array($query);
		
	?>
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Update User Details</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>User Details</label></center>
							<p>
							<div class="form-group ">
								<input type="text" placeholder="Enter First Name" name="fname" id="fname" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $result['first_name'] ?>" >
							 </div>
							 <div class="form-group ">
								<input type="text" placeholder="Enter Last Name" name="lname" id="lname" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $result['last_name'] ?>">
							 </div>
							  <div class="form-group ">
								<input type="text" placeholder="Enter e-mail (name@microfocus.com)" name="email" id="email" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $result['email_id'] ?>">
							 </div>
							 <input type="hidden" id="user_id" value="<?php echo $result['id'] ?>"> 
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
								Select Team: <select id="team">
									<option value="none"> --- </option>
									<?php
									while ($row = mysql_fetch_array($result)) {
										echo "<option value=".$row{'team_name'}.">".$row{'team_name'}."</option>";
									}
									mysql_close($dbhandle);
									?>
								</select>
							 </div>
							 <div class="form-group ">
								Select Role: <select id="role">
									<option value="admin"> Admin </option>
									<option value="trainer"> Trainer </option>
									<option value="trainee"> Trainee </option>
									
								</select>
							 </div>
							<p>
							<button type="submit" id="create_user" class="btn btn-primary" onclick="changeFunc();" style="float:right;">Update</button>
							</p>
							
						<p class="forgot" id="message"></p>
												 
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>