<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
	<?php include('templates/header.php')  ?>
	<title>Create Event</title>
	
	<br><br>
	<h1 align="center">Events Form</h1>	
	<form action="../controller/ManageEventsAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded">

	<fieldset>		
		<br>
			<label for="ename">Event Name:</label>
			<br>
			<input type="text" name="ename" id="ename" size="50" required autofocus>

			<br><br>
			<label>Select Type</label>
			<input type="radio" name="type" id="Individual" value="Individual" required><label for="Individual">Individual</label>
			<input type="radio" name="type" id="Organization" value="Organization"><label for="Organization">Organization</label>
			
			<br><br>

			<label for="DOE">Date of Event</label><span style="color:red">*</span>
			<input type="date" name="DOE" id="DOE" value="DOE" required>

			<br><br>
			<label for="Short_description">Short Description</label>
			<br>
			<textarea rows="3" cols="50" name="Short description" id="Short_description" placeholder="Write summary of the event..." required></textarea>
			
			<br><br>

			<label for="Details">Details</label>
			<br>
			<textarea rows="3" cols="51"  name="Details" id="Details" placeholder="Write brief about the event..."></textarea>	
			<br>
	</fieldset>

			<br>
			<input type="submit" name="submit" value="Submit">
			<a href="">

			<br><br>
			<a href="../views/Manage_Events.php">Go back</a>

	</form>


<?php include('templates/footer.php') ?>
</html>