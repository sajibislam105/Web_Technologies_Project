<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
		<p align="center"><b>You think, You care, You give.</b></p>
		<p align="center"><b>Fundraising Website</b></p>
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
<?php include('../views/templates/header.php');  ?>

<h1 style="color: blueviolet;">Fire Employees Action</h1>	
	
	<?php 

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{			
			$employee_name = test($_POST['employee_name']);		
			
				
			if (empty($employee_name) || $employee_name == NULL ) 
			{
				echo "<br>Fill up the form properly";
				echo "<br>";
				?>
				<p style="color:red;"><b>No Employee Found</b></p>
				<?php								
			}				
			else
			{	
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
					$sql = "DELETE FROM users_list WHERE Username='$employee_name'";
					if ($conn->query($sql) === TRUE) 
					{									
						header('Location: ../views/View_total_employee_list.php');
					}
					else 
					{
						echo '<h4 style="color: red;" >' . $employee_name . ' not found </h4>';
						echo "<br>Please insert the correct username";
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

    <br><br>
    <a href="../views/Manage_events.php">Previous page</a> 

<?php include('../views./templates/footer.php'); } ?>


</html>