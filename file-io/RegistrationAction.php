<?php

if(isset($_POST["submit"])){

    if(empty($_POST["firstname"])){
        echo "First Name is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["lastname"])){
        echo "Last Name is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["mf"])){
        echo "Gender is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["dob"])){
        echo "DOB is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["religion"])){
        echo "Religion is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["Pres_Add"])){
        echo "Present Address is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["Perm_Add"])){
        echo "Permanent Address is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["Phone"])){
        echo "Phone Number is required <br>";
    }else{
        echo "";
    }
    if(empty($_POST["Email"])){
        echo "Email is required <br>";
    }else{
        echo "";
    }

    if(empty($_POST["username"])){
        echo "Username is required  <br>";
    }else{
        if(strlen($_POST["username"])>5){
            echo "Username cannot be more than 5 characters  <br>";
        }else{
            echo "";
        }
    }
    if(empty($_POST["password"])){
        echo "Password is required  <br>";
    }else{
        echo "";
    }
    if(empty($_POST["confirm"])){
        echo "Confirm Password Cannot be Empty  <br>";
    }else{
        if($_POST["password"]!==$_POST["confirm"]){
            echo "Both Passwords does not match  <br>";
        }else{
            echo "";
        }
    }

    if (file_exists("users.json")) {
        $current_content = file_get_contents("users.json");
        $array_content = json_decode($current_content, true);
        $new_content = array(
            'Name' => strval($_POST["firstname"])." ".strval($_POST["lastname"]),
            'Email' => $_POST["Email"],
            'Username' => $_POST["username"],
            'Password' => $_POST["password"],
            'Gender' => $_POST["mf"],
            'DOB' => $_POST["dob"],
            'Religion' => $_POST["religion"],
            'Present_Address'=> $_POST["Pres_Add"],
            'Permanent_Address'=> $_POST["Perm_Add"],
            'Phone' => $_POST["Phone"]
        );
        $array_content[] = $new_content;
        $final_content = json_encode($array_content, JSON_UNESCAPED_SLASHES);
        if (file_put_contents("users.json", $final_content)) {
            echo "Registration Completed!";
        }
    } else {
        echo "JSon File Does not Exist";
    }

}

?>