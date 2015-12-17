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
	elseif($result['role']!='admin' && $result['role']!='trainer'){
		header("Location: components.php");
		exit;
	}
	mysql_close($con);
?>
<?php
	$component_id_name = $_POST['component'];
	
	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);
	$sql="SELECT DISTINCT comp_id_name,json_url from component_details where comp_id_name='".$component_id_name."'";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	$jsonPath=$result['json_url'];
	mysql_close($con);

	$json=file_get_contents($jsonPath);
	$json_get=json_decode($json,true);
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Update Component</title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<!-- JS  -->
		<script type="application/x-javascript">
			function changeFunc() {
			var cname = document.getElementById("cname").value;
			var description = document.getElementById("description").value;
			var documents= document.getElementById("documents").value;
			var why = document.getElementById("why").value;
			var tasks = document.getElementById("tasks").value;
			var video = document.getElementById("video_url").value;
			var architecture = document.getElementById("architecture").value;
			var other_file = document.getElementById("other_file").value;
			var user = document.getElementById("user").value;
			
			var teams = [];
			$("input:checked").each(function() {
			  teams.push($(this).val());
			});
			
			$.ajax({
				type: "POST",
				url: "modify_component_result.php",
				data: {component_name:cname,component_desc:description,component_why:why,component_tasks:tasks,component_video:video,component_arch:architecture,component_file:other_file,team_acc:teams,component_doc:documents,component_creater:user}
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
				<center>Update Component Details</center>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
					<div class="col-sm-6" style="background-color:white; padding: 30px; box-shadow:0px 0px 0px 4px #B0B0B0 ;">
					<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Update Component Details</label></center>
						<div class="form-group ">
							<input type="text" placeholder="Update Component Name" name="cname" id="cname" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $json_get[componentName];?>" readonly>
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
							<label team="team">Team(s) can access the Component:</label>
							<?php
								while ($row = mysql_fetch_array($result)) {
									echo "<label class='checkbox-inline'><input type='checkbox' id='teams' name='teams[]' value=".$row{'team_name'}.">".$row{'team_name'}."</label>";
								}
								mysql_close($dbhandle);
								?>
						 </div>
						 <hr>
						 <div class="form-group ">
							<label for="description">Component Description:</label>
							<textarea class="form-control" placeholder="You can use HTML tags to beautify your text or paragraphs like <b>, <i>, <p>, <u>, .. etc" rows="5" name="description" id="description"><?php echo $json_get[componentDescription];?></textarea>
						 </div>
						 <div class="form-group ">
							<label for="why">Why we need this?: </label>
							<textarea class="form-control" placeholder="You can use HTML tags to beautify your text or paragraphs like <b>, <i>, <p>, <u>, .. etc" rows="5" name="why" id="why"><?php echo $json_get[why];?></textarea>
						 </div>
						  <div class="form-group ">
							<label for="tasks">To DO tasks for the Trainee:</label>
							<textarea class="form-control" placeholder="You can use HTML tags to beautify your text or paragraphs like <b>, <i>, <p>, <u>, .. etc" rows="5" name="tasks" id="tasks"><?php echo $json_get[tasks];?></textarea>
						 </div>
						 <div class="control-group" id="doc">
							<label for="documents">Update Document URL (add the URL inside the href tag)</label>
							<textarea class="form-control" placeholder="Update Document URL" rows="3" name="documents" id="documents"><?php echo $json_get[reference];?></textarea>
						</div>
						<br>
						<label for="videos">Update Video URLs</label>
						<input type="text" placeholder="Update Video URL" name="video_url" id="video_url" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $json_get[videos];?>">
						<br>
						<div class="form-group ">
							<label for="architecture">Update Architecture Diagram URL</label>
							<input type="text" placeholder="Update the Image URL (.jpeg or .png)" name="architecture" id="architecture" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $json_get[architecture];?>">
						 </div>
						<div class="form-group ">
							<label for="other_file">Update file download location</label>
							<input type="text" placeholder="Update file download location URL" name="other_file" id="other_file" required class="form-control" style="box-shadow: 0px 0px 0px 4px #f2f5f7;" value="<?php echo $json_get[fileLocation];?>">
						 </div>
						 <input type="hidden" name="user" id="user" value="<?php echo $_SESSION['userName']?>">
						 <br>
						<button type="submit" id="create_team" class="btn btn-primary" onclick="changeFunc();" style="float:right;">Modify Component</button>
						</p>
					<p id="message"></p>
											 
				</div>
				<div class="col-sm-3"></div>
				</div>
			</div>
		</div>
	</body>
	
</html>