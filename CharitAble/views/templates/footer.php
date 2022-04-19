<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
<footer>
	<style>

		.footer
		{
			margin: 0;
			background-color: darkgrey;					
			font-family: Arial, sans-serif;
		}

		.footer_aboutus
		{
			text-align: center;
			font-weight: bold;
			color: tomato;
			padding-top: 3px;
			text-transform: capitalize;
			font-size: 24px;
			opacity: 0.9;
		}

		.footer_aboutus_details
		{
			
			text-align: center;
			margin: auto;
			padding-bottom: 25px;
			width: 50%;	
			height: auto;
			word-spacing: 2px;
			font-size: 18px;	
			font-family: Arial, sans-serif;
			color: floralwhite;
		}

		.copyright
		{			
			background-color: black;
			color: floralwhite;
			font-weight: bold;
			text-align: center;
			height: auto;
			word-spacing: 2px;
			font-size: 16px;
			padding: 1px 1px;
			
		}

	</style>

		<div class="footer">

			<div class="footer_aboutus">
				<p>About us</p>
			</div>

			<div>
				<p class="footer_aboutus_details">CharitAble connects nonprofit donors and underprivileged. We work as a non-profit organizations and also help other non-profit organizations so that they can serve their own communities. This way we can reach more people all over the world.</p>
			</div>		

			<div class="copyright">
				<h4>Copyright © 2022 - <?php echo  date("M") . " " . date("Y"); ?> by CharitAble</h4>
			</div>

		</div>
		
</footer>
</body>
</html>