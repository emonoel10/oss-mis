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
  $(document).ready(function() {
     //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        var max_fields = document.getElementById('nsib').value;
        while(x <= max_fields){ //max input box allowed

            $(wrapper).append('<div id="display"><h5> SIBLING\'S NAME &amp; EDUCATIONAL ATTAINMENT </h5><input type="text" style = "font-family: Century Gothic;" name="mytext[]" id = "sib" placeholder="Name">&nbsp;<select id="sibling" style = "font-family: Century Gothic;" name="sibling"><option>–– Educational Attainment ––</option><option>Elementary</option><option>High School</option><option>College</option><option>Graduate School</option></select><a href="#" id="remScnt" style="color: white;">Remove</a></div>'); //add input box
             x++; //text box increment
        }

        $('#remScnt').live('click', function(){
          if (x > 0){
            $(this).parents('#display').remove();
            x--;
          }
          return false;
        });
    });

    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
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

function enable_textFurniture(status)
{
status=!status;
    document.myForm.otherFurniture.disabled = status;
    document.myForm.otherFurniture.focus();
    document.getElementById("otherFurniture").value= "";
}

function enable_textDialect(status)
{
status=!status;
  document.myForm.otherDialect.disabled = status;
  document.myForm.otherDialect.focus();
  document.getElementById("otherDialect").value= "";
}

function enable_textAppliances(status)
{
status=!status;
  document.myForm.otherAppliances.disabled = status;
  document.myForm.otherAppliances.focus();
  document.getElementById("otherAppliances").value= "";
}
</script>

<script type="text/javascript">

