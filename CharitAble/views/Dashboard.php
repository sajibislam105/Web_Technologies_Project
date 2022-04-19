<?php 
	
		

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<?php include('templates/half_header.php') ?>
		<br>
		<h1 style="text-align: center;">Please Login first to access this page</h1>
		<p style="text-align: center;">You do not have the permission to access this page</p>
		<br>
		<a href="../views/login.php"><p style="text-align: center;">Login Page</p></a>

		<?php
		include('templates/footer.php');

	}
	else
	{
		?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Dashboard</title>
	</head>
	<?php include('templates/header.php')  ?>
	<link rel="stylesheet" href="CSS/Dashboard.CSS">
	<script src="JS/fire_employee.js"></script>
	<?php 
		//printed the value of cookies
		if(isset($_COOKIE['UserVisit']))
		{
		$last = $_COOKIE['UserVisit'];
		echo "You last visited on ". $last;
		}		
	 ?>
	<h2 >Dashboard</h2>	

<body>		
	
	<div class="box">		
		<br><br>

		<div class="Manage_Events" id="Dashboard">			
			<a href="../views/Manage_Events.php">Manage Events</a>
		</div>

		<br><br>
		<div class="Human_resources" id="Dashboard">
			
			<a href="../views/Human_resources.php">Human Resources</a>
		</div>

		<br><br>

		<div class="Manage_users" id="Dashboard">
			
			<a href="../views/Manage_users.php">Manage Users</a>
		</div>

		<br><br>
		<div class="verify_organization" id="Dashboard">	
			<a href="../views/verify_organization.php">Verify Organization</a>		
		</div>

		<br><br>

		<div class="Member_record" id="Dashboard">
			<a href="../views/Member_record.php">Member Records</a>	
		</div>	
		<br><br>

		<div class="view_feedback" id="Dashboard">
			<a href="../views/view_feedback.php">View Feedbacks</a>	
		</div>

		<br><br>
	</div>	

</body>
</html>
<?php 
include('templates/footer.php') ?>
<?php
	}
 		
 ?> 
