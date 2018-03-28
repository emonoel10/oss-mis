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

$sql    = "SELECT fname from account where username = '$login_session'";
$result = mysqli_query($connection, $sql);
$name   = "";

while ($row = mysqli_fetch_array($result)) {
    $name = $row['fname'];
}
?>


<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="icon" href="dnsc.png" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
  <title>DNSC - Profiles</title>

  <script type='text/javascript' src='js/mobile.js'></script>
  <script src="http://s.codepen.io/assets/libs/modernizr.js" type="text/javascript"></script>


      <!-- CSS -->
    <link href="pagination/page/pagination.css" rel="stylesheet" type="text/css" />
    <link href="pagination/page/A_green.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="tableCSS/justNormalize.css">


        <link rel="stylesheet" href="tableCSS/style.css">
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/table.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

<script type="text/javascript" src="js2/jquery-1.8.0.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/prep.js"></script>
<script type="text/javascript">
    function popuponclick(divId) {
      var printContents = document.getElementById(divId).innerHTML;
      var originalContents = document.body.innerHTML;
      my_window = window.open('', 'mywindow', 'status=1,width=350,height=150');
      my_window.document.write('<html><head><title>Print Report</title><style> table, tr, td, th { border: 1px solid black; background-color: white; } table {    border-collapse: collapse; width: 100%;}th {    height: 10px;}</style></head>');
      my_window.document.write('<body onafterprint="self.close()">');
      my_window.document.write("<img src='images/dnsc.png' style='margin-top: -1px; alt: dnsc; width: 120px; height: 120px; position: absolute; margin-left: 30px;'><div style='margin-left: 150px; margin-top: 10px; color: black; font-family: Times New Roman; line-height: 1.3; padding: 2px 0;width: 100%; margin: 20px auto absolute;'>Republic of the Philippines<br><span style = 'font-size: 16px;'><b>DAVAO DEL NORTE STATE COLLEGE</b></span><br>New Visayas, Panabo City, Davao del Norte, Philippines 8105<br>Website: www.dnsc.edu.ph; Telephone #: 63 84 6284301; 6288203<br>Email Address: president@dnsc.edu.ph; jab@dnsc.edu.ph <br><b>______________________________________________________________________________________________</b></div>");
      my_window.document.write(printContents);
      my_window.document.write('<br><br><br><br><div style="color: black; font-family: Arial; text-align: left;">Prepared by:</div><br><p contenteditable = "true" style="color: black; font-family: Arial; float: left;" spellcheck = "false"><u><span style="font-weight: bold;">MARICIELO PAULA E. FUNA</span></u></b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Guidance Officer</p></body></html>');
     }
  </script>

<script type="text/javascript">

function Search(aList)
{
// var x=document.getElementById("search1");
var y=document.getElementById("submit");

// x.disabled=(aList.selectedIndex == 0);
y.disabled=(aList.selectedIndex == 0);
}
</script>
<script type="text/javascript">
  function enable_search(status)
{
status=!status;
  document.search1.disabled = status;
}
</script>
<script type="text/javascript">
$(function(){
$(".search").keyup(function()
{
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: dataString,
  cache: false,
  success: function(html)
  {
  $("#result").html(html).show();
  }
  });
}return false;
});

jQuery("#result").live("click",function(e){
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) {
  var $clicked = $(e.target);
  if (! $clicked.hasClass("search")){
  jQuery("#result").fadeOut();
  }
});
$('#searchid').click(function(){
  jQuery("#result").fadeIn();
});
});
</script>
<script type="text/javascript">
  function enable_sy(status)
{
status=!status;
  document.myForm.from.disabled = status;
  document.myForm.to.disabled = status;
  document.myForm.submit.disabled = status;
  document.myForm.from.options[0].selected = true;
  document.myForm.to.options[0].selected = true;
}

