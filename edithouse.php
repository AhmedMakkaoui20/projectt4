<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit House Information</title>
    <link rel="stylesheet" href="addhouse.css">
</head>

<body>
    <section class="container forms show-signup">
        <div class="form signup">
            <div class="form-content">
                <header>Edit House Information</header>


                <?php
                // Retrieve house information based on the ID passed in the URL
                $houseId = $_GET['id'];
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

                $sqlSelect = "SELECT * FROM house_information WHERE id = $houseId";
                $result = $conn->query($sqlSelect);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                ?>

                    <form action="update_house.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                        <div class="field">
                            <label for="photo">Upload Photo:</label>
                            <input style="border-color: #FFF;" type="file" id="photo" name="photo" accept="image/*">
                        </div>
                        <br>

                        <div class="field">
                            <input type="text" id="location_age_photo" placeholder="Location" name="location_age_photo" value="<?php echo $row['location_age_photo']; ?>">
                        </div>
                        <div class="field">
                            <input type="text" id="floor_plan" placeholder="Floor Plan (including site's square footage)" name="floor_plan" value="<?php echo $row['floor_plan']; ?>">
                        </div>
                        <div class="field short">
                            <input type="number" id="bedrooms" placeholder="Bedrooms" name="bedrooms" value="<?php echo $row['bedrooms']; ?>">
                        </div>
                        <div class="field short">
                            <input type="number" id="bathrooms" placeholder="Bathrooms" name="bathrooms" value="<?php echo $row['bathrooms']; ?>">
                        </div>
                        <div class="field">
                            <input type="text" id="facilities" placeholder="Facilities" name="facilities" value="<?php echo $row['facilities']; ?>">
                        </div>
                        <div class="field">
                            <label for="garden">Presence of a Garden:</label>
                            <select id="garden" placeholder="Presence of a Garden" name="garden">
                                <option value="yes" <?php echo ($row['garden'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo ($row['garden'] == 'no') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                        <br>

                        <div class="field">
                            <label for="garden">Parking Availability:</label>
                            <select id="garden" placeholder="Parking Availability" name="parking">
                                <option value="yes" <?php echo ($row['parking'] == 'yes') ? 'selected' : ''; ?>>Yes</option>
                                <option value="no" <?php echo ($row['parking'] == 'no') ? 'selected' : ''; ?>>No</option>
                            </select>
                        </div>
                        <br>

                        <div class="field">
                            <input type="text" id="proximity_facilities" placeholder="Proximity to Nearby Facilities" name="proximity_facilities" value="<?php echo $row['proximity_facilities']; ?>">
                        </div>
                        <div class="field">
                            <input type="text" id="proximity_roads" placeholder="Proximity to Main Roads" name="proximity_roads" value="<?php echo $row['proximity_roads']; ?>">
                        </div>

                        <div class="field">
                            <label for="house_price">House Price:</label>
                            <input type="number" id="house_price" placeholder="House Price" name="house_price" value="<?php echo $row['house_price']; ?>">
                        </div>
                        <br>
                        <br>
                        <div class="field button-field">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                <?php
                } else {
                    echo "House not found.";
                }

                // Close the database connection
                $conn->close();
                ?>
            </div>
        </div>
    </section>

</body>

</html>

