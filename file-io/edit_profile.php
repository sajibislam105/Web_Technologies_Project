<?php

    session_start();
    $isFound=false;
    $name=$dob=$gender=$email="";
    $error_m="";
    $conf="";
    $isUpdated=false;
    $slash="";
    $F_Name="";

    if(isset($_SESSION['Username'])){
        $sname=$_SESSION['Username'];

        $data = file_get_contents("users.json");  
        $data = json_decode($data, true); 
        foreach($data as $key=>$value){
            if($value['Username']==$sname){
            $Name=$value['Name'];
            $Email=$value['Email'];
            $Pres_Add=$value['Present_Address'];
            $Perm_Add=$value['Permanent_Address']; 
            $Phone=$value['Phone'];
            $isFound=true;
            break;
            }
        }
        if($isFound){
             $ConfirmMessage="";
        }else{
             $ErrorMessage="Wrong Username or Password";
        }
    }
        if(isset($_POST["submit"])){
        $name=$_POST["name"];
        $email=$_POST["email"];
        $pres_add=$_POST["Pres_Add"];
        $perm_add=$_POST["Perm_Add"];
        $phone=$_POST["Phone"];


        if($name!="" && $email!="" && $perm_add!="" && $pres_add!="" && $phone!=""){

            $data=file_get_contents("users.json");
            $data=json_decode($data,true);
            if(!empty($data)){

                foreach($data as $key=>$row){

                    if($row["Username"]==$_SESSION["Username"]){
                        $data[$key]['Name']=$_POST["name"];
                        $data[$key]['Email']=$_POST["email"];
                        $data[$key]['Present_Address']=$_POST["Pres_Add"];
                        $data[$key]['Permanent_Address']=$_POST["Perm_Add"];
                        $data[$key]['Phone']=$_POST["Phone"];
                        file_put_contents('users.json',json_encode($data));
                        $isUpdated=true;
                        break;

                    }

                }
            }

                if($isUpdated){
                    $conf = "Data Updated";
                    $sname=$_SESSION['Username'];

                    $data = file_get_contents("users.json");  
                    $data = json_decode($data, true); 
                    foreach($data as $key=>$value){
                        if($value['Username']==$sname){
                        $Name=$value['Name'];
                        $Email=$value['Email'];
                        $Pres_Add=$value['Present_Address'];
                        $Perm_Add=$value['Permanent_Address']; 
                        $Phone=$value['Phone'];
                        $isFound=true;
                        break;
                        }
                    }
                    if($isFound){
                         $ConfirmMessage="";
                    }else{
                         $ErrorMessage="Wrong Username or Password";
                    }
                }

            

           
        }    
    
    }


?>


<html>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard_styles.css">
    <body>
    <br><br>
    <div class="sign-up" style="font-family: Arial;">
    <br>
    <a href="login_page.php" target="_self" class="links">Log out</a>
    </div>
    <div>
    <table>
        <thead>
            <th style="color: black;">Account<hr></th>
            <th> </th>
        </thead>
        <tr>
        <td style="color: black;  font-family:Century Gothic">
            <ul style="list-style-type:none">
                <ii><a href="dashboard.php" style="text-decoration: none; color:royalblue; list-style-type:none">Dashboard</a></ii>
                <li><a href="edit_profile.php" style="text-decoration: none; color:royalblue; list-style-type:none">Edit Profile</a></li>
                <li><a href="change_pass.php" style="text-decoration: none; color:royalblue; list-style-type:none">Change Password</a></li>
                <li><a href="logout.php" style="text-decoration: none; color:royalblue; list-style-type:none">Log out</a></li>
            </ul>
        </td>
        <td>
        <fieldset style="font-family: Arial, Helvetica, sans-serif; margin:50px;">
     <legend style="color: royalblue; font-family:Arial, Helvetica, sans-serif"> MY PROFILE </legend>
     <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
         <label style="color: black;">Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> &nbsp; :
         <input type="text" id="text" name="name" value="<?php
         echo htmlspecialchars($Name);
         ?>"><br><br><hr>
         <label style="color: black;">Email&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label> &nbsp; : 
         <input type="text" id="email" name="email" value="<?php 
         echo $Email;
         ?>"><br><br><hr>
         <label for="Present Address">Present Address:</label> 
		<input type="textarea" name="Pres_Add" value="<?php echo $Pres_Add; ?>"><br><br>
	<label for="Permanent Address">Permanent Address:</label> 
	<input type="text" name="Perm_Add" value="<?php echo $Perm_Add; ?>"><br><br>
    Phone:<input type="telephone" name="Phone" value="<?php echo $Phone; ?>"><br><br>
        <hr>
        <input type="submit" name="submit" value="Edit Profile" class="button"><br><br>
        <span style="color:red"><?php
        if($error_m!=""){
            echo $error_m;
        }
        else{
            echo $conf;
        }
        ?>
        </span>

     </form>
    </fieldset>  
        </td>
        </tr>
    </table> 
    </div><br><br>

    </body>
</html>