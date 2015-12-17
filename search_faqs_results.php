<?php
	error_reporting(0);
	$query=$_GET['query'];
	$username = "root";
	$password = "";
	$hostname = "localhost";
	$dbhandle = mysql_connect($hostname, $username, $password)
	or die("Unable to connect to MySQL");
	$selected = mysql_select_db("microfocus",$dbhandle);
	if($query=="*"){
		$result = mysql_query("SELECT faq_title FROM faq_details LIMIT 10");
	}
	else{
		$result = mysql_query("SELECT faq_title FROM faq_details where faq_title LIKE '%".$query."%'");
	}

	while ($row = mysql_fetch_array($result)) {
		$data[] = $row{'faq_title'};
	}
	echo json_encode($data);
	mysql_close($dbhandle);
?>