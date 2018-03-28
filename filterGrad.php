<?php

ini_set('error_reporting', 'E_ALL & ~E_NOTICE & ~E_STRICT & ~E_DEPRECATED');
ini_set('display_errors', 'On');

include 'sessionGrad.php';

if (!(isset($_SESSION['login_grad']) && $_SESSION['login_grad'] != '')) {
    header("Location: graduatesLogin.php");
}
?>

<?php
$name = "Jemuel Orenio";
?>
<?php
$valuesCatholic    = array();
$valuesChristian   = array();
$valuesMuslim      = array();
$valuesEvangelical = array();
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
          <!--[endif]-->

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
    .filterGroup {
        border: 1px dotted #333;
        padding: 10px;
        margin-bottom: 8px;
        display: block;
        float: left;
    }
    .filterGroup h5{
        font-size: 14px;
        font-weight: 600;
        margin-bottom: 6px;
    }
    .filterGroup .fltTitle {
        width: 90px;
        display: inline-block;
    }
    .filterGroup span.fltvalue {
        text-transform: capitalize;
    }
  </style>
<?php
if (isset($_POST['summary'])) {
    ?>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th {
    height: 50px;
}
</style>
<?php
}
?>
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
    <div id="body">

  <div class="content">
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
$db_select = mysqli_select_db($connection, "tryit");
if (!$db_select) {
    die("Database selection failed: " . mysqli_error());
}

?>


<?php
$from       = $_POST['from'];
$to         = $_POST['to'];
$work       = $_POST['work'];
$course     = $_POST['course'];
$country    = $_POST['country'];
$job        = $_POST['job'];
$salary     = $_POST['salary'];
$empStatus  = $_POST['empStatus'];
$courseHead = array(
    "BSIT" => "BSIT",
    "BSEd" => "BSED",
    "BSFT" => "BSFT",
    "BSMB" => "BSMB",
    "BPA"  => "BPA",
);
//-------------------  Query Generation ---------------------//

//------------------- Important Information Arrays -----------------//
$filter  = array();
$scYear  = array();
$totBSIT = array();
$totBSED = array();
$totBSFT = array();
$totBSMB = array();
$totBPA  = array();
$totCORZ = array();
$txtHead = "";
//------------------- Important Information Arrays -----------------//

if ($from != "From:" && $to != "To:") {
    $genquery          = "SELECT * FROM geninfo INNER JOIN education ON geninfo.username = education.username INNER JOIN training ON training.username = geninfo.username INNER JOIN employdata ON employdata.username = geninfo.username WHERE geninfo.username<>''";
    $filter["Course:"] = $course;

    if ($work == "Select below:" || $work == "") {
        $genquery = $genquery . "";
    } else if ($work == "all") {
        $genquery = $genquery . " and employdata.workNature<>''";
    } else {
        $genquery = $genquery . " and employdata.workNature LIKE '%" . $work . "%'";
    }

    if ($job == "Select below:" || $job == "") {
        $genquery = $genquery . "";
    } else if ($job == "all") {
        $genquery = $genquery . " and employdata.firstJobTake<>''";
    } else {
        $genquery = $genquery . " and employdata.firstJobTake='" . $job . "'";
    }

    if ($country == "Select below:" || $country == "") {
        $genquery = $genquery . "";
    } else if ($country == "all") {
        $genquery = $genquery . " and employdata.country<>''";
    } else {
        $genquery = $genquery . " and employdata.country='" . $country . "'";
    }

    if ($salary == "Select below:" || $salary == "") {
        $genquery = $genquery . "";
    } else if ($salary == "all") {
        $genquery = $genquery . " and employdata.salary<>''";
    } else {
        $genquery = $genquery . " and employdata.salary='" . $salary . "'";
    }

    if ($empStatus == "Select below:" || $empStatus == "") {
        $genquery = $genquery . "";
    } else if ($empStatus == "all") {
        $genquery = $genquery . " and employdata.presentlyEmploy<>''";
    } else {
        $genquery = $genquery . " and employdata.presentlyEmploy='" . $empStatus . "'";
    }

    if ($work != "Select below:" && $work != "all") {
        $genquery               = $genquery . " and employdata.workNature='" . $work . "'";
        $filter["Work Nature:"] = $work;
    }
    if ($country != "Select below:" && $country != "all") {
        $genquery           = $genquery . " and employdata.country='" . $country . "'";
        $filter["Country:"] = $country;
    }
    if ($job != "Select below:" && $job != "all") {
        $genquery            = $genquery . " and employdata.firstJobTake='" . $job . "'";
        $filter["Duration:"] = $job;
    }
    if ($salary != "Select below:" && $salary != "all") {
        $genquery          = $genquery . " and employdata.salary='" . $salary . "'";
        $filter["Salary:"] = $salary;
    }
    if ($empStatus != "Select below:" && $empStatus != "all") {
        $genquery                     = $genquery . " and employdata.presentlyEmploy='" . $empStatus . "'";
        $filter["Employment Status:"] = $empStatus;
    }
}
//-------------------  Query Generation ---------------------//

