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
<?php include('../views/templates/header.php')  ?>

<h1 style="color: blueviolet;">Manage Events Action</h1>	
	
	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	?>
	<fieldset>
		<legend>Group 1: Basic Information</legend>		
	<?php 

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{		
				
			$ename = test($_POST['ename']);		
			$DOE = test($_POST['DOE']);
			$Sdescription = test($_POST['Short_description']);
			$Details = test($_POST['Details']);
			$type = test($_POST['type']);
				
			if ( (empty($ename) || $ename == NULL ) || ( !isset($_POST['DOE']) || $DOE == NULL ) ||( !isset($_POST['type']) || $_POST['type'] == NULL )|| ( !isset($_POST['DOE']) || $DOE == NULL )|| ( empty($Sdescription) || $Sdescription == NULL )|| ( empty($Details) || $Details == NULL )) 
			{
				echo "Fill up the form properly";
				echo "<br><br>";
				?>
				<p style="color:red;"><b>Event creation Failed</b></p>
				<?php								
			}				
			else
			{	
			    $servername = "localhost";
				$sqlusername = "root";
				$password = "";
				$dbname = "charitable";
				
				$conn = new mysqli($servername, $sqlusername, $password, $dbname);

				
				if ($conn->connect_error)
				{
				  die("Connection failed: " . $conn->connect_error);
				 	echo "<br>";
		    		echo "Event create unsuccessful";
				}
				else
				{				
			        $sql = "INSERT INTO events (ename, type, DOE, Short_description, Details) VALUES ('$ename', '$type', '$DOE', '$Sdescription', '$Details')";

					if ($conn->query($sql) === TRUE)
					{
			        	echo "Event Created Successfully";
			        	header("Location: ../views/Manage_events.php");
					}
					else
					{
							echo "Error: " . $sql . "<br>" . $conn->error;
					}

					$conn->close();				
				}			
			}	
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
	</fieldset>	

    <br><br>
    <a href="../views/Create_events.php">Previous page</a> 

<?php include('../views/templates/footer.php'); } ?>


</html>