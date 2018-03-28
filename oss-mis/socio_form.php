<?php
include 'session.php';

if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
    header("Location: socioLogin.php");
}
?>

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
$result = mysqli_query("SELECT * FROM personal where username = '$login_session'", $connection);

if ($_SESSION['login_user'] == "dnscadmin") {
    header("location: socio_tbl.php");
} else if ($row = mysqli_fetch_array($result)) {
    header("location: view.php");
} else {
    ?>
<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>DNSC - Socio-Economic Form</title>
<!-- for-mobile-apps -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type='text/javascript' src='js/mobile.js'></script>
<link rel="icon" href="dnsc.png" type="image/x-icon" />

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<META NAME="DESCRIPTION" CONTENT="">
<META NAME="KEYWORDS" CONTENT="">
<meta name="keywords" content="Validation Signup Form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
<!-- fonts -->
<link href='//fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/mobile.css">
<script type='text/javascript' src='js2/mobile.js'></script>
<!-- //fonts -->
<script type="text/javascript" src="js2/jquery.min.js"></script>
<script type="text/javascript" src="js2/jquery-ui.min.js"></script>
<script type="text/javascript" src="js2/jquery.inputfocus-0.9.min.js"></script>
<script type="text/javascript" src="js2/jquery.main.js"></script>
<link rel="stylesheet" href="js3/jquery-ui.css">
<script src="js3/jquery-1.12.4.js"></script>
<script src="js3/jquery-ui.js"></script>

 <script type="text/javascript">
function copyBilling (f, status) {
    var s, i = 0;
    var box1 = document.getElementById('same').checked;
    var checkbox = $('#checker');
    var dependent = $('#dependent-box');
    if (box1 == true){
    while (s = ['houseNumber', '1', '2', '3'][i++]) {f.elements['ss' + s].value = f.elements['s' + s].value};
    dependent.hide();
    }
    else{
    document.getElementById("ss1").value= "";
    document.getElementById("ss2").value= "";
    document.getElementById("ss3").value= "";
    document.getElementById("sshouseNumber").value= "";
    dependent.show();
    }

    checkbox.change(function(e){
           dependent.toggle();
        });
}
</script>
<!--<script>
  $(document).ready(function() {
  $( "#nominee_one_dob" ).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'MM-dd-yy',

    onSelect: function (date) {
    var dob = new Date(date);
    var today = new Date();
    var nowyear = today.getFullYear();
    var nowmonth = today.getMonth();
    var nowday = today.getDate();

    var birthyear = dob.getFullYear();
    var birthmonth = dob.getMonth();
    var birthday = dob.getDate();

    var age = nowyear - birthyear;
    var age_month = nowmonth - birthmonth;
    var age_day = nowday - birthday;


    if(age_month < 0 || (age_month == 0 && age_day <0)) {
            age = parseInt(age) -1;
        }
     document.getElementById('age').value = age;

    }

  });
});
</script> -->
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
#forSuccess {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

#forError {
    visibility: hidden;
    min-width: 250px;
    margin-left: -125px;
    background-color: #333;
    color: #fff;
    text-align: center;
    border-radius: 2px;
    padding: 16px;
    position: fixed;
    z-index: 1;
    left: 50%;
    bottom: 30px;
    font-size: 17px;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}


.show {
    visibility: visible !important;
    -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
    animation: fadein 0.5s, fadeout 0.5s 2.5s;
}

@-webkit-keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@keyframes fadein {
    from {bottom: 0; opacity: 0;}
    to {bottom: 30px; opacity: 1;}
}

@-webkit-keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}

@keyframes fadeout {
    from {bottom: 30px; opacity: 1;}
    to {bottom: 0; opacity: 0;}
}
</style>

<script type="text/javascript">
function ajaxFunction(choice)
{

var httpxml;
try
  {
  // Firefox, Opera 8.0+, Safari
  httpxml=new XMLHttpRequest();
  }
catch (e)
  {
  // Internet Explorer
  try
    {
    httpxml=new ActiveXObject("Msxml2.XMLHTTP");
    }
  catch (e)
    {
    try
      {
      httpxml=new ActiveXObject("Microsoft.XMLHTTP");
      }
    catch (e)
      {
      alert("Your browser does not support AJAX!");
      return false;
      }
    }
  }
function stateChanged()
    {
    if(httpxml.readyState==4)
      {
//alert(httpxml.responseText);
var myObject = JSON.parse(httpxml.responseText);

for(j=document.myForm.state.options.length-1;j>=0;j--)
{
document.myForm.state.remove(j);
}

var state1=myObject.value.state1;

var optn = document.createElement("OPTION");
optn.text = '–– Select City ––';
optn.value = '';
document.myForm.state.options.add(optn);
for (i=0;i<myObject.state.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myObject.state[i];
optn.value = myObject.state[i];
document.myForm.state.options.add(optn);

if(optn.value==state1){
var k= i+1;
document.myForm.state.options[k].selected=true;
}
}

//////////////////////////
for(j=document.myForm.city.options.length-1;j>=0;j--)
{
document.myForm.city.remove(j);
}
var city1=myObject.value.city1;
//alert(city1);
for (i=0;i<myObject.city.length;i++)
{
var optn = document.createElement("OPTION");
optn.text = myObject.city[i];
optn.value = myObject.city[i];
document.myForm.city.options.add(optn);
if(optn.value==city1){
document.myForm.city.options[i].selected=true;
}

}


///////////////////////////
document.getElementById("txtHint").style.background='#00f040';
document.getElementById("txtHint").innerHTML='done';
//setTimeout("document.getElementById('txtHint').style.display='none'",3000)
    }
    }

var url="ajax-dd3ck.php";
var country=myForm.country.value;
if(choice != 's1'){
var state=myForm.state.value;
var city=myForm.city.value;
}else{
var state='';
var city='';
}
url=url+"?country="+country;
url=url+"&state="+state;
url=url+"&city="+city;
url=url+"&id="+Math.random();
myForm.st.value=state;
//alert(url);
 document.getElementById("txtHint2").innerHTML=url;
httpxml.onreadystatechange=stateChanged;
httpxml.open("GET",url,true);
httpxml.send(null);
 document.getElementById("txtHint").innerHTML="Please Wait....";
document.getElementById("txtHint").style.background='#f1f1f1';
}
</script>

