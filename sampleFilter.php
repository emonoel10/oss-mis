<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include 'session.php';

if (!(isset($_SESSION['login_user']) && $_SESSION['login_user'] != '')) {
    header("Location: socioLogin.php");
}
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
          <!-- [endif]-->

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
$religion   = $_POST['religion'];
$course     = $_POST['course'];
$gender     = $_POST['gender'];
$hs         = $_POST['hs'];
$city       = $_POST['city'];
$stanine    = $_POST['stanine'];
$income     = $_POST['income'];
$courseHead = array(
    "Bachelor of Science in Information Technology (BSIT)" => "BSIT",
    "Bachelor of Science in Education (BSEd)"              => "BSE",
    "Bachelor of Science in Food Technology (BSFT)"        => "BSFT",
    "Bachelor of Science in Marine Biology (BSMB)"         => "BSMB",
    "Bachelor of Public Administration (BPA)"              => "BPA",
);
//-------------------  Query Generation ---------------------//

//------------------- Important Information Arrays -----------------//
$filter         = array();
$scYear         = array();
$totBSIT        = array();
$totBSED        = array();
$totBSFT        = array();
$totBSMB        = array();
$totBPA         = array();
$totCORZ        = array();
$txtHead        = "";
$hcGenderHeader = $hcStatusHeader = "";
//------------------- Important Information Arrays -----------------//

