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
			<title>View Feedbacks</title>			
			<?php include('templates/header.php'); ?>

			<h2 align="center">Feedbacks</h2>
			<fieldset>
				
			</fieldset>
			<br>
			<a href="../views/Dashboard.php">Back</a>
			<?php include('../views/templates/footer.php'); 
	}
															?>
	</html>