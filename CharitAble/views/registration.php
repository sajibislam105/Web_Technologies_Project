<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Form</title>

	<script src="JS/JS/javascript.js"></script>

	<h1 style="color: darkcyan;" align="center">CharitAble</h1>
	<p align="center"><b>You think, You care, You give.</b></p>
	<p align="center"><b>Charity Website</b></p>
</head>
<body>
	<h1 align="center">Registration Form</h1>	
	<form name="registration" action="../controller/RegistrationAction.php" method="POST" novalidate enctype="application/x-www-form-urlencoded" onsubmit="return validate_registration();">

	<fieldset>
		<legend style="text-align: center;">Group 1: Basic Information</legend>

		<br>
			<label for="fname">First Name</label><span style="color:red">*</span>
			<input type="text" name="firstname" id="fname" size="20" required autofocus>
			
			<br><br>

			<label for="lname">Last Name</label><span style="color:red">*</span>
			<input type="text" name="lastname" id="lname" size="20" required>

			<br><br>

			<label>Select Gender</label><span style="color:red">*</span>
			<input type="radio" name="gender" id="male" value="Male" required><label for="male">Male</label>
			<input type="radio" name="gender" id="female" value="Female"><label for="female">Female</label>
			
			<br><br>

			<label for="DOB">Date of Birth</label><span style="color:red">*</span>
			<input type="date" name="DOB" id="DOB" value="DOB" required>

			<br><br>	

			<label for="Religion">Choose your Religion &nbsp</label><span style="color:red">*</span>
			<select name="Religion" id="Religion" required>
				<option value="None"></option>
				<option value="Islam">Islam</option>
				<option value="Hindu">Hindu</option>
				<option value="Christian">Christian</option>
				<option value="Buddhist">Buddhist</option>
				<option value="Others">Others</option>
			</select>			
	</fieldset>

			<br>

	<fieldset>
		<legend style="text-align: center;">Group 2: Contact Information</legend>

			<br>
			<label for="Present_Address">Present Address</label><span style="color:red">*</span><br>
			<textarea rows="2" cols="50" name="Present_Address" id="Present_Address" placeholder="Enter your present address..." required></textarea>
			
			<br><br>

			<label for="Permanent_Address">Permanent Address </label><br>
			<textarea rows="2" cols="50"  name="Permanent_Address" id="Permanent_Address" placeholder="Enter your permanent address..."></textarea>
			
			<br><br>		

			<label for="phone">Phone:</label>
			<input type="tel" name="Phone" id="phone" placeholder="Enter your phone number...">

			<br><br>

			<label for="Email">Email</label><span style="color:red">*</span>
			<input type="Email" name="Email" id="Email" placeholder="Enter your email here..." required>

			<br><br>

			<label for="pwl">Personal Website Link </label>
			<input type="URL" name="pwl" id="pwl" placeholder="URL...">	

	</fieldset>

			<br>

	<fieldset>
			<legend style="text-align: center;"><b>Group 3: Credentials</b></legend>

			<br>
			<label for="uname">Username</label><span style="color:red">*</span>
			<input type="text" name="uname" id="uname" size="25" required>

			<br><br>

			<label for="usertype">User Type &nbsp&nbsp</label><span style="color:red">*</span>
			<select name="usertype" id="usertype" required>
				<option value="Admin">Admin</option>
				<option value="Employee">Employee</option>
				<option value="Organisation">Organisation</option>
				<option value="User">User</option>
			</select>

			<br><br>

			<label for="password">Password</label><span style="color:red">*</span>
			<input type="password" name="password" id="password" size="25" placeholder="Type your password" required>

			<br><br>

			<label for="cfpassword">Confirm Password</label><span style="color:red">*</span>
			<input type="password" name="cfpassword" id="cfpassword" size="17" placeholder="Re-type your password" required>

	</fieldset>

			<br>
			<input type="submit" name="Create" value="Create">
			<a href="">

			<br><br>
			<a href="../views/Login.php">Go back</a>

	</form>

</body>

<?php include('templates/footer.php')  ?>

</html>