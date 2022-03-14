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
			<title>Members Record</title>			
			<?php include('templates/header.php'); ?>
			<h2 align="center">Members Record</h2>		
			
			<?php 
			
			$handle = fopen("../model/users_list.json", "r");
			$fr = fread($handle, filesize("../model/users_list.json"));
			$decode = json_decode($fr);
			$fc = fclose($handle);		
			

			for ($i=0; $i < count($decode) ; $i++) 
			{ 
				?>
				<fieldset>
				<?php
					echo "<br><br>";			
					echo "Name: ".  $decode[$i]->firstname ." ". $decode[$i]->lastname ."<br><br>";			
					echo "Gender: ". $decode[$i]->Gender. "<br><br>";				
					echo "Date of Birth: ". $decode[$i]->DOB. "<br><br>";
					echo $decode[$i]->Religion. "<br><br>";
					echo $decode[$i]->Present_Address. "<br><br>";
					echo $decode[$i]->Permanent_Address. "<br><br>";
					echo $decode[$i]->Email . "<br><br>";
					echo $decode[$i]->Phone . "<br><br>";
					echo $decode[$i]->pwl . "<br><br>";
					echo $decode[$i]->Username . "<br><br>";
					echo $decode[$i]->usertype . "<br>\n";
				?>
				</fieldset>
				<br><br>
				<?php
			}

			 ?>
				
			</fieldset>
			<br>
			<a href="../views/Dashboard.php">Back</a>
			<?php include('../views/templates/footer.php'); 
	}
															?>
	</html>