if (isset($_POST['summary'])) {
    ?>
 <a href="javascript: popuponclick('printableArea')"><input type = "button" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" /></a>

<div id="printableArea"><br><br><br><br>
<br><br><br>
<h1 style='color: gray; font-family: latoregular;'>Summary Report</h1>
<?php if (count($filter) == 1) {
        ?>
  <div class="filterGroup">
    <h5>Filter</h5>
    <?php foreach ($filter as $flt => $fltval) {
            echo "<div class='fltTitle'>" . $flt . "</div><span class='fltvalue'>" . $fltval . "</span><br>";
        }
        ?>
  </div>
<?php } else {
        ?>
  <div class="filterGroup">
    <h5>Filters</h5>
    <?php foreach ($filter as $flt => $fltval) {
            echo "<div class='fltTitle'>" . $flt . "</div><span class='fltvalue'>" . $fltval . "</span><br>";
        }
        ?>
  </div>
<?php }?>
<?php

//-------------------  Table Generation ---------------------//
    echo "<table class = 'summary' id = table1>\n";
    echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td>";
    if ($course != "Select below:" && $course == "all") {
        echo "<td colspan='" . count($courseHead) . "' style='text-align:center;'>COURSES</td></tr>";
        foreach ($courseHead as $crs => $val) {
            echo "<td class='mark'>" . $val . "</td>";
        }
    } else {
        echo "<td style='text-align:center;'>COURSE</td></tr>";
        echo "<td class='mark'>" . $courseHead[$course] . "</td>";
    }
    $yrFr = $_POST["from"];
    $yrTo = $_POST["to"];
    while ($yrFr < $yrTo) {
        $sy = $yrFr . "-" . ($yrFr + 1);
        array_push($scYear, $sy);
        echo "<tr><td>" . $sy . "</td>";
        if ($course != "Select below:" && $course == "all") {
            foreach ($courseHead as $crs => $val) {
                $thequery = $genquery . " and education.course LIKE '%" . $crs . "%' and education.syGrad LIKE '%" . $sy . "%' ORDER BY geninfo.lname ASC";
                $result   = mysqli_query($connection, $thequery);

                $num_rows = mysqli_num_rows($result);
                echo "<td>" . $num_rows . "</td>";
                if ($val == "BSIT") {
                    array_push($totBSIT, $num_rows);
                } else if ($val == "BSED") {
                    array_push($totBSED, $num_rows);
                } else if ($val == "BSFT") {
                    array_push($totBSFT, $num_rows);
                } else if ($val == "BSMB") {
                    array_push($totBSMB, $num_rows);
                } else if ($val == "BPA") {
                    array_push($totBPA, $num_rows);
                }
            }
        } else {
            $thequery = $genquery . " and education.course LIKE '%" . $course . "%' and education.syGrad LIKE '%" . $sy . "%' ORDER BY geninfo.lname ASC";
            $result   = mysqli_query($connection, $thequery);
            $num_rows = mysqli_num_rows($result);
            echo "<td>" . $num_rows . "</td>";
            array_push($totCORZ, $num_rows);
        }
        echo "</tr>";
        $yrFr++;
    }
    echo "</table>";
}
//-------------------  Table Generation ---------------------//
if ($course == "all") {
    $txtHead               = "ALL COURSES OF S.Y.";
    $employmentChartHeader = "ALL EMPLOYMENT STATUS BY COURSES OF S.Y.";
    $occupationChartHeader = "ALL OCCUPATIONAL COUNT BY COURSES OF S.Y.";
} else {
    $txtHead               = $courseHead[$course] . " OF S.Y.";
    $employmentChartHeader = $courseHead[$course] . " EMPLOYMENT STATUS OF S.Y.";
    $occupationChartHeader = $courseHead[$course] . " OCCUPATION COUNT OF S.Y.";
}
if (count($scYear) == 1) {
    $txtHead               = $txtHead . " " . $scYear[0];
    $employmentChartHeader = $employmentChartHeader . " " . $scYear[0];
    $occupationChartHeader = $occupationChartHeader . " " . $scYear[0];
} else {
    $txtHead               = $txtHead . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
    $employmentChartHeader = $employmentChartHeader . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
    $occupationChartHeader = $occupationChartHeader . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
}

