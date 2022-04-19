<?php 
//cookies
	$Month = 2592000 + time();
		$date = new DateTime(null, new DateTimeZone('Asia/Dhaka'));

		//this adds 30 days to the current time
		setcookie("UserVisit", $date->format("F jS - g:i a"), $Month);
		
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
	<script src="JS/Login.js"></script>
	<?php include('templates/half_header.php') ?>
	</head>
<body>

	

	<form name="loginform" action="../controller/LoginAction.php" method="POST" novalidate onsubmit="return( validate_login());" >
		<div class="box">			

			<label style="font-weight: bold; "for="username">Username:</label>
			<input type="text" name="username"id="username" required autofocus>
			<br><br>
			<label style="font-weight: bold;" for="password">Password:</label>
			<input type="password" name="password" id="password" required>
			<br><br>
			<input type="submit" name="Login" value="Login">
			
			<div class="registration">
				<p><a href="registration.php">Registration</a></p>
			</div>	
			<div class="forgot_password">
				<p><a href="forgot_password.php">Forgotten Password?</a></p>
			</div>			
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