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

// Fetch records from the database for the logged-in user
$username = $_SESSION['username'];
$sqlUserId = "SELECT id FROM users WHERE username = '$username'";
$resultUserId = $conn->query($sqlUserId);

if ($resultUserId->num_rows > 0) {
    $rowUserId = $resultUserId->fetch_assoc();
    $userId = $rowUserId['id'];

    // Fetch house information records for the logged-in user
    $sqlSelect = "SELECT * FROM house_information WHERE user_id = '$userId'";
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
                    <a href="user.php"><p style="font-size:20px">Add House</p></a>
                    <!-- Tabs for switching between Cards and Houses -->
                    <div class="tabs">
                        <div class="tab" onclick="showCards()">Cards</div>
                        <div class="tab" onclick="showHouses()">Houses</div>
                    </div>
                </header>

                <!-- Table displaying house information -->
                <table border="1">
                    <thead>
                        <tr>
                            <th>Photo</th>
                            <th>Location</th>
                            <th>Floor Plan</th>
                            <th>Bedrooms</th>
                            <th>Bathrooms</th>
                            <th>Facilities</th>
                            <th>Garden</th>
                            <th>Parking</th>
                            <th>Proximity to Facilities</th>
                            <th>Proximity to Roads</th>
                            <th>House Price</th>
                            <th>Property Tax</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td><img src='image/{$row['photo_filename']}' alt='House Photo' width='50'></td>";
                            echo "<td>{$row['location_age_photo']}</td>";
                            echo "<td>{$row['floor_plan']}</td>";
                            echo "<td>{$row['bedrooms']}</td>";
                            echo "<td>{$row['bathrooms']}</td>";
                            echo "<td>{$row['facilities']}</td>";
                            echo "<td>{$row['garden']}</td>";
                            echo "<td>{$row['parking']}</td>";
                            echo "<td>{$row['proximity_facilities']}</td>";
                            echo "<td>{$row['proximity_roads']}</td>";
                            echo "<td>{$row['house_price']}</td>";
                            echo "<td>{$row['property_tax']}</td>";
                            echo "<td><a href='edithouse.php?id={$row['id']}'>Edit</a> | <a href='deletehouse.php?id={$row['id']}'>Delete</a></td>";
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



