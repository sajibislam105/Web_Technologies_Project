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
			$user_s_username = test($_POST["user's_username"]);

			if (empty($user_s_username) || $user_s_username == NULL ) 
			{
				echo "<br>Fill up the form properly";
				echo "<br>";
				?>
				<p style="color:red;"><b>No User Found</b></p>
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
					$sql = "DELETE FROM users_list WHERE Username='$user_s_username' AND usertype='User'";
					if ($conn->query($sql) === TRUE) 
					{									
						header('Location: ../views/View_total_employee_list.php');
					}
					else 
					{
						echo '<h4 style="color: red;" >' . $user_s_username . ' not found </h4>';
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
    <a href="../views/Manage_users.php">Previous page</a> 

<?php include('../views./templates/footer.php'); } ?>


</html>