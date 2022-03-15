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
		<a href="/views/login.php"><p style="text-align: center;">Login Page</p></a>

		<?php
		include('templates/footer.php');

	}
	else
	{
		?>
<!DOCTYPE html>
<html>
<title>Human Resource</title>
<?php include("templates/header.php") ?>
<h2 align="center">Human Resource</h2>

	<fieldset>
			<br><br>
			<a href="../views/View_employees.php">View Total employees</a>
			<br><br>
			<a href="../views/Hire_employees.php">Hire employees</a>		
			<br><br>
			<a href="../views/Fire_employees.php">Fire employees</a>
			<br><br>		
	</fieldset>

	<br>
	<a href="../views/Dashboard.php"><b style="color: blue;">Back</b></a>
	<br><br>

	<?php include("templates/footer.php"); 
} 
	?>
</html>