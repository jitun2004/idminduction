
<?php
	error_reporting(0);
	$role=$_POST['role'];
	
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbhandle = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
	$selected = mysql_select_db("microfocus",$dbhandle);
	
	if ($role=='Others'){
		$result = mysql_query("SELECT first_name,last_name from user_details where role='Admin' or role='Trainer'");
	}
	else{
		$result = mysql_query("SELECT first_name,last_name from user_details where role='Trainee'");
	}
	
	echo "<label for='User'>Check Progress for ".$role.": </label>&nbsp;&nbsp;<select id='user' name='user'>";
	
	while ($row = mysql_fetch_array($result)) {
		echo "<option value=".$row{'first_name'}.">".$row{'first_name'}." ".$row{'last_name'}. "</option>";
	}
	mysql_close($dbhandle);
	echo "</select>";
?>

