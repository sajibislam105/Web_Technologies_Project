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
			background-color: grey;
			color: white;		

		}

		.footer_aboutus
		{
			text-align: center;
			font-weight: bold;
			color: lightgreen;
			padding-top: 1px;	
			text-transform: capitalize;
			font-size: 24px;
		}

		.footer_aboutus_details
		{
			
			text-align: center;
			margin: auto;
			width: 25%;	
			height: auto;
			word-spacing: 2px;
			font-size: 18px;		
		}

		.copyright
		{			
			background-color: black;
			color: white;
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
				<p style="color: lightgreen;">About us</p>
			</div>

			<div>
				<p class="footer_aboutus_details">CharitAble connects nonprofit donors and underprivileged. We word as a non-profit organizations and also help other non-profit organizations so that they can serve their own communities. This way we can reach more people all over the world.</p>
			</div>		

			<div class="copyright">
				<h4>Copyright © 2022 - <?php echo  date("M") . " " . date("Y"); ?> by CharitAble</h4>
			</div>

		</div>
		
</footer>
</body>