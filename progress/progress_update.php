<?php
error_reporting(0);
$progress_component = $_POST['value'];

$array=explode('_',$progress_component);

$section=$array[0];
$component=$array[1];
$user=$array[2];

$username = "root";
$password = "";
$hostname = "localhost";
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
$selected = mysql_select_db("microfocus",$dbhandle);
$result = mysql_query("select COUNT(*) from user_progress where user='".$user."' and component='".$component."'");

if ($result[0]==0 && $section=='what'){
	echo $result[0];
	$sql= "insert into user_progress(user,component,what) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);
	
}
else{
	
	echo "select COUNT(*) from user_progress where user='".$user."' and component='".$component."'<br>";
	//echo $result['user'].">>".$result['component'];
}

?>