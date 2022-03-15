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
			<title>View Feedbacks</title>			
			<?php include('templates/header.php'); ?>

			<h2 align="center">Feedbacks</h2>
			
	<?php 
		
		$handle = fopen("../model/feedback.json", "r");
		$fr = fread($handle, filesize("../model/feedback.json"));
		$arr1 = json_decode($fr);				

		if ($arr1 === NULL) {
			echo "<p>No Feedback given.</p>";
		}
		else
		{
			echo "<table class='center' border='1'>";
			echo "<thead>";
			echo "<tr>";			
			echo "<th><b>Username</b></th>";
			echo "<th><b>Subject</b></th>";
			echo "<th><b>Feedback</b></th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";
			for ($i = 0; $i < count($arr1); $i++) 
			{
				echo "<tr>";
				echo "<td>" . $arr1[$i]->Username . "</td>";
				echo "<td>" . $arr1[$i]->Subject . "</td>";
				echo "<td>" . $arr1[$i]->feedback . "</td>";				
				echo "</tr>";
			}
			echo "</tbody>";
			echo "</table>";

		}
			$fc = fclose($handle);
	}
	?>			
			
			<br>
			<a href="../views/Dashboard.php">Back</a>
		
	 
		
	<?php	include('../views/templates/footer.php'); ?>
	</html>