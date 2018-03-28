<?php
include 'sessionGrad.php';

if (!(isset($_SESSION['login_grad']) && $_SESSION['login_grad'] != '')) {
    header("Location: graduatesLogin.php");
}
?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>DNSC - View Profile</title>
  <link rel="icon" href="dnsc.png" type="image/x-icon" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/mobile.css">
  <script type='text/javascript' src='js/mobile.js'></script>
    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">

<style>
table#employ {
    border-collapse: collapse;
}

table#employ {
    border: 1px solid black;
}
td#employ {
    border: 1px solid black;
}
th #employ {
    border: 1px solid black;
}
</style>

<style>
      /* NOTE: The styles were added inline because Prefixfree needs access to your styles and they must be inlined if they are on local disk! */
      @import url("http://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
@import url("http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
*, *:before, *:after {
  margin: 0;
  padding: 0;
  box-sizing: border-box width: 10px;
}


h1 {
  padding: 50px 0;
  font-weight: 400;
  text-align: center;
}

p {
  margin: 0 0 20px;
  line-height: 1.5;
}

main {
  min-width: 400px;
  max-width: 800px;
  padding: 50px;
  margin: 0 auto;
  background: #fff;
}

section {
  display: none;
  padding: 20px 0 0;
  border-top: 1px solid #ddd;
}

input {
  display: none;
}

label {
  display: inline-block;
  font-family: Century Gothic;
  margin: 0 0 -1px;
  padding: 15px 25px;
  font-weight: 600;
  text-align: center;
  color: #bbb;
  border: 1px solid transparent;
}

label:before {
  font-family: fontawesome;
  font-weight: normal;
  margin-right: 10px;
}

}

label:hover {
  color: #888;
  cursor: pointer;
}

input:checked + label {
  color: #555;
  border: 1px solid #ddd;
  border-top: 2px solid green;
  border-bottom: 1px solid #fff;
}

#tab1:checked ~ #content1,
#tab2:checked ~ #content2,
#tab3:checked ~ #content3,
#tab4:checked ~ #content4 {
  display: block;
}

@media screen and (max-width: 650px) {
  label {
    font-size: 0;
  }

  label:before {
    margin: 0;
    font-size: 18px;
  }
}
@media screen and (max-width: 400px) {
  label {
    padding: 15px;
  }
}

    </style>
<style>
/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>

</head>
<body>
  <div id="header">
    <h1><a href="home.php">SOCIO-ECONOMIC PROFILING &amp; GRADUATE TRACER SURVEY </a></h1>
    <ul id="navigation">
      <li>
        <a href="home.php">Home</a>
      </li>
      <li>
        <a href="socioLogin.php">Socio-Economic</a>
        <ul>
          <li>
            <a href="socioLogin.php">Socio Form</a>
          </li>
        </ul>
      </li>
      <li class = "current">
        <a href="graduatesLogin.php">Graduates</a>
      </li>
      <li>
        <a href="about.php">About</a>
      </li>

    </ul>
  </div>

  <div id="body">
  <br><br>
    <h2 align = "center" style="font-family: century gothic;">YOUR PROFILE</h2>
    <hr>
    <div class="content">
      <br><br><br><br><main>
<p style="font-family: century gothic;"><i> Logged in as <?php echo $row['username']; ?>. </i>(<a href = "logoutGrad.php" style="text-decoration: none;">Log out</a>)</p>

  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">GENERAL INFORMATION</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">EDUCATION</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">TRAINING COURSES</button>
  <button class="tablinks" onclick="openCity(event, 'Employ')">EMPLOYMENT DATA</button>
</div>

