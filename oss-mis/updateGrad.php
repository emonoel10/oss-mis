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
  function DisableStatus(aList)
{
var x=document.getElementById("otherstatus");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2);
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

if (aList.selectedIndex == 6){
  firstJob.focus();
}
}
</script>

<script type="text/javascript">
  function DisableStatus(aList)
{
var x=document.getElementById("firstJob");

x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5); //others

if (aList.selectedIndex == 6){
  firstJob.focus();
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
        }
    }).trigger('change');
});
</script>

<script type="text/javascript">
  $(document).ready(function() {
     //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID

    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        var max_fields = document.getElementById('trainingNum').value;
        while(x <= max_fields){ //max input box allowed

            $(wrapper).append('<div id="display"><label>Training # '+x+' </label><input type="text" placeholder="Title of Training attended" id="training" name="mytext1" class="form-control" autocomplete="off"><br><input type="text" placeholder="Duration and Credits Earned" id="credits" name="mytext1" class="form-control" autocomplete="off"><br><input type="text" placeholder="Sponsor/College/University" id="sponsor" name="mytext1" class="form-control" autocomplete="off"><a href="" id="remScnt" style="color: white;">Remove</a></div>'); //add input box
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

      <form name="basicform" id="basicform">
        <div id="sf1" class="frm">
          <fieldset>
            <legend style="font-family: Century Gothic;">Step 1 of 4: <b>General Information</b></legend>

            <div class="form-group">
              <?php
$connection = mysqli_connect("localhost", "root", "");
if (!$connection) {
    die("Database connection failed: " . mysqli_error());
}
$db_select = mysqli_select_db("tryit", $connection);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

$result = mysqli_query("SELECT * FROM geninfo WHERE username = '$login_sessionGrad'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
                <label>Name: </label>
                <input type="text" placeholder="Your Complete Name" id="name" name="name" class="form-control" autocomplete="off" value="<?php echo $row['name']; ?>">
                <label>Permanent Address: </label>
                <input type="text" placeholder="Your Address" id="permanent" name="permanent" class="form-control" autocomplete="off" value="<?php echo $row['permanent']; ?>">
                <label>Present Address: </label>
                <input type="text" placeholder="Your Address" id="present" name="present" class="form-control" autocomplete="off" value="<?php echo $row['present']; ?>">
                <label>Email Address: </label>
                <input type="text" placeholder="Your Valid Email" id="email" name="email" class="form-control" autocomplete="off" value="<?php echo $row['email']; ?>">
                <label>Civil Status: </label>
                <select class="form-control" id="status" name="status">
                  <option <?php $row['status'] == 'Single' ? print "selected" : "";?>>Single</option>
                  <option <?php $row['status'] == 'Married' ? print "selected" : "";?>>Married</option>
                  <option <?php $row['status'] == 'Widow' ? print "selected" : "";?>>Widow</option>
                  <option <?php $row['status'] == 'Separated' ? print "selected" : "";?>></option>>Separated</option>
                </select>
                <label>Cellphone/Telephone: </label>
                <input type="text" placeholder="Contact Number" id="contact" name="contact" class="form-control" maxlength = "11" autocomplete="off" value="<?php echo $row['mobile']; ?>">
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>
<?php
}
?>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-primary open1" type="button">Next <span class="fa fa-arrow-right"></span></button>
              </div>
            </div>

          </fieldset>
        </div>

        <div id="sf2" class="frm" style="display: none;">
          <fieldset>
            <legend style="font-family: Century Gothic;">Step 2 of 4: <b>Educational Background</b><br><i style = "font-size: 15px;">(For those who pursue graduate studies only)</i></legend>
            <h4 style="font-family: Century Gothic; color: black;">Educational Attainment</h4>
            <div class="form-group">
              <label>Advanced Studies/Degree: </label>
              <input type="text" placeholder="" id="degree" name="degree" class="form-control" autocomplete="off">
              <label>College or University: </label>
              <input type="text" placeholder="" id="college" name="college" class="form-control" autocomplete="off">
              <label>Sem & Year: </label>
              <input type="text" placeholder="" id="year" name="year" class="form-control" autocomplete="off">
              <label>Honors/Awards Received: </label>
              <input type="text" placeholder="" id="awards" name="awards" class="form-control" autocomplete="off">
            <hr />
            <h4 style="font-family: Century Gothic; color: black;">Professional Examination(s) / TESDA Assessments Passed</h4>
            <div class="form-group">
              <label>Name of Examination: </label>
              <input type="text" placeholder="" id="exam" name="exam" class="form-control" autocomplete="off">
              <label>Date Taken: </label>
              <input type="date" placeholder="" id="date" name="date" class="form-control" autocomplete="off">
              <label>Rating: </label>
              <input type="text" placeholder="" id="rating" name="rating" class="form-control" autocomplete="off">

            </div>

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
            <legend style="font-family: Century Gothic;">Step 3 of 4: <b>Training Courses attended after Graduation</b></legend>

            <div class="form-group">
              <h5>Please list down all professional or work-related training program(s) you have attended after college.</h5>
              <label>Number of training courses attended</label>
                <input type = "number" min="0" step="1" style="font-family: Century Gothic;" class="form-control" name="trainingNum" id="trainingNum" placeholder = "(Numeric only)" />
                <button id = "btn" class="add_field_button">GENERATE <span class="fa fa-arrow-right"></span></button>
                <div class="input_fields_wrap">

                <div>

              </div>
              </div>
            </div>
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
            <legend style="font-family: Century Gothic;">Step 4 of 4: <b>Employment Data</b></legend>

            <div class="form-group">
              <h5>Question: <b>Are you presently employed?</b></h5>
                <select class="form-control" id="employ" name="employ">
                  <option>Yes</option>
                  <option>No</option>
                  <option>Never</option>
                </select>
              <label><b>IF NO: </b>State the reason(s) why you are not yet employed. (Note: You may select more than one item)</label>
              <input type="checkbox" name = "reasons[]" id="r1" disabled="true"/> Family concern <br>
              <input type="checkbox" name = "reasons[]" id="r2" disabled="true"/> Health-related reasons <br>
              <input type="checkbox" name = "reasons[]" id="r3" disabled="true"/> Lack of work experience <br>
              <input type="checkbox" name = "reasons[]" id="r4" disabled="true"/> Pursuing graduate studies <br>
              <input type="checkbox" name = "reasons[]" id="r5" disabled="true"/>Engaged in entrepreneurship <br>
              <input type="checkbox" name = "reasons[]" id="r6" disabled="true"/>No job opportunity <br>
              <input type="checkbox" name = "reasons[]" id="r7" disabled="true"/>No interest in getting a job <br>
              <input type="checkbox" name = "reasons[]" id="r8" disabled="true"/>Lack of professional eligibility requirements <br>
              <input type="checkbox" name = "reasons[]" id="r9" disabled="true"/>Starting pay is too low <br>
              <input type="checkbox" name = "reasons[]" id="r10" disabled="true"/>Have plans to seek job out of the country <br>
              <input type="checkbox" name = "reasons[]" id="r11" disabled="true" onclick="enable_otherreason(this.checked)" />Others <br>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="otherreason" name="otherreason" class="form-control" autocomplete="off">

              <label><b>IF NO: </b>How long did you stay in your previous job?</label>
              <select id= "NoGroup" name = "prevJob" onchange="DisableNoReason(this)" style="width: 100%; height: 50%;" class="form-control">
                <option>Less than a month</option>
                <option>1-6 months</option>
                <option>7-11 months</option>
                <option>1 year to less than 2 years</option>
                <option>2 years to less than 3 years</option>
                <option>3 years to less than 4 years</option>
                <option>Others</option>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="reasonOne" name="reasonOne" class="form-control" autocomplete="off">

             <label><b>IF NO: </b>What are your reason(s) for changing the job?</label>
                <input name = "job[]" type="checkbox" id="x1">Salaries &amp; Benefits<br>
                <input name = "job[]" type="checkbox" id="x2">Career challenge<br>
                <input name = "job[]" type="checkbox" id="x3">Related to special skills<br>
                <input name = "job[]" type="checkbox" id="x4">Proximity to residence<br>
                <input name = "job[]" type="checkbox" id="x5">Relations with people in the organization<br>
                <input name = "job[]" type="checkbox" id="x6" onclick="enable_reasonTwo(this.checked)">Others<br>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="reasonTwo" name="reasonTwo" class="form-control" autocomplete="off">

               <label><b>IF YES: </b>What are your reason(s) for accepting the job? You may select more than one answer.</label>
                <input name = "jobAccept[]" type = "checkbox" id = "y1">Salaries &amp; benefits<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y2">Proximity to residence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y3">Career challenge<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y4">Proximity to residence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y5">Peer influence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y6">Related to special skill<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y7">Family influence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y8">Related to course or study<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y9">Good human relations with employer / fellow employees<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y10" onclick="enable_yesReason(this.checked)">Others<br>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="yesReason" name="yesReason" class="form-control" autocomplete="off">
              <br>
              <label><b>IF YES: </b>Present Employment Status</label>
                <select id= "employStatus" onchange="DisableStatus(this)" style="width: 100%; height: 50%;" class="form-control">
                <option>Regular/Permanent</option>
                <option>Temporary/Contractual</option>
                <option>Self-employed</option>
                <option>Others</option>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="otherstatus" name="otherstatus" class="form-control" autocomplete="off">

              <label>Range of salary</label>
              <select style="width: 100%; height:50px" id = "salary">
                <option>Below P5,000</option>
                <option>P5,001 to P10,000</option>
                <option>P10,001 to P15,000</option>
                <option>P15,001 to P20,000</option>
                <option>Above P20,000</option>
              </select>
              <label>Nature of business/operation your present company/organization is engaged in</label>
              <select onchange="DisableNature(this)" style="width: 100%; height:50px" id = "business">
                <option>Manufacturing</option>
                <option>BPO</option>
                <option>Retailing</option>
                <option>Financial</option>
                <option>Academe</option>
                <option>Public Office</option>
                <option>Auding</option>
                <option>Agriculture</option>
                <option>Fisheries</option>
                <option>Restaurant</option>
                <option>Hotel</option>
                <option>Others</option>
              </select>
               <input type="text" disabled = "true" placeholder="If others, please specify." id="othernature" name="othernature" class="form-control" autocomplete="off">

                <label>Name of company/organization/school: </label>
                <input type="text" placeholder="" id="company" name="company" class="form-control" autocomplete="off">
                 <label>Address: </label>
                <input type="text" placeholder="" id="cAdd" name="cAdd" class="form-control" autocomplete="off">
                 <label>Contact Number: </label>
                <input type="text" placeholder="" id="contactNum" name="contactNum" class="form-control" autocomplete="off">
                <label>Country</label>
                <select style="width: 100%; height:50px" id = "country">
                <option>Within Philippines</option>
                <option>Overseas</option>
              </select>

                <label>Nature of work</label>
              <select onchange="DisableNatureWork(this)" style="width: 100%; height:50px" id = "workNature">
                <option>Teacher</option>
                <option>Fishery/Technician</option>
                <option>Computer Technician</option>
                <option>Programmer</option>
                <option>Aquaculturist</option>
                <option>Network Administrator</option>
                <option>Marine Biologist</option>
                <option>Food Quality Control/Assurance</option>
                <option>Self-employed</option>
                <option>Others</option>
              </select>
               <input type="text" disabled = "true" placeholder="If others, please specify." id="othernaturework" name="othernaturework" class="form-control" autocomplete="off">
              <h5>If <b>Self-employed</b>, what skills acquired in DNSC were you able to apply in your work?</h5>
              <input type="text" disabled="true" placeholder="" id="skills" name="skills" class="form-control" autocomplete="off">


            <label>How long did it take you to land your first job after graduation?</label>
              <select style="width: 100%; height: 50%;" onchange="DisableJob(this)" class="form-control" id = "firstJobTake">
                <option>Less than a month</option>
                <option>1-6 months</option>
                <option>7-11 months</option>
                <option>1 year to less than 2 years</option>
                <option>2 years to less than 3 years</option>
                <option>3 years to less than 4 years</option>
                <option>Others</option>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="firstJob" name="firstJob" class="form-control" autocomplete="off">

            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                <button class="btn btn-primary open4" type="button">Submit </button>
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
          minlength: 6,
          maxlength: 150
        },
        college: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        year: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        exam: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        date: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        rating: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        awards: {
          required: true,
          minlength: 6,
          maxlength: 150
        },
        nsib: {
          required: true,
          minlength: 1,
          maxlength: 2
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

    $(".open4").click(function() {
      var count = 0;
        var training = [];
        var credits = [];
        var sponsor = [];
        var reasonsIfNo = [];
        var changeJob = [];
        var acceptJob = [];
        if(count >= 0){
                training = [];
            $.each($("input[id='training']"), function(){
                training.push($(this).val());
            });
          }
        if(count >= 0){
                credits = [];
            $.each($("input[id='credits']"), function(){
                credits.push($(this).val());
            });
          }
        if(count >= 0){
                sponsor = [];
            $.each($("input[id='sponsor']"), function(){
                sponsor.push($(this).val());
            });
}
        if (count >= 0){
                reasonsIfNo = [];
                $.each($("input[name='reasons[]']:checked"), function(){
                reasonsIfNo.push($(this).val());
            });
            count++;
            }

            if (count >= 0){
                changeJob = [];
                $.each($("input[name='job[]']:checked"), function(){
                changeJob.push($(this).val());
            });
            count++;
            }

            if (count >= 0){
                acceptJob = [];
                $.each($("input[name='jobAccept[]']:checked"), function(){
                acceptJob.push($(this).val());
            });
            count++;
            }

       $(function()
{
        $.post("check.php",
        {

                username: $('#user').text(),
                name: $("#name").val(),
                address: $("#address").val(),
                email: $("#email").val(),
                status: $('#status').val(),
                mobile: $('#contact').val(),
                degree: $('#degree').val(),
                college: $('#college').val(),
                year: $('#year').val(),
                awards: $('#awards').val(),
                exam: $('#exam').val(),
                date: $('#date').val(),
                rating: $('#rating').val(),
                training: training.join(", "),
                credits: credits.join(", "),
                sponsor: sponsor.join(", "),
                presentlyEmploy: $('#employ').val(),
                reasonsIfNo: reasonsIfNo.join(", "),
                otherReasonsIfNo: $('#otherreason').val(),
                prevJob: $('#NoGroup').val(),
                otherPrevJob: $('#reasonOne').val(),
                changeJob: changeJob.join(", "),
                otherChangeJob: $('#reasonTwo').val(),
                acceptJob: acceptJob.join(", "),
                otherAcceptJob: $('#yesReason').val(),
                presentStatus: $('#employStatus').val(),
                otherstatus: $('#otherstatus').val(),
                salary: $('#salary').val(),
                business: $('#business').val(),
                contactNum: $('#contactNum').val(),
                otherBusiness: $('#othernature').val(),
                company: $('#company').val(),
                cAdd: $('#cAdd').val(),
                country: $('#country').val(),
                workNature: $('#workNature').val(),
                othernaturework: $('#othernaturework').val(),
                skills: $('#skills').val(),
                firstJobTake: $('#firstJobTake').val(),
                firstJob: $('#firstJob').val()
        },
        function(data, textStatus)
        {
            if (data == "Success"){
            var x = document.getElementById("forSuccess")
            x.className = "show";
            setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
            window.location.href = "socioLogin.php";
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
           $("#basicform").html('<h2>Thanks for your time.</h2><br><h4>Go back to <a href = "Home.php" style = "text-decoration: none;">Home</a>.</h4>');
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
      $("#sf2").show("slow");
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