<?php
include 'sessionGrad2.php';

if (!(isset($_SESSION['login_grad']) && $_SESSION['login_grad'] != '')) {
    header("Location: graduatesLogin.php");
}
?>
<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="icon" href="dnsc.jpg" type="image/x-icon" />
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
<script src="canvasjs.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
  <script src="graph/highcharts.js"></script>
  <script src="graph/exporting.js"></script>
<script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>Generate Report</title>');
            printWindow.document.write('</head><body>Name of SUC: <b>DAVAO DEL NORTE STATE COLLEGE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FORM SLRD 2016 KRA 1.5<br>KRA 1. QUALITY AND RELEVANCE OF INSTRUCTION<br>Item 5 Employment of Graduates');
            printWindow.document.write(divContents);
            printWindow.document.write('<p style=font-size: 50px;>Prepared by: </p><br><h3> <h3>Ariel O. Gamao</h3> </body></html>');
            printWindow.document.close();
            printWindow.print();
        });
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

  #submit:hover
  {
    background: #98fb98;
    color:#00FA9A;
    cursor:pointer;
  }

  #submit
  {
    width:100px;
    border:solid 1px #00FA9A;
    padding:10px;
    background-color: #2E8B57;
    font-size:14px;
  }
</style>
</head>
<body>
 <div id="header">
    <h1><a href="home.php">SOCIO-ECONOMIC PROFILING &amp; GRADUATE TRACER SURVEY </a></h1>
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

<div id="container">
<div id="body">
<br><br>
<h2 align = "left" style="font-family: century gothic;">Filter result/s:</h2>
<hr>
<div class="content">
<p style="font-family: Century Gothic; text-align: center;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_sessionGrad; ?></b>. (<a href = "logout.php" style="text-decoration: none;">Log out</a>)

<br />
<div id="result">
</div>
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
$categories = $_POST['selected'];
$selected   = implode(",", array_map('mysqli_real_escape_string', $categories));

$num_rows = null;
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,ph,overseas') {

    $result2013   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country = 'Philippines' and e.yearEmployed = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2013   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country != 'Philippines' and e.yearEmployed = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country = 'Philippines' and e.yearEmployed = '2013-2014'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2014   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country != 'Philippines' and e.yearEmployed = '2013-2014'", $connection);
    $num_rows2014 = mysqli_num_rows($result2013);

}

if ($selected == '2013-2014,ph,overseas') {

    $result1   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country = 'Philippines' and e.yearEmployed = '2013-2014'", $connection);
    $num_rows1 = mysqli_num_rows($result1);
    $result2   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country != 'Philippines' and e.yearEmployed = '2013-2014'", $connection);
    $num_rows2 = mysqli_num_rows($result2);
}
if ($selected == '2014-2015,ph,overseas') {

    $result1   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country = 'Philippines' and e.yearEmployed = '2014-2015'", $connection);
    $num_rows1 = mysqli_num_rows($result1);
    $result2   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country != 'Philippines' and e.yearEmployed = '2014-2015'", $connection);
    $num_rows2 = mysqli_num_rows($result2);
}
if ($selected == '2015-2016,ph,overseas') {

    $result1   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country = 'Philippines' and e.yearEmployed = '2015-2016'", $connection);
    $num_rows1 = mysqli_num_rows($result1);
    $result2   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country != 'Philippines' and e.yearEmployed = '2015-2016'", $connection);
    $num_rows2 = mysqli_num_rows($result2);
}
if ($selected == '2016-2017,ph,overseas') {

    $result1   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country = 'Philippines' and e.yearEmployed = '2016-2017'", $connection);
    $num_rows1 = mysqli_num_rows($result1);
    $result2   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,e.country,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and e.country != 'Philippines' and e.yearEmployed = '2016-2017'", $connection);
    $num_rows2 = mysqli_num_rows($result2);
}

