<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<title>View Events</title>
	<?php include('templates/header.php');	
	
	$handle = fopen("../model/events.json", "r");
	$fr = fread($handle, filesize("../model/events.json"));
	$decode = json_decode($fr);
	
	if ($decode == NULL)
	{
		echo "No events found";
	}
	else
	{		
?>
	<fieldset>
		<legend><b>Events Information</b></legend>		
				
		<br>
	<?php

		for ($i=0; $i < count($decode) ; $i++)
		{ 
			echo "Event ID: <b>" . $decode[$i]->event_id . "</b><br>";
			echo "Event Name: " . $decode[$i]->ename . "<br>";			
			echo "Event Type: " . $decode[$i]->type . "<br>";
			echo "Date of Event: " . $decode[$i]->DOE . "<br>";
			echo "Short Description: " . $decode[$i]->Short_description . "<br>";
			echo "Details: " . $decode[$i]->Details . "<br><br>";
		}	
		/*echo "<br>";
		echo "Username: " . $ename;
		echo "<br><br>";*/
	}			
	
	$fc = fclose($handle)
	?>
	</fieldset>

	<br>   
	<a href="../views/Dashboard.php">Go Back</a>
</body>
	<?php include('templates/footer.php')  ?>
</html>