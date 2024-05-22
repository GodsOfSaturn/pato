<?php
session_start();
include 'dbconn.php';

if (isset($_POST["forget_pass"])) {
    if (!empty(trim($_POST['email']))) {
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));

        $email_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $email_query_run = mysqli_query($conn, $email_query);

        if (mysqli_num_rows($email_query_run) > 0) {
            $_SESSION['reset_email'] = $email; // Storing email in session
            header('Location: update_pass.php');
            exit;
        } else {
            $_SESSION['status'] = "Email does not exist";
            header("Location: forgot_pass.php");
            exit;
        }
    }
}
?>
