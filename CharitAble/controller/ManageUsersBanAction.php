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
		include('../views/templates/footer.php');

	}
	else
	{
		?>
<!DOCTYPE html>
<html>
<?php include('../views/templates/header.php');  ?>

<h1 style="color: blueviolet;">Fire Employees Action</h1>	
	
	<?php 

		function test($data)	
		{
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		if ($_SERVER['REQUEST_METHOD'] === "POST")
		{			
			$user_s_username = test($_POST["user's_username"]);		
			
				
			if (empty($user_s_username) || $user_s_username == NULL ) 
			{
				echo "<br>Fill up the form properly";
				echo "<br>";
				?>
				<p style="color:red;"><b>No User Found</b></p>
				<?php								
			}				
			else
			{	
				$handle = fopen("../model/users_list.json", "r");
				$fr = fread($handle, filesize("../model/users_list.json"));
				$arr1 = json_decode($fr);

				$flag = false;
				for ($i=0; $i < count($arr1) ; $i++) 
				{ 
					if(($user_s_username == $arr1[$i]->Username) && ($arr1[$i]->usertype == "User"))
					{
							$flag = true;
							
							break;
					}
					else
					{
						$flag = false;						
					}
				}

				if ($flag == true) 
				{	
					$arr2 = array();
					for ($i=0; $i < count($arr1); $i++)
					{ 
						if ($user_s_username != $arr1[$i]->Username)
						{
							array_push($arr2, $arr1[$i]);
						}
					}
					$fc =fclose($handle);

					$handle = fopen("../model/users_list.json", "w");					

					$data = json_encode($arr2);
					$fw = fwrite($handle, $data);
					$fc = fclose($handle);
					//echo '<h4>Employee Username:  ' . $employee_name . ' Deleted</h4>';
					header('Location: ../views/View_total_employee_list.php');
				}
				else
				{
					echo '<h4 style="color: red;" >' . $employee_name . ' not found </h4>';
					echo "<br>Please insert the correct username";
				}
			}
		}
		else
		{
			echo "Can not process GET REQUEST METHOD";
		}

	 ?>

    <br><br>
    <a href="../views/Manage_users.php">Previous page</a> 

<?php include('../views./templates/footer.php'); } ?>


</html>