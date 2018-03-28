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

<script type="text/javascript">
<!--
function copyBilling (f, status) {
    var s, i = 0;
    while (s = ['houseNumber'][i++]) {f.elements['ss' + s].value = f.elements['s' + s].value};
}
// -->

status=!status;
    document.myForm.present_houseNumber.disabled = status;
    document.myForm.present_brgy.disabled = status;
    document.myForm.present_city.disabled = status;
    document.myForm.present_province.disabled = status;
    document.myForm.present_houseNumber.focus();
    document.myForm.present_brgy.focus();
    document.myForm.present_city.focus();
    document.myForm.present_province.focus();
    document.getElementById("present_houseNumber").value= "";
    document.getElementById("present_brgy").value= "";
    document.getElementById("present_city").value= "";
    document.getElementById("present_province").value= "";
</script>

<SCRIPT LANGUAGE="JavaScript1.2"> <!--

function myAgeValidation() {

    var lre = /^\s*/;
    var datemsg = "";

     var inputDate = document.myForm.myDate.value;
    inputDate = inputDate.replace(lre, "");
    document.myForm.myDate.value = inputDate;
    datemsg = isValidDate(inputDate);
        if (datemsg != "") {
            alert(datemsg);
            return;
        }
        else {
            //Now find the Age based on the Birth Date
            getAge(new Date(inputDate));
        }

}

function getAge(birth) {

    var today = new Date();
    var nowyear = today.getFullYear();
    var nowmonth = today.getMonth();
    var nowday = today.getDate();

    var birthyear = birth.getFullYear();
    var birthmonth = birth.getMonth();
    var birthday = birth.getDate();

    var age = nowyear - birthyear;
    var age_month = nowmonth - birthmonth;
    var age_day = nowday - birthday;

    if(age_month < 0 || (age_month == 0 && age_day <0)) {
            age = parseInt(age) -1;
        }
    document.getElementById("age").value = age;

    if ((age == 18 && age_month <= 0 && age_day <=0) || age < 18) {
    }
    else {

    }

}

function isValidDate(dateStr) {


    var msg = "";
    // Checks for the following valid date formats:
    // MM/DD/YY   MM/DD/YYYY   MM-DD-YY   MM-DD-YYYY
    // Also separates date into month, day, and year variables

    // To require a 2 & 4 digit year entry, use this line instead:
    //var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{2}|\d{4})$/;
    // To require a 4 digit year entry, use this line instead:
    var datePat = /^(\d{1,2})(\/|-)(\d{1,2})\2(\d{4})$/;

    var matchArray = dateStr.match(datePat); // is the format ok?
    if (matchArray == null) {
        msg = "Date is not in a valid format.";
        return msg;
    }

    month = matchArray[1]; // parse date into variables
    day = matchArray[3];
    year = matchArray[4];


    if (month < 1 || month > 12) { // check month range
        msg = "Month must be between 1 and 12.";
        return msg;
    }

    if (day < 1 || day > 31) {
        msg = "Day must be between 1 and 31.";
        return msg;
    }

    if ((month==4 || month==6 || month==9 || month==11) && day==31) {
        msg = "Month "+month+" doesn't have 31 days!";
        return msg;
    }

    if (month == 2) { // check for february 29th
    var isleap = (year % 4 == 0 && (year % 100 != 0 || year % 400 == 0));
    if (day>29 || (day==29 && !isleap)) {
        msg = "February " + year + " doesn't have " + day + " days!";
        return msg;
    }
    }

    if (day.charAt(0) == '0') day= day.charAt(1);

    //Incase you need the value in CCYYMMDD format in your server program
    //msg = (parseInt(year,10) * 10000) + (parseInt(month,10) * 100) + parseInt(day,10);

    return msg;  // date is valid
}

