<?php
include 'session.php';

if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
    header("Location: socioLogin.php");
}
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
<script type="text/javascript" src="js2/updateJQuery.js"></script>
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
<script>
  $(document).ready(function() {
  $( "#nominee_one_dob" ).datepicker({
    changeMonth: true,
    changeYear: true,
    dateFormat: 'mm-dd-yy',

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
</script>
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
<script type="text/javascript">

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
</script>

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
$id     = $_GET['id'];
$result = mysqli_query("SELECT * FROM personal WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
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
          <div id="first_step">
          <div class="form">
          <h1>Student's Personal Data </h1>
          <hr />
          </h5><br>
                    <h5>STATUS</h5>
                    <select id = "type" class="type" name = "type" style="font-family: Century Gothic; width: 100%;">
                        <option <?php $row['type'] == 'NEW STUDENT' ? print "selected" : "";?> value = "NEW STUDENT">NEW STUDENT</option>
                        <option <?php $row['type'] == 'TRANSFEREE STUDENT' ? print "selected" : "";?> value = "TRANSFEREE STUDENT">A TRANSFEREE STUDENT</option>
                    </select>
                    <b style = "color: red;">*</b>

                    <h5>SCHOOL YEAR &amp; SEMESTER <b style = "color: red;">*</b></h5>
                            <select class="schoolYear" id="schoolYear" name="schoolYear" style="font-family: Century Gothic;">
                            <?php $current_year = date("Y");
    for ($i = 2013; $i <= $current_year; $i++) {?>
                            <option <?php $row['schoolYr'] == $i . "-" . ($i + 1) ? print "selected" : "";?> value="<?php echo $i . "-" . ($i + 1); ?>"><?php echo $i . "-" . ($i + 1); ?></option>
                            <?php
}?>
                            </select>
                    <select id = "semester" name = "semester" class = "semester" style="font-family: Century Gothic;">
                        <option <?php $row['semester'] == 'First Semester' ? print "selected" : "";?>>First Semester</option>
                        <option <?php $row['semester'] == 'Second Semester' ? print "selected" : "";?>>Second Semester</option>
                    </select>
              <h5>FULL NAME <b style = "color: red;">*</b></h5>
              <input type="text" style="font-family: Century Gothic;" name="lname" id="lname" pattern = [a-zA-Z]+ placeholder = "Last Name"  value="<?php echo $row['lastname']; ?>" autocomplete="off"/>
              <input type="text" style="font-family: Century Gothic;" name="fname" id="fname" placeholder = "First Name"  value="<?php echo $row['firstname']; ?>" autocomplete="off" />
              <input type="text" style="font-family: Century Gothic;" name="mname" id="mname" placeholder = "Middle Name"  value="<?php echo $row['midname']; ?>" autocomplete="off" />

            <h5>PERMANENT ADDRESS <b style = "color: red;">*</b></h5>
            <input type = 'text' name='s1' id='s1' style='font-family: Century Gothic;' placeholder = 'Province' value="<?php echo $row['permanentProvince']; ?>" >
            <input type = 'text' name='s2' id='s2' class='city' style='font-family: Century Gothic;' placeholder = 'City' value="<?php echo $row['permanentCity']; ?>">
            <input type = 'text' name='s3' id='s3' style='font-family: Century Gothic;' class='brgy' placeholder = 'Brgy' value="<?php echo $row['permanentBrgy']; ?>">
            <input type="text" style="font-family: Century Gothic;" name="shouseNumber" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "shouseNumber" value="<?php echo $row['permanentNum']; ?>">
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

                    <h5>PRESENT ADDRESS <b style = "color: red;">*</b></h5>
                    <div id="dependent-box">

                            <!-- <input type="text" name="ss1" id = "ss1" placeholder = "Province">
                            <input type="text" name="ss2"  id = "ss2" placeholder = "City">
                            <input type="text" name="ss3" id = "ss3" placeholder = "Brgy">
                            <input type="text" name="sshouseNumber" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "sshouseNumber"> -->

                            <input type = 'text' name='ss1' id='ss1' class='city' style='font-family: Century Gothic;' placeholder = 'Province' value="<?php echo $row['presentProvince']; ?>">

                          <input type = 'text' name='ss2' id='ss2' class='city' style='font-family: Century Gothic;'  placeholder = 'City' value="<?php echo $row['presentCity']; ?>">

                      <input type = 'text' name='ss3' id='ss3' style='font-family: Century Gothic;' class='brgy'  placeholder = 'Brgy' value="<?php echo $row['presentBrgy']; ?>">
                            <input type="text" name="sshouseNumber" style="font-family: Century Gothic;" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "sshouseNumber" value="<?php echo $row['presentNum']; ?>">
                          </div>

              <h5>COURSE <b style = "color: red;">*</b></h5>
              <select id="course" name="course" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option <?php $row['course'] == 'Bachelor of Science in Information Technology (BSIT)' ? print "selected" : "";?>>Bachelor of Science in Information Technology (BSIT)</option>
                <option <?php $row['course'] == 'Bachelor of Science in Food Technology (BSFT)' ? print "selected" : "";?>>Bachelor of Science in Food Technology (BSFT)</option>
                <option <?php $row['course'] == 'Bachelor of Science in Marine Biology (BSMB)' ? print "selected" : "";?>>Bachelor of Science in Marine Biology (BSMB)</option>
                <option <?php $row['course'] == 'Bachelor of Public Administration (BPA)' ? print "selected" : "";?>>Bachelor of Public Administration (BPA)</option>
                <optgroup label="Bachelor of Secondary Education (BSEd)">
                <option <?php $row['course'] == 'BSE major in English' ? print "selected" : "";?>>BSE major in English</option>
                <option <?php $row['course'] == 'BSE major in Biological Science' ? print "selected" : "";?>>BSE major in Biological Science</option>
                <option <?php $row['course'] == 'BSE major in Mathematics' ? print "selected" : "";?>>BSE major in Mathematics</option>
                <option <?php $row['course'] == 'BSE major in Technology and Livelihood Education' ? print "selected" : "";?>>BSE major in Technology and Livelihood Education</option>
                <optgroup label="Bachelor of Science in Fisheries (BSFi)">
                <option <?php $row['course'] == 'BSFi major in Fish Culture' ? print "selected" : "";?>>BSFi major in Fish Culture</option>
                <option <?php $row['course'] == 'BSFi major in Fish Capture' ? print "selected" : "";?>>BSFi major in Fish Capture</option>
                <option <?php $row['course'] == 'BSFi major in Fish Processing' ? print "selected" : "";?>>BSFi major in Fish Processing</option>

              </select>

              <h5>BIRTHDAY</h5>
              <input type="text" name="nominee_one_dob" style="font-family: Century Gothic;" id="nominee_one_dob" value="<?php echo $row['bdate']; ?>">
              <input type="text" placeholder = "Your age" name = "age" id="age" style="font-family: Century Gothic;" value="<?php echo $row['age']; ?>">

              <h5>GENDER <b style = "color: red;">*</b></h5>
              <select id="gender" name="gender" style="font-family: Century Gothic;">
              <option>–– Choose below ––</option>
              <option <?php $row['gender'] == 'Female' ? print "selected" : "";?>>Female</option>
              <option <?php $row['gender'] == 'Male' ? print "selected" : "";?>>Male</option>
              </select>

              <h5>MARITAL STATUS <b style = "color: red;">*</b></h5>
              <select id="status" name="status" style="font-family: Century Gothic;" onchange="Status(this)">
                <option>–– Choose below ––</option>
                <option <?php $row['mstatus'] == 'Single' ? print "selected" : "";?>>Single</option>
                <option <?php $row['mstatus'] == 'Married' ? print "selected" : "";?>>Married</option>
                <option <?php $row['mstatus'] == 'Separated' ? print "selected" : "";?>>Separated</option>
                <option <?php $row['mstatus'] == 'Widow' ? print "selected" : "";?>>Widow</option>
              </select>
              <input type="text" name = "spouse" id = "spouse" <?php if ($row['mstatus'] != "Married") {print "disabled";} else {print "";}?>  style="font-family: Century Gothic; width: 100%;" placeholder = "If married, name of spouse" value="<?php echo $row['spouse']; ?>">
              <h5>NATIONALITY <b style = "color: red;">*</b></h5>
              <input type="text" style="font-family: Century Gothic" name = "nationality" id = "nationality" placeholder = "State your nationality" value="<?php echo $row['nationality']; ?>" />
              <strong style = "color: white;">HEIGHT <b style = "color: red;">*</b></strong>
              <input type="text" name = "height" style="font-family: Century Gothic;" placeholder = "in cm/ft" id = "height" value="<?php echo $row['height']; ?>"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <strong style = "color: white;">WEIGHT <b style = "color: red;">*</b></strong>
              <input type="text" style="font-family: Century Gothic;" name = "weight" placeholder = "in kg" id = "weight" value="<?php echo $row['weight']; ?>"/>

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


                            <input type="text" style = "font-family: Century Gothic;" name="mytext[]" id = "sib" placeholder="Name" value="<?php echo $row['siblingsName']; ?>">&nbsp;<input type="text" id="sibling" style = "font-family: Century Gothic;" name="sibling" value="<?php echo $row['siblingsEduc']; ?>">
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
                                <option <?php $row['numSiblingDNSC'] == '0' ? print "selected" : "";?>>0</option>
                                <option <?php $row['numSiblingDNSC'] == '1' ? print "selected" : "";?>>1</option>
                                <option <?php $row['numSiblingDNSC'] == '2' ? print "selected" : "";?>>2</option>
                                <option <?php $row['numSiblingDNSC'] == '3' ? print "selected" : "";?>>3</option>
                                <option <?php $row['numSiblingDNSC'] == '4' ? print "selected" : "";?>>4</option>
                                <option <?php $row['numSiblingDNSC'] == '5' ? print "selected" : "";?>>5</option>
                                <option <?php $row['numSiblingDNSC'] == '6' ? print "selected" : "";?>>6</option>
                                <option <?php $row['numSiblingDNSC'] == '7' ? print "selected" : "";?>>7</option>
                                <option <?php $row['numSiblingDNSC'] == '8' ? print "selected" : "";?>>8</option>
                                <option <?php $row['numSiblingDNSC'] == '9' ? print "selected" : "";?>>9</option>
                                <option <?php $row['numSiblingDNSC'] == '10' ? print "selected" : "";?>>10</option>
                            </select>

                            <h5>NAME OF HIGH SCHOOL &amp; YEAR GRADUATED <b style = "color: red;">*</b></h5>
                            <input type="text" style="font-family: Century Gothic; width: 54%;" placeholder = "Complete Name of the School" id = "hsGraduated" name = "hsGraduated" value="<?php echo $row['hs']; ?>">
                            <input id = "otherHS" class="otherHS" style="font-family: Century Gothic;" name="otherHS" disabled = "true" type="text" placeholder = "If others, please specify." hidden=true>
                            <select id="yearGrad" style="width: 40%; font-family: Century Gothic;" name="yearGrad" style="font-family: Century Gothic;">
                            <option>-Year Graduated-</option>
                            <?php $current_year = date("Y");
    for ($i = 1990; $i <= $current_year; $i++) {?>
                            <option <?php $row['yearGrad'] == $i ? print "selected" : "";?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
}?>
                            </select>

                            <h5>TYPE OF HIGH SCHOOL ORIGIN <b style = "color: red;">*</b></h5>
                            <select id="hsType" name="hsType" style="font-family: Century Gothic;">
                                <option>–– Choose below ––</option>
                                <option <?php $row['hstype'] == 'Public' ? print "selected" : "";?>>Public</option>
                                <option <?php $row['hstype'] == 'Private' ? print "selected" : "";?>>Private</option>
                            </select>

              <h5>STANINE (OLSAT Result) <b style = "color: red;">*</b></h5>
              <select id="stanine" name="stanine" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <optgroup label="Low">
                <option <?php $row['stanine'] == '1' ? print "selected" : "";?>>1</option>
                <option <?php $row['stanine'] == '2' ? print "selected" : "";?>>2</option>
                <option <?php $row['stanine'] == '3' ? print "selected" : "";?>>3</option>
                <optgroup label="Moderate">
                <option <?php $row['stanine'] == '4' ? print "selected" : "";?>>4</option>
                <option <?php $row['stanine'] == '5' ? print "selected" : "";?>>5</option>
                <option <?php $row['stanine'] == '6' ? print "selected" : "";?>>6</option>
                <optgroup label="High">
                <option <?php $row['stanine'] == '7' ? print "selected" : "";?>>7</option>
                <option <?php $row['stanine'] == '8' ? print "selected" : "";?>>8</option>
                <option <?php $row['stanine'] == '9' ? print "selected" : "";?>>9</option>
              </select>

                            <h5>EMAIL ADDRESS <b style = "color: red;">*</b></h5>
                            <input type="email" style = "font-family: Century Gothic;" name = "email" id = "email" value="<?php echo $row['email']; ?>" />

              <h5>CONTACT NUMBER <b style = "color: red;">*</b></h5>
              <input type="text" style="font-family: Century Gothic;" name="contact" id="contact" placeholder = "Telephone / Cellphone Number" maxlength="13" value="<?php echo $row['contactNumber']; ?>" autocomplete="off">
                        <?php
}
?>

            </div><center>
           <input class="send submit" type="submit" name="cancel" id="cancel" value="CANCEL" />
            <input class="send submit" type="submit" name="update_personal" id="update_personal" value="UPDATE" /><br><br>
            <div id="forSuccess">Your profile has been updated!</div>
            <div id="forError">Failed to update.</div>
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