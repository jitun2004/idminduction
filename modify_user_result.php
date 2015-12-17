<?php
error_reporting(0);

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email_id'];
$role = $_POST['access_role'];
$department = $_POST['department'];
$user_id = $_POST['user_id'];

$faq_title_id=$string = strtolower(str_replace(' ', '', $faq_title));

if (preg_match('/<script>/',$first_name) || preg_match('/<script>/',$last_name) || preg_match('/<script>/',$email))
	{
		echo "<code><font style='color:#FF0000'>&lt;script&gt; tag is not allowed</font></code>";
	}
elseif($first_name==NULL)
	{
		echo "<code><font style='color:#FF0000'>First name should not be empty</font></code>";
	}
elseif($last_name==NULL)
	{
		echo "<code><font style='color:#FF0000'>Last name should not be empty</font></code>";
	}
elseif($email==NULL)
	{
		echo "<code><font style='color:#FF0000'>email-id should not be empty</font></code>";
	}
elseif($department=="none")
	{
		echo "<code><font style='color:#FF0000'>Select a Team</font></code>";
	}
else{

	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);

	$sql="UPDATE user_details SET first_name='".$first_name."', last_name='".$last_name."', email_id='".$email."', role='".$role."', team='".$department."' WHERE id=".$user_id;
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	
	mysqli_close($con);
	
	echo "<code><font style='color:#08C108'>User Updated successfully</font></code>";
		
}


?>
