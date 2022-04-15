<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forget Password</title>
</head>
<body>
	<h1 style="color: blueviolet;">Forget Password Action</h1>	
	
	<?php

		function test($users)	
		{
			$users = trim($users);
			$users = stripslashes($users);
			$users = htmlspecialchars($users);
			return $users;
		}		
	?>		
	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{	
			
			$username = test($_POST['username']);
			$Npassword = test($_POST['Npassword']);
			$CNpassword = test($_POST['CNpassword']);
			if (empty($_POST['Npassword']) || empty($_POST['CNpassword']))
			{		
				echo "Fill up the boxes properly";			
				?>
				<br>
				<p style="color:red;"><b>Password did not changed</b></p>
				<?php					
			}
			else
			{
				if ($Npassword == $CNpassword) 
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
						$sql = "UPDATE users_list SET Password='$Npassword', Confirm_Password='$CNpassword' WHERE Username='$username'";			      
						if ($conn->query($sql) === TRUE)
						{
				        	echo "Password Reset succesful";
				        	header("Location: ../views/Login.php");        	
						}
						else
						{
							echo "Error: " . $sql . "<br>" . $conn->error;
						}

					$conn->close();
					
					}
				}
				else
				{
					echo "Password and Confirm Password does not match";
				}
            	
			}				
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}	        
	?>
	<br><br>
	<a href="../views/Login.php">Go Back
</body>
</html>