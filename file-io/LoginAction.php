<?php 
	
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
</head>
<body>

	<?php 

		$username = $_POST['uname'];
		$password = $_POST['password'];

		$handle = fopen("users.json", "r");
		$fr = fread($handle, filesize("users.json"));
		$arr1 = json_decode($fr);	
			

		for ($i=0; $i < count($arr1) ; $i++) 
		{ 
			if(($username == $arr1[$i]->Username) && $password == $arr1[$i]->Password)			
			{
				$_SESSION['uname'] = $username;
				header("Location: Welcome_page.php");
			}
			else
			{
				$_SESSION['error_message'] = "Login Failed!";
				header("Location: Login.php");
			}
		}

		

	?>

</body>
</html>