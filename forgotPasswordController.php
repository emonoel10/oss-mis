<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');

session_start(); // Starting Session
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
        $query = $connection->query("SELECT * FROM graduate WHERE username LIKE '%" . $account .
            "%' OR email LIKE '%" . $account .
            "%'");
        $rows = $query->num_rows;
        $data = $query->fetch_assoc();
        if ($rows == 1) {
            $accountId       = $data['id'];
            $accountEmail    = $data['email'];
            $accountPassword = $data['pass'];

            $uuidToken = password_hash($accountPassword, PASSWORD_DEFAULT);

            $setPasswordTokenQuery = $connection->query("INSERT INTO resetPassword (graduate_id, uuid_token, date_created) VALUES ('" . $accountId . "', '" . $uuidToken . "', NOW());");

            // Check if reset account is exist
            $resetPasswordCheckerQuery = $connection->query("SELECT * FROM resetPassword WHERE graduate_id = '" . $accountId . "' AND uuid_token = '" . $uuidToken . "';");
            $resetAccountRows          = $resetPasswordCheckerQuery->num_rows;

            // if reset account is not exist even it is newly recorded in database
            if ($resetAccountRows == 0) {
                if (function_exists('mail')) {
                    $mailTo      = $accountEmail;
                    $mailFrom    = "admin.ossmis@gmail.com";
                    $mailSubject = "OSS-MIS ADMIN: Reset Password for " . $accountEmail;
                    $mailMsg     = "Good day!\r\nPlease click the <a href='" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "/resetForgotPassword.php?id=" . $accountId . "&key=" . $uuidToken . "'>link</a> to reset your password on DNSC OSS-MIS System.\r\nIf the link is not working, please copy-paste the text to your browsers URL: " . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'] . "/resetForgotPassword.php?id=" . $accountId . "&key=" . $uuidToken . ".\r\n\n\nOSS-MIS Admin";
                    // $mailHeaders = 'From: ' . $mailFrom . "\r\n" .
                    // 'Reply-To: ' . $mailFrom . "\r\n" .
                    // 'X-Mailer: PHP/' . phpversion() . "\r\n" .
                    //     'MIME-Version: 1.0' . "\r\n" .
                    //     'Content-type: text/html; charset=iso-8859-1';

                    $mailHeaders = array(
                        'From'         => $mailFrom,
                        'Reply-To'     => $mailFrom,
                        'X-Mailer'     => 'PHP/' . phpversion(),
                        'MIME-Version' => '1.0',
                        'Content-type' => 'text/html; charset=iso-8859-1',
                    );

                    $mailHeaders = implode(',', $mailHeaders);

                    $mail = mail($mailTo, $mailSubject, $mailMsg, $mailHeaders);

                    if ($mail) {
                        $msg = 'Please check your email (' . $accountEmail . ') to get the password reset token and redirect to password reset confirmation page.';

                        $data = array(
                            'success'            => true,
                            'msg'                => $msg,
                            'data'               => $resetPasswordCheckerQuery,
                            'resetPasswordExist' => false,
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
                    $msg = "Mail function is disabled!";

                    $data = array(
                        'success' => false,
                        'msg'     => $msg,
                    );

                    echo json_encode($data);
                    return;
                }
            } else {
                $msg = "Token authentication error.";

                $data = array(
                    'success' => false,
                    'msg'     => $msg,
                    'data'    => $resetPasswordCheckerQuery,
                );

                echo json_encode($data);
                return;
            }

            // $msg = 'Please check your email (' . $accountEmail . ') to get the password reset token and redirect to password reset confirmation page.';

            // $data = array(
            //     'success'            => true,
            //     'msg'                => $msg,
            //     'data'               => $setPasswordTokenQuery,
            //     'resetPasswordExist' => false,
            // );

            // echo json_encode($data);
            // return;
        } else {
            $msg  = "Account not existed.";
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
