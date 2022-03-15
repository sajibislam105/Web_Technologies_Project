<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
		<p align="center"><b>You think, You care, You give.</b></p>
		<p align="center"><b>Charity Website</b></p>
		<br>
		<h1 style="color: red; text-align: center;">Please Login first to access this page</h1>
		<p style="text-align: center;">You do not the permission to access this page</p>
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

	<?php include('templates/header.php')  ?>

	<title>Dashboard</title>
	<h2 align="center">Dashboard</h2>

	<fieldset>
		<legend style="text-align: center;">Operations</legend>			
		
		<br><br>
		<label>1.</label>
		<a href="../views/Manage_Events.php">Manage Events</a>
		<br><br>
		<label>2.</label>	
		<a href="../views/Human_resources.php">Human Resources</a>
		<br><br>
		<label>3.</label>
		<a href="../views/Manage_users.php">Manage Users</a>
		<br><br>
		<label>4.</label>	
		<a href="../views/verify_organization.php">Verify Organization</a>		
		<br><br>		
		<label>5.</label>
		<a href="../views/Member_record.php">Member Records</a>	
		<br><br>
		<label>6.</label>
		<a href="../views/view_feedback.php">View Feedbacks</a>	
		<br><br>
		
	</fieldset>

	<?php include('templates/footer.php') ?>
</html>
<?php
	}

?>
