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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $houseId = mysqli_real_escape_string($conn, $_POST['id']);

    // File upload handling
    if ($_FILES["photo"]["size"] > 0) {
        $targetDirectory = "image/";
        $targetFile = $targetDirectory . basename($_FILES["photo"]["name"]);

        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile)) {
            echo "File uploaded successfully.";
            $photoFilename = mysqli_real_escape_string($conn, basename($_FILES["photo"]["name"]));
        } else {
            echo "Error uploading file.";
            exit;
        }
    }

    // Escape user inputs for security
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

    // SQL query to update data in the table
    $sql = "UPDATE house_information SET
            location_age_photo = '$location_age_photo',
            floor_plan = '$floor_plan',
            bedrooms = '$bedrooms',
            bathrooms = '$bathrooms',
            facilities = '$facilities',
            garden = '$garden',
            parking = '$parking',
            proximity_facilities = '$proximity_facilities',
            proximity_roads = '$proximity_roads',
            house_price = '$house_price'";

    if (isset($photoFilename)) {
        $sql .= ", photo_filename = '$photoFilename'";
    }

    $sql .= " WHERE id = '$houseId'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: houseportal.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
