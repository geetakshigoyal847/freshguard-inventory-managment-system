<?php

include "includes/db.php";

$message = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $name = mysqli_real_escape_string($conn,$_POST["name"]);
    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);


    $check = mysqli_query($conn,
    "SELECT * FROM users WHERE email='$email'");


    if(mysqli_num_rows($check)>0){

        $message = "Account already exists.";

    } else {


        $sql = "INSERT INTO users 
        (name,email,password,role,status,
        can_add_stock,
        can_edit_stock,
        can_delete_stock,
        can_view_reports,
        can_manage_staff)

        VALUES

        ('$name',
        '$email',
        '$password',
        'Staff',
        'Active',
        1,
        1,
        0,
        1,
        0)";


        if(mysqli_query($conn,$sql)){

            $message = "Account created successfully. You can login now.";

        } else {

            $message = "Error: ".mysqli_error($conn);

        }

    }

}

?>


<!DOCTYPE html>

<html>

<head>

<title>FreshGuard Signup</title>

<link rel="stylesheet" href="assets/style.css">

</head>


<body class="auth-page">


<div class="auth-card">


<h1>FreshGuard Supermarket</h1>



<?php

if($message){

echo "<p style='color:red'>$message</p>";

}

?>


<form method="POST">


<input 
type="text" 
name="name" 
placeholder="Full name"
required>


<input 
type="email" 
name="email" 
placeholder="Email address"
required>


<input 
type="password" 
name="password" 
placeholder="Password"
required>


<button>
Create Account
</button>


</form>


<br>


<a href="index.php">
Back to Login
</a>


</div>


</body>


</html>