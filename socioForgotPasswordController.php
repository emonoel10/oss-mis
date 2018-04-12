<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

require 'PHPMailer/class.phpmailer.php';
require 'PHPMailer/class.smtp.php';

session_start(); // Starting Session
$error    = '';
$msg      = ''; // Variable To Store Error Message
$msgAdmin = '';

// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = new mysqli("localhost", "root", "", "tryit");

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

// Check if post request is from forgot password page
if (isset($_POST['account'])) {
    if (empty($_POST['account'])) {
        $msg  = "Please fill you E-mail or Username.";
        $data = array(
            'success' => false,
            'msg'     => $msg,
        );

        echo json_encode($data);
        return;
    } else {
        // Define $account and $password
        $account = $_POST['account'];
        // To protect MySQL injection for Security purpose
        $account = stripslashes($account);
        $account = $connection->real_escape_string($account);
        // SQL query to fetch information of registerd users and finds user match.
        $query = $connection->query("SELECT * FROM account WHERE username LIKE '%$account%' OR email LIKE '%$account%'");
        $rows  = $query->num_rows;
        $data  = $query->fetch_assoc();

        if ($rows > 0) {
            $accountId       = $data['id'];
            $accountEmail    = $data['email'];
            $accountPassword = $data['pass'];

            // Check if reset account is exist
            $resetPasswordCheckerQuery = $connection->query("SELECT * FROM socioResetPassword WHERE account_id = '$accountId' AND is_reset = '0';");
            $resetPasswordRows         = $resetPasswordCheckerQuery->num_rows;
            $resetPasswordRowData      = $resetPasswordCheckerQuery->fetch_assoc();

            // if reset account is not exist, generate uuid token and record
            // else get the existing uuid token to send again
            if ($resetPasswordRows == 0 || gettype($resetPasswordRows) == "undefined") {
                $uuidToken = password_hash($accountPassword, PASSWORD_DEFAULT);

                $setPasswordTokenQuery = $connection->query("INSERT INTO socioResetPassword (account_id, uuid_token, date_created) VALUES ('$accountId', '$uuidToken', NOW());");

                if ($connection->affected_rows == 0) {
                    $msg = "Error creating token!";

                    $data = array(
                        'success'    => false,
                        'msg'        => $msg,
                        'mailStatus' => error_get_last(),
                    );

                    echo json_encode($data);
                    return;
                }
            } else {
                $uuidToken = $resetPasswordRowData['uuid_token'];
            }

            if ($uuidToken !== '') {
                $baseUrl     = sprintf("%s://%s%s", isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http', $_SERVER['SERVER_NAME'], rtrim(dirname($_SERVER['PHP_SELF']), '/\\'));
                $mailTo      = $accountEmail;
                $mailFrom    = "admin.ossmis@gmail.com"; // change to administrator's email address
                $mailSubject = "OSS-MIS ADMIN: Reset Password for " . $accountEmail;

                $mail          = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // GMail username
                // change with active GMail account from developer/system administrator
                $mail->Username = "emonoel10@gmail.com";
                // GMail password
                // change with password from username set above
                $mail->Password   = "pangit_123";
                $mail->SMTPSecure = "ssl";
                // sets GMail as the SMTP server
                // can change according to the
                // web hosting SMTP Default Settings
                $mail->Host     = "smtp.gmail.com";
                $mail->Port     = "465"; // set the SMTP port for the GMail server
                $mail->From     = $mailFrom;
                $mail->FromName = 'OSS-MIS ADMIN';
                $mail->AddAddress($mailTo, $mail->FromName);
                $mail->Subject = $mailSubject;
                $mail->IsHTML(true);
                $mailMsg    = "Good day!<br><br>Please click the <a href='$baseUrl/socioForgotPasswordConfirm.php?id=$accountId&key=$uuidToken'>link</a> to reset your password on DNSC OSS-MIS System.<br><br>If the link is not working, please copy-paste the text to your browsers URL: ($baseUrl/socioForgotPasswordConfirm.php?id=$accountId&key=$uuidToken).<br><br><br>OSS-MIS Admin";
                $mail->Body = $mailMsg;

                if ($mail->Send()) {
                    $msg = 'Please check your email (' . $accountEmail . ') to get the password reset token link.';

                    $data = array(
                        'success' => true,
                        'msg'     => $msg,
                    );

                    echo json_encode($data);
                    return;
                } else {
                    $msg = "Error sending email!";

                    $data = array(
                        'success'    => false,
                        'msg'        => $msg,
                        'mailStatus' => error_get_last(),
                    );

                    echo json_encode($data);
                    return;
                }
            } else {
                $msg = "Token error!";

                $data = array(
                    'success' => false,
                    'msg'     => $msg,
                );

                echo json_encode($data);
                return;
            }
        } else {
            $msg  = "Email or Username not existed.";
            $data = array(
                'success' => false,
                'msg'     => $msg,
            );

            echo json_encode($data);
            return;
        }

        mysqli_close($connection); // Closing Connection
    }
}

/**
 * Check if confirm password form
 * is submitted
 */
if (isset($_POST['newAccountPassword'])) {
    $newAccountGradId    = $_POST['newAccountGradId'];
    $newAccountUuidToken = $_POST['newAccountUuidToken'];
    $newAccountPassword  = $_POST['newAccountPassword'];
    $newAccountPassword  = md5($newAccountPassword);

    $resetPasswordQuery = $connection->query("UPDATE account SET pass='$newAccountPassword' WHERE id='$newAccountGradId'");

    if ($connection->affected_rows > 0) {
        $doneResetPasswordQuery = $connection->query("UPDATE socioResetPassword SET is_reset = '1', date_updated = NOW() WHERE account_id='$newAccountGradId' AND uuid_token = '$newAccountUuidToken';");

        if ($connection->affected_rows > 0) {
            $msg = "Reset Password Successful!";

            $data = array(
                'success' => true,
                'msg'     => $msg,
            );

            echo json_encode($data);
            return;
        } else {
            $msg  = "Error updating reset password token.";
            $data = array(
                'success' => false,
                'msg'     => $msg,
            );

            echo json_encode($data);
            return;
        }
    } else {
        $msg  = "Account password already existed.";
        $data = array(
            'success' => false,
            'msg'     => $msg,
        );

        echo json_encode($data);
        return;
    }
}
