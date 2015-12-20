<?php
error_reporting(0);
include("header.php");
$n=$_GET['n'];
session_start();
$_SESSION['Component'] =$_POST["component"] ; ;
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Quiz Page</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<script type="application/x-javascript">
			function validate() {
			var uname = document.getElementById("user").value;

			$.ajax({
				type: "POST",
				url: "QnumberValidation.php",
				data: {qnumber:qnumber}
				}).done(function( result ) {
				$("#message").html(result);
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
				<center>Welcome to IDM world</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						<form role="form" action="Quiz_StartWrite.php" method="POST">
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Create Quiz</label></center>
							<p>
							<div class="form-group ">
								<input type="text" name="qnumber" required class="form-control" id="qnumber" placeholder="Total Number of questions"  style="box-shadow: 0px 0px 0px 4px #f2f5f7;" onchange="validate();">
							 </div>	
							<p id="message"></p>							 
							<p>
							<button type="submit" class="btn btn-primary" style="float:right;" >Submit</button>
							</p>
						</form>						
					</div> 
					<div class="col-sm-4"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>

