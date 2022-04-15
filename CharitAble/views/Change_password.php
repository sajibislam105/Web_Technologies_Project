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
	<title>Change Password</title>
	<?php include('templates/header.php')  ?>

		<h2 align="center">Change Password</h2>

		<form action="../controller/ChangepasswordAction.php" method="POST" enctype="application/x-www-form-urlencoded">
			<fieldset>
				<label for="uname">Username</label><span style="color:red">*</span>
				<input type="text" name="uname" id="uname" value="<?php echo $_SESSION['username'] ?>" disabled required>			
				<br><br>
				<label for="password">Password</label><span style="color:red">*</span>
				<input type="password" name="password" id="password" placeholder="new password">
				<br><br>		
				<input type="submit" name="Update" value="Update">

				<br><br>
				<a href="../views/Dashboard.php">Go Back</a>
			</fieldset>
		</form>
		<?php include('templates/footer.php'); } ?>
	</html>