<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>
	<h1>Registration Successful</h1>

	<?php

		function test($data)	
		{
			$date = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		
	?>

	<fieldset>
		<legend>Group 1: Basic Information</legend>		
	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{			
			$firstname = test($_POST['firstname']);
			$lastname = test($_POST['lastname']);
				
			if (empty($lastname) || empty($firstname)) 
			{
				echo "Fill up the form properly";
				echo "<br><br>";
				die();					
			}				
			else
			{			
				
				echo "First Name: " . $firstname;
				echo "<br><br>";
				
				echo "Last Name: " . $lastname;
				echo "<br><br>";
			}	
				echo "Gender: " . $_POST['gender'];
				echo "<br><br>";

				$DOB = $_POST['DOB'];
				echo "Date of Birth: " . $DOB;
				echo "<br><br>";
			
				$Religion = test($_POST['Religion']);
				echo "Religion: " . $Religion;
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
	</fieldset>
	<br>
	<fieldset>
		<legend>Group 2: Contact Information</legend>
	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$Present_Address = test($_POST['Present_Address']);

			if (empty($Present_Address)) 
			{	
				echo "Fill up the form properly";
				echo "<br><br>";
				die();
			}
			else
			{					
				echo "Present Address: " . $Present_Address;
				echo "<br><br>";

				$Permanent_Address = test($_POST['Permanent_Address']);
				if (empty($Permanent_Address)) 
				{	
				 	//			
				}
				else
				{
					echo "Permanent Address: " . $Permanent_Address;
					echo "<br><br>";
				}

				$Phone = test($_POST['Phone']);
				echo "Phone: " . $Phone;
				echo "<br><br>";
			}
				$Email = test($_POST['Email']);
				if(filter_var($Email))
				{	
					echo "Email: " . $Email;
					echo "<br><br>";
				}
				else
				{
					echo "Invalid email Address.";
					echo "<br><br>";
				}

				$pwl = test($_POST['pwl']);
				echo "Personal Website Link: " . $pwl;
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
	</fieldset>
	<br>
	<fieldset>
		<legend><b>Group 3: Credentials</b></legend>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{	
			$uname = test($_POST['uname']);
			if (empty($uname))
			{
				echo "Invalid Username";
				echo "<br><br>";
				die();
			}
			else
			{
				$uname = test($_POST['uname']);			
				echo "Username: " . $uname;
				echo "<br><br>";
			}

			if ($_POST['password'] == $_POST['cfpassword'] ) {
				echo "Password Matched";	
			}
			else
			{
				echo "Confirm Password did not match";
			}
				
		}	
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
			
	?>
	</fieldset>
	<p style="color: green;">Thank you for registering.</p>

	<a href="registration.html">Go BacK
</body>
</html>