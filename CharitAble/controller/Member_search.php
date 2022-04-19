<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<?php include('../views/templates/half_header.php') ?>
		<br>
		<h1 style="text-align: center;">Please Login first to access this page</h1>
		<p style="text-align: center;">You do not the permission to access this page</p>
		<br>
		<a href="../views/login.php"><p style="text-align: center;">Login Page</p></a>

		<?php
		include('../views/templates/footer.php');

	}
	else
	{
		?>
<!DOCTYPE html>
<html>
	
	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	
		if ($_SERVER['REQUEST_METHOD'] == "GET")
		{		
			
			$search_member = test($_GET['q']);
				
			if (empty($search_member)) 
			{
				echo "Fill up the box properly";
				echo "<br><br>";
				?>
				<p style="color:red;"><b>Searching failed</b></p>
				<?php								
			}				
			else
			{	
			    $servername = "localhost";
				$sqlusername = "root";
				$dbpassword = "";
				$dbname = "charitable";
				
				$conn = new mysqli($servername, $sqlusername, $dbpassword, $dbname);

				
				if ($conn->connect_error)
				{
				  die("Connection failed: " . $conn->connect_error);				 	
		    		echo "Event create unsuccessful";
				}
				else
				{				
			        $sql = "SELECT * FROM users_list WHERE Username='$search_member'";
			        $result = $conn->query($sql);

				if ($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc())
				  	{					  	
				  	echo "<br><br>";
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
				else
				{
					echo "Zero result";
				}
					
					$conn->close();				
				}			
			}	
		}
		else
		{
			echo "Can not process POST REQUEST METHOD";
		}
	?>
	</fieldset>	

    <br><br>
    <a href="../views/Dashboard.php">Previous page</a> 

<?php  } ?>


</html>