<?php
include 'session.php';

if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
    header("Location: socioLogin.php");
}
?>


<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>DNSC - View Profile</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/mobile.css">
  <script type='text/javascript' src='js/mobile.js'></script>

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
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 100%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
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
      <li class = "current">
        <a href="socioLogin.php">Socio-Economic</a>
        <ul>
          <li>
            <a href="socioLogin.php">Socio Form</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="graduatesLogin.php">Graduates</a>
      </li>
      <li>
        <a href="about.php">About</a>
      </li>

    </ul>
  </div>

  <div id="body">
    <h2 align = "center" style="font-family: century gothic;">Hello, <?php echo "@" . $login_session . "!"; ?></h2>
    <hr>
    <div class="content">
    <main>

<?php
$con = mysqli_connect("localhost", "root", "");
mysqli_select_db("tryit", $con);
$qry    = "select * from image where username='$login_session'";
$result = mysqli_query($qry, $con);
while ($row = mysqli_fetch_array($result)) {
    echo '<center><img height="250" id="myImg" width ="250" alt="' . $login_session . '" src="data:image;base64,' . $row[3] . '"></center>';
    echo '<center><p style="font-family: Century Gothic; color: white;">Click the picture to enlarge.</p></center>';
}

mysqli_close($con);
?>
          <center><h2 style="font-family: latoregular;">
          <?php $con = mysqli_connect("localhost", "root", "");
mysqli_select_db("tryit", $con);
$qry    = "select * from personal where username='$login_session'";
$result = mysqli_query($qry, $con);
while ($row = mysqli_fetch_array($result)) {
    echo "<b style='text-transform: uppercase; font-family: latoregular;'>" . $row['lastname'] . ", " . $row['firstname'] . " " . $row['midname'] . "</b>";
}
?></h2></center>
<div id="myModal" class="modal">
  <span class="close"> &times; </span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
</center>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>
<center>
<p style="font-family: century gothic;"> Logged in as <?php echo $login_session; ?>.(<a href = "logout.php" style="text-decoration: none;">Log out</a>)</p>
</center>
  <div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')">PERSONAL DATA</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">PARENT/GUARDIAN INFORMATION</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">SOCIO-ECONOMIC STATUS</button>
</div>
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
$result = mysqli_query("SELECT * FROM personal, account WHERE personal.username = '$login_session' and account.username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}
?>
        <?php
while ($row = mysqli_fetch_array($result)) {
    ?>
<div id="London" class="tabcontent">
<table>
<p style="font-family: Century Gothic;"><strong><?php echo "Update Personal Data? Edit <a href='updatePersonal.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>
<tr><td><label>Status: </label></td><td><h4> <?php echo $row['type']; ?> </h4></td></tr>
<tr><td><label>School ID: </label></td><td><h4> <?php echo $row['schoolId']; ?> </h4></td></tr>
<tr><td><label>School Year and Semester: </label></td><td><h4> <?php echo $row['schoolYr'] . ", " . $row['semester']; ?> </h4></td></tr>
<tr><td><label>Name: </label></td><td><h4> <?php echo $row['lastname'] . ", " . $row['firstname'] . " " . $row['midname']; ?> </h4></td></tr>
<tr><td><label>Home Address: </label></td><td><h4> <?php echo $row['presentNum'] . " " . $row['presentBrgy'] . ", " . $row['presentCity'] . ", " . $row['presentProvince']; ?> </h4></td></tr>
<tr><td><label>Boarding House Address: </label></td><td><h4> <?php echo $row['permanentNum'] . " " . $row['permanentBrgy'] . ", " . $row['permanentCity'] . ", " . $row['permanentProvince']; ?> </h4></td></tr>
<tr><td><label>Course: </label></td><td><h4> <?php echo $row['course']; ?> </h4></td></tr>
<tr><td><label>Birthday: </label></td><td><h4> <?php echo $row['bdate']; ?> </h4></td></tr>
<tr><td><label>Gender: </label></td><td><h4> <?php echo $row['gender']; ?> </h4></td></tr>
<tr><td><label>Age: </label></td><td><h4> <?php echo $row['age'] . " years old"; ?> </h4></td></tr>
<tr><td><label>Marital Status: </label></td><td><h4> <?php if ($row['mstatus'] == "Married") {echo $row['mstatus'] . " with " . $row['spouse'];} else {echo $row['mstatus'];}?> </h4></td></tr>
<tr><td><label>Nationality: </label></td><td><h4> <?php echo $row['nationality']; ?> </h4></td></tr>
<tr><td><label>Height and Weight: </label></td><td><h4> <?php echo $row['height'] . "<br>" . $row['weight'] . " kg"; ?> </h4></td></tr>
<tr><td><label>Sibling's Name</label></td><td><h4> <?php if ($row['siblingsName'] == "") {echo "None";} else {echo $row['siblingsName'];}?> </h4></td></tr>
<tr><td><label>Sibling's Educational Attainment: </label></td><td><h4> <?php if ($row['siblingsEduc'] == "") {echo "None";} else {echo $row['siblingsEduc'];}?> </h4></td></tr>
<tr><td><label>No. of Sibling in DNSC: </label></td><td><h4> <?php echo $row['numSiblingDNSC']; ?> </h4></td></tr>
<tr><td><label>Name of High School:</label></td><td><h4> <?php echo $row['hs']; ?> </h4></td></tr>
<tr><td><label>Year Graduated: </label></td><td><h4> <?php echo $row['yearGrad']; ?> </h4></td></tr>
<tr><td><label>High School Type Origin: </label></td><td><h4> <?php echo $row['hstype']; ?> </h4></td></tr>
<tr><td><label>Stanine (OLSAT Result): </label></td><td><h4> <?php echo $row['stanine']; ?> </h4></td></tr>
<tr><td><label>Contact Number: </label></td><td><h4> <?php echo $row['contactNumber']; ?> </h4></td></tr>
</table>
          <?php
}
?>

                            <?php
mysqli_close($connection);
?>
</div>
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

$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
<div id="Paris" class="tabcontent">
<table>
<p style="font-family: Century Gothic;"><strong><?php echo "Update Parent / Guardian Information? Edit <a href='updateParent.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>
<tr><td><label>Ethnic origin: </label></td><td><h4> <?php if ($row['otherethnic'] == '') {echo $row['ethnic'];} else {echo $row['otherethnic'];}?> </h4></td></tr>
<tr><td><label>Father's Information: </label></td><td><h4> <?php echo $row['father'] . " (" . $row['attainfather'] . ") <br>" . $row['fatherOccup']; ?> </h4><br></td></tr>
<tr><td><label>Mother's Information: </label></td><td><h4> <?php echo $row['mother'] . " (" . $row['attainmother'] . ") <br>" . $row['motherOccup']; ?> </h4></td></tr>
<tr><td><label>Religion: </label></td><td><h4> <?php if ($row['otherreligion'] == '') {echo $row['religion'];} else {echo $row['otherreligion'];}?> </h4></td></tr>
<tr><td><label>Dialect/s spoken: </label></td><td><h4> <?php if ($row['otherdialect'] == '') {echo $row['dialect'];} else if ($row['dialect'] == "") {echo $row['otherdialect'];} else {echo $row['dialect'] . "<br>Other dialect/s:" . $row['otherdialect'];}?> </h4></td></tr>
<tr><td><label>Skill/s: </label></td><td><h4> <?php if ($row['otherSkills'] == '') {echo $row['skills'];} else if ($row['dialect'] == "") {echo $row['otherdialect'];} else {echo $row['skills'] . "<br>Other skills:" . $row['otherSkills'];}?> </h4></td></tr>
<tr><td><label>Disability: </label></td><td><h4> <?php if ($row['otherDisability'] == '') {echo $row['disability'];} else if ($row['disability'] == "") {echo $row['otherDisability'];} else {echo $row['disability'] . "<br>Other disability:" . $row['otherDisability'];}?> </h4></td></tr>
<tr><td><label>Handedness: </label></td><td><h4> <?php echo $row['handedness'] ?> </h4></td></tr>
<tr><td><label>Problems: </label></td><td><h4> <?php if ($row['otherProblems'] == '') {echo $row['problems'];} else if ($row['problems'] == "") {echo $row['otherProblems'];} else {echo $row['problems'] . "<br>Other problems:" . $row['otherProblems'];}?> </h4></td></tr>
</table>
          <?php
}
?>

                            <?php
