<?php

	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update Password</title>
</head>
<body>

	<?php 

	$username = "";
	$password = "";


	if (isset($_SESSION['uname'])) 
	{
		$handle = fopen("users.json", "r");
		$fr = fread($handle, filesize("users.json"));

		$arr1 = json_decode($fr);		
		fclose($handle);

		for ($i=0; $i < count($arr1); $i++) 
		{ 
			if ($username == $arr1[$i]->Username) 
			{
				if($password == NULL )
				{
					echo "Please fill password";
				}
				else
				{
					$password = $arr1[$i]->Password;
				}

			}
		}
	}
	else
	{	
		die("Invalid REQUEST");
	}
	?>

	<h1 style="color: green;">Update Password</h1>

	<form action="UpdateAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded">

		<label for="uname">Username</label><span style="color:red">*</span>
		<input type="text" name="uname" id="uname" value="<?php echo $_SESSION['uname'] ?>" size="25" maxlength="5" required>			
		<br><br>
		<label for="password">Password</label><span style="color:red">*</span>
		<input type="password" name="password" id="password" value="value="<?php echo $password ?>>
		<br><br>
		<input type="submit" name="Update" value="Update">

		<br><br>
		<a href="welcome_page.php">Go Back</a>
		
	</form>
</body>
</html>