<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <title>DNSC - Search for people</title>

  <script type='text/javascript' src='js/mobile.js'></script>

      <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="tableCSS/style.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
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

<script>
   function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>

<script type="text/javascript">
$(function(){
$(".search").keyup(function()
{
var searchid = $(this).val();
var dataString = 'search='+ searchid;
if(searchid!='')
{
  $.ajax({
  type: "POST",
  url: "search.php",
  data: dataString,
  cache: false,
  success: function(html)
  {
  $("#result").html(html).show();
  }
  });
}return false;
});

jQuery("#result").live("click",function(e){
  var $clicked = $(e.target);
  var $name = $clicked.find('.name').html();
  var decoded = $("<div/>").html($name).text();
  $('#searchid').val(decoded);
});
jQuery(document).live("click", function(e) {
  var $clicked = $(e.target);
  if (! $clicked.hasClass("search")){
  jQuery("#result").fadeOut();
  }
});
$('#searchid').click(function(){
  jQuery("#result").fadeIn();
});
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

  .filter:hover
  {
    background:#2E8B57;
    color:#00FA9A;
    cursor:pointer;
  }

  #submit
  {
    width:100px;
    border:solid 1px black;
    padding:10px;
    background-color: #2E8B57;
    font-size:14px;
  }

  #result
  {
    position:absolute;
    width:500px;
    padding:10px;
    display:none;
    margin-top:-1px;
    border-top:0px;
    overflow:hidden;
    border:1px #CCC solid;
    background-color: white;
  }
  .show
  {
    padding:10px;
    border-bottom:1px #999 dashed;
    font-size:15px;
    height:50px;
  }
  .show:hover
  {
    background:#2E8B57;
    color:#00FA9A;
    cursor:pointer;
  }
</style>

<script type="text/javascript">

function Search(aList)
{
var x=document.getElementById("search1");
var y=document.getElementById("submit");

x.disabled=(aList.selectedIndex == 0);
y.disabled=(aList.selectedIndex == 0);
}
</script>
</head>
<body>

  <div id="header">
    <h1><a href="home.php">SOCIO-ECONOMIC PROFILING &amp; GRADUATE TRACER SURVEY </a></h1>
    <ul id="navigation">
      <li>
        <a href="home.php">Home</a>
      </li>
      <li class = "current">
        <a href="socio_tbl.php">Socio-Economic</a>
        <ul>
          <li>
            <a href="socio_form.php">Socio Form</a>
          </li>
        </ul>
      </li>
      <li>
        <a href="graduates.php">Graduates</a>
      </li>
      <li>
        <a href="about.html">About</a>
      </li>

    </ul>
  </div>
<center>

<ul class="section"> <!--for demo wrap-->

<div id="container">
<div id="body">
<br><br>
<h2>STUDENT PROFILES</h2>
<hr>
<div class="content">
<!-- <form action = "filterSearch.php" method="POST">
<select name = "filter" id="filter" onchange="Search(this)">
  <option>FILTER BY:</option>
  <option>Barangay</option>
  <option>City/Municipality</option>
  <option>Province</option>
  <option>Age</option>
  <option>Course</option>
  <option>Gender</option>
  <option>Stanine</option>
</select><input type="search" class="search1" name = "search1" id="search1" disabled = "true" placeholder="Filtered searching" value="">
<input type="submit" class = "filter" disabled = true value="FILTER" id = "submit">
</form> -->
<br><br>
<input type="search" style="font-family: Century Gothic;" class="search" id="searchid" placeholder="Search for people" value="<?php echo $_GET['fullname']; ?>" /><br />
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
$id       = $_GET['id'];
$result   = mysqli_query("SELECT * FROM personal where id = $id", $connection);
$num_rows = mysqli_num_rows($result);

?>
<input type="button" onclick="printDiv('printThis')" id="print_button2" style="width: 130px; padding: 5px 8px 5px 8px;text-align: center;float: right;background-color: #02A6D8;color: #fff;text-decoration: none; margin: 10px; font-family: Century Gothic;" value = "Print report" />
<div id="printThis">


<table class="rwd-table">
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Gender</th>
    <th>Course</th>
    <th>Action</th>
  </tr>



 <?php
if (!$result) {
    die("Database query failed: " . mysqli_error());
}

while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td data-th='ID'>{$row[0]}</td>";
    echo "<td data-th='Name'>{$row[1]}, {$row[2]} {$row[3]}</td>";
    echo "<td data-th='Gender'>{$row[8]}</td>";
    echo "<td data-th='Course'>{$row[7]}</td>";
    echo "<td data-th='Action'><a href='view.php?id={$row[0]}' style = 'text-decoration: none; color: gray;'>VIEW</a> | <a href='update.php?id={$row[0]}' style = 'text-decoration: none; color: #c0c0c0;'>UPDATE</a></td>";
    echo "</tr>";
}
?>


</table>
</div>
</div>
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