function Disable(aList)
{
var x=document.getElementById("ethnicInput");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4);
if(x.disabled == true){
document.getElementById("ethnicInput").value= "";
}
if (aList.selectedIndex == 5){
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
$result = mysqli_query("SELECT * FROM economic WHERE username = '$login_session'", $connection);
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
              <h5> FAMILY MONTHLY INCOME (Total income including incomes of parents)</h5>
              <select id="income" style = "font-family: Century Gothic;" name="income">
                <option>–– Choose below ––</option>
                <option <?php $row['income'] == 'P7,500 & below' ? print "selected" : "";?>>P7,500 &amp; below</option>
                <option <?php $row['income'] == 'P7,501 - P15,000' ? print "selected" : "";?>>P7,501 - P15,000</option>
                <option <?php $row['income'] == 'P15,001 - P22,500' ? print "selected" : "";?>>P15,001 - P22,500</option>
                <option <?php $row['income'] == 'P22,501 - P30,000' ? print "selected" : "";?>>P22,501 - P30,000</option>
                <option <?php $row['income'] == 'P30,001 & above' ? print "selected" : "";?>>P30,001 &amp; above</option>
              </select>
              <h5> STATUS OF THE HOUSE WHERE YOU LIVE</h5>
              <select id="house" style = "font-family: Century Gothic;" name="house">
                <option>–– Choose below ––</option>
                <option <?php $row['houseStatus'] == 'Owned' ? print "selected" : "";?>>Owned</option>
                <option <?php $row['houseStatus'] == 'Rented/Leased' ? print "selected" : "";?>>Rented/Leased</option>
                <option <?php $row['houseStatus'] == 'None' ? print "selected" : "";?>>None</option>
              </select>
              <h5> STATUS OF THE RESIDENTIAL LOT WHERE YOU LIVE</h5>
              <select id="lot" style = "font-family: Century Gothic;"  name="lot">
                <option>–– Choose below ––</option>
                <option <?php $row['lotStatus'] == 'Owned' ? print "selected" : "";?>>Owned</option>
                <option <?php $row['lotStatus'] == 'Rented/Leased' ? print "selected" : "";?>>Rented/Leased</option>
                <option <?php $row['lotStatus'] == 'None' ? print "selected" : "";?>>None</option>
              </select>
              <h5> LIGHT FACILITIES USED </h5>
              <select id="light" style = "font-family: Century Gothic;" name="light" onchange="disableLight(this)">
                <option>–– Choose below ––</option>
                <option <?php $row['light'] == 'Electricity' ? print "selected" : "";?>>Electricity</option>
                <option <?php $row['light'] == 'Petroleum' ? print "selected" : "";?>>Petroleum</option>
                <option <?php $row['light'] == 'Others' ? print "selected" : "";?>>Others</option>
              </select>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="otherLight" disabled = "true" id="otherLight" placeholder = "If others, please specify." value="<?php echo $row['otherLight']; ?>">

              <h5> MEANS OF WATER SUPPLY</h5>
              <select id="water" style = "font-family: Century Gothic;" name="water">
                <option>–– Choose below ––</option>
                <option <?php $row['water'] == 'Open Well' ? print "selected" : "";?>>Open Well</option>
                <option <?php $row['water'] == 'Hand Pump' ? print "selected" : "";?>>Hand Pump</option>
                <option <?php $row['water'] == 'Electric Pump' ? print "selected" : "";?>>Electric Pump</option>
                <option <?php $row['water'] == 'Rain' ? print "selected" : "";?>>Rain</option>
                <option <?php $row['water'] == 'Dumoy' ? print "selected" : "";?>>Dumoy</option>
                <option <?php $row['water'] == 'NAWASA' ? print "selected" : "";?>>NAWASA</option>
              </select>

              <h5> TYPE OF TOILET USED</h5>
              <select id="toilet" name="toilet" style = "font-family: Century Gothic;" >
                <option>–– Choose below ––</option>
                <option <?php $row['toilet'] == 'Flush Type' ? print "selected" : "";?>>Flush Type</option>
                <option <?php $row['toilet'] == 'Antipolo (Closed Pit)' ? print "selected" : "";?>>Antipolo (Closed Pit)</option>
                <option <?php $row['toilet'] == 'Public Toilet' ? print "selected" : "";?>>Public Toilet</option>
                <option <?php $row['toilet'] == 'None' ? print "selected" : "";?>>None</option>
              </select>

              <h5> POSSESSION OF TRANSPORTATION </h5>
              <select id="transport" style = "font-family: Century Gothic;" name="transport" onchange="disableTransport(this)">
                <option>–– Choose below ––</option>
                <option <?php $row['transport'] == 'Car' ? print "selected" : "";?>>Car</option>
                <option <?php $row['transport'] == 'Jeep' ? print "selected" : "";?>>Jeep</option>
                <option <?php $row['transport'] == 'Motorcycle/Tricycle' ? print "selected" : "";?>>Motorcycle/Tricycle</option>
                <option <?php $row['transport'] == 'Bicycle' ? print "selected" : "";?>>Trisikad/Bicycle</option>
                <option <?php $row['transport'] == 'None' ? print "selected" : "";?>>None</option>
                <option <?php $row['transport'] == 'Others' ? print "selected" : "";?>>Others</option>
              </select>
                <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="otherTransport" disabled = "true" id="otherTransport" placeholder = "If others, please specify." value="<?php echo $row['otherTransport']; ?>">

              <h5> APPLIANCES OWNED </h5>
              <div class="checkbox">
              <?php
$checked = explode(', ', $row['appliances']);
    ?>
                    <h6 style = "color: white; font-family: Century Gothic;"><input type="checkbox" name="check[]" value = "Refrigerator" id = "check1" <?php in_array('Refrigerator', $checked) ? print "checked" : "";?>> Refrigerator<br>
                    <input type="checkbox" name="check[]" value = "Gas Range" id = "check2" <?php in_array('Gas Range', $checked) ? print "checked" : "";?>>Gas Range<br>
                    <input type="checkbox" name="check[]" value = "Stereo/CD/Radio" id = "check3" <?php in_array('Stereo/CD/Radio', $checked) ? print "checked" : "";?>>Stereo/CD/Radio<br>
                    <input type="checkbox" name="check[]" value = "Electric Iron" id = "check4" <?php in_array('Electric Iron', $checked) ? print "checked" : "";?>>Electric Iron<br>
                    <input type="checkbox" name="check[]" value = "Air Conditioner" id = "check5" <?php in_array('Air Conditioner', $checked) ? print "checked" : "";?>>Air Conditioner<br>
                    <input type="checkbox" name="check[]" value = "Electric Fan" id = "check6" <?php in_array('Electric Fan', $checked) ? print "checked" : "";?>>Electric Fan<br>
                    <input type="checkbox" name="check[]" value = "Gas Stove" id = "check7" <?php in_array('Gas Stove', $checked) ? print "checked" : "";?>>Gas Stove<br>
                    <input type="checkbox" name="check[]" value = "Sewing Machine" id = "check8" <?php in_array('Sewing Machine', $checked) ? print "checked" : "";?>>Sewing Machine<br>
                    <input type="checkbox" name="check[]" value = "Computer" id = "check9" <?php in_array('Computer', $checked) ? print "checked" : "";?>>Computer<br>
                    <input type="checkbox" name="check[]" value = "TV" id = "check10" <?php in_array('TV', $checked) ? print "checked" : "";?>>TV<br>
                    <input type="checkbox" name="check[]" value = "Tape Recorder" id = "check11" <?php in_array('Tape Recorder', $checked) ? print "checked" : "";?>>Tape Recorder<br>
                     </h6>
                </div>
                <input type="checkbox" style = "font-family: Century Gothic;"id = "check12" name=others onclick="enable_textAppliances(this.checked)" <?php if ($row['otherAppliances'] == '') {"";} else {print "checked";}?>>
                <input type="text" style="font-family: Century Gothic;" autocomplete="off" name="otherAppliances" id="otherAppliances" <?php if ($row['otherAppliances'] == '') {print "disabled";} else {print "";}?> placeholder = "If others, please specify." value="<?php echo $row['otherAppliances']; ?>">
                 <?php
$checked2 = explode(', ', $row['furniture']);
    ?>
                <h5> FURNITURE OWNED </h5>
                <h6 style = "color: white; font-family: Century Gothic;">
                <input type="checkbox" class = "furniture" name="furniture[]" value="Sala set" id = "f1" <?php in_array('Sala set', $checked2) ? print "checked" : "";?>>Sala set<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Cabinet for plate" id = "f2" <?php in_array('Cabinet for plate', $checked2) ? print "checked" : "";?>>Cabinet for plate<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Dining set" id = "f3" <?php in_array('Dining set', $checked2) ? print "checked" : "";?>>Dining set<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Bed" id = "f4" <?php in_array('Bed', $checked2) ? print "checked" : "";?>>Bed<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Cabinet for clothing" id = "f5" <?php in_array('Cabinet for clothing', $checked2) ? print "checked" : "";?>>Cabinet for clothing<br>
                </h6>
                <input type="checkbox" id = "checkFurniture" name=othersf onclick="enable_textFurniture(this.checked)" <?php if ($row['otherFurniture'] == '') {"";} else {print "checked";}?>>
                <input type="text" autocomplete="off" style="font-family: Century Gothic; width: 50%;" name="otherFurniture" id="otherFurniture" <?php if ($row['otherFurniture'] == '') {print "disabled";} else {print "";}?> placeholder = "If others, please specify." value="<?php echo $row['otherFurniture']; ?>">

            </div>      <div class="clear"></div><center>
            <?php
}
?>

          <?php
mysqli_close($connection);
?>
            <center>
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix --><center>
            <input class="send submit" type="submit" name="cancel" id="cancel" value="CANCEL" />
            <input class="send submit" type="submit" onclick="checkCheckBoxes(this);" name="update_socio" id="update_socio" value="UPDATE" /><br><br>
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