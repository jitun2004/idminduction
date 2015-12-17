<?php
error_reporting(0);
$v=$_GET['v'];
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Login Page</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
	</head>
	
	<body style="background: url(img/bg.jpg) #000000;">
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Welcome to IMe</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						<form role="form" action="login.php" method="POST">
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Login Details</label></center>
							<p>
							<div class="form-group ">
								<input type="text" name="uname" required class="form-control" id="username" placeholder="User Name" style="box-shadow: 0px 0px 0px 4px #f2f5f7;">
							 </div>
							<div class="form-group">
							  <input type="password" name="passwd" required placeholder="Password" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" class="form-control" id="password">
							</div>
							<label for="remember">
							  <!-- <input type="checkbox" id="remember" value="remember" />
							  <span>Remember me on this computer</span> -->
							  <?php if($v!=null)
								echo "<font style='color:#FE0000;font-family:caption;'>Invalid User </font>";
							  ?>
							</label>
							<p>
							<button type="submit" class="btn btn-primary" style="float:right;">Login</button>
							</p>
						</form>
						<p class="forgot">Reset your password? <a href="changepass.php">Click here</a></p>
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>