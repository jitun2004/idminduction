<?php
	error_reporting(0);
	include("header.php");
	include("Quiz_QuestionBody.php");
	session_start();

	if ( !isset($_SESSION['Qnumber'])) {
		header("Location: Create_ComponentQuiz.php");
		exit;
	}
	
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Prepare Quiz</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- JS  -->
		<script type="application/x-javascript">
		
	</script>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.js"></script>
		
	</head>
	
	<body style="background: url(img/bg.jpg) #000000;">
	<?php
		echo $header;
		?>
		<div class="container-fluid">
			<div class="head-font" style="margin-bottom: 40px;font-size: 30px; font-family: caption; color: #E0E0E0;text-shadow: 3px 3px 6px #000000; margin-top: 20px;">
				<center>Quiz Section</center>
			</div>
			<div class="row">
				<div class="col-sm-4"></div>
					<div class="col-sm-4" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
						<form role="form" action="Quiz_Processing.php" method="POST">
						
							<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Question </label></center>
							<?php 
								if($_SESSION["Qnumber"]> 0) {
									echo $body;
									$_SESSION["Qnumber"] =$_SESSION["Qnumber"] -1;
								
								}
								?>
								<div class="form-group " id ="RemainingAnswer">
									<label for="RemainingAnswer">	
										<?php 	echo "Remaining questions:". $_SESSION["Qnumber"];?>
									</label>
								</div>
							
							
						</form>
						
					</div>
					
				</div>
			</div>
		</div>
	</body>
	
</html>