<?php

require "config.php";


if($_SERVER["REQUEST_METHOD"] == "POST"){


    $email = trim($_POST['email']);
    $password = $_POST['password'];



    // Find user by email

    $query = $conn->prepare(
        "SELECT * FROM users WHERE email = ?"
    );


    $query->execute([$email]);



    if($query->rowCount() == 1){


        $user = $query->fetch(PDO::FETCH_ASSOC);



        // Verify password

        if(password_verify(
            $password,
            $user['password']
        )){


            session_regenerate_id(true);


            $_SESSION['user_id'] = $user['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $user['email'];



            header("Location: dashboard.php");
            exit();



        }else{


            echo "Incorrect password.";

        }



    }else{


        echo "Email not found.";

    }



}else{


    echo "Invalid request.";

}

?>