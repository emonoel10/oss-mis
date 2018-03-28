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
<!--
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
-->
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
    <h2 style="font-family: Century Gothic;"><center>UPDATE SOCIO - ECONOMIC STATUS</center></h2>
    <hr>
  <h5><center><b>I. DIRECTIONS:</b> Fill in the text fields with the information called for or check mark <br> in the box that corresponds to your appropriate answer.</center></h5>
  <div class="main">
    <div class="content">
    <h1 style="font-family: Century Gothic; color: black;" id = "user"><?php echo $login_session; ?></h1>
    <p style="font-family: Century Gothic; text-align: center; color: white;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_session; ?></b>. (<a href = "logout.php" style="text-decoration: none; color: white;">Log out</a>)
      <div id="container" >
        <form action="userInfo.php" id = 'myForm' name='myForm' method='post'"">
          <!-- #first_step -->
          <div class="form">
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
$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
          <!-- #third_step -->
          <h1>Socio-Economic Status</h1>
          <hr />
          <h5><b>NOTE:</b> The economic status of college student's parents in terms of <u>occupation</u>, <u>employment status</u>, <u>monthly income</u>, <u>family size</u>, <u>house</u>, <u>residential lot</u>, <u>light facilities used</u>, <u>water supply</u>, <u>type of toilet used</u>, <u>transporation</u>, <u>appliances</u> &amp; <u>furniture</u>.
          <hr />
          </h5>
            <div class="form">
              <h5> ETHNIC ORIGIN </h5>
              <select id="ethnicSlct" style = "font-family: Century Gothic;" name="ethnicSlct" onchange="Disable(this)">
                <option>–– Choose below ––</option>
                <option <?php $row['ethnic'] == 'Davawenyo' ? print "selected" : "";?>>Davawenyo</option>
                <option <?php $row['ethnic'] == 'Muslim' ? print "selected" : "";?>>Muslim</option>
                <option <?php $row['ethnic'] == 'Visayan' ? print "selected" : "";?>>Visayan</option>
                <option <?php $row['ethnic'] == 'Tagalog' ? print "selected" : "";?>>Tagalog</option>
                <option <?php $row['ethnic'] == 'Others' ? print "selected" : "";?>>Others</option>
              </select>

              <input id = "ethnicInput" autocomplete="off" style = "font-family: Century Gothic;" name="ethnicInput" disabled = "true" type="text" placeholder = "If others, please specify." value="<?php echo $row['otherethnic']; ?>">

                          <h5> FATHER'S INFORMATION</h5>
                          <input type="text" autocomplete="off" style = "font-family: Century Gothic;" class = "capitalize" name="fatherEd" id="fatherEd" value="<?php echo $row['father']; ?>">
                          <select id="fAttain" name="fAttain" style="font-family: Century Gothic;">
                          <option>–– Educational Attainment ––</option>
                          <option <?php $row['attainfather'] == 'Elementary Level' ? print "selected" : "";?>>Elementary Level</option>
                          <option <?php $row['attainfather'] == 'Elementary Graduate' ? print "selected" : "";?>>Elementary Graduate</option>
                          <option <?php $row['attainfather'] == 'High School Level' ? print "selected" : "";?>>High School Level</option>
                          <option <?php $row['attainfather'] == 'High School Graduate' ? print "selected" : "";?>>High School Graduate</option>
                          <option <?php $row['attainfather'] == 'College Level' ? print "selected" : "";?>>College Level</option>
                          <option <?php $row['attainfather'] == 'College Graduate' ? print "selected" : "";?>>College Graduate</option>
                          <option <?php $row['attainfather'] == 'Graduate School' ? print "selected" : "";?>>Graduate School</option>
                        </select>

                            <h5> OCCUPATION (Father) </h5>
              <input type="text" style="width: 100%; font-family: Century Gothic;" id="occupationF" name="occupationF" value="<?php echo $row['fatherOccup']; ?>" />

              <h5> MOTHER'S INFORMATION </h5>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" class = "capitalize" name="motherEd" id="motherEd" value="<?php echo $row['mother']; ?>">
              <select id="mAttain" style = "font-family: Century Gothic;" name="mAttain">
                <option>–– Educational Attainment ––</option>
                <option <?php $row['attainmother'] == 'Elementary Level' ? print "selected" : "";?>>Elementary Level</option>
                <option <?php $row['attainmother'] == 'Elementary Graduate' ? print "selemothercted" : "";?>>Elementary Graduate</option>
                <option <?php $row['attainmother'] == 'High School Level' ? print "selected" : "";?>>High School Level</option>
                <option <?php $row['attainmother'] == 'High School Graduate' ? print "selected" : "";?>>High School Graduate</option>
                <option <?php $row['attainmother'] == 'College Level' ? print "selected" : "";?>>College Level</option>
                <option <?php $row['attainmother'] == 'College Graduate' ? print "selected" : "";?>>College Graduate</option>
                <option <?php $row['attainmother'] == 'Graduate School' ? print "selected" : "";?>>Graduate School</option>
              </select>

                            <h5> OCCUPATION (Mother)</h5>
                             <input type="text" style="width: 100%; font-family: Century Gothic;" id="occupationM" name="occupationM" value="<?php echo $row['motherOccup']; ?>" />
