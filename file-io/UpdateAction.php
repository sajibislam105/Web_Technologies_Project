<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
</head>
<body>
	<h1 style="color: blueviolet;">Update user</h1>	
	
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
			$uname = test($_POST['uname']);
			$password = test($_POST['password']);
			if (empty($uname) || empty($_POST['password']))
			{
				echo "Fill up the form properly";				
				?>
				<p style="color:red;"><b>Update Failed</b></p>
				<?php
				
			}
			else
			{						
				$handle = fopen("users.json", "r");
		        $fr = fread($handle, filesize("users.json"));  
		        $arr1 = json_decode($fr);		        
		        fclose($handle);

		        //$users = array("Password" => $_POST['password']);

		        $handle = fopen("users.json", "w");

		        for ($i=0; $i < count($arr1); $i++) { 
		        	if ($username == $arr1[$i]->Username) 
		        	{
		        		$arr1[$i]->password = $password;
		        	}
		        }
		        $users = json_encode($arr1);
            	fwrite($handle, $users);
            	$fw = fclose($handle);
            	if ($fw == true) 
				{
					echo "Data Saved succesfully";
				}
			}				
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}	        
	?>
	<br><br>
	<a href="welcome_page.php">Go Back
</body>
</html>