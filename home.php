<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1 user-scalable=no"/>
   <link rel="icon" href="dnsc.png" type="image/x-icon" />
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>DNSC - Home</title>
    <link rel="stylesheet" type="text/css" href="assets/css/demopage.css">
    <link rel="stylesheet" type="text/css" href="assets/jQuery-slideshow-plugin/plugin.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
     <link rel="stylesheet" type="text/css" href="/Mynormalize.css">
    <link rel="stylesheet" type="text/css" href="/Mystyle.css">
  <link rel="stylesheet" type="text/css" href="css/mobile.css">
  <script type='text/javascript' src='js/mobile.js'></script>
<style>
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 100%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>

<script>
function renderTime() {
  var currentTime = new Date();
  var diem = "AM";
  var h = currentTime.getHours();
  var m = currentTime.getMinutes();
  var s = currentTime.getSeconds();
  setTimeout('renderTime()',1000);
    if (h == 0) {
    h = 12;
  } else if (h > 12) { 
    h = h - 12;
    diem="PM";
  }
  if (h < 10) {
    h = "0" + h;
  }
  if (m < 10) {
    m = "0" + m;
  }
  if (s < 10) {
    s = "0" + s;
  }
  var myClock = document.getElementById('clockDisplay');
  myClock.textContent = h + ":" + m + ":" + s + " " + diem;
  myClock.innerText = h + ":" + m + ":" + s + " " + diem;
}
renderTime();
</script>

<style>
.clockStyle {
  background-color:#000;
  border:#999 2px inset;
  padding:6px;
  color:#0FF;
  font-family:"Arial Black", Gadget, sans-serif;
    font-size:16px;
    font-weight:bold;
  letter-spacing: 2px;
  display:inline;
}
</style>

</head>
<body>
  <div id="header">
    <h1><a href="home.php">SOCIO-ECONOMIC PROFILING &amp; GRADUATE TRACER SURVEY </a></h1>
    <ul id="navigation">
      <li class = "current">
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
      <li>
        <a href="about.php">About</a>
      </li>
      
    </ul>
  </div>
  <div id="body"> 
    <img class="headerImg"
             src="assets/images/header/iit.jpg"
             data-slideshow='assets/images/header/ied.jpg|assets/images/header/ias.jpg|assets/images/header/imagocs.jpg'><br/><br/><br/>
    <div class="content">
      <div class="article">
        <h3 style="font-family: Century Gothic;">Davao del Norte State College (DNSC)</h3><br>
        
<img id="myImg" src="assets/images/header/dnsc.png" alt="Davao del Norte State College (DNSC)" width="300" height="200">

<!-- The Modal -->
<center>
<div id="myModal" class="modal">
  <span class="close"> &times; </span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