<?php

}

?>
              <h5> RELIGION </h5>
              <?php
mysqli_connect('localhost', 'root', '');
mysqli_select_db('tryit');

$sql    = "SELECT religionName from religion";
$result = mysqli_query($sql);

echo "<select name='religion' id='religion' style='font-family: Century Gothic;' onchange='Disable2(this)'>";
echo "<option>–– Choose below ––</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['religionName'] . "' selected>" . $row['religionName'] . "</option>";
}
?>
              <option <?php $row['religiony5f5rf5rfr5fr5f'] == '' ? print "selected" : "";?>>Other Christian groups</option>
              <?php
echo "</select>";
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
$id     = $_GET['id'];
$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="religionTwo" id="religionTwo" placeholder = "If other Christian groups, please specify." value="<?php echo $row['otherreligion']; ?>">

              <h5> DIALECT/S SPOKEN </h5>
              <div class="checkbox">
              <?php
$checked = explode(', ', $row['dialect']);
    ?>
                    <h6 style = "color: white; font-family: Century Gothic;">
              <input id = "chckbx1"  type="checkbox" name="chk1[]" value = "Visayan" <?php in_array('Visayan', $checked) ? print "checked" : "";?>>Visayan<br>
              <input type="checkbox" name="chk1[]"  value = "Tagalog" id = "chckbx2" <?php in_array('Tagalog', $checked) ? print "checked" : "";?>>Tagalog <br>
              <input type="checkbox" name="chk1[]"  value = "English" id = "chckbx3" <?php in_array('English', $checked) ? print "checked" : "";?>>English <br>
              <input type="checkbox" name="chk1[]"  value = "Dabawenyo" id = "chckbx4" <?php in_array('Dabawenyo', $checked) ? print "checked" : "";?>>Dabawenyo <br>
              <input type="checkbox" name="chk1[]"  value = "Ilocano" id = "chckbx5" <?php in_array('Ilocano', $checked) ? print "checked" : "";?>>Ilocano <br>
              <input type="checkbox" name="chk1[]"  value = "Ilonggo" id = "chckbx6" <?php in_array('Ilonggo', $checked) ? print "checked" : "";?>>Ilonggo <br>
              <input type="checkbox" name="chk1[]"  value = "Muslim" id = "chckbx7" <?php in_array('Muslim', $checked) ? print "checked" : "";?>>Muslim <br>
              <input type="checkbox" id = "others"  name='others' onclick="enable_textDialect(this.checked)" <?php if ($row['otherdialect'] == '') {"";} else {print "checked";}?>>
              <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherDialect" <?php if ($row['otherdialect'] == '') {print "disabled";}?> id = "otherDialect" placeholder = "If others, please specify." value="<?php echo $row['otherdialect']; ?>">
              </h6>

            </div>

              <h5> SPECIAL SKILLS/TALENTS </h5>
                            <div class="checkbox">
                             <?php
