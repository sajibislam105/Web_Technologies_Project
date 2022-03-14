<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
		<p align="center"><b>Fundraising Website</b></p>
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
	<h1 align="center">Dashboard</h1>

	<fieldset>
		<legend style="text-align: center;">Operations</legend>
			
		<br><br>
		<label>1.</label>
		<a href="../views/Manage_Events.php">Manage Events</a>
		<br><br>
		<label>2.</label>	
		<a href="">Manage Employees</a>		
		<br><br>
		<label>3.</label>
		<a href="">Manage Users</a>
		<br><br>
		<label>4.</label>	
		<a href="">Verify Organization</a>		
		<br><br>
		<label>5.</label>
		<a href="">Review Finance</a>	
		<br><br>
		<label>6.</label>
		<a href="../views/Member_record.php">Member Records</a>	
		<br><br>
		<label>7.</label>
		<a href="../views/view_feedback.php">View Feedbacks</a>	
		<br><br>
	</fieldset>

	<?php include('templates/footer.php') ?>
</html>
<?php
	}

?>