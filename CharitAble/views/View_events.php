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
				$sql = "SELECT * FROM events";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{

			?>
				<fieldset>
				<legend><b>Events Information</b></legend>							
				<br>
		<?php
				  while($row = $result->fetch_assoc())
				  {
				    echo "<b>Event id: " . $row["event_id"]. "</b><br><br>" . "Event Name: " . $row["ename"]. "<br><br>Event Type: " . $row["type"]. "<br><br>Date of Event: " . $row["DOE"]. "<br><br>Short Description: " . $row["Short_description"]. "<br><br>Details: " . $row["Details"] . "<br><br>";
				  }
				}
				else 
				{
				  echo "No event found";
				}
				$conn->close();	
			}
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