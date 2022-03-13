<?php 
	session_start()
?>
<!DOCTYPE html>
<html>

	<?php include('templates/header.php')  ?>
	<title>Dashboard</title>
	<h1 align="center">Dashboard</h1>

	<fieldset>
		<legend>Operations</legend>
			
		<br><br>	
		<a href="">Verify Organization</a>
		<br><br>	
		<a href="">Manage Employees</a>
		<br><br>
		<a href="">Manage Users</a>
		<br><br>
		<a href="../views/Manage_Events.php">Manage Events</a>
		<br><br>
		<a href="">Review Finance</a>	
		<br><br>
	</fieldset>

	<?php include('templates/footer.php') ?>
</html>