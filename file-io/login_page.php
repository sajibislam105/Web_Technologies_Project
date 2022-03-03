<?php
session_start();
        if(isset($_POST['login'])){
            $user=$_POST["username"];
            $password=$_POST["password"];
            $isFound=false;
            $_SESSION['Username']=$user;         
            if($user!="" && $password!=""){
                $data_s = file_get_contents("users.json");  
                $data_s = json_decode($data_s, true); 
                    foreach($data_s as $row){
                        if($row["Username"]==$user && $row["Password"]==$password){
                        $isFound=true;

                        break;
                        }
                    }
                }
        
                if($isFound){
                     header("location:dashboard.php");
                }else{
                     echo "Wrong Username or Password";
                }
        }
       
?>

<!DOCTYPE html>
<html>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="../css/login_styles.css">
    <body>
        <div class="center">
            <h1>Log into the system</h1>
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="text-field">
            <label>Username</label>
                <input type="text" id="username" name="username" >
            </div>
            <div class="text-field">
                <label>Password</label>
            <input type="text" id="password" name="password">
            </div>
            <div>
                <input type="checkbox" id="remember" name="remember"> Remember Password
            </div><br><br>
            <a href="forgot_password.php" style="text-decoration: none;"><div class="pass">Forgot Password?</div></a>
            <input type="submit" name="login" value="Login">
            <div class="sign-up">Not a Member Yet? <a href="registration_form.php">Sign Up</a></div>
      </form>
      </div>
    </body>
</html>