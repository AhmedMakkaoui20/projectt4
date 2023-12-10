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
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $houseIdToDelete = mysqli_real_escape_string($conn, $_GET['id']);

    // Delete the associated photo file
    $sqlSelectPhoto = "SELECT photo_filename FROM house_information WHERE id = '$houseIdToDelete'";
    $resultPhoto = $conn->query($sqlSelectPhoto);

    if ($resultPhoto->num_rows > 0) {
        $rowPhoto = $resultPhoto->fetch_assoc();
        $photoFilenameToDelete = $rowPhoto['photo_filename'];

        if (!empty($photoFilenameToDelete)) {
            $photoFilePath = "image/" . $photoFilenameToDelete;
            if (file_exists($photoFilePath)) {
                unlink($photoFilePath);
            }
        }
    }

    // Delete the record from the database
    $sqlDelete = "DELETE FROM house_information WHERE id = '$houseIdToDelete'";

    if ($conn->query($sqlDelete) === TRUE) {
        echo "Record deleted successfully";
        header("Location: houseportal.php"); // Redirect to houseportal.php
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
