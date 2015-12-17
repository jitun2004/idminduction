<?php
error_reporting(0);

$faq_owner = $_POST['faq_owner'];
$faq_desc = str_replace(array("\r\n", "\r", "\n"), "",$_POST['faq_desc']);
$faq_title = $_POST['faq_title'];

$faq_title_id=$string = strtolower(str_replace(' ', '', $faq_title));

if (preg_match('/<script>/',$faq_title) || preg_match('/<script>/',$faq_desc))
	{
		echo "<code><font style='color:#FF0000'>&lt;script&gt; tag is not allowed</font></code>";
	}
elseif($faq_title==NULL)
	{
		echo "<code><font style='color:#FF0000'>Title should not be empty</font></code>";
	}
elseif (preg_match('/\'\/',$faq_title) || preg_match('/\'\/',$faq_desc))
	{
		echo "<code><font style='color:#FF0000'>Single quotes (&#39;) are not allowed</font></code>";
	}
elseif($faq_desc==NULL)
	{
		echo "<code><font style='color:#FF0000'>Description should not be empty</font></code>";
	}
else{

	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);

	$sql="INSERT INTO faq_details(faq_title, faq_description,faq_owner) VALUES ('".$faq_title."','".$faq_desc."','".$faq_owner."')";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	
	mysqli_close($con);
	
	echo "<code><font style='color:#08C108'>FAQ created successfully!!!</font></code>";
		
}


?>
