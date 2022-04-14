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
	<h1 class="header">CharitAble</h1>
	<p align="center"><b>You think, You care, You give.</b></p>
	<p align="center"><b>Charity Website</b></p>
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

				$handle = fopen("../model/users_list.json", "r");
				$fr = fread($handle, filesize("../model/users_list.json"));
				$arr1 = json_decode($fr);	
					

				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($username == $arr1[$i]->Username) && $password == $arr1[$i]->Password)			
					{
						$_SESSION['username'] = $username;
						header("Location: ../views/Dashboard.php");
					}
					else
					{ 
						$_SESSION['error_message'] = "Login Failed!";
						header("Location: ../views/Login.php");
					}
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