if ($selected == '2013-2014,bsit') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2013-2014'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2013-2014'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2014-2015,bsit') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2015-2016,bsit') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2015-2016'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2015-2016'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2016-2017,bsit') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2016-2017'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Information Technology' and e.yearEmployed = '2016-2017'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2013-2014,bsed') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2014-2015,bsed') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2015-2016,bsed') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2016-2017,bsed') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Education' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2013-2014,bsft') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2013-2014'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2013-2014'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2014-2015,bsft') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2015-2016,bsft') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2015-2016'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2015-2016'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2016-2017,bsft') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2016-2017'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Food Technology' and e.yearEmployed='2016-2017'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2013-2014,bsmb') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2013-2014'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2013-2014'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2014-2015,bsmb') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2015-2016,bsmb') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2015-2016'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2015-2016'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2016-2017,bsmb') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2016-2017'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Science in Marine Biology' and e.yearEmployed='2016-2017'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2013-2014,bpa') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2013-2014'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2013-2014'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == '2014-2015,bpa') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2014-2015'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2015-2016,bpa') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2015-2016'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2015-2016'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}
if ($selected == '2016-2017,bpa') {

    $resultM   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Male' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2016-2017'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.username=y.username and g.gender = 'Female' and y.degree = 'Bachelor of Public Administration' and e.yearEmployed='2016-2017'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);
}

if ($selected == "2013-2014,2014-2015,bsit") {

    $result2013M   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013M = mysqli_num_rows($result2013M);
    $result2013F   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013F = mysqli_num_rows($result2013F);
    $result2014M   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014M = mysqli_num_rows($result2014M);
    $result2014F   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014F = mysqli_num_rows($result2014F);
}

if ($selected == "2016-2017,2015-2016,2014-2015,Employment Status") {
    $result2013Reg     = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Regular/Permanent' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2013Reg   = mysqli_num_rows($result2013Reg);
    $result2013Temp    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Temporary/Contractual' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2013Temp  = mysqli_num_rows($result2013Temp);
    $result2013Self    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Self-employed' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2013Self  = mysqli_num_rows($result2013Self);
    $result2013Other   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Others' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2013Other = mysqli_num_rows($result2013Other);

    $result2014Reg     = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Regular/Permanent' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2014Reg   = mysqli_num_rows($result2014Reg);
    $result2014Temp    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Temporary/Contractual' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2014Temp  = mysqli_num_rows($result2014Temp);
    $result2014Self    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Self-employed' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2014Self  = mysqli_num_rows($result2014Self);
    $result2013Other   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Others' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2014Other = mysqli_num_rows($result2014Other);

    $result2015Reg     = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Regular/Permanent' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2015Reg   = mysqli_num_rows($result2015Reg);
    $result2015Temp    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Temporary/Contractual' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2015Temp  = mysqli_num_rows($result2015Temp);
    $result2015Self    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Self-employed' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2015Self  = mysqli_num_rows($result2015Self);
    $result2015Other   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Others' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2015Other = mysqli_num_rows($result2015Other);

    $result2016Reg     = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Regular/Permanent' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2016Reg   = mysqli_num_rows($result2016Reg);
    $result2016Temp    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Temporary/Contractual' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2016Temp  = mysqli_num_rows($result2016Temp);
    $result2016Self    = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Self-employed' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2016Self  = mysqli_num_rows($result2016Self);
    $result2016Other   = mysqli_query("SELECT distinct g.name,e.yearEmployed,e.company,e.workNature,g.mobile FROM employdata e, geninfo g, education y where g.username=y.username and g.username=e.username and e.presentStatus = 'Others' and e.yearEmployed='2013-2014'", $connection);
    $num_rows2016Other = mysqli_num_rows($result2016Other);
}
?>




<center></center>
<?php
$resultStatus  = mysqli_query("SELECT * FROM employdata where presentStatus = 'Regular/Permanent'", $connection);
$statusCount   = mysqli_num_rows($resultStatus);
$resultStatus2 = mysqli_query("SELECT * FROM employdata where presentStatus = 'Temporary/Contractual'", $connection);
$statusCount2  = mysqli_num_rows($resultStatus2);
$resultStatus3 = mysqli_query("SELECT * FROM employdata where presentStatus = 'Self-employed'", $connection);
$statusCount3  = mysqli_num_rows($resultStatus2);

