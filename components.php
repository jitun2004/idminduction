<?php
	error_reporting(0);
	include("header.php");
	session_start();
	if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
	
	$user=$_SESSION['userName'];

	$sql="SELECT a.component_name,a.comp_id_name, a.json_url, b.user_name FROM component_details a, user_details b WHERE a.team = b.team AND b.user_name='".$user."' AND a.status='T'";
	
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
		<title>Components</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
	</head>
	
<body style="background: url(img/bg.jpg) #000000;">
<?php
		echo $header;
?>
<div style="margin-top:30px;">
	<div id="wrapper" class="container-fluid" style="width:65%; margin:0 auto 0;">
		<div class="row">
				<div class="col-sm-2"></div>
					<div class="col-sm-8" style="padding: 30px; position: absolute;">
						<?php
						//$components = array("Role Based Provisioning Module (RBPM)", "IDM Drivers","eDirectory / IDV", "IDM Engine", "Event Source Manager (EAS)","IDM Reporting","Designer","iManager","Miscellaneous");
							while ($row = mysql_fetch_array($result)) {
								echo '<a href="product.php?component='.$row{'comp_id_name'}.'"><div class="rectangle" id="'.$row{'comp_id_name'}.'">
								<div class="row">
									<div class="col-sm-12" style="">'.$row{'component_name'}.'</div>
								</div>
								</div></a>';
							}
						?>
					</div>
				<div class="col-sm-2"></div>
	</div>
</div>
</body>