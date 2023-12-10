<?php
session_start();

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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit_card"])) {
    // Escape user inputs for security
    $cardName = mysqli_real_escape_string($conn, $_POST['card_name']);
    $cardNumber = mysqli_real_escape_string($conn, $_POST['card_number']);
    $cvv = mysqli_real_escape_string($conn, $_POST['cvv']);
    $expirationDate = mysqli_real_escape_string($conn, $_POST['expiration_date']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $billingAddress = mysqli_real_escape_string($conn, $_POST['billing_address']);
    $phoneNumber = mysqli_real_escape_string($conn, $_POST['phone_number']);

    // Retrieve user ID from the session
    // Assuming you store user ID in the session after login
    $userId = $_SESSION['user_id'] ?? null;

    if ($userId) {
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO credit_cards (user_id, card_name, card_number, cvv, expiration_date, address, billing_address, phone_number) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("isssssss", $userId, $cardName, $cardNumber, $cvv, $expirationDate, $address, $billingAddress, $phoneNumber);

        if ($stmt->execute()) {
            // Redirect to the portal.php page
            header("Location: portal.php");
            exit(); // Ensure that no further code is executed after redirection
        } else {
            // Display the SQL error for debugging
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "User not authenticated."; // Handle this case appropriately
    }
}

// Close the database connection
$conn->close();
?>

