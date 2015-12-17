<?php
error_reporting(0);
$team_name = $_POST['team_name'];

$con = mysql_connect("localhost","root","");
$db= mysql_select_db("microfocus", $con);
	
$sql_team="select count(*) from team_details where (team_name='".$team_name."')";
$query_team=mysql_query($sql_team);
$result_team=mysql_fetch_array($query_team);

if($team_name==NULL)
{
    echo "<code><font style='color:#FF0000'>Field should not be empty</font></code>";
}
elseif($result_team[0]>0){
	echo "<code><font style='color:#FF0000'>Team already present</font></code>";
}
else{

	$sql="insert into team_details(team_name) values ('".$team_name."')";
    
	
	$query=mysql_query($sql);
    $result=mysql_fetch_array($query);

    echo "<code><font style='color:#08C108'>Team inserted Successfully</font></code>";
    
}
?>
