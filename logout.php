<?php
session_start(); 

include "includes/db.php"; 

$error = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){

    $email = mysqli_real_escape_string($conn,$_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]);

    $q = mysqli_query($conn,
    "SELECT * FROM users 
    WHERE email='$email' 
    AND password='$password' 
    AND status='Active'");


    if(mysqli_num_rows($q)==1){

        $u = mysqli_fetch_assoc($q);

        $_SESSION["user_id"] = $u["id"];
        $_SESSION["name"] = $u["name"];
        $_SESSION["role"] = $u["role"];

        $_SESSION["can_add_stock"] = $u["can_add_stock"];
        $_SESSION["can_edit_stock"] = $u["can_edit_stock"];
        $_SESSION["can_delete_stock"] = $u["can_delete_stock"];
        $_SESSION["can_view_reports"] = $u["can_view_reports"];
        $_SESSION["can_manage_staff"] = $u["can_manage_staff"];

        header("Location: dashboard.php");
        exit();

    } 

    else {

        $error = "Invalid login or account disabled.";

    }

}

?>


<!DOCTYPE html>

<html>

<head>

<title>FreshGuard Login</title>

<link rel="stylesheet" href="assets/style.css">

</head>


<body class="auth-page">


<div class="auth-card">


<h1>FreshGuard Supermarket</h1>

<p>Authorized staff access only</p>


<?php 

if($error){

echo "<p style='color:red'>$error</p>";

}

?>


<form method="POST">


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
Login
</button>


</form>


<br>


<a href="signup.php">
Create an account
</a>


<p style="font-size:13px;">
Only admin-authorized staff can access this system.
</p>


</div>


</body>


</html>