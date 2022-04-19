<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
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
	
	<?php include('templates/header.php'); ?>
	<title>Fire Employee</title>

	<script src="JS/fire.js"></script>

	<h1 align="center">Fire Employee</h1>
	<br>
	<form name="fire" action="../controller/HumanResourceFireAction.php" method="POST"  novalidate onsubmit="return(fire_employee());">
	<fieldset>		
					<br>
						<label for="employee_name">Employee Username:</label>
						<br>
						<input type="text" name="employee_name" id="employee_name" size="50" required autofocus>
						<br><br>						
						<input type="submit" name="Fire" value="Fire">
	</fieldset>
	</form>	
	<br>
	<a href="../views/Human_resources.php">Previous page</a> 
	<?php include('templates/footer.php'); }  ?>
	</html>