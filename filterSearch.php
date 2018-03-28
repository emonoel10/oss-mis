  <?php
include 'session2.php';

if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
    header("Location: socioLogin.php");
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
    <?php
$selected = $_POST['selected'];
?>
          $("#btnPrint").live("click", function () {
              var divContents = $("#dvContainer").html();
              var printWindow = window.open('', '', 'height=400,width=800');
              printWindow.document.write('<html><head><title>Generate Report</title>');
              printWindow.document.write('</head><body><center><table padding=20><tr><td><img src=dnsc.png width=90 height=90></td><td><br><h3>&nbsp;&nbsp;&nbsp;&nbsp;Republic of the Philippines<br>&nbsp;&nbsp;&nbsp;&nbsp;DAVAO DEL NORTE STATE COLLEGE<br>&nbsp;&nbsp;&nbsp;&nbsp;New Visayas, Panabo City </h3></td></tr></table><hr><br><br><p style=float:right;>Date: November 10, 2016</p></center>');
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
    <div id="body">

<br><br>
  <h2 align = "left" style="font-family: century gothic;">Filter result/s:</h2>
  <hr>
  <div class="content">
  <p style="font-family: Century Gothic; text-align: center;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_session; ?></b>. (<a href = "logout.php" style="text-decoration: none;">Log out</a>)
<!--   <form action = "filterSearch.php" method="POST"><center>
  <select style="font-family: Century Gothic; width: 65.8%; align: center;" name = "selected" id="filter" onchange="Search(this)" multiple="multiple" size = "4">
    <option style="font-family: Century Gothic;">FILTER BY:</option>
    <optgroup label="Personal Data (Students)">
    <option style="font-family: Century Gothic;" value="Course">Course</option>
    <option style="font-family: Century Gothic;" value="Gender">Gender</option>
    <option style="font-family: Century Gothic;" value="Stanine">Stanine</option>
    <optgroup label="Social Status (Students)">
    <option style="font-family: Century Gothic;" value="High School Type">High School Type</option>
    <option style="font-family: Century Gothic;" value="Ethnic Origin">Ethnic Origin</option>
    <option style="font-family: Century Gothic;" value="Religion">Religion</option>
    <optgroup label="Economic Status (Parents/Guardian)">
    <option style="font-family: Century Gothic;" value="Occupation">Occupation</option>
    <option style="font-family: Century Gothic;" value="Family Monthly Income">Family Monthly Income</option>
    <!-- <option style="font-family: Century Gothic;">House Status</option>
    <option style="font-family: Century Gothic;">Residential Lot Status</option>
    <option style="font-family: Century Gothic;">Light Facilities Used</option>
    <option style="font-family: Century Gothic;">Water Supply</option>
    <option style="font-family: Century Gothic;">Toilet Type</option>
    <option style="font-family: Century Gothic;">Transporatation</option>
    <option style="font-family: Century Gothic;">Appliances</option>
    <option style="font-family: Century Gothic;">Furniture</option> -->
<!--   </center> -->
    <?php
$categories = $_POST['selected'];
$selected   = implode(",", array_map('mysqli_real_escape_string', $categories));
?>
  <!-- </select>
  <input type="search" style="font-family: Century Gothic;" class="search1" name = "searchedItem" id="search1" placeholder="Filtered searching" value="<?php echo $searchedItem; ?>">
  <input type="submit" style="font-family: Century Gothic;" class = "filter" value="Go!" id = "submit">
  </form>
 -->
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
$selected   = $selected;
$num_rows   = null;

if ($selected == "2013-2014,2014-2015,2015-2016,bsit") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsmb") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsmb") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);
    $result2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2016-2017'", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bpa") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);
    $result2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2016-2017'", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsed") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsft") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);
}

if ($selected == "2016-2017,bsit") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2016-2017,bpa") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "Course,Gender") {

    $resultCG = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender FROM personal", $connection);
    $num_rows = mysqli_num_rows($resultCG);
}

if ($selected == "2013-2014,2014-2015,bsit") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bsed") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bsft") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bsmb") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bpa") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}

if ($selected == "2013-2014,2014-2015,bsit") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bsed") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bsft") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bsmb") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}
if ($selected == "2013-2014,2014-2015,bpa") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);
    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);
}

if ($selected == "2013-2014,bsit") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsed") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsft") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsmb") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bpa") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2015-2016,bsit") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsed") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsft") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsmb") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bpa") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2016-2017,bsit") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsed") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsft") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsmb") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bpa") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2014-2015,bsit") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsed") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsft") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsmb") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bpa") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2013-2014,bsit,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsit,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsit,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsit,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2013-2014,bsed,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsed,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsed,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsed,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsft,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsft,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsft,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsft,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsmb,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsmb,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsmb,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsmb,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bpa,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bpa,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bpa,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bpa,Male") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2013-2014,bsit,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsit,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Female' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsit,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsit,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2013-2014,bsed,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsed,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Female' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsed,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsed,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Education (BSEd)' and gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsft,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsft,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Female' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsft,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsft,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bsmb,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bsmb,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Female' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bsmb,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bsmb,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2013-2014,bpa,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2014-2015,bpa,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Female' and schoolYr = '2014-2015'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2015-2016,bpa,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rows = mysqli_num_rows($result);
}
if ($selected == "2016-2017,bpa,Female") {

    $result   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rows = mysqli_num_rows($result);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsit") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);

    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);

    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);

    $result2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2016-2017'", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "2013-2014,Male,Female") {
    $resultMale     = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rowsMale   = mysqli_num_rows($resultMale);
    $resultFemale   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rowsFemale = mysqli_num_rows($resultFemale);
}
if ($selected == "2014-2015,Male,Female") {
    $resultMale     = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rowsMale   = mysqli_num_rows($resultMale);
    $resultFemale   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Female' and schoolYr = '2014-2015'", $connection);
    $num_rowsFemale = mysqli_num_rows($resultFemale);
}
if ($selected == "2015-2016,Male,Female") {
    $resultMale     = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rowsMale   = mysqli_num_rows($resultMale);
    $resultFemale   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rowsFemale = mysqli_num_rows($resultFemale);
}
if ($selected == "2016-2017,Male,Female") {
    $resultMale     = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rowsMale   = mysqli_num_rows($resultMale);
    $resultFemale   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,schoolYr FROM personal where gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rowsFemale = mysqli_num_rows($resultFemale);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Male,Female") {

    $resultFM2013 = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where schoolYr = '2013-2014'", $connection);
    $resultFM2014 = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where schoolYr = '2014-2015'", $connection);
    $resultFM2015 = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where schoolYr = '2015-2016'", $connection);
    $resultFM2016 = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where schoolYr = '2016-2017'", $connection);

    $resultMale2013     = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Male' and schoolYr = '2013-2014'", $connection);
    $num_rowsMale2013   = mysqli_num_rows($resultMale2013);
    $resultFemale2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Female' and schoolYr = '2013-2014'", $connection);
    $num_rowsFemale2013 = mysqli_num_rows($resultFemale2013);

    $resultMale2014     = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rowsMale2014   = mysqli_num_rows($resultMale2014);
    $resultFemale2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where gender = 'Male' and schoolYr = '2014-2015'", $connection);
    $num_rowsFemale2014 = mysqli_num_rows($resultFemale2014);

    $resultMale2015     = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Male' and schoolYr = '2015-2016'", $connection);
    $num_rowsMale2015   = mysqli_num_rows($resultMale2015);
    $resultFemale2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Female' and schoolYr = '2015-2016'", $connection);
    $num_rowsFemale2015 = mysqli_num_rows($resultFemale2015);

    $resultMale2016     = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Male' and schoolYr = '2016-2017'", $connection);
    $num_rowsMale2016   = mysqli_num_rows($resultMale2016);
    $resultFemale2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,gender FROM personal where gender = 'Female' and schoolYr = '2016-2017'", $connection);
    $num_rowsFemale2016 = mysqli_num_rows($resultFemale2016);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {

    $result2013   = mysqli_query("SELECT distinct p.id,p.lastname,p.firstname,p.midname,s.religion FROM personal p, social s where schoolYr = '2013-2014' and p.id=s.id", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);

    $result2014   = mysqli_query("SELECT distinct p.id,p.lastname,p.firstname,p.midname,s.religion FROM personal p, social s where schoolYr = '2014-2015' and p.id=s.id", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);

    $result2015   = mysqli_query("SELECT distinct p.id,p.lastname,p.firstname,p.midname,s.religion FROM personal p, social s where schoolYr = '2015-2016' and p.id=s.id", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);

    $result2016   = mysqli_query("SELECT distinct p.id,p.lastname,p.firstname,p.midname,s.religion FROM personal p, social s where schoolYr = '2016-2017' and p.id=s.id", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsed") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);

    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);

    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);

    $result2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2016-2017'", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsft") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);

    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);

    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);

    $result2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2016-2017'", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa") {

    $result2013   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where schoolYr = '2013-2014'", $connection);
    $num_rows2013 = mysqli_num_rows($result2013);

    $result2014   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where schoolYr = '2014-2015'", $connection);
    $num_rows2014 = mysqli_num_rows($result2014);

    $result2015   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where schoolYr = '2015-2016'", $connection);
    $num_rows2015 = mysqli_num_rows($result2015);

    $result2016   = mysqli_query("SELECT distinct id,lastname,firstname,midname,course FROM personal where schoolYr = '2016-2017'", $connection);
    $num_rows2016 = mysqli_num_rows($result2016);
}

