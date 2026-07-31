<?php

require "config.php";


if(!isset($_SESSION['user_id'])){

    header("Location: signin.html");

    exit();

}

?>


<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>

<body>


<h2>
Welcome 
<?php 
echo $_SESSION['firstname'] . " " . $_SESSION['lastname'];
?>
</h2>


<p>
Email:
<?php echo $_SESSION['email']; ?>
</p>


<a href="logout.php">Logout</a>


</body>
</html>