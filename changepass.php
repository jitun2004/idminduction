<?php
error_reporting(0);
$v=$_GET['v'];
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Password Reset</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<!-- JS  -->
		<script type="application/x-javascript">
			function changeFunc() {
			var uname = document.getElementById("uname").value;
			var passwd = document.getElementById("passwd").value;
			var npasswd = document.getElementById("npasswd").value;
			var nrpasswd = document.getElementById("nrpasswd").value;
			$.ajax({
				type: "POST",
				url: "changepass_result.php",
				data: {user:uname, passo:passwd,passn:npasswd,passnr:nrpasswd}
				}).done(function( result ) {
				$("#message").html(result);
				});
			   }
		</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
		
	</head>
	
	<body style="background: url(img/bg.jpg) #000000;">
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Password Reset</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Password Reset Details</label></center>
							<p>
							<div class="form-group ">
								<input type="text" placeholder="Username" name="uname" id="uname" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;">
							 </div>
							 <div class="form-group ">
								<input type="password" placeholder="Current Password" name="passwd" id="passwd" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;">
							 </div>
							 <hr>
							 <div class="form-group ">
								<input type="password" placeholder="New Password" name="npasswd" id="npasswd" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;">
							 </div>
							 <div class="form-group ">
								<input type="password" placeholder="Re-enter New Password" name="nrpasswd" id="nrpasswd" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;">
							 </div>
							 
							<p>
							<button type="submit" id="changepass" class="btn btn-primary" onclick="changeFunc();" style="float:right;">Reset</button>
							</p>
							
						<p class="forgot" id="message"></p>
						<span><a href="index.php">Back to Login Page</a></span>
							 
					</div>
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>