<style type="text/css">
  #btn
  {
    width: 150px;
    border:solid 1px black;
    padding:10px;
    background-color: #2E8B57;
    font-size:14px;
  }

  #btn:hover
  {
    background:#2E8B57;
    color:#00FA9A;
    cursor:pointer;
  }
</style>
<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;

    $("#addButton3").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<div id="display"><input type="text" style = "font-family: Century Gothic;" name="mytext[]" id = "sib" placeholder="Name">&nbsp;<select id="sibling" style = "font-family: Century Gothic;" name="sibling"><option>–– Educational Attainment ––</option><option>Not Applicable</option><option>Kindergarten</option><option>Elementary Level</option><option>Elementary Graduate</option><option>High School Level</option><option>High School Graduate</option><option>College Level</option><option>College Graduate</option><option>Graduate School</option></select></div>');

  newTextBoxDiv.appendTo("#TextBoxesGroup3");


  counter++;
     });

     $("#removeButton3").click(function () {
  if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

  counter--;

        $("#TextBoxDiv" + counter).remove();

     });
  });
</script>

<script type="text/javascript">

function disableHS(aList)
{
var x=document.getElementById("otherHS");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4);
if(x.disabled == true){
document.getElementById("otherHS").value= "";
}
if (aList.selectedIndex == 8){
    otherHS.focus();
}
}
</script>

<script>

function enable_textTel(status)
{
status=!status;
  document.myForm.tel.disabled = status;
  document.myForm.tel.focus();
  document.getElementById("tel").value= "";
}

function enable_textCel(status)
{
status=!status;
  document.myForm.cel.disabled = status;
  document.myForm.cel.focus();
  document.getElementById("cel").value= "";
}

function enable_textDialect(status)
{
status=!status;
  document.myForm.otherDialect.disabled = status;
  document.myForm.otherDialect.focus();
  document.getElementById("otherDialect").value= "";
}

function enable_textSkills(status)
{
status=!status;
  document.myForm.otherSkills.disabled = status;
  document.myForm.otherSkills.focus();
  document.getElementById("otherSkills").value= "";
}

function enable_textDisability(status)
{
status=!status;
  document.myForm.otherDisability.disabled = status;
  document.myForm.otherDisability.focus();
  document.getElementById("otherDisability").value= "";
}

function enable_textProblems(status)
{
status=!status;
  document.myForm.otherProblems.disabled = status;
  document.myForm.otherProblems.focus();
  document.getElementById("otherProblems").value= "";
}

function enable_textAppliances(status)
{
status=!status;
  document.myForm.otherAppliances.disabled = status;
  document.myForm.otherAppliances.focus();
  document.getElementById("otherAppliances").value= "";
}

function enable_textFurniture(status)
{
status=!status;
    document.myForm.otherFurniture.disabled = status;
    document.myForm.otherFurniture.focus();
    document.getElementById("otherFurniture").value= "";
}
</script>

<script type="text/javascript">

function Disable(aList)
{
var x=document.getElementById("ethnicInput");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8 || aList.selectedIndex == 9);
if(x.disabled == true){
document.getElementById("ethnicInput").value= "";
}
if (aList.selectedIndex == 10){
  ethnicInput.focus();
}
}
</script>
<!--<script type="text/javascript">

function Disable2(aList)
{
var x=document.getElementById("religionTwo");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3);
if(x.disabled == true){
document.getElementById("religionTwo").value= "";
}
if (aList.selectedIndex == 4){
  religionTwo.focus();
}
}
</script>-->

<script type="text/javascript">

function Status(aList)
{
var x=document.getElementById("spouse");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 3 || aList.selectedIndex == 4);
if(x.disabled == true){
document.getElementById("spouse").value= "";
}
if (aList.selectedIndex == 2){
  spouse.focus();
}
}
</script>

<script type="text/javascript">

function disableLight(aList)
{
var x=document.getElementById("otherLight");
x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2);
if(x.disabled == true){
document.getElementById("otherLight").value= "";
}
if (aList.selectedIndex == 3){
  otherLight.focus();
}
}
</script>

<script type="text/javascript">