function enable_course(status)
{
status=!status;
  document.myForm.course.disabled = status;
  document.myForm.submit.disabled = status;
  document.myForm.course.options[0].selected = true;
}

function enable_gender(status)
{
status=!status;
  document.myForm.gender.disabled = status;
  document.myForm.submit.disabled = status;
  document.myForm.gender.options[0].selected = true;
}

function enable_religion(status)
{
status=!status;
  document.myForm.religion.disabled = status;
  document.myForm.submit.disabled = status;
  document.myForm.religion.options[0].selected = true;
}

function enable_hs(status)
{
status=!status;
  document.myForm.hs.disabled = status;
  document.myForm.submit.disabled = status;
  document.myForm.hs.options[0].selected = true;
}
</script>
<style type="text/css">
  .content{
    width:460px;
    margin:0 auto;
  }
  #searchid
  {
    width:460px;
    border:solid 1px #00FA9A;
    padding:10px;
    font-size:14px;
  }

  #search1
  {
    width:200px;
    border:solid 1px #00FA9A;
    padding:10px;
    font-size:14px;
  }

  #filter
  {
    width:150px;
    border:solid 1px gray;
    padding:10px;
    font-size:14px;
  }

  #add
  {
    width:150px;
    border:solid 1px  #66CDAA;
    padding:10px;
    font-size:14px;
  }

  #addStud
  {
    width:150px;
    border:solid 1px #008080;
    padding:10px;
    background-color: #008080;
    font-size:14px;
  }

  #addStud:hover
  {
    background: #0000CD;
    color: #00BFFF;
    cursor:pointer;

  }

  #submitSummary:hover
  {
    background: #98fb98;
    color:#00FA9A;
    cursor:pointer;
  }

  #submitSummary
  {
    width:228.5px;
    border:solid 1px #0000;
    padding:10px;
    background-color: #34495E;
    font-size:14px;
  }

    #submitMaster:hover
  {
    background: #98fb98;
    color:#00FA9A;
    cursor:pointer;
  }

  #submitMaster
  {
    width:228.5px;
    border:solid 1px #0000;
    padding:10px;
    background-color: #34495E;
    font-size:14px;
  }

  #result
  {
    position:absolute;
    width:500px;
    padding:10px;
    display:none;
    margin-top:-1px;
    border-top:0px;
    overflow:hidden;
    border:1px #CCC solid;
    background-color: white;
  }
  .show
  {
    padding:10px;
    border-bottom:1px #999 dashed;
    font-size:15px;
    height:50px;
  }
  .show:hover
  {
    background:#2E8B57;
    color:#00FA9A;
    cursor:pointer;
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
</style>
<script src="jquery-1.6.1.min.js"></script>
        <!-- <script>
            var graph;
            var xPadding = 40;
            var yPadding = 40;

            var data = { values:[
                { X: "Male", Y: 12 },
                { X: "Female", Y: 28 },

            ]};

            // Returns the max Y value in our data list
            function getMaxY() {
                var max = 0;

                for(var i = 0; i < data.values.length; i ++) {
                    if(data.values[i].Y > max) {
                        max = data.values[i].Y;
                    }
                }

                max += 10 - max % 10;
                return max;
            }

            // Return the x pixel for a graph point
            function getXPixel(val) {
                return ((graph.width() - xPadding) / data.values.length) * val + (xPadding * 1.5);
            }

            // Return the y pixel for a graph point
            function getYPixel(val) {
                return graph.height() - (((graph.height() - yPadding) / getMaxY()) * val) - yPadding;
            }

            $(document).ready(function() {
                graph = $('#graph');
                var c = graph[0].getContext('2d');

                c.lineWidth = 2;
                c.strokeStyle = '#333';
                c.font = 'italic 8pt sans-serif';
                c.textAlign = "center";

                // Draw the axises
                c.beginPath();
                c.moveTo(xPadding, 0);
                c.lineTo(xPadding, graph.height() - yPadding);
                c.lineTo(graph.width(), graph.height() - yPadding);
                c.stroke();

                // Draw the X value texts
                for(var i = 0; i < data.values.length; i ++) {
                    c.fillText(data.values[i].X, getXPixel(i), graph.height() - yPadding + 20);
                }

                // Draw the Y value texts
                c.textAlign = "right"
                c.textBaseline = "middle";

                for(var i = 0; i < getMaxY(); i += 10) {
                    c.fillText(i, xPadding - 10, getYPixel(i));
                }

                c.strokeStyle = '#f00';

                // Draw the line graph
                c.beginPath();
                c.moveTo(getXPixel(0), getYPixel(data.values[0].Y));
                for(var i = 1; i < data.values.length; i ++) {
                    c.lineTo(getXPixel(i), getYPixel(data.values[i].Y));
                }
                c.stroke();

                // Draw the dots
                c.fillStyle = '#333';

                for(var i = 0; i < data.values.length; i ++) {
                    c.beginPath();
                    c.arc(getXPixel(i), getYPixel(data.values[i].Y), 4, 0, Math.PI * 6, true);
                    c.fill();
                }
            });
        </script> -->
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
<center>

<ul class="section"> <!--for demo wrap-->

<div id="container">
<div id="body">
<img src="images/socio.jpg" width="100%">
<hr>

<div class="content">
<h1 style="font-family: latoregular; color: #315f52;">Welcome, Admin!</h1>
<p style="font-family: Century Gothic;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_session; ?></b>. (<a href = "logout.php" style="text-decoration: none;">Log out</a>)
<form action = "sampleFilter.php" name = "myForm" id="myForm" method="POST">
<table>
<tr>
  <td><h4 style="font-size: 25px; font-family: Century Gothic; color: white;">Filter by:</h4></td>
</tr>
  <tr>
    <td>
<!--<input type="checkbox" name=others onclick="enable_sy(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">School Year <span class="text-danger">*</span></b><br>
<select required name = "from" id = "from" style="font-family: Century Gothic;">
  <option value="">From:</option>
  <?php $current_year = date("Y");
for ($i = 2013; $i < $current_year; $i++) {?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php
}?>
</select>
<b style = "color: white;">-</b>
<select required name="to" id="to" style="font-family: Century Gothic;">
  <option value="">To:</option>
  <?php $current_year = date("Y");
for ($i = 2014; $i < $current_year + 1; $i++) {?>
  <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
  <?php
}?>
</select>
    </td>
<td>
<!--<input type="checkbox" name=others onclick="enable_course(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">Course <span class="text-danger">*</span></b><br>
<select required name="course" id="course" style="font-family: Century Gothic;">
  <option value="">Select below:</option>
  <option value="Bachelor of Science in Information Technology (BSIT)">BSIT</option>
  <option value="Bachelor of Science in Education (BSEd)">BSEd</option>
  <option value="Bachelor of Science in Food Technology (BSFT)">BSFT</option>
  <option value="Bachelor of Public Administration (BPA)">BPA</option>
  <option value="Bachelor of Science in Marine Biology (BSMB)">BSMB</option>
  <option value="all">All</option>
</select>
</td>
<td>
<!--<input type="checkbox" name=others onclick="enable_gender(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">Gender <span class="text-danger">*</span></b><br>
<select required name="gender" id="gender" style="font-family: Century Gothic;">
  <option value="">Select below:</option>
  <option value="Male">Male</option>
  <option value="Female">Female</option>
  <option value="all">All</option>
</select>
</td>
  </tr>
  <tr>
  <td>
<!--<input type="checkbox" name=others onclick="enable_religion(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">Religion</b><br>
    <?php
mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection, 'tryit');

