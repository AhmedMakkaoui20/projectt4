<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
</head>

<body>
    <section class="container forms show-signup">
        <!-- Signup Form -->
        <div class="form signup">
            <div class="form-content">
                <header>Signup</header>
                <form action="process.php" method="post">
                    <div class="field input-field">
                        <input type="text" name="username" placeholder="Username" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="email" name="email" placeholder="Email" class="input" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="password" placeholder="Create password" class="password" required>
                    </div>
                    <div class="field input-field">
                        <input type="password" name="confirm_password" placeholder="Confirm password" class="password" required>
                    </div>
                    <div class="field button-field">
                        <button type="submit" name="signup">Signup</button>
                    </div>
                </form>
                <div class="form-link">
                    <span>Already have an account? <a href="login.php">Login</a></span>
                    <br>
                    <span><a href="home.php" class="">BACK TO HOME PAGE</a></span>
                </div>
            </div>
        </div>

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
            setTimeout(function() {
                var errorMessage = document.querySelector('.error-message');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }, 3000); // Adjust the time (in milliseconds) as needed
        </script>
    </section>

    <!-- JavaScript -->
    <script src="script.js"></script>
</body>
</html>

