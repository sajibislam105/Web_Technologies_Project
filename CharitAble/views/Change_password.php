<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<?php include('templates/half_header.php') ?>
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
	<title>Change Password</title>
	<?php include('templates/header.php')  ?>

	<script src="JS/Change_password.js"></script>

		<h2 align="center">Change Password</h2>

		<form name="change_password" action="../controller/ChangepasswordAction.php" method="POST" enctype="application/x-www-form-urlencoded" onsubmit="return(Change_password());">
			<fieldset>
				<label for="uname">Username</label>
				<input type="text" name="uname" id="uname" value="<?php echo $_SESSION['username'] ?>" disabled required>			
				<br><br>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" placeholder="new password">
				<br><br>		
				<input type="submit" name="Update" value="Update">

				<br><br>
				<a href="../views/Dashboard.php">Go Back</a>
			</fieldset>
		</form>
		<?php include('templates/footer.php'); } ?>
	</html>