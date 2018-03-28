<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start(); // Starting Session
$error      = ''; // Variable To Store Error Message
$postData   = '';
$errorAdmin = '';

// For student login
if (isset($_POST['submit'])) {
    if (empty($_POST['uname']) || empty($_POST['psw'])) {
        $error = "Username or Password is invalid";
        // $postData = ($_POST['uname'] ? $_POST['uname'] : 'uname null') . " and " . ($_POST['psw'] ? $_POST['psw'] : 'psw null') . ' mysql error: ' . mysqli_error($connection);
    } else {
// Define $username and $password
        $username = $_POST['uname'];
        $password = $_POST['psw'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
// Selecting Database
        $db = mysqli_select_db($connection, "tryit");
// SQL query to fetch information of registerd users and finds user match.
        $password = md5($password);
        $query    = mysqli_query($connection, "SELECT * FROM admin WHERE admin_pass = '" . $password . "' AND admin_name = '" . $username . "'");
        $rows     = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
        } else {
            $error = "Username or Password is invalid";
            // $postData = ($_POST['uname'] ? $_POST['uname'] : 'uname null') . " and " . ($_POST['psw'] ? $_POST['psw'] : 'psw null') . ' mysql error0: ' . mysqli_error($connection);
        }
        mysqli_close($connection); // Closing Connection
    }
}

// For admin login
if (isset($_POST['submitAdmin'])) {
    if (empty($_POST['adminname']) || empty($_POST['adminpass'])) {
        $error = "Admin username or password is invalid" . $_POST['adminname'] . " and " . $_POST['adminpass'];
        // $postData = ($_POST['adminname'] ? $_POST['adminname'] : 'adminname null') . " and " . ($_POST['adminpass'] ? $_POST['adminpass'] : 'adminpass null') . ' mysql error1: ' . mysqli_error($connection);
    } else {
// Define $username and $password
        $username = $_POST['adminname'];
        $password = $_POST['adminpass'];
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
        $connection = mysqli_connect("localhost", "root", "");
// To protect MySQL injection for Security purpose
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = mysqli_real_escape_string($connection, $username);
        $password = mysqli_real_escape_string($connection, $password);
// Selecting Database
        $password = md5($password);
        $db       = mysqli_select_db($connection, "tryit");
// SQL query to fetch information of registerd users and finds user match.
        $query = mysqli_query($connection, "SELECT * FROM admin WHERE admin_pass = '" . $password . "' AND admin_name = '" . $username . "'");
        $rows  = mysqli_num_rows($query);
        if ($rows == 1) {
            $_SESSION['login_user'] = $username; // Initializing Session
        } else {
            $error = "Admin username or password is invalid";
            // $postData = ($_POST['adminname'] ? $_POST['adminname'] : 'adminname null') . " and " . ($_POST['adminpass'] ? $_POST['adminpass'] : 'adminpass null') . ' mysql error2: ' . mysqli_error($connection);
        }
        mysqli_close($connection); // Closing Connection
    }
}
