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
			';
		  
		//$query="SELECT what,why,architecture,videos,doc,files,tasks,component from user_progress WHERE user ='".$user."'";
		$query="SELECT u.what,u.why,u.architecture,u.videos,u.doc,u.files,u.tasks,u.component,c.component_name FROM user_progress u, component_details c WHERE u.user ='".$user."' and u.component=c.comp_id_name";
		
		$result = mysql_query($query);
		
		while ($row = mysql_fetch_array($result)) { 
			$val = $row{'what'}.$row{'why'}.$row{'architecture'}.$row{'videos'}.$row{'doc'}.$row{'files'}.$row{'tasks'};
			$percentage=round((substr_count($val,"T")/strlen($val))*100);

			if($percentage>=0 && $percentage <=20){
				echo ucfirst($row{'component_name'}).'<br>
					<div class="progress">
						<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">'.$percentage.'% Complete
						</div>
					</div>';
			}
			elseif($percentage>20 && $percentage <50){
				echo ucfirst($row{'component_name'}).'<br>
					<div class="progress">
						<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">'.$percentage.'% Complete
						</div>
					</div>';
			}
			elseif($percentage>=50 && $percentage <=70){
				echo ucfirst($row{'component_name'}).'<br>
					<div class="progress">
						<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">'.$percentage.'% Complete
						</div>
					</div>';
			}
			else{
				echo ucfirst($row{'component_name'}).'<br>
					<div class="progress">
						<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:'.$percentage.'%">'.$percentage.'% Complete
						</div>
					</div>';
			}
			//echo $row{'component'}." progress >>>".substr_count($val,"F");
		}

?>

