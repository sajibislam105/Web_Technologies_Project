<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<?php include('../views/templates/half_header.php') ?>
		<br>
		<h1 style="text-align: center;">Please Login first to access this page</h1>
		<p style="text-align: center;">You do not the permission to access this page</p>
		<br>
		<a href="../views/login.php"><p style="text-align: center;">Login Page</p></a>

		<?php
		include('../views/templates/footer.php');

	}
	else
	{
		?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
</head>
<body>
	<h1 style="color: blueviolet;">Change Password Action</h1>	
	
	<?php

		function test($users)
		{
			$users = trim($users);
			$users = stripslashes($users);
			$users = htmlspecialchars($users);
			return $users;
		}		
	
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{	
			$username = $_SESSION['username'];
			$password = test($_POST['password']);
			if (empty($_POST['password']))
			{
				echo "Fill up the password properly";			
				?>
				<br>
				<p style="color:red;"><b>Password did not changed</b></p>
				<?php				
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
					$sql = "UPDATE users_list SET Password='$password', Confirm_Password='$password' WHERE Username='$username'";			      
					if ($conn->query($sql) === TRUE)
					{
			        	echo "Password changed Successfully";
			        	header("Location: ../views/Logout.php");        	
					}
					else
					{
							echo "Error: " . $sql . "<br>" . $conn->error;
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
	<br><br>
	<a href="../views/Dashboard.php">Go Back
	<?php 
	
	}
	
	?>
</body>
</html>