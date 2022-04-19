<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<?php include('../views/templates/half_header.php') ?>
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
	
	<?php include('templates/header.php'); ?>
	<title>Delete Events</title>

	<script src="JS/create_event.js"></script>
	<h1 align="center">Delete Events</h1>
	<br>
	<form name="delete_event" action="../controller/ManageEventsDeleteAction.php" method="POST"  novalidate onsubmit="return(validate_delete_event());">
	<fieldset>		
					<br>
						<label for="ename">Event Name:</label>
						<br>
						<input type="text" name="ename" id="ename" size="50" required autofocus>
						<br><br>
						<label for="e_id">Event ID:</label>
						<br>
						<input type="text" name="e_id" id="e_id"  required> 
						<br><br>
						<label>Select Type</label>
						<input type="radio" name="type" id="Individual" value="Individual" required><label for="Individual">Individual</label>
						<input type="radio" name="type" id="Organization" value="Organization"><label for="Organization">Organization</label>
						<br><br>
						<input type="submit" name="Check" value="Check">
	</fieldset>
	</form>	
	<br>
	<a href="../views/Manage_events.php">Previous page</a> 
	<?php include('templates/footer.php'); }  ?>
	</html>