<?php
		error_reporting(0);	
		session_start();
		$name = ucfirst($_SESSION['userName']);
		if ( !isset($_SESSION['userName'])) {
		header("Location: index.php");
		exit;
		}
		$con = mysql_connect("localhost","root","");
		$db= mysql_select_db("microfocus", $con);

		$sql="select role from user_details where (user_name='".$_SESSION['userName']."')";
		$query=mysql_query($sql);
		$result=mysql_fetch_array($query);
		
		if ($result['role']=='admin')
			{
				$header='
						<nav class="navbar navbar-inverse">
						  <div class="container-fluid">
							<div class="navbar-header">
							  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>                        
							  </button>
							  <a class="navbar-brand" href="components.php">MicroFocus</a>
							</div>
							<div class="collapse navbar-collapse" id="myNavbar">
							  <ul class="nav navbar-nav">
								<li class="active"><a href="components.php">Home</a></li>
								<li class="dropdown">
								  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Overview<span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li><a target="_blank" href="http://164.99.178.17:8180/dash">IDM Setup</a></li>
								  </ul>
								</li>
								<li class="dropdown">
								  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools<span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="create_component.php">Create Component</a></li>
									<li><a href="select_component.php">Modify Component</a></li>
									<hr>
									<li><a href="#">Update Status</a></li>
									<li><a href="select_user_progress.php">Progress Report</a></li>
								  </ul>
								</li>
								<li class="dropdown">
								  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin Access<span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="create_user.php">Create User</a></li>
									<li><a href="select_user.php">Modify User</a></li>
									<hr>
									<li><a href="create_team.php">Create Team</a></li>
									<li><a href="#">Delete Team</a></li>
									<hr>
									<li><a href="#">Delete Component</a></li>
								  </ul>
								</li>
								<li class="dropdown">
								  <a class="dropdown-toggle" data-toggle="dropdown" href="#">FAQs<span class="caret"></span></a>
								  <ul class="dropdown-menu">
									<li><a href="search_faqs.php">Search FAQs</a></li>
									<li><a href="create_faqs.php">Post FAQs</a></li>
									<li><a href="modify_faq.php">Modify FAQs</a></li>
								  </ul>
								</li>
							  </ul>
							  <ul class="nav navbar-nav navbar-right">
								 <li><a href="#"><span class="glyphicon glyphicon-user"></span> '. $name.'</a></li>
								 <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
							  </ul>
							</div>
						  </div>
						</nav>
						';
			}
			elseif($result['role']=='trainer'){

				$header='
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					  <a class="navbar-brand" href="components.php">NetIQ</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="components.php">Home</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Overview<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a target="_blank" href="http://164.99.178.17:8180/dash">IDM Setup</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="create_component.php">Create Component</a></li>
							<li><a href="select_component.php">Modify Component</a></li>
							<hr>
							<li><a href="#">Update Status</a></li>
							<li><a href="select_user_progress.php">Progress Report</a></li>
						  </ul>
						</li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">FAQs<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="search_faqs.php">Search FAQs</a></li>
							<li><a href="create_faqs.php">Post FAQs</a></li>
							<li><a href="modify_faq.php">Modify FAQs</a></li>
						  </ul>
						</li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
					      <li><a href="#"><span class="glyphicon glyphicon-user"></span> '. $name.'</a></li>
						 <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					  </ul>
					</div>
				  </div>
				</nav>
				';
			}
			else{
				$header='
				<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
					<div class="navbar-header">
					  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>                        
					  </button>
					  <a class="navbar-brand" href="components.php">NetIQ</a>
					</div>
					<div class="collapse navbar-collapse" id="myNavbar">
					  <ul class="nav navbar-nav">
						<li class="active"><a href="components.php">Home</a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">Overview<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a target="_blank" href="http://164.99.178.17:8180/dash">IDM Setup</a></li>
						  </ul>
						</li>
						<li><a href="mailto:Krishnan.Rajagopalan@microfocus.com?Subject=My Status for Today" target="_top">Send Status </a></li>
						<li class="dropdown">
						  <a class="dropdown-toggle" data-toggle="dropdown" href="#">FAQs<span class="caret"></span></a>
						  <ul class="dropdown-menu">
							<li><a href="search_faqs.php">Search FAQs</a></li>
							<li><a href="create_faqs.php">Post FAQs</a></li>
							<li><a href="modify_faq.php">Modify FAQs</a></li>
						  </ul>
						</li>
					  </ul>
					  <ul class="nav navbar-nav navbar-right">
					     <li><a href="#"><span class="glyphicon glyphicon-user"></span> '. $name.'</a></li>
						 <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
					  </ul>
					</div>
				  </div>
				</nav>
				';
			}
?>

 