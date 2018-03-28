<?php

$fname    = $_POST['fname'];
$lname    = $_POST['lname'];
$mname    = $_POST['mname'];
$username = $_POST['uname'];
$schId    = $_POST['schId'];
$email    = $_POST['email'];
$pass     = md5($_POST['psw']);
$cpass    = md5($_POST['cpsw']);
$error    = "";

if (isset($_POST['submit_sign'])) {

    if (getimagesize($_FILES['image']['tmp_name']) == false) {
        echo "Please select an image.";
    } else {
        $image    = addslashes($_FILES['image']['tmp_name']);
        $name     = addslashes($_FILES['image']['name']);
        $image    = file_get_contents($image);
        $image    = base64_encode($image);
        $username = $_POST['uname'];
    }
}

mysqli_connect('localhost', 'root', '');
mysqli_select_db('tryit');
$query  = mysqli_query("SELECT * FROM schoolid WHERE schoolId = '$schId'"); //check if enrolled
$query2 = mysqli_query("SELECT * FROM account WHERE schoolId='$schId' or username = '$username'"); //check if account already exist

$result  = mysqli_query($query);
$result2 = mysqli_query($query2);

if (mysqli_num_rows($query) != 0) {

    if (mysqli_num_rows($query2) != 0) {
        echo "Username/School ID already exists! Please try another name.";
        header('Location: signup.php?error=Username/School ID already exists! Please try again.');
        mysqli_close($connection);

    } else {
        $db = new mysqli('localhost', 'root', '', 'tryit');
        $db->query("INSERT INTO account (fname,lname,mname,email,schoolId,username,pass,cpass) VALUES ('$fname', '$lname', '$mname',
            '$email', '$schId', '$username', '$pass', '$cpass')");
        $con = mysqli_connect("localhost", "root", "");
        mysqli_select_db("tryit", $con);
        $qry    = "insert into image (username,filename,image) values ('$username','$name','$image')";
        $result = mysqli_query($qry, $con);
        header('Location: successReg.php');
        $db->close();
    }

} else {
    echo "Invalid School ID. You're not yet enrolled.";
    header('Location: signup.php?error=Anonymous user. If enrolled, maybe your School ID doesn\'t corresponds to your identity. Otherwise, not yet enrolled.');
    mysqli_close($connection);
}
