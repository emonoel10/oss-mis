<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

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

if ($_SESSION['login_grad'] == "dnscadmin") {
    header("Location: graduatesProfile.php");
} else if ($row = mysqli_fetch_array($result)) {
    header("location: viewProfile.php");
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
  <link rel="Stylesheet" href="Datepicker/jquery-ui.css" />


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
//Show Modal Loader on Ajax Request
$(document).ready(function() {
  $( "#fromDate, #toDate" ).datepicker({
            changeMonth: true,
            changeYear: true,
            showButtonPanel: true,
            dateFormat: 'MM yy',
            onClose: function(dateText, inst) {
                var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
                var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
                $(this).datepicker('setDate', new Date(year, month, 1));
            },
            beforeShow : function(input, inst) {
                if ((datestr = $(this).val()).length > 0) {
                    year = datestr.substring(datestr.length-4, datestr.length);
                    month = jQuery.inArray(datestr.substring(0, datestr.length-5), $(this).datepicker('option', 'monthNames'));
                    $(this).datepicker('option', 'defaultDate', new Date(year, month, 1));
                    $(this).datepicker('setDate', new Date(year, month, 1));
        }
        var other = this.id == "fromDate" ? "#toDate" : "#fromDate";
        var option = this.id == "fromDate" ? "maxDate" : "minDate";
        if ((selectedDate = $(other).val()).length > 0) {
          year = selectedDate.substring(selectedDate.length-4, selectedDate.length);
                    month = jQuery.inArray(selectedDate.substring(0, selectedDate.length-5), $(this).datepicker('option', 'monthNames'));
          $(this).datepicker( "option", option, new Date(year, month, 1));
        }
            }
        });
});

</script>
<style type="text/css">
.ui-datepicker-calendar {
    display: none;
    }

</style>

<script type="text/javascript">
$(document).ready(function() {
    $("#ifNo").hide();
    $('#ifYes').hide();
});
</script>
<script type="text/javascript">
function hideEmploy (f, status) {
    var box1 = document.getElementById('employ').value;
    var dependent = $('#ifNo');
    var dependent2 = $('#ifYes');
    if (box1 == 'Yes'){
    dependent.hide();
    dependent2.show();
    }
    else if (box1 == 'No'){
      dependent.show();
    dependent2.hide();
    }
    else{
    dependent.hide();
    dependent2.hide();
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
$(document).ready(function() {
    $("#dependent-box2").hide();
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
<img src="images/Untitled-1.jpg" width="100%">
<hr>

<h1 style="font-family: latoregular; text-transform: uppercase; color: black; text-align: center;" id = "user" value = "<?php echo $login_sessionGrad; ?>"><?php echo $login_sessionGrad; ?></h1>
<p style="font-family: latoregular; font-weight: bold; text-transform: uppercase; text-align: center; color: #077054;">You have logged in as @<b style="font-family: latoregular; color: #077054;"><?php echo $login_sessionGrad; ?></b>. (<a href = "logoutGrad.php" style="text-decoration: none; color: #077054; font-family: latoregular;">Log out</a>)
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
    $db_select = mysqli_select_db($connection, "tryit");
    if (!$db_select) {
        die("Database selection failed: " . mysqli_error());
    }

    $result = mysqli_query($connection, "SELECT * FROM graduate WHERE username = '$login_sessionGrad'");
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
                <input type="text" placeholder="Your Valid Email" id="email" name="email" class="form-control" autocomplete="off" value="<?php echo $row['email']; ?>" readonly>
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

                <label>GENDER <b style = "color: red;">*</b></label>
                <select required class="form-control" id="gender" name="gender">
                  <option value="">Select below</option>
                  <option value="Female">Female</option>
                  <option value="Male">Male</option>
                </select>

                <label>CIVIL STATUS <b style = "color: red;">*</b></label>
                <select required class="form-control" id="status" name="status">
                  <option value="">Select below</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Widow">Widow</option>
                  <option value="Separated">Separated</option>
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
            <legend style="font-family: Century Gothic;">Step 2 of 4: <b>Educational Background</b></legend>
            <input name="education" id="education" onclick="hideShowEduc (this.form, this.checked)" type="checkbox"> I HAVE PURSUED GRADUATE STUDIES.
            <h4 style="font-family: Century Gothic; color: black;">EDUCATIONAL ATTAINMENT <b style = "color: red;">*</b></h4>

            <div id="dependent-box2">
            <div class="form-group">
              <table><tr>
                <td><label>ADVANCED STUDIES/DEGREE </label></td>
                <td><label>COLLEGE OR UNIVERSITY </label></td>
                <td><label>SEMESTER AND YEAR </label></td>
                <td><label>HONORS/AWARDS RECEIVED </label></td>
                </tr></table>
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
              <option value="BSIT">Bachelor of Science in Information Technology</option>
              <option value="BSEd">Bachelor of Science in Education</option>
              <option value="BPA">Bachelor of Public Administration</option>
              <option value="BSMB">Bachelor of Science in Marine Biology</option>
              <option value="BSFT">Bachelor of Science in Food Technology</option>
              <option value="BSFi">Bachelor of Science in FIsheries</option>
              <option value="BAT">Bachelor of Agriculture Technology</option>

            </select>
            <label>SCHOOL YEAR GRADUATED <b style = "color: red;">*</b></label>
                            <select required id="syGrad" name="syGrad" class="form-control">
                            <option value="">Select below</option>
                            <?php $current_year = date("Y");
    for ($i = 2013; $i <= $current_year; $i++) {?>
                            <option value="<?php echo $i . "-" . ($i + 1); ?>"><?php echo $i . "-" . ($i + 1); ?></option>
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
               <td><label>EXAMINATION NAME &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td>
               <td><label>EXAM DATE &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
               <td><label>EXAM RATING &nbsp;&nbsp;&nbsp;&nbsp;</label></td>
               </tr></table>
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
              <h5>PLEASE LIST DOWN ALL PROFESSIONAL OR WORK-RELATED TRAINING PROGRAM(S) YOU HAVE ATTENDED AFTER COLLEGE. <b style = "color: red;">*</b></h5>
                <div id='TextBoxesGroup'>
              <div id="TextBoxDiv1">

              <table><tr>
              <td><label> TITLE OF TRAINING ATTENDED </label></td>
              <td><label> DURATION AND CREDITS EARNED </label></td>
              <td><label> SPONSOR/COLLEGE/UNIVERSITY </label></td>
              </tr></table>

              </div></div>
              <table>
              <tr>
              <td>
              <button type="button" value='Add' id='addButton' class="form-control" style="width:100%; border: solid black;">Add Training</button>
              </td>
              <td>
              <button type="button" value='Add' id='removeButton' class="form-control" style="width:100%; border: solid black;">Remove Training</button></td>
              </tr>
              </table>


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
              <h5>QUESTION: <b>ARE YOU PRESENTLY EMPLOYED? <b style = "color: red;">*</b></b></h5>
               <select required class="form-control" id="employ" name="employ" onkeydown="hideEmploy (this.form, this.selected)" onkeyup="hideEmploy (this.form, this.selected)" onclick="hideEmploy (this.form, this.selected)">
                  <option value="">Select below</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                   <div id="ifNo">
              <label><b style="font-size: 50px;">IF NO: </b><br>STATE THE REASON(S) WHY YOU ARE NOT YET EMPLOYED. <b style = "color: red;">*</b> (Note: You may select more than one item)</label>
              <input type="checkbox" name = "reasons[]" id="r1"  value="Family concern" /> Family concern <br>
              <input type="checkbox" name = "reasons[]" id="r2"  value="Health-related reasons" /> Health-related reasons <br>
              <input type="checkbox" name = "reasons[]" id="r3"  value="Lack of work experience" /> Lack of work experience <br>
              <input type="checkbox" name = "reasons[]" id="r4"  value="Pursuing graduate studies" /> Pursuing graduate studies <br>
              <input type="checkbox" name = "reasons[]" id="r5"  value="Engaged in entrepreneurship" />Engaged in entrepreneurship <br>
              <input type="checkbox" name = "reasons[]" id="r6"  value="No job opportunity" />No job opportunity <br>
              <input type="checkbox" name = "reasons[]" id="r7"  value="No interest in getting a job" />No interest in getting a job <br>
              <input type="checkbox" name = "reasons[]" id="r8"  value="Lack of professional eligibility requirements" />Lack of professional eligibility requirements <br>
              <input type="checkbox" name = "reasons[]" id="r9" value="Starting pay is too low" />Starting pay is too low <br>
              <input type="checkbox" name = "reasons[]" id="r10"  value="Have plans to seek job out of the country" />Have plans to seek job out of the country <br>
              <input type="checkbox" name = "reasons[]" id="r11"  onclick="enable_otherreason(this.checked)" value="Others" />Others <br>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="otherreason" name="otherreason" class="form-control" autocomplete="off">

              <label>HOW LONG DID YOU STAY IN YOUR PREVIOUS JOB? <b style = "color: red;">*</b></label>
              <select required id= "NoGroup" name = "prevJob" onchange="DisableNoReason(this)" style="width: 100%; height: 50%;" class="form-control">
                <option value="">Select below</option>
                <option value="Less than a month">Less than a month</option>
                <option value="1-6 months">1-6 months</option>
                <option value="7-11 months">7-11 months</option>
                <option value="1 year to less than 2 years">1 year to less than 2 years</option>
                <option value="2 years to less than 3 years">2 years to less than 3 years</option>
                <option value="3 years to less than 4 years">3 years to less than 4 years</option>
                <option value="Others">Others</option>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="reasonOne" name="reasonOne" class="form-control" autocomplete="off">

             <label>WHAT ARE YOUR REASON(S) FOR CHANGING THE JOB? <b style = "color: red;">*</b></label>
                <input name = "job[]" type="checkbox" id="x1" value="Salaries &amp; Benefits">Salaries &amp; Benefits<br>
                <input name = "job[]" type="checkbox" id="x2" value="Career challenge">Career challenge<br>
                <input name = "job[]" type="checkbox" id="x3" value="Related to special skills">Related to special skills<br>
                <input name = "job[]" type="checkbox" id="x4" value="Proximity to residence">Proximity to residence<br>
                <input name = "job[]" type="checkbox" id="x5" value="Relations with people in the organization">Relations with people in the organization<br>
                <input name = "job[]" type="checkbox" id="x6" onclick="enable_reasonTwo(this.checked)" value="Others">Others<br>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="reasonTwo" name="reasonTwo" class="form-control" autocomplete="off">
              </div>
             <!-- <label>Year Employed</label>
              <input type="text" id="yearEmployed" name="yearEmployed" class="form-control" autocomplete="off">-->
                   <div id="ifYes">
                <label><b style="font-size: 50px;">IF YES: </b><br>WHAT ARE YOUR REASON(S) FOR ACCEPTING THE JOB? <b style = "color: red;">*</b> (Note: You may select more than one answer.)</label>
                <input name = "jobAccept[]" type = "checkbox" id = "y1" value="Salaries &amp; benefits">Salaries &amp; benefits<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y2" value="Proximity to residence">Proximity to residence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y3" value="Career challenge">Career challenge<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y5" value="Peer influence">Peer influence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y6" value="Related to special skill">Related to special skill<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y7" value="Family influence">Family influence<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y8" value="Related to course or study">Related to course or study<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y9" value="Good human relations with employer / fellow employees">Good human relations with employer / fellow employees<br>
                <input name = "jobAccept[]" type = "checkbox" id = "y10" onclick="enable_yesReason(this.checked)" value="Others">Others<br>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="yesReason" name="yesReason" class="form-control" autocomplete="off">
              <br>
              <label>PRESENT EMPLOYMENT STATUS <b style = "color: red;">*</b></label>
                <select required id= "employStatus" onchange="DisableEmployStatus(this)" style="width: 100%; height: 50%;" class="form-control">
                <option value="">Select below</option>
                <option value="Regular/Permanent">Regular/Permanent</option>
                <option value="Temporary/Contractual">Temporary/Contractual</option>
                <option value="Self-employed">Self-employed</option>
                <option value="Others">Others</option>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="otherstatus" name="otherstatus" class="form-control" autocomplete="off">

              <label>RANGE OF SALARY <b style = "color: red;">*</b></label>
              <select required style="width: 100%; height:50px" id = "salary" class="form-control">
                <option value="">Select below</option>
                <option value="Below P5,000<">Below P5,000</option>
                <option value="P5,001 to P10,000">P5,001 to P10,000</option>
                <option value="P10,001 to P15,000">P10,001 to P15,000</option>
                <option value="P15,001 to P20,000">P15,001 to P20,000</option>
                <option value="Above P20,000">Above P20,000</option>
              </select>
              <label>NATURE OF BUSINESS/OPERATION YOUR PRESENT COMPANY/ORGANIZATION IS ENGAGED IN <b style = "color: red;">*</b></label>
              <select required onchange="DisableNature(this)" style="width: 100%; height:50px" id = "business" class="form-control">
                <option value="">Select below</option>
                <option value="Manufacturing">Manufacturing</option>
                <option value="BPO">BPO</option>
                <option value="Retailing">Retailing</option>
                <option value="Retailing">Retailing</option>
                <option value="Academe">Academe</option>
                <option value="Public Office">Public Office</option>
                <option value="Auding">Auding</option>
                <option value="Agriculture">Agriculture</option>
                <option value="Fisheries">Fisheries</option>
                <option value="Restaurant">Restaurant</option>
                <option value="Hotel">Hotel</option>
                <option value="Others">Others</option>
              </select>
               <input type="text" disabled = "true" placeholder="If others, please specify." id="othernature" name="othernature" class="form-control" autocomplete="off">
          <label>COUNTRY <b style = "color: red;">*</b></label>
                <select required style="width: 100%; height:50px" id = "country" onchange="DisableCountry(this)" class="form-control">
                    <option value="">Select below</option>
                    <option value="United States"> United States </option>
                    <option value="Abkhazia"> Abkhazia </option>
                    <option value="Afghanistan"> Afghanistan </option>
                    <option value="Albania"> Albania </option>
                    <option value="Algeria"> Algeria </option>
                    <option value="American Samoa"> American Samoa </option>
                    <option value="Andorra"> Andorra </option>
                    <option value="Angola"> Angola </option>
                    <option value="Anguilla"> Anguilla </option>
                    <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                    <option value="Argentina"> Argentina </option>
                    <option value="Armenia"> Armenia </option>
                    <option value="Aruba"> Aruba </option>
                    <option value="Australia"> Australia </option>
                    <option value="Austria"> Austria </option>
                    <option value="Azerbaijan"> Azerbaijan </option>
                    <option value="The Bahamas"> The Bahamas </option>
                    <option value="Bahrain"> Bahrain </option>
                    <option value="Bangladesh"> Bangladesh </option>
                    <option value="Barbados"> Barbados </option>
                    <option value="Belarus"> Belarus </option>
                    <option value="Belgium"> Belgium </option>
                    <option value="Belize"> Belize </option>
                    <option value="Benin"> Benin </option>
                    <option value="Bermuda"> Bermuda </option>
                    <option value="Bhutan"> Bhutan </option>
                    <option value="Bolivia"> Bolivia </option>
                    <option value="Bosnia and Herzegovina"> Bosnia and Herzegovina </option>
                    <option value="Botswana"> Botswana </option>
                    <option value="Brazil"> Brazil </option>
                    <option value="Brunei"> Brunei </option>
                    <option value="Bulgaria"> Bulgaria </option>
                    <option value="Burkina Faso"> Burkina Faso </option>
                    <option value="Burundi"> Burundi </option>
                    <option value="Cambodia"> Cambodia </option>
                    <option value="Cameroon"> Cameroon </option>
                    <option value="Canada"> Canada </option>
                    <option value="Cape Verde"> Cape Verde </option>
                    <option value="Cayman Islands"> Cayman Islands </option>
                    <option value="Central African Republic"> Central African Republic </option>
                    <option value="Chad"> Chad </option>
                    <option value="Chile"> Chile </option>
                    <option value="People&#39;s Republic of China"> People's Republic of China </option>
                    <option value="Republic of China"> Republic of China </option>
                    <option value="Christmas Island"> Christmas Island </option>
                    <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                    <option value="Colombia"> Colombia </option>
                    <option value="Comoros"> Comoros </option>
                    <option value="Congo"> Congo </option>
                    <option value="Cook Islands"> Cook Islands </option>
                    <option value="Costa Rica"> Costa Rica </option>
                    <option value="Cote d&#39;Ivoire"> Cote d'Ivoire </option>
                    <option value="Croatia"> Croatia </option>
                    <option value="Cuba"> Cuba </option>
                    <option value="Cyprus"> Cyprus </option>
                    <option value="Czech Republic"> Czech Republic </option>
                    <option value="Denmark"> Denmark </option>
                    <option value="Djibouti"> Djibouti </option>
                    <option value="Dominica"> Dominica </option>
                    <option value="Dominican Republic"> Dominican Republic </option>
                    <option value="Ecuador"> Ecuador </option>
                    <option value="Egypt"> Egypt </option>
                    <option value="El Salvador"> El Salvador </option>
                    <option value="Equatorial Guinea"> Equatorial Guinea </option>
                    <option value="Eritrea"> Eritrea </option>
                    <option value="Estonia"> Estonia </option>
                    <option value="Ethiopia"> Ethiopia </option>
                    <option value="Falkland Islands"> Falkland Islands </option>
                    <option value="Faroe Islands"> Faroe Islands </option>
                    <option value="Fiji"> Fiji </option>
                    <option value="Finland"> Finland </option>
                    <option value="France"> France </option>
                    <option value="French Polynesia"> French Polynesia </option>
                    <option value="Gabon"> Gabon </option>
                    <option value="The Gambia"> The Gambia </option>
                    <option value="Georgia"> Georgia </option>
                    <option value="Germany"> Germany </option>
                    <option value="Ghana"> Ghana </option>
                    <option value="Gibraltar"> Gibraltar </option>
                    <option value="Greece"> Greece </option>
                    <option value="Greenland"> Greenland </option>
                    <option value="Grenada"> Grenada </option>
                    <option value="Guam"> Guam </option>
                    <option value="Guatemala"> Guatemala </option>
                    <option value="Guernsey"> Guernsey </option>
                    <option value="Guinea"> Guinea </option>
                    <option value="Guinea-Bissau"> Guinea-Bissau </option>
                    <option value="Guyana Guyana"> Guyana Guyana </option>
                    <option value="Haiti Haiti"> Haiti Haiti </option>
                    <option value="Honduras"> Honduras </option>
                    <option value="Hong Kong"> Hong Kong </option>
                    <option value="Hungary"> Hungary </option>
                    <option value="Iceland"> Iceland </option>
                    <option value="India"> India </option>
                    <option value="Indonesia"> Indonesia </option>
                    <option value="Iran"> Iran </option>
                    <option value="Iraq"> Iraq </option>
                    <option value="Ireland"> Ireland </option>
                    <option value="Israel"> Israel </option>
                    <option value="Italy"> Italy </option>
                    <option value="Jamaica"> Jamaica </option>
                    <option value="Japan"> Japan </option>
                    <option value="Jersey"> Jersey </option>
                    <option value="Jordan"> Jordan </option>
                    <option value="Kazakhstan"> Kazakhstan </option>
                    <option value="Kenya"> Kenya </option>
                    <option value="Kiribati"> Kiribati </option>
                    <option value="North Korea"> North Korea </option>
                    <option value="South Korea"> South Korea </option>
                    <option value="Kosovo"> Kosovo </option>
                    <option value="Kuwait"> Kuwait </option>
                    <option value="Kyrgyzstan"> Kyrgyzstan </option>
                    <option value="Laos"> Laos </option>
                    <option value="Latvia"> Latvia </option>
                    <option value="Lebanon"> Lebanon </option>
                    <option value="Lesotho"> Lesotho </option>
                    <option value="Liberia"> Liberia </option>
                    <option value="Libya"> Libya </option>
                    <option value="Liechtenstein"> Liechtenstein </option>
                    <option value="Lithuania"> Lithuania </option>
                    <option value="Luxembourg"> Luxembourg </option>
                    <option value="Macau"> Macau </option>
                    <option value="Macedonia"> Macedonia </option>
                    <option value="Madagascar"> Madagascar </option>
                    <option value="Malawi"> Malawi </option>
                    <option value="Malaysia"> Malaysia </option>
                    <option value="Maldives"> Maldives </option>
                    <option value="Mali"> Mali </option>
                    <option value="Malta"> Malta </option>
                    <option value="Marshall Islands"> Marshall Islands </option>
                    <option value="Mauritania"> Mauritania </option>
                    <option value="Mauritius"> Mauritius </option>
                    <option value="Mayotte"> Mayotte </option>
                    <option value="Mexico"> Mexico </option>
                    <option value="Micronesia"> Micronesia </option>
                    <option value="Moldova"> Moldova </option>
                    <option value="Monaco"> Monaco </option>
                    <option value="Mongolia"> Mongolia </option>
                    <option value="Montenegro"> Montenegro </option>
                    <option value="Montserrat"> Montserrat </option>
                    <option value="Morocco"> Morocco </option>
                    <option value="Mozambique"> Mozambique </option>
                    <option value="Myanmar"> Myanmar </option>
                    <option value="Nagorno-Karabakh"> Nagorno-Karabakh </option>
                    <option value="Namibia"> Namibia </option>
                    <option value="Nauru"> Nauru </option>
                    <option value="Nepal"> Nepal </option>
                    <option value="Netherlands"> Netherlands </option>
                    <option value="Netherlands Antilles"> Netherlands Antilles </option>
                    <option value="New Caledonia"> New Caledonia </option>
                    <option value="New Zealand"> New Zealand </option>
                    <option value="Nicaragua"> Nicaragua </option>
                    <option value="Niger"> Niger </option>
                    <option value="Nigeria"> Nigeria </option>
                    <option value="Niue"> Niue </option>
                    <option value="Norfolk Island"> Norfolk Island </option>
                    <option value="Turkish Republic of Northern Cyprus"> Turkish Republic of Northern Cyprus </option>
                    <option value="Northern Mariana"> Northern Mariana </option>
                    <option value="Norway"> Norway </option>
                    <option value="Pakistan"> Pakistan </option>
                    <option value="Palau"> Palau </option>
                    <option value="Palestine"> Palestine </option>
                    <option value="Panama"> Panama </option>
                    <option value="Papua New Guinea"> Papua New Guinea </option>
                    <option value="Paraguay"> Paraguay </option>
                    <option value="Peru"> Peru </option>
                    <option value="Philippines"> Philippines </option>
                    <option value="Pitcairn Islands"> Pitcairn Islands </option>
                    <option value="Poland"> Poland </option>
                    <option value="Portugal"> Portugal </option>
                    <option value="Transnistria Pridnestrovie"> Transnistria Pridnestrovie </option>
                    <option value="Puerto Rico"> Puerto Rico </option>
                    <option value="Qatar"> Qatar </option>
                    <option value="Romania"> Romania </option>
                    <option value="Russia"> Russia </option>
                    <option value="Rwanda"> Rwanda </option>
                    <option value="Saint Barthelemy"> Saint Barthelemy </option>
                    <option value="Saint Helena"> Saint Helena </option>
                    <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                    <option value="Saint Lucia"> Saint Lucia </option>
                    <option value="Saint Martin"> Saint Martin </option>
                    <option value="Saint Pierre and Miquelon"> Saint Pierre and Miquelon </option>
                    <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                    <option value="Samoa"> Samoa </option>
                    <option value="San Marino"> San Marino </option>
                    <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                    <option value="Saudi Arabia"> Saudi Arabia </option>
                    <option value="Senegal"> Senegal </option>
                    <option value="Serbia"> Serbia </option>
                    <option value="Seychelles"> Seychelles </option>
                    <option value="Sierra Leone"> Sierra Leone </option>
                    <option value="Singapore"> Singapore </option>
                    <option value="Slovakia"> Slovakia </option>
                    <option value="Slovenia"> Slovenia </option>
                    <option value="Solomon Islands"> Solomon Islands </option>
                    <option value="Somalia"> Somalia </option>
                    <option value="Somaliland"> Somaliland </option>
                    <option value="South Africa"> South Africa </option>
                    <option value="South Ossetia"> South Ossetia </option>
                    <option value="Spain"> Spain </option>
                    <option value="Sri Lanka"> Sri Lanka </option>
                    <option value="Sudan"> Sudan </option>
                    <option value="Suriname"> Suriname </option>
                    <option value="Svalbard"> Svalbard </option>
                    <option value="Swaziland"> Swaziland </option>
                    <option value="Sweden"> Sweden </option>
                    <option value="Switzerland"> Switzerland </option>
                    <option value="Syria"> Syria </option>
                    <option value="Taiwan"> Taiwan </option>
                    <option value="Tajikistan"> Tajikistan </option>
                    <option value="Tanzania"> Tanzania </option>
                    <option value="Thailand"> Thailand </option>
                    <option value="Timor-Leste"> Timor-Leste </option>
                    <option value="Togo"> Togo </option>
                    <option value="Tokelau"> Tokelau </option>
                    <option value="Tonga"> Tonga </option>
                    <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                    <option value="Tristan da Cunha"> Tristan da Cunha </option>
                    <option value="Tunisia"> Tunisia </option>
                    <option value="Turkey"> Turkey </option>
                    <option value="Turkmenistan"> Turkmenistan </option>
                    <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                    <option value="Tuvalu"> Tuvalu </option>
                    <option value="Uganda"> Uganda </option>
                    <option value="Ukraine"> Ukraine </option>
                    <option value="United Arab Emirates"> United Arab Emirates </option>
                    <option value="United Kingdom"> United Kingdom </option>
                    <option value="Uruguay"> Uruguay </option>
                    <option value="Uzbekistan"> Uzbekistan </option>
                    <option value="Vanuatu"> Vanuatu </option>
                    <option value="Vatican City"> Vatican City </option>
                    <option value="Venezuela"> Venezuela </option>
                    <option value="Vietnam"> Vietnam </option>
                    <option value="British Virgin Islands"> British Virgin Islands </option>
                    <option value="US Virgin Islands"> US Virgin Islands </option>
                    <option value="Wallis and Futuna"> Wallis and Futuna </option>
                    <option value="Western Sahara"> Western Sahara </option>
                    <option value="Yemen"> Yemen </option>
                    <option value="Zambia"> Zambia </option>
                    <option value="Zimbabwe"> Zimbabwe </option>
              </select>

            <label>HOW LONG DID IT TAKE YOU TO LAND YOUR FIRST JOB AFTER GRADUATION? <b style = "color: red;">*</b></label>
              <select required style="width: 100%; height: 50%;" onchange="DisableJob(this)" class="form-control" id = "firstJobTake">
                <option value="">Select below</option>
                <option value="Less than a month">Less than a month</option>
                <option value="1-6 months">1-6 months</option>
                <option value="7-11 months">7-11 months</option>
                <option value="1 year to less than 2 years">1 year to less than 2 years</option>
                <option value="3 years to less than 4 years">3 years to less than 4 years</option>
                <option value="Others">Others</option>
              </select>
              <input type="text" disabled = "true" placeholder="If others, please specify." id="firstJob" name="firstJob" class="form-control" autocomplete="off">

             <table><tr><td><label>DATE EMPLOYED (FROM)</label><input required type="text" name="fromDate" id="fromDate" class="form-control"></td><td><label>(TO)</label><input required type="text" name="toDate" id="toDate" class="form-control" /></td></tr></table><label>NAME OF COMPANY</label><input required type="text" id="company" name="company" style="width:100%;" class="form-control" autocomplete="off" value=""><label>COMPANY ADDRESS </label><input required type="text" placeholder="" id="cAdd" name="cAdd" class="form-control" autocomplete="off"><label>NATURE OF WORK</label><select required onchange="DisableNatureWork(this)" class="form-control" style="width: 100%; height:50px" id = "workNature"><option value="">Select below</option><option value="Teacher">Teacher</option><option value="Fishery/Technician">Fishery/Technician</option><option value="Computer Technician">Computer Technician</option><option value="Programmer">Programmer</option><option value="Aquaculturist">Aquaculturist</option><option value="Network Administrator">Network Administrator</option><option value="Marine Biologist">Marine Biologist</option><option value="Food Quality Control/Assurance">Food Quality Control/Assurance</option><option value="Others">Others</option></select><input type="text" disabled="true" placeholder="If others, please specify." id="othernaturework" name="othernaturework" class="form-control" autocomplete="off" required><br>
                 </div>
                <input type="text" id="myText" name="myText" value="0" hidden>
              <hr style="border-top: dotted 5px;">
              <h3 style="color: black; text-decoration: bold;">EMPLOYMENT HISTORY</h3><strong style="font-family: nixie_oneregular">(According to importance)</strong>

              <div id='TextBoxesGroup5'>
              <div id="TextBoxDiv1">
              </div></div>
            <table>
                <tr>
                  <td>
                    <button type="button" value='Add' id='addButton5' class="form-control" style="width:100%; border: solid black;">Add Employment</button>
                  </td>
                  <td>
                     <button type="button" value='Add' id='removeButton5' class="form-control" style="width:100%; border: solid black;">Remove Employment</button>
                  </td>
                </tr>
              </table>
              <hr style="border-top: dotted 5px;" />


            </div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
               <button class="btn btn-warning back4" type="button"><span class="fa fa-arrow-left"></span> Back</button>
                <button class="btn btn-primary open4" type="button">Next <span class="fa fa-arrow-right"></span> </button>
                <img src="spinner.gif" alt="" id="loader" style="display: none">
              </div>
            </div>
          </fieldset>
        </div>
          <div id="sf5" class="frm" style="display: none;">
          <fieldset>
            <legend style="font-family: Century Gothic;"><b>Saving Profile...</b></legend>

            <div class="form-group">
              <h5>ALMOST THERE!</h5>
               <label style = "font-family: latoregular;"> You're about to save your profile.</label>
            </div>
            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="clearfix" style="height: 10px;clear: both;"></div>

            <div class="form-group">
              <div class="col-lg-10 col-lg-offset-2">
                <button class="btn btn-warning back5" type="button"><span class="fa fa-arrow-left"></span> Review</button>
                <button class="btn btn-primary open5" id = "submit_form" type="button">Submit </button>
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
        contact: {
          required: true,
          minlength: 7,
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

    $(".open4").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf5").show("slow");
        $('html, body').animate({
            scrollTop: $(".frm").offset().top
                            }, 1000);
      }
    });

    $("#submit_form").click(function() {
        var count = 0;
        var training = [];
        var credits = [];
        var sponsor = [];
        var reasonsIfNo = [];
        var changeJob = [];
        var acceptJob = [];
        var degree = [];
        var college = [];
        var year = [];
        var awards = [];
        var exam = [];
        var rating = [];
        var dateExam = [];
        var present = '';
        var permanent = '';
        var fromDate = [];
        var toDate = [];
        var company = [];
        var cAdd = [];
        var workNature = [];
        var getDateFrom = "";
        var getDateTo = "";
        var selectedDateFrom = "";
        var selectedDateTo = "";
        var from = "";
        var to = "";
        var position = "";
        var othernaturework = [];
        var a = 0;
        var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        var i =0;
        var limit = $('#myText').val();

        if($('#employ').val() == "Yes"){
          if(a == 0){
            selectedDateFrom = $('#fromDate').val();
                from = "\'"+selectedDateFrom+"\'";
                var dateFrom = new Date(from);

                // Date today
                var today = new Date();
                var n = today.getMonth();
                var y = (today.getYear()+1900);
                var currentDate = months[n] + " " +y;

                getDateFrom = months[dateFrom.getMonth()]+" "+(dateFrom.getYear()+1900);
                fromDate.push($('#fromDate').val());

                // To Date
                selectedDateTo = $('#toDate').val();
                to = "\'"+selectedDateTo+"\'";
                var dateTo = new Date(to);
                getDateTo = months[dateTo.getMonth()]+" "+(dateTo.getYear()+1900);
                if(getDateTo == currentDate){
                  getDateTo = "Present";
                }


                position = $('#workNature').val();
                if(position == "Others"){
                  position = $('#othernaturework').val();
                  othernaturework.push(position);
                }
                workNature.push(position);
                toDate.push(getDateTo);
                a++;
          }
        }

        for(i=1;i<=(limit-1);i++){
                // From Date
                selectedDateFrom = $('#fromDate'+i).val();
                from = "\'"+selectedDateFrom+"\'";
                var dateFrom = new Date(from);

                // Date today
                var today = new Date();
                var n = today.getMonth();
                var y = (today.getYear()+1900);
                var currentDate = months[n] + " " +y;

                getDateFrom = months[dateFrom.getMonth()]+" "+(dateFrom.getYear()+1900);
                fromDate.push(getDateFrom);

                // To Date
                selectedDateTo = $('#toDate'+i).val();
                to = "\'"+selectedDateTo+"\'";
                var dateTo = new Date(to);
                getDateTo = months[dateTo.getMonth()]+" "+(dateTo.getYear()+1900);
                if(getDateTo == currentDate){
                  getDateTo = "Present";
                }


                position = $('#workNature'+i).val();
                if(position == "Others"){
                  position = $('#othernaturework'+i).val();
                  othernaturework.push(position);
                }
                workNature.push(position);
                toDate.push(getDateTo);
          }


                if(count == 0)
                {
                $.each($("input[id='company']"), function(){
                company.push($(this).val());
            });
                 $.each($("input[id='cAdd']"), function(){
                cAdd.push($(this).val());
            });
                }

          /*if(count >= 0){
                company = [];
            $.each($("input[id='company']"), function(){
                company.push($(this).val());
            });
          }

          if(count >= 0){
                cAdd = [];
            $.each($("input[id='cAdd']"), function(){
                cAdd.push($(this).val());
            });
          }

          if(count >= 0){
                workNature = [];
            $.each($("select[id='workNature']"), function(){
                workNature.push($(this).val());
            });
          }*/

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

            permanent = $("#shouseNum").val() + ' Brgy. ' + $("#s3").val() + ', ' + $("#s2").val() + ", " + $("#s1").val();
            present =  $("#sshouseNum").val() + ' Brgy. ' + $("#ss3").val() + ', ' + $("#ss2").val() + ', ' + $("#ss1").val();

       $(function()
{
        $.post("check.php",
        {

                username: $('#user').text(),
                fname: $("#fname").val(),
                lname: $("#lname").val(),
                mname: $("#mname").val(),
                email: $("#email").val(),
                permanent_province: $("#s1").val(),
                permanent_city: $("#s2").val(),
                permanent_brgy: $("#s3").val(),
                permanentNum: $("#shouseNum").val(),
                present_province: $("#ss1").val(),
                present_city: $("#ss2").val(),
                present_brgy: $("#ss3").val(),
                presentNum: $("#sshouseNum").val(),
                gender: $('#gender').val(),
                status: $('#status').val(),
                mobile: $('#contact').val(),
                degree: degree.join(", "),
                college: college.join(", "),
                year: year.join(", "),
                awards: awards.join(", "),
                course: $('#course').val(),
                syGrad: $('#syGrad').val(),
                exam: exam.join(", "),
                date: dateExam.join(", "),
                rating: rating.join(", "),
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
                otherBusiness: $('#othernature').val(),
                fromDate: fromDate.join(",\r\n "),
                toDate: toDate.join(",\r\n "),
                company: company.join(",\r\n "),
                cAdd: cAdd.join(",\r\n "),
                country: $('#country').val(),
                workNature: workNature.join(",\r\n "),
                othernaturework: othernaturework.join(", "),
                firstJobTake: $('#firstJobTake').val(),
                firstJob: $('#firstJob').val()
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
           $("#basicform").html('<h2>Thanks for your time.</h2><br><h4><a href = "viewProfile.php" style = "text-decoration: none;"> Continue to profile</a> | <a href = "logoutGrad.php" style = "text-decoration: none;">Sign out</a></h4>');
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

    $(".back5").click(function() {
      $(".frm").hide("fast");
      $("#sf4").show("slow");
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