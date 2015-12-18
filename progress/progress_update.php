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
$count = mysql_result($result,0);

if ($count==0 && $section=='what'){
	echo "If ";
	$sql= "insert into user_progress(user,component,what) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);
	
}
elseif($count==1 && $section=='what'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['what']=='F'){
		$sql= "UPDATE user_progress SET what='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET what='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}

}

?>