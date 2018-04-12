<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

include 'socioForgotPasswordController.php';

if (isset($_SESSION['login_user'])) {
    header("location: home.php");
}

?>
<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>
    <head>
        <meta charset="utf-8">
        <meta content="IE=edge" http-equiv="X-UA-Compatible"/>
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <link href="dnsc.png" rel="icon" type="image/x-icon"/>
        <meta content="Shahrukh Khan" name="author"/>
        <meta content="Login System with Github using OAuth PHP and MySQL" name="description"/>
        <meta content="php,mysql,Github,oauth,social logins,thesoftwareguy" name="keywords"/>
        <meta content="Login System with Github using OAuth PHP and MySQL" name="title"/>
        <meta content="user-scalable=0, width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" name="viewport"/>
        <link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet"/>
        <link href="popupmodal/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/style.css" rel="stylesheet" type="text/css"/>
        <link href="css/mobile.css" rel="stylesheet" type="text/css"/>
        <link href="css/styleGrad.css" rel="stylesheet" type="text/css"/>
        <title>
            DNSC - Confirm Reset Password
        </title>
        <link href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500" rel="stylesheet">
        <!-- Bootstrap -->
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="bootstrap/html5shiv.js"></script>
        <script src="bootstrap/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- <script src="js/mobile.js" type="text/javascript"></script> -->
        <script src="popupmodal/js/jquery-1.11.0.min.js" type="text/javascript">
        </script>
        <script src="popupmodal/js/jquery.leanModal.min.js" type="text/javascript">
        </script>
        <style>
            /* Full-width input fields */
            input[type=text] {
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


            /* Extra styles for the cancel button */
            .cancelbtn {
                width: auto;
                padding: 10px 18px;
                background-color: #f44336;
            }

            /* Center the image and position the close button */
            .imgcontainer {
                text-align: center;
                margin: 24px 0 12px 0;
                position: relative;
            }

            img.avatar {
                width: 40%;
                border-radius: 50%;
            }

            .container {
                padding: 16px;
            }

            span.psw {
                float: left;
                padding-top: 16px;
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

            /* The Close Button (x) */
            .close {
                position: absolute;
                right: 25px;
                top: 0;
                color: #000;
                font-size: 35px;
                font-weight: bold;
            }

            .close:hover,
            .close:focus {
                color: red;
                cursor: pointer;
            }

            /* Add Zoom Animation */
            .animate {
                -webkit-animation: animatezoom 0.6s;
                animation: animatezoom 0.6s
            }

            /* */
            .link_guide {
                color: #007577;
                font-size: 18px;
                padding: 0 46px;
                text-align: center;
                text-decoration: none;
                text-transform: uppercase;
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
            <h1>
                <a href="home.php">
                    SOCIO-ECONOMIC PROFILING &#38; GRADUATE TRACER SURVEY
                </a>
            </h1>
            <ul id="navigation">
                <li>
                    <a href="home.php">
                        Home
                    </a>
                </li>
                <li>
                    <a href="socioLogin.php">
                        Socio-Economic
                    </a>
                    <ul>
                        <li>
                            <a href="socioLogin.php">
                                Socio Form
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="graduatesLogin.php">
                        Graduates
                    </a>
                </li>
                <li>
                    <a href="about.php">
                        About
                    </a>
                </li>
            </ul>
        </div>
        <div id="body">
            <img src="images/socio.jpg" width="100%"/>
            <?php if (isset($_GET['id']) && isset($_GET['key'])) {
    ?>
                <?php
$connection          = new mysqli("localhost", "root", "", "tryit");
    $resetPasswordGradId = $_GET['id'];
    $uuidToken           = $_GET['key'];

    // Get account data
    $accountDataQuery = $connection->query("SELECT * FROM account WHERE id = '$resetPasswordGradId';");

    // Check if reset account is exist
    $resetPasswordCheckerQuery = $connection->query("SELECT * FROM socioResetPassword WHERE account_id = '$resetPasswordGradId' AND is_reset = '0';");

    $accountDataRows        = $accountDataQuery->num_rows;
    $confirmPasswordRows    = $resetPasswordCheckerQuery->num_rows;
    $accountDataRowData     = $accountDataQuery->fetch_assoc();
    $confirmPasswordRowData = $resetPasswordCheckerQuery->fetch_assoc();

    $passwordHash = password_verify($accountDataRowData['pass'], $uuidToken);
    ?>
                    <?php if ($confirmPasswordRows > 0 && $passwordHash) {?>
                        <?php if ($confirmPasswordRowData['is_reset'] == 0) {?>
                        <hr>
                            <h3 style="color: #077054; font-family: latoregular;">
                                <center>
                                    FILL UP YOUR NEW PASSWORD IN THE FORM BELOW.
                                </center>
                            </h3>
                        </hr>
                        <fieldset>
                            <legend>
                                <h1 style="font-family: Century Gothic; font-size: 50px;">
                                    Confirm New Password
                                </h1>
                            </legend>
                            <form class="modal-content animate" id="confirmResetPasswordForm" method="POST">
                                <div class="container">
                                    <div class="form-control">
                                        <label style="font-family: Century Gothic;">
                                            <i aria-hidden="true" class="fa fa-address-book">
                                            </i>
                                            <b>
                                                New Password
                                            </b>
                                        </label>
                                        <input name="newAccountGradId" required="" type="hidden" value="<?php echo $resetPasswordGradId; ?>"/>
                                        <input name="newAccountUuidToken" required="" type="hidden" value="<?php echo $uuidToken; ?>"/>
                                        <input name="newAccountPassword" required="" type="password"/>
                                        <p class="help-block error_cntnr" style="color: red;">
                                            <?php echo $error; ?>
                                        </p>
                                    </div>
                                    <button name="confirmResetPasswordSubmit" id="confirmResetPasswordSubmit" type="submit">
                                        Reset Password
                                    </button>
                                    <br>
                                        <br>
                                        </br>
                                    </br>
                                </div>
                            </form>
                        </fieldset>
                        <?php } else {?>
                        <hr>
                            <br>
                                <br>
                                    <br>
                                        <h3 style="color: #077054; font-family: latoregular;">
                                            <center>
                                                USER PASSWORD ALREADY RESET!
                                                <br>
                                                    PLEASE USE THE LINKS BELOW TO REDIRECT.
                                                </br>
                                            </center>
                                        </h3>
                                    </br>
                                </br>
                            </br>
                        </hr>
                        <br>
                            <br>
                                <center>
                                    <a class="link_guide" href="home.php">
                                        Home
                                    </a>
                                    |
                                    <a class="link_guide" href="login.php">
                                        Login
                                    </a>
                                    |
                                    <a class="link_guide" href="forgotPassword.php">
                                        Forgot Password?
                                    </a>
                                </center>
                            </br>
                        </br>
                        <?php }?>
                    <?php } else {?>
                    <hr>
                        <br>
                            <br>
                                <br>
                                    <h3 style="color: #077054; font-family: latoregular;">
                                        <center>
                                            USER RESET PASSWORD TOKEN RECORD NOT FOUND!
                                            <br>
                                                PLEASE CONTACT THE ADMINISTRATOR.
                                            </br>
                                        </center>
                                    </h3>
                                </br>
                            </br>
                        </br>
                    </hr>
                    <br>
                        <br>
                            <center>
                                <a class="link_guide" href="home.php">
                                    Home
                                </a>
                                |
                                <a class="link_guide" href="login.php">
                                    Login
                                </a>
                                |
                                <a class="link_guide" href="forgotPassword.php">
                                    Forgot Password?
                                </a>
                            </center>
                        </br>
                    </br>
                    <?php }?>
                <?php } else {?>
                <hr>
                    <br>
                        <br>
                            <br>
                                <h3 style="color: #077054; font-family: latoregular;">
                                    <center>
                                        SOMETHING WENT WRONG WITH YOUR LINK!
                                    </center>
                                </h3>
                            </br>
                        </br>
                    </br>
                </hr>
                <br>
                    <br>
                        <center>
                            <a class="link_guide" href="home.php">
                                Home
                            </a>
                            |
                            <a class="link_guide" href="login.php">
                                Login
                            </a>
                            |
                            <a class="link_guide" href="forgotPassword.php">
                                Forgot Password?
                            </a>
                        </center>
                    </br>
                </br>
            <?php }?>
        </div>
        <div class="alert alert-danger" id="alertError" style="width:250px; height:auto; bottom:0; right:10px; position:fixed; display:none; padding-top:15px; padding-right:25px;">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><div id="alertHeaderText"><i class="icon fa fa-warning" id="alert_icon"></i>Error!</div></h4>
            <div id="alertErrorText"></div>
        </div>
        <div id="footer">
            <div>
                <span>
                    Davao del Norte State College est. 1995
                </span>
                <p>
                    Brgy. New Visayas, Panabo City, Davao del Norte, Philippines, 8105. All rights reserved.
                </p>
            </div>
            <div id="connect">
                <a href="https://facebook.com" id="facebook" target="_blank">
                    Facebook
                </a>
                <a href="https://twitter.com" id="twitter" target="_blank">
                    Twitter
                </a>
                <a href="https://google.com" id="googleplus" target="_blank">
                    Google+
                </a>
            </div>
        </div>
        <script src="assets/js/socioForgotPassword.js" type="text/javascript">
        </script>
    </body>
</html>
