<?php
session_start();

// Check if there are any errors in the session
if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
    foreach ($_SESSION['errors'] as $error) {
        echo "<p style='color: red;' id='error-message'>$error</p>";
    }

    // Clear the errors from the session
    unset($_SESSION['errors']);
}
?>

<script>
// Automatically hide error messages after a couple of seconds
setTimeout(function() {
    var errorMessage = document.getElementById('error-message');
    if (errorMessage) {
        errorMessage.style.display = 'none';
    }
}, 3000); // Adjust the time (in milliseconds) as needed
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <section class="container forms">
        <div class="form resetpassword">
            <div class="form-content">
                <header>Reset Password</header>
                <form action="process_resetpassword.php" method="post">
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Username" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="new_password" placeholder="New Password" class="password" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="confirm_new_password" placeholder="Confirm New Password" class="password" required>
                    </div>
                    <div class="field button-field">
                        <button type="submit" name="reset_password">Reset Password</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Remember your password? <a href="login.php">Login</a></span>
                    <br>
                    <span><a href="home.php" class="">BACK TO HOME PAGE</a></span>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="script.js"></script>
</body>

</html>

