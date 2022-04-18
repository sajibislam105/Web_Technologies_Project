<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="CSS/header.CSS">	

</head>
<body>
		<div class="header">
			<div class="website_name">
				<h1>CharitAble</h1>
			</div>
			<div class="website_name_details">
				<p>You think, You care, You give.</p>
			</div>
			<div class="welcome_name">
				<h1>Welcome, <?php echo $_SESSION['username']; ?></h1>
			</div>
			<div class="header-right">	
			<a href="../views/Dashboard.php">Home</a>
			<a href="../views/view_Profile.php">View Profile</a>
			<a href="../views/change_password.php">Change Password</a>
			<a href="../views/logout.php">Log Out</a>
			</div>
		</div>