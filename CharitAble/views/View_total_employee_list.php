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
			<fieldset>
			<legend><b>Employee Information</b></legend>							
			<br>
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

			$sql = "SELECT * FROM users_list WHERE usertype='Employee'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) 
			{
			  // output data of each row			
			  while($row = $result->fetch_assoc())
			  {
			    echo  "Username: <b>" . $row["Username"] ."</b><br><br>Name : " . $row["firstname"] ." " .$row["lastname"] . "<br><br>" . "Gender: " . $row["Gender"] . "<br><br>Date of Birth: " . $row["DOB"] . "<br><br>Religion: " . $row["Religion"] . "<br><br>Permanent Address: " . $row["Permanent_Address"] .  "<br><br>Present Address: " . $row["Present_Address"] .  "<br><br>Phone: " . $row["Phone"] . "<br><br>Email: " . $row["Email"]. "<br><br>Personal Website Link: " . $row["pwl"]. "<br><br>User Type: " . $row["usertype"];
			    ?>
			    <p>-----------------</p>
			    <?php
			  }

			}
			else 
			{
			  echo "No employee found";
			}
			$conn->close();	
		}					
		?>						
			</fieldset>
			<br>
			<a href="../views/Human_resources.php">Back</a>
			<?php include('../views/templates/footer.php'); 
	}
?>
	</html>