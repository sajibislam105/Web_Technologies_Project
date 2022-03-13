<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<title>Change Password</title>
<?php include('templates/header.php')  ?>

	<?php 

	$username = "";
	$password = "";


	if (isset($_SESSION['username'])) 
	{
		$handle = fopen("../model/users_list.json", "r");
		$fr = fread($handle, filesize("../model/users_list.json"));

		$arr1 = json_decode($fr);		
		fclose($handle);

		for ($i=0; $i < count($arr1); $i++) 
		{ 
			if ($username === $arr1[$i]->Username) 
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

	<form action="../controller/ChangepasswordAction.php" method="POST" enctype="application/x-www-form-urlencoded">

		<label for="uname">Username</label><span style="color:red">*</span>
		<input type="text" name="uname" id="uname" value="<?php echo $_SESSION['username'] ?>" size="25" maxlength="5" disabled required>			
		<br><br>
		<label for="password">Password</label><span style="color:red">*</span>
		<input type="password" name="password" id="password" value="value="<?php echo $password ?>>
		<br><br>		
		<input type="submit" name="Update" value="Update">

		<br><br>
		<a href="../views/Dashboard.php">Go Back</a>
		
	</form>
	<?php include('templates/footer.php')  ?>
</html>