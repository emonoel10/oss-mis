<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

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
$db_select = mysqli_select_db($connection, "tryit");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

?>
                        <?php
$result = mysqli_query($connection, "SELECT * FROM personal where username = '$login_session'");

if ($_SESSION['login_user'] == "dnscadmin") {
    header("location: socio_tbl.php");
} else if ($row = mysqli_fetch_array($result)) {
    header("location: view.php");
} else {
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

<script type="text/javascript">
  $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});
</script>
<script type="text/javascript">
  function enable_otherreason(status)
{
status=!status;
  document.basicform.otherreason.disabled = status;
  document.basicform.otherreason.focus();
  document.getElementById("otherreason").value= "";
}

function enable_otherstatus(status)
{
status=!status;
  document.basicform.otherstatus.disabled = status;
  document.basicform.otherstatus.focus();
  document.getElementById("otherstatus").value= "";
}

function enable_reasonTwo(status)
{
status=!status;
  document.basicform.reasonTwo.disabled = status;
  document.basicform.reasonTwo.focus();
  document.getElementById("reasonTwo").value= "";
}

function enable_yesReason(status)
{
status=!status;
  document.basicform.yesReason.disabled = status;
  document.basicform.yesReason.focus();
  document.getElementById("yesReason").value= "";
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
  function DisableEmployStatus(aList)
{
var x=document.getElementById("otherstatus");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3);
if(x.disabled == true){
document.getElementById("otherstatus").value= "";
}

if (aList.selectedIndex == 4){
  otherstatus.focus();
}
}
</script>
<script type="text/javascript">
  function DisableNoReason(aList)
{
var x=document.getElementById("reasonOne");
x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5);
if(x.disabled == true){
document.getElementById("reasonOne").value= "";
}
if (aList.selectedIndex == 6){
  reasonOne.focus();
}
}
</script>
<script type="text/javascript">
  function DisableNoReason2(aList)
{
var y=document.getElementById("reasonTwo");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4);
if(y.disabled == true){
document.getElementById("reasonTwo").value= "";
}

if (aList.selectedIndex == 5){
  reasonTwo.focus();
}
}
</script>
<script type="text/javascript">
  function DisableYesReason(aList)
{
var x=document.getElementById("yesReason");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8);

if(x.disabled == true){
document.getElementById("yesReason").value= "";
}
if (aList.selectedIndex == 9){
  yesReason.focus();
}
}
</script>
<script type="text/javascript">
  function DisableReason(aList)
{
var x=document.getElementById("otherreason");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8 || aList.selectedIndex == 9);
if(x.disabled == true){
document.getElementById("otherreason").value= "";
}
if (aList.selectedIndex == 10){
  otherreason.focus();
}
}
</script>
<script type="text/javascript">
  function DisableNature(aList)
{
var x=document.getElementById("othernature");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8 || aList.selectedIndex == 9 || aList.selectedIndex == 10);
if(x.disabled == true){
document.getElementById("othernature").value= "";
}
if (aList.selectedIndex == 11){
  othernature.focus();
}
}
</script>
<script type="text/javascript">
  function DisableNatureWork(aList)
{
var x=document.getElementById("othernaturework");
var x1=document.getElementById("othernaturework1");
var x2=document.getElementById("othernaturework2");
var x3=document.getElementById("othernaturework3");
var x4=document.getElementById("othernaturework4");
var x5=document.getElementById("othernaturework5");
var x6=document.getElementById("othernaturework6");
var x7=document.getElementById("othernaturework7");
var x8=document.getElementById("othernaturework8");
var x9=document.getElementById("othernaturework9");
var x10=document.getElementById("othernaturework10");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others
x1.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x2.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x3.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x4.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x5.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x6.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x7.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x8.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x9.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

x10.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others

if(x.disabled == true){
document.getElementById("othernaturework").value= "";
}

if(x1.disabled == true){
document.getElementById("othernaturework1").value= "";
}
if(x2.disabled == true){
document.getElementById("othernaturework2").value= "";
}
if(x3.disabled == true){
document.getElementById("othernaturework3").value= "";
}
if(x4.disabled == true){
document.getElementById("othernaturework4").value= "";
}
if(x5.disabled == true){
document.getElementById("othernaturework5").value= "";
}
if(x6.disabled == true){
document.getElementById("othernaturework6").value= "";
}
if(x7.disabled == true){
document.getElementById("othernaturework7").value= "";
}
if(x8.disabled == true){
document.getElementById("othernaturework8").value= "";
}
if(x9.disabled == true){
document.getElementById("othernaturework9").value= "";
}
if(x10.disabled == true){
document.getElementById("othernaturework10").value= "";
}
}
</script>
<script type="text/javascript">
  function DisableJob(aList)
{
var x=document.getElementById("firstJob");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5); //others
 if(x.disabled == true){
document.getElementById("firstJob").value= "";
}
if (aList.selectedIndex == 6){
  firstJob.focus();
}
}
</script>
<script type="text/javascript">
  function DisableCountry(aList)
{
var x=document.getElementById("othercountry");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8 || aList.selectedIndex == 9 || aList.selectedIndex == 10 || aList.selectedIndex == 11 || aList.selectedIndex == 12 || aList.selectedIndex == 13); //others
if(x.disabled == true){
document.getElementById("othercountry").value= "";
}
if (aList.selectedIndex == 14){
  othercountry.focus();
}
}
</script>

