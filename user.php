<?php
session_start();
include_once('db_connection.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <link rel="stylesheet" href="user.css">
</head>

<body>
    <section class="container forms show-signup">

        <div class="form signup">
            <div class="form-content">
                <header>
                    <h1>Welcome <?php echo $username; ?></h1>
                </header>
            </div>

            <!-- Add Card -->
            <div class="middle-box" id="middleBox">
                <img src="images/plus.png" alt="Plus Image">
            </div>
            <div class="center-title">
                <h1>Add Card</h1>
            </div>

            <!-- Add Houses -->
            <div class="middle-box2" id="middleBox2">
                <img src="images/plus.png" alt="Plus Image">
            </div>
            <div class="center-title2">
                <h1>Add Houses</h1>
            </div>

            <div class="center-title3">
                <a style="padding-bottom: 50px;" href="portal.php"><p>Go To Portal</p></a>
            </div>

            <div class="center-title3">
                <a href="login.php"><p>Logout</p></a>
            </div>

        </div>

    </section>

    <script src="script.js"></script>

    <script>
        document.getElementById('middleBox').addEventListener('click', function () {
            window.location.href = 'addcard.php';
        });

        document.getElementById('middleBox2').addEventListener('click', function () {
            window.location.href = 'addhouse.php';
        });
    </script>
</body>

</html>