$sql    = "SELECT religionName from religion order by religionName";
$result = mysqli_query($connection, $sql);

echo "<select name='religion' id='religion' style='font-family: Century Gothic; width:100%;'>";
echo "<optgroup label='Religion'>";
echo "<option value='Select below:'>Select below:</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['religionName'] . "'>" . $row['religionName'] . "</option>";
}
echo "<option value='all'>All</option>";
echo "</select>";
?>
  </td>
  <td>
<!--<input type="checkbox" name=others onclick="enable_hs(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">High School</b><br>

    <?php
mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection, 'tryit');

$sql    = "SELECT distinct hsName from highschool order by hsName";
$result = mysqli_query($connection, $sql);

echo "<select name='hs' id='hs' style='font-family: Century Gothic;'>";
echo "<optgroup label='High School'>";
echo "<option value='Select below:'>Select below:</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['hsName'] . "'>" . $row['hsName'] . "</option>";
}
echo "<option value='all'>All</all>";
echo "</select>";
?>
  </td>
  </tr>
<tr>
  <td>
<!--<input type="checkbox" name=others onclick="enable_religion(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">Municipality/City</b><br>
    <?php
mysqli_connect('localhost', 'root', '');
mysqli_select_db($connection, 'tryit');

$sql    = "SELECT distinct state from student5 order by state";
$result = mysqli_query($connection, $sql);

