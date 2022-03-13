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
		
		<p>Please provide your credentials below</p>
		<label for="username">Username</label>
		<input type="text" name="username" id="username" required autofocus>

		<br><br>

		<label for="usertype">User Type &nbsp</label>
		<input type="text" name="usertype" id="usertype" required>

		<br><br>

		<label for="Phone">Phone &nbsp &nbsp &nbsp</label>
		<input type="text" name="Phone" id="Phone" required>

		<br><br>
		<input type="submit" name="check" value="check">
		<br><br>

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

				$handle = fopen("../model/users_list.json", "r");
				$fr = fread($handle, filesize("../model/users_list.json"));
				$arr1 = json_decode($fr);

				$flag = false;
				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($username == $arr1[$i]->Username) && ($Phone ==$arr1[$i]->Phone) && ($usertype == $arr1[$i]->usertype))
					{
							$flag = true;
							$fc = fclose($handle);
							break;
					}
					else
					{						
						$flag == false;
					}
				}
				if ($flag === true)
				{
					echo '<h4 style="color: green;" >User "' . $username . '" found and Credentials matched </h4>';
					//header("Location: ../controller/ForgetPasswordAction.php");					
				}
				else
				{
					echo '<h4 style="color: red;" >' . $username . ' not found </h4>';
					echo "<br>Please insert the correct information";
				}
				?>
			<form action="../controller/ForgetPasswordAction.php" method="POST">

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
			</form>
	<?php

            	
			}
		}
	?>		
	<a href="Login.php">Go Back</a>
	<?php include('templates/footer.php');?>
</html>