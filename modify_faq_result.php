<?php
error_reporting(0);

$faq_id = $_POST['faq_id'];
$faq_title = $_POST['faq_title'];
$faq_desc = str_replace(array("\r\n", "\r", "\n"), "",$_POST['faq_desc']);

$faq_title_id=$string = strtolower(str_replace(' ', '', $faq_title));

if (preg_match('/<script>/',$faq_title) || preg_match('/<script>/',$faq_desc))
	{
		echo "<code><font style='color:#FF0000'>&lt;script&gt; tag is not allowed</font></code>";
	}
elseif($faq_title==NULL)
	{
		echo "<code><font style='color:#FF0000'>Title should not be empty</font></code>";
	}
elseif($faq_desc==NULL)
	{
		echo "<code><font style='color:#FF0000'>Description should not be empty</font></code>";
	}
else{

	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);

	$sql="UPDATE faq_details SET faq_title='".$faq_title."', faq_description='".$faq_desc."' WHERE faq_id=".$faq_id;
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	
	mysqli_close($con);
	
	echo "<code><font style='color:#08C108'>FAQ Updated successfully</font></code>";
		
}


?>