if ($selected == "Ethnic Origin,Religion") {

    $resultER = mysqli_query("SELECT distinct p.id,p.lastname,p.firstname,p.midname,s.ethnic,s.religion,s.otherreligion FROM social s, personal p where p.id=s.id", $connection);
    $num_rows = mysqli_num_rows($resultER);
}

if ($selected == "Course,Stanine") {

    $resultCS = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,stanine FROM personal order by course", $connection);
    $num_rows = mysqli_num_rows($resultCS);
}

if ($selected == "Course,Gender,Stanine") {

    $resultCGS = mysqli_query("SELECT distinct id,lastname,firstname,midname,course,gender,stanine FROM personal order by course", $connection);
    $num_rows  = mysqli_num_rows($resultCGS);
}

if ($selected == "Occupation,Family Monthly Income") {

    $resultOFMI = mysqli_query("SELECT distinct s.id,s.father,s.fatherOccup,s.mother,s.motherOccup,e.income FROM social s, economic e where s.id=e.id", $connection);
    $num_rows   = mysqli_num_rows($resultOFMI);

}

if ($selected == 'Barangay') {

    $result   = mysqli_query("SELECT id,lastname,firstname,midname,brgy FROM personal", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'City/Municipality') {

    $result   = mysqli_query("SELECT id,lastname,firstname,midname,city FROM personal", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'Province') {

    $result   = mysqli_query("SELECT id,lastname,firstname,midname,province FROM personal", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'Age') {

    $result   = mysqli_query("SELECT id,lastname,firstname,midname,age FROM personal", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'Course') {

    $result1   = mysqli_query("SELECT id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Education (BSEd)'", $connection);
    $num_rows1 = mysqli_num_rows($result1);
    $result2   = mysqli_query("SELECT id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)'", $connection);
    $num_rows2 = mysqli_num_rows($result2);
    $result3   = mysqli_query("SELECT id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Public Administration (BPA)'", $connection);
    $num_rows3 = mysqli_num_rows($result3);
    $result4   = mysqli_query("SELECT id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)'", $connection);
    $num_rows4 = mysqli_num_rows($result4);
    $result5   = mysqli_query("SELECT id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Fisheries (BSFi)'", $connection);
    $num_rows5 = mysqli_num_rows($result5);
    $result6   = mysqli_query("SELECT id,lastname,firstname,midname,course FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)'", $connection);
    $num_rows6 = mysqli_num_rows($result6);

} else if ($selected == 'Male,Female') {

    $resultM   = mysqli_query("SELECT id,lastname,firstname,midname,gender FROM personal where gender = 'Male'", $connection);
    $num_rowsM = mysqli_num_rows($resultM);
    $resultF   = mysqli_query("SELECT id,lastname,firstname,midname,gender FROM personal where gender = 'Female'", $connection);
    $num_rowsF = mysqli_num_rows($resultF);

} else if ($selected == 'Stanine') {

    $result   = mysqli_query("SELECT id,lastname,firstname,midname,stanine FROM personal", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'High School / Year Graduated') {

    $result   = mysqli_query("SELECT distinct p.id,p.lastname,p.firstname,p.midname,s.hs,s.yeargrad FROM personal p, social s where p.id=s.id", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'High School Type') {

    $resultPub   = mysqli_query("SELECT id,lastname,firstname,midname,hs,hstype FROM personal p where hstype = 'Public'", $connection);
    $num_rowsPub = mysqli_num_rows($resultPub);
    $resultPri   = mysqli_query("SELECT id,lastname,firstname,midname,hs,hstype FROM personal p where hstype = 'Private'", $connection);
    $num_rowsPri = mysqli_num_rows($resultPri);

} else if ($selected == 'Ethnic Origin') {

    $resultDavao   = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.ethnic,s.otherethnic FROM personal p, social s where  p.id=s.id and ethnic = 'Davawenyo'", $connection);
    $num_rowsDavao = mysqli_num_rows($resultDavao);
    $resultMus     = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.ethnic,s.otherethnic FROM personal p, social s where  p.id=s.id and ethnic = 'Muslim'", $connection);
    $num_rowsMus   = mysqli_num_rows($resultMus);
    $resultVis     = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.ethnic,s.otherethnic FROM personal p, social s where  p.id=s.id and ethnic = 'Visaya'", $connection);
    $num_rowsVis   = mysqli_num_rows($resultVis);
    $resultTag     = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.ethnic,s.otherethnic FROM personal p, social s where  p.id=s.id and ethnic = 'Tagalog'", $connection);
    $num_rowsTag   = mysqli_num_rows($resultTag);
    $resultOther   = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.ethnic,s.otherethnic FROM personal p, social s where  p.id=s.id and ethnic = 'Others'", $connection);
    $num_rowsOther = mysqli_num_rows($resultOther);

} else if ($selected == 'Home Address') {

    $result   = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.homeAdd FROM personal p, social s where  p.id=s.id", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'Religion') {

    $resultCath    = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.religion,s.otherreligion FROM personal p, social s where  p.id=s.id and religion = 'Catholic'", $connection);
    $num_rowsCath  = mysqli_num_rows($resultCath);
    $resultPro     = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.religion,s.otherreligion FROM personal p, social s where  p.id=s.id and religion = 'Protestant/Evangelical'", $connection);
    $num_rowsPro   = mysqli_num_rows($resultPro);
    $resultIslam   = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.religion,s.otherreligion FROM personal p, social s where  p.id=s.id and religion = 'Muslim/Islam'", $connection);
    $num_rowsIslam = mysqli_num_rows($resultIslam);
    $resultO       = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,s.religion,s.otherreligion FROM personal p, social s where  p.id=s.id and religion = 'Other Christian groups'", $connection);
    $num_rowsO     = mysqli_num_rows($resultO);

} else if ($selected == 'Occupation') {

    $resultGov      = mysqli_query("SELECT s.id,s.father,s.fatherOccup,s.mother,s.motherOccup FROM social s where fatherOccup = 'Government Employee' and motherOccup = 'Government Employee'", $connection);
    $num_rowsGov    = mysqli_num_rows($resultGov);
    $resultPriEmp   = mysqli_query("SELECT s.id,s.father,s.fatherOccup,s.mother,s.motherOccup FROM social s where fatherOccup = 'Private Employee' and motherOccup = 'Private Employee'", $connection);
    $num_rowsPriEmp = mysqli_num_rows($resultPriEmp);
    $resultSelf     = mysqli_query("SELECT s.id,s.father,s.fatherOccup,s.mother,s.motherOccup FROM social s where fatherOccup = 'Business/Self-Employed' and motherOccup = 'Business/Self-Employed'", $connection);
    $num_rowsSelf   = mysqli_num_rows($resultSelf);
    $resultFish     = mysqli_query("SELECT s.id,s.father,s.fatherOccup,s.mother,s.motherOccup FROM social s where fatherOccup = 'Fisherman/Farmer' and motherOccup = 'Fisherman/Farmer'", $connection);
    $num_rowsFish   = mysqli_num_rows($resultFish);
    $resultOFW      = mysqli_query("SELECT s.id,s.father,s.fatherOccup,s.mother,s.motherOccup FROM social s where fatherOccup = 'OFW' and motherOccup = 'OFW'", $connection);
    $num_rowsOFW    = mysqli_num_rows($resultOFW);
    $resultNone     = mysqli_query("SELECT s.id,s.father,s.fatherOccup,s.mother,s.motherOccup FROM social s where fatherOccup = 'NONE' and motherOccup = 'NONE'", $connection);
    $num_rowsNone   = mysqli_num_rows($resultNone);

} else if ($selected == 'Employment Status') {

    $result   = mysqli_query("SELECT s.id,s.father,e.fatherEmploy,s.mother,e.motherEmploy FROM social s, economic e where s.id=e.id", $connection);
    $num_rows = mysqli_num_rows($result);

} else if ($selected == 'Family Monthly Income') {

    $result   = mysqli_query("SELECT p.id,p.lastname,p.firstname,p.midname,e.income FROM personal p, economic e where p.id=e.id", $connection);
    $num_rows = mysqli_num_rows($result);
}
?>


  <?php

$resultIT  = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)'", $connection);
$ITCount   = mysqli_num_rows($resultIT);
$resultIED = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Education (BSEd)'", $connection);
$IEDCount  = mysqli_num_rows($resultIED);
$resultFT  = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)'", $connection);
$FTCount   = mysqli_num_rows($resultFT);
$resultBPA = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)'", $connection);
$BPACount  = mysqli_num_rows($resultBPA);
$resultMB  = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)'", $connection);
$MBCount   = mysqli_num_rows($resultMB);
$resultFI  = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Fisheries (BSFi)'", $connection);
$FICount   = mysqli_num_rows($resultFI);

$resultOneThree  = mysqli_query("SELECT * FROM personal where stanine >= 1 && stanine <= 3", $connection);
$countOneThree   = mysqli_num_rows($resultOneThree);
$resultFourSix   = mysqli_query("SELECT * FROM personal where stanine >= 4 && stanine <= 6", $connection);
$countFourSix    = mysqli_num_rows($resultFourSix);
$resultSevenNine = mysqli_query("SELECT * FROM personal where stanine >= 7 && stanine <= 9", $connection);
$countSevenNine  = mysqli_num_rows($resultSevenNine);

$resultPublic  = mysqli_query("SELECT * FROM personal where hstype = 'Public'", $connection);
$publicCount   = mysqli_num_rows($resultPublic);
$resultPrivate = mysqli_query("SELECT * FROM personal where hstype = 'Private'", $connection);
$privateCount  = mysqli_num_rows($resultPrivate);

$resultCatholic   = mysqli_query("SELECT * FROM social where religion = 'Catholic'", $connection);
$catholicCount    = mysqli_num_rows($resultCatholic);
$resultProtestant = mysqli_query("SELECT * FROM social where religion = 'Protestant/Evangelical'", $connection);
$protestantCount  = mysqli_num_rows($resultProtestant);
$resultMuslim     = mysqli_query("SELECT * FROM social where religion = 'Muslim/Islam'", $connection);
$muslimCount      = mysqli_num_rows($resultMuslim);
$resultOthers     = mysqli_query("SELECT * FROM social where religion = 'Other Christian groups'", $connection);
$othersCount      = mysqli_num_rows($resultOthers);

$resultCatholic2013   = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Catholic' and p.schoolYr = '2013-2014'", $connection);
$catholicCount2013    = mysqli_num_rows($resultCatholic2013);
$resultCatholic2014   = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Catholic' and p.schoolYr = '2014-2015'", $connection);
$catholicCount2014    = mysqli_num_rows($resultCatholic2014);
$resultCatholic2015   = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Catholic' and p.schoolYr = '2015-2016'", $connection);
$catholicCount2015    = mysqli_num_rows($resultCatholic2015);
$resultCatholic2016   = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Catholic' and p.schoolYr = '2016-2017'", $connection);
$catholicCount2016    = mysqli_num_rows($resultCatholic2016);
$resultProtestant2013 = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Protestant' and p.schoolYr = '2013-2014'", $connection);
$ProtestantCount2013  = mysqli_num_rows($resultProtestant2013);
$resultProtestant2014 = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Protestant' and p.schoolYr = '2014-2015'", $connection);
$ProtestantCount2014  = mysqli_num_rows($resultProtestant2014);
$resultProtestant2015 = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Protestant' and p.schoolYr = '2015-2016'", $connection);
$ProtestantCount2015  = mysqli_num_rows($resultProtestant2015);
$resultProtestant2016 = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Protestant' and p.schoolYr = '2016-2017'", $connection);
$ProtestantCount2016  = mysqli_num_rows($resultProtestant2016);
$resultMuslim2013     = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Muslim' and p.schoolYr = '2013-2014'", $connection);
$MuslimCount2013      = mysqli_num_rows($resultMuslim2013);
$resultMuslim2014     = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Muslim' and p.schoolYr = '2014-2015'", $connection);
$MuslimCount2014      = mysqli_num_rows($resultMuslim2014);
$resultMuslim2015     = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Muslim' and p.schoolYr = '2015-2016'", $connection);
$MuslimCount2015      = mysqli_num_rows($resultMuslim2015);
$resultMuslim2016     = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Muslim' and p.schoolYr = '2016-2017'", $connection);
$MuslimCount2016      = mysqli_num_rows($resultMuslim2016);
$resultOther2013      = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Other Christian groups' and p.schoolYr = '2013-2014'", $connection);
$OtherCount2013       = mysqli_num_rows($resultOther2013);
$resultOther2014      = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Other Christian groups' and p.schoolYr = '2014-2015'", $connection);
$OtherCount2014       = mysqli_num_rows($resultOther2014);
$resultOther2015      = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Other Christian groups' and p.schoolYr = '2015-2016'", $connection);
$catholicOther2015    = mysqli_num_rows($resultOther2015);
$resultOther2016      = mysqli_query("SELECT * FROM social s, personal p where s.religion = 'Other Christian groups' and p.schoolYr = '2016-2017'", $connection);
$OtherCount2016       = mysqli_num_rows($resultOther2016);

$resultPriF      = mysqli_query("SELECT * FROM social where fatherOccup = 'Private Employee'", $connection);
$PriCountF       = mysqli_num_rows($resultPriF);
$resultGovF      = mysqli_query("SELECT * FROM social where fatherOccup = 'Government Employee'", $connection);
$govCountF       = mysqli_num_rows($resultGovF);
$resultSelfF     = mysqli_query("SELECT * FROM social where fatherOccup = 'Business/Self-Employed'", $connection);
$SelfCountF      = mysqli_num_rows($resultSelfF);
$resultFishF     = mysqli_query("SELECT * FROM social where fatherOccup = 'Fisherman/Farmer'", $connection);
$fishCountF      = mysqli_num_rows($resultFishF);
$resultOFWF      = mysqli_query("SELECT * FROM social where fatherOccup = 'OFW'", $connection);
$ofwCountF       = mysqli_num_rows($resultOFWF);
$resultNoneF     = mysqli_query("SELECT * FROM social where fatherOccup = 'NONE'", $connection);
$noneCountF      = mysqli_num_rows($resultNoneF);
$resultAllFather = mysqli_query("SELECT * FROM social order by fatherOccup", $connection);
$CountAllFather  = mysqli_num_rows($resultAllFather);

$resultPriM      = mysqli_query("SELECT * FROM social where motherOccup = 'Private Employee'", $connection);
$PriCountM       = mysqli_num_rows($resultPriM);
$resultGovM      = mysqli_query("SELECT * FROM social where motherOccup = 'Government Employee'", $connection);
$govCountM       = mysqli_num_rows($resultGovM);
$resultSelfM     = mysqli_query("SELECT * FROM social where motherOccup = 'Business/Self-Employed'", $connection);
$SelfCountM      = mysqli_num_rows($resultSelfM);
$resultFishM     = mysqli_query("SELECT * FROM social where motherOccup = 'Fisherman/Farmer'", $connection);
$fishCountM      = mysqli_num_rows($resultFishM);
$resultOFWM      = mysqli_query("SELECT * FROM social where motherOccup = 'OFW'", $connection);
$ofwCountM       = mysqli_num_rows($resultOFWM);
$resultNoneM     = mysqli_query("SELECT * FROM social where motherOccup = 'NONE'", $connection);
$noneCountM      = mysqli_num_rows($resultNoneM);
$resultAllMother = mysqli_query("SELECT * FROM social order by motherOccup", $connection);
$CountAllMother  = mysqli_num_rows($resultAllMother);

$resultBSIT2013 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2013-2014'", $connection);
$countBSIT2013  = mysqli_num_rows($resultBSIT2013);
$resultBSIT2014 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2014-2015'", $connection);
$countBSIT2014  = mysqli_num_rows($resultBSIT2014);
$resultBSIT2015 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2015-2016'", $connection);
$countBSIT2015  = mysqli_num_rows($resultBSIT2015);
$resultBSIT2016 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '2016-2017'", $connection);
$countBSIT2016  = mysqli_num_rows($resultBSIT2016);

$resultBSED2013 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2013-2014'", $connection);
$countBSED2013  = mysqli_num_rows($resultBSED2013);
$resultBSED2014 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2014-2015'", $connection);
$countBSED2014  = mysqli_num_rows($resultBSED2014);
$resultBSED2015 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2015-2016'", $connection);
$countBSED2015  = mysqli_num_rows($resultBSED2015);
$resultBSED2016 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Education (BSEd)' and schoolYr = '2016-2017'", $connection);
$countBSED2016  = mysqli_num_rows($resultBSED2016);

$resultBSFT2013 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2013-2014'", $connection);
$countBSFT2013  = mysqli_num_rows($resultBSFT2013);
$resultBSFT2014 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2014-2015'", $connection);
$countBSFT2014  = mysqli_num_rows($resultBSFT2014);
$resultBSFT2015 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2015-2016'", $connection);
$countBSFT2015  = mysqli_num_rows($resultBSFT2015);
$resultBSFT2016 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '2016-2017'", $connection);
$countBSFT2016  = mysqli_num_rows($resultBSFT2016);

$resultBSF2013 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Fisheries (BSFi)' and schoolYr = '2013-2014'", $connection);
$countBSF2013  = mysqli_num_rows($resultBSF2013);
$resultBSF2014 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Fisheries (BSFi)' and schoolYr = '2014-2015'", $connection);
$countBSF2014  = mysqli_num_rows($resultBSF2014);
$resultBSF2015 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Fisheries (BSFi)' and schoolYr = '2015-2016'", $connection);
$countBSF2015  = mysqli_num_rows($resultBSF2015);
$resultBSF2016 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Fisheries (BSFi)' and schoolYr = '2016-2017'", $connection);
$countBSF2016  = mysqli_num_rows($resultBSF2016);

$resultBPA2013 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2013-2014'", $connection);
$countBPA2013  = mysqli_num_rows($resultBPA2013);
$resultBPA2014 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2014-2015'", $connection);
$countBPA2014  = mysqli_num_rows($resultBPA2014);
$resultBPA2015 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2015-2016'", $connection);
$countBPA2015  = mysqli_num_rows($resultBPA2015);
$resultBPA2016 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '2016-2017'", $connection);
$countBPA2016  = mysqli_num_rows($resultBPA2016);

$resultBSMB2013 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2013-2014'", $connection);
$countBSMB2013  = mysqli_num_rows($resultBSMB2013);
$resultBSMB2014 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2014-2015'", $connection);
$countBSMB2014  = mysqli_num_rows($resultBSMB2014);
$resultBSMB2015 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2015-2016'", $connection);
$countBSMB2015  = mysqli_num_rows($resultBSMB2015);
$resultBSMB2016 = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '2016-2017'", $connection);
$countBSMB2016  = mysqli_num_rows($resultBSMB2016);
?>


  <br><br>
  <a href = "socio_tbl.php" style="text-decoartion: none;"><input type = "button" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: left;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="< Back" /></a>
  <input type = "button" id="btnPrint" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" />

  <div id="dvContainer">
  <script src="canvasjs.min.js"></script>
  <script type="text/javascript">
    window.onload = function ()
    {
<?php
if ($selected == 'Male,Female') {
    ?>
    var chart = new CanvasJS.Chart("chartContainer", {
      theme: "theme2",//theme1
      title:{
        text: "MALE: <?php echo $maleCount; ?>  •  FEMALE: <?php echo $femaleCount; ?>"
      },
      animationEnabled: false,   // change to true
      data: [
      {
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "pie",
        dataPoints: [
          { label: "MALE",  y: <?php echo $maleCount; ?> },
          { label: "FEMALE", y: <?php echo $femaleCount; ?>  },

        ]
      }
      ]
    });
    chart.render();
  <?php
}
?>
  <?php
if ($selected == 'Course') {
    ?>
    var chart2 = new CanvasJS.Chart("chartContainer2", {
      theme: "theme2",//theme1
      title:{
        text: "BSIT: <?php echo $ITCount; ?>  •  BSEd: <?php echo $IEDCount; ?>  •  BSFT: <?php echo $FTCount; ?>  •  BPA: <?php echo $BPACount; ?>  •  BSMB: <?php echo $MBCount; ?>  •  BSFi: <?php echo $FICount; ?>"
      },
      animationEnabled: false,   // change to true
      data: [
      {
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "pie",
        dataPoints: [
          { label: "BSIT",  y: <?php echo $ITCount; ?>  },
          { label: "BSEd", y: <?php echo $IEDCount; ?>  },
          { label: "BSFT", y: <?php echo $FTCount; ?>  },
          { label: "BPA", y: <?php echo $BPACount; ?>  },
          { label: "BSMB", y: <?php echo $MBCount; ?>  },
          { label: "BSFi", y: <?php echo $FICount; ?>  },

        ]
      }
      ]
    });
    chart2.render();
  <?php
}
?>
  <?php
if ($selected == 'Stanine') {
    ?>
    var chart3 = new CanvasJS.Chart("chartContainer3", {
      theme: "theme2",//theme1
      categories:[2006,2007,2008,2009,2010,2011,2012,2013,2014,2015],
      title:{
        text: "1-3 (Low): <?php echo $countOneThree; ?>  •  4-7 (Moderate): <?php echo $countFourSix; ?>  •  7-9 (High): <?php echo $countSevenNine; ?>"
      },
      animationEnabled: false,   // change to true

      data: [
      {
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "column",
        dataPoints: [
          { label: "1-3 (Low)",  y: <?php echo $countOneThree; ?>  },
          { label: "4-6 (Moderate)", y: <?php echo $countFourSix; ?> },
          { label: "7-9 (High)", y: <?php echo $countSevenNine; ?> },
        ]
      }
      ]
    });
    chart3.render();
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
if ($selected == 'Religion') {
    ?>
    var chart5 = new CanvasJS.Chart("chartContainer5", {
      theme: "theme2",//theme1
      title:{
        text: "Catholic: <?php echo $catholicCount; ?>  •  Protestant/Evangelical: <?php echo $protestantCount; ?>  •  Muslim/Islam: <?php echo $muslimCount; ?>  •  Others: <?php echo $othersCount; ?>"
      },
      animationEnabled: false,   // change to true
      data: [
      {
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "pie",
        dataPoints: [
          { label: "Catholic",  y: <?php echo $catholicCount; ?>  },
          { label: "Protestant/Evangelical", y: <?php echo $protestantCount; ?> },
          { label: "Muslim/Islam", y: <?php echo $muslimCount; ?> },
          { label: "Others", y: <?php echo $othersCount; ?> },
        ]
      }
      ]
    });
    chart5.render();
  <?php
}
?>
  <?php
if ($selected == 'Ethnic Origin') {
    ?>
    var chart6 = new CanvasJS.Chart("chartContainer6", {
      theme: "theme2",//theme1
      title:{
        text: "Davawenyo: <?php echo $num_rowsDavao; ?>  •  Muslim: <?php echo $num_rowsMus; ?>  •  Visaya: <?php echo $num_rowsVis; ?>  •  Tagalog: <?php echo $num_rowsTag; ?> • Others: <?php echo $num_rowsOther; ?>"
      },
      animationEnabled: false,   // change to true
      data: [
      {
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "pie",
        dataPoints: [
          { label: "Davawenyo",  y: <?php echo $num_rowsDavao; ?>  },
          { label: "Muslim", y: <?php echo $num_rowsMus; ?> },
          { label: "Visaya", y: <?php echo $num_rowsVis; ?> },
          { label: "Tagalog", y: <?php echo $num_rowsTag; ?> },
          { label: "Others", y: <?php echo $num_rowsOther; ?> },
        ]
      }
      ]
    });
    chart6.render();
  <?php
}
?>
  <?php
if ($selected == 'Occupation') {
    $gov     = $govCountM + $govCountF;
    $private = $PriCountM + $PriCountF;
    $self    = $SelfCountM + $SelfCountF;
    $fisher  = $fishCountM + $fishCountF;
    $ofw     = $ofwCountM + $ofwCountF;
    $none    = $noneCountM + $noneCountF;
    ?>
    var chart7 = new CanvasJS.Chart("chartContainer7", {
      theme: "theme2",//theme1
      title:{
        text: "Government Employee: <?php echo $gov; ?>  •  Private Employee: <?php echo $private; ?>  •  Business/Self-Employed: <?php echo $self; ?>  •  Fisherman/Farmer: <?php echo $fisher; ?> • OFW: <?php echo $ofw; ?>  •  NONE: <?php echo $none; ?>"
      },
      animationEnabled: false,   // change to true
      data: [
      {
        // Change type to "bar", "area", "spline", "pie",etc.
        type: "pie",
        dataPoints: [
          { label: "Government Employee",  y: <?php echo $govCountM + $govCountF; ?>  },
          { label: "Private Employee", y: <?php echo $PriCountM + $PriCountF; ?> },
          { label: "Business/Self-Employed", y: <?php echo $SelfCountM + $SelfCountF; ?> },
          { label: "Fisherman/Farmer", y: <?php echo $fishCountM + $fishCountF; ?> },
          { label: "OFW", y: <?php echo $ofwCountM + $ofwCountF; ?> },
          { label: "NONE", y: <?php echo $noneCountM + $noneCountF; ?> },

        ]
      }
      ]
    });
    chart7.render();
  <?php
}
?>
}
</script>
<?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa') {
    ?>
<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF FRESHMEN BY COURSE FROM S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSIT', 'BSEd', 'BSFT', 'BPA', 'BSMB'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $countBSIT2013; ?>, <?php echo $countBSED2013; ?>, <?php echo $countBSFT2013; ?>, <?php echo $countBPA2013; ?>, <?php echo $countBSMB2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $countBSIT2014; ?>, <?php echo $countBSED2014; ?>, <?php echo $countBSFT2014; ?>, <?php echo $countBPA2014; ?>, <?php echo $countBSMB2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $countBSIT2015; ?>, <?php echo $countBSED2015; ?>, <?php echo $countBSFT2015; ?>, <?php echo $countBPA2015; ?>, <?php echo $countBSMB2015; ?>]
        }, {
            name: 'School Year 2016-2017',
            data: [<?php echo $countBSIT2016; ?>, <?php echo $countBSED2016; ?>, <?php echo $countBSFT2016; ?>, <?php echo $countBPA2016; ?>, <?php echo $countBSMB2016; ?>]
        }]
    });
});
    </script>
  <?php
}
?>

  <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF FRESHMEN BY RELIGION FROM S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['Catholic', 'Protestant/Evangelical', 'Muslim/Islam', 'Others'],
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
            name: 'School Year 2013-2014',
            data: [20, 30, 40, 50]
        }, {
            name: 'School Year 2014-2015',
            data: [20, 30, 40, 50]
        }, {
            name: 'School Year 2015-2016',
            data: [20, 30, 40, 50]
        }, {
            name: 'School Year 2016-2017',
            data: [<?php echo $catholicCount2016; ?>, <?php echo $ProtestantCount2016; ?>, <?php echo $MuslimCount2016; ?>, <?php echo $OtherCount2016; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Male,Female") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container3').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF FRESHMEN BY GENDER FROM S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['Male', 'Female'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rowsMale2013; ?>, <?php echo $num_rowsFemale2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rowsMale2014; ?>, <?php echo $num_rowsFemale2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rowsMale2015; ?>, <?php echo $num_rowsFemale2015; ?>]
        }, {
            name: 'School Year 2016-2017',
            data: [<?php echo $num_rowsMale2016; ?>, <?php echo $num_rowsFemale2016; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2013-2014,2014-2015,bsit") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container4').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSIT FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2014-2015'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSIT'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
    <?php
if ($selected == "2013-2014,2014-2015,bsed") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container5').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSED FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2014-2015'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSEd'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsit") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container6').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSIT FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2015-2016'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSIT'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsmb") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container10').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSMB FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2015-2016'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSMB'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsed") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container7').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSED FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2015-2016'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSEd'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsft") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container8').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSFT FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2015-2016'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSEd'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsft") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container9').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSFT FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSFT'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }, {
            name: 'School Year 2016-2017',
            data: [<?php echo $num_rows2016; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsmb") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container11').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BSFT FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSMB'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }, {
            name: 'School Year 2016-2017',
            data: [<?php echo $num_rows2016; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bpa") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container12').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'LIST OF BPA FRESHMEN FROM S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BPA'],
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
            name: 'School Year 2013-2014',
            data: [<?php echo $num_rows2013; ?>]
        }, {
            name: 'School Year 2014-2015',
            data: [<?php echo $num_rows2014; ?>]
        }, {
            name: 'School Year 2015-2016',
            data: [<?php echo $num_rows2015; ?>]
        }, {
            name: 'School Year 2016-2017',
            data: [<?php echo $num_rows2016; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2013-2014,Male,Female") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container13').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'SUMMARY OF GENDER IN S.Y. 2013-2014'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2013-2014'],
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
            name: 'Male',
            data: [<?php echo $num_rowsMale; ?>]
        }, {
            name: 'Female',
            data: [<?php echo $num_rowsFemale; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2014-2015,Male,Female") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container14').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'SUMMARY OF GENDER IN S.Y. 2014-2015'
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
            name: 'Male',
            data: [<?php echo $num_rowsMale; ?>]
        }, {
            name: 'Female',
            data: [<?php echo $num_rowsFemale; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2015-2016,Male,Female") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container15').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'SUMMARY OF GENDER IN S.Y. 2015-2016'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2015-2016'],
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
            name: 'Male',
            data: [<?php echo $num_rowsMale; ?>]
        }, {
            name: 'Female',
            data: [<?php echo $num_rowsFemale; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <?php
if ($selected == "2016-2017,Male,Female") {
    ?>
<script type="text/javascript">
$(function () {
    $('#container16').highcharts({
        chart: {
            type: 'bar'
        },
        title: {
            text: 'SUMMARY OF GENDER IN S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2016-2017'],
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
            name: 'Male',
            data: [<?php echo $num_rowsMale; ?>]
        }, {
            name: 'Female',
            data: [<?php echo $num_rowsFemale; ?>]
        }]
    });
});
    </script>
  <?php
}
?>
  <center><br><br><br><br>
  <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Male,Female") {
    ?>
<div id="container3" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,bsit") {
    ?>
<div id="container4" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsit") {
    ?>
<div id="container6" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsmb") {
    ?>
<div id="container10" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsmb") {
    ?>
<div id="container11" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bpa") {
    ?>
<div id="container12" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,Male,Female") {
    ?>
<div id="container13" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}
if ($selected == "2014-2015,Male,Female") {
    ?>
<div id="container14" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}
if ($selected == "2015-2016,Male,Female") {
    ?>
<div id="container15" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}
if ($selected == "2016-2017,Male,Female") {
    ?>
<div id="container16" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsed") {
    ?>
<div id="container7" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,bsft") {
    ?>
<div id="container8" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,bsft") {
    ?>
<div id="container9" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,bsed") {
    ?>
<div id="container5" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == 'Male,Female') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer" style="height: 250px; width: 50%;"></div><br><br><br>
  <?php
}

if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa') {
    ?>
<div id="container" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {
    ?>
<div id="container2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
 <br><br><br>
  <?php
}

if ($selected == 'Course') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer2" style="height: 250px; width: 50%;"></div><br><br><br></center>
  <?php
}

if ($selected == 'Stanine') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer3" style="height: 250px; width: 50%;"></div>
  <br><br><br></center>
  <?php
}

