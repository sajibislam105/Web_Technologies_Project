<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgot Password</title>

	<link rel="stylesheet"href="CSS/forgot_password.CSS">
	<script src="JS/forgot_password.js"></script>

	<?php include('templates/half_header.php') ?>
</head>
<body>
	
 	<form name="forgot_password" action="../views/forgot_password.php" method="POST" novalidate onsubmit="return(validate_forgot_password());">
		
 	<div class="box">
 		<h2 style="border-bottom: solid;">Reset Password</h2>
		<p>Please provide your credentials below</p>

		<div class="username">
			<label for="username">Username</label>
			<input type="text" name="username" id="username" required autofocus>
		</div>
		<br><br>

		<div class="usertype">
			<label for="usertype">User Type</label>
			<input type="text" name="usertype" id="usertype" required>
		</div>
		<br><br>

		<div class="phone">
		<label for="Phone">Phone</label>
			<input type="text" name="Phone" id="Phone" required>
		</div>

		<br><br>
		<input type="submit" name="check" value="check">
		<br><br>
	</div>

	</form>
	<?php 
		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

	if ($_SERVER['REQUEST_METHOD'] == "POST")
		{

			$username = test($_POST['username']);
			$Phone = test($_POST['Phone']);
			$usertype = test($_POST['usertype']);

			if (!isset($username) || $username == null || !isset($Phone) || $Phone == null || !isset($usertype) || $usertype == null) 
			{
				echo '<h4 style="color: red;" >Fill up the box</h4>';
				echo "<br>";
			}
			else
			{
				$flag;

				$servername = "localhost";
				$dbusername = "root";
				$password = "";
				$dbname = "charitable";
				
				$conn = new mysqli($servername, $dbusername, $password, $dbname);
				if ($conn->connect_error)
				{
				  die("Connection failed: " . $conn->connect_error);
				}
				else
				{
					$sql = "SELECT Phone,Username,usertype FROM users_list WHERE Phone='$Phone' AND Username='$username' AND usertype='$usertype'";
					$result = $conn->query($sql);
					$row = $result->fetch_assoc();
					if ($result->num_rows > 0) 
					{
						?>
						
						<div class="found">
							<h4>Username <?php echo $username;  ?> found and information found </h4>						
						</div>
						<form action="../controller/ForgetPasswordAction.php" method="POST">

						<div class="box2">
							<label for="username">Username</label>
							<input type="text" name="username" id="username" value="<?php echo $username ?> " readonly >
							<br><br>

							<label for="Npassword">New Password</label>
							<input type="password" name="Npassword" id="Npassword">
							<br><br>
							<label for="CNpassword">Confirm New Password</label>
							<input type="password" name="CNpassword" id="CNpassword">
							<br><br>

							<input type="submit" name="Reset" value="Reset">
							<br><br>
						</div>
						
						</form>
	<?php
					}
					else
					{
						echo '<h4 style="color: red;" >' . $username . ' not found </h4>';
						echo "<br>Please insert the correct information";
					}
				}
			}			
		}
	?>
	
	<div class="back">		
		<a href="Login.php">Go Back</a>
	</div>
	<?php include('templates/footer.php');?>
</body>
</html>