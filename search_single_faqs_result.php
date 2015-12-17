<?php
error_reporting(0);

$faq_title = $_POST['faq_title'];

$con = mysql_connect("localhost","root","");
$db= mysql_select_db("microfocus", $con);

$sql="select * from faq_details where faq_title='".$faq_title."'";
$query=mysql_query($sql);
$result=mysql_fetch_array($query);

echo "<div id='search_result' style='width:100%;  margin-top: 50px;; float:left;'>";
echo "<div id='title' style='border-radius:5px; background:#707070; padding-left:20px; padding-top:6px; padding-bottom:6px; color:#E8E8E8; text-transform:capitalize; font-size: 18px; text-shadow:2px 2px 2px #000000; font-weight:600;'>".$result['faq_title']."
	  </div><br>";
echo "<div id='details' style='border-radius: 20px; background: #383838;padding: 20px;'>
			<span style='color:#e3e3e3; font-size: 16px;'><div id=owner style='color:#e3e3e3; font-size:13px; float:right; text-transform:capitalize; '>Created by: <i> ".$result['faq_owner']."</i></div>".$result['faq_description']."</span>
	</div>";
echo "<br></div>";

mysqli_close($con);
		
?>
