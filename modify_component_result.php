<?php
error_reporting(0);
$path="components";
$component_name = $_POST['component_name'];
$component_desc = str_replace(array("\r\n", "\r", "\n"), "",$_POST['component_desc']);
$component_why = str_replace(array("\r\n", "\r", "\n"), "",$_POST['component_why']);
$component_tasks = str_replace(array("\r\n", "\r", "\n"), "",$_POST['component_tasks']);
$component_video = $_POST['component_video'];
$component_arch = $_POST['component_arch'];
$component_file = $_POST['component_file'];
$team_access=$_POST['team_acc'];
$component_doc=str_replace(array("\r\n", "\r", "\n"), "",$_POST['component_doc']);
$component_user=ucfirst($_POST['component_creater']);

$component_name_id=$string = strtolower(str_replace(' ', '', $component_name));

if (preg_match('/<script>/',$component_name) || preg_match('/<script>/',$component_desc) || preg_match('/<script>/',$component_why) || preg_match('/<script>/',$component_tasks) || preg_match('/<script>/',$component_arch) || preg_match('/<script>/',$component_video))
	{
		echo "<code><font style='color:#FF0000'>&lt;script&gt; tag is not allowed</font></code>";
	}
elseif (preg_match('/"/',$component_name) || preg_match('/"/',$component_desc) || preg_match('/"/',$component_why) || preg_match('/"/>/',$component_tasks) || preg_match('/"/',$component_arch) || preg_match('/"/',$component_video))
	{
		echo "<code><font style='color:#FF0000'>double quotes (&#34;) are not allowed</font></code>";
	}
elseif (preg_match('/\\\\/',$component_name) || preg_match('/\\\\/',$component_desc) || preg_match('/\\\\/',$component_why) || preg_match('/\\\\/',$component_tasks) || preg_match('/\\\\/',$component_arch) || preg_match('/\\\\/',$component_video))
	{
		echo "<code><font style='color:#FF0000'>Backslash (\) is not allowed</font></code>";
	}
elseif($component_name==NULL)
	{
		echo "<code><font style='color:#FF0000'>Component Name can not be Empty</font></code>";
	}
elseif(preg_match('/[\'\/~`\!@#\$%\^&\*\_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/',$component_name))
	{
		echo "<code><font style='color:#FF0000'>Special Characters are not allowed in Component Name</font></code>";
	}
elseif($team_access==NULL)
	{
		echo "<code><font style='color:#FF0000'>Select team(s) for the component</font></code>";
	}
elseif($component_desc==NULL)
	{
		echo "<code><font style='color:#FF0000'>Component Description can not be empty</font></code>";
	}
elseif($component_doc==NULL)
	{
		echo "<code><font style='color:#FF0000'>Provide the document URLs</font></code>";
	}
/*elseif(!preg_match('^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i', $component_video))
	{
		echo "<code><font style='color:#FF0000'>Enter valid Video URL</font></code>";
	}*/
/*elseif($component_why==NULL || $component_video==NULL ||$component_tasks==NULL || $component_arch==NULL)
	{
		$GLOBALS['component_why']="NA";
		$GLOBALS['component_video']="NA";
		$GLOBALS['component_tasks']="NA";
		$GLOBALS['component_arch']="NA";
	}*/
else{
$json='
	{
	"componentName": "'.$component_name.'",
	"componentDescription": "'.$component_desc.'",	
	"why": "'.$component_why.'",
	"architecture": "'.$component_arch.'", 
	"videos": "'.$component_video.'",
	"reference": "'.$component_doc.'",
	"tasks" : "'.$component_tasks.'",
	"fileLocation" : "'.$component_file.'",
	"component_creater" : "'.$component_user.'"
}';
			
		/*echo $json;
		echo "<br>";
		foreach($team_access as $x) {
			echo "Key=" . $x;
			echo "<br>";
		}*/
	
		$completePath=$path."/".$component_name;
		
		mkdir($completePath);
		$jsonfile = fopen($path."/".$component_name."/".$component_name.".json", "w") or die("Unable to open file!");
		fwrite($jsonfile, $json);
		fclose($jsonfile);
		
		$filePath=$completePath."/".$component_name.".json";
		
		$con = mysql_connect("localhost","root","");
		$db= mysql_select_db("microfocus", $con);
		
		foreach ($team_access as $t){
			//$sql="INSERT INTO component_details(component_name, json_url, team, created_by,status,comp_id_name) VALUES ('".$component_name."','".$filePath."','".$t."','".$component_user."','T','".$component_name_id."')";
			//$query=mysql_query($sql);
			//$result=mysql_fetch_array($query);
		}
		mysqli_close($con);
		
		echo "<code><font style='color:#08C108'>Component Created successfully</font></code>";

		
}


?>
