<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: admin.php');
    exit();
}

// Establish a database connection
$servername = "localhost"; // replace with your actual database server name
$username = "amakkaoui1"; // replace with your actual database username
$password = "amakkaoui1"; // replace with your actual database password
$dbname = "amakkaoui1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process delete action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $idToDelete = mysqli_real_escape_string($conn, $_POST['delete']);
    $sqlDelete = "DELETE FROM users WHERE id = $idToDelete";

    if ($conn->query($sqlDelete) === TRUE) {
        // Redirect to the current page to refresh the user list
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch all registered users
$sqlSelectUsers = "SELECT * FROM users";
$resultUsers = $conn->query($sqlSelectUsers);

// Check for errors in the query
if (!$resultUsers) {
    echo "Error: " . $conn->error;
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal</title>
    <link rel="stylesheet" href="portal.css">
</head>

<body>
    <section class="container forms show-signup">
        <div class="form signup">
            <div class="form-content">
                <header>
                    Admin Portal - Registered Users
                    <br>
                    <a href="register.php" >Go back to Login/Signup</a>
                </header>

                <table>
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Admin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($rowUsers = $resultUsers->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$rowUsers['id']}</td>";
                            echo "<td>{$rowUsers['username']}</td>";
                            echo "<td>{$rowUsers['email']}</td>";
                            echo "<td>{$rowUsers['admin']}</td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</body>
</html>
