<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("localhost", "root", "");
// Selecting Database
$db = mysqli_select_db("tryit", $connection);
session_start(); // Starting Session
// Storing Session
$user_check2 = $_SESSION['login_grad'];
// SQL Query To Fetch Complete Information Of User
$ses_sql           = mysqli_query("select admin_name from admin where admin_name='$user_check2'", $connection);
$row               = mysqli_fetch_assoc($ses_sql);
$login_sessionGrad = $row['admin_name'];
if (!isset($login_sessionGrad)) {
    mysqli_close($connection); // Closing Connection
    header('Location: home.php'); // Redirecting To Home Page
}
