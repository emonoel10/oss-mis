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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="dnsc.png" type="image/x-icon" />
    <meta name="author" content="Shahrukh Khan">
    <meta name="description" content="Login System with Github using OAuth PHP and MySQL">
    <meta name="keywords" content="php,mysql,Github,oauth,social logins,thesoftwareguy">
    <meta name="title" content="Login System with Github using OAuth PHP and MySQL">

  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/mobile.css">
  <link href="css/styleGrad.css" type="text/css" rel="stylesheet">
  <link href="css/styleforGraduate.css" type="text/css" rel="stylesheet">
  <title>DNSC - Graduates</title>
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
<script type="text/javascript" src="js2/jquery.main.js"></script>
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

  <!-- Bootstrap -->

  <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link href="bootstrap/css/font-awesome.css" rel="stylesheet">
<script src="bootstrap/js/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="js3/jquery-ui.css">
<script src="js3/jquery-1.12.4.js"></script>
<script src="js3/jquery-ui.js"></script>

<!--    <link href="css/styleGrad.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->

<!--jQuery (necessary for Bootstrap's JavaScript plugins) -->


 <script type="text/javascript">
function copyBilling (f, status) {
    var s, i = 0;
    var box1 = document.getElementById('same').checked;
    var checkbox = $('#checker');
    var dependent = $('#dependent-box');
    if (box1 == true){
    while (s = ['houseNum', '1', '2', '3'][i++]) {f.elements['ss' + s].value = f.elements['s' + s].value};
    dependent.hide();
    }
    else{
    document.getElementById("ss1").value= "";
    document.getElementById("ss2").value= "";
    document.getElementById("ss3").value= "";
    document.getElementById("sshouseNum").value= "";
    dependent.show();
    }

    checkbox.change(function(e){
           dependent.toggle();
        });
}
</script>
<script type="text/javascript">
$(document).ready(function() {
    $("#dependent-box2").hide();
});
</script>

<!--
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
-->

<script type="text/javascript">
function data_copy()
{
var checkbox = $('#checker');
var dependent = $('#dependent-box');

if(document.basicform.copy.checked){
document.basicform.sshouseNum.value=document.basicform.shouseNum.value;
for(i=document.basicform.s1.options.length-1;i>=0;i--)
{
if(document.basicform.s1.options[i].selected)
document.basicform.ss1.options[i].selected=true;
}

for(i=document.basicform.s2.options.length-1;i>=0;i--)
{
if(document.basicform.s2.options[i].selected)
document.basicform.ss2.options[i].selected=true;
}

for(i=document.basicform.s3.options.length-1;i>=0;i--)
{
if(document.basicform.s3.options[i].selected)
document.basicform.ss3.options[i].selected=true;
}
dependent.hide();
}else{

document.basicform.sshouseNum.value="";
document.basicform.ss1.options[0].selected=true;
document.basicform.ss2.options[0].selected=true;
document.basicform.ss3.options[0].selected=true;
dependent.show();
}
checkbox.change(function(e){
           dependent.toggle();
        });
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

    $("#addButton4").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<table><tr><td><input type="text" style="width: 100%;" class="form-control" name="mytext[]" id = "sib" placeholder="Name" required></td><td><select id="sibling" class="form-control" name="sibling" style="width: 100%;" required><option value="">Select below</option><option>Not Applicable</option><option>Kindergarten</option><option>Elementary Level</option><option>Elementary Graduate</option><option>High School Level</option><option>High School Graduate</option><option>College Level</option><option>College Graduate</option><option>Graduate School</option></select></td></tr></table>');

  newTextBoxDiv.appendTo("#TextBoxesGroup4");


  counter++;
     });

     $("#removeButton4").click(function () {
  if(counter==1){
          alert("No more textbox to remove2");
          return false;
       }

  counter--;

        $("#TextBoxDiv" + counter).remove();

     });
  });
</script>
<script type="text/javascript">
  function enable_textDialect(status)
{
  if(status==true){
    document.getElementById('div7').innerHTML='<input type="text" class="form-control" autocomplete="off" name="otherDialect" id = "otherDialect" placeholder = "If others, please specify." value="" required="true">';
    otherDialect.focus();
}
  else document.getElementById('div7').innerHTML='';
}

 function enable_textSkills(status)
{
if(status==true){
    document.getElementById('div8').innerHTML='<input type="text" autocomplete="off" name="otherSkills" id="otherSkills" placeholder = "If others, please specify." value="" required="true" required="true" class="form-control">';
    otherSkills.focus();
}
  else document.getElementById('div8').innerHTML='';
}

