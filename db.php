<?php
include "config.php";

$message = "";

if(isset($_POST['register'])){

    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = $conn->prepare("SELECT * FROM users WHERE email=? OR username=?");
    $check->execute([$email, $username]);

    if($check->rowCount() > 0){

        $message = "Email or Username already exists.";

    }else{

        $sql = $conn->prepare("INSERT INTO users(fullname,email,username,password)
                               VALUES(?,?,?,?)");

        if($sql->execute([$fullname,$email,$username,$password])){
            $message = "Registration Successful!";
        }else{
            $message = "Registration Failed!";
        }
    }
}
?>