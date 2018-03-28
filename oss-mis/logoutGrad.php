<?php
    session_start();
    unset($_SESSION['login_grad']);
    header("Location: graduatesLogin.php");
?>