function enable_textDisability(status)
{
if(status==true){
    document.getElementById('div9').innerHTML='<input type="text" autocomplete="off" name="otherDisability" id="otherDisability" placeholder = "If others, please specify." value="" required="true" class="form-control">';
    otherDisability.focus();
}
  else document.getElementById('div9').innerHTML='';
}

function enable_textProblems(status)
{
if(status==true){
    document.getElementById('div10').innerHTML='<input type="text" autocomplete="off" name="otherProblems" id="otherProblems" placeholder = "If others, please specify." value="" required="true" class="form-control">';
    otherProblems.focus();
}
  else document.getElementById('div10').innerHTML='';
}

function enable_textAppliances(status)
{
if(status==true){
    document.getElementById('div11').innerHTML='<input type="text" autocomplete="off" class="form-control" name="otherAppliances" id="otherAppliances" placeholder = "If others, please specify." value="" required="true">';
    otherAppliances.focus();
}
  else document.getElementById('div11').innerHTML='';
}

function enable_textFurniture(status)
{
if(status==true){
    document.getElementById('div12').innerHTML='<input type="text" autocomplete="off" class="form-control" name="otherFurniture" id="otherFurniture" placeholder = "If others, please specify." value="" required="true">';
    otherFurniture.focus();
}
  else document.getElementById('div12').innerHTML='';
}
</script>

<script type="text/javascript">
function hs(name){
  if(name=='Others'){document.getElementById('div1').innerHTML='<input id = "otherHS" style="width: 100%;" class="form-control" name="otherHS" type="text" placeholder = "If not in the list, please specify" required="true">';
    otherHS.focus();
}
  else document.getElementById('div1').innerHTML='';
}

function abc(name){
  if(name=='Married'){
    document.getElementById('div2').innerHTML='<input type="text" name = "spouse" id = "spouse" style="width: 100%;" class="form-control" placeholder = "If married, name of spouse" required="true">';
    spouse.focus();
}
  else document.getElementById('div2').innerHTML='';
}

function ethnic(name){
  if(name=='Others'){
    document.getElementById('div3').innerHTML='<input id = "ethnicInput" required="true" class="form-control" name="ethnicInput" type="text" placeholder = "If others, please specify." value="">';
    ethnicInput.focus();
}
  else document.getElementById('div3').innerHTML='';
}

function rel(name){
  if(name=='Others'){
    document.getElementById('div4').innerHTML='<input type="text" autocomplete="off" class="form-control" name="religionTwo" id="religionTwo" placeholder = "If not in the list, please specify" value="" required="true">';
    religionTwo.focus();
}
  else document.getElementById('div4').innerHTML='';
}

function lights(name){
  if(name=='Others'){
    document.getElementById('div5').innerHTML='<input type="text" autocomplete="off" class="form-control" required="true" name="otherLight" id="otherLight" placeholder = "If others, please specify." value="">';
    otherLight.focus();
}
  else document.getElementById('div5').innerHTML='';
}

function transportation(name){
  if(name=='Others'){
    document.getElementById('div6').innerHTML='<input type="text" autocomplete="off" class="form-control" required="true" name="otherTransport" id="otherTransport" placeholder = "If others, please specify." value="">';
    otherTransport.focus();
}
  else document.getElementById('div6').innerHTML='';
}
</script>

<style type="text/css">
    .circle {
  width: 60px;
  height: 50px;
  border-radius: 50%;
  font-size: 50px;
  color: #fff;
  line-height: 50px;
  text-align: center;
  background: #000;
  font-family: century gothic;
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
</head>
<body>
  <div id="header">
    <h1 style="font-family: latoregular;"><a href="home.php">SOCIO-ECONOMIC PROFILING &amp; GRADUATE TRACER SURVEY </a></a></h1>
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
  <style>
  ul#stepForm, ul#stepForm li {
    margin: 0;
    padding: 0;
  }
  ul#stepForm li {
    list-style: none outside none;
  }
  label{margin-top: 10px;}
  .help-inline-error{color:red;}
</style>
  <div id="body" style="min-width: 960px; width: 2000px;">
  <br><br>
<h2 align = "center" style="font-family: century gothic;">GRADUATE TRACER SURVEY</h2>
<hr>