echo "<select name='city' id='city' style='font-family: Century Gothic; width:100%;'>";
echo "<optgroup label='City'>";
echo "<option value='Select below:'>Select below:</option>";
while ($row = mysqli_fetch_array($result)) {
    echo "<option value='" . $row['state'] . "'>" . $row['state'] . "</option>";
}
echo "<option value='all'>All</option>";
echo "</select>";
?>
  </td>
  <td>
<!--<input type="checkbox" name=others onclick="enable_course(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">Stanine</b><br>
<select name = "stanine" id = "stanine" style="font-family: Century Gothic;">
  <option value="Select below:">Select below:</option>
  <optgroup label="Stanine">
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="all">All</option>
</select>
  </td>
  <td>
<!--<input type="checkbox" name=others onclick="enable_hs(this.checked)">--> <b style = "color: black; font-family: Century Gothic; color: white;">Family Income</b><br>
<select id="income" name="income" style="font-family: Century Gothic; width: 100%;">
                <option>Select below:</option>
                <optgroup label="Family Income">
                <option value="P7,500 & below">P7,500 &amp; below</option>
                <option value="P7,501 - P15,000">P7,501 - P15,000</option>
                <option value="P15,001 - P22,500">P15,001 - P22,500</option>
                <option value="P22,501 - P30,000">P22,501 - P30,000</option>
                <option value="P30,001 & above">P30,001 &amp; above</option>
                <option value="all">All</option>
              </select>
  </td>
</tr>
<tr>

    <td style="color: white;">* Required fields</td>
  <td>
<!-- <b style = "color: black; font-family: Century Gothic; color: white;">Semester</b><br>
<select id="semester" name="semester" style="font-family: Century Gothic; width: 100%;">
<option>Select below:</option>
<optgroup label="Semester">
<option>First Semester</option>
<option>Second Semester</option>
<option value="all">All</option>
</select> -->
  </td>
</tr>
</table>
<!-- <input type="submit" style="font-family: Century Gothic; color: white;" name = "master" class = "filter" value="Generate Master Report" id = "submitMaster">
 --><input type="submit" style="font-family: Century Gothic; color: white;" name = "summary" class = "filter" value="Generate Summary Report" id = "submitSummary">
<!--   --></form>
<br><br>
<br />

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <div id="hcGenderContainer"></div>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
        <!-- Add chart here -->
    </div>
  </div>
</div>

<br />
<div id="result">
</div>
</div>
<a href="javascript: popuponclick('printableArea')"><input type = "button" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" /></a>

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
$result   = mysqli_query($connection, "SELECT * FROM personal");
$num_rows = mysqli_num_rows($result);

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

include "pagination/function.php";

