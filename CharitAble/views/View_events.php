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
			<title>View Events</title>
		<?php include('templates/header.php');	?>
		<h2 align="center">View Events</h2>

		<?php
			
			$handle = fopen("../model/events.json", "r");
			$fr = fread($handle, filesize("../model/events.json"));
			$decode = json_decode($fr);
			
			if ($decode == NULL)
			{
				echo "No events found";
			}
			else
			{		
		?>
			<fieldset>
				<legend><b>Events Information</b></legend>		
						
				<br>
		<?php

			for ($i=0; $i < count($decode) ; $i++)
			{ 
				echo "Event ID: <b>" . $decode[$i]->event_id . "</b><br>";
				echo "Event Name: " . $decode[$i]->ename . "<br>";			
				echo "Event Type: " . $decode[$i]->type . "<br>";
				echo "Date of Event: " . $decode[$i]->DOE . "<br><br>";
				echo "Short Description: " . $decode[$i]->Short_description . "<br><br>";
				echo "Details: " . $decode[$i]->Details . "<br><br>";
			}

		}

			$fc = fclose($handle)

		?>
			</fieldset>

			<br>   
			<a href="../views/Manage_events.php">Go Back</a>
		</body>
	<?php 

		include('templates/footer.php');
	
	}

?>
</html>