$resultSalary  = mysqli_query("SELECT * FROM employdata where salary = 'Below P5,000'", $connection);
$salaryCount   = mysqli_num_rows($resultSalary);
$resultSalary2 = mysqli_query("SELECT * FROM employdata where salary = 'P5,001 to P10,000'", $connection);
$salaryCount2  = mysqli_num_rows($resultSalary2);
$resultSalary3 = mysqli_query("SELECT * FROM employdata where salary = 'P10,001 to P15,000'", $connection);
$salaryCount3  = mysqli_num_rows($resultSalary3);
$resultSalary4 = mysqli_query("SELECT * FROM employdata where salary = 'P15,001 to P20,000'", $connection);
$salaryCount4  = mysqli_num_rows($resultSalary4);
$resultSalary5 = mysqli_query("SELECT * FROM employdata where salary = 'Above P20,000'", $connection);
$salaryCount5  = mysqli_num_rows($resultSalary5);
?>
<a href = "graduatesProfile.php" style="text-decoration: none;"><input type = "button" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: left;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="< Back" /></a>
<input type = "button" id="btnPrint" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" />
<br><br><br>
<div id="dvContainer">
<script src="canvasjs.min.js"></script>
<script type="text/javascript">
  window.onload = function () {
    <?php
if ($selected == 'Employment Status') {
    ?>
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "theme2",//theme1
    title:{
      text: "Regular/Permanent: <?php echo $statusCount; ?>  •  Temporary/Contractual: <?php echo $statusCount2; ?>  •  Self-employed: <?php echo $statusCount3; ?>"
    },
    animationEnabled: false,   // change to true
    data: [
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "pie",
      dataPoints: [
        { label: "Regular/Permanent",  y: <?php echo $statusCount; ?> },
        { label: "Temporary/Contractual", y: <?php echo $statusCount2; ?>  },
        { label: "Self-employed", y: <?php echo $statusCount3; ?>  },

      ]
    }
    ]
  });
  chart.render();
<?php
}
?>
  <?php
if ($selected == 'Salary') {
    ?>
  var chart2 = new CanvasJS.Chart("chartContainer2", {
    theme: "theme2",//theme1
    title:{
      text: "Below P5,000: <?php echo $salaryCount; ?>  •  P5,001 to P10,000: <?php echo $salaryCount2; ?>  •  P10,001 to P15,000: <?php echo $salaryCount3; ?>  •  P15,001 to P20,000: <?php echo $salaryCount4 ?>  •  Above P20,000: <?php echo $salaryCount5; ?>"
    },
    animationEnabled: false,   // change to true
    data: [
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "pie",
      dataPoints: [
        { label: "Below P5,000",  y: <?php echo $salaryCount; ?> },
        { label: "P5,001 to P10,000", y: <?php echo $salaryCount2; ?>  },
        { label: "P10,001 to P15,000", y: <?php echo $salaryCount3; ?>  },
        { label: "P15,001 to P20,000", y: <?php echo $salaryCount4; ?>  },
        { label: "Above P20,000", y: <?php echo $salaryCount5; ?>  },

      ]
    }
    ]
  });
  chart2.render();
<?php
}
?>
<?php
if ($selected == 'High School Type') {
    ?>
  var chart4 = new CanvasJS.Chart("chartContainer4", {
    theme: "theme2",//theme1
    title:{
      text: "Public: <?php echo $publicCount; ?>  •  Private: <?php echo $privateCount; ?>"
    },
    animationEnabled: false,   // change to true
    data: [
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "pie",
      dataPoints: [
        { label: "Public",  y: <?php echo $publicCount; ?>  },
        { label: "Private", y: <?php echo $privateCount; ?> },
      ]
    }
    ]
  });
  chart4.render();
<?php
}
?>
<?php
?>
}

</script>


  <?php