</center>
<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    modalImg.alt = this.alt;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
}
</script>
<br>
        <h2>M I S S I O N</h2>
        <p style = "font-family: Century Gothic;">
        As an institution of higher learning and teaching excellence, informed by research and empowered to carry out extension and production services, DNSC shall:<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1. provide equitable access, quality, relevant and environment-friendly programs in instruction, research, extension;<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2. promote good governance and adopt mechanisms to continuously upgrade institutional standards;<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3. enhance capabilities and work ethics of the workers of the institution; and<br>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;4. develop appropriate linkage and network in the implementation of College programs.
        </p>
        <h2>V I S I O N</h2>
        <p style = "font-family: Century Gothic;">
        We envision the <b style = "color; green;">Davao del Norte State College</b> to be a premier institution of higher
        learning that is imbued with its core values for the development of human resources, and generation and utilization of knowledge and technology for a productive, sustainable, just and humane society.
        </p>
        <h2>C O R E &nbsp;&nbsp; V A L U E S</h2>
        <p style = "font-family: Century Gothic;">
        We commit to pursue our vision, accomplish our mission and achieve our goals through the core values of:<br></p>
        <p style="font-family: Century Gothic; text-align:center;">
          <b>Excellence</b><br>
          <b>Integrity</b><br>
          <b>Innovativeness</b><br>
          <b>Stewardship</b><br>
          <b>Love of God and Country</b>
        
        </p>
      </div>
      <div class="sidebar">
        <center>
        <canvas id="canvas" width="250" height="250" style="background-color:#333"></canvas><br><br>
        <div id="clockDisplay" class="clockStyle" ></div>
        </center>
        <h3 style="font-family: Century Gothic;">FEATURES</h3>
        <ul>
            <span>SOCIO-ECONOMIC PROFILING<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<strong>Student's socio-economic profiles </strong><a href = "redirectSocioProfiles.php" style="text-decoration: none;">(View)</a><br>
            &nbsp;&nbsp;&nbsp;&nbsp;<strong>Student's socio-economic form </strong><a href = "redirectSocioForm.php" style="text-decoration: none;";>(View)</a><br><br>
            </span>

            <span>GRADUATE TRACER SURVEY<br>
            &nbsp;&nbsp;&nbsp;&nbsp;<strong>This feature is temporarily not available <br>
            &nbsp;&nbsp;&nbsp;&nbsp;for viewing purposes.</strong><br><br>
            </span>

          <li>
          <h3 style="font-family: Century Gothic;">SOCIAL</h3>
            <span><strong>Email us at <a href = "http://www.gmail.com/" style="text-decoration: none; color:black;">dnscpanabo@gmail.com</a></strong></span>
            <span><strong>Call us at 638-4301</strong></span>
            <span><strong>Visit our website at <a href = "http://www.dnsc.edu.ph" style="text-decoration: none; color:black;">www.dnsc.edu.ph</a></strong></span>
          </li>
          <li>
          <h3 style="font-family: Century Gothic;">LOCATION</h3><br>
            <strong>For inquiries, visit us at Davao del Norte<br>
            State College located at Brgy. New<br>
            Visayas, Panabo City, Davao del Norte,<br>
            Philippines</strong>
          </li>
          <li>
          <h3 style="font-family: Century Gothic;">DNSCalendar</h3><br>
            <center>
