<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <section class="container forms">
        <!-- Display Errors -->
        <?php
        session_start();

        // Check if there are any errors in the session
        if (isset($_SESSION['errors']) && !empty($_SESSION['errors'])) {
            foreach ($_SESSION['errors'] as $error) {
                echo "<p style='color: red;' class='error-message'>$error</p>";
            }

            // Clear the errors from the session
            unset($_SESSION['errors']);
        }
        ?>

        <!-- JavaScript to Hide Error Messages -->
        <script>
            // Automatically hide error messages after a couple of seconds
            setTimeout(function () {
                var errorMessage = document.querySelector('.error-message');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }, 3000); // Adjust the time (in milliseconds) as needed
        </script>

        <!-- Login Form -->
        <div class="form login">
            <div class="form-content">
                <header>Login</header>
                <form action="process.php" method="post">
                    <div class="field input-field">
                        <input type="email" name="login_email" placeholder="Email" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="login_password" placeholder="Password" class="password" required>
                    </div>
                    <div class="form-link">
                        <a href="resetpassword.php" class="forgot-pass">Forgot password?</a>
                    </div>
                    <div class="field button-field">
                        <button type="submit" name="login">Login</button>
                    </div>
                </form>

                <div class="form-link">
                    <span>Don't have an account? <a href="register.php">Signup</a></span>
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