</SCRIPT>
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
    <h2 style="font-family: Century Gothic;"><center>UPDATE PERSONAL DATA</center></h2>
    <hr>
  <h5><center><b>I. DIRECTIONS:</b> Fill in the text fields with the information called for or check mark <br> in the box that corresponds to your appropriate answer.</center></h5>
  <div class="main">
    <div id="progress_bar">
        <div id="progress"></div>
        <div id="progress_text">0% Complete</div>
  </div>
    <div class="content">
    <h1 style="font-family: Century Gothic; color: black;" id = "user"><?php echo $login_session; ?></h1>
    <p style="font-family: Century Gothic; text-align: center; color: white;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_session; ?></b>. (<a href = "logout.php" style="text-decoration: none; color: white;">Log out</a>)
      <div id="container" >
        <form action="userInfo.php" id = 'myForm' name='myForm' method='post'"">
          <!-- #first_step -->
          <div id="first_step">
          <div class="form">
          <h1>Student's Personal Data </h1>
          <hr />
          <h5><b>NOTE:</b> The personal data of respondent in terms of <u>name</u>, <u>age</u>, <u>sex</u>, <u>marital status</u>, <u>siblings currently enrolled in DNSC</u>, <u>stanine</u> &amp; <u>course taken.</u>.
          <hr />
          </h5>

              <h5>FULL NAME</h5>
              <input type="text" style="font-family: Century Gothic;" name="lname" id="lname" pattern = [a-zA-Z]+ placeholder = "Last Name"  value="<?php echo $row['lastname']; ?>" autocomplete="off" />
              <input type="text" style="font-family: Century Gothic;" name="fname" id="fname" placeholder = "First Name"  value="<?php echo $row['firstname']; ?>" autocomplete="off" />
              <input type="text" style="font-family: Century Gothic;" name="mname" id="mname" placeholder = "Middle Name"  value="<?php echo $row['midname']; ?>" autocomplete="off" />

            <h5>PERMANENT ADDRESS</h5>
            <input type="text" id = "shouseNumber" placeholder = "Permanent Address" value="<?php echo $row['permanentAdd']; ?>">
            <h5>PRESENT ADDRESS <input name="same" onclick="if (this.checked) copyBilling (this.form, this.checked)" type="checkbox"><b style = "font-family: Century Gothic; color: white;">Same as above</b></h5>
            <input type="text" id = "sshouseNumber" placeholder = "Present Address" value="<?php echo $row['presentAdd']; ?>">
              <h5>COURSE</h5>
              <select id="course" name="course" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option <?php $row['course'] == 'Bachelor of Science in Information Technology (BSIT)' ? print "selected" : "";?>>Bachelor of Science in Information Technology (BSIT)</option>
                <option <?php $row['course'] == 'Bachelor of Science in Education (BSEd)' ? print "selected" : "";?>>Bachelor of Science in Education (BSEd)</option>
                <option <?php $row['course'] == 'Bachelor of Science in Food Technology (BSFT)' ? print "selected" : "";?>>Bachelor of Science in Food Technology (BSFT)</option>
                <option <?php $row['course'] == 'Bachelor of Science in Marine Technology (BSMB)' ? print "selected" : "";?>>Bachelor of Science in Marine Biology (BSMB)</option>
                <option <?php $row['course'] == 'Bachelor of Public Administration (BPA)' ? print "selected" : "";?>>Bachelor of Public Administration (BPA)</option>
                <option <?php $row['course'] == 'Bachelor of Science in Fisheries (BSF)' ? print "selected" : "";?>>Bachelor of Science in Fisheries (BSF)</option>
              </select>
              <h5>BIRTHDAY (MM/DD/YYYY format)</h5>
              <input type="text" name="myDate" style="font-family: Century Gothic;" id="myDate" value="<?php echo $row['bdate']; ?>">
              <button type="button" onclick="Javascript:myAgeValidation().style.display='none'" class="cancelbtn">COMPUTE AGE</button>

              <input type="number" min="1" step="1" name="age" style="font-family: Century Gothic;" id="age" placeholder = "Age" value="<?php echo $row['age']; ?>" readonly="true">
              <h5>GENDER</h5>
              <select id="gender" name="gender" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option <?php $row['gender'] == 'Female' ? print "selected" : "";?>>Female</option>
                <option <?php $row['gender'] == 'Male' ? print "selected" : "";?>>Male</option>
              </select>

              <h5>MARITAL STATUS</h5>
              <select id="status" name="status" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option <?php $row['mstatus'] == 'Single' ? print "selected" : "";?>>Single</option>
                <option <?php $row['mstatus'] == 'Married' ? print "selected" : "";?>>Married</option>
                <option <?php $row['mstatus'] == 'Separated' ? print "selected" : "";?>>Separated</option>
                <option <?php $row['mstatus'] == 'Widow' ? print "selected" : "";?>>Widow</option>
              </select>

              <h5>SIBLINGs</h5>
              <select style="font-family: Century Gothic;" name="sibling2" id="sibling2">
                                <optgroup label="Enrolled in DNSC">
                <option <?php $row['siblingDNSC'] == '0' ? print "selected" : "";?>>0</option>
                <option <?php $row['siblingDNSC'] == '1' ? print "selected" : "";?>>1</option>
                <option <?php $row['siblingDNSC'] == '2' ? print "selected" : "";?>>2</option>
                <option <?php $row['siblingDNSC'] == '3' ? print "selected" : "";?>>3</option>
                <option <?php $row['siblingDNSC'] == '4' ? print "selected" : "";?>>4</option>
                <option <?php $row['siblingDNSC'] == '5' ? print "selected" : "";?>>5</option>
                <option <?php $row['siblingDNSC'] == '6' ? print "selected" : "";?>>6</option>
                <option <?php $row['siblingDNSC'] == '7' ? print "selected" : "";?>>7</option>
                <option <?php $row['siblingDNSC'] == '8' ? print "selected" : "";?>>8</option>
                <option <?php $row['siblingDNSC'] == '9' ? print "selected" : "";?>>9</option>
                <option <?php $row['siblingDNSC'] == '10' ? print "selected" : "";?>>10</option>
              </select>

              <select style="font-family: Century Gothic;" name="nSibling" id="nSibling">
                <optgroup label="# of Brothers and Sisters">
                <option <?php $row['numSiblings'] == '0' ? print "selected" : "";?>>0</option>
                <option <?php $row['numSiblings'] == '1' ? print "selected" : "";?>>1</option>
                <option <?php $row['numSiblings'] == '2' ? print "selected" : "";?>>2</option>
                <option <?php $row['numSiblings'] == '3' ? print "selected" : "";?>>3</option>
                <option <?php $row['numSiblings'] == '4' ? print "selected" : "";?>>4</option>
                <option <?php $row['numSiblings'] == '5' ? print "selected" : "";?>>5</option>
                <option <?php $row['numSiblings'] == '6' ? print "selected" : "";?>>6</option>
                <option <?php $row['numSiblings'] == '7' ? print "selected" : "";?>>7</option>
                <option <?php $row['numSiblings'] == '8' ? print "selected" : "";?>>8</option>
                <option <?php $row['numSiblings'] == '9' ? print "selected" : "";?>>9</option>
                <option <?php $row['numSiblings'] == '10' ? print "selected" : "";?>>10</option>
              </select>

                            <h5>NAME OF HIGH SCHOOL GRADUATED &amp; YEAR GRADUATED</h5>
                            <input type="text" name="hsGraduated" style="font-family: Century Gothic;" id="hsGraduated" value="<?php echo $row['hs']; ?>" autocomplete="off">
                            <select id="yearGrad" name="yearGrad" style="font-family: Century Gothic;">
                                <option>-Year Graduated-</option>
                                <option <?php $row['yearGrad'] == '2019' ? print "selected" : "";?>>2019</option>
                                <option <?php $row['yearGrad'] == '2018' ? print "selected" : "";?>>2018</option>
                                <option <?php $row['yearGrad'] == '2017' ? print "selected" : "";?>>2017</option>
                                <option <?php $row['yearGrad'] == '2016' ? print "selected" : "";?>>2016</option>
                                <option <?php $row['yearGrad'] == '2015' ? print "selected" : "";?>>2015</option>
                                <option <?php $row['yearGrad'] == '2014' ? print "selected" : "";?>>2014</option>
                                <option <?php $row['yearGrad'] == '2013' ? print "selected" : "";?>>2013</option>
                                <option <?php $row['yearGrad'] == '2012' ? print "selected" : "";?>>2012</option>
                                <option <?php $row['yearGrad'] == '2011' ? print "selected" : "";?>>2011</option>
                                <option <?php $row['yearGrad'] == '2010' ? print "selected" : "";?>>2010</option>
                                <option <?php $row['yearGrad'] == '2009' ? print "selected" : "";?>>2009</option>
                                <option <?php $row['yearGrad'] == '2008' ? print "selected" : "";?>>2008</option>
                                <option <?php $row['yearGrad'] == '2007' ? print "selected" : "";?>>2007</option>
                                <option <?php $row['yearGrad'] == '2006' ? print "selected" : "";?>>2006</option>
                                <option <?php $row['yearGrad'] == '2005' ? print "selected" : "";?>>2005</option>
                                <option <?php $row['yearGrad'] == '2004' ? print "selected" : "";?>>2004</option>
                                <option <?php $row['yearGrad'] == '2003' ? print "selected" : "";?>>2003</option>
                                <option <?php $row['yearGrad'] == '2002' ? print "selected" : "";?>>2002</option>
                                <option <?php $row['yearGrad'] == '2001' ? print "selected" : "";?>>2001</option>
                                <option <?php $row['yearGrad'] == '2000' ? print "selected" : "";?>>2000</option>
                            </select>

                            <h5>TYPE OF HIGH SCHOOL ORIGIN</h5>
                            <select id="hsType" name="hsType" style="font-family: Century Gothic;">
                                <option>–– Choose below ––</option>
                                <option <?php $row['hstype'] == 'Public' ? print "selected" : "";?>>Public</option>
                                <option <?php $row['hstype'] == 'Private' ? print "selected" : "";?>>Private</option>
                            </select>

              <h5>STANINE (OLSAT Result)</h5>
              <select id="stanine" name="stanine" style="font-family: Century Gothic;">
                <option>–– Choose below ––</option>
                <option <?php $row['stanine'] == '1' ? print "selected" : "";?>>1</option>
                <option <?php $row['stanine'] == '2' ? print "selected" : "";?>>2</option>
                <option <?php $row['stanine'] == '3' ? print "selected" : "";?>>3</option>
                <option <?php $row['stanine'] == '4' ? print "selected" : "";?>>4</option>
                <option <?php $row['stanine'] == '5' ? print "selected" : "";?>>5</option>
                <option <?php $row['stanine'] == '6' ? print "selected" : "";?>>6</option>
                <option <?php $row['stanine'] == '7' ? print "selected" : "";?>>7</option>
                <option <?php $row['stanine'] == '8' ? print "selected" : "";?>>8</option>
                <option <?php $row['stanine'] == '9' ? print "selected" : "";?>>9</option>
              </select>

              <h5>COMMUNICATION (Check if applicable.)</h5>
              <input type="checkbox" name=others onclick="enable_textTel(this.checked)" <?php if ($row['tel'] == '' || $row['tel'] == 'None') {"";} else {print "checked";}?>>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="tel" disabled = "true" id="tel" placeholder = "Telephone Number" maxlength="8" value="<?php echo $row['tel']; ?>">
              <input type="checkbox" name=others onclick="enable_textCel(this.checked)" <?php if ($row['cel'] == '') {"";} else {print "checked";}?>>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="cel" disabled = "true" id="cel" placeholder = "Cellphone Number" minlength = "11" maxlength="11" value="<?php echo $row['cel']; ?>">

            </div><center>
             <?php
}
?>

          <?php