function getCountQuery($from, $to, $work, $course, $country, $job, $salary, $empStatus)
{
    $countQuery = "SELECT
    education.course,
    COUNT(
        CASE
            WHEN employdata.presentlyEmploy LIKE '%yes%'
            THEN 1
        END
    ) AS presentEmployedCount,
    COUNT(
        CASE
            WHEN employdata.presentlyEmploy LIKE '%no%'
            THEN 1
        END
    ) AS presentUnemployedCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Teacher%'
            THEN 1
        END
    ) AS workTeacherCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Fisheries/Technician%'
            THEN 1
        END
    ) AS workFisheriesTechnicianCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Programmer%'
            THEN 1
        END
    ) AS workProgrammerCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Aquaculturist%'
            THEN 1
        END
    ) AS workAquaculturistCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Network Administrator%'
            THEN 1
        END
    ) AS workNetworkAdministratorCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Marine Biologist%'
            THEN 1
        END
    ) AS workMarineBiologistCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Quality Food Control/Assurance%'
            THEN 1
        END
    ) AS workFoodQualityControlAssuranceCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%Self-employed%'
            THEN 1
        END
    ) AS workSelfEmployedCount,
    COUNT(
        CASE
            WHEN employdata.workNature LIKE '%%' OR employdata.workNature LIKE '%UNEMPLOYED%'
            THEN 1
        END
    ) AS workUnemployedCount
FROM
    geninfo
    INNER JOIN education
        ON geninfo.username = education.username
    INNER JOIN training
        ON training.username = geninfo.username
    INNER JOIN employdata
        ON employdata.username = geninfo.username
WHERE geninfo.username <> ''";

    if ($work == "Select below:" || $work == "") {
        $countQuery = $countQuery . "";
    } else if ($work == "all") {
        $countQuery = $countQuery . " and employdata.workNature<>''";
    } else {
        $countQuery = $countQuery . " and employdata.workNature LIKE '%" . $work . "%'";
    }

    if ($job == "Select below:" || $job == "") {
        $countQuery = $countQuery . "";
    } else if ($job == "all") {
        $countQuery = $countQuery . " and employdata.firstJobTake<>''";
    } else {
        $countQuery = $countQuery . " and employdata.firstJobTake='" . $job . "'";
    }

    if ($country == "Select below:" || $country == "") {
        $countQuery = $countQuery . "";
    } else if ($country == "all") {
        $countQuery = $countQuery . " and employdata.country<>''";
    } else {
        $countQuery = $countQuery . " and employdata.country='" . $country . "'";
    }

    if ($salary == "Select below:" || $salary == "") {
        $countQuery = $countQuery . "";
    } else if ($salary == "all") {
        $countQuery = $countQuery . " and employdata.salary<>''";
    } else {
        $countQuery = $countQuery . " and employdata.salary='" . $salary . "'";
    }

    if ($empStatus == "Select below:" || $empStatus == "") {
        $countQuery = $countQuery . "";
    } else if ($empStatus == "all") {
        $countQuery = $countQuery . " and employdata.presentlyEmploy<>''";
    } else {
        $countQuery = $countQuery . " and employdata.presentlyEmploy='" . $empStatus . "'";
    }

    return $countQuery;
}

