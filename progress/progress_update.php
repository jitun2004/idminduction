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
echo $count;
/************** WHAT *****************/
if ($count==0 && $section=='what'){
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
/************** WHY *****************/
elseif ($count==0 && $section=='why'){
	$sql= "insert into user_progress(user,component,why) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);	
}
elseif($count==1 && $section=='why'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['why']=='F'){
		$sql= "UPDATE user_progress SET why='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET why='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
}
/***************** Architecture ********************/
elseif ($count==0 && $section=='arch'){
	$sql= "insert into user_progress(user,component,architecture) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);	
}
elseif($count==1 && $section=='arch'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['architecture']=='F'){
		$sql= "UPDATE user_progress SET architecture='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET architecture='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
}
/***************** video ********************/
elseif ($count==0 && $section=='video'){
	$sql= "insert into user_progress(user,component,videos) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);	
}
elseif($count==1 && $section=='video'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['videos']=='F'){
		$sql= "UPDATE user_progress SET videos='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET videos='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
}
/***************** Documentation ********************/
elseif ($count==0 && $section=='doc'){
	$sql= "insert into user_progress(user,component,doc) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);	
}
elseif($count==1 && $section=='doc'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['doc']=='F'){
		$sql= "UPDATE user_progress SET doc='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET doc='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
}
/***************** Files ********************/
elseif ($count==0 && $section=='files'){
	$sql= "insert into user_progress(user,component,files) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);	
}
elseif($count==1 && $section=='files'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['files']=='F'){
		$sql= "UPDATE user_progress SET files='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET files='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
}
/***************** Tasks ********************/
elseif ($count==0 && $section=='tasks'){
	$sql= "insert into user_progress(user,component,tasks) values ('".$user."','".$component."','T')";
	$query=mysql_query($sql);
	$result1=mysql_fetch_array($query);	
}
elseif($count==1 && $section=='tasks'){
	$sql1="select * from user_progress where user='".$user."' and component='".$component."'";
	$query1=mysql_query($sql1);
	$result1=mysql_fetch_array($query1);
	if($result1['tasks']=='F'){
		$sql= "UPDATE user_progress SET tasks='T' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
	else{
		$sql= "UPDATE user_progress SET tasks='F' where user='".$user."' and component='".$component."'";
		$query=mysql_query($sql);
		$result2=mysql_fetch_array($query);
	}
}

?>