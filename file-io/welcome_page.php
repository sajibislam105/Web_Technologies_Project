<?php 

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome Page</title>
</head>
<body>

	<h1>Welcome, <?php echo $_SESSION['uname'];?></h1>

	<span><a href="Update_password.php">Update Password</a></span>	
	<span><a href="Profile_update.php">Profile Update</a></span>

	<br><br>
	<a style="color: red;" href="Logout.php">Logout</a>


</body>
</html>