<?php
	error_reporting(0);
	include("header.php");
	session_start();
	if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
	}
?>
<?php
	$component=$_GET['component'];
	
	$con = mysql_connect("localhost","root","");
	$db= mysql_select_db("microfocus", $con);
	$sql="SELECT DISTINCT comp_id_name,json_url from component_details where comp_id_name='".$component."'";
	$query=mysql_query($sql);
	$result=mysql_fetch_array($query);
	$jsonPath=$result['json_url'];
	mysql_close($con);
	$compid=$result[comp_id_name];

	$json=file_get_contents($jsonPath);
	$json_get=json_decode($json,true);
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title><?php echo $json_get[componentName]; ?></title>
		<link rel="icon" href="img/l2.png" type="image/gif" sizes="16x16">
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		
		<link rel="stylesheet" type="text/css" href="css/style.css" /> 
		<script type="text/javascript">
			  function update(val)
			  {
				$.ajax({
				type: "POST",
				url: "progress_update.php",
				data: {value:val}
				})
			  }
		</script>
	</head>
	
<body style="background: url(img/bg.jpg) #000000;">
<?php
	echo $header;
?>
<div class="container">
  <h2 style="color:white;"><?php echo $json_get[componentName]; ?></h2>
  <div class="panel-group" id="accordion">
    <!-- ***************** What ******************** -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">What is <?php echo $json_get[componentName]; ?>? </a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="what_<?php echo $compid; ?>" title="Completed - What is <?php echo $json_get[componentName]; ?>" onclick="update(this.value)"></label>
      </div>
      <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body"><?php echo $json_get[componentDescription]; ?></div>
      </div>
    </div>
	<!-- ***************** Why ******************** -->
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Why we need <?php echo $json_get[componentName]; ?>?</a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="why_<?php echo $compid; ?>" title="Completed - Why we need <?php echo $json_get[componentName]; ?>"onclick="update(this.value)"></label>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body"><?php echo $json_get[why]; ?></div>
      </div>
    </div>
	<!-- ***************** Architecture ******************** -->
	<?php 
	if($json_get[architecture]==NULL){
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Architecture of '.$json_get[componentName].'?</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">Sorry, Architecture is not available.</div>
      </div>
    </div>';}
	else{
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Architecture of '.$json_get[componentName].'?</a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="arch_'.$compid.'" title="Completed - Architecture of '.$json_get[componentName] .'"onclick="update(this.value)"></label>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body"> <img onclick="this.width=600;this.parentElement.parentElement.style.width=600" src="'.$json_get[architecture].'" class="img-thumbnail" alt="Cinque Terre" width="304" height="236"></div>
      </div>
    </div>';
	}
	?>
	<!-- ****************** Videos ******************* -->
	<?php if (preg_match('/youtube/',$json_get[videos])) {
    echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Videos for '.$json_get[componentName].'</a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="video_'.$compid.'" title="Completed - Videos for '.$json_get[componentName] .'"onclick="update(this.value)"></label>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body"><iframe width="420" height="315" src="'.$json_get[videos].'" frameborder="0" allowfullscreen></iframe></div>
      </div>
    </div>';}
	elseif($json_get[videos]==NULL){
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Videos for '.$json_get[componentName].'</a>
        </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
			Sorry, Video is not Available.
		</div>
      </div>
    </div>';}
	else{
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Videos for'.$json_get[componentName].'</a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="video_'.$compid.'" title="Completed - Videos for '.$json_get[componentName] .'"onclick="update(this.value)"></label>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
        <div class="panel-body">
			 <video width="420" height="315">
			  <source src="'.$json_get[videos].'" type="video/mp4">
			  <source src="'.$json_get[videos].'" type="video/ogg">
			Your browser does not support the video tag.
			</video> 
		</div>
      </div>
    </div>';} 
	
	
	?>
	<!-- ****************** Documentation ******************* -->
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Documentation for <?php echo $json_get[componentName]; ?></a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="doc_<?php echo $compid; ?>" title="Completed - Documentation for <?php echo $json_get[componentName]; ?>"onclick="update(this.value)"></label>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
        <div class="panel-body"><?php echo $json_get[reference]; ?></div>
      </div>
    </div>
	<!-- ***************** Files ******************** -->
	<?php 
	if($json_get[fileLocation]==NULL){
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Related files for '.$json_get[componentName].'</a>
        </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">Sorry, No files are available.</div>
      </div>
    </div>';}
	else{
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">Related files for '.$json_get[componentName].'</a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="files_'.$compid.'" title="Completed - Related files for '.$json_get[componentName] .'"onclick="update(this.value)"></label>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
        <div class="panel-body">'.$json_get[fileLocation].'</div>
      </div>
    </div>';
	}
	?>
	<!-- ****************** Tasks ******************* -->
	<?php 
	if($json_get[tasks]==NULL){
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">To DO Tasks for '.$json_get[componentName].'?</a>
        </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">Sorry, No tasks are available.</div>
      </div>
    </div>';}
	else{
	echo '<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">To DO Tasks for '.$json_get[componentName].'?</a>
        </h4>
		<label class="pull-right"><input type="checkbox" value="tasks_'.$compid.'" title="Completed - To DO Tasks for '.$json_get[componentName] .'"onclick="update(this.value)"></label>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
        <div class="panel-body">'.$json_get[tasks].'</div>
      </div>
    </div>';
	}
	?>
	<!-- ************************************* -->
	<div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">Quiz - <?php echo $json_get[componentName]; ?></a>
        </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
        <div class="panel-body"><?php echo '<b><a href="quiz.php" target="_blank">Click here to start the QUIZ</a></b> ' ?></div>
      </div>
    </div>
	
  </div> 
</div>
</body>
</html>