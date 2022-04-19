<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<?php include('../views/templates/half_header.php') ?>
		<br>
		<h1 style="text-align:center;">Please Login first to access this page</h1>
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
<?php include('../views/templates/half_header.php')  ?>

<h1 style="text-align: center;">Manage Events Action</h1>	
	
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
			$ename = test($_POST['ename']);		
			$e_id = test($_POST['e_id']);
			$type = test($_POST['type']);
			
				
			if (empty($ename) || $ename == NULL || empty($e_id) || $e_id == NULL || !isset($type)) 
			{
				echo "<br>Fill up the form properly";
				echo "<br>";
				?>
				<p style="color:red;"><b>No Event Found</b></p>
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
					$sql = "DELETE FROM events WHERE event_id='$e_id'";

					if ($conn->query($sql) === TRUE) {
					echo "Record deleted successfully";					
					header('Location: ../views/View_events.php');
					}
					else 
					{
					  echo "Error deleting record: " . $conn->error;
					  echo '<h4 style="color: red;" >' . $ename . ' not found </h4>';
					  echo "<br>Please insert the correct information";
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