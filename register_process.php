<?php

require "config.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    $firstname = trim($_POST['firstname']);
    $lastname  = trim($_POST['lastname']);
    $email     = trim($_POST['email']);
    $password  = $_POST['password'];



    // Check if email already exists

    $check = $conn->prepare(
        "SELECT id FROM users WHERE email = ?"
    );


    $check->execute([$email]);


    if($check->rowCount() > 0){

        echo "Email already registered.";

        exit();

    }

    // Encrypt password

    $hashed_password = password_hash(
        $password,
        PASSWORD_DEFAULT
    );

    // Insert user

    $insert = $conn->prepare(
        "INSERT INTO users
        (firstname, lastname, email, password)
        VALUES (?, ?, ?, ?)"
    );


    if($insert->execute([
        $firstname,
        $lastname,
        $email,
        $hashed_password
    ])){


        header("Location: signin.html");
        exit();


    }else{


        echo "Registration failed.";

    }


}else{


    echo "Invalid request.";

}

?>