<?php

    session_start();
    $isFound=false;

    if(isset($_SESSION['Username'])){
        $data = file_get_contents("users.json");  
        $data = json_decode($data, true); 
        foreach($data as $key=>$value){
            if($value['Username']==$_SESSION["Username"]){
            $Name=$value['Name'];
            $isFound=true;
            break;
            }
        }
        if($isFound){
             $ConfirmMessage="";
        }else{
             $ErrorMessage="Wrong Username or Password";
        }

    }else{
        header("location:login_page.php");
    }
?>



<html>
    <title>Dashboard</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard_styles.css">
    <body>
    <br><br>
    <div class="sign-up" style="font-family: Arial;">
    <br>
    <a href="logout.php" target="_self" class="links">Log out</a>
    </div>
    <div>
    <table>
        <thead style="color: black;">
            <th style="color: black;">Account<hr></th>
            <th> </th>
        </thead>
        <tr>
        <td style="color: black; font-family:Century Gothic">
            <ul style="list-style-type:none">
                <ii><a href="dashboard.php" style="text-decoration: none; color:royalblue; list-style-type:none">Dashboard</a></ii>
                <li><a href="edit_profile.php" style="text-decoration: none; color:royalblue; list-style-type:none">Edit Profile</a></li>
                <li><a href="change_pass.php" style="text-decoration: none; color:royalblue; list-style-type:none">Change Password</a></li>
                <li><a href="logout.php" style="text-decoration: none; color:royalblue; list-style-type:none">Log out</a></li>
            </ul>
        </td>
        <td style="color: black; font-family:Californian FB; font-size:30px">
            &nbsp; &nbsp;
            <?php
                echo " <b>   Welcome , ".$Name."<b>";
            ?>
        </td>
        </tr>
    </table> 
    </div><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

    </body>
</html>