<script language="javascript" type="text/javascript">
var day_of_week = new Array('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
var month_of_year = new Array('January','February','March','April','May','June','July','August','September','October','November','December');

//  DECLARE AND INITIALIZE VARIABLES
var Calendar = new Date();

var year = Calendar.getFullYear();     // Returns year
var month = Calendar.getMonth();    // Returns month (0-11)
var today = Calendar.getDate();    // Returns day (1-31)
var weekday = Calendar.getDay();    // Returns day (1-31)

var DAYS_OF_WEEK = 7;    // "constant" for number of days in a week
var DAYS_OF_MONTH = 31;    // "constant" for number of days in a month
var cal;    // Used for printing

Calendar.setDate(1);    // Start the calendar day at '1'
Calendar.setMonth(month);    // Start the calendar month at now


/* VARIABLES FOR FORMATTING
NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
      tags to customize your caledanr's look. */

var TR_start = '<TR>';
var TR_end = '</TR>';
var highlight_start = '<TD WIDTH="30"><TABLE CELLSPACING=0 BORDER=1 BGCOLOR=DEDEFF BORDERCOLOR=CCCCCC><TR><TD WIDTH=20><B><CENTER>';
var highlight_end   = '</CENTER></TD></TR></TABLE></B>';
var TD_start = '<TD WIDTH="40"><CENTER>';
var TD_end = '</CENTER></TD>';

/* BEGIN CODE FOR CALENDAR
NOTE: You can format the 'BORDER', 'BGCOLOR', 'CELLPADDING', 'BORDERCOLOR'
tags to customize your calendar's look.*/

cal =  '<TABLE BORDER=1 CELLSPACING=0 CELLPADDING=0 BORDERCOLOR=BBBBBB><TR><TD>';
cal += '<TABLE BORDER=0 CELLSPACING=0 CELLPADDING=2>' + TR_start;
cal += '<TD COLSPAN="' + DAYS_OF_WEEK + '" BGCOLOR="#EFEFEF"><CENTER><B>';
cal += month_of_year[month]  + '   ' + year + '</B>' + TD_end + TR_end;
cal += TR_start;

//   DO NOT EDIT BELOW THIS POINT  //

// LOOPS FOR EACH DAY OF WEEK
for(index=0; index < DAYS_OF_WEEK; index++)
{

// BOLD TODAY'S DAY OF WEEK
if(weekday == index)
cal += TD_start + '<B>' + day_of_week[index] + '</B>' + TD_end;

// PRINTS DAY
else
cal += TD_start + day_of_week[index] + TD_end;
}

cal += TD_end + TR_end;
cal += TR_start;

// FILL IN BLANK GAPS UNTIL TODAY'S DAY
for(index=0; index < Calendar.getDay(); index++)
cal += TD_start + '  ' + TD_end;

// LOOPS FOR EACH DAY IN CALENDAR
for(index=0; index < DAYS_OF_MONTH; index++)
{
if( Calendar.getDate() > index )
{
  // RETURNS THE NEXT DAY TO PRINT
  week_day =Calendar.getDay();

  // START NEW ROW FOR FIRST DAY OF WEEK
  if(week_day == 0)
  cal += TR_start;

  if(week_day != DAYS_OF_WEEK)
  {

  // SET VARIABLE INSIDE LOOP FOR INCREMENTING PURPOSES
  var day  = Calendar.getDate();

  // HIGHLIGHT TODAY'S DATE
  if( today==Calendar.getDate() )
  cal += highlight_start + day + highlight_end + TD_end;

  // PRINTS DAY
  else
  cal += TD_start + day + TD_end;
  }

  // END ROW FOR LAST DAY OF WEEK
  if(week_day == DAYS_OF_WEEK)
  cal += TR_end;
  }

  // INCREMENTS UNTIL END OF THE MONTH
  Calendar.setDate(Calendar.getDate()+1);

}// end for loop

cal += '</TD></TR></TABLE></TABLE>';

//  PRINT CALENDAR
document.write(cal);

//  End -->
</script>
</center>
          </li>
        </ul>
      </div>
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
 <script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/jquery.hammer-full.min.js"></script>
<script src="assets/jQuery-slideshow-plugin/plugin.js"> </script>
<script src="assets/js/demo.js"></script>
<script>
var canvas = document.getElementById("canvas");
var ctx = canvas.getContext("2d");
var radius = canvas.height / 2;
ctx.translate(radius, radius);
radius = radius * 0.90
setInterval(drawClock, 1000);

function drawClock() {
  drawFace(ctx, radius);
  drawNumbers(ctx, radius);
  drawTime(ctx, radius);
}

function drawFace(ctx, radius) {
  var grad;
  ctx.beginPath();
  ctx.arc(0, 0, radius, 0, 2*Math.PI);
  ctx.fillStyle = 'white';
  ctx.fill();
  grad = ctx.createRadialGradient(0,0,radius*0.95, 0,0,radius*1.05);
  grad.addColorStop(0, '#333');
  grad.addColorStop(0.5, 'white');
  grad.addColorStop(1, '#333');
  ctx.strokeStyle = grad;
  ctx.lineWidth = radius*0.1;
  ctx.stroke();
  ctx.beginPath();
  ctx.arc(0, 0, radius*0.1, 0, 2*Math.PI);
  ctx.fillStyle = '#333';
  ctx.fill();
}

function drawNumbers(ctx, radius) {
  var ang;
  var num;
  ctx.font = radius*0.15 + "px arial";
  ctx.textBaseline="middle";
  ctx.textAlign="center";
  for(num = 1; num < 13; num++){
    ang = num * Math.PI / 6;
    ctx.rotate(ang);
    ctx.translate(0, -radius*0.85);
    ctx.rotate(-ang);
    ctx.fillText(num.toString(), 0, 0);
    ctx.rotate(ang);
    ctx.translate(0, radius*0.85);
    ctx.rotate(-ang);
  }
}

function drawTime(ctx, radius){
    var now = new Date();
    var hour = now.getHours();
    var minute = now.getMinutes();
    var second = now.getSeconds();
    //hour
    hour=hour%12;
    hour=(hour*Math.PI/6)+
    (minute*Math.PI/(6*60))+
    (second*Math.PI/(360*60));
    drawHand(ctx, hour, radius*0.5, radius*0.07);
    //minute
    minute=(minute*Math.PI/30)+(second*Math.PI/(30*60));
    drawHand(ctx, minute, radius*0.8, radius*0.07);
    // second
    second=(second*Math.PI/30);
    drawHand(ctx, second, radius*0.9, radius*0.02);
}

function drawHand(ctx, pos, length, width) {
    ctx.beginPath();
    ctx.lineWidth = width;
    ctx.lineCap = "round";
    ctx.moveTo(0,0);
    ctx.rotate(pos);
    ctx.lineTo(0, -length);
    ctx.stroke();
    ctx.rotate(-pos);
}
</script>
</body>
</html>