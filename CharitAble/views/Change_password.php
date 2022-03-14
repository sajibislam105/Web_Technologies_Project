<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
		<p align="center"><b>Fundraising Website</b></p>
		<br>
		<h1 style="color: red; text-align: center;">Please Login first to access this page</h1>
		<p style="text-align: center;">You do not the permission to access this page</p>
		<br>
		<a href="../views/login.php"><p style="text-align: center;">Login Page</p></a>

		<?php
		include('templates/footer.php');

	}
	else
	{
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

	<h2 align="center">Change Password</h2>

	<form action="../controller/ChangepasswordAction.php" method="POST" enctype="application/x-www-form-urlencoded">
		<fieldset>
			<label for="uname">Username</label><span style="color:red">*</span>
			<input type="text" name="uname" id="uname" value="<?php echo $_SESSION['username'] ?>" size="25" maxlength="5" disabled required>			
			<br><br>
			<label for="password">Password</label><span style="color:red">*</span>
			<input type="password" name="password" id="password" value="value="<?php echo $password ?>>
			<br><br>		
			<input type="submit" name="Update" value="Update">

			<br><br>
			<a href="../views/Dashboard.php">Go Back</a>
		</fieldset>
	</form>
	<?php include('templates/footer.php'); } ?>
</html>