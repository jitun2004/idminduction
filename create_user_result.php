<?php
error_reporting(0);
$first_name = $_POST['first_name'];
$last_name=$_POST['last_name'];
$email_id=strtolower($_POST['email_id']);
$password=$_POST['password'];
$access_role=$_POST['access_role'];
$department=$_POST['department'];
$user_name=strtolower($_POST['first_name']);

$con = mysql_connect("localhost","root","");
$db= mysql_select_db("microfocus", $con);
	
$sql_user="select count(*) from user_details where (email_id='".$email_id."')";
$query_user=mysql_query($sql_user);
$result_user=mysql_fetch_array($query_user);

if($first_name==NULL || $last_name==NULL || $email_id==NULL || $password==NULL)
{
    echo "<code><font style='color:#FF0000'>Fields should not be empty</font></code>";
}
elseif($department=='none'){
	echo "<code><font style='color:#FF0000'>Select a team</font></code>";
}
elseif($result_user[0]>0){
	echo "<code><font style='color:#FF0000'>User already present</font></code>";
}
else{

	$sql="insert into user_details(user_name,first_name,last_name,email_id,user_password,role,team,status) values ('".$user_name."','".$first_name."','".$last_name."','".$email_id."','".$password."','".$access_role."','".$department."','T')";
    
	
	$query=mysql_query($sql);
    $result=mysql_fetch_array($query);

    echo "<code><font style='color:#08C108'>User inserted Successfully</font></code>";
    
}
?>
