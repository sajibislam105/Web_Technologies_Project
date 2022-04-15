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
	<fieldset>
		<legend><b>Profile Information</b></legend>	
	<?php
			$username = $_SESSION['username'];

			$servername = "localhost";
			$dbusername = "root";
			$password = "";
			$dbname = "charitable";
			
			$conn = new mysqli($servername, $dbusername, $password, $dbname);

			if ($conn->connect_error)
			{
			  die("Connection failed: " . $conn->connect_error);
			}
			else
			{
				$sql = "SELECT * FROM users_list WHERE Username='$username'";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
				  {	
				  	echo "<br>";
				  	echo "User Type:" . $row["usertype"];
				  	echo "<br><br>";
				  	echo "Username:" . $row["Username"];
				  	echo "<br><br>";
					echo "Name:" . $row["firstname"] . $row['lastname'];
					echo "<br><br>";
					echo "Gender:" . $row["Gender"];
				  	echo "<br><br>";
					echo "Date of Birth:" . $row["DOB"];
					echo "<br><br>";				 
					echo "Religion:" . $row["Religion"];
				  	echo "<br><br>";
					echo "Present Address:" . $row["Present_Address"];
					echo "<br><br>";
					echo "Permanent Address:" . $row["Permanent_Address"];
				  	echo "<br><br>";
					echo "Phone:" . $row["Phone"];
					echo "<br><br>";				 
					echo "Email:" . $row["Email"];
				  	echo "<br><br>";
					echo "Personal Website Link:" . $row["pwl"];
					echo "<br>";								
				}				
			}
		}
	?>
	</fieldset>

	<br>   
	<a href="../views/Dashboard.php">Go Back</a>
</body>
	<?php include('templates/footer.php'); }  ?>
</html>