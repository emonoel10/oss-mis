<?php 
$m = 500;
$f = 222;
?>

<!DOCTYPE HTML>
<html>
<head>
 <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <link rel="icon" href="dnsc.png" type="image/x-icon" />
 <script type='text/javascript' src='js/mobile.js'></script>
  
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css3/reset.css">
        <link rel="stylesheet" href="css3/style.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        <link rel="stylesheet" type="text/css" href="css/mobile.css">



           <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

<script type="text/javascript" src="js2/jquery-1.8.0.min.js"></script>


  <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $("#btnPrint").live("click", function () {
            var divContents = $("#dvContainer").html();
            var printWindow = window.open('', '', 'height=400,width=800');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body><center><img src=dnsc.png width=70 height=70><br><h1>DAVAO DEL NORTE COLLEGE <br> <h3> New Visayas, Panabo City</h3><br> REPORT </center></h1>');
            printWindow.document.write(divContents);
            printWindow.document.write('<h2>Prepared by: <br> Ariel O. Gamao </h2></body></html>');
            printWindow.document.close();
            printWindow.print();
        });
    </script>
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
      <li>
        <a href="graduatesLogin.php">Graduates</a>
      </li>
      <li class = "current">
        <a href="about.php">About</a>
      </li>
      
    </ul>
  </div>

 <input type="button" value="Print Div Contents" id="btnPrint" />

  <form id="form1">
    <div id="dvContainer">
    <script src="canvasjs.min.js"></script>
<div id="container">
<div id="body">
<script type="text/javascript">

window.onload = function () {
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "theme2",//theme1
    title:{
      text: "MALE VS. FEMALE"              
    },
    animationEnabled: false,   // change to true
    data: [              
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "column",
      dataPoints: [
        { label: "MALE",  y: <?php echo $m; ?>  },
        { label: "FEMALE", y: <?php echo $f; ?>  },
        
      ]
    }
    ]
  });
  chart.render();

  var chart2 = new CanvasJS.Chart("chartContainer2", {
    theme: "theme2",//theme1
    title:{
      text: "STUDENTS PER COURSE"              
    },
    animationEnabled: false,   // change to true
    data: [              
    {
      // Change type to "bar", "area", "spline", "pie",etc.
      type: "pie",
      dataPoints: [
        { label: "BSIT",  y: 322   },
        { label: "BSED", y: 233  },
        { label: "BSFT", y: 143  },
        { label: "BSMB", y: 150 },
        { label: "BPA", y:  200 },
        { label: "BSFi", y:  124 },
        
      ]
    }
    ]
  });
  chart2.render();
}
</script>  
<p>Number of students: 545</p>
<div id="chartContainer" style="height: 250px; width: 30%;"></div><br><br><br>
<input type = "radio" checked="true"> Yes
<img src="dnsc.png" width = "100" height="100">
<p>Number of students: 545</p>
<div id="chartContainer2" style="height: 250px; width: 30%;"></div><br><br><br>

</div>
    </form>
</div>
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
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/retina-1.1.0.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
        <script src="js3/index.js"></script>
         
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

</body>
</html> 