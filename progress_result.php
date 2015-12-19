<?php
	error_reporting(0);
	$user=$_POST['user'];
	
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbhandle = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
	$selected = mysql_select_db("microfocus",$dbhandle);
	//$result = mysql_query("SELECT first_name,last_name from user_details where role='Admin' or role='Trainer'");

	echo '<div style="background-color:white; padding: 30px;">
			<center style="background: url(img/bg_form.jpg) #10a5d3; color: #555555"><label>Progress Status for '.$user.'  </label></center><br>
			
			RBPM <br>
			<div class="progress">
				<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:20%">20% Complete
				</div>
			</div>
			
			Designer <br>
			<div class="progress">
				<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:50%">50% Complete
				</div>
			</div>
			
			Drivers <br>
			<div class="progress">
				<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:70%">70% Complete
			</div>
			
		  </div>';
	
	/*while ($row = mysql_fetch_array($result)) {
		echo "<option value=".$row{'first_name'}.">".$row{'first_name'}." ".$row{'last_name'}. "</option>";
	}
	mysql_close($dbhandle);*/

?>

