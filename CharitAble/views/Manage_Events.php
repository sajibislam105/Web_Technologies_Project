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
<title>Manage Events</title>
<?php include("templates/header.php") ?>
<h2 align="center">Manage Events</h2>

	<fieldset>
		<legend style="text-align: center;">CRUD Operation</legend>
			<br><br>
			<a href="../views/View_events.php">View Event</a>
			<br><br>
			<a href="../views/Create_events.php">Create Event</a>		
			<br><br>
			<a href="../views/Update_events.php">Update Event</a>
			<br><br>
			<a href="../views/Delete_events.php">Delete Event</a>
			<br><br>		
	</fieldset>

	<br>
	<a href="../views/Dashboard.php"><b style="color: blue;">Back</b></a>
	<br><br>

	<?php include("templates/footer.php"); 
} 
	?>
</html>