if ($selected == 'High School Type') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer4" style="height: 250px; width: 50%;"></div><br><br><br></center>
  <?php
}

if ($selected == 'Religion') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer5" style="height: 250px; width: 50%;"></div><br><br><br></center>
  <?php
}

if ($selected == 'Ethnic Origin') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer6" style="height: 250px; width: 50%;"></div><br><br><br>
  <?php
}

if ($selected == 'Occupation') {
    ?>
  <h1 style="font-family: Century Gothic; color: black;">LIST OF PARENTS By <?php echo $selected; ?></h1>
  <br><center>
  <div id="chartContainer7" style="height: 250px; width: 50%;"></div><br><br><br>
  <?php
}
?>
   <tr>
      <?php
if ($selected == 'Barangay') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Barangay</th>
        <!--<th>Action</th>-->
      <?php
}
?>

<?php
if ($selected == "2013-2014,2014-2015,bsit") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
      <?php
}
?>

<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsit") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
        <h2>S.Y. 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsmb") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
        <h2>S.Y. 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsed") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
        <h2>S.Y. 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,2015-2016,bsft") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
        <h2>S.Y. 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h1>
      <?php
}
?>

<?php
if ($selected == "2013-2014,2014-2015,bsed") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,bsft") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,bsmb") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,2014-2015,bpa") {
    ?>
        <h2>S.Y. 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h1>
        <h2>S.Y. 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsit") {
    ?>
        <h2>LIST OF BSIT IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bpa") {
    ?>
        <h2>LIST OF BPA IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2013-2014,Male,Female") {
    ?>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultMale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultMale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Male): <?php echo $num_rowsMale; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFemale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFemale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Female): <?php echo $num_rowsFemale; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2014-2015,Male,Female") {
    ?>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultMale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultMale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Male): <?php echo $num_rowsMale; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFemale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFemale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Female): <?php echo $num_rowsFemale; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2015-2016,Male,Female") {
    ?>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultMale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultMale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Male): <?php echo $num_rowsMale; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFemale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFemale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Female): <?php echo $num_rowsFemale; ?></h1>
      <?php
}
?>
<?php
if ($selected == "2016-2017,Male,Female") {
    ?>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultMale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultMale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Male): <?php echo $num_rowsMale; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFemale) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFemale)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL (Female): <?php echo $num_rowsFemale; ?></h1>
      <?php
}
?>

      <?php
