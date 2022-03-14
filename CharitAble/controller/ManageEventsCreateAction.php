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
				$handle = fopen("../model/events.json", "r");
		        $fr = fread($handle, filesize("../model/events.json"));
		        $decode = json_decode($fr);
		        $array_count = count($decode);
		        fclose($handle);

		        $handle = fopen("../model/events.json", "w");     


		        if ($decode === NULL)  // checking if the file is empty or not
		        {            
		            $event = array(array("event_id"=> $array_count + 1 ,"ename" => $ename,"type" => $_POST['type'], "DOE" => $DOE, "Short_description" => $Sdescription, "Details" => $Details));
		            $event = json_encode($event);
		            fwrite($handle, $event);
		        }
		        else
		        {
		            $decode[] = array("event_id"=> $array_count + 1 ,"ename" => $ename,"type" => $_POST['type'], "DOE" => $DOE, "Short_description" => $Sdescription, "Details" => $Details);
		            $event = json_encode($decode);
		            fwrite($handle, $event);
		        }

		        fclose($handle); 
				echo "Event Successfully Created";
				header("Location: ../views/Manage_events.php");
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