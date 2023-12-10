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

// Process delete action
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $idToDelete = mysqli_real_escape_string($conn, $_POST['delete']);
    $sqlDelete = "DELETE FROM credit_cards WHERE id = $idToDelete";

    if ($conn->query($sqlDelete) === TRUE) {
        // Redirect to the current page to refresh the record list
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Get the user ID based on the username
$username = $_SESSION['username'];
$sqlUserId = "SELECT id FROM users WHERE username = '$username'";
$resultUserId = $conn->query($sqlUserId);

if ($resultUserId->num_rows > 0) {
    $rowUserId = $resultUserId->fetch_assoc();
    $userId = $rowUserId['id'];

    // Fetch records from the database for the logged-in user
    $sqlSelect = "SELECT * FROM credit_cards WHERE user_id = $userId";
    $result = $conn->query($sqlSelect);

    // Check for errors in the query
    if (!$result) {
        echo "Error: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "Error getting user ID: " . $conn->error;
}
?>

<script>
// JavaScript functions to navigate between tabs
function showCards() {
    window.location.href = 'portal.php';
}

function showHouses() {
    window.location.href = 'houseportal.php';
}
</script>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portal</title>
    <link rel="stylesheet" href="portal.css">
</head>

<body>
    <!-- Section containing the form -->
    <section class="container forms show-signup">
        <div class="form signup">
            <div class="form-content">
                <header>
                    <?php echo $username; ?> Portal
                    <a style="font-size: 20px;" href="user.php"><p>Add Card</p></a>
                    <!-- Tabs for switching between Cards and Houses -->
                    <div class="tabs">
                        <div class="tab" onclick="showCards()">Cards</div>
                        <div class="tab" onclick="showHouses()">Houses</div>
                    </div>
                </header>

                <!-- Table displaying credit card information -->
                <table>
                    <thead>
                        <tr>
                            <th>Card Name</th>
                            <th>Card Number</th>
                            <th>CVV</th>
                            <th>Expiration Date</th>
                            <th>Address</th>
                            <th>Billing Address</th>
                            <th>Phone Number</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>{$row['card_name']}</td>";
                            echo "<td>{$row['card_number']}</td>";
                            echo "<td>{$row['cvv']}</td>";
                            echo "<td>{$row['expiration_date']}</td>";
                            echo "<td>{$row['address']}</td>";
                            echo "<td>{$row['billing_address']}</td>";
                            echo "<td>{$row['phone_number']}</td>";                   
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
