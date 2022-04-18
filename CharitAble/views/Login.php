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

	<link rel="stylesheet" href="CSS/Login.CSS">
	<script src="JS/javascript.js"></script>

	<div class="header">
		<div class="website_name">
				<h1>CharitAble</h1>
		</div>
		<div class="website_name_details">
				<p>You think, You care, You give.</p>
		</div>
	</div>
</head>
<body>

	

	<form name="loginform" action="../controller/LoginAction.php" method="POST" novalidate onsubmit="return validate_login();" >
		<div class="box">			

			<label for="username">Username</label>
			<input type="text" name="username" id="username" required autofocus>
			<br><br>

			<label for="password">Password</label>
			<input type="password" name="password" id="password" required>
			<br><br>

			<input type="submit" name="Login" value="Login">

			<br><br>
			<a href="registration.php">Registration</a>
			<br>
			<a href="forgot_password.php">Forgotten Password?</a>
			<br><br>
		</div>	
	</form>
	<p id="msg"></p>
</body>

	<?php 

		if (isset($_SESSION['error_message']))
		{
			echo "<p>" . $_SESSION['error_message'] . "<p>";
		}
		include('templates/footer.php') 
	?>
</html>