if ($selected == "2013-2014,bsit") {
    ?>

        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsed") {
    ?>
        <h2>LIST OF BSED IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsft") {
    ?>
        <h2>LIST OF BSFT IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsmb") {
    ?>
        <h2>LIST OF BSMB IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bpa") {
    ?>
        <h2>LIST OF BPA IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>


<?php
if ($selected == "2014-2015,bsit") {
    ?>
        <h2>LIST OF BSIT IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2014-2015,bsed") {
    ?>
        <h2>LIST OF BSED IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2014-2015,bsft") {
    ?>
        <h2>LIST OF BSFT IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2014-2015,bsmb") {
    ?>
        <h2>LIST OF BSMB IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2014-2015,bpa") {
    ?>
        <h2>LIST OF BPA IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>

<?php
if ($selected == "2015-2016,bsit") {
    ?>
        <h2>LIST OF BSIT IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2015-2016,bsed") {
    ?>
        <h2>LIST OF BSED IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2015-2016,bsft") {
    ?>
        <h2>LIST OF BSFT IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>
      <?php
if ($selected == "2015-2016,bsmb") {
    ?>
        <h2>LIST OF BSMB IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2015-2016,bpa") {
    ?>
        <h2>LIST OF BPA IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>

<?php
if ($selected == "2013-2017,bsit") {
    ?>
        <h2>LIST OF BSIT IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2016-2017,bsed") {
    ?>
        <h2>LIST OF BSED IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2016-2017,bsft") {
    ?>
        <h2>LIST OF BSFT IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2016-2017,bsmb") {
    ?>
        <h2>LIST OF BSMB IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2016-2017,bpa") {
    ?>
        <h2>LIST OF BPA IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>

<?php
if ($selected == "2013-2014,bsit,Male") {
    ?>
        <h2>LIST OF BSIT FRESHMEN IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsit,Male") {
    ?>
        <h2>LIST OF BSIT FRESHMEN IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsit,Male") {
    ?>
        <h2>LIST OF BSIT FRESHMEN IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsit,Male") {
    ?>
        <h2>LIST OF BSIT FRESHMEN IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsed,Male") {
    ?>
        <h2>LIST OF BSED FRESHMEN IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsed,Male") {
    ?>
        <h2>LIST OF BSED FRESHMEN IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsed,Male") {
    ?>
        <h2>LIST OF BSED FRESHMEN IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsed,Male") {
    ?>
        <h2>LIST OF BSED FRESHMEN IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsft,Male") {
    ?>
        <h2>LIST OF BSFT FRESHMEN IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsft,Male") {
    ?>
        <h2>LIST OF BSFT FRESHMEN IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsft,Male") {
    ?>
        <h2>LIST OF BSFT FRESHMEN IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsft,Male") {
    ?>
        <h2>LIST OF BSFT FRESHMEN IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsmb,Male") {
    ?>
        <h2>LIST OF BSMB FRESHMEN IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsmb,Male") {
    ?>
        <h2>LIST OF BSMB FRESHMEN IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsmb,Male") {
    ?>
        <h2>LIST OF BSMB FRESHMEN IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsmb,Male") {
    ?>
        <h2>LIST OF BSMB FRESHMEN IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bpa,Male") {
    ?>
        <h2>LIST OF BPA IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bpa,Male") {
    ?>
        <h2>LIST OF BPA IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bpa,Male") {
    ?>
        <h2>LIST OF BPA IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bpa,Male") {
    ?>
        <h2>LIST OF BPA IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>

<?php
if ($selected == "2013-2014,bsit,Female") {
    ?>
        <h2>LIST OF BSIT IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsit,Female") {
    ?>
        <h2>LIST OF BSIT IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsit,Female") {
    ?>
        <h2>LIST OF BSIT IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsit,Female") {
    ?>
        <h2>LIST OF BSIT IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsed,Female") {
    ?>
        <h2>LIST OF BSED IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsed,Female") {
    ?>
        <h2>LIST OF BSED IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsed,Female") {
    ?>
        <h2>LIST OF BSED IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsed,Female") {
    ?>
        <h2>LIST OF BSED IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsft,Female") {
    ?>
        <h2>LIST OF BSFT IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsft,Female") {
    ?>
        <h2>LIST OF BSFT IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsft,Female") {
    ?>
        <h2>LIST OF BSFT IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsft,Female") {
    ?>
        <h2>LIST OF BSFT IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bsmb,Female") {
    ?>
        <h2>LIST OF BSMB FRESHMEN IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bsmb,Female") {
    ?>
        <h2>LIST OF BSMB IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bsmb,Female") {
    ?>
        <h2>LIST OF BSMB IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bsmb,Female") {
    ?>
        <h2>LIST OF BSMB IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,bpa,Female") {
    ?>
        <h2>LIST OF BPA IN 2013-2014</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2014-2015,bpa,Female") {
    ?>
        <h2>LIST OF BPA IN 2014-2015</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2015-2016,bpa,Female") {
    ?>
        <h2>LIST OF BPA IN 2015-2016</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
<?php
if ($selected == "2016-2017,bpa,Female") {
    ?>
        <h2>LIST OF BPA IN 2016-2017</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>School Year</th>
        <!--<th>Action</th>-->
        <?php
if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['schoolYr']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h5>
      <?php
}
?>
      <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Male,Female") {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFM2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFM2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['gender']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h2 style="color: black;">Male: <?php echo $num_rowsMale2013; ?> • Female: <?php echo $num_rowsFemale2013; ?></h2><br><br>
        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFM2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFM2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['gender']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h2 style="color: black;">Male: <?php echo $num_rowsMale2014; ?> • Female: <?php echo $num_rowsFemale2014; ?></h2><br><br>
        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFM2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFM2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['gender']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h2 style="color: black;">Male: <?php echo $num_rowsMale2015; ?> • Female: <?php echo $num_rowsFemale2015; ?></h2><br><br>
        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultFM2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFM2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['gender']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h2 style="color: black;">Male: <?php echo $num_rowsMale2016; ?> • Female: <?php echo $num_rowsFemale2016; ?></h2><br><br>
      <?php
}
?>

      <?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit') {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h5><br><br>
      <?php
}
?>
<?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsmb') {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h5><br><br>
      <?php
}
?>

<?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bpa') {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h5><br><br>
      <?php
}
?>

      <?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsed') {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>
        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>
        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h5><br><br>
      <?php
}
?>
<?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsft') {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>
        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>
        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h5><br><br>

        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h5><br><br>
      <?php
}
?>

      <?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa') {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>
      <?php
}
?>

            <?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa') {
    ?>
        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>
      <?php
}
?>

            <?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa') {
    ?>
        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h5><br><br>
      <?php
}
?>

            <?php
