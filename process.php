<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once('db_connection.php');

// Initialize error messages array
$errors = [];

// Register user
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if the username and email are not already in use
    $check_query = "SELECT * FROM users WHERE username=? OR email=?";
    $check_result = mysqli_prepare($connection, $check_query);
    mysqli_stmt_bind_param($check_result, "ss", $username, $email);
    mysqli_stmt_execute($check_result);

    $result = mysqli_stmt_get_result($check_result);

    if (mysqli_num_rows($result) > 0) {
        // Username or email is already in use, add error to array
        $errors[] = "Username or email is already in use.";
    } else {
        // Check if passwords match
        if ($password === $confirm_password) {
            // Insert user data into the database (without password hashing)
            $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
            $insert_result = mysqli_prepare($connection, $query);
            mysqli_stmt_bind_param($insert_result, "sss", $username, $email, $password);
            mysqli_stmt_execute($insert_result);

            // Retrieve user ID after registration
            $user_id_query = "SELECT id FROM users WHERE username=?";
            $user_id_result = mysqli_prepare($connection, $user_id_query);
            mysqli_stmt_bind_param($user_id_result, "s", $username);
            mysqli_stmt_execute($user_id_result);

            $result = mysqli_stmt_get_result($user_id_result);
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['id']; // Set user ID in the session

            // Redirect to the login section after successful registration
            header('Location: login.php');
            exit();
        } else {
            // Passwords don't match, add error to array
            $errors[] = "Passwords do not match.";
        }
    }
}


// Login user
if (isset($_POST['login'])) {
    $email = $_POST['login_email'];
    $password = $_POST['login_password'];

    // Check if the user exists in the database
    $query = "SELECT id, username, password, admin FROM users WHERE email=?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        // User found, retrieve user data
        $row = mysqli_fetch_assoc($result);

        // Display the plain text password (for demonstration purposes, not recommended)
        $plainTextPassword = $row['password'];
        echo "Plain Text Password: $plainTextPassword";

        // Verify password
        if ($password === $plainTextPassword) {
            // Check if the user is an admin
            if ($row['admin'] === 'yes') {
                // Redirect to admin.php for admin users
                $_SESSION['user_id'] = $row['id'];
                header('Location: admin.php');
                exit();
            } else {
                // Regular user, set user ID in the session
                $_SESSION['user_id'] = $row['id'];
                $_SESSION['username'] = $row['username'];
                header('Location: user.php');
                exit();
            }
        } else {
            // Password incorrect, add error to array
            $errors[] = "Invalid email or password.";
        }
    } else {
        // User not found, add error to array
        $errors[] = "Invalid email or password.";
    }
}

// Store errors in session
$_SESSION['errors'] = $errors;

// Redirect back to the appropriate page
if (isset($_POST['signup'])) {
    header('Location: register.php');
} elseif (isset($_POST['login'])) {
    header('Location: login.php');
} else {
    header('Location: index.php'); // Adjust this to the appropriate default page
}

exit();
?>

