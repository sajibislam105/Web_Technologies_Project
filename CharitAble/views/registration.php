<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>
	<link rel="stylesheet"href="CSS/registration.CSS">
	

	<?php include('templates/half_header.php') ?>
</head>
<body>
	
	<form name="registration" action="../controller/RegistrationAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded" onsubmit="return(validate_registration());">

	<div class="box">

			<h2 align="center">Registration Form</h2>			
			<legend style="text-align: center; font-weight: bold;">Basic Information</legend>
		
			<br>
			<label for="fname">First Name</label>
			<input type="text" name="firstname" id="fname" size="20" required autofocus>
			
			<br><br>

			<label for="lname">Last Name</label>
			<input type="text" name="lastname" id="lname" size="20" required>

			<br><br>

			<label>Select Gender</label>
			<input type="radio" name="gender" id="male" value="Male" required><label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="Female"><label for="female">Female</label>
			
			<br><br>

			<label for="DOB">Date of Birth</label>
			<input type="date" name="DOB" id="DOB" value="DOB" required>

			<br><br>	

			
			<div class="Religion">
			<label for="Religion">Choose your Religion &nbsp</label>
			<select name="Religion" id="Religion" required>
				<option value="None"></option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christian">Christian</option>
				<option value="Buddhist">Buddhist</option>
				<option value="Others">Others</option>
			</select>			
			</div>
			<br><br>

	
		<legend style="text-align: center; font-weight: bold;">Contact Information</legend>
			<label for="Present_Address">Present Address</label><br>
			<textarea rows="2" cols="50" name="Present_Address" id="Present_Address" placeholder="Enter present address..." required></textarea>
			
			<br><br>

			<label for="Permanent_Address">Permanent Address </label><br>
			<textarea rows="2" cols="50"  name="Permanent_Address" id="Permanent_Address" placeholder="Enter permanent address..."></textarea>
			
			<br><br>		

			<label for="phone">Phone</label>
			<input type="tel" name="Phone" id="phone" placeholder="Enter phone number...">

			<br><br>

			<label for="Email">Email&nbsp</label>
			<input type="Email" name="Email" id="Email" placeholder="Enter email here..." required>

			<br><br>

			<label for="pwl">Personal Website Link </label>
			<input type="URL" name="pwl" id="pwl" placeholder="URL...">		
			<br><br>

	
			<legend style="text-align: center; font-weight: bold;">Credentials</legend>
			<br>
			<label for="uname">Username</label>
			<input type="text" name="uname" id="uname" size="25" required>
			<br><br>
			<label for="usertype">User Type &nbsp&nbsp</label>
			<select name="usertype" id="usertype" required>
				<option value="Admin">Admin</option>
				<option value="Employee">Employee</option>
				<option value="Organisation">Organisation</option>
				<option value="User">User</option>
			</select>			
			<br><br>

			<label for="password">Password</label>
			<input type="password" name="password" id="password" size="25" placeholder="Type your password" required>

			<br><br>

			<label for="cfpassword">Confirm Password</label>
			<input type="password" name="cfpassword" id="cfpassword" size="17" placeholder="Re-type your password" required>

			<br><br>

			<div class="submit">
				<input type="submit" name="Create" value="Create">				
			</div>

			</div>

			<br><br>
			<div class="back">
				<p><a href="../views/Login.php">Go back</a></p>
			</div>
	</form>
	<script src="JS/registration.js"></script>

</body>

<?php include('templates/footer.php')  ?>

</html>