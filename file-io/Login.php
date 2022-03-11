<?php 

	session_start();

	if(isset($_SESSION['uname']))
	{
		header("Location: welcome_page.php");
	}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
</head>
<body>

	<form action="LoginAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded">
		
			<h1 style="color: blueviolet;"><b>Login</b></h1>	
			<br>
			<label for="uname">Username</label><span style="color:red">*</span>
			<input type="text" name="uname" id="uname" size="25" maxlength="5" required autofocus>			
			<br><br>
			<label for="password">Password</label><span style="color:red">*</span>
			<input type="password" name="password" id="password" required>
			<br><br>
			<input type="submit" name="Login" value="Login">
		
	</form>

		<?php 

		if (isset($_SESSION['error_message']))
		{
			echo "<p>" . $_SESSION['error_message'] . "<p>";
		}
		?>
			
		
</body>
</html>