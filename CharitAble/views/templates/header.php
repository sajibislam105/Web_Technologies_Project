<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
		p
		{
		 text-align: center;
		 color: black;
		}
	</style>
	<h1 style="color: tomato;" align="center">CharitAble</h1>
	<p><b>You think, You care, You give.</b></p>
	<p><b>Charity Website</b></p>

</head>
<body>
	<fieldset>

		<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>		
		<a href="../views/Dashboard.php">
			<button button type="button" style="background-color: lightpink;">Home</button>
		</a>

		<a href="../views/view_Profile.php">
			<button button type="button" style="background-color: lightpink;">View Profile</button>
		</a>

		<a href="../views/change_password.php">
			<button type="button" style="background-color: lightpink;">Change Password</button>
		</a>

		<a href="../views/logout.php">
			<button  button type="button" style="background-color: lightpink;">Log Out</button>
		</a>
		<br><br>
	</fieldset>