<h1 style="font-family: Century Gothic; color: black; text-align: center;" id = "user" value = "<?php echo $login_session; ?>"><?php echo $login_session; ?></h1>
<p style="font-family: Century Gothic; text-align: center; color: green;">You have logged in as <b style="font-family: Arial Black; color: green"><?php echo $login_session; ?></b>. (<a href = "logout.php" style="text-decoration: none; color: green;">Log out</a>)
  <div class="container" style="padding-left: 0px; padding-right: 15px; width: 102%;">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title" style = "font-family: Century Gothic;">DNSC GRADUATE TRACER FORM</h3>
    </div>
    <div class="panel-body">

      <form name="basicform" id="basicform">
        <div id="sf1" class="frm">
          <fieldset>
            <fieldset>

            <legend style="font-family: Century Gothic;"><b>Parent Information</b></legend>

  <?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}
$db_select = mysqli_select_db("tryit", $connection);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>

            <div class="form-group">
              <label> ETHNIC ORIGIN </label>
              <table>
                <tr><td> <select required="true" class="form-control" id="ethnicSlct" name="ethnicSlct" onchange="ethnic(this.options[this.selectedIndex].value)">
                <option value="">Choose below</option>
                <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT social.ethnic,ethnic.ethnicName from ethnic, social order by ethnicName";
    $result = mysqli_query($sql);
    while ($row = mysqli_fetch_array($result)) {
        ?>
                               <option <?php $row['ethnic'] == $row['ethnicName'] ? print "selected" : "";?> value="<?php echo $row['ethnicName'] ?>"><?php echo $row['ethnicName']; ?></option>
                                <?php
}
    mysqli_close('localhost', 'root', '');
    ?>
                <?php
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

$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
                <option value="Others">Others</option>
              </select></td><td><input   id = "ethnicInput" required="true" class="form-control" name="ethnicInput" type="text" placeholder = "If others, please specify." value="<?php echo $row['otherethnic']; ?>" <?php if ($row['otherethnic'] == "") {print "disabled";} else {print "";}?>></td></tr>
              </table>

            <label> FATHER'S INFORMATION </label>
            <table>
              <tr>
                <td><input type="text" class="form-control" name="fatherEd" id="fatherEd" placeholder = "Name" autocomplete="off" required="true" value="<?php echo $row['father']; ?>"></td>
              <td>
              <select id="fAttain" name="fAttain" class="form-control" required="true">
                <option value="">–– Educational Attainment ––</option>
                <option <?php $row['attainfather'] == 'Not Applicable' ? print "selected" : "";?> value="Not Applicable"> Not Applicable </option>
                <option <?php $row['attainfather'] == 'Elementary Level' ? print "selected" : "";?> value="Elementary Level">Elementary Level</option>
                <option <?php $row['attainfather'] == 'Elementary Graduate' ? print "selected" : "";?> value="Elementary Graduate">Elementary Graduate</option>
                <option <?php $row['attainfather'] == 'High School Level' ? print "selected" : "";?> value="High School Level">High School Level</option>
                <option <?php $row['attainfather'] == 'High School Graduate' ? print "selected" : "";?> value="High School Graduate">High School Graduate</option>
                <option <?php $row['attainfather'] == 'College Level' ? print "selected" : "";?> value="College Level">College Level</option>
                <option <?php $row['attainfather'] == 'College Graduate' ? print "selected" : "";?> value="College Graduate">College Graduate</option>
                <option <?php $row['attainfather'] == 'Graduate School' ? print "selected" : "";?> value="Graduate School">Graduate School</option>
              </select>
              </td>
            </tr>
          </table>
              <label> OCCUPATION (Father) </label>
              <input type="text" class="form-control" id="occupationF" name="occupationF" required="true" value="<?php echo $row['fatherOccup']; ?>" />

              <label> MOTHER'S INFORMATION </label>
              <table>
                <tr>
                  <td><input type="text" class="form-control" name="motherEd" id="motherEd" placeholder = "Name" value="<?php echo $row['mother']; ?>" autocomplete="off" required="true"></td>
                  <td><select id="mAttain" name="mAttain" class="form-control" required="true">
                <option  value="">–– Educational Attainment ––</option>
                <option <?php $row['attainfather'] == 'Not Applicable' ? print "selected" : "";?> value="Not Applicable"> Not Applicable </option>
                <option <?php $row['attainfather'] == 'Elementary Level' ? print "selected" : "";?> value="Elementary Level">Elementary Level</option>
                <option <?php $row['attainfather'] == 'Elementary Graduate' ? print "selected" : "";?> value="Elementary Graduate">Elementary Graduate</option>
                <option <?php $row['attainfather'] == 'High School Level' ? print "selected" : "";?> value="High School Level">High School Level</option>
                <option <?php $row['attainfather'] == 'High School Graduate' ? print "selected" : "";?> value="High School Graduate">High School Graduate</option>
                <option <?php $row['attainfather'] == 'College Level' ? print "selected" : "";?> value="College Level">College Level</option>
                <option <?php $row['attainfather'] == 'College Graduate' ? print "selected" : "";?> value="College Graduate">College Graduate</option>
                <option <?php $row['attainfather'] == 'Graduate School' ? print "selected" : "";?> value="Graduate School">Graduate School</option>
              </select></td>
                </tr>
              </table>



            <label> OCCUPATION (Mother)</label>
            <input type="text" class="form-control" id="occupationM" name="occupationM" required="true" value="<?php echo $row['motherOccup']; ?>" />

            <label> RELIGION </label>
                            <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT social.religion,religion.religionName from religion, social order by religionName";
    $result = mysqli_query($sql);

    echo "<select name='religion' id='religion' class='form-control' onchange='rel(this.options[this.selectedIndex].value)'' required='true'>";
    echo "<option value=''>Choose below</option>";
    while ($row = mysqli_fetch_array($result)) {
        ?>
                                <option <?php $row['religion'] == $row['religionName'] ? print "selected" : "";?> value="<?php echo $row['religionName'] ?>"><?php echo $row['religionName']; ?></option>
                            <?php
}
    mysqli_close('localhost', 'root', '');
    echo "<option value='Others'>NOT IN THE LIST</option>";
    echo "</select>";
    ?>
              <div id="div4"></div>
