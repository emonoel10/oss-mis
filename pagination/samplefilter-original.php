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
$from     = $_POST['from'];
$to       = $_POST['to'];
$religion = $_POST['religion'];
$course   = $_POST['course'];
$gender   = $_POST['gender'];
$hs       = $_POST['hs'];
$city     = $_POST['city'];
$stanine  = $_POST['stanine'];
$income   = $_POST['income'];

if (isset($_POST['summary'])) {
    ?>
 <input type = "button" onclick="printDiv('printableArea')" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" />

<div id="printableArea"><br><br><br><br>
<img src='images/dnsc.png' style='margin-top: -18px; width: 120px; height: 120px; position: absolute; margin-left: 30px;'><div style='margin-left: 150px; color: black; font-family: Times New Roman; line-height: 1.3; padding: 2px 0;width: 400px; margin: 20px auto absolute;'>Republic of the Philippines<br><span style = 'font-size: 16px;'><b>DAVAO DEL NORTE STATE COLLEGE</b></span><br>New Visayas, Panabo City, Davao del Norte, Philippines 8105<br>Website: www.dnsc.edu.ph; Telephone #: 63 84 6284301; 6288203<br>Email Address: president@dnsc.edu.ph; jab@dnsc.edu.ph <br><b>______________________________________________________________________________________________</b></div>
<br><br><br>
<h1 style='color: gray; font-family: latoregular;'>Summary Report</h1>
<?php
if ($from != "From:" && $to != "To:" && $course != "Select below:" && $gender == "Select below:") {
        if ($course == "all") {
            $maxcols    = $to - $from;
            $maxid      = $maxcols;
            $startid    = 1;
            $course     = array("BSIT", "BSED", "BSFT", "BSMB", "BPA");
            $valuesBSIT = array();
            $valuesBSED = array();
            $valuesBSMB = array();
            $valuesBSFT = array();
            $valuesBPA  = array();
            $courseSize = sizeof($course);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy           = $from . "-" . ($from + 1);
                $resultBSIT   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and schoolYr = '$sy'", $connection);
                $num_rowsBSIT = mysqli_num_rows($resultBSIT);
                $resultBSED   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Secondary Education (BSEd)' and schoolYr = '$sy'", $connection);
                $num_rowsBSED = mysqli_num_rows($resultBSED);
                $resultBSFT   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and schoolYr = '$sy'", $connection);
                $num_rowsBSFT = mysqli_num_rows($resultBSFT);
                $resultBSMB   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and schoolYr = '$sy'", $connection);
                $num_rowsBSMB = mysqli_num_rows($resultBSMB);
                $resultBPA    = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and schoolYr = '$sy'", $connection);
                $num_rowsBPA  = mysqli_num_rows($resultBPA);

                $valuesBSIT[$i] = $num_rowsBSIT;
                $valuesBSED[$i] = $num_rowsBSED;
                $valuesBSMB[$i] = $num_rowsBSMB;
                $valuesBSFT[$i] = $num_rowsBSFT;
                $valuesBPA[$i]  = $num_rowsBPA;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = table1>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$courseSize' style='text-align:center;'>COURSES</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $courseSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark'>" . $course[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td>$valuesBSIT[$i]</td>\n";
                    echo "<td>$valuesBSED[$i]</td>\n";
                    echo "<td>$valuesBSFT[$i]</td>\n";
                    echo "<td>$valuesBSMB[$i]</td>\n";
                    echo "<td>$valuesBPA[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        } else {
            $maxcols    = $to - $from;
            $maxid      = $maxcols;
            $startid    = 1;
            $courseName = array($course);
            $values     = array();
            $courseSize = sizeof($courseName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy       = $from . "-" . ($from + 1);
                $result   = mysqli_query("SELECT * FROM personal where course = '$course' and schoolYr = '$sy'", $connection);
                $num_rows = mysqli_num_rows($result);

                $values[$i] = $num_rows;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table id = 'table1' class = 'summary'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$courseSize' style='text-align:center;'>COURSE</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $courseSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark' style='text-align:center;'>" . $courseName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td style='text-align:center;'>$values[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        }
        ?><br><br><hr />
<script type="text/javascript">
$(function () {
    $('#container2').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: 'ALL COURSES OF S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2013-2014', '2014-2015', '2015-2016', '2016-2017'],
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
$i = 0;
        while ($i < 1) {
            ?>
        series: [{
            name: "BSIT",
            data: [<?php echo $valuesBSIT[$i]; ?>, <?php echo $valuesBSIT[$i + 1]; ?>, <?php echo $valuesBSIT[$i + 1 + 1]; ?>, <?php echo $valuesBSIT[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "BSEd",
            data: [<?php echo $valuesBSED[$i]; ?>, <?php echo $valuesBSED[$i + 1]; ?>, <?php echo $valuesBSED[$i + 1 + 1]; ?>, <?php echo $valuesBSED[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "BSFT",
            data: [<?php echo $valuesBSFT[$i]; ?>, <?php echo $valuesBSFT[$i + 1]; ?>, <?php echo $valuesBSFT[$i + 1 + 1]; ?>, <?php echo $valuesBSFT[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "BSMB",
            data: [<?php echo $valuesBSMB[$i]; ?>, <?php echo $valuesBSMB[$i + 1]; ?>, <?php echo $valuesBSMB[$i + 1 + 1]; ?>, <?php echo $valuesBSMB[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "BPA",
            data: [<?php echo $valuesBPA[$i]; ?>, <?php echo $valuesBPA[$i + 1]; ?>, <?php echo $valuesBPA[$i + 1 + 1]; ?>, <?php echo $valuesBPA[$i + 1 + 1 + 1]; ?>]
          }]
        <?php
$i++;
        }
        ?>
    });
});
</script>
<div id="container2" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<?php
} else if ($from != "From:" && $to != "To:" && $course != "Select below:" && $gender != "Select below") {
        if ($course == "all" && $gender == "all") {
            $maxcols          = $to - $from;
            $maxid            = $maxcols;
            $startid          = 1;
            $valuesBSITMale   = array();
            $valuesBSITFemale = array();
            $valuesBSEDMale   = array();
            $valuesBSEDFemale = array();
            $valuesBSMBMale   = array();
            $valuesBSMBFemale = array();
            $valuesBSFTMale   = array();
            $valuesBSFTFemale = array();
            $valuesBPAMale    = array();
            $valuesBPAFemale  = array();

            for ($i = 0; $i < $maxcols; $i++) {
                $sy                 = $from . "-" . ($from + 1);
                $resultBSITMale     = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Male' and schoolYr = '$sy'", $connection);
                $num_rowsBSITMale   = mysqli_num_rows($resultBSITMale);
                $resultBSITFemale   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Information Technology (BSIT)' and gender = 'Female'  and schoolYr = '$sy'", $connection);
                $num_rowsBSITFemale = mysqli_num_rows($resultBSITFemale);
                $resultBSEDMale     = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Secondary Education (BSEd)' and gender = 'Male'  and schoolYr = '$sy'", $connection);
                $num_rowsBSEDMale   = mysqli_num_rows($resultBSEDMale);
                $resultBSEDFemale   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Secondary Education (BSEd)' and gender = 'Female'  and schoolYr = '$sy'", $connection);
                $num_rowsBSEDFemale = mysqli_num_rows($resultBSEDFemale);
                $resultBSFTMale     = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Male'  and schoolYr = '$sy'", $connection);
                $num_rowsBSFTMale   = mysqli_num_rows($resultBSFTMale);
                $resultBSFTFemale   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Food Technology (BSFT)' and gender = 'Female'  and schoolYr = '$sy'", $connection);
                $num_rowsBSFTFemale = mysqli_num_rows($resultBSFTFemale);
                $resultBSMBMale     = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Male'  and schoolYr = '$sy'", $connection);
                $num_rowsBSMBMale   = mysqli_num_rows($resultBSMBMale);
                $resultBSMBFemale   = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Science in Marine Biology (BSMB)' and gender = 'Female'  and schoolYr = '$sy'", $connection);
                $num_rowsBSMBFemale = mysqli_num_rows($resultBSMBFemale);
                $resultBPAMale      = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Male'  and schoolYr = '$sy'", $connection);
                $num_rowsBPAMale    = mysqli_num_rows($resultBPAMale);
                $resultBPAFemale    = mysqli_query("SELECT * FROM personal where course = 'Bachelor of Public Administration (BPA)' and gender = 'Female'  and schoolYr = '$sy'", $connection);
                $num_rowsBPAFemale  = mysqli_num_rows($resultBPAFemale);

                $valuesBSITMale[$i]   = $num_rowsBSITMale;
                $valuesBSITFemale[$i] = $num_rowsBSITFemale;
                $valuesBSEDMale[$i]   = $num_rowsBSEDMale + 1;
                $valuesBSEDFemale[$i] = $num_rowsBSEDFemale;
                $valuesBSMBMale[$i]   = $num_rowsBSMBMale + 1;
                $valuesBSMBFemale[$i] = $num_rowsBSMBFemale;
                $valuesBSFTMale[$i]   = $num_rowsBSFTMale;
                $valuesBSFTFemale[$i] = $num_rowsBSFTFemale + 1;
                $valuesBPAMale[$i]    = $num_rowsBPAMale + 1;
                $valuesBPAFemale[$i]  = $num_rowsBPAFemale;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table id='table1' border='1' class='summary'>\n";
            echo "<tr></tr><td rowspan='3'>SCHOOL YEAR</td><td colspan = '10' style='text-align:center;'>COURSES</td>";
            echo "<tr><td colspan='2'><center>BSIT</center></td><td colspan='2'><center>BSED</center></td><td colspan='2'><center>BSFT</center></td><td colspan='2'><center>BSMB</center></td><td colspan='2'><center>BPA</center></td></tr>";
            echo "<tr>\n";
            echo "<td>Male</td><td>Female</td><td>Male</td><td>Female</td><td>Male</td><td>Female</td><td>Male</td><td>Female</td><td>Male</td><td>Female</td>";
            echo "</tr>";
            for ($i = 0; $i < $maxcols; $i++) {

                echo "<tr>";
                echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                echo "<td>$valuesBSITMale[$i]</td>\n";
                echo "<td>$valuesBSITFemale[$i]</td>\n";
                echo "<td>$valuesBSEDMale[$i]</td>\n";
                echo "<td>$valuesBSEDFemale[$i]</td>\n";
                echo "<td>$valuesBSFTMale[$i]</td>\n";
                echo "<td>$valuesBSFTFemale[$i]</td>\n";
                echo "<td>$valuesBSMBMale[$i]</td>\n";
                echo "<td>$valuesBSMBFemale[$i]</td>\n";
                echo "<td>$valuesBPAMale[$i]</td>\n";
                echo "<td>$valuesBPAFemale[$i]</td>\n";
                $from++;
            }
            echo "</tr>";
            echo "</table>\n";
            $from = $_POST['from'];
            for ($i = 0; $i < $maxcols; $i++) {
                ?>

<script type="text/javascript">
$(function () {
    $('<?php echo "#container" . $i; ?>').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: 'MALE AND FEMALE OF ALL COURSES IN S.Y. <?php echo $from . "-" . ($from + 1); ?>'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSIT', 'BSED', 'BSFT', 'BSMB', 'BPA'],
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

        series: [{
            name: "Male",
            data: [<?php echo $valuesBSITMale[$i]; ?>, <?php echo $valuesBSEDMale[$i]; ?>, <?php echo $valuesBSFTMale[$i]; ?>, <?php echo $valuesBSMBMale[$i]; ?>, <?php echo $valuesBPAMale[$i]; ?>]
          }, {
            name: "Female",
            data: [<?php echo $valuesBSITFemale[$i]; ?>, <?php echo $valuesBSEDFemale[$i]; ?>, <?php echo $valuesBSFTFemale[$i]; ?>, <?php echo $valuesBSMBFemale[$i]; ?>, <?php echo $valuesBPAFemale[$i]; ?>]
        }]
    });
});
    </script><br><hr /><br>
<div id="<?php echo "container" . $i; ?>" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

<?php
$from++;
            }
        } else {
            $maxcols    = $to - $from;
            $maxid      = $maxcols;
            $startid    = 1;
            $courseName = array($course);
            $values     = array();
            $courseSize = sizeof($courseName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy       = $from . "-" . ($from + 1);
                $result   = mysqli_query("SELECT * FROM personal where course = '$course' and schoolYr = '$sy'", $connection);
                $num_rows = mysqli_num_rows($result);

                $values[$i] = $num_rows;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$courseSize' style='text-align:center;'>COURSE</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $courseSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark' style='text-align:center;'>" . $courseName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td style='text-align:center;'>$values[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        }
    } else if ($from != "From:" && $to != "To:" && $gender != "Select below:") {
        if ($gender == "all") {
            $maxcols      = $to - $from;
            $maxid        = $maxcols;
            $startid      = 1;
            $genderName   = array("Male", "Female");
            $valuesFemale = array();
            $valuesMale   = array();
            $genderSize   = sizeof($genderName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy             = $from . "-" . ($from + 1);
                $resultMale     = mysqli_query("SELECT * FROM personal where gender = 'Male' and schoolYr = '$sy'", $connection);
                $num_rowsMale   = mysqli_num_rows($resultMale);
                $resultFemale   = mysqli_query("SELECT * FROM personal where gender = 'Female' and schoolYr = '$sy'", $connection);
                $num_rowsFemale = mysqli_num_rows($resultFemale);

                $valuesMale[$i]   = $num_rowsMale;
                $valuesFemale[$i] = $num_rowsFemale;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$genderSize' style='text-align:center;'>GENDER</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $genderSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark'>" . $genderName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td>$valuesMale[$i]</td>\n";
                    echo "<td>$valuesFemale[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
            ?>
<br><hr/><br>
<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: 'GRAPHICAL PRESENTATION BY GENDER OF S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2013-2014', '2014-2015', '2015-2016', '2016-2017'],
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
$i = 0;
            while ($i < 1) {
                ?>
        series: [{
            name: "Male",
            data: [<?php echo $valuesMale[$i]; ?>, <?php echo $valuesMale[$i + 1]; ?>, <?php echo $valuesMale[$i + 1 + 1]; ?>, <?php echo $valuesMale[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "Female",
            data: [<?php echo $valuesFemale[$i]; ?>, <?php echo $valuesFemale[$i + 1]; ?>, <?php echo $valuesFemale[$i + 1 + 1]; ?>, <?php echo $valuesFemale[$i + 1 + 1 + 1]; ?>]
         }]
        <?php
$i++;
            }
            ?>
    });
});
    </script>
<div id="container1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<?php
} else {
            $maxcols    = $to - $from;
            $maxid      = $maxcols;
            $a          = array();
            $startid    = 1;
            $genderName = array($gender);
            $values     = array();
            $genderSize = sizeof($genderName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy       = $from . "-" . ($from + 1);
                $result   = mysqli_query("SELECT * FROM personal where gender = '$gender' and schoolYr = '$sy'", $connection);
                $num_rows = mysqli_num_rows($result);

                $values[$i] = $num_rows;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$genderSize' style='text-align:center;'>GENDER</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $genderSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark' style='text-align:center;'>" . $genderName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td style='text-align:center;'>$values[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        }
    } else if ($gender != "Select below:" && $course != "Select below:") {
        if ($gender == "all" && $course == "all") {

            $startid    = 1;
            $genderName = array("Male", "Female");
            $courseName = array("Bachelor of Science in Information Technology", "Bachelor of Secondary Education", "Bachelor of Science in Food Technology", "Bachelor of Science in Marine Biology", "Bachelor of Public Administration");

            $valuesBSIT = array();
            $valuesBSED = array();
            $valuesBSFT = array();
            $valuesBSMB = array();
            $valuesBPA  = array();

            $genderSize = sizeof($genderName);
            $courseSize = sizeof($courseName);
            $maxid      = $courseSize;

            $result1    = mysqli_query("SELECT * FROM personal where gender = 'Male' and course = 'Bachelor of Science in Information Technology (BSIT)'", $connection);
            $num_rows1  = mysqli_num_rows($result1);
            $result2    = mysqli_query("SELECT * FROM personal where gender = 'Female' and course = 'Bachelor of Science in Information Technology (BSIT)'", $connection);
            $num_rows2  = mysqli_num_rows($result2);
            $result3    = mysqli_query("SELECT * FROM personal where gender = 'Male' and course = 'Bachelor of Secondary Education (BSEd)'", $connection);
            $num_rows3  = mysqli_num_rows($result3);
            $result4    = mysqli_query("SELECT * FROM personal where gender = 'Female' and course = 'Bachelor of Secondary Education (BSEd)'", $connection);
            $num_rows4  = mysqli_num_rows($result4);
            $result5    = mysqli_query("SELECT * FROM personal where gender = 'Male' and course = 'Bachelor of Science in Food Technology (BSFT)'", $connection);
            $num_rows5  = mysqli_num_rows($result5);
            $result6    = mysqli_query("SELECT * FROM personal where gender = 'Female' and course = 'Bachelor of Science in Food Technology (BSFT)'", $connection);
            $num_rows6  = mysqli_num_rows($result6);
            $result7    = mysqli_query("SELECT * FROM personal where gender = 'Male' and course = 'Bachelor of Science in Marine Biology (BSMB)'", $connection);
            $num_rows7  = mysqli_num_rows($result7);
            $result8    = mysqli_query("SELECT * FROM personal where gender = 'Female' and course = 'Bachelor of Science in Marine Biology (BSMB)'", $connection);
            $num_rows8  = mysqli_num_rows($result8);
            $result9    = mysqli_query("SELECT * FROM personal where gender = 'Male' and course = 'Bachelor of Public Administration (BPA)'", $connection);
            $num_rows9  = mysqli_num_rows($result9);
            $result10   = mysqli_query("SELECT * FROM personal where gender = 'Female' and course = 'Bachelor of Public Administration (BPA)'", $connection);
            $num_rows10 = mysqli_num_rows($result10);

            $valuesBSIT[0] = $num_rows1;
            $valuesBSIT[1] = $num_rows2;
            $valuesBSED[0] = $num_rows3;
            $valuesBSED[1] = $num_rows4;
            $valuesBSFT[0] = $num_rows5;
            $valuesBSFT[1] = $num_rows6;
            $valuesBSMB[0] = $num_rows7;
            $valuesBSMB[1] = $num_rows8;
            $valuesBPA[0]  = $num_rows9;
            $valuesBPA[1]  = $num_rows10;

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>COURSE</td><td colspan='$genderSize' style='text-align:center;'>GENDER</td></tr>";

            echo "<tr colspan=$courseSize>\n";

            echo "<td class='mark'>" . $genderName[0] . "</td>\n";
            echo "<td class='mark'>" . $genderName[1] . "</td>\n";
            echo "<tr>";
            echo "<td>" . $courseName[0] . "</td>";
            echo "<td>$valuesBSIT[0]</td>\n";
            echo "<td>$valuesBSIT[1]</td>\n";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $courseName[1] . "</td>";
            echo "<td>$valuesBSED[0]</td>\n";
            echo "<td>$valuesBSED[1]</td>\n";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $courseName[2] . "</td>";
            echo "<td>$valuesBSFT[0]</td>\n";
            echo "<td>$valuesBSFT[1]</td>\n";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $courseName[3] . "</td>";
            echo "<td>$valuesBSMB[0]</td>\n";
            echo "<td>$valuesBSMB[1]</td>\n";
            echo "</tr>";
            echo "<tr>";
            echo "<td>" . $courseName[4] . "</td>";
            echo "<td>$valuesBPA[0]</td>\n";
            echo "<td>$valuesBPA[1]</td>\n";
            echo "</tr>";

            echo "</tr>\n";

            echo "</table>\n";
            ?>

<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'MALE AND FEMALE OF ALL COURSES'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['BSIT', 'BSED', 'BSFT', 'BSMB', 'BPA'],
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
        series: [{
            name: 'Male',
            data: [<?php echo $valuesBSIT[0]; ?>, <?php echo $valuesBSED[0]; ?>, <?php echo $valuesBSFT[0]; ?>, <?php echo $valuesBSMB[0]; ?>, <?php echo $valuesBPA[0]; ?>]
        }, {
            name: 'Female',
            data: [<?php echo $valuesBSIT[1]; ?>, <?php echo $valuesBSED[1]; ?>, <?php echo $valuesBSFT[1]; ?>, <?php echo $valuesBSMB[1]; ?>, <?php echo $valuesBPA[1]; ?>]
        }]
    });
});
    </script><br><hr/><br>
<div id="container1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>

<?php
} else {
            $maxcols    = $to - $from;
            $maxid      = $maxcols;
            $a          = array();
            $startid    = 1;
            $genderName = array($gender);
            $values     = array();
            $genderSize = sizeof($genderName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy       = $from . "-" . ($from + 1);
                $result   = mysqli_query("SELECT * FROM personal where gender = '$gender' and schoolYr = '$sy'", $connection);
                $num_rows = mysqli_num_rows($result);

                $values[$i] = $num_rows;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$genderSize' style='text-align:center;'>GENDER</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $genderSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark' style='text-align:center;'>" . $genderName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td style='text-align:center;'>$values[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        }
    } else if ($from != "From:" && $to != "To:" && $religion != "Select below:") {
        if ($religion == "all") {
            $maxcols           = $to - $from;
            $maxid             = $maxcols;
            $startid           = 1;
            $religion          = array("Catholic", "Born Again Christian", "Muslim/Islam", "Protestant/Evangelical", "Others");
            $valuesCatholic    = array();
            $valuesChristian   = array();
            $valuesMuslim      = array();
            $valuesEvangelical = array();
            $valuesOthers      = array();
            $religionSize      = sizeof($religion);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy                  = $from . "-" . ($from + 1);
                $resultCatholic      = mysqli_query("SELECT * FROM personal p, social s where s.religion = 'Catholic' and p.schoolYr = '$sy' and p.username=s.username", $connection);
                $num_rowsCatholic    = mysqli_num_rows($resultCatholic);
                $resultChristian     = mysqli_query("SELECT * FROM personal p, social s where s.religion = 'Born Again Christian' and p.schoolYr = '$sy' and p.username=s.username", $connection);
                $num_rowsChristian   = mysqli_num_rows($resultChristian);
                $resultMuslim        = mysqli_query("SELECT * FROM personal p, social s where s.religion = 'Muslim/Islam' and p.schoolYr = '$sy' and p.username=s.username", $connection);
                $num_rowsMuslim      = mysqli_num_rows($resultMuslim);
                $resultEvangelical   = mysqli_query("SELECT * FROM personal p, social s where s.religion = 'Protestant/Evangelical' and p.schoolYr = '$sy' and p.username=s.username", $connection);
                $num_rowsEvangelical = mysqli_num_rows($resultEvangelical);
                $resultOthers        = mysqli_query("SELECT * FROM personal p, social s where s.religion = 'Others' and p.schoolYr = '$sy' and p.username=s.username", $connection);
                $num_rowsOthers      = mysqli_num_rows($resultOthers);

                $valuesCatholic[$i]    = $num_rowsCatholic;
                $valuesChristian[$i]   = $num_rowsChristian;
                $valuesMuslim[$i]      = $num_rowsMuslim;
                $valuesEvangelical[$i] = $num_rowsEvangelical;
                $valuesOthers[$i]      = $num_rowsOthers;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$religionSize' style='text-align:center;'>RELIGION</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $religionSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark'>" . $religion[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td>$valuesCatholic[$i]</td>\n";
                    echo "<td>$valuesChristian[$i]</td>\n";
                    echo "<td>$valuesMuslim[$i]</td>\n";
                    echo "<td>$valuesEvangelical[$i]</td>\n";
                    echo "<td>$valuesOthers[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        } else {
            $maxcols      = $to - $from;
            $maxid        = $maxcols;
            $startid      = 1;
            $religionName = array($religion);
            $values       = array();
            $religionSize = sizeof($religionName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy       = $from . "-" . ($from + 1);
                $result   = mysqli_query("SELECT * FROM social s, personal p where s.religion = '$religion' and p.username=s.username and p.schoolYr = '$sy'", $connection);
                $num_rows = mysqli_num_rows($result);

                $values[$i] = $num_rows;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$religionSize' style='text-align:center;'>COURSE</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $religionSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark' style='text-align:center;'>" . $religionName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td style='text-align:center;'>$values[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        }
        ?><br><br><hr /><br><br>
<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: 'GRAPHICAL PRESENTATION BY RELIGION OF S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2013-2014', '2014-2015', '2015-2016', '2016-2017'],
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
$i = 0;
        while ($i < 1) {
            ?>
        series: [{
            name: "Catholic",
            data: [<?php echo $valuesCatholic[$i]; ?>, <?php echo $valuesCatholic[$i + 1]; ?>, <?php echo $valuesCatholic[$i + 1 + 1]; ?>, <?php echo $valuesCatholic[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "Islam",
            data: [<?php echo $valuesMuslim[$i]; ?>, <?php echo $valuesMuslim[$i + 1]; ?>, <?php echo $valuesMuslim[$i + 1 + 1]; ?>, <?php echo $valuesMuslim[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "Protestant",
            data: [<?php echo $valuesEvangelical[$i]; ?>, <?php echo $valuesEvangelical[$i + 1]; ?>, <?php echo $valuesEvangelical[$i + 1 + 1]; ?>, <?php echo $valuesEvangelical[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "Born Again Christian",
            data: [<?php echo $valuesChristian[$i]; ?>, <?php echo $valuesChristian[$i + 1]; ?>, <?php echo $valuesChristian[$i + 1 + 1]; ?>, <?php echo $valuesChristian[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "Others",
            data: [<?php echo $valuesOthers[$i]; ?>, <?php echo $valuesOthers[$i + 1]; ?>, <?php echo $valuesOthers[$i + 1 + 1]; ?>, <?php echo $valuesOthers[$i + 1 + 1 + 1]; ?>]
        }]
        <?php
$i++;
        }
        ?>
    });
});
    </script>
<div id="container1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<?php
} else if ($from != "From:" && $to != "To:" && $stanine != "Select below:") {
        if ($stanine == "all") {
            $maxcols        = $to - $from;
            $maxid          = $maxcols;
            $startid        = 1;
            $stanine        = array("Low", "Moderate", "High");
            $valuesLow      = array();
            $valuesModerate = array();
            $valuesHigh     = array();
            $stanineSize    = sizeof($stanine);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy               = $from . "-" . ($from + 1);
                $resultLow        = mysqli_query("SELECT * FROM personal where stanine >=1 and stanine <=3 and schoolYr = '$sy'", $connection);
                $num_rowsLow      = mysqli_num_rows($resultLow);
                $resultModerate   = mysqli_query("SELECT * FROM personal where stanine >=4 and stanine <=6 and schoolYr = '$sy'", $connection);
                $num_rowsModerate = mysqli_num_rows($resultModerate);
                $resultHigh       = mysqli_query("SELECT * FROM personal where stanine >=7 and stanine <=9 and schoolYr = '$sy'", $connection);
                $num_rowsHigh     = mysqli_num_rows($resultHigh);

                $valuesLow[$i]      = $num_rowsLow;
                $valuesModerate[$i] = $num_rowsModerate;
                $valuesHigh[$i]     = $num_rowsHigh;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$stanineSize' style='text-align:center;'>STANINE</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $stanineSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark'>" . $stanine[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td>$valuesLow[$i]</td>\n";
                    echo "<td>$valuesModerate[$i]</td>\n";
                    echo "<td>$valuesHigh[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        } else {
            $maxcols     = $to - $from;
            $maxid       = $maxcols;
            $startid     = 1;
            $stanineName = array($stanine);
            $values      = array();
            $stanineSize = sizeof($stanineName);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy       = $from . "-" . ($from + 1);
                $result   = mysqli_query("SELECT * FROM personal where stanine = '$stanine' and schoolYr = '$sy'", $connection);
                $num_rows = mysqli_num_rows($result);

                $values[$i] = $num_rows;
                $from++;
            }

            $from = $_POST['from'];
            $to   = $_POST['to'];

            echo "<table class = 'summary' id = 'table1'>\n";
            echo "<tr><td rowspan='2' style='text-align:center;'>SCHOOL YEAR</td><td colspan='$stanineSize' style='text-align:center;'>STANINE</td></tr>";
            for ($i = 1; $i <= ceil($maxid / $maxcols); $i++) {
                echo "<tr colspan=$maxcols>\n";
                for ($j = 0; $j < $stanineSize; $j++) {
                    if ($startid <= $maxid) {
                        echo " <td class='mark' style='text-align:center;'>" . $stanineName[$j] . "</td>\n";
                    } else {
                        echo "<td> </td>\n";
                    }
                }

                echo "</tr>";

                for ($i = 0; $i < $maxcols; $i++) {

                    echo "<tr>";
                    echo "<td>" . $from . "-" . ($from + 1) . "</td>";
                    echo "<td style='text-align:center;'>$values[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
        }
        ?><br><br><hr /><br><br>
<script type="text/javascript">
$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'column',
        },
        title: {
            text: 'GRAPHICAL PRESENTATION BY RELIGION OF S.Y. 2013-2014 TO S.Y. 2016-2017'
        },
        subtitle: {
            text: 'Davao del Norte College'
        },
        xAxis: {
            categories: ['2013-2014', '2014-2015', '2015-2016', '2016-2017'],
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
$i = 0;
        while ($i < 1) {
            ?>
        series: [{
            name: "Low (1-3)",
            data: [<?php echo $valuesLow[$i]; ?>, <?php echo $valuesLow[$i + 1]; ?>, <?php echo $valuesLow[$i + 1 + 1]; ?>, <?php echo $valuesLow[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "Moderate (4-6)",
            data: [<?php echo $valuesModerate[$i]; ?>, <?php echo $valuesModerate[$i + 1]; ?>, <?php echo $valuesModerate[$i + 1 + 1]; ?>, <?php echo $valuesModerate[$i + 1 + 1 + 1]; ?>]
          }, {
            name: "High (7-9)",
            data: [<?php echo $valuesHigh[$i]; ?>, <?php echo $valuesHigh[$i + 1]; ?>, <?php echo $valuesHigh[$i + 1 + 1]; ?>, <?php echo $valuesHigh[$i + 1 + 1 + 1]; ?>]
         }]
        <?php
$i++;
        }
        ?>
    });
});
    </script>
<div id="container1" style="min-width: 310px; max-width: 800px; height: 400px; margin: 0 auto"></div>
<?php
} else {
        echo "<h1 style='color: gray; font-family: latoregular;'>Oops! Something went wrong. Please try again.</h1>";
    }
}

?>
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