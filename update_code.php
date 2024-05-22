<?php
session_start();
include("dbconn.php");

if (isset($_POST['submit'])) {
    $email = $_SESSION['reset_email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the old password is correct
    $check_password_query = "SELECT password FROM users WHERE email=?";
    $stmt = $conn->prepare($check_password_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($old_password, $user['password'])) {
            // Old password is correct, proceed with password reset
            if ($new_password === $confirm_password) {
                // Update the user's password
                $new_password_hash = password_hash($new_password, PASSWORD_BCRYPT);
                $update_password_query = "UPDATE users SET password=? WHERE email=?";
                $stmt = $conn->prepare($update_password_query);
                $stmt->bind_param("ss", $new_password_hash, $email);
                $stmt->execute();

                unset($_SESSION['reset_email']); 
                $_SESSION['status'] = "Password reset successfully. You can now log in.";
                header("Location: index.php");
                exit;
            } else {
                $_SESSION['status'] = "New passwords do not match.";
                header("Location: update_pass.php");
                exit;
            }
        } else {
            $_SESSION['status'] = "Incorrect old password.";
            header("Location: update_pass.php");
            exit;
        }
    } else {
        $_SESSION['status'] = "Error: User not found.";
        header("Location: update_pass.php");
        exit;
    }
}
?>
