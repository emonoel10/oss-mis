<?php

$connection = mysqli_connect('localhost', 'root', '') or die(mysqli_error());
$database   = mysqli_select_db('tryit') or die(mysqli_error());
?>

<?php
if ($_POST) {
    $q       = $_POST['search'];
    $sql_res = mysqli_query("select id,lastname,firstname,course from personal where lastname like '%$q%' or firstname like '%$q%' or course like '%$q%' or age like '%$q%' order by id");
    while ($row = mysqli_fetch_array($sql_res)) {
        $lastname  = $row['lastname'];
        $firstname = $row['firstname'];
        $course    = $row['course'];
        $fullname  = $row['lastname'] . ", " . $row['firstname'];

        ?>
<a href = "viewSearch.php?id=<?php echo $row['id']; ?>&&fullname=<?php echo $fullname; ?>" style = "text-decoration: none; color: black;">
<div class="show" align="left">
<span class="name" style="font-family: Century Gothic;"><?php echo $lastname . ", " . $firstname; ?></span>&nbsp;<br/><p style="font-family: Century Gothic;"><?php echo $course; ?></p><br/>
</div>
</a>
<?php
}
}
?>