if ($from != "From:" && $to != "To:" || $from != "" && $to != "") {
    $genquery          = "SELECT * FROM personal INNER JOIN social ON personal.username = social.username INNER JOIN economic ON economic.username = personal.username WHERE 1=1";
    $filter["Course:"] = $course;

    if ($gender == "Select below:" || $gender == "") {
        $genquery = $genquery . "";
    } else if ($gender == 'all') {
        $genquery          = $genquery . " and personal.gender IS NOT NULL";
        $filter["Gender:"] = $gender;
    } else {
        $genquery          = $genquery . " and personal.gender='" . $gender . "'";
        $filter["Gender:"] = $gender;
    }

    if ($religion != "Select below:" && $religion != "all") {
        $genquery            = $genquery . " and social.religion='" . $religion . "'";
        $filter["Religion:"] = $religion;
    }
    if ($hs != "Select below:" && $hs != "all") {
        $genquery               = $genquery . " and personal.hs='" . $hs . "'";
        $filter["High School:"] = $hs;
    }
    if ($city != "Select below:" && $city != "all") {
        $genquery        = $genquery . " and personal.presentCity='" . $city . "'";
        $filter["City:"] = $city;
    }
    if ($stanine != "Select below:" && $stanine != "all") {
        $genquery           = $genquery . " and personal.stanine='" . $stanine . "'";
        $filter["Stanine:"] = $stanine;
    }
    if ($income != "Select below:" && $income != "all") {
        $genquery          = $genquery . " and economic.income='$income'";
        $filter["Income:"] = $income;
    }
    //var_dump($filter);
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
        $hcGenderHeader  = "ALL GENDER COUNT BY COURSE FOR S.Y.";
        $hcStatusHeader  = "ALL RELATIONSHIP STATUS COUNT BY COURSE FOR S.Y.";
        $hcHschoolHeader = "ALL HIGH SCHOOL SECTOR TYPE COUNT BY COURSE FOR S.Y.";
        echo "<td colspan='" . count($courseHead) . "' style='text-align:center;'>COURSES</td></tr>";
        foreach ($courseHead as $crs => $val) {
            echo "<td class='mark'>" . $val . "</td>";
        }
    } else {
        $hcGenderHeader  = "GENDER COUNT OF " . strtoupper($courseHead[$course]) . " FOR S.Y.";
        $hcStatusHeader  = "RELATIONSHIP STATUS COUNT OF " . strtoupper($courseHead[$course]) . " FOR S.Y.";
        $hcHschoolHeader = "HIGH SCHOOL SECTOR TYPE COUNT OF " . strtoupper($courseHead[$course]) . " FOR S.Y.";
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
                $thequery = $genquery . " and personal.course LIKE '%" . $val . "%' and personal.schoolYr LIKE '%" . $sy . "%' GROUP BY personal.lastname ORDER BY personal.lastname";
                $result   = mysqli_query($connection, $thequery);
                $num_rows = mysqli_num_rows($result);
                echo "<td>" . $num_rows . "</td>";
                if ($val == "BSIT") {
                    array_push($totBSIT, $num_rows);
                } elseif ($val == "BSE") {
                    array_push($totBSED, $num_rows);
                } elseif ($val == "BSFT") {
                    array_push($totBSFT, $num_rows);
                } elseif ($val == "BSMB") {
                    array_push($totBSMB, $num_rows);
                } elseif ($val == "BPA") {
                    array_push($totBPA, $num_rows);
                }
            }
        } else {
            $thequery = $genquery . " and personal.course='" . $course . "' and personal.schoolYr LIKE '%" . $sy . "%' GROUP BY personal.lastname ORDER BY personal.lastname";
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
if ($course == 'Select below:' || $course == "all") {
    $txtHead = "ALL COURSES OF S.Y.";
} else {
    $txtHead = $courseHead[$course] . " OF S.Y.";
}
if (count($scYear) == 1) {
    $txtHead = $txtHead . " " . $scYear[0];
} else {
    $txtHead = $txtHead . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
}

//--------- Count Chart ---------//

// Constructor
// for merging all or specific gender data to be display
$bsitMaleGenderData          = array();
$bsitFemaleGenderData        = array();
$bsedMaleGenderData          = array();
$bsedFemaleGenderData        = array();
$bsftMaleGenderData          = array();
$bsftFemaleGenderData        = array();
$bsmbMaleGenderData          = array();
$bsmbFemaleGenderData        = array();
$bpaMaleGenderData           = array();
$bpaFemaleGenderData         = array();
$courseTotalGenderMaleData   = array();
$courseTotalGenderFemaleData = array();

$bsitStatusSingleData            = array();
$bsitStatusMarriedData           = array();
$bsitStatusWidowedData           = array();
$bsedStatusSingleData            = array();
$bsedStatusMarriedData           = array();
$bsedStatusWidowedData           = array();
$bsftStatusSingleData            = array();
$bsftStatusMarriedData           = array();
$bsftStatusWidowedData           = array();
$bsmbStatusSingleData            = array();
$bsmbStatusMarriedData           = array();
$bsmbStatusWidowedData           = array();
$bpaStatusSingleData             = array();
$bpaStatusMarriedData            = array();
$bpaStatusWidowedData            = array();
$courseTotalRelStatusSingleData  = array();
$courseTotalRelStatusMarriedData = array();
$courseTotalRelStatusWidowedData = array();

$bsitHsPublicTypeData     = array();
$bsitHsPrivateTypeData    = array();
$bsedHsPublicTypeData     = array();
$bsedHsPrivateTypeData    = array();
$bsftHsPublicTypeData     = array();
$bsftHsPrivateTypeData    = array();
$bsmbHsPublicTypeData     = array();
$bsmbHsPrivateTypeData    = array();
$bpaHsPublicTypeData      = array();
$bpaHsPrivateTypeData     = array();
$courseTotalHsPublicData  = array();
$courseTotalHsPrivateData = array();

// $maleGenderData    = array();
// $femaleGenderData  = array();
// $statusSingleData  = array();
// $statusMarriedData = array();
// $statusWidowedData = array();
// $hsPublicTypeData  = array();
// $hsPrivateTypeData = array();
$yearFrom = $_POST["from"];
$yearTo   = $_POST["to"];

if (count($scYear) == 1) {
    $hcGenderHeader  = $hcGenderHeader . " " . $scYear[0];
    $hcStatusHeader  = $hcStatusHeader . " " . $scYear[0];
    $hcHschoolHeader = $hcHschoolHeader . " " . $scYear[0];
} else {
    $hcGenderHeader  = $hcGenderHeader . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
    $hcStatusHeader  = $hcStatusHeader . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
    $hcHschoolHeader = $hcHschoolHeader . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
}

$countQueryString = "SELECT personal.course,
    COUNT(*) AS maxGender,
    COUNT(
        CASE
            WHEN LOWER(personal.gender) = 'male'
            THEN 1
        END
    ) AS maleCount,
    COUNT(
        CASE
            WHEN LOWER(personal.gender) = 'female'
            THEN 1
        END
    ) AS femaleCount,
    COUNT(
        CASE
            WHEN LOWER(personal.mstatus) LIKE '%single%'
            THEN 1
        END
    ) AS statusSingleCount,
    COUNT(
        CASE
            WHEN LOWER(personal.mstatus) LIKE '%married%'
            THEN 1
        END
    ) AS statusMarriedCount,
    COUNT(
        CASE
            WHEN LOWER(personal.mstatus) LIKE '%widowed%'
            THEN 1
        END
    ) AS statusWidowedCount,
    COUNT(
        CASE
            WHEN LOWER(personal.hstype) LIKE '%public%'
            THEN 1
        END
    ) AS hsPublicCount,
    COUNT(
        CASE
            WHEN LOWER(personal.hstype) LIKE '%private%'
            THEN 1
        END
    ) AS hsPrivateCount
FROM
    personal
    INNER JOIN social
        ON personal.username = social.username
    INNER JOIN economic
        ON economic.username = personal.username
    WHERE 1=1";

if ($gender == "Select below:" || $gender == "") {
    $countQueryString = $countQueryString . "";
} elseif ($gender == "all") {
    $countQueryString = $countQueryString . " and personal.gender IS NOT NULL";
} else {
    $countQueryString = $countQueryString . " and personal.gender='" . $gender . "'";
}

if ($religion == "Select below:" || $religion == "") {
    $countQueryString = $countQueryString . "";
} elseif ($religion == "all") {
    $countQueryString = $countQueryString . " and social.religion<>''";
} else {
    $countQueryString = $countQueryString . " and social.religion='" . $religion . "'";
}

if ($hs == "Select below:" || $hs == "") {
    $countQueryString = $countQueryString . "";
} elseif ($hs == "all") {
    $countQueryString = $countQueryString . " and personal.hs IS NOT NULL";
} else {
    $countQueryString = $countQueryString . " and personal.hs='" . $hs . "'";
}

if ($city == "Select below:" || $city == "") {
    $countQueryString = $countQueryString . "";
} elseif ($city == "all") {
    $countQueryString = $countQueryString . " and personal.presentCity IS NOT NULL";
} else {
    $countQueryString = $countQueryString . " and personal.presentCity='" . $city . "'";
}

if ($stanine == "Select below:" || $stanine == "") {
    $countQueryString = $countQueryString . "";
} elseif ($stanine == "all") {
    $countQueryString = $countQueryString . " and personal.stanine IS NOT NULL";
} else {
    $countQueryString = $countQueryString . " and personal.stanine='" . $stanine . "'";
}

if ($income == "Select below:" || $income == "") {
    $countQueryString = $countQueryString . "";
} elseif ($income == "all") {
    $countQueryString = $countQueryString . " and economic.income IS NOT NULL";
} else {
    $countQueryString = $countQueryString . " and economic.income='" . $income . "'";
}

while ($yearFrom < $yearTo) {
    $schoolYear = $yearFrom . "-" . ($yearFrom + 1);
    if ($course == "all") {
        foreach ($courseHead as $crs => $val) {
            $countQueryStringAll = $countQueryString . " and personal.course LIKE '%" . $val . "%' and personal.schoolYr LIKE '%" . $schoolYear . "%'";
            $countQuery          = mysqli_query($connection, $countQueryStringAll);
            $countQueryArray     = mysqli_fetch_array($countQuery);
            $countQueryRows      = mysqli_num_rows($countQuery);

            switch ($val) {
                case 'BSIT':
                    array_push($bsitMaleGenderData, (int) $countQueryArray['maleCount']);
                    array_push($bsitFemaleGenderData, (int) $countQueryArray['femaleCount']);

                    array_push($bsitStatusSingleData, (int) $countQueryArray['statusSingleCount']);
                    array_push($bsitStatusMarriedData, (int) $countQueryArray['statusMarriedCount']);
                    array_push($bsitStatusWidowedData, (int) $countQueryArray['statusWidowedCount']);

                    array_push($bsitHsPublicTypeData, (int) $countQueryArray['hsPublicCount']);
                    array_push($bsitHsPrivateTypeData, (int) $countQueryArray['hsPrivateCount']);

                    break;
                case 'BSE':
                    array_push($bsedMaleGenderData, (int) $countQueryArray['maleCount']);
                    array_push($bsedFemaleGenderData, (int) $countQueryArray['femaleCount']);

                    array_push($bsedStatusSingleData, (int) $countQueryArray['statusSingleCount']);
                    array_push($bsedStatusMarriedData, (int) $countQueryArray['statusMarriedCount']);
                    array_push($bsedStatusWidowedData, (int) $countQueryArray['statusWidowedCount']);

                    array_push($bsedHsPublicTypeData, (int) $countQueryArray['hsPublicCount']);
                    array_push($bsedHsPrivateTypeData, (int) $countQueryArray['hsPrivateCount']);

                    break;
                case 'BSFT':
                    array_push($bsftMaleGenderData, (int) $countQueryArray['maleCount']);
                    array_push($bsftFemaleGenderData, (int) $countQueryArray['femaleCount']);

                    array_push($bsftStatusSingleData, (int) $countQueryArray['statusSingleCount']);
                    array_push($bsftStatusMarriedData, (int) $countQueryArray['statusMarriedCount']);
                    array_push($bsftStatusWidowedData, (int) $countQueryArray['statusWidowedCount']);

                    array_push($bsftHsPublicTypeData, (int) $countQueryArray['hsPublicCount']);
                    array_push($bsftHsPrivateTypeData, (int) $countQueryArray['hsPrivateCount']);

                    break;
                case 'BSMB':
                    array_push($bsmbMaleGenderData, (int) $countQueryArray['maleCount']);
                    array_push($bsmbFemaleGenderData, (int) $countQueryArray['femaleCount']);

                    array_push($bsmbStatusSingleData, (int) $countQueryArray['statusSingleCount']);
                    array_push($bsmbStatusMarriedData, (int) $countQueryArray['statusMarriedCount']);
                    array_push($bsmbStatusWidowedData, (int) $countQueryArray['statusWidowedCount']);

                    array_push($bsmbHsPublicTypeData, (int) $countQueryArray['hsPublicCount']);
                    array_push($bsmbHsPrivateTypeData, (int) $countQueryArray['hsPrivateCount']);

                    break;
                case 'BPA':
                    array_push($bpaMaleGenderData, (int) $countQueryArray['maleCount']);
                    array_push($bpaFemaleGenderData, (int) $countQueryArray['femaleCount']);

                    array_push($bpaStatusSingleData, (int) $countQueryArray['statusSingleCount']);
                    array_push($bpaStatusMarriedData, (int) $countQueryArray['statusMarriedCount']);
                    array_push($bpaStatusWidowedData, (int) $countQueryArray['statusWidowedCount']);

                    array_push($bpaHsPublicTypeData, (int) $countQueryArray['hsPublicCount']);
                    array_push($bpaHsPrivateTypeData, (int) $countQueryArray['hsPrivateCount']);

                    break;
            }
        }
    } else {
        $countQuerySingleString = $countQueryString . " and personal.course LIKE'%" . $course . "%' and personal.schoolYr LIKE '%" . $schoolYear . "%'";
        $countQuerySingleString = $countQuerySingleString . " GROUP BY personal.course ORDER BY personal.course ASC;";
        $countQuery             = mysqli_query($connection, $countQuerySingleString);

        foreach ($countQuery as $key => $value) {
            array_push($courseTotalGenderMaleData, (int) $value['maleCount']);
            array_push($courseTotalGenderFemaleData, (int) $value['femaleCount']);

            array_push($courseTotalRelStatusSingleData, (int) $value['statusSingleCount']);
            array_push($courseTotalRelStatusMarriedData, (int) $value['statusMarriedCount']);
            array_push($courseTotalRelStatusWidowedData, (int) $value['statusWidowedCount']);

            array_push($courseTotalHsPublicData, (int) $value['hsPublicCount']);
            array_push($courseTotalHsPrivateData, (int) $value['hsPrivateCount']);
        }
    }
    $yearFrom++;
}

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
    // console.log(bsit);

    var hcGenderContainer = Highcharts.chart('hcGenderContainer', {
      chart: {
          type: 'column'
      },
      title: {
          text: <?php echo json_encode($hcGenderHeader); ?>
      },
      xAxis: {
          categories: skulYear
      },
      yAxis: {
          allowDecimals: false,
          min: 0,
          title: {
              text: 'Gender Count'
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
      <?php if ($course == "all") {?>
      series: [{
        color: '#82b1ff',
        name: "Male",
        data: <?php echo json_encode($bsitMaleGenderData); ?>,
        stack: 'BSIT'
      }, {
        color: '#82b1ff',
        name: "Male",
        linkedTo:':previous',
        data: <?php echo json_encode($bsedMaleGenderData); ?>,
        stack: 'BSED'
      }, {
        color: '#82b1ff',
        name: "Male",
        linkedTo:':previous',
        data: <?php echo json_encode($bsftMaleGenderData); ?>,
        stack: 'BSFT'
      }, {
        color: '#82b1ff',
        name: "Male",
        linkedTo:':previous',
        data: <?php echo json_encode($bsmbMaleGenderData); ?>,
        stack: 'BSMB'
      }, {
        color: '#82b1ff',
        name: "Male",
        linkedTo:':previous',
        data: <?php echo json_encode($bpaMaleGenderData); ?>,
        stack: 'BPA'
      }, {
        color: '#ffb2ff',
        name: "Female",
        data: <?php echo json_encode($bsitFemaleGenderData); ?>,
        stack: 'BSIT'
      }, {
        color: '#ffb2ff',
        name: "Female",
        linkedTo:':previous',
        data: <?php echo json_encode($bsedFemaleGenderData); ?>,
        stack: 'BSED'
      }, {
        color: '#ffb2ff',
        name: "Female",
        linkedTo:':previous',
        data: <?php echo json_encode($bsftFemaleGenderData); ?>,
        stack: 'BSFT'
      }, {
        color: '#ffb2ff',
        name: "Female",
        linkedTo:':previous',
        data: <?php echo json_encode($bsmbFemaleGenderData); ?>,
        stack: 'BSMB'
      }, {
        color: '#ffb2ff',
        name: "Female",
        linkedTo:':previous',
        data: <?php echo json_encode($bsmbFemaleGenderData); ?>,
        stack: 'BPA'
      }]
      <?php } else {?>
      series: [{
        color: '#82b1ff',
        name: "Male",
        data: <?php echo json_encode($courseTotalGenderMaleData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }, {
        color: '#ffb2ff',
        name: "Female",
        data: <?php echo json_encode($courseTotalGenderFemaleData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }]
      <?php }?>
    });

    var hcStatusContainer = Highcharts.chart('hcStatusContainer', {
      chart: {
          type: 'column'
      },
      title: {
          text: <?php echo json_encode($hcStatusHeader); ?>
      },
      xAxis: {
          categories: skulYear
      },
      yAxis: {
          allowDecimals: false,
          min: 0,
          title: {
              text: 'Relationship Status Count'
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
      <?php if ($course == "all") {?>
      series: [{
        color: '#84ffff',
        name: "Single",
        data: <?php echo json_encode($bsitStatusSingleData); ?>,
        stack: 'BSIT'
      }, {
        color: '#ff5252',
        name: "Married",
        data: <?php echo json_encode($bsitStatusMarriedData); ?>,
        stack: 'BSIT'
      }, {
        color: '#4527a0',
        name: "Widowed",
        data: <?php echo json_encode($bsitStatusWidowedData); ?>,
        stack: 'BSIT'
      }, {
        color: '#84ffff',
        name: "Single",
        data: <?php echo json_encode($bsedStatusSingleData); ?>,
        stack: 'BSED',
        linkedTo: ':previous'
      }, {
        color: '#ff5252',
        name: "Married",
        data: <?php echo json_encode($bsedStatusMarriedData); ?>,
        stack: 'BSED',
        linkedTo: ':previous'
      }, {
        color: '#4527a0',
        name: "Widowed",
        data: <?php echo json_encode($bsedStatusWidowedData); ?>,
        stack: 'BSED',
        linkedTo: ':previous'
      }, {
        color: '#84ffff',
        name: "Single",
        data: <?php echo json_encode($bsftStatusSingleData); ?>,
        stack: 'BSFT',
        linkedTo: ':previous'
      }, {
        color: '#ff5252',
        name: "Married",
        data: <?php echo json_encode($bsftStatusMarriedData); ?>,
        stack: 'BSFT',
        linkedTo: ':previous'
      }, {
        color: '#4527a0',
        name: "Widowed",
        data: <?php echo json_encode($bsftStatusWidowedData); ?>,
        stack: 'BSFT',
        linkedTo: ':previous'
      }, {
        color: '#84ffff',
        name: "Single",
        data: <?php echo json_encode($bsmbStatusSingleData); ?>,
        stack: 'BSMB',
        linkedTo: ':previous'
      }, {
        color: '#ff5252',
        name: "Married",
        data: <?php echo json_encode($bsmbStatusMarriedData); ?>,
        stack: 'BSMB',
        linkedTo: ':previous'
      }, {
        color: '#4527a0',
        name: "Widowed",
        data: <?php echo json_encode($bsmbStatusWidowedData); ?>,
        stack: 'BSMB',
        linkedTo: ':previous'
      }, {
        color: '#84ffff',
        name: "Single",
        data: <?php echo json_encode($bpaStatusSingleData); ?>,
        stack: 'BPA',
        linkedTo: ':previous'
      }, {
        color: '#ff5252',
        name: "Married",
        data: <?php echo json_encode($bpaStatusMarriedData); ?>,
        stack: 'BPA',
        linkedTo: ':previous'
      }, {
        color: '#4527a0',
        name: "Widowed",
        data: <?php echo json_encode($bpaStatusWidowedData); ?>,
        stack: 'BPA',
        linkedTo: ':previous'
      }, ]
      <?php } else {?>
      series: [{
        color: '#84ffff',
        name: "Single",
        data: <?php echo json_encode($courseTotalRelStatusSingleData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }, {
        color: '#ff5252',
        name: "Married",
        data: <?php echo json_encode($courseTotalRelStatusMarriedData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }, {
        color: '#4527a0',
        name: "Widowed",
        data: <?php echo json_encode($courseTotalRelStatusWidowedData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }]
      <?php }?>
    });

    var hcHschoolContainer = Highcharts.chart('hcHschoolContainer', {
      chart: {
          type: 'column'
      },
      title: {
          text: <?php echo json_encode($hcHschoolHeader); ?>
      },
      xAxis: {
          categories: skulYear
      },
      yAxis: {
          allowDecimals: false,
          min: 0,
          title: {
              text: 'High School Type Count'
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
              enabled: false
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
      <?php if ($course == "all") {?>
      series: [{
        color: '#00e676',
        name: "Public",
        data: <?php echo json_encode($bsitHsPublicTypeData); ?>,
        stack: 'BSIT'
      }, {
        color: '#00e676',
        name: "Public",
        data: <?php echo json_encode($bsedHsPublicTypeData); ?>,
        stack: 'BSED',
        linkedTo: ':previous'
      }, {
        color: '#00e676',
        name: "Public",
        data: <?php echo json_encode($bsftHsPublicTypeData); ?>,
        stack: 'BSFT',
        linkedTo: ':previous'
      }, {
        color: '#00e676',
        name: "Public",
        data: <?php echo json_encode($bsmbHsPublicTypeData); ?>,
        stack: 'BSMB',
        linkedTo: ':previous'
      }, {
        color: '#00e676',
        name: "Public",
        data: <?php echo json_encode($bpaHsPublicTypeData); ?>,
        stack: 'BPA',
        linkedTo: ':previous'
      }, {
        color: '#ffab40',
        name: "Private",
        data: <?php echo json_encode($bsitHsPrivateTypeData); ?>,
        stack: 'BSIT'
      }, {
        color: '#ffab40',
        name: "Private",
        data: <?php echo json_encode($bsedHsPrivateTypeData); ?>,
        stack: 'BSED',
        linkedTo: ':previous'
      }, {
        color: '#ffab40',
        name: "Private",
        data: <?php echo json_encode($bsftHsPrivateTypeData); ?>,
        stack: 'BSFT',
        linkedTo: ':previous'
      }, {
        color: '#ffab40',
        name: "Private",
        data: <?php echo json_encode($bsmbHsPrivateTypeData); ?>,
        stack: 'BSMB',
        linkedTo: ':previous'
      }, {
        color: '#ffab40',
        name: "Private",
        data: <?php echo json_encode($bsmbHsPrivateTypeData); ?>,
        stack: 'BPA',
        linkedTo: ':previous'
      }]
      <?php } else {?>
        series: [{
        color: '#00e676',
        name: "Public",
        data: <?php echo json_encode($courseTotalHsPublicData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }, {
        color: '#ffab40',
        name: "Private",
        data: <?php echo json_encode($courseTotalHsPrivateData); ?>,
        stack: <?php echo json_encode($courseHead[$course]); ?>
      }]
      <?php }?>
    });
});
</script>
<div id="container2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div id="hcGenderContainer" style="width: 800px; max-width: 100%; height: auto; margin: 0 auto"></div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div id="hcStatusContainer" style="width: 800px; max-width: 100%; height: auto; margin: 0 auto"></div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div id="hcHschoolContainer" style="width: 800px; max-width: 100%; height: auto; margin: 0 auto"></div>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

    </div>
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

          <!--[if lt IE 10]>
              <script src="assets/js/placeholder.js"></script>
          <![endif]-->
  </body>
  </html>