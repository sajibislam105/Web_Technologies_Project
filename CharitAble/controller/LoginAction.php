<?php 	
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../views/CSS/Login.CSS">
	<?php include('../views/templates/half_header.php') ?>
</head>
<body>
	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{

			$username = test($_POST['username']);
			$password = test($_POST['password']);

			if (empty($username) || empty($password)) 
			{?>	
				<style type="text/css">
					.error
					{
						border: 2px solid;
						padding: 5px 25px 5px 100px;
						margin: auto;
						border-color: black;
						text-align: center;							
					}
				</style>					
					<div class="error">
					<h3 style="color: red">!!!</h3>
					<p>Fill up the form properly!</p>
					<p>Go back to Login Page and Try again with valid username or password</p>
					</div>
					<br><br>
				<style type="text/css">
					.back
					{
						text-align: center;
					}
				</style>
				<div class="back">
				<a href="../views/Login.php">Login Page</a>
				<br>
				</div>
				<?php
				include('../views/templates/footer.php');
			}
			else
			{
				$servername = "localhost";
				$dbusername = "root";
				$dbpassword = "";
				$dbname = "charitable";
				
				$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

				if ($conn->connect_error)
				{
				  die("Connection failed: " . $conn->connect_error);
				}
				else
				{
					$sql = "SELECT Username,usertype,Password FROM users_list WHERE Username='$username' AND Password='$password'";
					$result = $conn->query($sql);
					if ($result->num_rows >0) 						
					{
						$row = $result->fetch_assoc();
						if( ($row["Username"] == $username) AND ($row["Password"] == $password) AND ($row["usertype"] == 'Admin'))
						{
							$_SESSION['username'] = $username;
							header("Location: ../views/Dashboard.php");
						}
						elseif (($row["Username"] == $username) AND ($row["Password"] == $password) AND !($row["usertype"] == 'Admin')) 
						{
						 	$_SESSION['error_message'] = "Login Failed! You are not admin";
							header("Location: ../views/Login.php");
						}
						else
						{
							$_SESSION['error_message'] = "Login Failed! Incorrect Username";
							header("Location: ../views/Login.php");
						}
					}
					else 
					{
				  		$_SESSION['error_message'] = "Login Failed! Incorrect Username or Password";
						header("Location: ../views/Login.php");
					}
				$conn->close();
				}								
			}
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
?>
</body>
</html>