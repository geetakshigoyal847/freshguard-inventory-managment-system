<?php
include 'includes/db.php';

if(isset($_POST['register'])){

    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $role = "staff";

    $sql = "INSERT INTO users (email, password, role)
            VALUES ('$email','$password','$role')";

    if(mysqli_query($conn,$sql)){
        echo "Account created successfully. <a href='login.php'>Login here</a>";
    }
    else{
        echo "Error: " . mysqli_error($conn);
    }
}

?>


<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>FreshGuard Staff Registration</h2>

<form method="POST">

<label>Email</label>
<input type="email" name="email" required>

<br><br>

<label>Password</label>
<input type="password" name="password" required>

<br><br>

<button name="register">Create Account</button>

</form>

</body>
</html>