if ($selected == "2014-2015,ph,overseas") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF GRADUATES BY WORKPLACES IN S.Y. 2014-2015'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2014-2015'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: false,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Within Philippines',
            data: [<?php echo $num_rows1; ?>]
        }, {
            name: 'Overseas',
            data: [<?php echo $num_rows2; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<center>
<br>

<?php
if ($selected == "2014-2015,ph,overseas") {
    ?>
<div id="container1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div><br><br><br>
  <?php
}
?>

<?php
if ($selected == '2013-2014,ph,overseas') {
    ?>
        <h5>a. List of Graduates (S.Y. 2013-2014) work within Philippines and Overseas</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result1) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Within Philippines (Total: <?php echo $num_rows1; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result2) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Overseas (Total: <?php echo $num_rows2; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows1 + $num_rows2; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2014-2015,ph,overseas') {
    ?>
        <h5>a. List of Graduates (S.Y. 2013-2014) work within Philippines and Overseas</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result1) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Within Philippines (Total: <?php echo $num_rows1; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result2) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Overseas (Total: <?php echo $num_rows2; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows1 + $num_rows2; ?></h1>
      <?php
}
?>
       <?php
if ($selected == '2015-2016,ph,overseas') {
    ?>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result1) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Within Philippines (Total: <?php echo $num_rows1; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result2) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Overseas (Total: <?php echo $num_rows2; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows1 + $num_rows2; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2016-2017,ph,overseas') {
    ?>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result1) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Within Philippines (Total: <?php echo $num_rows1; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Country</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$result2) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['country']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">Overseas (Total: <?php echo $num_rows2; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows1 + $num_rows2; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2013-2014,bsit') {
    ?>
        <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Science in Information Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2014-2015,bsit') {
    ?>
        <h5>a. List of Graduates (S.Y. 2014-2015) for Bachelor of Science in Information Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
       <?php
if ($selected == '2015-2016,bsit') {
    ?>
        <h5>a. List of Graduates (S.Y. 2015-2016) for Bachelor of Science in Information Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2016-2017,bsit') {
    ?>
        <h5>a. List of Graduates (S.Y. 2016-2017) for Bachelor of Science in Information Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2013-2014,bsed') {
    ?>
        <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Secondary Education Program</h5>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2014-2015,bsed') {
    ?>
        <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Secondary Education Program</h5>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th >
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2015-2016,bsed') {
    ?>
        <h5>a. List of Graduates (S.Y. 2015-2016) for Bachelor of Secondary Education Program</h5>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number </th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2016-2017,bsed') {
    ?>
        <h5>a. List of Graduates (S.Y. 2016-2017) for Bachelor of Secondary Education Program</h5>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h1 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h1>
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2013-2014,bsft') {
    ?>
        <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Science in Food Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2014-2015,bsft') {
    ?>
      <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Science in Food Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
       <?php
if ($selected == '2015-2016,bsft') {
    ?>
         <h5>a. List of Graduates (S.Y. 2015-2016) for Bachelor of Science in Food Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2016-2017,bsft') {
    ?>
       <h5>a. List of Graduates (S.Y. 2016-2017) for Bachelor of Science in Food Technology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2013-2014,bsmb') {
    ?>
           <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Science in Marine Biology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number </th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2014-2015,bsmb') {
    ?>
      <h5>a. List of Graduates (S.Y. 2014-2015) for Bachelor of Science in Marine Biology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
       <?php
if ($selected == '2015-2016,bsmb') {
    ?>
          <h5>a. List of Graduates (S.Y. 2015-2016) for Bachelor of Science in Marine Biology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2016-2017,bsmb') {
    ?>
        <h5>a. List of Graduates (S.Y. 2016-2017) for Bachelor of Science in Marine Biology Program</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
  <?php
if ($selected == '2013-2014,bpa') {
    ?>
      <h5>a. List of Graduates (S.Y. 2013-2014) for Bachelor of Public Administration</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2014-2015,bpa') {
    ?>
          <h5>a. List of Graduates (S.Y. 2014-2015) for Bachelor of Public Administration</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
       <?php
if ($selected == '2015-2016,bpa') {
    ?>
      <h5>a. List of Graduates (S.Y. 2015-2016) for Bachelor of Public Administration</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == '2016-2017,bpa') {
    ?>
      <h5>a. List of Graduates (S.Y. 2016-2017) for Bachelor of Public Administration</h5>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">MALE (Total: <?php echo $num_rowsM; ?>)</h5><br><br>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="float: left; font-family: Century Gothic; color: black;">FEMALE (Total: <?php echo $num_rowsF; ?>)</h5><br>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsM + $num_rowsF; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2016-2017,2015-2016,2014-2015,Employment Status") {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>

        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>

        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>

        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>Student Name</th>
        <th>Year Employed</th>
        <th>Employer</th>
        <th>Position</th>
        <th>Contact Number</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['yearEmployed']}</td>";
        echo "<td>{$row['company']}</td>";
        echo "<td>{$row['workNature']}</td>";
        echo "<td>{$row['mobile']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>

      <?php
}
?>

    <?php
if ($selected == 'Employment Status') {
    ?>
      <th>Name</th>
      <th>Employment Status</th>
      <!--<th>Action</th>-->
    <?php
} else if ($selected == 'Salary') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['salary']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'Nature of Business') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['name']}</td>";
        echo "<td>{$row['business']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
}

?>
</center>
<?php

if ($selected == 'Employment Status') {
    ?>
<br><center>
<div id="chartContainer" style="height: 250px; width: 50%;"></div><br><br><br>
<?php
}

if ($selected == 'Salary') {
    ?>
<br><center>
<div id="chartContainer2" style="height: 250px; width: 50%;"></div><br><br><br></center>
<?php
}
?>
</div>
<!-- Diri ibutang ang last tag sa print-->
</center>
<hr />
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
       <!-- <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js3/index.js"></script> -->

        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
</body>
</html>