if ($selected == '2013-2014,2014-2015,2015-2016,2016-2017,bsit,bsed,bsft,bsmb,bpa') {
    ?>
        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h5><br><br>
      <?php
}
?>

      <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {
    ?>
        <h1 style="color: black;">S.Y. 2013-2014</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2013) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2013)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2013; ?></h5><br><br>
      <?php
}
?>

            <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {
    ?>
        <h1 style="color: black;">S.Y. 2014-2015</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2014) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2014)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2014; ?></h5><br><br>
      <?php
}
?>

            <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {
    ?>
        <h1 style="color: black;">S.Y. 2015-2016</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2015) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2015)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h2 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2015; ?></h2><br><br>
      <?php
}
?>

            <?php
if ($selected == "2013-2014,2014-2015,2015-2016,2016-2017,Catholic,Protestant/Evangelical,Muslim/Islam,Other Christian groups") {
    ?>
        <h1 style="color: black;">S.Y. 2016-2017</h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->
        <?php
if (!$result2016) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2016)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h2 style="color: black;">OVERALL TOTAL: <?php echo $num_rows2016; ?></h2><br><br>
      <?php
}
?>

      <?php
if ($selected == 'Ethnic Origin,Religion') {
    ?>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Ethnic Origin</th>
        <th>Religion</th>
        <th>Other religion</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultER) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultER)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['ethnic']}</td>";
        echo "<td>{$row['religion']}</td>";
        echo "<td>{$row['otherreligion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>

      <?php
