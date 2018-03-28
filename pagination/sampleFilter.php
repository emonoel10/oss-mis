  <?php
include 'session2.php';

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
    <?php
$selected = $_POST['selected'];
?>
          $("#btnPrint").live("click", function () {
              var divContents = $("#dvContainer").html();
              var printWindow = window.open('', '', 'height=400,width=800');
              printWindow.document.write('<html><head><title>Generate Report</title>');
              printWindow.document.write('</head><body><center><table padding=20><tr><td><img src=dnsc.png width=90 height=90></td><td><br><h3>&nbsp;&nbsp;&nbsp;&nbsp;Republic of the Philippines<br>&nbsp;&nbsp;&nbsp;&nbsp;DAVAO DEL NORTE STATE COLLEGE<br>&nbsp;&nbsp;&nbsp;&nbsp;New Visayas, Panabo City </h3></td></tr></table><hr><br><br><p style=float:right;>Date: November 10, 2016</p></center>');
              printWindow.document.write(divContents);
              printWindow.document.write('</body></html>');
              printWindow.document.close();
              printWindow.print();
          });
  </script>
<script type="text/javascript">
   function printDiv(divId) {
       var printContents = document.getElementById(divId).innerHTML;
       var originalContents = document.body.innerHTML;
       document.body.innerHTML = "<html><head><title>Report</title></head><body>" + printContents + "</h3></body></html>";

       window.print();
       document.body.innerHTML = originalContents;
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
$db_select = mysqli_select_db("tryit", $connection);
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
    "Bachelor of Science in Education (BSEd)"              => "BSED",
    "Bachelor of Science in Food Technology (BSFT)"        => "BSFT",
    "Bachelor of Science in Marine Biology (BSMB)"         => "BSMB",
    "Bachelor of Public Administration (BPA)"              => "BPA",
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
    $genquery          = "SELECT * FROM personal INNER JOIN social ON personal.username = social.username INNER JOIN economic ON economic.username = personal.username WHERE personal.username<>''";
    $filter["Course:"] = $course;
    if ($gender != "Select below:" && $gender != "all") {
        $genquery          = $genquery . " and personal.gender='$gender'";
        $filter["Gender:"] = $gender;
    }
    if ($religion != "Select below:" && $religion != "all") {
        $genquery            = $genquery . " and social.religion='$religion'";
        $filter["Religion:"] = $religion;
    }
    if ($hs != "Select below:" && $hs != "all") {
        $genquery               = $genquery . " and personal.hs='$hs'";
        $filter["High School:"] = $hs;
    }
    if ($city != "Select below:" && $city != "all") {
        $genquery        = $genquery . " and personal.presentCity='$city'";
        $filter["City:"] = $city;
    }
    if ($stanine != "Select below:" && $stanine != "all") {
        $genquery           = $genquery . " and personal.stanine='$stanine'";
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
 <input type = "button" onclick="printDiv('printableArea')" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" />

<div id="printableArea"><br><br><br><br>
<img src='images/dnsc.png' style='margin-top: -18px; width: 120px; height: 120px; position: absolute; margin-left: 30px;'><div style='margin-left: 150px; color: black; font-family: Times New Roman; line-height: 1.3; padding: 2px 0;width: 400px; margin: 20px auto absolute;'>Republic of the Philippines<br><span style = 'font-size: 16px;'><b>DAVAO DEL NORTE STATE COLLEGE</b></span><br>New Visayas, Panabo City, Davao del Norte, Philippines 8105<br>Website: www.dnsc.edu.ph; Telephone #: 63 84 6284301; 6288203<br>Email Address: president@dnsc.edu.ph; jab@dnsc.edu.ph <br><b>______________________________________________________________________________________________</b></div>
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
                $thequery = $genquery . " and personal.course='$crs' and personal.schoolYr='$sy'";
                $result   = mysqli_query($thequery, $connection);
                $num_rows = mysqli_num_rows($result);
                echo "<td>" . $num_rows . "</td>";
                if ($val == "BSIT") {
                    array_push($totBSIT, $num_rows);
                } elseif ($val == "BSED") {
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
            $thequery = $genquery . " and personal.course='$course' and personal.schoolYr='$sy'";
            $result   = mysqli_query($thequery, $connection);
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
    $txtHead = "ALL COURSES OF S.Y.";
} else {
    $txtHead = $courseHead[$course] . " OF S.Y.";
}
if (count($scYear) == 1) {
    $txtHead = $txtHead . " " . $scYear[0];
} else {
    $txtHead = $txtHead . " " . $scYear[0] . " TO " . $scYear[count($scYear) - 1];
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
        <?php
if ($course == "all") {
    ?>
        series: [{
            name: "BSIT",
            data: <?php echo json_encode($totBSIT); ?>
          }, {
            name: "BSEd",
            data: <?php echo json_encode($totBSED); ?>
          }, {
            name: "BSFT",
            data: <?php echo json_encode($totBSFT); ?>
          }, {
            name: "BSMB",
            data: <?php echo json_encode($totBSMB); ?>
          }, {
            name: "BPA",
            data: <?php echo json_encode($totBPA); ?>
          }]
        <?php } else {?>
          series: [{
            name: <?php echo json_encode($courseHead[$course]); ?>,
            data: <?php echo json_encode($totCORZ); ?>
          }]
        <?php }?>
    });
    console.log(bsit);
});
</script>
<div id="container2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<br><br>
<h3 style="color: black; font-family: Arial;">Prepared by:</h3><br><br>
<b><h2 contenteditable = "true" style="color: black; font-family: Arial Black;" spellcheck = "false"><u>MARICIELO PAULA E. FUNA</u></h2></b>
<p style="color: black; font-family: Arial;">Guidance Officer</p>
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