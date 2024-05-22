<?php
session_start();
include("dbconn.php");


if (isset($_POST["login_now"])) {
    if (!empty(trim($_POST['email'])) && !empty(trim($_POST['lpswd']))) {
        $email = mysqli_real_escape_string($conn, trim($_POST['email']));
        $password = trim($_POST['lpswd']); // No need to escape passwords for hashing/verification


        $login_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
        $login_query_run = mysqli_query($conn, $login_query);


        if (mysqli_num_rows($login_query_run) > 0) {
            $row = mysqli_fetch_array($login_query_run);


            // Verify the password against the hashed password in the database
            if (password_verify($password, $row['password'])) {
                $_SESSION['user_id'] = [
                    'name' => $row['name'],
                    'email' => $row['email'],
                ];
                $_SESSION['status'] = "You are Logged In Successfully!";
                header('Location: dashboard.php');
                exit(0);
            } else {
                $_SESSION['status2'] = "Invalid Email or Password";
                header("Location: index.php");
                exit(0);
            }
        } 
    } else {
        $_SESSION['status2'] = "All fields are Mandatory";
        header("Location: index.php");
        exit(0);
    }
}
?>