if ($selected == 'Course,Gender,Stanine') {
    ?>
        <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Gender</th>
        <th>Stanine</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultCGS) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultCGS)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['gender']}</td>";
        echo "<td>{$row['stanine']}</td>";

        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>

      <?php
if ($selected == 'Course,Stanine') {
    ?>
        <h1 style="font-family: Century Gothic; color: black;">LIST OF FRESHMEN By <?php echo $selected; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <th>Stanine</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultCS) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultCS)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        echo "<td>{$row['stanine']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>

      <?php
if ($selected == 'Occupation,Family Monthly Income') {
    ?>
         <h1 style="font-family: Century Gothic; color: black;">LIST OF PARENTS By <?php echo $selected; ?></h1>
        <table class="rwd-table">
        <th>ID</th>
        <th>Father's Name</th>
        <th>Father's Occupation</th>
        <th>Mother's Name</th>
        <th>Mother's Occupation</th>
        <th>Family Monthly Income</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultOFMI) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultOFMI)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['father']}</td>";
        echo "<td>{$row['fatherOccup']}</td>";
        echo "<td>{$row['mother']}</td>";
        echo "<td>{$row['motherOccup']}</td>";
        echo "<td>{$row['income']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rows; ?></h1>
      <?php
}
?>

      <?php
