<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Reset Password</title>
</head>
<body>
	<h1>Reset Password</h1>
 	<form action="../views/forgot_password.php" method="POST" novalidate>
		
		<p>Please provide your username below</p>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autofocus>	

		<input type="submit" name="search" value="search">

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

			if (!isset($username)) 
			{
				echo "Fill up the form properly";
				echo "<br>";
			}
			else
			{			

				$handle = fopen("../model/users_list.json", "r");
				$fr = fread($handle, filesize("../model/users_list.json"));
				$arr1 = json_decode($fr);	
					

				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($username == $arr1[$i]->Username))			
					{
							
					}
					else
					{
						echo "username not found";
					}
				}
				$fc = fclose($handle);
			}
		}

	include('templates/footer.php');  
	?>
</html>