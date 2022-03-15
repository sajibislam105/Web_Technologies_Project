<?php 

	session_start();	
	if (!isset($_SESSION['username']) )
	{
		?>
		<title>Access Denied</title>
		<h1 style="color: darkcyan;" align="center">CharitAble</h1>
		<p align="center"><b>You think, You care, You give.</b></p>
		<p align="center"><b>Charity Website</b></p>
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
		<title>Verify Organizations</title>
		<?php include('templates/header.php');  ?>
		<h2 align="center">Verify Organizations</h2>
		<fieldset>
	<?php 

	$handle = fopen("../model/verify_organization_list.json", "r");
	$fr = fread($handle, filesize("../model/verify_organization_list.json"));
	$decode = json_decode($fr);
	
	for ($i=0; $i < count($decode) ; $i++)
	{	
		$o_nmame = $decode[$i]->organization_name;
		$o_type = $decode[$i]->type;
		$service_license = $decode[$i]->Department_of_social_service_license;
		$v_status = $decode[$i]->Verification_status;
	
	}
	$fc = fclose($handle);
	 ?>
	<?php
	for ($i=0; $i < count($decode) ; $i++)
	{
		echo "<br>";
		echo "Organization Name: " . $o_nmame;
		echo "<br><br>";			
		echo "Organization Type: " . $o_type;
		echo "<br><br>";				 
		echo "Department of Social Service License(DSS): " . $service_license;
		echo "<br><br>";		
		?>
	<?php
		echo "Verification status: <p style='color: red;'>" . $v_status . "</p>";		
		
		
		
  		}

	?>
	
	</fieldset>

	<?php include('templates/footer.php');}  ?>
</html>