if ($selected == 'City/Municipality') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>City/Municipality</th>
        <!--<th>Action</th>-->
      <?php
}
?>

       <?php
if ($selected == 'Province') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Province</th>
        <!--<th>Action</th>-->
      <?php
}
?>

       <?php
if ($selected == 'Age') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Age</th>
        <!--<th>Action</th>-->
      <?php
}
?>

       <?php
if ($selected == 'Course') {
    ?>
        <table class="rwd-table">

        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <!--<th>Action</th>-->

      <?php
if (!$result1) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result1)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h5>Bachelor of Science in Education (Total <?php echo $num_rows1; ?>)</h5><br>
        <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <?php
if (!$result2) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result2)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
          </table>
          <h5>Bachelor of Science in Food Technology (Total <?php echo $num_rows2; ?>)</h5><br>
          <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <?php
if (!$result3) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result3)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
          </table>
          <h5>Bachelor of Public Administration (Total <?php echo $num_rows3; ?>)</h5><br>
          <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <?php
if (!$result4) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result4)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
          </table>
          <h5>Bachelor of Science in Information Technology (Total <?php echo $num_rows4; ?>)</h5><br>
          <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <?php
if (!$result5) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result5)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
          </table>
          <h5>Bachelor of Science in Fisheries (Total <?php echo $num_rows5; ?>)</h5><br>
          <table class="rwd-table">
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Course</th>
        <?php