$checked = explode(', ', $row['skills']);
    ?>
                            <h6 style = "color: white; font-family: Century Gothic;"><input id = "c1"  type="checkbox" name="chk2[]" value = "Singing" <?php in_array('Singing', $checked) ? print "checked" : "";?>>Singing<br>
                            <input type="checkbox" name="chk2[]"  value = "Dancing" id = "c2" <?php in_array('Dancing', $checked) ? print "checked" : "";?>>Dancing <br>
                            <input type="checkbox" name="chk2[]"  value = "Theater Arts" id = "c3" <?php in_array('Theater Arts', $checked) ? print "checked" : "";?>>Theater Arts <br>
                            <input type="checkbox" name="chk2[]"  value = "Sports games" id = "c4" <?php in_array('Sports games', $checked) ? print "checked" : "";?>>Sports games <br>
                            <input type="checkbox" name="chk2[]"  value = "Painting/Drawing" id = "c5" <?php in_array('Painting/Drawing', $checked) ? print "checked" : "";?>>Painting/Drawing <br>
                            <input type="checkbox" name="chk2[]"  value = "Cooking/Baking" id = "c6" <?php in_array('Cooking/Baking', $checked) ? print "checked" : "";?>>Cooking/Baking <br>
                            <input type="checkbox" name="chk2[]"  value = "Playing Musical Instrument" id = "c7" <?php in_array('Playing Musical Instrument', $checked) ? print "checked" : "";?>>Playing Musical Instrument <br>
                            <input type="checkbox" id = "others"  name='others' onclick="enable_textSkills(this.checked)" <?php if ($row['otherSkills'] == '') {"";} else {print "checked";}?>>
                            <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherSkills" id="otherSkills" placeholder = "If others, please specify." value="<?php echo $row['otherSkills']; ?>" <?php if ($row['otherSkills'] == '') {print "disabled";}?>>
                            </h6>
                            </div>

                            <h5> TYPE OF DISABILITY (<i>If any, please check and specify</i>) </h5>
                            <div class="checkbox">
                             <?php
$checked = explode(', ', $row['disability']);
    ?>
                            <h6 style = "color: white; font-family: Century Gothic;"><input id = "ch1"  type="checkbox" name="chk3[]" value = "Psychosocial Disability" <?php in_array('Psychosocial Disability', $checked) ? print "checked" : "";?>>Psychosocial Disability<br>
                            <input type="checkbox" name="chk3[]"  value = "Chronic Illness" id = "ch2" <?php in_array('Chronic Illness', $checked) ? print "checked" : "";?>>Chronic Illness<br>
                            <input type="checkbox" name="chk3[]"  value = "Hearing Disability" id = "ch3" <?php in_array('Hearing Disability', $checked) ? print "checked" : "";?>>Hearing Disability <br>
                            <input type="checkbox" name="chk3[]"  value = "Visual Disability" id = "ch4" <?php in_array('Visual Disability', $checked) ? print "checked" : "";?>>Visual Disability <br>
                            <input type="checkbox" name="chk3[]"  value = "Learning Disability" id = "ch5" <?php in_array('Learning Disability', $checked) ? print "checked" : "";?>>Learning Disability <br>
                            <input type="checkbox" name="chk3[]"  value = "Speech Impairment" id = "ch6" <?php in_array('Speech Impairment', $checked) ? print "checked" : "";?>>Speech Impairment <br>
                            <input type="checkbox" name="chk3[]"  value = "Mental Disability" id = "ch7" <?php in_array('Mental Disability', $checked) ? print "checked" : "";?>>Mental Disability <br>
                            <input type="checkbox" id = "others"  name='others' onclick="enable_textDisability(this.checked)" <?php if ($row['otherDisability'] == '') {"";} else {print "checked";}?>>
                            <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherDisability" id="otherDisability" placeholder = "If others, please specify." value="<?php echo $row['otherDisability']; ?>" <?php if ($row['otherDisability'] == '') {print "disabled";}?>>
                            </h6>
                            </div>

                            <h5> HANDEDNESS </h5>
                            <div class="checkbox">
                             <?php