function disableTransport(aList)
{
var x=document.getElementById("otherTransport");
x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5);
if(x.disabled == true){
document.getElementById("otherTransport").value= "";
}
if (aList.selectedIndex == 6){
  otherTransport.focus();
}
}
</script>
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
          <li class = "current">
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
  <br><br><br>
    <h2 style="font-family: Century Gothic;"><center>FILL UP INFORMATION</center></h2>
    <hr>
  <h5 style="font-family: Century Gothic;"><center><b>I. DIRECTIONS:</b> Fill in the text fields with the information called for or check mark <br> in the box that corresponds to your appropriate answer. Fields with <b style = "color: red;">*</b> are required.</center></h5>
  <div class="main">
    <div class="content">
    <h1 style="font-family: Century Gothic; color: black;" id = "user"><?php echo $login_session; ?></h1>
    <p style="font-family: Century Gothic; text-align: center; color: white;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_session; ?></b>. (<a href = "logout.php" style="text-decoration: none; color: white;">Log out</a>)
      <div id="container">
        <form action="userInfo.php" id = 'myForm' name='myForm' method='post'>
          <!-- #first_step -->
              <div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text" style="font-family: Century Gothic;">0% Complete</div>
  </div><br>
          <div id="first_step">
          <div class="form">
          <h1>Student's Personal Data </h1>
          <hr />
          </h5>
          <?php
$con = mysqli_connect("localhost", "root", "");
    mysqli_select_db("tryit", $con);
    $qry    = "select * from image where username='$login_session'";
    $result = mysqli_query($qry, $con);
    while ($row = mysqli_fetch_array($result)) {
        if ($row['filename'] == "") {
            echo '<center><img height="150" id="myImg" width ="150" alt="' . $login_session . '" src="images/IEhh1VNCdE6UO4-np5rKJQ.jpg"></center>';

        } else {
            echo '<center><img height="150" id="myImg" width ="150" alt="' . $login_session . '" src="data:image;base64,' . $row[3] . '"></center>';

        }
    }
    ?>
<center>
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
                   <h5>STATUS<b style = "color: red;">*</b></h5>
                    <select id = "type" class="type" name = "type" style="font-family: Century Gothic; width:100%;">
                        <option>NEW STUDENT</option>
                        <option>TRANSFEREE STUDENT</option>
                    </select>

                    <h5>SCHOOL YEAR &amp; SEMESTER <b style = "color: red;">*</b></h5>
                            <select class="schoolYear" id="schoolYear" name="schoolYear" style="font-family: Century Gothic;">
                            <?php $current_year = date("Y");
    for ($i = 2013; $i <= $current_year; $i++) {?>
                            <option value="<?php echo $i . "-" . ($i + 1); ?>"><?php echo $i . "-" . ($i + 1); ?></option>
                            <?php
}?>
                            </select>
                    <select id = "semester" name = "semester" class = "semester" style="font-family: Century Gothic;">
                        <option>First Semester</option>
                        <option>Second Semester</option>
                    </select>
<?php
$connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die("Database connection failed: " . mysqli_error());
    }
    $db_select = mysqli_select_db("tryit", $connection);
    if (!$db_select) {
        die("Database selection failed: " . mysqli_error());
    }

    $result = mysqli_query("SELECT * FROM account WHERE username = '$login_session'", $connection);
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        ?>
              <h5>FULL NAME <b style = "color: red;">*</b></h5>
              <input type="text" style="font-family: Century Gothic; width: 28%;" name="lname" id="lname" pattern = [a-zA-Z]+ placeholder = "Last Name"  value="<?php echo $row['lname']; ?>" autocomplete="off" readonly />
              <input type="text" style="font-family: Century Gothic; width: 28%;" name="fname" id="fname" placeholder = "First Name"  value="<?php echo $row['fname']; ?>" autocomplete="off" readonly/>
              <input type="text" style="font-family: Century Gothic; width: 28%;" name="mname" id="mname" placeholder = "Middle Name"  value="<?php echo $row['mname']; ?>" autocomplete="off" />
          <?php
}
    ?>
            <h5>PERMANENT ADDRESS <b style = "color: red;">*</b></h5>
                        <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT distinct countryname from student5";
    $result = mysqli_query($sql);

    echo "<input type = 'text' name='s1' id='s1' style='font-family: Century Gothic; width: 28%;' placeholder = 'Province'>";
    ?>

                             <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT distinct state from student5";
    $result = mysqli_query($sql);

    echo "<input type = 'text' name='s2' id='s2' class='city' style='font-family: Century Gothic; width: 28%;' placeholder = 'City'>";

    ?>

                             <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT distinct city from student5";
    $result = mysqli_query($sql);

    echo "<input type = 'text' name='s3' id='s3' style='font-family: Century Gothic; width: 28%;' class='brgy' placeholder = 'Brgy'>";
    ?>
                            <input type="text" style="font-family: Century Gothic; width: 100%;" name="shouseNumber" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "shouseNumber">
                            <!-- <input type="text" id = "permanent_brgy" placeholder = "Brgy">
                            <input type="text" id = "permanent_city" placeholder = "City">
                            <input type="text" id = "permanent_province" placeholder = "Province"> -->
              <!-- <input type=hidden name=st value=0>
                <br><select name=country style="font-family: Century Gothic;" id='s1' onchange=ajaxFunction('s1');>
                <option value='' style="font-family: Century Gothic;">–– Select Province ––</option>
                <?Php
