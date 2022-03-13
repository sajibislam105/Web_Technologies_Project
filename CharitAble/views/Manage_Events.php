<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<title>Manage Events</title>
<?php include("templates/header.php") ?>

	<br>
	<fieldset>
		<legend>CRUD Operation</legend>
			<br><br>
			<a href="../views/View_events.php">View Event</a>
			<br><br>
			<a href="../views/Create_events.php">Create Event</a>		
			<br><br>
			<a href="../views/Update_events.php">Update Event</a>
			<br><br>
			<a href="../views/Delete_events.php">Delete Event</a>
			<br><br>		
	</fieldset>

	<br>
	<a href="../views/Dashboard.php"><b style="color: blue;">Back</b></a>
	<br><br>

<?php include("templates/footer.php") ?>
</html>