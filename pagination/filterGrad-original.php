<?php

include 'sessionGrad.php';

if (!(isset($_SESSION['login_grad']) && $_SESSION['login_grad'] != '')) {
    header("Location: graduatesLogin.php");
}
?>

<?php
$name = "Jemuel Orenio";
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
<script type="text/javascript">
   function printDiv(divId) {
       var printContents = document.getElementById(divId).innerHTML;
       var originalContents = document.body.innerHTML;
       document.body.innerHTML = "<html><head><title>Report</title></head><body><center><img src=dnsc.png width=90 height=90><br><h3 style='color:black; font-family:Arial;'>&nbsp;&nbsp;&nbsp;&nbsp;Republic of the Philippines<br>&nbsp;&nbsp;&nbsp;&nbsp;DAVAO DEL NORTE STATE COLLEGE<br>&nbsp;&nbsp;&nbsp;&nbsp;New Visayas, Panabo City </h3><hr></center><b style='color: black;'>Name of SUC: <b>DAVAO DEL NORTE STATE COLLEGE &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FORM SLRD 2016 KRA 1.5<br>KRA 1. QUALITY AND RELEVANCE OF INSTRUCTION<br>Item 5 Employment of Graduates</b><br><br>" + printContents + "<br><br><p style=font-size: 50px; color:black;>Prepared by: </p><br><h3 style='color:black;'> <h3><?php echo $name; ?></h3></body></html>";

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
    background-color: white;
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

<br><br>

  <h2 align = "left" style="font-family: century gothic;">Filter result/s:</h2>
  <hr>
  <div class="content">
  <p style="font-family: Century Gothic; text-align: center;">You have logged in as <b style="font-family: Arial Black;"><?php echo $login_sessionGrad; ?></b>. (<a href = "logout.php" style="text-decoration: none;">Log out</a>)
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
  <a href = "graduatesProfile.php" style="text-decoartion: none;"><input type = "button" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: left;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="< Back" /></a>
  <input type = "button" onclick="printDiv('printableArea')" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value="Print report" />
  <div id="result">
  </div>
  </div>
<div id="printableArea">
<img src='images/dnsc.png' style='margin-top: -18px; width: 120px; height: 120px; position: absolute; margin-left: 30px;'><div style='margin-left: 150px; color: black; font-family: Times New Roman; line-height: 1.3; padding: 2px 0;width: 400px; margin: 20px auto absolute;'>Republic of the Philippines<br><span style = 'font-size: 16px;'><b>DAVAO DEL NORTE STATE COLLEGE</b></span><br>New Visayas, Panabo City, Davao del Norte, Philippines 8105<br>Website: www.dnsc.edu.ph; Telephone #: 63 84 6284301; 6288203<br>Email Address: president@dnsc.edu.ph; jab@dnsc.edu.ph <br><b>______________________________________________________________________________________________</b></div>
<br><br><br>
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
$from    = $_POST['from'];
$to      = $_POST['to'];
$course  = $_POST['course'];
$work    = $_POST['work'];
$country = $_POST['country'];
$job     = $_POST['job'];

if (isset($_POST['summary'])) {
    if ($from != "From:" && $to != "To:" && $course != "Select below:") {
        if ($course == "all") {
            $maxcols    = $to - $from;
            $maxid      = $maxcols;
            $startid    = 1;
            $course     = array("BSIT", "BSED", "BSMB", "BSFT", "BPA");
            $valuesBSIT = array();
            $valuesBSED = array();
            $valuesBSMB = array();
            $valuesBSFT = array();
            $valuesBPA  = array();
            $courseSize = sizeof($course);

            for ($i = 0; $i < $maxcols; $i++) {
                $sy           = $from . "-" . ($from + 1);
                $resultBSIT   = mysqli_query("SELECT * FROM education where course = 'BSIT' and syGrad = '$sy'", $connection);
                $num_rowsBSIT = mysqli_num_rows($resultBSIT);
                $resultBSED   = mysqli_query("SELECT * FROM education where course = 'BSEd' and syGrad = '$sy'", $connection);
                $num_rowsBSED = mysqli_num_rows($resultBSED);
                $resultBSFT   = mysqli_query("SELECT * FROM education where course = 'BSFT' and syGrad = '$sy'", $connection);
                $num_rowsBSFT = mysqli_num_rows($resultBSFT);
                $resultBSMB   = mysqli_query("SELECT * FROM education where course = 'BSMB' and syGrad = '$sy'", $connection);
                $num_rowsBSMB = mysqli_num_rows($resultBSMB);
                $resultBPA    = mysqli_query("SELECT * FROM education where course = 'BPA' and syGrad = '$sy'", $connection);
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
            echo "<br><br><h1 style='color: gray; font-family: Arial;'>Summary Report Graduates Per Year</h1>";
            echo "<table class = 'summary'>\n";
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
                    echo "<td>$valuesBSMB[$i]</td>\n";
                    echo "<td>$valuesBSFT[$i]</td>\n";
                    echo "<td>$valuesBPA[$i]</td>\n";
                    $from++;
                }
                echo "</tr>";

                echo "</tr>\n";
            }

            echo "</table>\n";
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
            echo "<br><br><h1 style='color: gray; font-family: Arial;'>Summary Report</h1>";
            echo "<table class = 'summary'>\n";
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
    }
}
?>
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