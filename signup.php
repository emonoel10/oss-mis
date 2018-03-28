      <?php
      ini_set('mysql.connection_timeout', 300);
      ini_set('default_socket_timeout', 300);
      ?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
<head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="dnsc.png" type="image/x-icon" />
    <meta name="author" content="Shahrukh Khan">
    <meta name="description" content="Login System with Github using OAuth PHP and MySQL">
    <meta name="keywords" content="php,mysql,Github,oauth,social logins,thesoftwareguy">
    <meta name="title" content="Login System with Github using OAuth PHP and MySQL">

  <meta name="viewport" content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
  <link type="text/css" rel="stylesheet" href="popupmodal/css/style.css" />
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/mobile.css">
  <link href="css/styleGrad.css" type="text/css" rel="stylesheet">
  <title>DNSC - Registration</title>
  
  <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">

  <!-- Bootstrap -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="bootstrap/html5shiv.js"></script>
      <script src="bootstrap/respond.min.js"></script>
    <![endif]-->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script type='text/javascript' src='js/mobile.js'></script>
<script type="text/javascript" src="popupmodal/js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="popupmodal/js/jquery.leanModal.min.js"></script>

<script>
    function checkPass()
{
    //Store the password field objects into variables ...
    var pass1 = document.getElementById('pass1');
    var pass2 = document.getElementById('pass2');
    //Store the Confimation Message Object ...
    var message = document.getElementById('confirmMessage');
    //Set the colors we will be using ...
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    //Compare the values in the password field 
    //and the confirmation field
    if(pass1.value == pass2.value){
        //The passwords match. 
        //Set the color to the good color and inform
        //the user that they have entered the correct password 
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
    }else{
        //The passwords do not match.
        //Set the color to the bad color and
        //notify the user.
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
    }
}  
</script>

<style>
/* Full-width input fields */
input[type=text] {
    width: 49.6%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[name=uname] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=email] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

.container {
    padding: 16px;
}


/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}
    
@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
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
  <img src="images/socio.jpg" width="100%">
<hr>
<br><br><br><fieldset><legend><h1 style="font-family: Century Gothic; font-size: 50px;">Register</h1></legend>


  <br><h1 style="font-family: Century Gothic; color: black;">Be a member now. Register here!</h1>
  <center><p style="font-family: Arial; color: red;"><?php echo $_GET['error']; ?></p></center>
  <form class="modal-content animate" action="action_page.php" method="post" enctype="multipart/form-data">
    <div class="container">
      <h2 style="font-family: Century Gothic; color: gray; text-align: center;">• Create your account •</h2>
      <label style="font-family: Century Gothic;"><b>COMPLETE NAME</b></label>
      <input type="text" style="width: 32.5%;" placeholder="First Name" name="fname" required>
      <input type="text" style="width: 32.5%;" placeholder="Middle Name" name="mname">
      <input type="text" style="width: 32.5%;" placeholder="Last Name" name="lname" required>

      <label style="font-family: Century Gothic;"><b>EMAIL ADDRESS</b></label>
      <input type="email" placeholder="yourname@email.com" name="email">

      <label style="font-family: Century Gothic;"><b>SCHOOL ID</b></label>
      <input type="text" style="width: 100%;" placeholder="School ID" name="schId">

      <label style="font-family: Century Gothic;"><b>USERNAME</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label style="font-family: Century Gothic;"><b>PASSWORD</b></label>
      <input type="password" placeholder="Enter Password" id = "pass1" name="psw" required>
      
      <label style="font-family: Century Gothic;"><b>CONFIRM PASSWORD</b></label>
      <input type="password" onkeyup="checkPass(); return false;" placeholder="Enter Password" id = "pass2" name="cpsw" required>
      <span id="confirmMessage" class="confirmMessage"></span>
      <label style="font-family: Century Gothic;"><b>YOUR PROFILE PICTURE</b></label><br>
      <input type="file" name="image" accept="image/*"><br><br>
      <button type="submit" onclick="validate()" name="submit_sign" id = "submit_sign">Sign Up</button>
    </div>
  </form>
</div>
  </form>
</div>
</fieldset>
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
</body>
</html>