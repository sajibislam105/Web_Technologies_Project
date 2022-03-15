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
	
	<?php include('templates/header.php'); ?>
	<title>Ban Users</title>
	<h1 align="center">Ban Users</h1>
	<br>
	<form action="../controller/ManageUsersBanAction.php" method="POST"  novalidate>
	<fieldset>		
					<br>
						<label for="user's_username">Username:</label>
						<br>
						<input type="text" name="user's_username" id="user's_username" size="50" required autofocus>
						<br><br>						
						<input type="submit" name="Ban_User" value="Ban User">
	</fieldset>
	</form>	
	<br>
	<a href="../views/Manage_users.php">Previous page</a> 
	<?php include('templates/footer.php'); }  ?>
	</html>