<script type="text/javascript">

$(document).ready(function(){

    var counter = 2;

    $("#addButton").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<table><tr><td><input type="text" id="training" name="mytext1" class="form-control" autocomplete="off"></td><td><input type="text" id="credits" name="mytext1" class="form-control" autocomplete="off"></td><td><input type="text" id="sponsor" name="mytext1" class="form-control" autocomplete="off"></td></tr></table>');

  newTextBoxDiv.appendTo("#TextBoxesGroup");


  counter++;
     });

     $("#removeButton").click(function () {
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

$(document).ready(function(){

    var counter = 2;

    $("#addButton2").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<table><tr><td><input type="text" placeholder="Masteral, Doctoral, etc." style="width: 100%;" id="degree" name="degree" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="college" name="college" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="year" name="year" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="awards" name="awards" class="form-control" autocomplete="off"></td></tr></table>');

  newTextBoxDiv.appendTo("#TextBoxesGroup2");


  counter++;
     });

     $("#removeButton2").click(function () {
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

$(document).ready(function(){

    var counter = 2;

    $("#addButton3").click(function () {

  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);

  newTextBoxDiv.after().html('<table><tr><td><input type="text" style="width: 100%;" id="exam" name="exam" class="form-control" autocomplete="off"></td><td><input required type="date" style="width: 100%;" id="dateExam" name="dateExam" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="rating" name="rating" class="form-control" autocomplete="off"></td></tr></table>');

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

$(document).ready(function(){

    var counter = 2;

    $("#addButton5").click(function () {
  if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
  }

  var newTextBoxDiv = $(document.createElement('div'))
       .attr("id", 'TextBoxDiv' + counter);
  newTextBoxDiv.after().html('<div class="circle">'+(counter-1)+'</div><table><tr><td><label>DATE EMPLOYED (FROM)</label><input type="month" name="fromDate'+(counter-1)+'" id="fromDate'+(counter-1)+'" required class="form-control"></td><td><label>(TO)</label><input type="month" name="toDate'+(counter-1)+'" id="toDate'+(counter-1)+'" required class="form-control" /></td></tr></table><label>NAME OF COMPANY</label><input type="text" id="company" name="company" required style="width:100%;" class="form-control" autocomplete="off" value=""><label>COMPANY ADDRESS </label><input type="text" required placeholder="" id="cAdd" name="cAdd" class="form-control" autocomplete="off"><label>NATURE OF WORK</label><select required onchange="DisableNatureWork(this)" class="form-control" style="width: 100%; height:50px" id = "workNature'+(counter-1)+'"><option value="">Select below</option><option value="Teacher">Teacher</option><option value="Fishery/Technician">Fishery/Technician</option><option value="Computer Technician">Computer Technician</option><option value="Programmer">Programmer</option><option value="Aquaculturist">Aquaculturist</option><option value="Network Administrator">Network Administrator</option><option value="Marine Biologist">Marine Biologist</option><option value="Food Quality Control/Assurance">Food Quality Control/Assurance</option><option value="Others">Others</option></select><input type="text" placeholder="If others, please specify." id="othernaturework'+(counter-1)+'" name="othernaturework" required class="form-control" autocomplete="off" disabled="true"><br>');

  newTextBoxDiv.appendTo("#TextBoxesGroup5");
   counter++;
   document.getElementById('myText').value = (counter-1);
     });
     $("#removeButton5").click(function () {
  if(counter==0){
    counter = 2;
          alert("No more textbox to remove");
          return false;
       }
  counter--;
        $("#TextBoxDiv" + counter).remove();
         document.getElementById('myText').value = (counter-1);
     });
    document.getElementById('myText').value = (counter-1);
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
  <h2 style="font-family: Arial; color: #077054;"><center>FILL UP INFORMATION</center></h2>
  <h5 style="font-family: Century Gothic;"><center><b>I. DIRECTIONS:</b> Fill in the text fields with the information called for or check mark <br> in the box that corresponds to your appropriate answer. Fields with <b style = "color: red;">*</b> are required.</center></h5>
<hr>

<p style="font-family: arial; font-weight: bold; text-align: center; color: #077054;">You have logged in as @<b style="font-family: arial;  text-transform: lowercase; color: #077054;"><?php echo $login_session; ?></b>. (<a href = "logoutGrad.php" style="text-decoration: none; color: #077054; font-family: arial;">Log out</a>)
  <div class="container" style="padding-left: 0px; padding-right: 15px; width: 102%;">

  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title" style = "font-family: Century Gothic;">DNSC SOCIO-ECONOMIC PROFILING FORM</h3>
    </div>
    <div class="panel-body">

      <form name="basicform" id="basicform" class="basicform">
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
<h4 style="font-family: latoregular; color: #007fff; text-align: center;" id = "user" value = "<?php echo $login_sessionGrad; ?>"><?php echo $login_session; ?></h4><br><br>
        <div id="sf1" class="frm">

          <fieldset>

            <legend style="font-family: Century Gothic;">Step 1 of 3: <b>Personal Information</b></legend>

            <div class="form-group">
              <label>SCHOOL YEAR &amp; SEMESTER <b style = "color: red;">*</b></label>
                 <table><tr>
                <td>
                            <select required class="form-control" id="schoolYear" name="schoolYear" style="width: 100%;">
                              <option value="">Select below</option>
                            <?php $current_year = date("Y");
    for ($i = 2013; $i <= $current_year; $i++) {?>
                            <option value="<?php echo $i . "-" . ($i + 1); ?>"><?php echo $i . "-" . ($i + 1); ?></option>
                            <?php
}?>
                            </select></td>
                          <td>
                    <select required="true" id = "semester" name = "semester" class = "form-control" style="width: 100%;">
                        <option value="">Select below</option>
                        <option>First Semester</option>
                        <option>Second Semester</option>
                    </select>
                  </td>
                </tr>
              </table>

                <label>STUDENT STATUS <b style = "color: red;">*</b></label>
                <select required="true" id = "type" class="form-control" name = "type" style="width:100%;">
                  <option value="">Select below</option>
                        <option>NEW STUDENT</option>
                        <option>TRANSFEREE STUDENT</option>
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

                <table><tr>
                <td><label>FIRST NAME <b style = "color: red;">*</b></label><input type="text" style="width: 100%;" id="fname" name="fname" class="form-control" autocomplete="off" value="<?php echo $row['fname']; ?>"></td>
                <td><label>MIDDLE NAME <b style = "color: red;">*</b></label><input type="text" style="width: 100%;" id="mname" name="mname" class="form-control" autocomplete="off" value="<?php echo $row['mname']; ?>"></td>
                <td><label>LAST NAME <b style = "color: red;">*</b></label><input type="text" style="width: 100%;" id="lname" name="lname" class="form-control" autocomplete="off" value="<?php echo $row['lname']; ?>"></td>
                </tr>
                </table>

                <label>EMAIL ADDRESS <b style = "color: red;">*</b></label>
                <input type="text" placeholder="Your Valid Email" id="email" name="email" class="form-control" autocomplete="off" value="<?php echo $row['email']; ?>">
<?php
}
    ?>
                <label>PERMANENT ADDRESS <b style = "color: red;">*</b></label>
                <table>
                <tr>
                <td>
                <strong style="color: black; font-family: century gothic;">Province</strong>
                <!--
                           mysqli_connect('localhost', 'root', '');
                            mysqli_select_db('tryit');

                            $sql = "SELECT distinct countryname from student5";
                            $result = mysqli_query($sql);*/

                            <input name='s1' id='s1' style='font-family: Century Gothic;' class='form-control'>

                          while($row = mysqli_fetch_array($result)){
                                echo "<option value='" . $row['countryname'] . "'>" . $row['countryname'] . "</option>";
                            }
                            echo "</select>";
                            ?>
                            */-->

                <input name='s1' id='s1' class='form-control'>
                </td>
                <td>
                <strong style="color: black; font-family: century gothic">City/Municipality</strong>
            <!--
                            mysqli_connect('localhost', 'root', '');
                            mysqli_select_db('tryit');

                            $sql = "SELECT distinct state from student5 order by state";
                            $result = mysqli_query($sql);

                            <input name='s2' id='s2' style='font-family: Century Gothic;' class='form-control'>

                            while($row = mysqli_fetch_array($result)){
                                echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
                            }
                            echo "</select>";
                            ?> -->

                <input name='s2' id='s2' class='form-control'>
                </td>
                <td>
                <strong style="color: black; font-family: century gothic">Barangay</strong>
               <!--
                            mysqli_connect('localhost', 'root', '');
                            mysqli_select_db('tryit');

                            $sql = "SELECT distinct city from student5 order by city";
                            $result = mysqli_query($sql);

                            echo "<select name='s3' id='s3' style='font-family: Century Gothic;' class='form-control'>";

                            while($row = mysqli_fetch_array($result)){
                                echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
                            }
                            echo "</select>";
                            ?> -->

                <input name='s3' id='s3' class='form-control'>
                </td></tr></table><br>
                <strong style="color: black; font-family: century gothic">Lot No. / Blk. No. / Street / Subdivision / Purok</strong>
                <div style = "color: #2E8B57; font-size:5px;" id="txtHint2"></div>
                <input type="text" class="form-control" placeholder = "Lot No. / Blk. No. / Street / Subdivision / Purok" id = "shouseNum" name="shouseNum">

                <label>PRESENT ADDRESS <b style = "color: red;">*</b></label>
                <input name="same" id="same" onclick="copyBilling (this.form, this.checked)" type="checkbox">
                <!-- <input name="copy" onclick="data_copy()"; type="checkbox" id = "same"> --><b style = "font-family: Century Gothic; color: black;">Same as permanent</b><br><br>
                <div id="dependent-box">
                <table>
                <tr>
                <td>
                <strong style="color: black; font-family: century gothic">Province</strong>
               <!--
                            mysqli_connect('localhost', 'root', '');
                            mysqli_select_db('tryit');

                            $sql = "SELECT distinct countryname from student5";
                            $result = mysqli_query($sql);

                            echo "<select name='ss1' id='ss1' style='font-family: Century Gothic;' class='form-control'>";

                            while($row = mysqli_fetch_array($result)){
                                echo "<option value='" . $row['countryname'] . "'>" . $row['countryname'] . "</option>";
                            }
                            echo "</select>";
                            ?> -->

                <input name='ss1' id='ss1' class='form-control'>
                </td>
                <td>
                <strong style="color: black; font-family: century gothic">City/Municipality</strong>
                <!--
                            mysqli_connect('localhost', 'root', '');
                            mysqli_select_db('tryit');

                            $sql = "SELECT distinct state from student5 order by state";
                            $result = mysqli_query($sql);

                            echo "<select name='ss2' id='ss2' style='font-family: Century Gothic;' class='form-control'>";

                            while($row = mysqli_fetch_array($result)){
                                echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
                            }
                            echo "</select>";
                            ?> -->
                <input name='ss2' id='ss2' class='form-control'>
                </td>
                <td>
                <strong style="color: black; font-family: century gothic">Barangay</strong>
                <!--
                            mysqli_connect('localhost', 'root', '');
                            mysqli_select_db('tryit');

                            $sql = "SELECT distinct city from student5 order by city";
                            $result = mysqli_query($sql);

                            echo "<select name='ss3' id='ss3' style='font-family: Century Gothic;' class='form-control'>";

                            while($row = mysqli_fetch_array($result)){
                                echo "<option value='" . $row['city'] . "'>" . $row['city'] . "</option>";
                            }
                            echo "</select>";
                            ?> -->

                <input name='ss3' id='ss3' class='form-control'>
                </td></tr></table>
                <br>
                <strong style="color: black; font-family: century gothic">Lot No. / Blk. No. / Street / Subdivision / Purok</strong>
                <input type="text" name="sshouseNum" placeholder = "Lot No. / Blk. No / Street / Subdivision / Purok" id = "sshouseNum" class="form-control">
                </div>

                <label>COURSE <b style = "color: red;">*</b></label>
                <select id="course" name="course" class="form-control" required="true">
                <option value="">Select below</option>
                <option value="Bachelor of Science in Information Technology (BSIT)">Bachelor of Science in Information Technology (BSIT)</option>
                <option value="Bachelor of Science in Food Technology (BSFT)">Bachelor of Science in Food Technology (BSFT)</option>
                <option value="Bachelor of Science in Marine Biology (BSMB)">Bachelor of Science in Marine Biology (BSMB)</option>
                <option value="Bachelor of Public Administration (BPA)">Bachelor of Public Administration (BPA)</option>
                <optgroup label="Bachelor of Secondary Education (BSEd)">
                <option value="BSE major in English">BSE major in English</option>
                <option value="BSE major in Biological Science">BSE major in Biological Science</option>
                <option value="BSE major in Mathematics">BSE major in Mathematics</option>
                <option value="BSE major in Technology and Livelihood Education">BSE major in Technology and Livelihood Education</option>
                <optgroup label="Bachelor of Science in Fisheries (BSFi)">
                <option value="BSFi major in Fish Culture">BSFi major in Fish Culture</option>
                <option value="BSFi major in Fish Capture">BSFi major in Fish Capture</option>
                <option value="BSFi major in Fish Processing">BSFi major in Fish Processing</option>
                </select>

              <label>BIRTHDAY <b style = "color: red;">*</b></label>
              <table>
              <tr>
              <td><input type="date" class="form-control" name="nominee_one_dob" id="nominee_one_dob" required="true"></td>
              <td><input type="text" class="form-control" placeholder = "Your age" name = "age" id="age" required="true"></td>
              </tr>
              </table>

                <label>GENDER <b style = "color: red;">*</b></label>
                <select required class="form-control" id="gender" name="gender">
                  <option value="">Select below</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>

                <label>CIVIL STATUS <b style = "color: red;">*</b></label>
                <select required class="form-control" id="status" name="status" onchange="abc(this.options[this.selectedIndex].value)">
                  <option value="">Select below</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widow">Widow</option>
                  <option value="Separated">Separated</option>
                </select>
                <div id="div2"></div>

                <label>NATIONALITY <b style = "color: red;">*</b></label>
              <input type="text" class="form-control" name = "nationality" id = "nationality" placeholder = "State your nationality" required="true" />

              <label>SIBLING NAME &amp; EDUCATIONAL ATTAINMENT <b style = "color: red;">*</b></label>
              <div class="form-group">
            <div id='TextBoxesGroup4'>
              <div id="TextBoxDiv1">
            </div></div>
            <table>
            <tr>
            <td>
            <button type="button" value='Add' id='addButton4' class="form-control" style="width:100%; border: solid black;">Add Sibling</button></td>
            <td>
            <button type="button" value='Add' id='removeButton4' class="form-control" style="width:100%; border: solid black;">Remove Sibling</button></td>
            </tr>
            </table>
            </div>

            <label>NUMBER OF SIBLINGS CURRENTLY ENROLLED AT DNSC <b style = "color: red;">*</b></label>
            <input type="text" name="sibling2" id="sibling2" class="form-control" required="true">

            <label>NAME OF HIGH SCHOOL &amp; YEAR GRADUATED <b style = "color: red;">*</b></label>
            <table>
              <tr>
                <td>
            <select class="form-control" placeholder = "Complete Name of the School" id = "hsGraduated" name = "hsGraduated" required="true" onchange="hs(this.options[this.selectedIndex].value)">
              <option value="">Select below</option>
              <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT hsName from highschool order by hsName";
    $result = mysqli_query($sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['hsName'] . "'>" . $row['hsName'] . "</option>";
    }
    ?>
            <option value="Others">NOT IN THE LIST</option>
            </select></td>
            <td><select class="form-control" id="yearGrad" style="width: 100%;" name="yearGrad" required="true">
            <option value="">-Year Graduated-</option>
            <?php $current_year = date("Y");
    for ($i = 1990; $i <= $current_year; $i++) {?>
            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
}?>
            </select></td>
          </tr>
        </table>
            <div id="div1"></div>

           <label>TYPE OF HIGH SCHOOL ORIGIN <b style = "color: red;">*</b></label>
          <select id="hsType" name="hsType" class="form-control" required="true">
              <option value="">Choose below</option>
              <option value="Public">Public</option>
              <option value="Private">Private</option>
          </select>

                <label>STANINE (OLSAT Result) <b style = "color: red;">*</b></label>
              <select id="stanine" name="stanine" required="true" class="form-control" required="true">
                <option value="">Choose below</option>
                <optgroup label="Low">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <optgroup label="Moderate">
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <optgroup label="High">
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
              </select>

                <label>CELLPHONE/TELEPHONE <b style = "color: red;">*</b></label>
                <input type="text" placeholder="Contact Number" id="contact" name="contact" class="form-control" maxlength = "11" autocomplete="off">
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

             <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend style="font-family: Century Gothic;">Step 2 of 3: <b>Parent Information</b></legend>
             <label> ETHNIC ORIGIN </label>
                <select required="true" class="form-control" id="ethnicSlct" name="ethnicSlct" onchange="ethnic(this.options[this.selectedIndex].value)">
                <option value="">Choose below</option>
                <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT ethnicName from ethnic order by ethnicName";
    $result = mysqli_query($sql);
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['ethnicName'] . "'>" . $row['ethnicName'] . "</option>";
    }
    ?>
                <option value="Others">Others</option>
              </select>
            <div id="div3"></div>

            <label> FATHER'S INFORMATION </label>
            <table>
              <tr>
                <td><input type="text" class="form-control" name="fatherEd" id="fatherEd" placeholder = "Name" value="" autocomplete="off" required="true"></td>
              <td>
              <select id="fAttain" name="fAttain" class="form-control" required="true">
                <option value="">–– Educational Attainment ––</option>
                <option value="Not Applicable"> Not Applicable </option>
                <option value="Elementary Level">Elementary Level</option>
                <option value="Elementary Graduate">Elementary Graduate</option>
                <option value="High School Level">High School Level</option>
                <option value="High School Graduate">High School Graduate</option>
                <option value="College Level">College Level</option>
                <option value="College Graduate">College Graduate</option>
                <option value="Graduate School">Graduate School</option>
              </select>
              </td>
            </tr>
          </table>
              <label> OCCUPATION (Father) </label>
              <input type="text" class="form-control" id="occupationF" name="occupationF" required="true" />

              <label> MOTHER'S INFORMATION </label>
              <table>
                <tr>
                  <td><input type="text" class="form-control" name="motherEd" id="motherEd" placeholder = "Name" value="" autocomplete="off" required="true"></td>
                  <td><select id="mAttain" name="mAttain" class="form-control" required="true">
                <option value="">–– Educational Attainment ––</option>
                <option value="">–– Educational Attainment ––</option>
                <option value="Not Applicable"> Not Applicable </option>
                <option value="Elementary Level">Elementary Level</option>
                <option value="Elementary Graduate">Elementary Graduate</option>
                <option value="High School Level">High School Level</option>
                <option value="High School Graduate">High School Graduate</option>
                <option value="College Level">College Level</option>
                <option value="College Graduate">College Graduate</option>
                <option value="Graduate School">Graduate School</option>
              </select></td>
                </tr>
              </table>



            <label> OCCUPATION (Mother)</label>
            <input type="text" class="form-control" id="occupationM" name="occupationM" required="true" />

            <label> RELIGION </label>
                            <?php
mysqli_connect('localhost', 'root', '');
    mysqli_select_db('tryit');

    $sql    = "SELECT religionName from religion";
    $result = mysqli_query($sql);

    echo "<select name='religion' id='religion' class='form-control' onchange='rel(this.options[this.selectedIndex].value)'' required='true'>";
    echo "<option value=''>Choose below</option>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<option value='" . $row['religionName'] . "'>" . $row['religionName'] . "</option>";
    }
    echo "<option value='Others'>NOT IN THE LIST</option>";
    echo "</select>";
    ?>
              <div id="div4"></div>

              <label> DIALECT/S SPOKEN </label>

                    <h6><input id = "chckbx1"  type="checkbox" name="chk1[]" value = "Visayan"> VISAYAN<br>
                    <input type="checkbox" name="chk1[]"  value = "Tagalog" id = "chckbx2"> TAGALOG <br>
                    <input type="checkbox" name="chk1[]"  value = "English" id = "chckbx3"> ENGLISH <br>
                    <input type="checkbox" name="chk1[]"  value = "Dabawenyo" id = "chckbx4"> DABAWENYO <br>
                    <input type="checkbox" name="chk1[]"  value = "Ilocano" id = "chckbx5"> ILOCANO <br>
                    <input type="checkbox" name="chk1[]"  value = "Ilonggo" id = "chckbx6"> ILONGGO <br>
                    <input type="checkbox" name="chk1[]"  value = "Muslim" id = "chckbx7"> MUSLIM <br>
            <input type="checkbox" id = "others"  name='others' onclick="enable_textDialect(this.checked)">OTHERS
              <div id="div7"></div>
              </h6>

           <label> SPECIAL SKILLS/TALENTS </label>
          <h6><input id = "c1"  type="checkbox" name="chk2[]" value = "Singing">SINGING<br>
          <input type="checkbox" name="chk2[]"  value = "Dancing" id = "c2">DANCING <br>
          <input type="checkbox" name="chk2[]"  value = "Theater Arts" id = "c3">THEATER ARTS <br>
          <input type="checkbox" name="chk2[]"  value = "Sports games" id = "c4">SPORTS GAMES <br>
          <input type="checkbox" name="chk2[]"  value = "Painting/Drawing" id = "c5">PAINTING/DRAWING <br>
          <input type="checkbox" name="chk2[]"  value = "Cooking/Baking" id = "c6">COOKING/BAKING <br>
          <input type="checkbox" name="chk2[]"  value = "Playing Musical Instrument" id = "c7">PLAYING MUSICAL INSTRUMENT <br>
          <input type="checkbox" id = "others"  name='others' onclick="enable_textSkills(this.checked)">OTHERS
          <div id="div8"></div>
          </h6>

          <label> TYPE OF DISABILITY (<i>If any, please check and specify</i>) </label>
          <h6><input id = "ch1"  type="checkbox" name="chk3[]" value = "Psychosocial Disability">PSYCHOSOCIAL DISABILITY<br>
          <input type="checkbox" name="chk3[]"  value = "Chronic Illness" id = "ch2">CHRONIC ILLNESS<br>
          <input type="checkbox" name="chk3[]"  value = "Hearing Disability" id = "ch3">HEARING DISABILITY <br>
          <input type="checkbox" name="chk3[]"  value = "Visual Disability" id = "ch4">VISUAL DISABILITY <br>
          <input type="checkbox" name="chk3[]"  value = "Learning Disability" id = "ch5">LEARNING DISABILITY <br>
          <input type="checkbox" name="chk3[]"  value = "Speech Impairment" id = "ch6">SPEECH IMPAIRMENT <br>
          <input type="checkbox" name="chk3[]"  value = "Mental Disability" id = "ch7">MENTAL DISABILITY <br>
          <input type="checkbox" id = "others"  name='others' onclick="enable_textDisability(this.checked)">OTHERS
          <div id="div9"></div>
          </h6>

          <label> HANDEDNESS </label>
          <h6><input type="checkbox" name="chk4[]" value = "Right" id = "checkbx1">RIGHT
          <input type="checkbox" name="chk4[]"  value = "Left" id = "checkbx2">LEFT
          </h6>


          <label> PROBLEMS ENCOUNTERED </label>
          <h6><input id = "chbx1"  type="checkbox" name="chk5[]" value = "Parents working abroad">PARENTS WORKING ABROAD<br>
          <input type="checkbox" name="chk5[]"  value = "Family problem" id = "chbx2">FAMILY PROBLEM<br>
          <input type="checkbox" name="chk5[]"  value = "Separated parents" id = "chbx3">SEPARATED PARENTS <br>
          <input type="checkbox" name="chk5[]"  value = "Finances" id = "chbx4">FINANCES <br>
          <input type="checkbox" name="chk5[]"  value = "Personal/Emotional problem" id = "chbx5">PERSONAL/EMOTIONAL PROBLEM <br>
          <input type="checkbox" name="chk5[]"  value = "Lack of time-management" id = "chbx6">LACK OF TIME-MANAGEMENT <br>
          <input type="checkbox" name="chk5[]"  value = "Peer pressure" id = "chbx7">PEER PRESSURE <br>
          <input type="checkbox" name="chk5[]"  value = "Low academic performance" id = "chbx8">LOW ACADEMIC PERFORMANCE <br>
          <input type="checkbox" name="chk5[]"  value = "Relationship with same sex" id = "chbx9">RELATIONSHIP WITH SAME SEX <br>
          <input type="checkbox" name="chk5[]"  value = "Relationship with opposite sex" id = "chbx10">RELATIONSHIP WITH OPPOSITE SEX <br>
          <input type="checkbox" name="chk5[]"  value = "Computer addiction" id = "chbx11">COMPUTER ADDICTION <br>
          <input type="checkbox" id = "others"  name='others' onclick="enable_textProblems(this.checked)">OTHERS
          <div id="div10"></div>
          </h6>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back2" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                <button class="btn btn-primary open2" type="button">Next <span class="fa fa-arrow-right"></span></button>
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf3" class="frm" style="display: none;">
          <fieldset>
            <legend style="font-family: Century Gothic;">Step 3 of 3: <b>Socio-Economic Status</b></legend>

            <label> FAMILY MONTHLY INCOME (Total income including incomes of parents)</label>
              <select class="form-control" id="income" name="income" required="true">
                <option value="">Choose below</option>
                <option value="P7,500 &amp; below">P7,500 &amp; below</option>
                <option value="P7,501 - P15,000">P7,501 - P15,000</option>
                <option value="P15,001 - P22,500">P15,001 - P22,500</option>
                <option value="P22,501 - P30,000">P22,501 - P30,000</option>
                <option value="P30,001 &amp; above">P30,001 &amp; above</option>
              </select>
              <label> STATUS OF THE HOUSE WHERE YOU LIVE</label>
              <select id="house" name="house" class="form-control" required="true">
                <option value="">Choose below</option>
                <option value="Owned">Owned</option>
                <option value="Rented/Leased">Rented/Leased</option>
                <option value="None">None</option>
              </select>
              <label> STATUS OF THE RESIDENTIAL LOT WHERE YOU LIVE</label>
              <select id="lot" name="lot" class="form-control" required="true">
                <option value="">Choose below</option>
                <option value="Owned">Owned</option>
                <option value="Rented/Leased">Rented/Leased</option>
                <option value="None">None</option>
              </select>
              <label> LIGHT FACILITIES USED </label>
              <select id="light" name="light" onchange="lights(this.options[this.selectedIndex].value)" class="form-control" required="true">
                <option value="">Choose below</option>
                <option value="Electricity">Electricity</option>
                <option value="Petroleum">Petroleum</option>
                <option value="Others">Others</option>
              </select>
              <div id="div5"></div>

              <label> MEANS OF WATER SUPPLY</label>
              <select id="water" name="water" class="form-control" required="true">
                <option value="">Choose below</option>
                <option value="Open Well">Open Well</option>
                <option value="Hand Pump">Hand Pump</option>
                <option value="Electric Pump">Electric Pump</option>
                <option value="Rain">Rain</option>
                <option value="Dumoy">Dumoy</option>
                <option value="NAWASA">NAWASA</option>
              </select>

              <label> TYPE OF TOILET USED</label>
              <select id="toilet" name="toilet" class="form-control" required="true"s>
                <option value="">Choose below</option>
                <option value="Flush Type">Flush Type</option>
                <option value="Antipolo (Closed Pit)">Antipolo (Closed Pit)</option>
                <option value="Public Toilet">Public Toilet</option>
                <option value="None">None</option>
              </select>

              <label> POSSESSION OF TRANSPORTATION </label>
              <select id="transport" name="transport" onchange="transportation(this.options[this.selectedIndex].value)" class="form-control" required="true">
                <option value="">Choose below</option>
                <option value="Car">Car</option>
                <option value="Jeepney">Jeepney</option>
                <option value="Motorcycle/Tricycle">Motorcycle/Tricycle</option>
                <option value="Trisikad/Bicycle">Trisikad/Bicycle</option>
                <option value="None">None</option>
                <option value="Others">Others</option>
              </select>
                <div id="div6"></div>

                <label> APPLIANCES OWNED </label>
                    <h6>
                    <input type="checkbox" class="cc" name="check[]" value = "Refrigerator" id = "check1" >REFRIGERATOR<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Gas Range" id = "check2">GAS RANGE<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Stereo/CD/Radio" id = "check3">STEREO/CD/RADIO<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Electric Iron" id = "check4">ELECTRIC IRON<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Air Conditioner" id = "check5">AIR CONDITIONER<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Electric Fan" id = "check6">ELECTRIC FAN<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Gas Stove" id = "check7">GAS STOVE<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Sewing Machine" id = "check8">SEWING MACHINE<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Computer" id = "check9">COMPUTER<br>
                    <input type="checkbox" class="cc" name="check[]" value = "TV" id = "check10">TV<br>
                    <input type="checkbox" class="cc" name="check[]" value = "Tape Recorder" id = "check11">TAPE RECORDER<br>
                <input type="checkbox" id = "check12" name=others onclick="enable_textAppliances(this.checked)">OTHERS
                   </h6>
                <div id="div11"></div>

                <label> FURNITURE OWNED </label>
                <h6>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Sala set" id = "f1">SALA SET<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Cabinet for plate" id = "f2">CABINET FOR PLATE<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Dining set" id = "f3">DINING SET<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Bed" id = "f4">BED<br>
                <input type="checkbox" class = "furniture" name="furniture[]" value="Cabinet for clothing" id = "f5">CABINET FOR CLOTHING<br>
                <input type="checkbox" id = "checkFurniture" name=othersf onclick="enable_textFurniture(this.checked)">OTHERS
                </h6>
                <div id="div12"></div>

            <!--  <div id="myform">

 <table>
    <tr>
        <td>Title of Training attended</td>
        <td><input type="text" id="training" name="mytext1" class="form-control" autocomplete="off"></td>
    </tr>
    <tr>
        <td>Duration and Credits earned</td>
        <td><input type="text" id="credits" name="mytext1" class="form-control" autocomplete="off"></td>
    </tr>
    <tr>
        <td>Sponsor/College/University</td>
        <td><input type="text" id="sponsor" name="mytext1" class="form-control" autocomplete="off">
        <input type="button" id="add" value="Add" onclick="Javascript:addRow()"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>
</div>
<div id="mydata">
<table id="myTableData"  border="1" cellpadding="2">
    <tr>
        <td><b>Title of Training attended</b></td>&nbsp;&nbsp;
        <td><b>Duration and Credits</b></td>&nbsp;&nbsp;
        <td><b>Sponsor/College/University</b></td>&nbsp;&nbsp;
        <td><b>Action</b></td>
    </tr>
</table>
&nbsp;<br/>
</div> -->
                <!-- <input type = "number" min="0" step="1" style="font-family: Century Gothic;" class="form-control" name="trainingNum" id="trainingNum" placeholder = "(Numeric only)" />
                <button id = "btn" class="add_field_button">GENERATE <span class="fa fa-arrow-right"></span></button>
                <div class="input_fields_wrap">

                <div>

              </div>
              </div> -->
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back3" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                <button class="btn btn-primary open3" type="button">Next <span class="fa fa-arrow-right"></span> </button>
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div>
          </fieldset>
        </div>
        <div id="sf4" class="frm" style="display: none;">
          <fieldset>
            <legend style="font-family: Century Gothic;"><b>Saving Profile...</b></legend>

            <div class="form-group">
              <h5>ALMOST THERE!</h5>
               <label style = "font-family: latoregular;"> You're about to save your profile.</label>

             <!-- <label>Year Employed</label>
              <input type="text" id="yearEmployed" name="yearEmployed" class="form-control" autocomplete="off">-->
                   <div id="ifYes">


                 </div>
                <input type="text" id="myText" name="myText" value="0" hidden>


            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
               <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Review</button>
                <button class="btn btn-primary open4" id = "submit_form" type="button">Submit </button>
                <img src="spinner.gif" alt="" id="loader" style="display: none">
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
$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Value must not equal arg.");

 // configure your validation
 $("basicform").validate({
  rules: {
   gender: { valueNotEquals: "..." }
  },
  messages: {
   status: { valueNotEquals: "..." }
  }
 });
    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        fname: {
          required: true,
          minlength: 0,
          maxlength: 50
        },
        lname: {
          required: true,
          minlength: 0,
          maxlength: 50
        },
        mname: {
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
        email: {
          required: true,
        },
        s1: {
          required: true
        },
        s2: {
          required: true
        },
        s3: {
          required: true
        },
        shouseNum: {
          required: true
        },
        ss1: {
          required: true
        },
        ss2: {
          required: true
        },
        ss3: {
          required: true
        },
        sshouseNum: {
          required: true
        },
        email: {
          required: true,
          minlength: 2,
          email: true,
          maxlength: 100
        },
        sibling2: {
          required: true,
          minlength: 1,
          maxlength: 2,
          number: true,
          digits: true
        },
        contact: {
          required: true,
          minlength: 7,
          number: true,
          digits: true
        },
        age: {
          maxlength: 2,
          number: true,
          digits: true
        },
        degree: {
          required: true
        },
        college: {
          required: true
        },
        year: {
          required: true
        },
        exam: {
          required: true
        },
        date: {
          required: true
        },
        rating: {
          required: true
        },
        awards: {
          required: true
        },
        sponsor: {
          required: true,
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
        $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
        $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
      }
          });

    $(".open3").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf4").show("slow");
        $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
      }
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

     if (count >= 0){
      furniture = [];
      $.each($("input[name='furniture[]']:checked"), function(){
      furniture.push($(this).val());
      });
      count++;
      }

      if (count >= 0){
          handedness = [];
          $.each($("input[name='chk4[]']:checked"), function(){
          handedness.push($(this).val());
      });
      count++;
      }

     if (count >= 0){
      skills = [];
      $.each($("input[name='chk2[]']:checked"), function(){
      skills.push($(this).val());
  });
  count++;
  }

      if (count >= 0){
          dialect = [];
          $.each($("input[name='chk1[]']:checked"), function(){
          dialect.push($(this).val());
      });
      count++;
      }

      if (count >= 0){
              disability = [];
              $.each($("input[name='chk3[]']:checked"), function(){
              disability.push($(this).val());
          });
          count++;
          }

      if (count >= 0){
              problems = [];
              $.each($("input[name='chk5[]']:checked"), function(){
              problems.push($(this).val());
          });
          count++;
          }

       if (count >= 0){
          favorite = [];
          $.each($("input[name='check[]']:checked"), function(){
          favorite.push($(this).val());
      });
      count++;
      }

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
       $(function()
{
        $.post("validate.php",
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
                contact: $('#contact').val(),
                ethnic: $('#ethnicSlct').val(),
                otherethnic: $('#ethnicInput').val(),
                father: $('#fatherEd').val(),
                attainfather: $('#fAttain').val(),
                fatherOccup: $('#occupationF').val(),
                mother: $('#motherEd').val(),
                attainmother: $('#mAttain').val(),
                motherOccup: $('#occupationM').val(),
                religion: $('#religion').val(),
                otherreligion: $('#religionTwo').val(),
                dialect: dialect.join(", "),
                otherdialect: $('#otherDialect').val(),
                skills: skills.join(", "),
                otherSkills: $('#otherSkills').val(),
                disability: disability.join(", "),
                otherDisability: $('#otherDisability').val(),
                handedness: handedness.join(", "),
                problems: problems.join(", "),
                otherProblems: $('#otherProblems').val(),
                income: $('#income').val(),
                houseStatus: $('#house').val(),
                lotStatus: $('#lot').val(),
                light: $('#light').val(),
                otherLight: $('#otherLight').val(),
                water: $('#water').val(),
                toilet: $('#toilet').val(),
                transport: $('#transport').val(),
                otherTransport: $('#otherTransport').val(),
                appliances: favorite.join(", "),
                otherAppliances: $('#otherAppliances').val(),
                furniture: furniture.join(", "),
                otherFurniture: $('#otherFurniture').val()
        },
        function(data, textStatus)
        {
            if (data == "New record created successfully"){
            var x = document.getElementById("forSuccess")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            window.location.href = "logoutGrad.php";
        }
            else {
            var x = document.getElementById("forError")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
        });
    });

       $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time.</h2><br><h4><a href = "view.php" style = "text-decoration: none;"> Continue to profile</a> | <a href = "logoutGrad.php" style = "text-decoration: none;">Sign out</a></h4>');
         }, 1000);

        return false;
      }

    });

    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
      $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
     $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
    });

    $(".back4").click(function() {
      $(".frm").hide("fast");
      $("#sf3").show("slow");
     $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
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

<?php
}
?>