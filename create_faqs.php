<?php
	error_reporting(0);
	include("header.php");
	session_start();
	if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
	
	$user=$_SESSION['userName'];

	$sql="SELECT a.component_name,a.comp_id_name, a.json_url, b.user_name FROM component_details a, user_details b WHERE a.team = b.team AND b.user_name='".$user."'";
	
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbhandle = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
	$selected = mysql_select_db("microfocus",$dbhandle);
	$result = mysql_query($sql);

?>

<!DOCTYPE html>
<html lang="en">

	<head>
		<title>FAQs</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
		
		<!-- JS  -->
		<script type="application/x-javascript">
			function changeFunc() {
			var title = document.getElementById("title").value;
			var description = document.getElementById("description").value;
			var owner=document.getElementById("faq_owner").value;
			
			var teams = [];
			$("input:checked").each(function() {
			  teams.push($(this).val());
			});
			
			$.ajax({
				type: "POST",
				url: "create_faqs_result.php",
				data: {faq_title:title,faq_desc:description,faq_owner:owner}
				}).done(function( result ) {
				$("#message").html(result);
				});
			   }
		</script>
		
		<script type="text/javascript">
			  function showval()
			  {

				 var title = document.getElementById("title").value;
				 var description = document.getElementById("description").value;
				 
				 document.getElementById('ptitle').innerHTML = title;
				 document.getElementById('pdesc').innerHTML = description;
			  }
		</script>
	</head>
	
<body style="background: url(img/bg.jpg) #000000; color:white;">
<?php
		echo $header;
?>
<div style="margin-top:30px;">
	<div id="wrapper" class="container-fluid" style="width:65%; margin:0 auto 0;">
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-8" style="padding: 30px; position: absolute;">
					<div class="form-group">
						<label for="usr">Title:</label>
						<input type="text" class="form-control" id="title">
					</div>
					<div class="form-group">
						<label for="comment">Description:</label>
						<textarea class="form-control" rows="10" id="description"></textarea>
					</div>
					<input type="hidden" id="faq_owner" value="<?php echo $user ?>">
					
					<!-- Trigger the modal with a button -->
					<button type="button" class="btn btn-info" data-toggle="modal" onclick="showval();" data-target="#myModal">Preview</button>

					<!-- Modal -->
					<div id="myModal" class="modal fade" role="dialog" style="color:black">
					  <div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
						  <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title" id="ptitle"></h4>
						  </div>
						  <div class="modal-body">
							<p id="pdesc"></p>
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						  </div>
						</div>

					  </div>
					</div>
					
					<button type="button" onclick="changeFunc();" class="btn btn-primary pull-right">Submit</button>
					<p id="message"></p>
				</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
</body>