$page       = (int) (!isset($_GET["page"]) ? 1 : $_GET["page"]);
$limit      = 10; //if you want to dispaly 10 records per page then you have to change here
$startpoint = ($page * $limit) - $limit;
$statement  = "personal ORDER BY lastname ASC"; //you have to pass your query over here

?>
                        <?php
$result = mysqli_query($connection, "SELECT * FROM {$statement} LIMIT {$startpoint} , {$limit}");

?>

    <?php
echo "<div id='pagingg'>";
echo pagination($statement, $limit, $page);
echo "</div>";
?>
<div id="printableArea">
<table class="rwd-table">
  <tr>
    <th>No.</th>
    <th>School Year</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Course</th>
    <th>Address</th>
    <th>Birthdate</th>
    <th>Status</th>
    <th>High School</th>
    <th>HS Type</th>
    <th>Stanine</th>
    <!--<th>Action</th>-->
  </tr>



 <?php
$i = 0;
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    $i = $i + 1;

    echo "<tr>";
    echo "<td data-th='Number' style='color:black;'>$i</td>";
    echo "<td data-th='SY' style='color:black;'>{$row['schoolYr']}</td>";
    echo "<td data-th='Name' style='color:black;'>{$row['lastname']}, {$row['firstname']} {$row['midname']}</td>";
    echo "<td data-th='Gender' style='color:black;'>{$row['gender']}</td>";
    echo "<td data-th='Course' style='color:black;'>{$row['course']}</td>";
    echo "<td data-th='Address' style='color:black;'>{$row['permanentNum']}, {$row['permanentBrgy']}, {$row['permanentCity']}, {$row['permanentProvince']}</td>";
    echo "<td data-th='Birthday' style='color:black;'>{$row['bdate']}</td>";
    echo "<td data-th='Status' style='color:black;'>{$row['mstatus']}</td>";
    echo "<td data-th='High School' style='color:black;'>{$row['hs']} ({$row['yearGrad']})</td>";
    echo "<td data-th='High School Type' style='color:black;'>{$row['hstype']}</td>";
    echo "<td data-th='Stanine' style='color:black;'>{$row['stanine']}</td>";

}
echo "</tr><br>";
//echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td data-th='Number'>$i</td>";
    echo "<td data-th='SY'>{$row['schoolYr']}</td>";
    echo "<td data-th='Name'>{$row['lastname']}, {$row['firstname']} {$row['midname']}</td>";
    echo "<td data-th='Gender'>{$row['gender']}</td>";
    echo "<td data-th='Course'>{$row['course']}</td>";
    echo "<td data-th=''>{$row['permanentNum']}, {$row['permanentBrgy']}, {$row['permanentCity']}, {$row['permanentProvince']}</td>";
    echo "<td data-th='Birthday'>{$row['bdate']}</td>";
    echo "<td data-th='Status'>{$row['mstatus']}</td>";
    echo "<td data-th='High School'>{$row['hs']} ({$row['yearGrad']})</td>";
    echo "<td data-th='High School Type'>{$row['hstype']}</td>";
    echo "<td data-th='Stanine'>{$row['stanine']}</td>";

}
echo "</tr>";
?>


</table>
<h4 style="font-family: Century Gothic; float: left;"><b><?php echo "Showing  <input type = 'text' value = '$num_rows' style = 'width:50px;' readonly> results."; ?></b></h4>
<br><br>

</div>
<br>
  </center>
  </div>
  <!-- Diri ibutang ang last tag sa print-->
  </center>
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
    <!-- Javascript -->

          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
          <script src="assets/js/jquery.backstretch.min.js"></script>
          <script src="assets/js/retina-1.1.0.min.js"></script>
          <script src="assets/js/scripts.js"></script>

          <!--[if lt IE 10]>
              <script src="assets/js/placeholder.js"></script>
          <![endif]-->
  </body>
  </html>