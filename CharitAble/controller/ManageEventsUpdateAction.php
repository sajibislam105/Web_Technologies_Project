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
				
			if (empty($ename) || !isset($_POST['DOE']) || !isset($_POST['type']) || !isset($_POST['DOE']) || empty($Sdescription) || empty($Details)) 
			{
				echo "Fill up the form properly";
				echo "<br><br>";
				?>
				<p style="color:red;"><b>Event creation Failed</b></p>
				<?php								
			}				
			else
			{	
				echo "Event Successfully Updated";
				header("Location: ../views/Manage_events.php");
			}			
		}	
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}
	?>
	</fieldset>
	<br>	
	<?php 	

	if ($_SERVER['REQUEST_METHOD'] === "POST")
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
	    		echo "Event Update failed";
			}
			else
			{	
				
		        $sql = "UPDATE events SET ename='$ename', type='$type', DOE='$DOE', Short_description='$Sdescription', Details='$Details' WHERE ename='$ename'";
		      
				if ($conn->query($sql) === TRUE)
				{
		        	echo "Event Updated Successfully";
		        	header("Location: ../views/Manage_events.php");
				}
				else
				{
						echo "Error: " . $sql . "<br>" . $conn->error;
				}
				$conn->close();
			}		          
	}		
	else
	{
		echo "Can not process GET REQUEST";
	}		        
?>
    <br><br>
    <a href="../views/Manage_events.php">Previous page</a> 

	<?php include('../views./templates/footer.php'); } ?>
</html>