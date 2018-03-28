<?php
include 'sessionGrad.php';

if (!(isset($_SESSION['login_grad']) && $_SESSION['login_grad'] != '')) {
    header("Location: graduatesLogin.php");
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
$result = mysqli_query($connection, "SELECT * FROM geninfo where username = '$login_sessionGrad'");

?>

<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
<!--    <link href="css/styleGrad.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script type="text/javascript">
$(document).ready(function() {
    if(document.getElementById('education').checked == true){
      $("#dependent-box2").show();
      $("#dependent-box3").hide();
    }
    else{
      $("#dependent-box2").hide();
      $("#dependent-box3").show();
    }

});
</script>
<script type="text/javascript">
function hideShowEduc (f, status) {
    var box1 = document.getElementById('education').checked;
    var dependent = $('#dependent-box2');
    var dependent2 = $('#dependent-box3');
    if (box1 == true){
    dependent.show();
    dependent2.hide();
    }
    else{
    document.getElementById("ss1").value= "";
    document.getElementById("ss2").value= "";
    document.getElementById("ss3").value= "";
    document.getElementById("sshouseNum").value= "";
    dependent.hide();
    dependent2.show();
    }

    checkbox.change(function(e){
           dependent.toggle();
           dependent2.toggle();
        });
}
</script>
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
<script>
  $(function() {
    $("input:checkbox").on('click', function() {
      // in the handler, 'this' refers to the box clicked on
      var $box = $(this);
      if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='check[]']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
      } else {
        $box.prop("checked", false);
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
</style>
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

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2);
if(x.disabled == true){
document.getElementById("otherstatus").value= "";
}

if (aList.selectedIndex == 3){
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
var y=document.getElementById("skills");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others
y.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 9); //self-employed
if(x.disabled == true){
document.getElementById("othernaturework").value= "";
}
if(y.disabled == true){
document.getElementById("skills").value= "";
}
if (aList.selectedIndex == 8){
  skills.focus();
}
else if(aList.selectedIndex == 9){
  othernaturework.focus();
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
  $(function() {
    var $r1 = $('#r1');
    var $r2 = $('#r2');
    var $r3 = $('#r3');
    var $r4 = $('#r4');
    var $r5 = $('#r5');
    var $r6 = $('#r6');
    var $r7 = $('#r7');
    var $r8 = $('#r8');
    var $r9 = $('#r9');
    var $r10 = $('#r10');
    var $r11 = $('#r11');
    var $s1 = $('#s1');
    var $s2 = $('#s2');
    var $s3 = $('#s3');
    var $s4 = $('#s4');
    var $prevJob = $('#NoGroup');
    var $y1 = $('#y1');
    var $y2 = $('#y2');
    var $y3 = $('#y3');
    var $y4 = $('#y4');
    var $y5 = $('#y5');
    var $y6 = $('#y6');
    var $y7 = $('#y7');
    var $y8 = $('#y8');
    var $y9 = $('#y9');
    var $y10 = $('#y10');
    var $x1 = $('#x1');
    var $x2 = $('#x2');
    var $x3 = $('#x3');
    var $x4 = $('#x4');
    var $x5 = $('#x5');
    var $x6 = $('#x6');
    var $status = $('#employStatus');
    $('#employ').change(function() {
        if (this.value == 'No') {
          $r1.prop('disabled', false);
          $r2.prop('disabled', false);
          $r3.prop('disabled', false);
          $r4.prop('disabled', false);
          $r5.prop('disabled', false);
          $r6.prop('disabled', false);
          $r7.prop('disabled', false);
          $r8.prop('disabled', false);
          $r9.prop('disabled', false);
          $r10.prop('disabled', false);
          $r11.prop('disabled', false);
          $prevJob.prop('disabled', false);
          $s1.prop('disabled', true);
          $s2.prop('disabled', true);
          $s3.prop('disabled', true);
          $s4.prop('disabled', true);
          $y1.prop('disabled', true);
          $y2.prop('disabled', true);
          $y3.prop('disabled', true);
          $y4.prop('disabled', true);
          $y5.prop('disabled', true);
          $y6.prop('disabled', true);
          $y7.prop('disabled', true);
          $y8.prop('disabled', true);
          $y9.prop('disabled', true);
          $y10.prop('disabled', true);
          $x1.prop('disabled', false);
          $x1.prop('disabled', false);
          $x2.prop('disabled', false);
          $x3.prop('disabled', false);
          $x4.prop('disabled', false);
          $x5.prop('disabled', false);
          $x6.prop('disabled', false);
          $status.prop('disabled', true);
        }
    else if (this.value == 'Yes'){
      $s1.prop('disabled', false);
          $s2.prop('disabled', false);
          $s3.prop('disabled', false);
          $s4.prop('disabled', false);
          $y1.prop('disabled', false);
          $y2.prop('disabled', false);
          $y3.prop('disabled', false);
          $y4.prop('disabled', false);
          $y5.prop('disabled', false);
          $y6.prop('disabled', false);
          $y7.prop('disabled', false);
          $y8.prop('disabled', false);
          $y9.prop('disabled', false);
          $y10.prop('disabled', false);
          $r1.prop('disabled', true);
          $r2.prop('disabled', true);
          $r3.prop('disabled', true);
          $r4.prop('disabled', true);
          $r5.prop('disabled', true);
          $r6.prop('disabled', true);
          $r7.prop('disabled', true);
          $r8.prop('disabled', true);
          $r9.prop('disabled', true);
          $r10.prop('disabled', true);
          $r11.prop('disabled', true);
          $prevJob.prop('disabled', true);
          $x1.prop('disabled', true);
          $x1.prop('disabled', true);
          $x2.prop('disabled', true);
          $x3.prop('disabled', true);
          $x4.prop('disabled', true);
          $x5.prop('disabled', true);
          $x6.prop('disabled', true);
          $status.prop('disabled', false);
    }
        else {
          $r1.prop('disabled', true);
          $r2.prop('disabled', true);
          $r3.prop('disabled', true);
          $r4.prop('disabled', true);
          $r5.prop('disabled', true);
          $r6.prop('disabled', true);
          $r7.prop('disabled', true);
          $r8.prop('disabled', true);
          $r9.prop('disabled', true);
          $r10.prop('disabled', true);
          $r11.prop('disabled', true);
          $prevJob.prop('disabled', true);
          $s1.prop('disabled', true);
          $s2.prop('disabled', true);
          $s3.prop('disabled', true);
          $s4.prop('disabled', true);
          $y1.prop('disabled', true);
          $y2.prop('disabled', true);
          $y3.prop('disabled', true);
          $y4.prop('disabled', true);
          $y5.prop('disabled', true);
          $y6.prop('disabled', true);
          $y7.prop('disabled', true);
          $y8.prop('disabled', true);
          $y9.prop('disabled', true);
          $y10.prop('disabled', true);
          $x1.prop('disabled', true);
          $x1.prop('disabled', true);
          $x2.prop('disabled', true);
          $x3.prop('disabled', true);
          $x4.prop('disabled', true);
          $x5.prop('disabled', true);
          $x6.prop('disabled', true);
          $status.prop('disabled', true);
        }
    }).trigger('change');
});
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

  newTextBoxDiv.after().html('<table><tr><td><input type="text" placeholder="Title of Training attended" id="training" name="mytext1" class="form-control" autocomplete="off"></td><td><input type="text" placeholder="Duration and Credits Earned" id="credits" name="mytext1" class="form-control" autocomplete="off"></td><td><input type="text" placeholder="Sponsor/College/University" id="sponsor" name="mytext1" class="form-control" autocomplete="off"></td></tr></table>');

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

  newTextBoxDiv.after().html('<table><tr><td><input type="text" style="width: 100%;" id="degree" name="degree" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="college" name="college" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="year" name="year" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="awards" name="awards" class="form-control" autocomplete="off"></td></tr></table>');

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

  newTextBoxDiv.after().html('<table><tr><td><input type="text" style="width: 100%;" id="exam" name="exam" class="form-control" autocomplete="off"></td><td><input type="date" style="width: 100%;" id="date" name="date" class="form-control" autocomplete="off"></td><td><input type="text" style="width: 100%;" id="rating" name="rating" class="form-control" autocomplete="off"></td></tr></table>');

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
</head>
<body onload="load()">
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
<h2 align = "center" style="font-family: century gothic;">GRADUATE TRACER SURVEY</h2>
<hr>

<h1 style="font-family: Century Gothic; color: black; text-align: center;" id = "user" value = "<?php echo $login_sessionGrad; ?>"><?php echo $login_sessionGrad; ?></h1>
<p style="font-family: Century Gothic; text-align: center; color: green;">You have logged in as <b style="font-family: Arial Black; color: green"><?php echo $login_sessionGrad; ?></b>. (<a href = "logoutGrad.php" style="text-decoration: none; color: green;">Log out</a>)
  <div class="container" style="padding-left: 0px; padding-right: 15px; width: 102%;">
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title" style = "font-family: Century Gothic;">DNSC GRADUATE TRACER FORM</h3>
    </div>
    <div class="panel-body">
<?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}
$db_select = mysqli_select_db($connection, "tryit");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

$result = mysqli_query($connection, "SELECT * FROM education WHERE username = '$login_sessionGrad'");
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
      <form name="basicform" id="basicform">
        <div id="sf1" class="frm">
          <fieldset>
            <legend style="font-family: Century Gothic;"><b>Educational Background</b></legend>
            <input name="education" id="education" onclick="hideShowEduc (this.form, this.checked)" type="checkbox"> I have pursued Graduate Studies.
            <h4 style="font-family: Century Gothic; color: black;">EDUCATIONAL ATTAINMENT</h4>
            <div id="dependent-box2">
            <div class="form-group">
            <table><tr>
                <td><label>ADVANCED STUDIES/DEGREE </label></td>
                <td><label>COLLEGE OR UNIVERSITY </label></td>
                <td><label>SEMESTER AND YEAR </label></td>
                <td><label>HONORS/AWARDS RECEIVED </label></td>
                </tr></table>
            <?php
if ($row['degree'] == "" && $row['college'] == "" && $row['year'] == "" && $row['awards'] == "") {
        # code...
    } else {
        ?>
              <table><tr>
                <input type="text" style="width: 100%;" id="degree" name="degree" class="form-control" autocomplete="off" value="<?php echo $row['degree']; ?>"></td>
                <input type="text" style="width: 100%;" id="college" name="college" class="form-control" autocomplete="off" value="<?php echo $row['college']; ?>"></td>
                <input type="text" style="width: 100%;" id="year" name="year" class="form-control" autocomplete="off" value="<?php echo $row['year']; ?>"></td>
                <input type="text" style="width: 100%;" id="awards" name="awards" class="form-control" autocomplete="off" value="<?php echo $row['awards']; ?>"></td>
                </tr></table>
              <?php
}
    ?>
              <div id='TextBoxesGroup2'>
              <div id="TextBoxDiv1">
              </div></div>
             <table>
              <tr>
              <td>
              <button type="button" value='Add' id='addButton2' class="form-control" style="width:100%; border: solid black;">Add Education</button></td>
              <td>
              <button type="button" value='Add' id='removeButton2' class="form-control" style="width:100%; border: solid black;">Remove Education</button></td>
              </tr>
              </table>
            </div>
            </div>
            <div id="dependent-box3">
            <label>COURSE <b style = "color: red;">*</b></label>
             <select required class="form-control" id="course" name="course">
              <option value="">Select below</option>
              <option <?php $row['course'] == 'BSIT' ? print "selected" : "";?> value="BSIT">Bachelor of Science in Information Technology</option>
              <option <?php $row['course'] == 'BSEd' ? print "selected" : "";?> value="BSEd">Bachelor of Science in Education</option>
              <option <?php $row['course'] == 'BPA' ? print "selected" : "";?> value="BPA">Bachelor of Public Administration</option>
              <option <?php $row['course'] == 'BSMB' ? print "selected" : "";?> value="BSMB">Bachelor of Science in Marine Biology</option>
              <option <?php $row['course'] == 'BSFT' ? print "selected" : "";?> value="BSFT">Bachelor of Science in Food Technology</option>
              <option <?php $row['course'] == 'BSFi' ? print "selected" : "";?> value="BSFi">Bachelor of Science in FIsheries</option>
              <option <?php $row['course'] == 'BAT' ? print "selected" : "";?> value="BAT">Bachelor of Agriculture Technology</option>

            </select>
            <label>SCHOOL YEAR GRADUATED <b style = "color: red;">*</b></label>
                            <select required id="syGrad" name="syGrad" class="form-control">
                            <option value="">Select below</option>
                            <?php $current_year = date("Y");
    for ($i = 2013; $i <= $current_year; $i++) {?>
                            <option <?php $row['syGrad'] == $i . "-" . ($i + 1) ? print "selected" : "";?> value="<?php echo $i . "-" . ($i + 1); ?>"><?php echo $i . "-" . ($i + 1); ?></option>
                            <?php
}?>
            </select>
            </div>
            <hr />
            <h4 style="font-family: Century Gothic; color: black;">PROFESSIONAL EXAMINATION(S) / TESDA ASSESSMENTS PASSED <b style = "color: red;">*</b></h4>
            <div class="form-group">
            <div id='TextBoxesGroup3'>
              <div id="TextBoxDiv1">
              <table><tr>
               <td><label>EXAMINATION NAME &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
               <td><label>EXAM DATE &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
               <td><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; EXAM RATING &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
               </tr></table>
          <?php
if ($row['exam'] == "" && $row['dateExam'] == "" && $row['rating'] == "") {
        # code...
    } else {
        ?>
          <table><tr>
          <td><input type="text" style="width: 100%;" id="exam" name="exam" class="form-control" autocomplete="off" value="<?php echo $row['exam']; ?>"></td>
          <td><input type="text" style="width: 100%;" id="dateExam" name="dateExam" class="form-control" autocomplete="off" value="<?php echo $row['dateExam']; ?>"></td>
          <td><input type="text" style="width: 100%;" id="rating" name="rating" class="form-control" autocomplete="off" value="<?php echo $row['rating']; ?>"></td>
          </tr></table>
            <?php
}
    ?>
           </div></div>
            <table>
            <tr>
            <td>
            <button type="button" value='Add' id='addButton3' class="form-control" style="width:100%; border: solid black;">Add Exam/Assessments</button></td>
            <td>
            <button type="button" value='Add' id='removeButton3' class="form-control" style="width:100%; border: solid black;">Remove Exam/Assessments</button></td>
            </tr>
            </table>
            </div>
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
                <a href = "viewProfile.php" style="text-decoration: none;"><button class="btn btn-warning" type="button"><span class="fa fa-arrow-left"></span> Back</button></a>
                <button class="btn btn-primary" id = "submit_form" type="button">Update </button>
              </div>
            </div>
            <div id="forSuccess">Your profile has been updated!</div>
                <div id="forError">Failed to update.</div>
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
        var degree = [];
        var college = [];
        var year = [];
        var awards = [];
        var exam = [];
        var rating = [];
        var dateExam = [];
        var count = 0;

        if(count >= 0){
                degree = [];
            $.each($("input[id='degree']"), function(){
                degree.push($(this).val());
            });
}
if(count >= 0){
                college = [];
            $.each($("input[id='college']"), function(){
                college.push($(this).val());
            });
}
if(count >= 0){
                year = [];
            $.each($("input[id='year']"), function(){
                year.push($(this).val());
            });
}
if(count >= 0){
                awards = [];
            $.each($("input[id='awards']"), function(){
                awards.push($(this).val());
            });
}
if(count >= 0){
                exam = [];
            $.each($("input[id='exam']"), function(){
                exam.push($(this).val());
            });
}
if(count >= 0){
                rating = [];
            $.each($("input[id='rating']"), function(){
                rating.push($(this).val());
            });
}
if(count >= 0){
                dateExam = [];
            $.each($("input[id='dateExam']"), function(){
                dateExam.push($(this).val());
            });
}

       $(function()
{
        $.post("save_updateEducation.php",
        {

                username: $('#user').text(),
                degree: degree.join(", "),
                college: college.join(", "),
                year: year.join(", "),
                awards: awards.join(", "),
                course: $('#course').val(),
                syGrad: $('#syGrad').val(),
                exam: exam.join(", "),
                date: dateExam.join(", "),
                rating: rating.join(", ")
        },
        function(data, textStatus)
        {
            if (data == "Success"){
            var x = document.getElementById("forSuccess")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            window.location.href = "viewProfile.php";
        }
            else {
            var x = document.getElementById("forError")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            }
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