mysqli_close($connection);
?>
            <input class="submit" type="submit" name="submit_first" id="submit_first" value="NEXT" /><br><br>
            </center>
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
$id     = $_GET['id'];
$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
          <!-- #second_step -->
          <div id="second_step">
          <h1>Parent/Guardian Information</h1>
          <hr />
          <h5><b>NOTE:</b> The social status of respondent in terms of <u>name of high school</u> &amp; <u>year graduated</u>, <u>ethnic origin</u>, <u>home address</u>, <u>highest educational attainment</u>, <u>religion</u> &amp; <u>dialect used</u>.
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
                          <select id="fAttain" style = "font-family: Century Gothic;" name="fAttain">
                          <option>–– Educational Attainment ––</option>
                          <option <?php $row['attainfather'] == 'Elementary' ? print "selected" : "";?>>Elementary</option>
                          <option <?php $row['attainfather'] == 'High School' ? print "selected" : "";?>>High School</option>
                          <option <?php $row['attainfather'] == 'College' ? print "selected" : "";?>>College</option>
                          <option <?php $row['attainfather'] == 'Graduate School' ? print "selected" : "";?>>Graduate School</option>
                          </select>

                            <h5> OCCUPATION (Father) </h5>
              <select id="occupationF" style = "font-family: Century Gothic;" name="occupationF">
                <option>–– Choose below ––</option>
                <option <?php $row['fatherOccup'] == 'Government Employee' ? print "selected" : "";?>>Government Employee</option>
                <option <?php $row['fatherOccup'] == 'Private Employee' ? print "selected" : "";?>>Private Employee</option>
                <option <?php $row['fatherOccup'] == 'Business/Self-Employed' ? print "selected" : "";?>>Business/Self-Employed</option>
                <option <?php $row['fatherOccup'] == 'Fisherman/Farmer' ? print "selected" : "";?>>Fisherman/Farmer</option>
                <option <?php $row['fatherOccup'] == 'OFW' ? print "selected" : "";?>>OFW</option>
                <option <?php $row['fatherOccup'] == 'None' ? print "selected" : "";?>>None</option>
              </select>
                            <h5> EMPLOYMENT STATUS (Father) </h5>
               <select id="statusF" style = "font-family: Century Gothic;" name="statusF">
                <option>–– Choose below ––</option>
                <option <?php $row['fatherEmploy'] == 'Regular/Permanent' ? print "selected" : "";?>>Regular/Permanent</option>
                <option <?php $row['fatherEmploy'] == 'Casual/Temporary' ? print "selected" : "";?>>Casual/Temporary</option>
                <option <?php $row['fatherEmploy'] == 'Irregular' ? print "selected" : "";?>>Irregular</option>
              </select>

              <h5> MOTHER'S INFORMATION </h5>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" class = "capitalize" name="motherEd" id="motherEd" value="<?php echo $row['mother']; ?>">
              <select id="mAttain" style = "font-family: Century Gothic;" name="mAttain">
                <option>–– Educational Attainment ––</option>
                <option <?php $row['attainmother'] == 'Elementary' ? print "selected" : "";?>>Elementary</option>
                <option <?php $row['attainmother'] == 'High School' ? print "selected" : "";?>>High School</option>
                <option <?php $row['attainmother'] == 'College' ? print "selected" : "";?>>College</option>
                <option <?php $row['attainmother'] == 'Graduate School' ? print "selected" : "";?>>Graduate School</option>
              </select>

                            <h5> OCCUPATION (Mother)</h5>
                            <select id="occupationM" style = "font-family: Century Gothic;" name="occupationM">
                <option>–– Choose below ––</option>
                <option <?php $row['motherOccup'] == 'Government Employee' ? print "selected" : "";?>>Government Employee</option>
                <option <?php $row['motherOccup'] == 'Private Employee' ? print "selected" : "";?>>Private Employee</option>
                <option <?php $row['motherOccup'] == 'Business/Self-Employed' ? print "selected" : "";?>>Business/Self-Employed</option>
                <option <?php $row['motherOccup'] == 'Fisherman/Farmer' ? print "selected" : "";?>>Fisherman/Farmer</option>
                <option <?php $row['motherOccup'] == 'OFW' ? print "selected" : "";?>>OFW</option>
                <option <?php $row['motherOccup'] == 'None' ? print "selected" : "";?>>None</option>
              </select>

                            <h5> EMPLOYMENT STATUS (Mother)</h5>
                            <select id="statusM" style = "font-family: Century Gothic;" name="statusM">
                <option>–– Choose below ––</option>
                <option <?php $row['motherEmploy'] == 'Regular/Permanent' ? print "selected" : "";?>>Regular/Permanent</option>
                <option <?php $row['motherEmploy'] == 'Casual/Temporary' ? print "selected" : "";?>>Casual/Temporary</option>
                <option <?php $row['motherEmploy'] == 'Irregular' ? print "selected" : "";?>>Irregular</option>
              </select>

              <h5> SIBLING'S NAME/S </h5>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="nameSib" id="nameSib" placeholder = "Name/s" value="<?php echo $row['nameSibling']; ?>">
              <h5> SIBLING'S EDUCATIONAL ATTAINMENT/S </h5>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="eaSib" id="eaSib" placeholder = "(Elementary, High School, College, Graduate School)" value="<?php echo $row['attainSibling']; ?>">

              <h5> RELIGION </h5>
              <select id="religion" style = "font-family: Century Gothic;" name="religion" onchange="Disable2(this)">
                <option <?php $row['religion'] == 'Catholic' ? print "selected" : "";?>>–– Choose below ––</option>
                <option <?php $row['religion'] == 'Catholic' ? print "selected" : "";?>>Catholic</option>
                <option <?php $row['religion'] == 'Protestant/Evangelical' ? print "selected" : "";?>>Protestant/Evangelical</option>
                <option <?php $row['religion'] == 'Islam' ? print "selected" : "";?>>Muslim/Islam</option>
                <option <?php $row['religion'] == 'Other Christian groups' ? print "selected" : "";?>>Other Christian groups</option>
              </select>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" disabled = "true" name="religionTwo" id="religionTwo" placeholder = "If other Christian groups, please specify." value="<?php echo $row['otherreligion']; ?>">

              <h5> DIALECT/S SPOKEN </h5>
              <div class="checkbox">
              <?php
