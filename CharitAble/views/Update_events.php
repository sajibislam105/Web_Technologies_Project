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
		include('templates/footer.php');

	}
	else
	{
		?>
			<!DOCTYPE html>
			<html>
				<?php include('templates/header.php')  ?>
				<title>Update Event</title>
				
				<br><br>
				<h1 align="center">Events Form</h1>	
				<form action="../controller/ManageEventsUpdateAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded">

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


			<?php include('templates/footer.php'); } ?>
			</html>