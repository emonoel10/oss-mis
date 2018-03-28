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
$db_select = mysqli_select_db("tryit", $connection);
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

?>
                          <?php
$result = mysqli_query("SELECT * FROM geninfo where username = '$login_sessionGrad'", $connection);

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
      if(document.getElementById('employ').value == "Yes"){
        $("#ifNo").hide();
        $('#ifYes').show();
      }
      else if(document.getElementById('employ').value == "No"){
        $("#ifNo").show();
        $('#ifYes').hide();
      }
      else{
      $("#ifNo").hide();
      $('#ifYes').hide();
      }

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
  x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6);
  if(x.disabled == true){
  document.getElementById("reasonOne").value= "";
  }
  if (aList.selectedIndex == 7){
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

  x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 8); //others
  y.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7 || aList.selectedIndex == 9); //self-employed
  if(x.disabled == true){
  document.getElementById("othernaturework").value= "";
  }
  if (aList.selectedIndex == 8){

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
  function statusPosition(aList)
  {
  var x=document.getElementById("otherPosition");

  x.disabled=(aList.selectedIndex == 0 || aList.selectedIndex == 1 || aList.selectedIndex == 2 || aList.selectedIndex == 3 || aList.selectedIndex == 4 || aList.selectedIndex == 5 || aList.selectedIndex == 6 || aList.selectedIndex == 7); //others
   if(x.disabled == true){
  document.getElementById("otherPosition").value= "";
  }
  if (aList.selectedIndex == 8){
    otherPosition.focus();
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
      var $salary = $('#salary');
      var $business = $('#business');
      var $company = $('#company');
      var $yearEmployed = $('#yearEmployed');
      var $cAdd = $('#cAdd');
      var $contactNum = $('#contactNum');
      var $country = $('#country');
      var $workNature = $('#workNature');
      var $firstJobTake = $('#firstJobTake');
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
            $salary.prop('disabled', true);
            $business.prop('disabled', true);
            $company.prop('disabled', true);
            $yearEmployed.prop('disabled', true);
            $cAdd.prop('disabled', true);
            $contactNum.prop('disabled', true);
            $country.prop('disabled', true);
            $workNature.prop('disabled', true);
            $firstJobTake.prop('disabled', true);
          }
      else if (this.value == 'Yes'){
        $s1.prop('disabled', false);
            $s2.prop('disabled', false);
            $s3.prop('disabled', false);
            $s4.prop('disabled', false);
            $y1.prop('disabled', false);
            $y2.prop('disabled', false);
            $y3.prop('disabled', false);
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
            $salary.prop('disabled', false);
            $business.prop('disabled', false);
            $company.prop('disabled', false);
            $yearEmployed.prop('disabled', false);
            $cAdd.prop('disabled', false);
            $contactNum.prop('disabled', false);
            $country.prop('disabled', false);
            $workNature.prop('disabled', false);
            $firstJobTake.prop('disabled', false);
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
            $business.prop('disabled', true);
            $company.prop('disabled', true);
            $yearEmployed.prop('disabled', true);
            $cAdd.prop('disabled', true);
            $contactNum.prop('disabled', true);
            $country.prop('disabled', true);
            $workNature.prop('disabled', true);
            $firstJobTake.prop('disabled', true);
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

    newTextBoxDiv.after().html('<table><tr><td><label>Advanced Studies/Degree: </label></td><td><label>College or University: </label></td></tr><tr><td><input type="text" placeholder="" id="degree" name="degree" class="form-control" autocomplete="off"></td><td><input type="text" placeholder="" id="college" name="college" class="form-control" autocomplete="off"></td></tr><tr><td><label>Sem & Year: </label></td><td><label>Honors/Awards Received: </label></td></tr><tr><td><input type="text" placeholder="" id="year" name="year" class="form-control" autocomplete="off"></td><td><input type="text" placeholder="" id="awards" name="awards" class="form-control" autocomplete="off"></td></tr></table>');

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

    newTextBoxDiv.after().html('<table><tr><td><label>Exam Name: </label></td><td><label>Date Taken: </label></td></tr><tr><td><input type="text" placeholder="" id="exam" name="exam" class="form-control" autocomplete="off"></td><td><input type="text" placeholder="" id="rating" name="rating" class="form-control" autocomplete="off"></td></tr><tr><td><label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rating: </label></td><td><input type="date" placeholder="" id="date" name="date" class="form-control" autocomplete="off"></td></tr></table>');

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

    newTextBoxDiv.after().html('<table><tr><td><input type="text" placeholder="Year Employed" id="yearEmployed" name="mytext1" class="form-control" autocomplete="off"></td><td><input type="text" placeholder="Company" id="company" name="mytext1" class="form-control" autocomplete="off"></td><td><select style="width: 100%; height:50px" id = "workNature" name="workNature" onchange="statusPosition(this)"><option value="Teacher">Teacher</option><option value="Fishery/Technician">Fishery/Technician</option><option value="Computer Technician">Computer Technician</option><option value="Programmer">Programmer</option><option value="Aquaculturist">Aquaculturist</option><option value="Network Administrator">Network Administrator</option><option value="Marine Biologist">Marine Biologist</option><option value="Food Quality Control/Assurance">Food Quality Control/Assurance</option><option>Other</option></select></td></tr><tr><td><input type="text" style = "width: 282%;" disabled placeholder="If other position, please specify here." id="otherPosition" name="otherPosition" class="form-control" autocomplete="off"></td></tr></table>');

    newTextBoxDiv.appendTo("#TextBoxesGroup4");
    counter++;
       });

       $("#removeButton4").click(function () {
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
    newTextBoxDiv.after().html('<div class="circle">'+(counter-1)+'</div><table><tr><td><label>DATE EMPLOYED (FROM)</label><input type="month" name="fromDate'+(counter-1)+'" id="fromDate'+(counter-1)+'" class="form-control" required></td><td><label>(TO)</label><input type="month" name="toDate'+(counter-1)+'" id="toDate'+(counter-1)+'" class="form-control" required/></td></tr></table><label>NAME OF COMPANY</label><input type="text" id="company" name="company" style="width:100%;" class="form-control" required autocomplete="off" value=""><label>COMPANY ADDRESS </label><input type="text" placeholder="" id="cAdd" name="cAdd" class="form-control" required autocomplete="off"><label>NATURE OF WORK</label><select required onchange="DisableNatureWork(this)" class="form-control" style="width: 100%; height:50px" id = "workNature'+(counter-1)+'"><option value="">Select below</option><option value="Teacher">Teacher</option><option value="Fishery/Technician">Fishery/Technician</option><option value="Computer Technician">Computer Technician</option><option value="Programmer">Programmer</option><option value="Aquaculturist">Aquaculturist</option><option value="Network Administrator">Network Administrator</option><option value="Marine Biologist">Marine Biologist</option><option value="Food Quality Control/Assurance">Food Quality Control/Assurance</option><option value="Others">Others</option></select><input type="text" placeholder="If others, please specify." id="othernaturework'+(counter-1)+'" name="othernaturework" class="form-control" autocomplete="off" required><br>');

    newTextBoxDiv.appendTo("#TextBoxesGroup5");
     counter++;
     document.getElementById('myText').value = (counter-1);
       });
       $("#removeButton5").click(function () {
    if(counter==0){
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

        <form name="basicform" id="basicform">
          <div id="sf1" class="frm">
            <fieldset>
              <legend style="font-family: Century Gothic;"><b>Employment Data</b></legend>

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

$result = mysqli_query("SELECT * FROM employdata WHERE username = '$login_sessionGrad'", $connection);
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    ?>
            <h5>QUESTION: <b>ARE YOU PRESENTLY EMPLOYED? <b style = "color: red;">*</b></b></h5>
                 <select required class="form-control" id="employ" name="employ" onkeydown="hideEmploy (this.form, this.selected)" onkeyup="hideEmploy (this.form, this.selected)" onclick="hideEmploy (this.form, this.selected)">
                    <option value="">Select below</option>
                    <option <?php $row['presentlyEmploy'] == 'Yes' ? print "selected" : "";?> value="Yes">Yes</option>
                    <option <?php $row['presentlyEmploy'] == 'No' ? print "selected" : "";?> value="No">No</option>
                  </select>
                     <?php
$checked = explode(', ', $row['reasonsIfNo']);
    ?>
                     <div id="ifNo">
                     <label><b style="font-size: 50px;">IF NO: </b><br>State the reason(s) why you are not yet employed. (Note: You may select more than one item)</label>
                <input type="checkbox" name = "reasons[]" id="r1" disabled="true" value="Family concern" <?php in_array('Family concern', $checked) ? print "checked" : "";?> /> Family concern <br>
                <input type="checkbox" name = "reasons[]" id="r2" disabled="true" value="Health-related reasons" <?php in_array('Health-related reasons', $checked) ? print "checked" : "";?> /> Health-related reasons <br>
                <input type="checkbox" name = "reasons[]" id="r3" disabled="true" value="Lack of work experience" <?php in_array('Lack of work experience', $checked) ? print "checked" : "";?> /> Lack of work experience <br>
                <input type="checkbox" name = "reasons[]" id="r4" disabled="true" value="Pursuing graduate studies" <?php in_array('Pursuing graduate studies', $checked) ? print "checked" : "";?> /> Pursuing graduate studies <br>
                <input type="checkbox" name = "reasons[]" id="r5" disabled="true" value="Engaged in entrepreneurship" <?php in_array('Engaged in entrepreneurship', $checked) ? print "checked" : "";?> />Engaged in entrepreneurship <br>
                <input type="checkbox" name = "reasons[]" id="r6" disabled="true" value="No job opportunity" <?php in_array('No job opportunity', $checked) ? print "checked" : "";?> />No job opportunity <br>
                <input type="checkbox" name = "reasons[]" id="r7" disabled="true" value="No interest in getting a job" <?php in_array('No interest in getting a job', $checked) ? print "checked" : "";?> />No interest in getting a job <br>
                <input type="checkbox" name = "reasons[]" id="r8" disabled="true" value="Lack of professional eligibility requirements" <?php in_array('Lack of professional eligibility requirements', $checked) ? print "checked" : "";?> />Lack of professional eligibility requirements <br>
                <input type="checkbox" name = "reasons[]" id="r9" disabled="true" value="Starting pay is too low" <?php in_array('Starting pay is too low', $checked) ? print "checked" : "";?> />Starting pay is too low <br>
                <input type="checkbox" name = "reasons[]" id="r10" disabled="true" value="Have plans to seek job out of the country" <?php in_array('Have plans to seek job out of the country', $checked) ? print "checked" : "";?> />Have plans to seek job out of the country <br>
                <input type="checkbox" name = "reasons[]" id="r11" disabled="true" onclick="enable_otherreason(this.checked)" value="Others" <?php if ($row['otherReasonsIfNo'] == "") {} else {print "checked";}?> />Others <br>
                <input type="text" <?php if ($row['otherReasonsIfNo'] == "") {print "disabled";} else {}?> placeholder="If others, please specify." id="otherreason" name="otherreason" class="form-control" autocomplete="off" value="<?php echo $row['otherReasonsIfNo']; ?>">
                <label>HOW LONG DID YOU STAY IN YOUR PREVIOUS JOB? <b style = "color: red;">*</b></label>
                <select required id= "NoGroup" name = "prevJob" onchange="DisableNoReason(this)" style="width: 100%; height: 50%;" class="form-control">
                  <option value="">Select below</option>
                  <option <?php $row['prevJob'] == 'Less than a month' ? print "selected" : "";?> value="Less than a month">Less than a month</option>
                  <option <?php $row['prevJob'] == '1-6 months' ? print "selected" : "";?> value="1-6 months">1-6 months</option>
                  <option <?php $row['prevJob'] == '7-11 months' ? print "selected" : "";?> value="7-11 months">7-11 months</option>
                  <option <?php $row['prevJob'] == '1 year to less than 2 years' ? print "selected" : "";?>value="1 year to less than 2 years">1 year to less than 2 years</option>
                  <option <?php $row['prevJob'] == '2 years to less than 3 years' ? print "selected" : "";?> value="2 years to less than 3 years">2 years to less than 3 years</option>
                  <option <?php $row['prevJob'] == '3 years to less than 4 years' ? print "selected" : "";?> value="3 years to less than 4 years">3 years to less than 4 years</option>
                  <option <?php $row['prevJob'] == 'Others' ? print "selected" : "";?> value="Others">Others</option>
                </select>
                <input type="text" <?php if ($row['otherPrevJob'] == "") {print "disabled";} else {}?> placeholder="If others, please specify." id="reasonOne" name="reasonOne" class="form-control" autocomplete="off" value = "<?php echo $row['otherPrevJob']; ?>">
               <?php
$checked = explode(', ', $row['changeJob']);
    ?>
               <label>WHAT ARE YOUR REASON(S) FOR CHANGING THE JOB? <b style = "color: red;">*</b></label>
                  <input <?php in_array('Salaries & Benefits', $checked) ? print "checked" : "";?> name = "job[]" type="checkbox" id="x1" value="Salaries &amp; Benefits">Salaries &amp; Benefits<br>
                  <input <?php in_array('Career challenge', $checked) ? print "checked" : "";?> name = "job[]" type="checkbox" id="x2" value="Career challenge">Career challenge<br>
                  <input <?php in_array('Related to special skills', $checked) ? print "checked" : "";?> name = "job[]" type="checkbox" id="x3" value="Related to special skills">Related to special skills<br>
                  <input <?php in_array('Proximity to residence', $checked) ? print "checked" : "";?> name = "job[]" type="checkbox" id="x4" value="Proximity to residence">Proximity to residence<br>
                  <input <?php in_array('Relations with people in the organization', $checked) ? print "checked" : "";?> name = "job[]" type="checkbox" id="x5" value="Relations with people in the organization">Relations with people in the organization<br>
                  <input <?php if ($row['otherChangeJob'] == "") {} else {print "checked";}?> name = "job[]" type="checkbox" id="x6" onclick="enable_reasonTwo(this.checked)" value="Others">Others<br>
                <input type="text" <?php if ($row['otherChangeJob'] == "") {print "disabled";} else {}?> placeholder="If others, please specify." id="reasonTwo" name="reasonTwo" class="form-control" autocomplete="off" value = "<?php echo $row['otherChangeJob']; ?>">
                </div>
               <!-- <label>Year Employed</label>
                <input type="text" id="yearEmployed" name="yearEmployed" class="form-control" autocomplete="off">-->
                     <div id="ifYes">
                      <?php
$checked = explode(', ', $row['acceptJob']);
    ?>
                  <label><b style="font-size: 50px;">IF YES: </b><br>WHAT ARE YOUR REASON(S) FOR ACCEPTING THE JOB? <b style = "color: red;">*</b> (Note: You may select more than one answer.)</label>
                  <input <?php in_array('Salaries & benefits', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y1" value="Salaries &amp; benefits">Salaries &amp; benefits<br>
                  <input <?php in_array('Proximity to residence', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y2" value="Proximity to residence">Proximity to residence<br>
                  <input <?php in_array('Career challenge', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y3" value="Career challenge">Career challenge<br>
                  <input <?php in_array('Peer influence', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y5" value="Peer influence">Peer influence<br>
                  <input <?php in_array('Related to special skill', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y6" value="Related to special skill">Related to special skill<br>
                  <input <?php in_array('Family influence', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y7" value="Family influence">Family influence<br>
                  <input <?php in_array('Related to course or study', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y8" value="Related to course or study">Related to course or study<br>
                  <input <?php in_array('Good human relations with employer / fellow employees', $checked) ? print "checked" : "";?> name = "jobAccept[]" type = "checkbox" id = "y9" value="Good human relations with employer / fellow employees">Good human relations with employer / fellow employees<br>
                  <input <?php if ($row['otherAcceptJob'] == "") {} else {print "checked";}?> name = "jobAccept[]" type = "checkbox" id = "y10" onclick="enable_yesReason(this.checked)" value="Others">Others<br>
                </select>
                <input type="text" <?php if ($row['otherAcceptJob'] == "") {print "disabled";} else {}?> placeholder="If others, please specify." id="yesReason" name="yesReason" class="form-control" autocomplete="off" value = "<?php echo $row['otherAcceptJob']; ?>">
                <br>
                <label>PRESENT EMPLOYMENT STATUS <b style = "color: red;">*</b></label>
                  <select required id= "employStatus" onchange="DisableEmployStatus(this)" style="width: 100%; height: 50%;" class="form-control">
                  <option value="">Select below</option>
                  <option <?php $row['presentStatus'] == 'Regular/Permanent' ? print "selected" : "";?> value="Regular/Permanent">Regular/Permanent</option>
                  <option <?php $row['presentStatus'] == 'Temporary/Contractual' ? print "selected" : "";?> value="Temporary/Contractual">Temporary/Contractual</option>
                  <option <?php $row['presentStatus'] == 'Self-employed' ? print "selected" : "";?> value="Self-employed">Self-employed</option>
                  <option <?php $row['presentStatus'] == 'Others' ? print "selected" : "";?> value="Others">Others</option>
                </select>
                <input type="text" <?php if ($row['otherStatus'] == "") {print "disabled";} else {}?> placeholder="If others, please specify." id="otherstatus" name="otherstatus" class="form-control" autocomplete="off" value = "<?php echo $row['otherStatus']; ?>">

                <label>RANGE OF SALARY <b style = "color: red;">*</b></label>
                <select required style="width: 100%; height:50px" id = "salary" class="form-control">
                  <option value="">Select below</option>
                  <option <?php $row['salary'] == 'Below P5,000' ? print "selected" : "";?> value="Below P5,000<">Below P5,000</option>
                  <option <?php $row['salary'] == 'P5,001 to P10,000' ? print "selected" : "";?> value="P5,001 to P10,000">P5,001 to P10,000</option>
                  <option <?php $row['salary'] == 'P10,001 to P15,000' ? print "selected" : "";?> value="P10,001 to P15,000">P10,001 to P15,000</option>
                  <option <?php $row['salary'] == 'P15,001 to P20,000' ? print "selected" : "";?> value="P15,001 to P20,000">P15,001 to P20,000</option>
                  <option <?php $row['salary'] == 'Above P20,000' ? print "selected" : "";?> value="Above P20,000">Above P20,000</option>
                </select>
                <label>NATURE OF BUSINESS/OPERATION YOUR PRESENT COMPANY/ORGANIZATION IS ENGAGED IN <b style = "color: red;">*</b></label>
                <select required onchange="DisableNature(this)" style="width: 100%; height:50px" id = "business" class="form-control">
                  <option value="">Select below</option>
                  <option value="Manufacturing" <?php $row['business'] == 'Manufacturing' ? print "selected" : "";?>>Manufacturing</option>
                  <option value="BPO" <?php $row['business'] == 'BPO' ? print "selected" : "";?>>BPO</option>
                  <option value="Retailing" <?php $row['business'] == 'Retailing' ? print "selected" : "";?>>Retailing</option>
                  <option value="Retailing" <?php $row['business'] == 'Financial' ? print "selected" : "";?>>Retailing</option>
                  <option value="Academe" <?php $row['business'] == 'Academe' ? print "selected" : "";?>>Academe</option>
                  <option value="Public Office" <?php $row['business'] == 'Public Office' ? print "selected" : "";?>>Public Office</option>
                  <option value="Auding" <?php $row['business'] == 'Auding' ? print "selected" : "";?>>Auding</option>
                  <option value="Agriculture" <?php $row['business'] == 'Agriculture' ? print "selected" : "";?>>Agriculture</option>
                  <option value="Fisheries" <?php $row['business'] == 'Fisheries' ? print "selected" : "";?>>Fisheries</option>
                  <option value="Restaurant" <?php $row['business'] == 'Restaurant' ? print "selected" : "";?>>Restaurant</option>
                  <option value="Hotel" <?php $row['business'] == 'Hotel' ? print "selected" : "";?>>Hotel</option>
                  <option value="Others" <?php $row['business'] == 'Others' ? print "selected" : "";?>>Others</option>
                </select>
                 <input type="text" <?php if ($row['otherBusiness'] == "") {print "disabled";} else {}?> placeholder="If others, please specify." id="othernature" name="othernature" class="form-control" autocomplete="off" value = "<?php echo $row['otherBusiness']; ?>">
            <label>COUNTRY <b style = "color: red;">*</b></label>
                  <select required style="width: 100%; height:50px" id = "country" onchange="DisableCountry(this)" class="form-control">
                      <option value="">Select below</option>
                      <option value="United States" <?php $row['country'] == 'United States' ? print "selected" : "";?>> United States </option>
                      <option value="Abkhazia" <?php $row['country'] == 'Abkhazia' ? print "selected" : "";?>> Abkhazia </option>
                      <option value="Afghanistan" <?php $row['country'] == 'Afghanistan' ? print "selected" : "";?>> Afghanistan </option>
                      <option value="Albania" <?php $row['country'] == 'Albania' ? print "selected" : "";?>> Albania </option>
                      <option value="Algeria" <?php $row['country'] == 'Algeria' ? print "selected" : "";?>> Algeria </option>
                      <option value="American Samoa" <?php $row['country'] == 'American Samoa' ? print "selected" : "";?>> American Samoa </option>
                      <option value="Andorra" <?php $row['country'] == 'Andorra' ? print "selected" : "";?>> Andorra </option>
                      <option value="Angola" <?php $row['country'] == 'Angola' ? print "selected" : "";?>> Angola </option>
                      <option value="Anguilla" <?php $row['country'] == 'Anguilla' ? print "selected" : "";?>> Anguilla </option>
                      <option value="Antigua and Barbuda" <?php $row['country'] == 'Antigu and Barbuda' ? print "selected" : "";?>> Antigua and Barbuda </option>
                      <option value="Argentina" <?php $row['country'] == 'Argentina' ? print "selected" : "";?>> Argentina </option>
                      <option value="Armenia" <?php $row['country'] == 'Armenia' ? print "selected" : "";?>> Armenia </option>
                      <option value="Aruba" <?php $row['country'] == 'Aruba' ? print "selected" : "";?>> Aruba </option>
                      <option value="Australia" <?php $row['country'] == 'Australia' ? print "selected" : "";?>> Australia </option>
                      <option value="Austria" <?php $row['country'] == 'Austria' ? print "selected" : "";?>> Austria </option>
                      <option value="Azerbaijan" <?php $row['country'] == 'Azerbaijan' ? print "selected" : "";?>> Azerbaijan </option>
                      <option value="The Bahamas" <?php $row['country'] == 'The Bahamas' ? print "selected" : "";?>> The Bahamas </option>
                      <option value="Bahrain" <?php $row['country'] == 'Bahrain' ? print "selected" : "";?>> Bahrain </option>
                      <option value="Bangladesh" <?php $row['country'] == 'Bangladesh' ? print "selected" : "";?>> Bangladesh </option>
                      <option value="Barbados" <?php $row['country'] == 'Barbados' ? print "selected" : "";?>> Barbados </option>
                      <option value="Belarus" <?php $row['country'] == 'Belarus' ? print "selected" : "";?>> Belarus </option>
                      <option value="Belgium" <?php $row['country'] == 'Belgium' ? print "selected" : "";?>> Belgium </option>
                      <option value="Belize" <?php $row['country'] == 'Belize' ? print "selected" : "";?>> Belize </option>
                      <option value="Benin" <?php $row['country'] == 'Benin' ? print "selected" : "";?>> Benin </option>
                      <option value="Bermuda" <?php $row['country'] == 'Bermuda' ? print "selected" : "";?>> Bermuda </option>
                      <option value="Bhutan" <?php $row['country'] == 'Bhutan' ? print "selected" : "";?>> Bhutan </option>
                      <option value="Bolivia" <?php $row['country'] == 'Bolivia' ? print "selected" : "";?>> Bolivia </option>
                      <option value="Bosnia and Herzegovina" <?php $row['country'] == 'Bosnia and Herzegovina' ? print "selected" : "";?>> Bosnia and Herzegovina </option>
                      <option value="Botswana" <?php $row['country'] == 'Botswana' ? print "selected" : "";?>> Botswana </option>
                      <option value="Brazil" <?php $row['country'] == 'Brazil' ? print "selected" : "";?>> Brazil </option>
                      <option value="Brunei" <?php $row['country'] == 'Brunei' ? print "selected" : "";?>> Brunei </option>
                      <option value="Bulgaria" <?php $row['country'] == 'Bulgaria' ? print "selected" : "";?>> Bulgaria </option>
                      <option value="Burkina Faso" <?php $row['country'] == 'Burkina Faso' ? print "selected" : "";?>> Burkina Faso </option>
                      <option value="Burundi" <?php $row['country'] == 'Burundi' ? print "selected" : "";?>> Burundi </option>
                      <option value="Cambodia" <?php $row['country'] == 'Cambodia' ? print "selected" : "";?>> Cambodia </option>
                      <option value="Cameroon" <?php $row['country'] == 'Cameroon' ? print "selected" : "";?>> Cameroon </option>
                      <option value="Canada" <?php $row['country'] == 'Canada' ? print "selected" : "";?>> Canada </option>
                      <option value="Cape Verde" <?php $row['country'] == 'Cape Verde' ? print "selected" : "";?>> Cape Verde </option>
                      <option value="Cayman Islands" <?php $row['country'] == 'Cayman Islands' ? print "selected" : "";?>> Cayman Islands </option>
                      <option value="Central African Republic" <?php $row['country'] == 'Central African Republic' ? print "selected" : "";?>> Central African Republic </option>
                      <option value="Chad" <?php $row['country'] == 'Chad' ? print "selected" : "";?>> Chad </option>
                      <option value="Chile" <?php $row['country'] == 'Chile' ? print "selected" : "";?>> Chile </option>
                      <option value="People&#39;s Republic of China" <?php $row['country'] == "People's Republic of China" ? print "selected" : "";?>> People's Republic of China </option>
                      <option value="Republic of China" <?php $row['country'] == "Republic of China" ? print "selected" : "";?>> Republic of China </option>
                      <option value="Christmas Island" <?php $row['country'] == "Christmas Islands" ? print "selected" : "";?>> Christmas Island </option>
                      <option value="Cocos (Keeling) Islands" <?php $row['country'] == "Cocos (Keeling) Islands" ? print "selected" : "";?> Cocos (Keeling) Islands </option>
                      <option value="Colombia" <?php $row['country'] == "Colombia" ? print "selected" : "";?>> Colombia </option>
                      <option value="Comoros" <?php $row['country'] == "Comoros" ? print "selected" : "";?>> Comoros </option>
                      <option value="Congo" <?php $row['country'] == "Congo" ? print "selected" : "";?>> Congo </option>
                      <option value="Cook Islands" <?php $row['country'] == "Cook Islands" ? print "selected" : "";?>> Cook Islands </option>
                      <option value="Costa Rica" <?php $row['country'] == "Costa Rica" ? print "selected" : "";?>> Costa Rica </option>
                      <option value="Cote d&#39;Ivoire" <?php $row['country'] == "Cote d'Ivoire" ? print "selected" : "";?>> Cote d'Ivoire </option>
                      <option value="Croatia" <?php $row['country'] == "Croatia" ? print "selected" : "";?>> Croatia </option>
                      <option value="Cuba" <?php $row['country'] == "Cuba" ? print "selected" : "";?>> Cuba </option>
                      <option value="Cyprus" <?php $row['country'] == "Cyprus" ? print "selected" : "";?>> Cyprus </option>
                      <option value="Czech Republic" <?php $row['country'] == "Czech Republic" ? print "selected" : "";?>> Czech Republic </option>
                      <option value="Denmark" <?php $row['country'] == "Denmark" ? print "selected" : "";?>> Denmark </option>
                      <option value="Djibouti" <?php $row['country'] == "Djibouti" ? print "selected" : "";?>> Djibouti </option>
                      <option value="Dominica"<?php $row['country'] == "Dominica" ? print "selected" : "";?>> Dominica </option>
                      <option value="Dominican Republic" <?php $row['country'] == "Dominican Republic" ? print "selected" : "";?>> Dominican Republic </option>
                      <option value="Ecuador" <?php $row['country'] == "Ecuador" ? print "selected" : "";?>> Ecuador </option>
                      <option value="Egypt" <?php $row['country'] == "Egypt" ? print "selected" : "";?>> Egypt </option>
                      <option value="El Salvador" <?php $row['country'] == "El Salvador" ? print "selected" : "";?> > El Salvador </option>
                      <option value="Equatorial Guinea" <?php $row['country'] == "Equatorial Guinea" ? print "selected" : "";?>> Equatorial Guinea </option>
                      <option value="Eritrea" <?php $row['country'] == "Eritrea" ? print "selected" : "";?>> Eritrea </option>
                      <option value="Estonia" <?php $row['country'] == "Estonia" ? print "selected" : "";?>> Estonia </option>
                      <option value="Ethiopia" <?php $row['country'] == "Ethiopia" ? print "selected" : "";?>> Ethiopia </option>
                      <option value="Falkland Islands" <?php $row['country'] == "Falkland Islands" ? print "selected" : "";?>> Falkland Islands </option>
                      <option value="Faroe Islands" <?php $row['country'] == "Faroe Islands" ? print "selected" : "";?>> Faroe Islands </option>
                      <option value="Fiji" <?php $row['country'] == "Fiji" ? print "selected" : "";?>> Fiji </option>
                      <option value="Finland" <?php $row['country'] == "Finland" ? print "selected" : "";?>> Finland </option>
                      <option value="France" <?php $row['country'] == "France" ? print "selected" : "";?>> France </option>
                      <option value="French Polynesia" <?php $row['country'] == "French Polynesia" ? print "selected" : "";?>> French Polynesia </option>
                      <option value="Gabon" <?php $row['country'] == "Gabon" ? print "selected" : "";?>> Gabon </option>
                      <option value="The Gambia" <?php $row['country'] == "The Gambia" ? print "selected" : "";?>> The Gambia </option>
                      <option value="Georgia" <?php $row['country'] == "Georgia" ? print "selected" : "";?>> Georgia </option>
                      <option value="Germany" <?php $row['country'] == "Germany" ? print "selected" : "";?>> Germany </option>
                      <option value="Ghana" <?php $row['country'] == "Ghana" ? print "selected" : "";?>> Ghana </option>
                      <option value="Gibraltar" <?php $row['country'] == "Gibraltar" ? print "selected" : "";?>> Gibraltar </option>
                      <option value="Greece" <?php $row['country'] == "Greece" ? print "selected" : "";?>> Greece </option>
                      <option value="Greenland" <?php $row['country'] == "Greenland" ? print "selected" : "";?>> Greenland </option>
                      <option value="Grenada" <?php $row['country'] == "Grenada" ? print "selected" : "";?>> Grenada </option>
                      <option value="Guam" <?php $row['country'] == "Guam" ? print "selected" : "";?>> Guam </option>
                      <option value="Guatemala" <?php $row['country'] == "Guatemala" ? print "selected" : "";?>> Guatemala </option>
                      <option value="Guernsey" <?php $row['country'] == "Guernsey" ? print "selected" : "";?>> Guernsey </option>
                      <option value="Guinea" <?php $row['country'] == "Guinea" ? print "selected" : "";?>> Guinea </option>
                      <option value="Guinea-Bissau" <?php $row['country'] == "Guinea-Bissau" ? print "selected" : "";?>> Guinea-Bissau </option>
                      <option value="Guyana Guyana" <?php $row['country'] == "Guyana Guyana" ? print "selected" : "";?>> Guyana Guyana </option>
                      <option value="Haiti Haiti" <?php $row['country'] == "Haiti Haiti" ? print "selected" : "";?>> Haiti Haiti </option>
                      <option value="Honduras" <?php $row['country'] == "Honduras" ? print "selected" : "";?>> Honduras </option>
                      <option value="Hong Kong" <?php $row['country'] == "Hong Kong" ? print "selected" : "";?>> Hong Kong </option>
                      <option value="Hungary" <?php $row['country'] == "Hungary" ? print "selected" : "";?>> Hungary </option>
                      <option value="Iceland" <?php $row['country'] == "Iceland" ? print "selected" : "";?>> Iceland </option>
                      <option value="India" <?php $row['country'] == "India" ? print "selected" : "";?>> India </option>
                      <option value="Indonesia" <?php $row['country'] == "Indonesia" ? print "selected" : "";?>> Indonesia </option>
                      <option value="Iran" <?php $row['country'] == "Iran" ? print "selected" : "";?>> Iran </option>
                      <option value="Iraq" <?php $row['country'] == "Iraq" ? print "selected" : "";?>> Iraq </option>
                      <option value="Ireland" <?php $row['country'] == "Ireland" ? print "selected" : "";?>> Ireland </option>
                      <option value="Israel" <?php $row['country'] == "Israel" ? print "selected" : "";?>> Israel </option>
                      <option value="Italy" <?php $row['country'] == "Italy" ? print "selected" : "";?>> Italy </option>
                      <option value="Jamaica" <?php $row['country'] == "Jamaica" ? print "selected" : "";?>> Jamaica </option>
                      <option value="Japan" <?php $row['country'] == "Japan" ? print "selected" : "";?>> Japan </option>
                      <option value="Jersey" <?php $row['country'] == "Jersey" ? print "selected" : "";?>> Jersey </option>
                      <option value="Jordan" <?php $row['country'] == "Jordan" ? print "selected" : "";?>> Jordan </option>
                      <option value="Kazakhstan" <?php $row['country'] == "Kazakhstan" ? print "selected" : "";?>> Kazakhstan </option>
                      <option value="Kenya" <?php $row['country'] == "Kenya" ? print "selected" : "";?>> Kenya </option>
                      <option value="Kiribati" <?php $row['country'] == "Kiribati" ? print "selected" : "";?>> Kiribati </option>
                      <option value="North Korea" <?php $row['country'] == "North Korea" ? print "selected" : "";?>> North Korea </option>
                      <option value="South Korea" <?php $row['country'] == "South Korea" ? print "selected" : "";?>> South Korea </option>
                      <option value="Kosovo" <?php $row['country'] == "Kosovo" ? print "selected" : "";?>> Kosovo </option>
                      <option value="Kuwait" <?php $row['country'] == "Kuwait" ? print "selected" : "";?>> Kuwait </option>
                      <option value="Kyrgyzstan" <?php $row['country'] == "Kyrgyzstan" ? print "selected" : "";?>> Kyrgyzstan </option>
                      <option value="Laos" <?php $row['country'] == "Laos" ? print "selected" : "";?>> Laos </option>
                      <option value="Latvia" <?php $row['country'] == "Latvia" ? print "selected" : "";?>> Latvia </option>
                      <option value="Lebanon" <?php $row['country'] == "Lebanon" ? print "selected" : "";?>> Lebanon </option>
                      <option value="Lesotho" <?php $row['country'] == "Lesotho" ? print "selected" : "";?>> Lesotho </option>
                      <option value="Liberia" <?php $row['country'] == "Liberia" ? print "selected" : "";?>> Liberia </option>
                      <option value="Libya" <?php $row['country'] == "Libya" ? print "selected" : "";?>> Libya </option>
                      <option value="Liechtenstein" <?php $row['country'] == "Liechtenstein" ? print "selected" : "";?>> Liechtenstein </option>
                      <option value="Lithuania" <?php $row['country'] == "Lithuania" ? print "selected" : "";?>> Lithuania </option>
                      <option value="Luxembourg" <?php $row['country'] == "Luxembourg" ? print "selected" : "";?>> Luxembourg </option>
                      <option value="Macau" <?php $row['country'] == "Macau" ? print "selected" : "";?>> Macau </option>
                      <option value="Macedonia" <?php $row['country'] == "Macedonia" ? print "selected" : "";?>> Macedonia </option>
                      <option value="Madagascar" <?php $row['country'] == "Madagascar" ? print "selected" : "";?>> Madagascar </option>
                      <option value="Malawi" <?php $row['country'] == "Malawi" ? print "selected" : "";?>> Malawi </option>
                      <option value="Malaysia" <?php $row['country'] == "Malaysia" ? print "selected" : "";?>> Malaysia </option>
                      <option value="Maldives" <?php $row['country'] == "Maldives" ? print "selected" : "";?>> Maldives </option>
                      <option value="Mali" <?php $row['country'] == "Mali" ? print "selected" : "";?>> Mali </option>
                      <option value="Malta" <?php $row['country'] == "Malta" ? print "selected" : "";?>> Malta </option>
                      <option value="Marshall Islands" <?php $row['country'] == "Marshall Islands" ? print "selected" : "";?>> Marshall Islands </option>
                      <option value="Mauritania" <?php $row['country'] == "Mauritania" ? print "selected" : "";?>> Mauritania </option>
                      <option value="Mauritius" <?php $row['country'] == "Mauritius" ? print "selected" : "";?>> Mauritius </option>
                      <option value="Mayotte" <?php $row['country'] == "Mayotte" ? print "selected" : "";?>> Mayotte </option>
                      <option value="Mexico" <?php $row['country'] == "Mexico" ? print "selected" : "";?>> Mexico </option>
                      <option value="Micronesia" <?php $row['country'] == "Micronesia" ? print "selected" : "";?>> Micronesia </option>
                      <option value="Moldova" <?php $row['country'] == "Moldova" ? print "selected" : "";?>> Moldova </option>
                      <option value="Monaco" <?php $row['country'] == "Monaco" ? print "selected" : "";?>> Monaco </option>
                      <option value="Mongolia" <?php $row['country'] == "Mongolia" ? print "selected" : "";?>> Mongolia </option>
                      <option value="Montenegro" <?php $row['country'] == "Montenegro" ? print "selected" : "";?>> Montenegro </option>
                      <option value="Montserrat" <?php $row['country'] == "Montserrat" ? print "selected" : "";?>> Montserrat </option>
                      <option value="Morocco" <?php $row['country'] == "Morocco" ? print "selected" : "";?>> Morocco </option>
                      <option value="Mozambique" <?php $row['country'] == "Mozambique" ? print "selected" : "";?>> Mozambique </option>
                      <option value="Myanmar" <?php $row['country'] == "Myanmar" ? print "selected" : "";?>> Myanmar </option>
                      <option value="Nagorno-Karabakh" <?php $row['country'] == "Nagorno-Karabakh" ? print "selected" : "";?>> Nagorno-Karabakh </option>
                      <option value="Namibia" <?php $row['country'] == "Namibia" ? print "selected" : "";?>> Namibia </option>
                      <option value="Nauru" <?php $row['country'] == "Nauru" ? print "selected" : "";?>> Nauru </option>
                      <option value="Nepal" <?php $row['country'] == "Nepal" ? print "selected" : "";?>> Nepal </option>
                      <option value="Netherlands" <?php $row['country'] == "Netherlands" ? print "selected" : "";?>> Netherlands </option>
                      <option value="Netherlands Antilles" <?php $row['country'] == "Netherlands Antilles" ? print "selected" : "";?>> Netherlands Antilles </option>
                      <option value="New Caledonia" <?php $row['country'] == "New Caledonia" ? print "selected" : "";?>> New Caledonia </option>
                      <option value="New Zealand" <?php $row['country'] == "New Zealand" ? print "selected" : "";?>> New Zealand </option>
                      <option value="Nicaragua" <?php $row['country'] == "Nicaragua" ? print "selected" : "";?>> Nicaragua </option>
                      <option value="Niger" <?php $row['country'] == "Niger" ? print "selected" : "";?>> Niger  </option>
                      <option value="Nigeria" <?php $row['country'] == "Nigeria" ? print "selected" : "";?>> Nigeria </option>
                      <option value="Niue" <?php $row['country'] == "Niue" ? print "selected" : "";?>> Niue </option>
                      <option value="Norfolk Island" <?php $row['country'] == "Norfolk Island" ? print "selected" : "";?>> Norfolk Island </option>
                      <option value="Turkish Republic of Northern Cyprus" <?php $row['country'] == "Turkish Republic of Northern Cyprus" ? print "selected" : "";?>> Turkish Republic of Northern Cyprus </option>
                      <option value="Northern Mariana" <?php $row['country'] == "Northern Mariana" ? print "selected" : "";?>> Northern Mariana </option>
                      <option value="Norway" <?php $row['country'] == "Norway" ? print "selected" : "";?>> Norway </option>
                      <option value="Pakistan" <?php $row['country'] == "Pakistan" ? print "selected" : "";?>> Pakistan </option>
                      <option value="Palau" <?php $row['country'] == "Palau" ? print "selected" : "";?>> Palau </option>
                      <option value="Palestine" <?php $row['country'] == "Palestine" ? print "selected" : "";?>> Palestine </option>
                      <option value="Panama" <?php $row['country'] == "Panama" ? print "selected" : "";?>> Panama </option>
                      <option value="Papua New Guinea" <?php $row['country'] == "Papua New Guinea" ? print "selected" : "";?>> Papua New Guinea </option>
                      <option value="Paraguay" <?php $row['country'] == "Paraguay" ? print "selected" : "";?>> Paraguay </option>
                      <option value="Peru" <?php $row['country'] == "Peru" ? print "selected" : "";?>> Peru </option>
                      <option value="Philippines" <?php $row['country'] == "Philippines" ? print "selected" : "";?>> Philippines </option>
                      <option value="Pitcairn Islands" <?php $row['country'] == "Pitcairn Islands" ? print "selected" : "";?>> Pitcairn Islands </option>
                      <option value="Poland" <?php $row['country'] == "Poland" ? print "selected" : "";?>> Poland </option>
                      <option value="Portugal" <?php $row['country'] == "Portugal" ? print "selected" : "";?>> Portugal </option>
                      <option value="Transnistria Pridnestrovie" <?php $row['country'] == "Transnistria Pridnestrovie" ? print "selected" : "";?>> Transnistria Pridnestrovie </option>
                      <option value="Puerto Rico" <?php $row['country'] == "Puerto Rico" ? print "selected" : "";?>> Puerto Rico </option>
                      <option value="Qatar" <?php $row['country'] == "Qatar" ? print "selected" : "";?>> Qatar </option>
                      <option value="Romania" <?php $row['country'] == "Romania" ? print "selected" : "";?>> Romania </option>
                      <option value="Russia" <?php $row['country'] == "Russia" ? print "selected" : "";?>> Russia </option>
                      <option value="Rwanda" <?php $row['country'] == "Rwanda" ? print "selected" : "";?>> Rwanda </option>
                      <option value="Saint Barthelemy" <?php $row['country'] == "Saint Barthelemy" ? print "selected" : "";?>> Saint Barthelemy </option>
                      <option value="Saint Helena" <?php $row['country'] == "Saint Helena" ? print "selected" : "";?>> Saint Helena </option>
                      <option value="Saint Kitts and Nevis" <?php $row['country'] == "Saint Kitts and Nevis" ? print "selected" : "";?>> Saint Kitts and Nevis </option>
                      <option value="Saint Lucia" <?php $row['country'] == "Saint Lucia" ? print "selected" : "";?>> Saint Lucia </option>
                      <option value="Saint Martin" <?php $row['country'] == "Saint Martin" ? print "selected" : "";?>> Saint Martin </option>
                      <option value="Saint Pierre and Miquelon" <?php $row['country'] == "Saint Pierre and Miquelon" ? print "selected" : "";?>> Saint Pierre and Miquelon </option>
                      <option value="Saint Vincent and the Grenadines" <?php $row['country'] == "Saint Vincent and the Grenadines" ? print "selected" : "";?>> Saint Vincent and the Grenadines </option>
                      <option value="Samoa" <?php $row['country'] == "Samoa" ? print "selected" : "";?>> Samoa </option>
                      <option value="San Marino" <?php $row['country'] == "San Marino" ? print "selected" : "";?>> San Marino </option>
                      <option value="Sao Tome and Principe" <?php $row['country'] == "Sao Tome and Principe" ? print "selected" : "";?>> Sao Tome and Principe </option>
                      <option value="Saudi Arabia" <?php $row['country'] == "Saudi Arabia" ? print "selected" : "";?>> Saudi Arabia </option>
                      <option value="Senegal" <?php $row['country'] == "Senegal" ? print "selected" : "";?>> Senegal </option>
                      <option value="Serbia" <?php $row['country'] == "Serbia" ? print "selected" : "";?>> Serbia </option>
                      <option value="Seychelles" <?php $row['country'] == "Seychelles" ? print "selected" : "";?>> Seychelles </option>
                      <option value="Sierra Leone" <?php $row['country'] == "Sierra Leone" ? print "selected" : "";?>> Sierra Leone </option>
                      <option value="Singapore" <?php $row['country'] == "Singapore" ? print "selected" : "";?>> Singapore </option>
                      <option value="Slovakia" <?php $row['country'] == "Slovakia" ? print "selected" : "";?>> Slovakia </option>
                      <option value="Slovenia" <?php $row['country'] == "Slovenia" ? print "selected" : "";?>> Slovenia </option>
                      <option value="Solomon Islands" <?php $row['country'] == "Solomon Islands" ? print "selected" : "";?>> Solomon Islands </option>
                      <option value="Somalia" <?php $row['country'] == "Somalia" ? print "selected" : "";?>> Somalia </option>
                      <option value="Somaliland" <?php $row['country'] == "Somaliland" ? print "selected" : "";?>> Somaliland </option>
                      <option value="South Africa" <?php $row['country'] == "South Africa" ? print "selected" : "";?>> South Africa </option>
                      <option value="South Ossetia" <?php $row['country'] == "South Ossetia" ? print "selected" : "";?>> South Ossetia </option>
                      <option value="Spain" <?php $row['country'] == "Spain" ? print "selected" : "";?>> Spain </option>
                      <option value="Sri Lanka" <?php $row['country'] == "Sri Lanka" ? print "selected" : "";?>> Sri Lanka </option>
                      <option value="Sudan" <?php $row['country'] == "Sudan" ? print "selected" : "";?>> Sudan </option>
                      <option value="Suriname" <?php $row['country'] == "Suriname" ? print "selected" : "";?>> Suriname </option>
                      <option value="Svalbard" <?php $row['country'] == "Svalbard" ? print "selected" : "";?>> Svalbard </option>
                      <option value="Swaziland" <?php $row['country'] == "Swaziland" ? print "selected" : "";?>> Swaziland </option>
                      <option value="Sweden" <?php $row['country'] == "Sweden" ? print "selected" : "";?>> Sweden </option>
                      <option value="Switzerland" <?php $row['country'] == "Switzerland" ? print "selected" : "";?>> Switzerland </option>
                      <option value="Syria" <?php $row['country'] == "Syria" ? print "selected" : "";?>> Syria </option>
                      <option value="Taiwan" <?php $row['country'] == "Taiwan" ? print "selected" : "";?>> Taiwan </option>
                      <option value="Tajikistan" <?php $row['country'] == "Tajikistan" ? print "selected" : "";?>> Tajikistan </option>
                      <option value="Tanzania" <?php $row['country'] == "Tanzania" ? print "selected" : "";?>> Tanzania </option>
                      <option value="Thailand" <?php $row['country'] == "Thailand" ? print "selected" : "";?>> Thailand </option>
                      <option value="Timor-Leste" <?php $row['country'] == "Timor-Leste" ? print "selected" : "";?>> Timor-Leste </option>
                      <option value="Togo" <?php $row['country'] == "Togo" ? print "selected" : "";?>> Togo </option>
                      <option value="Tokelau" <?php $row['country'] == "Tokelau" ? print "selected" : "";?>> Tokelau </option>
                      <option value="Tonga" <?php $row['country'] == "Tonga" ? print "selected" : "";?>> Tonga </option>
                      <option value="Trinidad and Tobago" <?php $row['country'] == "Trinidad and Tobago" ? print "selected" : "";?>> Trinidad and Tobago </option>
                      <option value="Tristan da Cunha" <?php $row['country'] == "Tristan da Cunha" ? print "selected" : "";?>> Tristan da Cunha </option>
                      <option value="Tunisia" <?php $row['country'] == "Tunisia" ? print "selected" : "";?>> Tunisia </option>
                      <option value="Turkey" <?php $row['country'] == "Turkey" ? print "selected" : "";?>> Turkey </option>
                      <option value="Turkmenistan" <?php $row['country'] == "Turkmenistan" ? print "selected" : "";?>> Turkmenistan </option>
                      <option value="Turks and Caicos Islands" <?php $row['country'] == "Turks and Caicos Islands" ? print "selected" : "";?>> Turks and Caicos Islands </option>
                      <option value="Tuvalu" <?php $row['country'] == "Tuvalu" ? print "selected" : "";?>> Tuvalu </option>
                      <option value="Uganda" <?php $row['country'] == "Uganda" ? print "selected" : "";?>> Uganda </option>
                      <option value="Ukraine" <?php $row['country'] == "Ukraine" ? print "selected" : "";?>> Ukraine </option>
                      <option value="United Arab Emirates" <?php $row['country'] == "United Arab Emirates" ? print "selected" : "";?>> United Arab Emirates </option>
                      <option value="United Kingdom" <?php $row['country'] == "United Kingdom" ? print "selected" : "";?>> United Kingdom </option>
                      <option value="Uruguay" <?php $row['country'] == "Uruguay" ? print "selected" : "";?>> Uruguay </option>
                      <option value="Uzbekistan" <?php $row['country'] == "Uzbekistan" ? print "selected" : "";?>> Uzbekistan </option>
                      <option value="Vanuatu" <?php $row['country'] == "Vanuatu" ? print "selected" : "";?>> Vanuatu </option>
                      <option value="Vatican City" <?php $row['country'] == "Vatican City" ? print "selected" : "";?>> Vatican City </option>
                      <option value="Venezuela" <?php $row['country'] == "Venezuela" ? print "selected" : "";?>> Venezuela </option>
                      <option value="Vietnam" <?php $row['country'] == "Vietnam" ? print "selected" : "";?>> Vietnam </option>
                      <option value="British Virgin Islands" <?php $row['country'] == "British Virgin Islands" ? print "selected" : "";?>> British Virgin Islands </option>
                      <option value="US Virgin Islands" <?php $row['country'] == "US Virgin Islands" ? print "selected" : "";?>> US Virgin Islands </option>
                      <option value="Wallis and Futuna" <?php $row['country'] == "Wallis and Futuna" ? print "selected" : "";?>> Wallis and Futuna </option>
                      <option value="Western Sahara" <?php $row['country'] == "Western Sahara" ? print "selected" : "";?>> Western Sahara </option>
                      <option value="Yemen" <?php $row['country'] == "Yemen" ? print "selected" : "";?>> Yemen </option>
                      <option value="Zambia" <?php $row['country'] == "Zambia" ? print "selected" : "";?>> Zambia </option>
                      <option value="Zimbabwe" <?php $row['country'] == "Zimbabwe" ? print "selected" : "";?>> Zimbabwe </option>
                </select>

              <label>HOW LONG DID IT TAKE YOU TO LAND YOUR FIRST JOB AFTER GRADUATION? <b style = "color: red;">*</b></label>
                  <select required style="width: 100%; height: 50%;" onchange="DisableJob(this)" class="form-control" id = "firstJobTake">
                  <option value="">Select below</option>
                  <option <?php $row['firstJobTake'] == 'Less than a month' ? print "selected" : "";?> value="Less than a month">Less than a month</option>
                  <option <?php $row['firstJobTake'] == '1-6 months' ? print "selected" : "";?> value="1-6 months">1-6 months</option>
                  <option <?php $row['firstJobTake'] == '7-11 months' ? print "selected" : "";?> value="7-11 months">7-11 months</option>
                  <option <?php $row['firstJobTake'] == '1 year to less than 2 years' ? print "selected" : "";?> value="1 year to less than 2 years">1 year to less than 2 years</option>
                  <option <?php $row['firstJobTake'] == '2 years to less than 3 years' ? print "selected" : "";?> value="2 years to less than 3">2 years to less than 3</option>
                  <option <?php $row['firstJobTake'] == '3 years to less than 4 years' ? print "selected" : "";?> value="3 years to less than 4 years">3 years to less than 4 years</option>
                  <option <?php $row['firstJobTake'] == 'Others' ? print "selected" : "";?> value="Others">Others</option>
                </select>
                <input type="text" disabled = "true" placeholder="If others, please specify." <?php if ($row['firstJob'] == "") {print "disabled";} else {}?> id="firstJob" name="firstJob" class="form-control" autocomplete="off" value = "<?php echo $row['firstJob']; ?>">

                  <table><tr><td><label>DATE EMPLOYED (FROM)</label><input required type="month" name="fromDate" id="fromDate" class="form-control"></td><td><label>(TO)</label><input required type="month" name="toDate" id="toDate" class="form-control" /></td></tr></table><label>NAME OF COMPANY</label><input required type="text" id="presentCompany" name="company" style="width:100%;" class="form-control" autocomplete="off" value=""><label>COMPANY ADDRESS </label><input required type="text" placeholder="" id="presentcAdd" name="cAdd" class="form-control" autocomplete="off"><label>NATURE OF WORK</label><select required onchange="DisableNatureWork(this)" class="form-control" style="width: 100%; height:50px" id = "workNature"><option value="">Select below</option><option value="Teacher">Teacher</option><option value="Fishery/Technician">Fishery/Technician</option><option value="Computer Technician">Computer Technician</option><option value="Programmer">Programmer</option><option value="Aquaculturist">Aquaculturist</option><option value="Network Administrator">Network Administrator</option><option value="Marine Biologist">Marine Biologist</option><option value="Food Quality Control/Assurance">Food Quality Control/Assurance</option><option value="Others">Others</option></select><input type="text" disabled="true" placeholder="If others, please specify." id="othernaturework" name="othernaturework" class="form-control" autocomplete="off" required><br>

                   </div>

                  <input type="text" id="myText" name="myText" value="0" hidden>
    <?php if ($row['fromDate'] != "" || $row['toDate'] != "") {
        ?>
    <hr style="border-top: dotted 9px;">
                 <?php

        echo "<fieldset><legend>CURRENT EMPLOYMENTS</legend><table class='table table-bordered'<tr><td><b><center>FROM</center></b></td><td><b><center>TO</center></b></td><td><b><center>COMPANY</center></b></td><td><center><b>POSITION</b></center></td></tr><tr><td>";

        echo "<div id='currfromDate' contenteditable spellcheck = 'false'>" . nl2br($row['fromDate']) . "</div>";

        echo "</td>";
        echo "<td>";

        echo "<div id='currtoDate' contenteditable spellcheck = 'false'>" . nl2br($row['toDate']) . "</div>";

        echo "</td>";
        echo "<td>";

        echo "<div id='myCompany' contenteditable spellcheck = 'false'>" . nl2br($row['company']) . "</div>";

        echo "</td>";
        echo "<td>";

        echo "<div id='currworkNature' contenteditable spellcheck = 'false'>" . nl2br($row['workNature']) . "</div>";

        echo "</td>";
        echo "</tr></table></fieldset>";
    }
    ?>
                <hr style="border-top: dotted 5px;">
                <h3 style="color: black; text-decoration: bold;">EMPLOYMENT HISTORY</h3><strong style="font-family: nixie_oneregular">(According to importance)</strong><br>

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
          company: {
            required: true,
            minlength: 1,
            maxlength: 150
          },
          yearEmployed: {
            required: true,
          },
          country: {
            required: true,
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
          var count = 0;
          var reasonsIfNo = [];
          var changeJob = [];
          var acceptJob = [];
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
            if(a == 0){
            if($('#fromDate').val() != ""){
              selectedDateFrom = $('#fromDate').val();
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
                company.push($('#presentCompany').val());
                cAdd.push($('#presentcAdd').val());
            }
             a++;
    }
          if($('#currfromDate').text() != ""){
            var currFrom = $('#currfromDate').text();
            var currTo = $('#currtoDate').text();
            var currCompany = $('#myCompany').text();
            var currPosition = $('#currworkNature').text();
            fromDate.push(currFrom);
            toDate.push(currTo);
            workNature.push(currPosition);
            company.push(currCompany);
          }

          var i =0;
          var limit = $('#myText').val();
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
                  toDate.push(getDateTo);

                  position = $('#workNature'+i).val();
                  if(position == "Others"){
                    position = $('#othernaturework'+i).val();
                    othernaturework.push(position);
                  }
                  workNature.push(position);

                   if(i == (limit-1))
                  {
                  $.each($("input[id='company']"), function(){
                  company.push($(this).val());
              });
                   $.each($("input[id='cAdd']"), function(){
                  cAdd.push($(this).val());
              });
                  }
                  count++;
            }





/*
            if(count >= 0){
                  workNature = [];
              $.each($("select[id='workNature']"), function(){
                  workNature.push($(this).val());
              });
            }*/
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
          $.post("save_updateEmployment.php",
          {
                  username: $('#user').text(),
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
              if (data == "Success"){
              var x = document.getElementById("forSuccess");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
              window.location.href = "viewProfile.php";
          }
              else {
              var x = document.getElementById("forError");
              x.className = "show";
              setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
              window.location.href = "viewProfile.php";
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