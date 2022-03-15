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
		<a href="/views/login.php"><p style="text-align: center;">Login Page</p></a>

		<?php
		include('templates/footer.php');
	}
	else
	{
		?>
<!DOCTYPE html>
<html>
<title>Manage Users</title>
<?php include("templates/header.php"); ?>
<h2 align="center">Manage Users</h2>

	<fieldset>
			<br><br>
			<a href="registration.php">Add User</a>			
			<br><br>
			<a href="Ban_User.php">Ban User</a>
			<br><br>		
	</fieldset>

	<br>
	<a href="../views/Dashboard.php"><b style="color: blue;">Back</b></a>
	<br><br>

	<?php include("templates/footer.php"); 
} 
	?>
</html>