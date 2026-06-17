<?php

$host = "sql212.infinityfree.com";
$user = "if0_42203448";
$password = "Geetakshi123";
$dbname = "if0_42203448_freshguard_AI";

$conn = mysqli_connect($host, $user, $password, $dbname);

if (!$conn) {
    die("Database failed: " . mysqli_connect_error());
}


?>