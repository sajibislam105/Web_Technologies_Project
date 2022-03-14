<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
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
				$handle = fopen("../model/events.json", "r");
				$fr = fread($handle, filesize("../model/events.json"));
				$arr1 = json_decode($fr);

				$flag = false;
				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($ename == $arr1[$i]->ename) && ($e_id == $arr1[$i]->event_id) &&($type == $arr1[$i]->type))
					{
							$flag = true;
							
							break;
					}
					else
					{
						$flag = false;						
					}
				}

				if ($flag === true) 
				{	
					$arr2 = array();
					for ($i=0; $i < count($arr1); $i++)
					{ 
						if ($e_id != $arr1[$i]->event_id)
						{
							array_push($arr2, $arr1[$i]);
						}
					}
					$fc =fclose($handle);

					$handle = fopen("../model/events.json", "w");					

					$data = json_encode($arr2);
					$fw = fwrite($handle, $data);
					$fc = fclose($handle);
					echo '<h4>Event Name:  ' . $ename . ' Deleted</h4>';
					header('Location: ../views/View_events.php');
				}
				else
				{
					echo '<h4 style="color: red;" >' . $ename . ' not found </h4>';
					echo "<br>Please insert the correct information";
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