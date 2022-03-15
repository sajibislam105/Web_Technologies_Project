<?php 

	session_start();

	if(isset($_SESSION['username']))
	{
		header("Location: ../views/Dashboard.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<h1 style="color: darkcyan;" align="center">CharitAble</h1>
	<p align="center"><b>You think, You care, You give.</b></p>
	<p align="center"><b>Charity Website</b></p>
</head>
<body>

	<form action="../controller/LoginAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded">
		
			<h2 style="text-align: left;"><b>Login</b></h2>
			<label for="username">Username</label><span style="color:red">*</span>
			<input type="text" name="username" id="username" size="25" maxlength="5" required autofocus>			
			<br><br>
			<label for="password">Password</label><span style="color:red">*</span>
			<input type="password" name="password" id="password" required>
			<br><br>
			<input type="submit" name="Login" value="Login">

			<br><br>
			<a href="registration.php">Registration</a>
			<a style="color:red;" href="forgot_password.php">Forgotten Password?</a>
			
	</form>

	<?php 

		if (isset($_SESSION['error_message']))
		{
			echo "<p>" . $_SESSION['error_message'] . "<p>";
		}

		include('templates/footer.php') 
	?>
</html>