//require "../include/z_db1.php";
    //require "config.php";// connection to database
    $sql //="select distinct country,countryname from student5 ";
    //foreach ($dbo->query($sql) as $row) {
    //echo "<option value=$row[country]>$row[countryname]</option>";
    //}
    ?>
                </select>
                <select name=state style="font-family: Century Gothic;" class = "city" id='s2' onchange=ajaxFunction('s2');>
                <option value=''>–– Select City ––</option></select>
                <select name=city style="font-family: Century Gothic;" class = "brgy" id='s3' onchange=ajaxFunction('s3');>
                <option value=''>–– Select Brgy ––</option></select>
                <div style = "color: #2E8B57; font-size:5px;" id="txtHint2"></div>
                                <input type="text" placeholder = "Lot No. / Blk. No. / Street / Subdivision / Purok" id = "shouseNumber">
                            <br><br> -->

                    <h5>PRESENT ADDRESS <b style = "color: red;">*</b><input name="same" id="same" onclick="copyBilling (this.form, this.checked)" type="checkbox"><b style = "font-family: Century Gothic; color: white;">Same as above</b></h5>

                    <div id="dependent-box">

                            <!-- <input type="text" name="ss1" id = "ss1" placeholder = "Province">
                            <input type="text" name="ss2"  id = "ss2" placeholder = "City">
                            <input type="text" name="ss3" id = "ss3" placeholder = "Brgy">
                            <input type="text" name="sshouseNumber" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "sshouseNumber"> -->
                            <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT distinct countryname from student5";
    $result = mysqli_query($sql);

    echo "<input type = 'text' name='ss1' id='ss1' class='city' style='font-family: Century Gothic; width: 28%;' placeholder = 'Province'>";
    ?>

                             <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT distinct state from student5";
    $result = mysqli_query($sql);

    echo "<input type = 'text' name='ss2' id='ss2' class='city' style='font-family: Century Gothic; width: 28%;'  placeholder = 'City'>";
    ?>

                             <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT distinct city from student5";
    $result = mysqli_query($sql);

    echo "<input type = 'text' name='ss3' id='ss3' style='font-family: Century Gothic; width: 28%;' class='brgy'  placeholder = 'Brgy'>";
    ?>
                            <input type="text" name="sshouseNumber" style="font-family: Century Gothic; width: 100%;" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "sshouseNumber">
                          <blockquote><input name="board" id="board" type="checkbox"><b style = "font-family: Century Gothic; color: white;">Is this your boarding house address? (If yes, please check)</b></blockquote>
                          </div>
              <h5>COURSE <b style = "color: red;">*</b></h5>
              <select id="course" name="course" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option>Bachelor of Science in Information Technology (BSIT)</option>
                <option>Bachelor of Science in Food Technology (BSFT)</option>
                <option>Bachelor of Science in Marine Biology (BSMB)</option>
                <option>Bachelor of Public Administration (BPA)</option>
                <optgroup label="Bachelor of Secondary Education (BSEd)">
                <option>BSE major in English</option>
                <option>BSE major in Biological Science</option>
                <option>BSE major in Mathematics</option>
                <option>BSE major in Technology and Livelihood Education</option>
                <optgroup label="Bachelor of Science in Fisheries (BSFi)">
                <option>BSFi major in Fish Culture</option>
                <option>BSFi major in Fish Capture</option>
                <option>BSFi major in Fish Processing</option>

              </select>

              <h5>BIRTHDAY</h5>
              <input type="date" name="nominee_one_dob" style="font-family: Century Gothic;" id="nominee_one_dob">
              <input type="text" placeholder = "Your age" name = "age" id="age" style="font-family: Century Gothic;">

              <h5>GENDER <b style = "color: red;">*</b></h5>
              <select id="gender" name="gender" style="font-family: Century Gothic;">
              <option>–– Choose below ––</option>
              <option>Female</option>
              <option>Male</option>
              </select>

              <h5>MARITAL STATUS <b style = "color: red;">*</b></h5>
              <select id="status" name="status" style="font-family: Century Gothic;" onchange="Status(this)">
                <option>–– Choose below ––</option>
                <option>Single</option>
                <option>Married</option>
                <option>Separated</option>
                <option>Widow</option>
              </select>
              <input type="text" name = "spouse" id = "spouse" disabled="disabled" style="font-family: Century Gothic; width: 100%;" placeholder = "If married, name of spouse">
              <h5>NATIONALITY <b style = "color: red;">*</b></h5>
              <input type="text" style="font-family: Century Gothic" name = "nationality" id = "nationality" placeholder = "State your nationality" />
              <strong style = "color: white;">HEIGHT <b style = "color: red;">*</b></strong>
              <input type="text" name = "height" style="font-family: Century Gothic;" placeholder = "in cm/ft" id = "height" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <strong style = "color: white;">WEIGHT <b style = "color: red;">*</b></strong>
              <input type="text" style="font-family: Century Gothic;" name = "weight" placeholder = "in kg" id = "weight" />

              <!-- <h5>SIBLINGs</h5>
                            <p style="color: white; font-family: Century Gothic;">Enrolled in DNSC &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Number of Siblings</p>
              <select style="font-family: Century Gothic;" name="sibling2" id="sibling2">
                <option>0</option>
                                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
              </select>
              <select style="font-family: Century Gothic;" name="nSibling" id="nSibling">
                                <option>0</option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
              </select> -->

                            <h5>SIBLING NAME &amp; EDUCATIONAL ATTAINMENT <b style = "color: red;">*</b></h5>
                            <div class="form-group">
                            <div id='TextBoxesGroup3'>
                            <div id="TextBoxDiv1">

                            </div></div>
                            <button type="button" style="width:49%; font-family: Century Gothic;" value='Add' id='addButton3' class="cancelbtn3">Add Sibling</button>
                            <button type="button" style="width:49%; font-family: Century Gothic;" value='Add' id='removeButton3' class="cancelbtn3">Remove Sibling</button>
                            </div>
                            <br>
                           <h5>NUMBER OF SIBLINGS CURRENTLY ENROLLED AT DNSC <b style = "color: red;">*</b></h5>
                            <select style="font-family: Century Gothic; width: 100%;" name="sibling2" class="sibling2" id="sibling2">
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                            </select>

                            <h5>NAME OF HIGH SCHOOL &amp; YEAR GRADUATED <b style = "color: red;">*</b></h5>
                            <input type="text" style="font-family: Century Gothic; width: 54%;" placeholder = "Complete Name of the School" id = "hsGraduated" name = "hsGraduated">
                            <input id = "otherHS" class="otherHS" style="font-family: Century Gothic;" name="otherHS" disabled = "true" type="text" placeholder = "If others, please specify." hidden=true>
                            <select id="yearGrad" style="width: 40%; font-family: Century Gothic;" name="yearGrad" style="font-family: Century Gothic;">
                            <option>-Year Graduated-</option>
                            <?php $current_year = date("Y");
    for ($i = 1990; $i <= $current_year; $i++) {?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
}?>
                            </select>

                            <h5>TYPE OF HIGH SCHOOL ORIGIN <b style = "color: red;">*</b></h5>
                            <select id="hsType" name="hsType" style="font-family: Century Gothic;">
                                <option>–– Choose below ––</option>
                                <option>Public</option>
                                <option>Private</option>
                            </select>

              <h5>STANINE (OLSAT Result) <b style = "color: red;">*</b></h5>
              <select id="stanine" name="stanine" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <optgroup label="Low">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <optgroup label="Moderate">
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <optgroup label="High">
                <option>7</option>
                <option>8</option>
                <option>9</option>
              </select>

                            <?php
