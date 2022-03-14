<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
	<h1 style="color: darkcyan;" align="center">CharitAble</h1>
	<p align="center"><b>Fundraising Website</b></p>
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
			$username = test($_POST['uname']);	
			$usetype = test($_POST['usertype']);
			if (empty($username) || empty($_POST['password']) || !isset($Religion))
			{
				echo "Fill up the form properly";				
				?>
				<p style="color:red;"><b>Registration Failed</b></p>
				<?php
				
			}
			else
			{						
				echo "Username: " . $username;
				echo "User Type" . $_POST['usertype'];
				echo "<br><br>";					
				if ($_POST['password'] == $_POST['cfpassword'] ) 
				{
					echo "Password Matched";
					echo "<br>";
					echo "Registration Successful.";
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

        $handle = fopen("../model/users_list.json", "r");
        $fr = fread($handle, filesize("../model/users_list.json")); 
        $decode = json_decode($fr);
        fclose($handle);

        $handle = fopen("../model/users_list.json", "w");     


        if ($decode === NULL)
        {            
            $users_list = array(array("firstname" => $firstname, "lastname" => $lastname, "Gender" => $_POST['gender'], "DOB" => $DOB, "Religion" => $Religion, "Permanent_Address" => $Permanent_Address, "Present_Address" => $Present_Address,"Phone" => $_POST['Phone'], "Email" => $Email,"pwl" => $_POST['pwl'],"Username" => $username,"userType" => $_POST['usertype'], "Password" => $_POST['password'], "Confirm_Password" => $_POST['cfpassword']));
            $users_list = json_encode($users_list);
            fwrite($handle, $users_list);
        }
        else
        {
            $decode[] = array("firstname" => $firstname, "lastname" => $lastname, "Gender" => $_POST['gender'], "DOB" => $DOB, "Religion" => $Religion, "Permanent_Address" => $Permanent_Address, "Present_Address" => $Present_Address,"Phone" => $_POST['Phone'], "Email" => $Email,"pwl" => $_POST['pwl'],"Username" => $username,"usertype" => $_POST['usertype'], "Password" => $_POST['password'], "Confirm_Password" => $_POST['cfpassword']);
            $users_list = json_encode($decode);
            fwrite($handle, $users_list);
        }
        fclose($handle);
        
	?>
	</fieldset>	
	<br>
	<a href="../views/registration.php">Go Back</a>
	<?php  include('..views/templates/footer.php');?>
</body>
</html>