if (!$result6) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result6)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['course']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
      </table>
      <h5>Bachelor of Science in Marine Biology (Total <?php echo $num_rows6; ?>)</h5>
      <?php
}
?>
       <?php
if ($selected == 'Male,Female') {
    ?>
        <table class="rwd-table">
        <h5>MALE (Total: <?php echo $num_rowsM; ?>)</h5>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultM) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultM)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['gender']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h5>FEMALE (Total: <?php echo $num_rowsF; ?>)</h5>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Gender</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultF) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultF)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['gender']}</td>";
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
if ($selected == 'Stanine') {
    ?>
        <table class="rwd-table">
        <h2>1 - 3 (Low) (Total: <?php echo $countOneThree; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Stanine</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultOneThree) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultOneThree)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['stanine']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h2>4 - 6 (Moderate) (Total: <?php echo $countFourSix; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Stanine</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultFourSix) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultFourSix)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['stanine']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h2>7 - 9 (High) (Total: <?php echo $countSevenNine; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Stanine</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultSevenNine) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultSevenNine)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['stanine']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
      <?php
}
?>
      <?php
if ($selected == 'High School / Year Graduated') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>High School</th>
        <th>Year Graduated</th>
        <!--<th>Action</th>-->
      <?php
}
?>
      <?php
if ($selected == 'High School Type') {
    ?>
        <table class="rwd-table">
        <h2>Public (Total: <?php echo $publicCount; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>School</th>
        <th>High School Type</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultPub) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultPub)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['hs']}</td>";
        echo "<td>{$row['hstype']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h2>Private (Total: <?php echo $privateCount; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>School</th>
        <th>High School Type</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultPri) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultPri)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['hs']}</td>";
        echo "<td>{$row['hstype']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
      <?php
}
?>
      <?php
if ($selected == 'Ethnic Origin') {
    ?>
          <table class="rwd-table">
        <h2>Davawenyo (Total: <?php echo $num_rowsDavao; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Ethnic Origin</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultDavao) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultDavao)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['ethnic']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <br>
           <table class="rwd-table">
        <h2>Muslim (Total: <?php echo $num_rowsMus; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Ethnic Origin</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultMus) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultMus)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['ethnic']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
           <table class="rwd-table">
        <h2>Visaya (Total: <?php echo $num_rowsVis; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Ethnic Origin</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultVis) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultVis)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['ethnic']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
           <table class="rwd-table">
        <h2>Tagalog (Total: <?php echo $num_rowsTag; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Ethnic Origin</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultTag) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultTag)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['ethnic']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
           <table class="rwd-table">
        <h2>Others (Total: <?php echo $num_rowsOther; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Ethnic Origin</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultOther) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultOther)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['otherethnic']} (Others)</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $num_rowsDavao + $num_rowsMus + $num_rowsVis + $num_rowsTag + $num_rowsOther; ?></h1>
        <br>
      <?php
}
?>
      <?php
if ($selected == 'Home Address') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Home Address</th>
        <!--<th>Action</th>-->
      <?php
}
?>
    <?php
if ($selected == 'Religion') {
    ?>
        <table class="rwd-table">
        <h2>Catholic (Total: <?php echo $num_rowsCath; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultCath) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultCath)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h2>Protestant/Evangelical (Total: <?php echo $num_rowsPro; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultPro) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultPro)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h2>Muslim/Islam (Total: <?php echo $num_rowsIslam; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultIslam) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultIslam)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>
        <table class="rwd-table">
        <h2>Others (Total: <?php echo $num_rowsO; ?>)</h2>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Religion</th>
        <!--<th>Action</th>-->

      <?php
if (!$resultO) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultO)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['religion']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table><br>

      <?php
}
?>
       <?php
if ($selected == 'Occupation') {
    ?>
        <h2>Father's Occupation</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Father's Name</th>
        <th>Father's Occupation</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultAllFather) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($resultAllFather)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['father']}</td>";
        echo "<td>{$row['fatherOccup']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table>
        </center>
        <h5>Government Employee: (Total <?php echo $govCountF; ?>)<br>Private Employee: (Total <?php echo $PriCountF; ?>)<br>Business/Self-Employed: (Total <?php echo $SelfCountF; ?>)<br>Fisherman/Farmer: (Total <?php echo $fishCountF; ?>)<br>OFW: (Total <?php echo $ofwCountF; ?>)<br>NONE: (Total <?php echo $noneCountF; ?>)<br>Father Overall Total: <?php echo $govCountF + $PriCountF + $SelfCountF + $fishCountF + $ofwCountF + $noneCountF; ?></h5>
        <center>
        <br>
        <h2>Mother's Occupation</h2>
        <table class="rwd-table">
        <th>ID</th>
        <th>Mother's Name</th>
        <th>Mother's Occupation</th>
        <!--<th>Action</th>-->
        <?php
if (!$resultAllMother) {
        die("Database query failed: " . mysqli_error());
    }
    while ($row = mysqli_fetch_array($resultAllMother)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['mother']}</td>";
        echo "<td>{$row['motherOccup']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
    ?>
        </table></center>
      <h5>Government Employee: (Total <?php echo $govCountM; ?>)<br>Private Employee: (Total <?php echo $PriCountM; ?>)<br>Business/Self-Employed: (Total <?php echo $SelfCountM; ?>)<br>Fisherman/Farmer: (Total <?php echo $fishCountM; ?>)<br>OFW: (Total <?php echo $ofwCountM; ?>)<br>NONE: (Total <?php echo $noneCountM; ?>)<br>Mother Overall Total: <?php echo $govCountM + $PriCountM + $SelfCountM + $fishCountM + $ofwCountM + $noneCountM; ?></h5>
        <br>
        <center>
        <h1 style="color: black;">OVERALL TOTAL: <?php echo $govCountM + $PriCountM + $SelfCountM + $fishCountM + $ofwCountM + $noneCountM + $govCountF + $PriCountF + $SelfCountF + $fishCountF + $ofwCountF + $noneCountF; ?></h1>
      <?php
}
?>
      <center>
       <?php
if ($selected == 'Employment Status') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Father's Employment Status</th>
        <th>Mother's Employment Status</th>
        <!--<th>Action</th>-->
      <?php
}
?>
       <?php
if ($selected == 'Family Monthly Income') {
    ?>
        <th>ID</th>
        <th>Last Name</th>
        <th>Given Name</th>
        <th>Middle Name</th>
        <th>Monthly Income</th>
        <!--<th>Action</th>-->
      <?php
}
?>

    </tr>



   <?php
if ($selected == 'Barangay') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['brgy']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'City/Municipality') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['city']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'Province') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['province']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'Age') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['age']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'High School / Year Graduated') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['hs']}</td>";
        echo "<td>{$row['yeargrad']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'Home Address') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['homeAdd']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'Employment Status') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['fatherEmploy']}</td>";
        echo "<td>{$row['motherEmploy']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
} else if ($selected == 'Family Monthly Income') {
    if (!$result) {
        die("Database query failed: " . mysqli_error());
    }

    while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td>{$row['lastname']}</td>";
        echo "<td>{$row['firstname']}</td>";
        echo "<td>{$row['midname']}</td>";
        echo "<td>{$row['income']}</td>";
        //echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
        echo "</tr>";
    }
}

?>


  </center>

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

          <script src="assets/bootstrap/js/bootstrap.min.js"></script>
          <script src="assets/js/jquery.backstretch.min.js"></script>
          <script src="assets/js/retina-1.1.0.min.js"></script>
          <script src="assets/js/scripts.js"></script>

          <!--[if lt IE 10]>
              <script src="assets/js/placeholder.js"></script>
          <![endif]-->
  </body>
  </html>