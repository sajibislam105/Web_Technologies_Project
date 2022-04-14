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
	<h1 class="header">CharitAble</h1>
	
	<div class="motto">
	<p align="center"><b>You think, You care, You give.</b></p>
	</div>

	<p align="center"><b>Charity Website</b></p>
</head>
<body>

	<div class="heart_hand">
	  	<a target="_blank" href="CSS/heart_hand.png">
	    <img src="CSS/heart_hand.png" alt="A Hand showing a heart" width="400" height="300">
	  	</a>  
  	</div>	

	<div class="hands">
	  	<a target="_blank" href="CSS/hands.jpg">
	    <img src="CSS/hands.jpg" alt="Forest" width="400" height="200">
	  	</a>
  </div>

	<form action="../controller/LoginAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded">
		<div class="box">	
			<div class="box1">
				<h2><b>Login</b></h2>
			</div>

			<label for="username">Username</label><span style="color:red">*</span>
			<input type="text" name="username" id="username" required autofocus>			
			
			<br><br>

			<label for="password">Password</label><span style="color:red">*</span>
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
</body>

	<?php 

		if (isset($_SESSION['error_message']))
		{
			echo "<p>" . $_SESSION['error_message'] . "<p>";
		}
		include('templates/footer.php') 
	?>
</html>