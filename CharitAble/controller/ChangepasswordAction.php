<?php 
	session_start();
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
	?>		
	<?php 
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
				$handle = fopen("../model/users_list.json", "r");
		        $fr = fread($handle, filesize("../model/users_list.json"));  
		        $arr1 = json_decode($fr);		        
		        fclose($handle);

		        $handle = fopen("../model/users_list.json", "w");

		        for ($i=0; $i < count($arr1); $i++) { 
		        	if ($username == $arr1[$i]->Username) 
		        	{
		        		$arr1[$i]->Password = $password;
		        		$arr1[$i]->Confirm_Password = $password;
		        	}		        	
		        }
		        $users = json_encode($arr1);
            	$fw = fwrite($handle, $users);
            	$fc = fclose($handle);

            	if ($fw) 
				{
					echo "Password changed succesfully";
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
</body>
</html>