$checked = explode(', ', $row['handedness']);
    ?>
                            <h6 style = "color: white; font-family: Century Gothic;"><input type="checkbox" name="chk4[]" value = "Right" id = "checkbx1" <?php in_array('Right', $checked) ? print "checked" : "";?>>Right
                            <input type="checkbox" name="chk4[]"  value = "Left" id = "checkbx2" <?php in_array('Left', $checked) ? print "checked" : "";?>>Left
                            </h6>
                            </div>

                            <h5> PROBLEMS ENCOUNTERED </h5>
                            <div class="checkbox">
                             <?php
$checked = explode(', ', $row['problems']);
    ?>
                            <h6 style = "color: white; font-family: Century Gothic;"><input id = "chbx1"  type="checkbox" name="chk5[]" value = "Parents working abroad" <?php in_array('Parents working abroad', $checked) ? print "checked" : "";?>>Parents working abroad<br>
                            <input type="checkbox" name="chk5[]"  value = "Family problem" id = "chbx2" <?php in_array('Family problem', $checked) ? print "checked" : "";?>>Family problem<br>
                            <input type="checkbox" name="chk5[]"  value = "Separated parents" id = "chbx3" <?php in_array('Separated parents', $checked) ? print "checked" : "";?>>Separated parents <br>
                            <input type="checkbox" name="chk5[]"  value = "Finances" id = "chbx4" <?php in_array('Finances', $checked) ? print "checked" : "";?>>Finances <br>
                            <input type="checkbox" name="chk5[]"  value = "Personal/Emotional problem" id = "chbx5" <?php in_array('Personal/Emotional problem', $checked) ? print "checked" : "";?>>Personal/Emotional problem <br>
                            <input type="checkbox" name="chk5[]"  value = "Lack of time-management" id = "chbx6" <?php in_array('Lack of time-management', $checked) ? print "checked" : "";?>>Lack of time-management <br>
                            <input type="checkbox" name="chk5[]"  value = "Peer pressure" id = "chbx7" <?php in_array('Peer pressure', $checked) ? print "checked" : "";?>>Peer pressure <br>
                            <input type="checkbox" name="chk5[]"  value = "Low academic performance" id = "chbx8" <?php in_array('Low academic performance', $checked) ? print "checked" : "";?>>Low academic performance <br>
                            <input type="checkbox" name="chk5[]"  value = "Relationship with same sex" id = "chbx9" <?php in_array('Relationship with same sex', $checked) ? print "checked" : "";?>>Relationship with same sex <br>
                            <input type="checkbox" name="chk5[]"  value = "Relationship with opposite sex" id = "chbx10" <?php in_array('Relationship with opposite sex', $checked) ? print "checked" : "";?>>Relationship with opposite sex <br>
                            <input type="checkbox" name="chk5[]"  value = "Computer addiction" id = "chbx11" <?php in_array('Computer addiction', $checked) ? print "checked" : "";?>>Computer addiction <br>
                            <input type="checkbox" id = "others"  name='others' onclick="enable_textProblems(this.checked)" <?php if ($row['otherProblems'] == '') {"";} else {print "checked";}?>>
                            <input type="text" style="font-family: Century Gothic; width: 50%;" autocomplete="off" name="otherProblems" id="otherProblems" placeholder = "If others, please specify." value="<?php echo $row['otherProblems']; ?>" <?php if ($row['otherProblems'] == '') {print "disabled";}?>>
                            </h6>
                            </div>

            <div class="clear"></div><center>
<?php
}

?>
          <?php
mysqli_close($connection);
?>
            <center>
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix --><center>
            <input class="send submit" type="submit" name="cancel" id="cancel" value="CANCEL" />
            <input class="send submit" type="submit" name="update_parent" id="update_parent" value="UPDATE" /><br><br>
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