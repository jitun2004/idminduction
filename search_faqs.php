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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script src="http://cdn.jsdelivr.net/typeahead.js/0.9.3/typeahead.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
		
		<!-- JS  -->
		<script type="application/x-javascript">
			function changeFunc() {
			var title = document.getElementById("search").value;
			
			var teams = [];
			$("input:checked").each(function() {
			  teams.push($(this).val());
			});
			
			$.ajax({
				type: "POST",
				url: "search_single_faqs_result.php",
				data: {faq_title:title}
				}).done(function( result ) {
				$("#message").html(result);
				});
			   }
		</script>
		<style type="text/css">
		.bs-example{
			font-family: sans-serif;
			position: relative;
			margin: 100px;
		}
		.typeahead, .tt-query, .tt-hint {
			border: 2px solid #CCCCCC;
			border-radius: 8px;
			font-size: 16px;
			height: 35px;
			margin-top: -6px;
			line-height: 30px;
			outline: medium none;
			padding: 8px 12px;
			width: 400px;
		}
		.typeahead {
			background-color: #FFFFFF;
		}
		.typeahead:focus {
			border: 2px solid #0097CF;
		}
		.tt-query {
			box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
		}
		.tt-hint {
			color: #999999;
		} 
		.tt-dropdown-menu {
			background-color: #FFFFFF;
			border: 1px solid rgba(0, 0, 0, 0.2);
			border-radius: 6px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
			margin-top: 12px;
			padding: 6px 0;
			width: 400px;
		}
		p {
			text-indent: 3px;
		}
		.tt-suggestion {
			font-size: 16px;
			line-height: 16px;
			padding: 2px 16px;
		}
		.tt-suggestion.tt-is-under-cursor {
			background-color: #0097CF;
			color: #FFFFFF;
		}
		.tt-suggestion p {
			margin: 0;
		}
		</style>
		<script>
		$(document).ready(function(){
			$("#search").typeahead({
				name : 'sear',
				remote: {
					url : 'search_faqs_results.php?query=%QUERY'
				}
				
			});
		});
		</script>
	</head>
	
<body style="background: url(img/bg.jpg) #000000;">
<?php
		echo $header;
?>
<div style="margin-top:30px;">
	<div id="wrapper" class="container-fluid" style="width:65%; margin:0 auto 0;">
		<div class="row">
			<div class="col-sm-2"></div>
				<div class="col-sm-8">
					<input type="text" name="search" id="search" placeholder="Search for FAQs">
					 <button type="button" class="btn btn-default" onclick="changeFunc();">
					  <span class="glyphicon glyphicon-search"></span> Search
					</button>
				</div>
				<div id="message"></div>
			<div class="col-sm-2"></div>
		</div>
	</div>
</body>