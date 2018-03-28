<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>DNSC</title>
  
  <script type='text/javascript' src='js/mobile.js'></script>
  
      <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="css3/reset.css">
        <link rel="stylesheet" href="css3/style.css">
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
</head>
<body>

  <div id="header">
    <h1><a href="index.html">DAVAO DEL NORTE STATE COLLEGE <span>Socio-Economic Profiling &amp; Graduate Tracer Survey</span></a></h1>
    <ul id="navigation">
      <li>
        <a href="home.php">Home</a>
      </li>
      <li>
        <a href="redirectSocioProfiles.php">Socio-Economic</a>
        <ul>
          <li>
            <a href="redirectSocioForm.php">Socio Form</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="redirectGraduates.php">Graduates</a>
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
<div class="content">
<br><br><br><br><center><br><br><br><br>
<p style="font-family: Century Gothic;">Redirecting to DNSC Graduates, please wait...</p>
<canvas id="my_canvas" width="70" height="70" style="border:1px #CCC;"></canvas>
<script>
var ctx = document.getElementById('my_canvas').getContext('2d');
var al = 0;
var start = 4.72;
var cw = ctx.canvas.width;
var ch = ctx.canvas.height; 
var diff;
function progressSim(){
  diff = ((al / 100) * Math.PI*2*10).toFixed(2);
  ctx.clearRect(0, 0, cw, ch);
  ctx.lineWidth = 10;
  ctx.fillStyle = '#09F';
  ctx.strokeStyle = "#09F";
  ctx.textAlign = 'center';
  ctx.fillText(al+'%', cw*.5, ch*.5+2, cw);
  ctx.beginPath();
  ctx.arc(35, 35, 30, start, diff/10+start, false);
  ctx.stroke();
  if(al >= 100){
    clearTimeout(sim);
      // Add scripting here that will run when progress completes
      window.location.href = "graduates.php";
  }
  al++;
}
var sim = setInterval(progressSim, 50);
</script>
</center>
</section>
</div>
</div>
</div>
</center>
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