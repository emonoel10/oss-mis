

<?php

$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}
$db_select = mysqli_select_db("tryit", $connection);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

?>
                        <?php
$result = mysqli_query("SELECT * FROM personal where username = $login_sessionGrad", $connection);

if ($row = mysqli_fetch_array($result)) {
    header("location: graduatesProfile.php");
} else {
    header("location: graduatesForm2.php");
}
?>