$checked = explode(', ', $row['dialect']);
    ?>
                    <h6 style = "color: white; font-family: Century Gothic;"><input id = "chckbx1" type="checkbox" name="chk[]" value = "Visayan" <?php in_array('Visayan', $checked) ? print "checked" : "";?>>Visayan
                    <input type="checkbox" name="chk[]" value = "Tagalog" id = "chckbx2" <?php in_array('Tagalog', $checked) ? print "checked" : "";?>>Tagalog
                    <input type="checkbox" name="chk[]" value = "English" id = "chckbx3" <?php in_array('English', $checked) ? print "checked" : "";?>>English <br>
                    <input type="checkbox" id = "chckbx4" name=others onclick="enable_textDialect(this.checked)" <?php if ($row['otherdialect'] == '') {"";} else {print "checked";}?>>
              <input type="text" autocomplete="off" style = "font-family: Century Gothic;" name="otherDialect" disabled = "true" id="otherDialect" placeholder = "If others, please specify." value="<?php echo $row['otherdialect']; ?>">
              </h6>
                </div>

                <!--<input type="text" name="dialect" class = "capitalize" id="dialect" placeholder = "Other dialect (Please specify...)" value=""> -->
              <!--<h5>Email Address</h5>
              <input type="text" name="email address" id="email" value="" />-->
              <?php
}
?>

          <?php
