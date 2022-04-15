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
			<title>View Feedbacks</title>			
			<?php include('templates/header.php'); ?>
			<h2 align="center">Feedbacks</h2>			
	<?php 
		
		$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "charitable";			
			$conn = new mysqli($servername, $username, $password, $dbname);
			if ($conn->connect_error)
			{
			  die("Connection failed: " . $conn->connect_error);
			}
			else
			{
				$sql = "SELECT * FROM feedback";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{		
					$count = 0;							  
					while($row = $result->fetch_assoc())
					{
						$count++;
						echo "Serial: " . $count . "<br><br>" ;
					    echo "Username: " . $row["Username"]. "<br><br>" . "Subject: " . $row["Subject"]. "<br><br>Feedback: " . $row["feedback"] . "<br><br>";
					    echo "<br>               <br>";
					}
				}
				else 
				{
				  echo "No event found";
				}
				$conn->close();	
			}
	}
	?>			
			
			<br>
			<a href="../views/Dashboard.php">Back</a>
		
	 
		
	<?php	include('../views/templates/footer.php'); ?>
	</html>