function getCountsResult($connection, $countQuery, $from, $to, $work, $course, $country, $job, $salary, $empStatus, $courseHead)
{
    $data = array();

    $bsitPresentEmployed                      = array();
    $bsitPresentUnemployed                    = array();
    $bsitWorkTeacher                          = array();
    $bsitWorkFisheriesTechnician              = array();
    $bsitWorkProgrammer                       = array();
    $bsitWorkAquaculturist                    = array();
    $bsitWorkNetworkAdministrator             = array();
    $bsitWorkMarineBiologist                  = array();
    $bsitWorkFoodQualityControlAssuranceCount = array();
    $bsitWorkSelfEmployed                     = array();
    $bsitWorkUnemployed                       = array();

    $bsedPresentEmployed                      = array();
    $bsedPresentUnemployed                    = array();
    $bsedWorkTeacher                          = array();
    $bsedWorkFisheriesTechnician              = array();
    $bsedWorkProgrammer                       = array();
    $bsedWorkAquaculturist                    = array();
    $bsedWorkNetworkAdministrator             = array();
    $bsedWorkMarineBiologist                  = array();
    $bsedWorkFoodQualityControlAssuranceCount = array();
    $bsedWorkSelfEmployed                     = array();
    $bsedWorkUnemployed                       = array();

    $bsftPresentEmployed                      = array();
    $bsftPresentUnemployed                    = array();
    $bsftWorkTeacher                          = array();
    $bsftWorkFisheriesTechnician              = array();
    $bsftWorkProgrammer                       = array();
    $bsftWorkAquaculturist                    = array();
    $bsftWorkNetworkAdministrator             = array();
    $bsftWorkMarineBiologist                  = array();
    $bsftWorkFoodQualityControlAssuranceCount = array();
    $bsftWorkSelfEmployed                     = array();
    $bsftWorkUnemployed                       = array();

    $bsmbPresentEmployed                      = array();
    $bsmbPresentUnemployed                    = array();
    $bsmbWorkTeacher                          = array();
    $bsmbWorkFisheriesTechnician              = array();
    $bsmbWorkProgrammer                       = array();
    $bsmbWorkAquaculturist                    = array();
    $bsmbWorkNetworkAdministrator             = array();
    $bsmbWorkMarineBiologist                  = array();
    $bsmbWorkFoodQualityControlAssuranceCount = array();
    $bsmbWorkSelfEmployed                     = array();
    $bsmbWorkUnemployed                       = array();

    $bpaPresentEmployed                      = array();
    $bpaPresentUnemployed                    = array();
    $bpaWorkTeacher                          = array();
    $bpaWorkFisheriesTechnician              = array();
    $bpaWorkProgrammer                       = array();
    $bpaWorkAquaculturist                    = array();
    $bpaWorkNetworkAdministrator             = array();
    $bpaWorkMarineBiologist                  = array();
    $bpaWorkFoodQualityControlAssuranceCount = array();
    $bpaWorkSelfEmployed                     = array();
    $bpaWorkUnemployed                       = array();

    $crsPresentEmployed                      = array();
    $crsPresentUnemployed                    = array();
    $crsWorkTeacher                          = array();
    $crsWorkFisheriesTechnician              = array();
    $crsWorkProgrammer                       = array();
    $crsWorkAquaculturist                    = array();
    $crsWorkNetworkAdministrator             = array();
    $crsWorkMarineBiologist                  = array();
    $crsWorkFoodQualityControlAssuranceCount = array();
    $crsWorkSelfEmployed                     = array();
    $crsWorkUnemployed                       = array();

    while ($from < $to) {
        $sy = $from . "-" . ($from + 1);
        if ($course == "all") {
            foreach ($courseHead as $crs => $val) {
                $thequery    = $countQuery . " and education.course LIKE '%" . $val . "%' and education.syGrad LIKE '%" . $sy . "%' GROUP BY education.course ORDER BY education.course ASC;";
                $result      = mysqli_query($connection, $thequery);
                $resultArray = mysqli_fetch_array($result);
                $num_rows    = mysqli_num_rows($result);

                switch ($val) {
                    case 'BSIT':
                        array_push($bsitPresentEmployed, intval($resultArray['presentEmployedCount']));
                        array_push($bsitPresentUnemployed, intval($resultArray['presentUnemployedCount']));
                        array_push($bsitWorkTeacher, intval($resultArray['workTeacherCount']));
                        array_push($bsitWorkFisheriesTechnician, intval($resultArray['workFisheriesTechnicianCount']));
                        array_push($bsitWorkProgrammer, intval($resultArray['workProgrammerCount']));
                        array_push($bsitWorkAquaculturist, intval($resultArray['workAquaculturistCount']));
                        array_push($bsitWorkNetworkAdministrator, intval($resultArray['workNetworkAdministratorCount']));
                        array_push($bsitWorkMarineBiologist, intval($resultArray['workMarineBiologistCount']));
                        array_push($bsitWorkFoodQualityControlAssuranceCount, intval($resultArray['workFoodQualityControlAssuranceCount']));
                        array_push($bsitWorkSelfEmployed, intval($resultArray['workSelfEmployedCount']));
                        array_push($bsitWorkUnemployed, intval($resultArray['workUnemployedCount']));

                        $data["BSIT"] = array(
                            "presentEmployed"                           => $bsitPresentEmployed,
                            "presentUnemployed"                         => $bsitPresentUnemployed,
                            "workTeacherCount"                          => $bsitWorkTeacher,
                            "workFisheriesTechnicianCount"              => $bsitWorkFisheriesTechnician,
                            "workProgrammerCount"                       => $bsitWorkProgrammer,
                            "workAquaculturistCount"                    => $bsitWorkAquaculturist,
                            "workNetworkAdministratorCount"             => $bsitWorkNetworkAdministrator,
                            "workMarineBiologistCount"                  => $bsitWorkMarineBiologist,
                            "workFoodQualityControlAssuranceCountCount" => $bsitWorkFoodQualityControlAssuranceCount,
                            "workSelfEmployedCount"                     => $bsitWorkSelfEmployed,
                            "workUnemployedCount"                       => $bsitWorkUnemployed,
                        );

                        break;
                    case 'BSED':
                        array_push($bsedPresentEmployed, intval($resultArray['presentEmployedCount']));
                        array_push($bsedPresentUnemployed, intval($resultArray['presentUnemployedCount']));
                        array_push($bsedWorkTeacher, intval($resultArray['workTeacherCount']));
                        array_push($bsedWorkFisheriesTechnician, intval($resultArray['workFisheriesTechnicianCount']));
                        array_push($bsedWorkProgrammer, intval($resultArray['workProgrammerCount']));
                        array_push($bsedWorkAquaculturist, intval($resultArray['workAquaculturistCount']));
                        array_push($bsedWorkNetworkAdministrator, intval($resultArray['workNetworkAdministratorCount']));
                        array_push($bsedWorkMarineBiologist, intval($resultArray['workMarineBiologistCount']));
                        array_push($bsedWorkFoodQualityControlAssuranceCount, intval($resultArray['workFoodQualityControlAssuranceCount']));
                        array_push($bsedWorkSelfEmployed, intval($resultArray['workSelfEmployedCount']));
                        array_push($bsedWorkUnemployed, intval($resultArray['workUnemployedCount']));

                        $data["BSE"] = array(
                            "presentEmployed"                           => $bsedPresentEmployed,
                            "presentUnemployed"                         => $bsedPresentUnemployed,
                            "workTeacherCount"                          => $bsedWorkTeacher,
                            "workFisheriesTechnicianCount"              => $bsedWorkFisheriesTechnician,
                            "workProgrammerCount"                       => $bsedWorkProgrammer,
                            "workAquaculturistCount"                    => $bsedWorkAquaculturist,
                            "workNetworkAdministratorCount"             => $bsedWorkNetworkAdministrator,
                            "workMarineBiologistCount"                  => $bsedWorkMarineBiologist,
                            "workFoodQualityControlAssuranceCountCount" => $bsedWorkFoodQualityControlAssuranceCount,
                            "workSelfEmployedCount"                     => $bsedWorkSelfEmployed,
                            "workUnemployedCount"                       => $bsedWorkUnemployed,
                        );

                        break;
                    case 'BSFT':
                        array_push($bsftPresentEmployed, intval($resultArray['presentEmployedCount']));
                        array_push($bsftPresentUnemployed, intval($resultArray['presentUnemployedCount']));
                        array_push($bsftWorkTeacher, intval($resultArray['workTeacherCount']));
                        array_push($bsftWorkFisheriesTechnician, intval($resultArray['workFisheriesTechnicianCount']));
                        array_push($bsftWorkProgrammer, intval($resultArray['workProgrammerCount']));
                        array_push($bsftWorkAquaculturist, intval($resultArray['workAquaculturistCount']));
                        array_push($bsftWorkNetworkAdministrator, intval($resultArray['workNetworkAdministratorCount']));
                        array_push($bsftWorkMarineBiologist, intval($resultArray['workMarineBiologistCount']));
                        array_push($bsftWorkFoodQualityControlAssuranceCount, intval($resultArray['workFoodQualityControlAssuranceCount']));
                        array_push($bsftWorkSelfEmployed, intval($resultArray['workSelfEmployedCount']));
                        array_push($bsftWorkUnemployed, intval($resultArray['workUnemployedCount']));

                        $data["BSFT"] = array(
                            "presentEmployed"                           => $bsftPresentEmployed,
                            "presentUnemployed"                         => $bsftPresentUnemployed,
                            "workTeacherCount"                          => $bsftWorkTeacher,
                            "workFisheriesTechnicianCount"              => $bsftWorkFisheriesTechnician,
                            "workProgrammerCount"                       => $bsftWorkProgrammer,
                            "workAquaculturistCount"                    => $bsftWorkAquaculturist,
                            "workNetworkAdministratorCount"             => $bsftWorkNetworkAdministrator,
                            "workMarineBiologistCount"                  => $bsftWorkMarineBiologist,
                            "workFoodQualityControlAssuranceCountCount" => $bsftWorkFoodQualityControlAssuranceCount,
                            "workSelfEmployedCount"                     => $bsftWorkSelfEmployed,
                            "workUnemployedCount"                       => $bsftWorkUnemployed,
                        );

                        break;
                    case 'BSMB':
                        array_push($bsmbPresentEmployed, intval($resultArray['presentEmployedCount']));
                        array_push($bsmbPresentUnemployed, intval($resultArray['presentUnemployedCount']));
                        array_push($bsmbWorkTeacher, intval($resultArray['workTeacherCount']));
                        array_push($bsmbWorkFisheriesTechnician, intval($resultArray['workFisheriesTechnicianCount']));
                        array_push($bsmbWorkProgrammer, intval($resultArray['workProgrammerCount']));
                        array_push($bsmbWorkAquaculturist, intval($resultArray['workAquaculturistCount']));
                        array_push($bsmbWorkNetworkAdministrator, intval($resultArray['workNetworkAdministratorCount']));
                        array_push($bsmbWorkMarineBiologist, intval($resultArray['workMarineBiologistCount']));
                        array_push($bsmbWorkFoodQualityControlAssuranceCount, intval($resultArray['workFoodQualityControlAssuranceCount']));
                        array_push($bsmbWorkSelfEmployed, intval($resultArray['workSelfEmployedCount']));
                        array_push($bsmbWorkUnemployed, intval($resultArray['workUnemployedCount']));

                        $data["BSMB"] = array(
                            "presentEmployed"                           => $bsmbPresentEmployed,
                            "presentUnemployed"                         => $bsmbPresentUnemployed,
                            "workTeacherCount"                          => $bsmbWorkTeacher,
                            "workFisheriesTechnicianCount"              => $bsmbWorkFisheriesTechnician,
                            "workProgrammerCount"                       => $bsmbWorkProgrammer,
                            "workAquaculturistCount"                    => $bsmbWorkAquaculturist,
                            "workNetworkAdministratorCount"             => $bsmbWorkNetworkAdministrator,
                            "workMarineBiologistCount"                  => $bsmbWorkMarineBiologist,
                            "workFoodQualityControlAssuranceCountCount" => $bsmbWorkFoodQualityControlAssuranceCount,
                            "workSelfEmployedCount"                     => $bsmbWorkSelfEmployed,
                            "workUnemployedCount"                       => $bsmbWorkUnemployed,
                        );

                        break;
                    case 'BPA':
                        array_push($bpaPresentEmployed, intval($resultArray['presentEmployedCount']));
                        array_push($bpaPresentUnemployed, intval($resultArray['presentUnemployedCount']));
                        array_push($bpaWorkTeacher, intval($resultArray['workTeacherCount']));
                        array_push($bpaWorkFisheriesTechnician, intval($resultArray['workFisheriesTechnicianCount']));
                        array_push($bpaWorkProgrammer, intval($resultArray['workProgrammerCount']));
                        array_push($bpaWorkAquaculturist, intval($resultArray['workAquaculturistCount']));
                        array_push($bpaWorkNetworkAdministrator, intval($resultArray['workNetworkAdministratorCount']));
                        array_push($bpaWorkMarineBiologist, intval($resultArray['workMarineBiologistCount']));
                        array_push($bpaWorkFoodQualityControlAssuranceCount, intval($resultArray['workFoodQualityControlAssuranceCount']));
                        array_push($bpaWorkSelfEmployed, intval($resultArray['workSelfEmployedCount']));
                        array_push($bpaWorkUnemployed, intval($resultArray['workUnemployedCount']));

                        $data["BPA"] = array(
                            "presentEmployed"                           => $bpaPresentEmployed,
                            "presentUnemployed"                         => $bpaPresentUnemployed,
                            "workTeacherCount"                          => $bpaWorkTeacher,
                            "workFisheriesTechnicianCount"              => $bpaWorkFisheriesTechnician,
                            "workProgrammerCount"                       => $bpaWorkProgrammer,
                            "workAquaculturistCount"                    => $bpaWorkAquaculturist,
                            "workNetworkAdministratorCount"             => $bpaWorkNetworkAdministrator,
                            "workMarineBiologistCount"                  => $bpaWorkMarineBiologist,
                            "workFoodQualityControlAssuranceCountCount" => $bpaWorkFoodQualityControlAssuranceCount,
                            "workSelfEmployedCount"                     => $bpaWorkSelfEmployed,
                            "workUnemployedCount"                       => $bpaWorkUnemployed,
                        );

                        break;
                }
            }
        } else {
            $thequery    = $countQuery . " and education.course LIKE '%" . $course . "%' and education.syGrad LIKE '%" . $sy . "%' ORDER BY geninfo.lname ASC;";
            $result      = mysqli_query($connection, $thequery);
            $resultArray = mysqli_fetch_array($result);
            $num_rows    = mysqli_num_rows($result);

            array_push($crsPresentEmployed, intval($resultArray['presentEmployedCount']));
            array_push($crsPresentUnemployed, intval($resultArray['presentUnemployedCount']));
            array_push($crsWorkTeacher, intval($resultArray['workTeacherCount']));
            array_push($crsWorkFisheriesTechnician, intval($resultArray['workFisheriesTechnicianCount']));
            array_push($crsWorkProgrammer, intval($resultArray['workProgrammerCount']));
            array_push($crsWorkAquaculturist, intval($resultArray['workAquaculturistCount']));
            array_push($crsWorkNetworkAdministrator, intval($resultArray['workNetworkAdministratorCount']));
            array_push($crsWorkMarineBiologist, intval($resultArray['workMarineBiologistCount']));
            array_push($crsWorkFoodQualityControlAssuranceCount, intval($resultArray['workFoodQualityControlAssuranceCount']));
            array_push($crsWorkSelfEmployed, intval($resultArray['workSelfEmployedCount']));
            array_push($crsWorkUnemployed, intval($resultArray['workUnemployedCount']));

            $data["" . $course . ""] = array(
                "presentEmployed"                           => $crsPresentEmployed,
                "presentUnemployed"                         => $crsPresentUnemployed,
                "workTeacherCount"                          => $crsWorkTeacher,
                "workFisheriesTechnicianCount"              => $crsWorkFisheriesTechnician,
                "workProgrammerCount"                       => $crsWorkProgrammer,
                "workAquaculturistCount"                    => $crsWorkAquaculturist,
                "workNetworkAdministratorCount"             => $crsWorkNetworkAdministrator,
                "workMarineBiologistCount"                  => $crsWorkMarineBiologist,
                "workFoodQualityControlAssuranceCountCount" => $crsWorkFoodQualityControlAssuranceCount,
                "workSelfEmployedCount"                     => $crsWorkSelfEmployed,
                "workUnemployedCount"                       => $crsWorkUnemployed,
            );
        }

        $from++;
    }

    return json_encode($data);
}

