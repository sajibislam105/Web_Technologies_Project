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

<h1 style="color: blueviolet;">Verify Organization Action</h1>	
	
	<?php

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}		
	?>
		
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
		$ename = test($_POST['ename']);		
		$DOE = test($_POST['DOE']);
		$Sdescription = test($_POST['Short_description']);
		$Details = test($_POST['Details']);
		if (empty($ename) || !isset($_POST['DOE']) || !isset($_POST['type']) || !isset($_POST['DOE']) || empty($Sdescription) || empty($Details))
		{
			echo "Fill up the form properly";			
			?>
			<br>
			<p style="color:red;"><b>Not Updated</b></p>
			<?php				
		}
		else
		{	
	        $handle = fopen("../model/events.json", "r");
	        $fr = fread($handle, filesize("../model/events.json"));
	        $arr1 = json_decode($fr);
	        $array_count = count($arr1);
	        fclose($handle);

	        $handle = fopen("../model/events.json", "w");     

	        for ($i=0; $i < count($arr1); $i++) 
       		{
	        	if ($ename == $arr1[$i]->ename) 
	        	{
	        		$arr1[$i]->Ename = $ename;
	        		$arr1[$i]->type = $_POST['type'];
	        		$arr1[$i]->DOE = $DOE;
	        		$arr1[$i]->Short_description = $Sdescription;
	        		$arr1[$i]->Details = $Details;
	        	}		        	
       		}
       		$data = json_encode($arr1);
        	$fw = fwrite($handle, $data);
        	$fc = fclose($handle);		           
		}
	}		        
?>

    <br><br>
    <a href="../views/Manage_events.php">Previous page</a> 

<?php include('../views./templates/footer.php'); } ?>


</html>