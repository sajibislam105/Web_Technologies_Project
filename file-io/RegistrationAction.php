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

		function test($data)	
		{
			$data = trim($data);
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
				?>
				<p style="color:red;"><b>Registration Failed</b></p>
				<?php								
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

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$Present_Address = test($_POST['Present_Address']);
			$Permanent_Address = test($_POST['Permanent_Address']);
			$Email = test($_POST['Email']);

			if (empty($Present_Address) || empty($Email)) 
			{	
				echo "Fill up the form properly";
				echo "<br><br>";
				?>
				<p style="color:red;"><b>Registration Failed</b></p>
				<?php
				
			}
			else
			{					
				echo "Present Address: " . $Present_Address;
				echo "<br><br>";
				
				if (empty($Permanent_Address)) 
				{	
				 	//			
				}
				else
				{
					echo "Permanent Address: " . $Permanent_Address;
					echo "<br><br>";
				}

				if (empty($Phone)) 
				{

				}
				else
				{
					$Phone = test($_POST['Phone']);
					echo "Phone: " . $Phone;
					echo "<br><br>";			
				}
				if(filter_var($Email, FILTER_VALIDATE_EMAIL))
				{	
					echo "Email: " . $Email;
					echo "<br><br>";
				}
				else
				{
					echo "Invalid email Address.";
					echo "<br><br>";
					
				}				
				if (empty($pwl)) {
					//
				}
				else
				{
				$pwl = test($_POST['pwl']);
				echo "Personal Website Link: " . $pwl;			
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
	<fieldset>
		<legend><b>Group 3: Credentials</b></legend>
	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST")
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

    //***************************************************

        $handle = fopen("users.json", "r");
        $fr = fread($handle, filesize("users.json"));  // reading the file for the first time
        $decode = json_decode($fr);
        fclose($handle);

        $handle = fopen("users.json", "w");     


        if ($decode === NULL)  // checking if the file is empty or not
        {            
            $users = array(array("firstname" => $firstname, "lastname" => $lastname, "Gender" => $_POST['gender'], "DOB" => $DOB, "Religion" => $Religion, "Permanent_Address" => $Permanent_Address, "Present_Address" => $Present_Address,"Phone" => $_POST['Phone'], "Email" => $Email,"pwl" => $_POST['pwl'],"Username" => $uname,"Password" => $_POST['password'], "Confirm_Password" => $_POST['cfpassword']));
            $users = json_encode($users);
            fwrite($handle, $users);
        }
        else
        {
            $decode[] = array("firstname" => $firstname, "lastname" => $lastname, "Gender" => $_POST['gender'], "DOB" => $DOB, "Religion" => $Religion, "Permanent_Address" => $Permanent_Address, "Present_Address" => $Present_Address,"Phone" => $_POST['Phone'], "Email" => $Email,"pwl" => $_POST['pwl'],"Username" => $uname,"Password" => $_POST['password'], "Confirm_Password" => $_POST['cfpassword']);
            $users = json_encode($decode);
            fwrite($handle, $users);
        }
        fclose($handle);
        
	?>
	</fieldset>	
	<br>
	<a href="registration.html">Go Back
</body>
</html>