$connection = mysqli_connect("localhost", "root", "");
    if (!$connection) {
        die("Database connection failed: " . mysqli_error());
    }
    $db_select = mysqli_select_db("tryit", $connection);
    if (!$db_select) {
        die("Database selection failed: " . mysqli_error());
    }

    $result = mysqli_query("SELECT * FROM account WHERE username = '$login_session'", $connection);
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        ?>
                            <h5>EMAIL ADDRESS <b style = "color: red;">*</b></h5>
                            <input type="email" style = "font-family: Century Gothic;" name = "email" id = "email" value="<?php echo $row['email']; ?>" readonly="readonly" />

            <?php
}
    ?>

              <h5>CONTACT NUMBER <b style = "color: red;">*</b></h5>
              <input type="text" style="font-family: Century Gothic;" name="contact" id="contact" placeholder = "Telephone / Cellphone Number" maxlength="13" value="" autocomplete="off">


            </div><center>
            <input class="submit" type="submit" name="submit_first" id="submit_first" value="NEXT" /><br><br>
            </center>
          </div>

          <!-- #second_step -->
          <div id="second_step">
          <h1>Parent/Guardian Information</h1>
          <hr />
          <h5 style="font-family: Century Gothic;"><b>NOTE:</b> The social status of respondent in terms of <u>name of high school</u> &amp; <u>year graduated</u>, <u>ethnic origin</u>, <u>home address</u>, <u>highest educational attainment</u>, <u>religion</u> &amp; <u>dialect used</u>.
          <hr />
          </h5>
            <div class="form">

                <h5> ETHNIC ORIGIN </h5>
                <select id="ethnicSlct" style="font-family: Century Gothic;" name="ethnicSlct" onchange="Disable(this)">
                <option>–– Choose below ––</option>
                <option>Davawenyo</option>
                <option>Muslim</option>
                <option>Cebuano</option>
                <option>Mandaya</option>
                <option>Ilonggo</option>
                <option>Bagobo</option>
                <option>Manobo</option>
                <option>Ilocano</option>
                <option>Boholano</option>
                <option>Others</option>
              </select>

              <input id = "ethnicInput" style="font-family: Century Gothic;" name="ethnicInput" disabled = "true" type="text" placeholder = "If others, please specify." value="">

              <!-- <h5> HOME ADDRESS </h5>
              <select id="home" name="home" style="font-family: Century Gothic;">
                  <option>–– Choose below ––</option>
                <option>Within Panabo City</option>
                <option>Davao City</option>
                <option>Davao del Norte</option>
                <option>Comval Province</option>
                <option>Davao del Sur</option>
                <option>Davao Oriental</option>
                <option>Outside Region XI but w/in Mindanao</option>
                <option>Outside Mindanao</option>
              </select> -->

              <h5> FATHER'S INFORMATION </h5>
              <input type="text" style="font-family: Century Gothic;" class = "capitalize" name="fatherEd" id="fatherEd" placeholder = "Name" value="" autocomplete="off">
              <select id="fAttain" name="fAttain" style="font-family: Century Gothic;">
                <option>–– Educational Attainment ––</option>
                <option>Elementary Level</option>
                <option>Elementary Graduate</option>
                <option>High School Level</option>
                <option>High School Graduate</option>
                <option>College Level</option>
                <option>College Graduate</option>
                <option>Graduate School</option>
              </select>

                            <h5> OCCUPATION (Father) </h5>
                            <input type="text" style="width: 100%; font-family: Century Gothic;" id="occupationF" name="occupationF" />
                            <!-- <select id="occupationF" name="occupationF" style="font-family: Century Gothic;">
                                <option>–– Choose below ––</option>
                                <option>Government Employee</option>
                                <option>Private Employee</option>
                                <option>Business/Self-Employed</option>
                                <option>Fisherman/Farmer</option>
                                <option>OFW</option>
                                <option>NONE</option>
                            </select> -->

              <h5> MOTHER'S INFORMATION </h5>
              <input type="text" style="font-family: Century Gothic;" class = "capitalize" name="motherEd" id="motherEd" placeholder = "Name" value="" autocomplete="off">
              <select id="mAttain" name="mAttain" style="font-family: Century Gothic;">
                  <option>–– Educational Attainment ––</option>
                <option>Elementary Level</option>
                <option>Elementary Graduate</option>
                <option>High School Level</option>
                <option>High School Graduate</option>
                <option>College Level</option>
                <option>College Graduate</option>
                <option>Graduate School</option>
              </select>

                            <h5> OCCUPATION (Mother)</h5>
                            <input type="text" style="width: 100%; font-family: Century Gothic;" id="occupationM" name="occupationM" />
                            <!-- <select id="occupationM" name="occupationM" style="font-family: Century Gothic;">
                                <option>–– Choose below ––</option>
                                <option>Government Employee</option>
                                <option>Private Employee</option>
                                <option>Business/Self-Employed</option>
                                <option>Fisherman/Farmer</option>
                                <option>OFW</option>
                                <option>NONE</option>
                            </select> -->

              <h5> RELIGION </h5>
                            <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT religionName from religion";
    $result = mysqli_query($sql);

    echo "<select name='religion' id='religion' style='font-family: Century Gothic;' onchange='Disable2(this)'>";
    echo "<option>–– Choose below ––</option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['religionName'] . "'>" . $row['religionName'] . "</option>";
    }
    echo "<option>Other Christian groups</option>";
    echo "</select>";
    ?>
              <input type="text" autocomplete="off" style="font-family: Century Gothic;" name="religionTwo" id="religionTwo" placeholder = "If other Christian groups, please specify..." value="">

              <h5> DIALECT/S SPOKEN </h5>
              <div class="checkbox">
                    <h6 style = "color: white; font-family: Century Gothic;"><input id = "chckbx1"  type="checkbox" name="chk1[]" value = "Visayan">Visayan<br>
                    <input type="checkbox" name="chk1[]"  value = "Tagalog" id = "chckbx2">Tagalog <br>
                    <input type="checkbox" name="chk1[]"  value = "English" id = "chckbx3">English <br>
                            <input type="checkbox" name="chk1[]"  value = "Dabawenyo" id = "chckbx4">Dabawenyo <br>
                            <input type="checkbox" name="chk1[]"  value = "Ilocano" id = "chckbx5">Ilocano <br>
                            <input type="checkbox" name="chk1[]"  value = "Ilonggo" id = "chckbx6">Ilonggo <br>
                            <input type="checkbox" name="chk1[]"  value = "Muslim" id = "chckbx7">Muslim <br>
                    <input type="checkbox" id = "others"  name='others' onclick="enable_textDialect(this.checked)">
              <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherDialect"  disabled = "true" id = "otherDialect" placeholder = "If others, please specify." value="">
              </h6>
                </div>

                            <h5> SPECIAL SKILLS/TALENTS </h5>
                            <div class="checkbox">
                            <h6 style = "color: white; font-family: Century Gothic;"><input id = "c1"  type="checkbox" name="chk2[]" value = "Singing">Singing<br>
                            <input type="checkbox" name="chk2[]"  value = "Dancing" id = "c2">Dancing <br>
                            <input type="checkbox" name="chk2[]"  value = "Theater Arts" id = "c3">Theater Arts <br>
                            <input type="checkbox" name="chk2[]"  value = "Sports games" id = "c4">Sports games <br>
                            <input type="checkbox" name="chk2[]"  value = "Painting/Drawing" id = "c5">Painting/Drawing <br>
                            <input type="checkbox" name="chk2[]"  value = "Cooking/Baking" id = "c6">Cooking/Baking <br>
                            <input type="checkbox" name="chk2[]"  value = "Playing Musical Instrument" id = "c7">Playing Musical Instrument <br>
                            <input type="checkbox" id = "others"  name='others' onclick="enable_textSkills(this.checked)">
                            <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherSkills"  disabled = "true" id="otherSkills" placeholder = "If others, please specify." value="">
                            </h6>
                            </div>

                            <h5> TYPE OF DISABILITY (<i>If any, please check and specify</i>) </h5>
                            <div class="checkbox">
                            <h6 style = "color: white; font-family: Century Gothic;"><input id = "ch1"  type="checkbox" name="chk3[]" value = "Psychosocial Disability">Psychosocial Disability<br>
                            <input type="checkbox" name="chk3[]"  value = "Chronic Illness" id = "ch2">Chronic Illness<br>
                            <input type="checkbox" name="chk3[]"  value = "Hearing Disability" id = "ch3">Hearing Disability <br>
                            <input type="checkbox" name="chk3[]"  value = "Visual Disability" id = "ch4">Visual Disability <br>
                            <input type="checkbox" name="chk3[]"  value = "Learning Disability" id = "ch5">Learning Disability <br>
                            <input type="checkbox" name="chk3[]"  value = "Speech Impairment" id = "ch6">Speech Impairment <br>
                            <input type="checkbox" name="chk3[]"  value = "Mental Disability" id = "ch7">Mental Disability <br>
                            <input type="checkbox" id = "others"  name='others' onclick="enable_textDisability(this.checked)">
                            <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherDisability"  disabled = "true" id="otherDisability" placeholder = "If others, please specify." value="">
                            </h6>
                            </div>

                            <h5> HANDEDNESS </h5>
                            <div class="checkbox">
                            <h6 style = "color: white; font-family: Century Gothic;"><input type="checkbox" name="chk4[]" value = "Right" id = "checkbx1">Right
                            <input type="checkbox" name="chk4[]"  value = "Left" id = "checkbx2">Left
                            </h6>
                            </div>

                            <h5> PROBLEMS ENCOUNTERED </h5>
                            <div class="checkbox">
                            <h6 style = "color: white; font-family: Century Gothic;"><input id = "chbx1"  type="checkbox" name="chk5[]" value = "Parents working abroad">Parents working abroad<br>
                            <input type="checkbox" name="chk5[]"  value = "Family problem" id = "chbx2">Family problem<br>
                            <input type="checkbox" name="chk5[]"  value = "Separated parents" id = "chbx3">Separated parents <br>
                            <input type="checkbox" name="chk5[]"  value = "Finances" id = "chbx4">Finances <br>
                            <input type="checkbox" name="chk5[]"  value = "Personal/Emotional problem" id = "chbx5">Personal/Emotional problem <br>
                            <input type="checkbox" name="chk5[]"  value = "Lack of time-management" id = "chbx6">Lack of time-management <br>
                            <input type="checkbox" name="chk5[]"  value = "Peer pressure" id = "chbx7">Peer pressure <br>
                            <input type="checkbox" name="chk5[]"  value = "Low academic performance" id = "chbx8">Low academic performance <br>
                            <input type="checkbox" name="chk5[]"  value = "Relationship with same sex" id = "chbx9">Relationship with same sex <br>
                            <input type="checkbox" name="chk5[]"  value = "Relationship with opposite sex" id = "chbx10">Relationship with opposite sex <br>
                            <input type="checkbox" name="chk5[]"  value = "Computer addiction" id = "chbx11">Computer addiction <br>
                            <input type="checkbox" id = "others"  name='others' onclick="enable_textProblems(this.checked)">
                            <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherProblems"  disabled = "true" id="otherProblems" placeholder = "If others, please specify." value="">
                            </h6>
                            </div>
                <!--<input type="text" name="dialect" class = "capitalize" id="dialect" placeholder = "Other dialect (Please specify...)" value=""> -->
              <!--<h5>Email Address</h5>
              <input type="text" name="email address" id="email" value="" />-->

            </div><center>
            <input class="submitprv" type="submit" name="prev" id="prev" value="PREVIOUS" />
            <input class="submit" type="submit" name="submit_second" id="submit_second" value="NEXT" /><br><br>
            </center>
          </div>
          <!-- #third_step -->
          <div id="third_step">
          <h1>Socio-Economic Status</h1>
          <hr />
          <h5><b>NOTE:</b> The economic status of college student's parents in terms of <u>occupation</u>, <u>employment status</u>, <u>monthly income</u>, <u>family size</u>, <u>house</u>, <u>residential lot</u>, <u>light facilities used</u>, <u>water supply</u>, <u>type of toilet used</u>, <u>transporation</u>, <u>appliances</u> &amp; <u>furniture</u>.
          <hr />
          </h5>
            <div class="form">
              <h5> FAMILY MONTHLY INCOME (Total income including incomes of parents)</h5>
              <select id="income" name="income" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option>P7,500 &amp; below</option>
                <option>P7,501 - P15,000</option>
                <option>P15,001 - P22,500</option>
                <option>P22,501 - P30,000</option>
                <option>P30,001 &amp; above</option>
              </select>
              <h5> STATUS OF THE HOUSE WHERE YOU LIVE</h5>
              <select id="house" name="house" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option>Owned</option>
                <option>Rented/Leased</option>
                <option>None</option>
              </select>
              <h5> STATUS OF THE RESIDENTIAL LOT WHERE YOU LIVE</h5>
              <select id="lot" name="lot" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option>Owned</option>
                <option>Rented/Leased</option>
                <option>None</option>
              </select>
              <h5> LIGHT FACILITIES USED </h5>
              <select id="light" name="light" style="font-family: Century Gothic;" onchange="disableLight(this)">
                <option>–– Choose below ––</option>
                <option>Electricity</option>
                <option>Petroleum</option>
                <option>Others</option>
              </select>
              <input type="text" autocomplete="off" style="font-family: Century Gothic;" name="otherLight" disabled = "true" id="otherLight" placeholder = "If others, please specify." value="">

              <h5> MEANS OF WATER SUPPLY</h5>
              <select id="water" name="water" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option>Open Well</option>
                <option>Hand Pump</option>
                <option>Electric Pump</option>
                <option>Rain</option>
                <option>Dumoy</option>
                <option>NAWASA</option>
              </select>

              <h5> TYPE OF TOILET USED</h5>
              <select id="toilet" name="toilet" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option>Flush Type</option>
                <option>Antipolo (Closed Pit)</option>
                <option>Public Toilet</option>
                <option>None</option>
              </select>

              <h5> POSSESSION OF TRANSPORTATION </h5>
              <select id="transport" name="transport" style="font-family: Century Gothic;" onchange="disableTransport(this)">
                <option>–– Choose below ––</option>
                <option>Car</option>
                <option>Jeepney</option>
                <option>Motorcycle/Tricycle</option>
                <option>Trisikad/Bicycle</option>
                <option>None</option>
                <option>Others</option>
              </select>
                <input type="text" autocomplete="off" style="font-family: Century Gothic;" name="otherTransport" disabled = "true" id="otherTransport" placeholder = "If others, please specify." value="">

              <h5> APPLIANCES OWNED </h5>
              <div class="checkbox">
                    <h6 style = "color: white; font-family: Century Gothic;"><input type="checkbox" class="cc" name="check[]" value = "Refrigerator" id = "check1" > Refrigerator<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Gas Range" id = "check2">Gas Range<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Stereo/CD/Radio" id = "check3">Stereo/CD/Radio<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Electric Iron" id = "check4">Electric Iron<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Air Conditioner" id = "check5">Air Conditioner<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Electric Fan" id = "check6">Electric Fan<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Gas Stove" id = "check7">Gas Stove<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Sewing Machine" id = "check8">Sewing Machine<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Computer" id = "check9">Computer<br>
                    <input type="checkbox" class="cc" name="check[]" value = "TV" id = "check10">TV<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Tape Recorder" id = "check11">Tape Recorder<br>
                     </h6>
                </div>
                <input type="checkbox" id = "check12" name=others onclick="enable_textAppliances(this.checked)">
                <input type="text" autocomplete="off" style="font-family: Century Gothic;" name="otherAppliances" id="otherAppliances" disabled = "true" placeholder = "If others, please specify." value="">

                <h5> FURNITURE OWNED </h5>
                <h6 style = "color: white; font-family: Century Gothic;">
                <input type="checkbox" class = "furniture" name="furniture[]" value="Sala set" id = "f1">Sala set<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Cabinet for plate" id = "f2">Cabinet for plate<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Dining set" id = "f3">Dining set<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Bed" id = "f4">Bed<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Cabinet for clothing" id = "f5">Cabinet for clothing<br>
                </h6>
                <input type="checkbox" id = "checkFurniture" name=othersf onclick="enable_textFurniture(this.checked)">
                <input type="text" autocomplete="off" style="font-family: Century Gothic; width: 50%;" name="otherFurniture" id="otherFurniture" disabled = "true" placeholder = "If others, please specify." value="">
            </div>      <div class="clear"></div><center>
            <input class="submitprv" type="submit" name="prev2" id="prev2" value="PREVIOUS" />
            <input class="submit" type="submit" name="submit_third" id="submit_third" onclick="checkCheckBoxes(this);" value="FINISH" /><br><br>
            <center>

          </div>    <div class="clear"></div>


          <!-- #fourth_step -->
          <div id="fourth_step">
          <h1>YOUR PROFILE</h1>
            <div class="form">
              <table>
                <tr><td><h2 style="font-family: Century Gothic;">PERSONAL DATA</h2></td><td id = "dash" style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Student Type</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">School Year and Semester</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Name</td><td  style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Permanent Address</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Present Address</td><td></td></tr>
                <tr><td style="font-family: Century Gothic;">Course</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Birthday and Age</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Gender</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Marital Status</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Nationality</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Height</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Weight</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Sibling Name and Educational Attainment</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">No. of siblings enrolled at DNSC</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Name of High School &amp; Year Graduated</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">High School Type Origin</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Stanine (OLSAT Result)</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Email Address</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Contact Number</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td><h2 style="font-family: Century Gothic;">SOCIAL STATUS</h2></td><td id = "dash" style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Ethnic Origin</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Father's Information</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Mother's Information</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Religion</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Dialect/s spoken</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Special skills/talents</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Type of Disability</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Handedness</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Problems Encountered</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td><h2 style="font-family: Century Gothic;">ECONOMIC STATUS</h2></td><td id = "dash" style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Family Monthly Income</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Status of the house</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Status of residential lot</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Light facilities</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Means of water supply</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Type of toilet used</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Possession of transportation</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Appliances owned</td><td style="font-family: Century Gothic;"></td></tr>
                <tr><td style="font-family: Century Gothic;">Furniture owned</td><td style="font-family: Century Gothic;"></td></tr>
              </table>
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix --><center>
            <input class="submitprv" type="submit" name="prev3" id="prev3" value="REVIEW" />
            <input class="send submit" type="submit" name="submit_fourth" id="submit_fourth" value="SUBMIT" /><br><br>
            <div id="forSuccess">Sent successfully!</div>
            <div id="forError">Failed to send.</div>
            </center>
          </div>
        </form>

      </div>
    </div>
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

<?php
}
?>