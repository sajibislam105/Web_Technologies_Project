<?php 
	
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
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
			{
					echo "Fill up the form properly";
					echo "<br>";
					echo "Go back to Login Page and Try again with valid username or password";
					?>
					<br><br>
					<a href="../views/Login.php">Login Page</a>
					<br>
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