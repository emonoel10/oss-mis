<?php
// $uname = $_POST["regsuname"];
$yrFr     = $_POST["from"];
$yrTo     = $_POST["to"];
$course   = $_POST["course"];
$gender   = $_POST["gender"];
$religion = $_POST["religion"];
$hs       = $_POST["hs"];
$city     = $_POST["city"];
$stanine  = $_POST["stanine"];
$income   = $_POST["income"];

$sql1 = $sql2 = $sql3 = $sql4 = $sql5 = $sql6 = $sql7 = $sql8 = $sql9 = '';

if ($yrFr == 'From:' || $yrFr == '' || $yrTo == 'To:' || $yrTo == '') {
    $sql1 = "";
} else {
    $sql1 = "(personal.schoolYr LIKE '" . $yrFr . "%' or personal.schoolYr LIKE '%" . $yrTo . "')";
}

if ($course == "Select below:" || $course == "") {
    $sql2 = "";
} elseif ($course == "all") {
    $sql2 = " and personal.course<>''";
} else {
    $sql2 = " and personal.course='" . $course . "'";
}

if ($gender == "Select below:" || $gender == "") {
    $sql3 = "";
} elseif ($gender == "all") {
    $sql3 = " and personal.gender IS NOT NULL";
} else {
    $sql3 = " and personal.gender='" . $gender . "'";
}

if ($religion == "Select below:" || $religion == "") {
    $sql4 = "";
} elseif ($religion == "all") {
    $sql4 = " and social.religion<>''";
} else {
    $sql4 = " and social.religion='" . $religion . "'";
}

if ($hs == "Select below:" || $hs == "") {
    $sql5 = "";
} elseif ($hs == "all") {
    $sql5 = " and personal.hs IS NOT NULL";
} else {
    $sql5 = " and personal.hs='" . $hs . "'";
}

if ($city == "Select below:" || $city == "") {
    $sql6 = "";
} elseif ($city == "all") {
    $sql6 = " and personal.presentCity IS NOT NULL";
} else {
    $sql6 = " and personal.presentCity='" . $city . "'";
}

if ($stanine == "Select below:" || $stanine == "") {
    $sql7 = "";
} elseif ($stanine == "all") {
    $sql7 = " and personal.stanine IS NOT NULL";
} else {
    $sql7 = " and personal.stanine='" . $stanine . "'";
}

if ($income == "Select below:" || $income == "") {
    $sql8 = "";
} elseif ($income == "all") {
    $sql8 = " and economic.income IS NOT NULL";
} else {
    $sql8 = " and economic.income='" . $income . "'";
}

while ($yrFr < $yrTo) {
    $sy      = $yrFr . "-" . ($yrFr + 1);
    $sqlfull = "SELECT * FROM personal INNER JOIN social ON personal.username = social.username INNER JOIN economic ON economic.username = personal.username WHERE personal.username<>'' and schoolYr LIKE '%$sy%'" . $sql2 . $sql3 . $sql4 . $sql5 . $sql6 . $sql7 . $sql8 . $sql9 . " ORDER BY personal.lastname ASC";

    $servername = "localhost";
    $loginname  = "root";
    $password   = "";
    $dbname     = "tryit";

    $conn = new mysqli($servername, $loginname, $password, $dbname);

    date_default_timezone_set("Asia/Manila");
    $date = date("Y/m/d");
    $time = date("h:i:sa");
    echo "<br><br><br><br>School Year " . $sy . "<br>";
    $yrFr++;
    $output = "<?php  ?><table class='rwd-table'><tr><th>No.</th><th>School Year</th><th>Name</th><th>Gender</th><th>Course</th><th>Address</th><th>Birthdate</th><th>Status</th><th>High School</th><th>HS Type</th><th>Stanine</th></tr>";
    $i      = 0;

    if ($result = $conn->query($sqlfull)) {
        while ($row = $result->fetch_assoc()) {
            $i++;
            $output .= "<tr><td data-th='Number' style='color:black;'>$i</td><td data-th='SY' style='color:black;'>{$row['schoolYr']}</td><td data-th='Name' style='color:black;'>{$row['lastname']}, {$row['firstname']} {$row['midname']}</td><td data-th='Gender' style='color:black;'>{$row['gender']}</td><td data-th='Course' style='color:black;'>{$row['course']}</td><td data-th='Address' style='color:black;'>{$row['permanentNum']}, {$row['permanentBrgy']}, {$row['permanentCity']}, {$row['permanentProvince']}</td><td data-th='Birthday' style='color:black;'>{$row['bdate']}</td><td data-th='Status' style='color:black;'>{$row['mstatus']}</td><td data-th='High School' style='color:black;'>{$row['hs']} ({$row['yearGrad']})</td><td data-th='High School Type' style='color:black;'>{$row['hstype']}</td><td data-th='Stanine' style='color:black;'>{$row['stanine']}</td></tr>";
        }

        /* free result set */
        $result->free();
        $output .= "</table><h4 style='font-family: Century Gothic; float: left;'><b>Showing  <input type = 'text' value = '$i' style = 'width:50px;' readonly> results.</b></h4>";
        echo $output;
    } else {
        echo "1";
    }

    $conn->close();
}