<?php
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

$result = mysqli_query("SELECT * FROM social WHERE username = '$login_session'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
              <label> DIALECT/S SPOKEN </label>
                     <?php
$checked = explode(', ', $row['dialect']);
    ?>
                    <h6><input <?php in_array('Visayan', $checked) ? print "checked" : "";?> id = "chckbx1"  type="checkbox" name="chk1[]" value = "Visayan"> VISAYAN<br>
                    <input <?php in_array('Tagalog', $checked) ? print "checked" : "";?> type="checkbox" name="chk1[]"  value = "Tagalog" id = "chckbx2"> TAGALOG <br>
                    <input <?php in_array('English', $checked) ? print "checked" : "";?> type="checkbox" name="chk1[]"  value = "English" id = "chckbx3"> ENGLISH <br>
                    <input <?php in_array('Dabawenyo', $checked) ? print "checked" : "";?> type="checkbox" name="chk1[]"  value = "Dabawenyo" id = "chckbx4"> DABAWENYO <br>
                    <input <?php in_array('Ilocano', $checked) ? print "checked" : "";?> type="checkbox" name="chk1[]"  value = "Ilocano" id = "chckbx5"> ILOCANO <br>
                    <input <?php in_array('Ilonggo', $checked) ? print "checked" : "";?> type="checkbox" name="chk1[]"  value = "Ilonggo" id = "chckbx6"> ILONGGO <br>
                    <input <?php in_array('Muslim', $checked) ? print "checked" : "";?> type="checkbox" name="chk1[]"  value = "Muslim" id = "chckbx7"> MUSLIM <br>
                    <input <?php if ($row['otherdialect'] != "") {print "checked";} else {print "";}?> type="checkbox" id = "others"  name='others' onclick="enable_textDialect(this.checked)">OTHERS
              <div id="div7"></div>
              </h6>
            <?php
$checked = explode(', ', $row['skills']);
    ?>
           <label> SPECIAL SKILLS/TALENTS </label>
          <h6><input <?php in_array('Singing', $checked) ? print "checked" : "";?> id = "c1"  type="checkbox" name="chk2[]" value = "Singing">SINGING<br>
          <input <?php in_array('Dancing', $checked) ? print "checked" : "";?> type="checkbox" name="chk2[]"  value = "Dancing" id = "c2">DANCING <br>
          <input <?php in_array('Theater Arts', $checked) ? print "checked" : "";?> type="checkbox" name="chk2[]"  value = "Theater Arts" id = "c3">THEATER ARTS <br>
          <input <?php in_array('Sport games', $checked) ? print "checked" : "";?> type="checkbox" name="chk2[]"  value = "Sports games" id = "c4">SPORTS GAMES <br>
          <input <?php in_array('Painting/Drawing', $checked) ? print "checked" : "";?> type="checkbox" name="chk2[]"  value = "Painting/Drawing" id = "c5">PAINTING/DRAWING <br>
          <input <?php in_array('Cooking/Baking', $checked) ? print "checked" : "";?> type="checkbox" name="chk2[]"  value = "Cooking/Baking" id = "c6">COOKING/BAKING <br>
          <input <?php in_array('Playing Musical Instrument', $checked) ? print "checked" : "";?> type="checkbox" name="chk2[]"  value = "Playing Musical Instrument" id = "c7">PLAYING MUSICAL INSTRUMENT <br>
          <input <?php if ($row['otherSkills'] != "") {print "checked";} else {print "";}?> type="checkbox" id = "others"  name='others' onclick="enable_textSkills(this.checked)">OTHERS
          <div id="div8"></div>
          </h6>
          <?php
$checked = explode(', ', $row['disability']);
    ?>
          <label> TYPE OF DISABILITY (<i>If any, please check and specify</i>) </label>
          <h6><input<?php in_array('Psychosocial Disability', $checked) ? print "checked" : "";?> id = "ch1"  type="checkbox" name="chk3[]" value = "Psychosocial Disability">PSYCHOSOCIAL DISABILITY<br>
          <input <?php in_array('Chronic Illness', $checked) ? print "checked" : "";?> type="checkbox" name="chk3[]"  value = "Chronic Illness" id = "ch2">CHRONIC ILLNESS<br>
          <input <?php in_array('Hearing Disability', $checked) ? print "checked" : "";?> type="checkbox" name="chk3[]"  value = "Hearing Disability" id = "ch3">HEARING DISABILITY <br>
          <input <?php in_array('Visual Disability', $checked) ? print "checked" : "";?> type="checkbox" name="chk3[]"  value = "Visual Disability" id = "ch4">VISUAL DISABILITY <br>
          <input <?php in_array('Learning Disability', $checked) ? print "checked" : "";?> type="checkbox" name="chk3[]"  value = "Learning Disability" id = "ch5">LEARNING DISABILITY <br>
          <input <?php in_array('Speech Impairment', $checked) ? print "checked" : "";?> type="checkbox" name="chk3[]"  value = "Speech Impairment" id = "ch6">SPEECH IMPAIRMENT <br>
          <input <?php in_array('Mental Disability', $checked) ? print "checked" : "";?> type="checkbox" name="chk3[]"  value = "Mental Disability" id = "ch7">MENTAL DISABILITY <br>
          <input <?php if ($row['otherDisability'] != "") {print "checked";} else {print "";}?> type="checkbox" id = "others"  name='others' onclick="enable_textDisability(this.checked)">OTHERS
          <div id="div9"></div>
          </h6>
          <?php
$checked = explode(', ', $row['handedness']);
    ?>
          <label> HANDEDNESS </label>
          <h6><input <?php in_array('Right', $checked) ? print "checked" : "";?> type="checkbox" name="chk4[]" value = "Right" id = "checkbx1">RIGHT
          <input <?php in_array('Left', $checked) ? print "checked" : "";?> type="checkbox" name="chk4[]"  value = "Left" id = "checkbx2">LEFT
          </h6>

          <?php
$checked = explode(', ', $row['problems']);
    ?>
          <label> PROBLEMS ENCOUNTERED </label>
          <h6><input <?php in_array('Parents working abroad', $checked) ? print "checked" : "";?> id = "chbx1"  type="checkbox" name="chk5[]" value = "Parents working abroad">PARENTS WORKING ABROAD<br>
          <input <?php in_array('Family problem', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Family problem" id = "chbx2">FAMILY PROBLEM<br>
          <input <?php in_array('Separated parents', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Separated parents" id = "chbx3">SEPARATED PARENTS <br>
          <input <?php in_array('Finances', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Finances" id = "chbx4">FINANCES <br>
          <input <?php in_array('Personal/Emotional problem', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Personal/Emotional problem" id = "chbx5">PERSONAL/EMOTIONAL PROBLEM <br>
          <input <?php in_array('Lack of time-management', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Lack of time-management" id = "chbx6">LACK OF TIME-MANAGEMENT <br>
          <input <?php in_array('Peer pressure', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Peer pressure" id = "chbx7">PEER PRESSURE <br>
          <input <?php in_array('Low academic performance', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Low academic performance" id = "chbx8">LOW ACADEMIC PERFORMANCE <br>
          <input <?php in_array('Relationship with same sex', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Relationship with same sex" id = "chbx9">RELATIONSHIP WITH SAME SEX <br>
          <input <?php in_array('Relationship with opposite sex', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Relationship with opposite sex" id = "chbx10">RELATIONSHIP WITH OPPOSITE SEX <br>
          <input <?php in_array('Computer addiction', $checked) ? print "checked" : "";?> type="checkbox" name="chk5[]"  value = "Computer addiction" id = "chbx11">COMPUTER ADDICTION <br>
          <input <?php if ($row['otherProblems'] != "") {print "checked";} else {print "";}?> type="checkbox" id = "others"  name='others' onclick="enable_textProblems(this.checked)">OTHERS
          <div id="div10"></div>
          </h6>
                <?php
}
?>
<?php
mysqli_close($connection);
?>
          </fieldset>
        </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <a href = "view.php" style="text-decoration: none;"><button class="btn btn-warning" type="button"><span class="fa fa-arrow-left"></span> Back</button></a>
                <button class="btn btn-primary" id = "submit_form" type="button">Update </button>
              </div>
            </div>
          </fieldset>
        </div>
      </form>
    </div>
  </div>


</div>
  </div>

  <script type="text/javascript" src="jquery.validate.js"></script>
<script type="text/javascript">

  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        name: {
          required: true,
          minlength: 2,
          maxlength: 50
        },
         address: {
          required: true,
          minlength: 2,
          maxlength: 50
        },
        status: {
          required: true,
        },
        gender: {
          required: true
        },
        email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100
        },
        contact: {
          required: true
        },
        degree: {
          required: true,
          maxlength: 150
        },
        college: {
          required: true,
          maxlength: 150
        },
        year: {
          required: true,
          maxlength: 150
        },
        exam: {
          required: true,
          maxlength: 150
        },
        date: {
          required: true,
          maxlength: 150
        },
        rating: {
          required: true,
          maxlength: 150
        },
        awards: {
          required: true,
          maxlength: 150
        },
        mytext1: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        sponsor: {
          required: true,
          minlength: 6,
          maxlength: 150
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $("#submit_form").click(function() {
    var favorite = [];
    var furniture = [];
    var dialect = [];
    var skills = [];
    var disability = [];
    var problems = [];
    var handedness = [];
    var sibling = [];
    var sib = [];
    var count = 0;
        if(count >= 0){
            sib = [];
        $.each($("input[name='mytext[]']"), function(){
            sib.push($(this).val());
        });
}
        if(count >= 0){
            sibling = [];
        $.each($("select[name='sibling']"), function(){
            sibling.push($(this).val());
        });
}

if(count >= 0){
            sibling = [];
        $.each($("input[name='sibling']"), function(){
            sibling.push($(this).val());
        });
}
       $(function()
{
        $.post("updateQuery.php",
        {

                username: $('#user').text(),
                type: $('#type').val(),
                schoolYear: $('#schoolYear').val(),
                semester: $('#semester').val(),
                lname: $("#lname").val(),
                fname: $("#fname").val(),
                mname: $("#mname").val(),
                permanentNum: $('#shouseNum').val(),
                permanentBrgy: $('#s3').val(),
                permanentCity: $('#s2').val(),
                permanentProvince: $('#s1').val(),
                presentNum: $('#sshouseNum').val(),
                presentBrgy: $('#ss3').val(),
                presentCity: $('#ss2').val(),
                presentProvince: $('#ss1').val(),
                course: $('#course').val(),
                bdate: $('#nominee_one_dob').val(),
                gender: $('#gender').val(),
                age: $('#age').val(),
                status: $('#status').val(),
                spouse: $('#spouse').val(),
                nationality: $('#nationality').val(),
                siblingsName: sib.join(", "),
                siblingsEduc: sibling.join(", "),
                numSibling: $('#sibling2').val(),
                hs: $('#hsGraduated').val(),
                yearGrad: $('#yearGrad').val(),
                hstype: $('#hsType').val(),
                stanine: $('#stanine').val(),
                email: $('#email').val(),
                contact: $('#contact').val()
        },
        function(data, textStatus)
        {
            window.location.href = "view.php";
        });
    });

    });

  });
</script>
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
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>