<div id="London" class="tabcontent">
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
$result = mysqli_query("SELECT * FROM geninfo WHERE username = '$login_sessionGrad'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}
?>
        <?php
while ($row = mysqli_fetch_array($result)) {
    ?>

<table>
<h2 style="font-family: Century Gothic;">GENERAL INFORMATION</h2>
<p style="font-family: Century Gothic;"><strong><?php echo "Update General Information? Edit <a href='updateGenInfo.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>
<tr><td><label>Name: </label></td><td><h4> <?php echo $row['lname'] . ", " . $row['fname'] . " " . $row['mname']; ?> </h4></td></tr>
<tr><td><label>Permanent Address: </label></td><td><h4> <?php echo $row['permanentNum'] . " " . $row['permanent_brgy'] . " " . $row['permanent_city'] . ", " . $row['permanent_province']; ?> </h4></td></tr>
<tr><td><label>Present Address: </label></td><td><h4> <?php echo $row['presentNum'] . " " . $row['present_brgy'] . " " . $row['present_city'] . ", " . $row['present_province']; ?> </h4></td></tr>
<tr><td><label>Gender: </label></td><td><h4> <?php echo $row['gender']; ?> </h4></td></tr>
<tr><td><label>Email: </label></td><td><h4> <?php echo $row['email']; ?> </h4></td></tr>
<tr><td><label>Marital Status: </label></td><td><h4> <?php echo $row['status']; ?> </h4></td></tr>
<tr><td><label>Contact Number: </label></td><td><h4> <?php echo $row['mobile']; ?> </h4></td></tr>
</table>
          <?php
}
?>

                            <?php
mysqli_close($connection);
?>
</div>
<div id="Paris" class="tabcontent">
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

$result = mysqli_query("SELECT * FROM education WHERE username = '$login_sessionGrad'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
<h2 style="font-family: Century gothic;">EDUCATIONAL BACKGROUND</h2>
<table>
<p style="font-family: Century Gothic;"><strong><?php echo "Update Educational Background? Edit <a href='updateEducation.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>

<span><?php if ($row['degree'] == "" && $row['college'] == "" && $row['year'] == "" && $row['awards'] == "") {
        echo "<span style='color:gray; font-family: Century Gothic;'>You haven't pursued any Graduate Studies.</span>";
        ?>
<tr><td><label>Course: </label></td><td><h4> <?php echo $row['course']; ?> </h4></td></tr>
<tr><td><label>School Year Graduated: </label></td><td><h4> <?php echo $row['syGrad']; ?> </h4></td></tr>
<?php
} else {?>
<tr><td><label>Degree/s: </label></td><td><h4> <?php echo $row['degree']; ?> </h4></td></tr>
<tr><td><label>College: </label></td><td><h4> <?php echo $row['college']; ?> </h4><br></td></tr>
<tr><td><label>Year: </label></td><td><h4> <?php echo $row['year']; ?> </h4></td></tr>
<tr><td><label>Award/s received: </label></td><td><h4> <?php echo $row['awards']; ?> </h4></td></tr>
<?php
}
    ?>
<br><br>
<?php if ($row['exam'] == "" && $row['dateExam'] == "" && $row['rating'] == "") {echo "<span style='color:gray; font-family: Century Gothic;'>You didn't take any Professional Examinations or TESDA Assessments.</span>";} else {?>
<tr><td><label>Exam: </label></td><td><h4> <?php echo $row['exam']; ?> </h4></td></tr>
<tr><td><label>Examination Date: </label></td><td><h4> <?php echo $row['dateExam']; ?> </h4></td></tr>
<tr><td><label>rating: </label></td><td><h4> <?php echo $row['rating']; ?> </h4></td></tr>
<?php
}
    ?>
</table>
<?php
}
?>

                            <?php
mysqli_close($connection);
?>
    </div>
  <div id="Tokyo" class="tabcontent">
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

$result = mysqli_query("SELECT * FROM training WHERE username = '$login_sessionGrad'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
<h2 style="font-family: century gothic;">TRAINING COURSES ATTENDED AFTER GRADUATION</h2>
<table>
<p style="font-family: Century Gothic;"><strong><?php echo "Update Training Courses? Edit <a href='updateTraining.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>
<?php if ($row['titleTraining'] == "" && $row['credits'] == "" && $row['sponsor'] == "") {echo "<span style='color:gray; font-family: Century Gothic;'>You haven't attended trainings.</span>";} else {?>
<tr><td><label>Title of Training/s: </label></td><td><h4> <?php echo $row['titleTraining']; ?> </h4></td></tr>
<tr><td><label>Duration and Credit/s: </label></td><td><h4> <?php echo $row['credits']; ?> </h4></td></tr>
<tr><td><label>Sponsor/College/University: </label></td><td><h4> <?php echo $row['sponsor']; ?> </h4></td></tr>
<?php
}
    ?>
</table>

          <?php
}
?>

                            <?php
mysqli_close($connection);
?>
  </div>
   <div id="Employ" class="tabcontent">
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

$result = mysqli_query("SELECT * FROM employdata WHERE username = '$login_sessionGrad'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
<h2 style="font-family: century gothic;">EMPLOYMENT DATA OF GRADUATES</h2>
<table>
<p style="font-family: Century Gothic;"><strong><?php echo "Update Employment Data? Edit <a href='updateEmployment.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>
<tr><td><label>Employment Status: </label></td><td><h4><?php if ($row['presentlyEmploy'] == "Yes") {echo "Employed";} else {echo "Unemployed";}?></h4></td></tr>
<?php
if ($row['presentlyEmploy'] == "No") {
        ?>
<tr><td><label>Reason/s why you are not yet employed: </label></td><td><h4> <?php if ($row['otherReasonsIfNo'] == "") {echo $row['reasonsIfNo'];} else {echo $row['reasonsIfNo'] . ", " . $row['otherReasonsIfNo'];}?> </h4></td></tr>
<tr><td><label>Previous job work length: </label></td><td><h4> <?php if ($row['prevJob'] == "Others") {echo $row['otherPrevJob'];} else {echo $row['prevJob'];}?> </h4></td></tr>
<tr><td><label>Reason/s for changing the job: </label></td><td><h4> <?php if ($row['otherChangeJob'] == "") {echo $row['changeJob'];} else {echo $row['changeJob'] . ", " . $row['otherChangeJob'];}?> </h4></td></tr>
<?php
}
    ?>
<?php
if ($row['presentlyEmploy'] == "Yes") {
        ?>
<tr><td><label>Reason/s for accepting the job: </label></td><td><h4> <?php if ($row['otherAcceptJob'] == "") {echo $row['acceptJob'];} else {echo $row['acceptJob'] . "<br> " . $row['otherAcceptJob'];}?> </h4></td></tr>
<tr><td><label>Present Employment Status: </label></td><td><h4> <?php if ($row['otherStatus'] == "") {echo $row['presentStatus'];} else {echo $row['otherstatus'];}?> </h4></td></tr>
<tr><td><label>Range of salary: </label></td><td><h4> <?php echo $row['salary']; ?> </h4></td></tr>
<tr><td><label>Nature of business/operation: </label></td><td><h4> <?php if ($row['otherBusiness'] == "") {echo $row['business'];} else {echo $row['otherBusiness'];}?> </h4></td></tr>
<tr><td><label>Country: </label></td><td><h4> <?php echo $row['country']; ?> </h4></td></tr>
<tr><td><label>Duration in landing the first job: </label></td><td><h4> <?php if ($row['firstJob'] == "") {echo $row['firstJobTake'];} else {echo $row['firstJob'];}?> </h4></td></tr>

<?php
}
    ?>
</table>
<h2 style="font-family: century gothic;">EMPLOYMENT HISTORY (According to importance)</h2>
<?php if ($row['fromDate'] != "" || $row['toDate'] != "") {
        ?>

               <?php
$fromDate = explode(',', $row['fromDate']); //what will do here
        $toDate   = explode(',', $row['toDate']);
        $company  = explode(',', $row['company']);
        $position = explode(',', $row['workNature']);
        echo "<table id='employ'><tr><td><b>YEAR EMPLOYED</b></td><td><b>EMPLOYER/COMPANY</b></td><td><center><b>POSITION</b></center></td></tr><tr><td>";
        foreach (array_combine($fromDate, $toDate) as $from => $to) {
            echo $from . " - " . $to . "<br>";
        }
        echo "</td>";
        echo "<td>";
        foreach ($company as $employer) {
            echo "<center>" . $employer . "</center>";
        }
        echo "</td>";
        echo "<td>";
        foreach ($position as $work) {
            echo "<center>" . $work . "</center>";
        }
        echo "</td>";
        echo "</tr></table>";
    }
    ?>
          <?php
}
?>

                            <?php
mysqli_close($connection);
?>
  </div>
  <script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>


</main>
    </div>
  </div>
  <div id="footer">
    <div>
      <span>Davao del Norte State College est. 1995</span>
      <p>
        Brgy. New Visayas, Panabo City, Davao del Norte, Philippines, 8105. All rights reserved.
      </p>

    </div>
    <div id="connect">
      <a href="https://facebook.com" id="facebook" target="_blank">Facebook</a>
      <a href="https://twitter.com" id="twitter" target="_blank">Twitter</a>
      <a href="https://google.com" id="googleplus" target="_blank">Google&#43;</a>
    </div>
  </div>
</body>
</html>