$countQuery = getCountQuery($from, $to, $work, $course, $country, $job, $salary, $empStatus);

$gradCountData = getCountsResult($connection, $countQuery, $from, $to, $work, $course, $country, $job, $salary, $empStatus, $courseHead);
?>

<br><br><hr />

<script type="text/javascript">
$(function () {
    var skulYear = [];

    <?php foreach ($scYear as $key) {?>
      skulYear.push('<?php echo $key; ?>');
    <?php }?>

    $('#container2').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: <?php echo json_encode($txtHead); ?>
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: skulYear,
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
            layout: 'horizontal',
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
        <?php if ($course == "all") {?>
        series: [{
            color: '#7e57c2',
            name: "BSIT",
            data: <?php echo json_encode($totBSIT); ?>
          }, {
            color: '#1e88e5',
            name: "BSEd",
            data: <?php echo json_encode($totBSED); ?>
          }, {
            color: '#6ab7ff',
            name: "BSFT",
            data: <?php echo json_encode($totBSFT); ?>
          }, {
            color: '#005cb2',
            name: "BSMB",
            data: <?php echo json_encode($totBSMB); ?>
          }, {
            color: '#43a047',
            name: "BPA",
            data: <?php echo json_encode($totBPA); ?>
          }]
        <?php } else {?>
          series: [{
            <?php if ($course === "BSIT") {?>
                color: '#7e57c2',
            <?php } else if ($course === "BSE") {?>
                color: '#1e88e5',
            <?php } else if ($course === "BSFT") {?>
                color: '#6ab7ff',
            <?php } else if ($course === "BSMB") {?>
                color: '#005cb2',
            <?php } else if ($course === "BPA") {?>
                color: '#43a047',
            <?php }?>
            name: <?php echo json_encode($courseHead[$course]); ?>,
            data: <?php echo json_encode($totCORZ); ?>
          }]
        <?php }?>
    });

    var hcEmploymentContainer = Highcharts.chart('hcEmploymentContainer', {
      chart: {
          type: 'column'
      },
      title: {
          text: <?php echo json_encode($employmentChartHeader); ?>
      },
      xAxis: {
          categories: skulYear
      },
      yAxis: {
          allowDecimals: false,
          min: 0,
          title: {
              text: 'Employment Status Count'
          }
      },
      tooltip: {
          formatter: function () {
              return '<b>' + this.series.userOptions.stack + '</b><br/>' +
                  this.series.name + ': ' + this.y + '<br/>' +
                  'Total: ' + this.point.stackTotal;
          }
      },
      plotOptions: {
          column: {
              stacking: 'normal'
          }
      },
      responsive: {
        rules: [{
          condition: {
            maxWidth: 500
          },
          chartOptions: {
            legend: {
              align: "center"
            }
          }
        }]
      },
      legend: {
          layout: 'horizontal',
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
      series: [
        <?php if ($course === 'all') {?>
            <?php foreach (json_decode($gradCountData, true) as $key => $val) {?>
                <?php if ($key === 'BSIT') {?>
                    {
                        color: '#9ccc65',
                        name: "Employed",
                        data: <?php echo json_encode($val['presentEmployed']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#d4e157',
                        name: "Unemployed",
                        data: <?php echo json_encode($val['presentUnemployed']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    },
                <?php } else {?>
                    {
                        color: '#9ccc65',
                        name: "Employed",
                        data: <?php echo json_encode($val['presentEmployed']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#d4e157',
                        name: "Unemployed",
                        data: <?php echo json_encode($val['presentUnemployed']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    },
                <?php }?>
            <?php }?>
        <?php } else {?>
            <?php foreach (json_decode($gradCountData, true) as $key => $val) {?>
                {
                    color: '#9ccc65',
                    name: "Employed",
                    data: <?php echo json_encode($val['presentEmployed']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#d4e157',
                    name: "Unemployed",
                    data: <?php echo json_encode($val['presentUnemployed']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                },
            <?php }?>
        <?php }?>
      ]
    });

    var hcOccupationContainer = Highcharts.chart('hcOccupationContainer', {
      chart: {
          type: 'column'
      },
      title: {
          text: <?php echo json_encode($occupationChartHeader); ?>
      },
      xAxis: {
          categories: skulYear
      },
      yAxis: {
          allowDecimals: false,
          min: 0,
          title: {
              text: 'Employment Status Count'
          }
      },
      tooltip: {
          formatter: function () {
              return '<b>' + this.series.userOptions.stack + '</b><br/>' +
                  this.series.name + ': ' + this.y + '<br/>' +
                  'Total: ' + this.point.stackTotal;
          }
      },
      plotOptions: {
          column: {
              stacking: 'normal'
          }
      },
      responsive: {
        rules: [{
          condition: {
            maxWidth: 500
          },
          chartOptions: {
            legend: {
              align: "center"
            }
          }
        }]
      },
      legend: {
          layout: 'horizontal',
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
      series: [
        <?php if ($course === 'all') {?>
            <?php foreach (json_decode($gradCountData, true) as $key => $val) {?>
                <?php if ($key === 'BSIT') {?>
                    {
                        color: '#ef5350',
                        name: "Teacher",
                        data: <?php echo json_encode($val['workTeacherCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#ec407a',
                        name: "Fisheries/Technician",
                        data: <?php echo json_encode($val['workFisheriesTechnicianCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#ab47bc',
                        name: "Programmer",
                        data: <?php echo json_encode($val['workProgrammerCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#7e57c2',
                        name: "Aquaculturist",
                        data: <?php echo json_encode($val['workAquaculturistCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#5c6bc0',
                        name: "Network Administrator",
                        data: <?php echo json_encode($val['workNetworkAdministratorCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#42a5f5',
                        name: "Marine Biologist",
                        data: <?php echo json_encode($val['workMarineBiologistCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#26a69a',
                        name: "Food Quality Control/Assurance",
                        data: <?php echo json_encode($val['workFoodQualityControlAssuranceCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#ffca28',
                        name: "Self-Employed",
                        data: <?php echo json_encode($val['workSelfEmployedCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    }, {
                        color: '#5d4037',
                        name: "Unemployed",
                        data: <?php echo json_encode($val['workUnemployedCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>
                    },
                <?php } else {?>
                    {
                        color: '#ef5350',
                        name: "Teacher",
                        data: <?php echo json_encode($val['workTeacherCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#ec407a',
                        name: "Fisheries/Technician",
                        data: <?php echo json_encode($val['workFisheriesTechnicianCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#ab47bc',
                        name: "Programmer",
                        data: <?php echo json_encode($val['workProgrammerCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#7e57c2',
                        name: "Aquaculturist",
                        data: <?php echo json_encode($val['workAquaculturistCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#5c6bc0',
                        name: "Network Administrator",
                        data: <?php echo json_encode($val['workNetworkAdministratorCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#42a5f5',
                        name: "Marine Biologist",
                        data: <?php echo json_encode($val['workMarineBiologistCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#26a69a',
                        name: "Food Quality Control/Assurance",
                        data: <?php echo json_encode($val['workFoodQualityControlAssuranceCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#ffca28',
                        name: "Self-Employed",
                        data: <?php echo json_encode($val['workSelfEmployedCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    }, {
                        color: '#5d4037',
                        name: "Unemployed",
                        data: <?php echo json_encode($val['workUnemployedCount']); ?>,
                        stack: <?php echo '"' . $key . '"'; ?>,
                        linkedTo: ':previous'
                    },
                <?php }?>
            <?php }?>
        <?php } else {?>
            <?php foreach (json_decode($gradCountData, true) as $key => $val) {?>
                {
                    color: '#ef5350',
                    name: "Teacher",
                    data: <?php echo json_encode($val['workTeacherCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#ec407a',
                    name: "Fisheries/Technician",
                    data: <?php echo json_encode($val['workFisheriesTechnicianCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#ab47bc',
                    name: "Programmer",
                    data: <?php echo json_encode($val['workProgrammerCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#7e57c2',
                    name: "Aquaculturist",
                    data: <?php echo json_encode($val['workAquaculturistCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#5c6bc0',
                    name: "Network Administrator",
                    data: <?php echo json_encode($val['workNetworkAdministratorCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#42a5f5',
                    name: "Marine Biologist",
                    data: <?php echo json_encode($val['workMarineBiologistCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#26a69a',
                    name: "Food Quality Control/Assurance",
                    data: <?php echo json_encode($val['workFoodQualityControlAssuranceCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#ffca28',
                    name: "Self-Employed",
                    data: <?php echo json_encode($val['workSelfEmployedCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                }, {
                    color: '#5d4037',
                    name: "Unemployed",
                    data: <?php echo json_encode($val['workUnemployedCount']); ?>,
                    stack: <?php echo '"' . $key . '"'; ?>
                },
            <?php }?>
        <?php }?>
      ]
    });
});
</script>
<div id="container2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="hcEmploymentContainer"></div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="hcOccupationContainer"></div>
        </div>
    </div>
</div>
</div>
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
          <script type="text/javascript">
              $(document).ready(function() {

                if (window.history && window.history.pushState) {
                    $(window).on('popstate', function() {
                        var hashLocation = location.hash;
                        var hashSplit = hashLocation.split("#!/");
                        var hashName = hashSplit[1];

                        if (hashName !== '') {
                            var hash = window.location.hash;
                            if (hash === '') {
                                window.location = window.location.protocol + window.location.hostname + 'graduatesProfile.php';
                                return false;
                            }
                        }
                    });

                    window.history.pushState('forward', null, window.location.href);
                }

              });
          </script>

          <!--[if lt IE 10]>
              <script src="assets/js/placeholder.js"></script>
          <![endif]-->
  </body>
  </html>