mysqli_close($connection);
?>
            </div><center>
            <input class="submitprv" type="submit" name="prev" id="prev" value="PREVIOUS" />
            <input class="submit" type="submit" name="submit_second" id="submit_second" onclick="checkCheckBoxes(this);" value="NEXT" /><br><br>
            </center>
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
$id     = $_GET['id'];
$result = mysqli_query("SELECT * FROM economic WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
          <!-- #third_step -->
          <div id="third_step">
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
                <option <?php $row['income'] == 'P30,001 & above' ? print "selected" : "";?>></option>>P30,001 &amp; above</option>
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
                <input type="text" autocomplete="off" name="otherAppliances" id="otherAppliances" <?php if ($row['otherAppliances'] == '') {print "disabled=true";} else {print "disabled=false";}?> placeholder = "If others, please specify." value="<?php echo $row['otherAppliances']; ?>">

            </div>      <div class="clear"></div><center>
            <?php
}
?>

          <?php
mysqli_close($connection);
?>
            <input class="submitprv" type="submit" name="prev2" id="prev2" value="PREVIOUS" />
            <input class="submit" type="submit" name="submit_third" id="submit_third" onclick="checkCheckBoxes(this);" value="NEXT" /><br><br>
            <center>

          </div>    <div class="clear"></div>


          <!-- #fourth_step -->
          <div id="fourth_step">
          <h1>YOUR PROFILE</h1>
            <div class="form">
              <table>
                <tr><td><h2>PERSONAL DATA</h2></td><td id = "dash"></td></tr>
                <tr><td>Name</td><td></td></tr>
                <tr><td>Permanent Address</td><td></td></tr>
                <tr><td>Present Address</td><td></td></tr>
                <tr><td>Course</td><td></td></tr>
                <tr><td>Birthday</td><td></td></tr>
                <tr><td>Age</td><td></td></tr>
                <tr><td>Gender</td><td></td></tr>
                <tr><td>Marital Status</td><td></td></tr>
                <tr><td># of siblings enrolled in DNSC</td><td></td></tr>
                <tr><td># of brothers and sisters</td><td></td></tr>
                <tr><td>Name of High School &amp; Year Graduated</td><td></td></tr>
                <tr><td>High School Type Origin</td><td></td></tr>
                <tr><td>Stanine (OLSAT Result)</td><td></td></tr>
                <tr><td>Communication</td><td></td></tr>
                <tr><td><h2>SOCIAL STATUS</h2></td><td id = "dash"></td></tr>
                <tr><td>Ethnic Origin</td><td></td></tr>
                <tr><td>Father's Information</td><td></td></tr>
                <tr><td>Mother's Information</td><td></td></tr>
                <tr><td>Sibling's name &amp; Educational attainment</td><td></td></tr>
                <tr><td>Religion</td><td></td></tr>
                <tr><td>Dialect/s spoken</td><td></td></tr>
                <tr><td><h2>ECONOMIC STATUS</h2></td><td id = "dash"></td></tr>
                <tr><td>Family Monthly Income</td><td></td></tr>
                <tr><td>Status of the house</td><td></td></tr>
                <tr><td>Status of residential lot</td><td></td></tr>
                <tr><td>Light facilities</td><td></td></tr>
                <tr><td>Means of water supply</td><td></td></tr>
                <tr><td>Type of toilet used</td><td></td></tr>
                <tr><td>Possession of transportation</td><td></td></tr>
                <tr><td>Appliances owned</td><td></td></tr>
              </table>
            </div>      <!-- clearfix --><div class="clear"></div><!-- /clearfix --><center>
            <input class="submitprv" type="submit" name="prev3" id="prev3" value="REVIEW" />
            <input class="send submit" type="submit" name="submit_fourth" id="update" value="SUBMIT" /><br><br>
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