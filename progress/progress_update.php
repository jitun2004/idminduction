<?php
error_reporting(0);
$progress_component = $_POST['value'];

$array=explode('_',$progress_component);

echo "val1=".$array[0]." val2=".$array[1];


$username = "root";
$password = "";
$hostname = "localhost";
$dbhandle = mysql_connect($hostname, $username, $password) or die("Unable to connect to MySQL");
$selected = mysql_select_db("microfocus",$dbhandle);
$result = mysql_query("select COUNT(*) from user_progress where user='".$user."' and component='".$array[1]."'");

if ($result==NULL)
echo "Hi";
else
echo "LoLo";
?>