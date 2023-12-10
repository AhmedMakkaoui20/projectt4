<?php
session_start();
include_once('db_connection.php');

// Check if the form is submitted
if (isset($_POST['reset_password'])) {
    $username = $_POST['username'];
    $newPassword = $_POST['new_password'];
    $confirmNewPassword = $_POST['confirm_new_password'];

    // Add input validation and security measures (not included in this example)

    // Check if the new passwords match
    if ($newPassword === $confirmNewPassword) {
        // Check if the new password is different from the current password
        $checkCurrentPasswordQuery = "SELECT password FROM users WHERE username='$username'";
        $result = mysqli_query($connection, $checkCurrentPasswordQuery);

        if ($result) {
            $row = mysqli_fetch_assoc($result);
            $currentPassword = $row['password'];

            if ($newPassword === $currentPassword) {
                // Password is already in use, display an error message
                $_SESSION['errors'][] = "Your password is already in use. Please choose a different password.";
            } else {
                // Update the password in the database for the specific username (without hashing)
                $updateQuery = "UPDATE users SET password='$newPassword' WHERE username='$username'";
                mysqli_query($connection, $updateQuery);

                // Redirect to login.php after a successful password reset
                header('Location: login.php');
                exit();
            }
        } else {
            // Handle the database query error
            $_SESSION['errors'][] = "Error querying the database.";
        }
    } else {
        // Passwords don't match, add an error message to the session
        $_SESSION['errors'][] = "Passwords do not match.";
    }
}

// Redirect back to the reset password page
header('Location: resetpassword.php');
exit();
?>

