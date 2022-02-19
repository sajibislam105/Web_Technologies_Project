<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>
	<h1 style="color: blueviolet;">Registration Action</h1>	
	
	<?php
		$checker = false;
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
			$DOB = $_POST['DOB'];
			$Religion = test($_POST['Religion']);
				
			if (empty($lastname) || empty($firstname) || !isset($_POST['gender']) || !isset($_POST['DOB']) || !isset($Religion)) 
			{
				echo "Fill up the form properly";
				echo "<br><br>";							
			}				
			else
			{	
				echo "First Name: " . $firstname;
				echo "<br><br>";				
				echo "Last Name: " . $lastname;
				echo "<br><br>";				 
				echo "Gender: " . $_POST['gender'];
				echo "<br><br>";							
				echo "Date of Birth: " . $DOB;
				echo "<br><br>";				
				echo "Religion: " . $Religion;
				//$checker =1;
			}			
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

		if ($_SERVER['REQUEST_METHOD'] === "POST" /*&& $checker == '1'*/)
		{
			$Present_Address = test($_POST['Present_Address']);
			//$Email = test($_POST['Email']);

			if (empty($Present_Address) || empty($Email)) 
			{	
				echo "Fill up the form properly";
				echo "<br><br>";				
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
			
				//$Email = test($_POST['Email']);
				$Email = $_POST['Email'];
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
				$checker =2;
			}
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
		if ($_SERVER['REQUEST_METHOD'] === "POST"/* && $checker == 2*/)
		{	
			$uname = test($_POST['uname']);
			if (empty($uname) || empty($_POST['password']))
			{
				echo "Fill up the form properly";				
				?>
				<p style="color:red;"><b>Registration Failed</b></p>
				<?php								
			}
			else
			{
						
				echo "Username: " . $uname;
				echo "<br><br>";					
				if ($_POST['password'] == $_POST['cfpassword'] ) 
				{
					echo "Password Matched";
											?>
					<p style="color: green;">Thank you for Registration.</p>
			
											<?php
				}
				else
				{
					echo "Confirm Password did not match";
				}				
			}	
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
			
	?>
	</fieldset>
	
	<br>
	<a href="registration.html">Go Back
</body>
</html>