mysqli_close($connection);
?>
</div>
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

$result = mysqli_query("SELECT * FROM economic WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
<div id="Tokyo" class="tabcontent">
<table>
<p style="font-family: Century Gothic;"><strong><?php echo "Update Family Socio - Economic Status? Edit <a href='updateSocioProfile.php?id={$row[0]}' style = 'color: green; text-align: right; text-decoration: none;'>here</a>."; ?></strong></p>
<tr><td><label>Family Monthly Income: </label></td><td><h4> <?php echo $row['income']; ?> </h4></td></tr>
<tr><td><label>Status of the house where you live: </label></td><td><h4> <?php echo $row['houseStatus']; ?> </h4></td></tr>
<tr><td><label>Status of the residential lot where you live: </label></td><td><h4> <?php echo $row['lotStatus']; ?> </h4></td></tr>
<tr><td><label>Light facility used: </label></td><td><h4> <?php if ($row['otherLight'] == '') {echo $row['light'];} else {echo $row['otherLight'];}?> </h4></td></tr>
<tr><td><label>Means of water supply: </label></td><td><h4> <?php echo $row['water']; ?> </h4></td></tr>
<tr><td><label>Type of toilet used: </label></td><td><h4> <?php echo $row['toilet']; ?> </h4></td></tr>
<tr><td><label>Possession of transportation: </label></td><td><h4> <?php if ($row['otherTransport'] == '') {echo $row['transport'];} else {echo $row['otherTransport'];}?> </h4></td></tr>
<tr><td><label>Appliances owned: </label></td><td><h4> <?php if ($row['otherAppliances'] == '') {echo $row['appliances'];} else if ($row['appliances'] == '') {echo $row['otherAppliances'];} else {echo $row['appliances'] . "<br>Other Appliances: " . $row['otherAppliances'];}?> </h4></td></tr>
<tr><td><label>Furniture owned: </label></td><td><h4> <?php if ($row['otherFurniture'] == '') {echo $row['furniture'];} else if ($row['furniture'] == '') {echo $row['otherFurniture'];} else {echo $row['furniture'] . "<br>Other Appliances: " . $row['otherFurniture'];}?> </h4></td></tr>

</table>

          <?php
}
?>

                            <?php
mysqli_close($connection);
?>
</div>
</main>
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