<?php
$fname    = $_POST['fname'];
$lname    = $_POST['lname'];
$username = $_POST['uname'];
$mname    = $_POST['mname'];
$email    = $_POST['email'];
$pass     = md5($_POST['psw']);
$cpass    = md5($_POST['cpsw']);

mysqli_connect('localhost', 'root', '');
mysqli_select_db('tryit');
$query = mysqli_query("SELECT fname,lname,username FROM graduate WHERE fname = '$fname' and lname = '$lname' and username='$username'");

$result = mysqli_query($query);

if (mysqli_num_rows($query) != 0) {
    echo "Username already exists! Please try another name.";
    header('Location: registerGrad.php?error=The account already exists! Please try again.');
    mysqli_close($connection);

} else {
    $db = new mysqli('localhost', 'root', '', 'tryit');
    $db->query("INSERT INTO graduate (fname,lname,mname,email,username,pass,cpass) VALUES ('$fname', '$lname', '$mname',
      '$email', '$username', '$pass', '$cpass')");
    header('Location: successRegGrad.php');
    $db->close();
}
