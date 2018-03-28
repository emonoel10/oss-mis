<?php
session_start(); // Starting Session
$error      = ''; // Variable To Store Error Message
$errorAdmin = '';

// For student login
if (isset($_POST['submit'])) {
    if (empty($_POST['uname']) || empty($_POST['psw'])) {
        $error = "Username or Password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['uname'];
        $password = $_POST['psw'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($username);
        $password = mysqli_real_escape_string($password);
// Selecting Database
        $db = mysqli_select_db("tryit", $connection);
// SQL query to fetch information of registerd users and finds user match.
        $password = md5($password);
        $query    = mysqli_query("select * from account where pass='$password' AND username='$username'", $connection);
        $rows     = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
        } else {
            $error = "Username or Password is invalid";
        }
        mysqli_close($connection); // Closing Connection
    }
}

// For admin login
if (isset($_POST['submitAdmin'])) {
    if (empty($_POST['adminname']) || empty($_POST['adminpass'])) {
        $error = "Admin username or password is invalid";
    } else {
// Define $username and $password
        $username = $_POST['adminname'];
        $password = $_POST['adminpass'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($username);
        $password = mysqli_real_escape_string($password);
// Selecting Database
        $db = mysqli_select_db("tryit", $connection);
// SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query("select * from admin where admin_pass='$password' AND admin_name='$username'", $connection);
        $rows  = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
        } else {
            $error = "Admin username or password is invalid";
        }
        mysqli_close($connection); // Closing Connection
    }
}
