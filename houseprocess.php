<?php
session_start();

// Establish a database connection
$servername = "localhost"; // replace with your actual database server name
$username = "amakkaoui1"; // replace with your actual database username
$password = "amakkaoui1"; // replace with your actual database password
$dbname = "amakkaoui1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_SESSION['user_id']; // Assuming you store user_id in the session after login

    $targetDirectory = "image/";
    $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);

    if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
        header("Location: houseportal.php");
    } else {
        echo "Error uploading file.";
        exit;
    }

    // Escape user inputs for security
    $photoFilename = mysqli_real_escape_string($conn, basename($_FILES["photo"]["name"]));
    $location_age_photo = mysqli_real_escape_string($conn, $_POST['location_age_photo']);
    $floor_plan = mysqli_real_escape_string($conn, $_POST['floor_plan']);
    $bedrooms = mysqli_real_escape_string($conn, $_POST['bedrooms']);
    $bathrooms = mysqli_real_escape_string($conn, $_POST['bathrooms']);
    $facilities = mysqli_real_escape_string($conn, $_POST['facilities']);
    $garden = mysqli_real_escape_string($conn, $_POST['garden']);
    $parking = mysqli_real_escape_string($conn, $_POST['parking']);
    $proximity_facilities = mysqli_real_escape_string($conn, $_POST['proximity_facilities']);
    $proximity_roads = mysqli_real_escape_string($conn, $_POST['proximity_roads']);
    $house_price = mysqli_real_escape_string($conn, $_POST['house_price']);

    // SQL query to insert data into the table
    $sql = "INSERT INTO house_information (user_id, photo_filename, location_age_photo, floor_plan, bedrooms, bathrooms, facilities, garden, parking, proximity_facilities, proximity_roads, house_price)
            VALUES ('$user_id', '$photoFilename', '$location_age_photo', '$floor_plan', '$bedrooms', '$bathrooms', '$facilities', '$garden', '$parking', '$proximity_facilities', '$proximity_roads', '$house_price')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        // Redirect to houseportal.php upon success
        header("Location: houseportal.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>

