<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
		<p align="center"><b>You think, You care, You give.</b></p>
		<p align="center"><b>Charity Website</b></p>
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
	<title>View Profile</title>
	<?php include('templates/header.php'); ?>
	<h2 align="center">My Profile</h2>
	<?php
	$username = $_SESSION['username'];
	$handle = fopen("../model/users_list.json", "r");
	$fr = fread($handle, filesize("../model/users_list.json"));
	$decode = json_decode($fr);
	
	for ($i=0; $i < count($decode) ; $i++)
	{ 
		if ($username == $decode[$i]->Username) 
		{
			$firstname = $decode[$i]->firstname;
			$lastname = $decode[$i]->lastname;
			$Gender = $decode[$i]->Gender;
			$DOB = $decode[$i]->DOB;
			$Religion = $decode[$i]->Religion;
			$Present_Address = $decode[$i]->Present_Address;
			$Permanent_Address = $decode[$i]->Permanent_Address;
			$Email = $decode[$i]->Email;
			$Phone = $decode[$i]->Phone;
			$pwl = $decode[$i]->pwl;
			$username = $decode[$i]->Username;
			$usertype = $decode[$i]->usertype;
		}
	}
	$fc = fclose($handle);
?>
	<fieldset>
		<legend><b>Profile Information</b></legend>		
				
	<?php
		echo "<br>";
		echo "Username: " . $username;
		echo "<br><br>";			
		echo "Name: " . $firstname . " "  . $lastname;
		echo "<br><br>";				 
		echo "Gender: " . $Gender;
		echo "<br><br>";							
		echo "Date of Birth: " . $DOB;
		echo "<br><br>";				
		echo "Religion: " . $Religion;
		echo "<br><br>";			
		echo "Present Address: " . $Present_Address;
		echo "<br><br>";				
		echo "Permanent Address: " . $Permanent_Address;
		echo "<br><br>";				
		echo "Phone: " . $Phone;
		echo "<br><br>";
		echo "Email: " . $Email;
		echo "<br><br>";				
		echo "Personal Website Link: " . $pwl;
		echo "<br><br>";
		echo "User Type: <b>" . $usertype . "</b>";
		echo "<br><br>";
	?>
	</fieldset>

	<br>   
	<a href="../views/Dashboard.php">Go Back</a>
</body>
	<?php include('templates/footer.php'); }  ?>
</html>