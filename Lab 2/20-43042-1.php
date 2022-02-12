<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Result</title>
</head>
<body>
	<h1>Result</h1>
	<?php 

		if ($_SERVER["REQUEST_METHOD"] === "POST") 
		{				
			$value = $_POST["number"];

			for ($i=1; $i <= 10 ; $i++) 
			{ 
			 	echo "$value * $i = ".$value * $i . "<br><br>";
			 } 
		}
	?>	
	<a href="Input form.php">Go Back</a>
</body>
</html>