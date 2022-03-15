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
			<title>Employee List</title>			
			<?php include('templates/header.php'); ?>
			<h2 align="center">Employee List</h2>
			<br>
			
			<?php 
			
			$handle = fopen("../model/users_list.json", "r");
			$fr = fread($handle, filesize("../model/users_list.json"));
			$decode = json_decode($fr);
			$fc = fclose($handle);		
			
	?>
			<fieldset>
	<?php
			
			$countemployee = 0;
			for ($i=0; $i < count($decode) ; $i++) 
			{ 
				?>
				
				<?php
				
				if ($decode[$i]->usertype === "Employee") 
				{	
					$countemployee = $countemployee + 1;
					echo "Username: ".$decode[$i]->Username . "<br><br>";			
					echo "Name: ".  $decode[$i]->firstname ." ". $decode[$i]->lastname ."<br><br>";			
					echo "Gender: ". $decode[$i]->Gender. "<br><br>";				
					echo "Date of Birth: ". $decode[$i]->DOB. "<br><br>";
					echo "Religion: ". $decode[$i]->Religion. "<br><br>";
					echo "Present Address: ". $decode[$i]->Present_Address. "<br><br>";
					echo "Permanent Address: " . $decode[$i]->Permanent_Address. "<br><br>";
					echo "Email: " . $decode[$i]->Email . "<br><br>";
					echo "Phone: ".$decode[$i]->Phone . "<br><br>";
					echo "Personal website: ".$decode[$i]->pwl . "<br>\n";			
					?>
					<p>-------------------------------------------------------------</p>
					<?php 			
					
				}
			}
			echo "Total Employees: " . $countemployee;
				?>				
			</fieldset>
			<br>
			<a href="../views/Human_resources.php">Back</a>
			<?php include('../views/templates/footer.php'); 
	}
?>
	</html>