<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add House</title>
    <link rel="stylesheet" href="addhouse.css">
</head>

<body>
    <!-- Section containing the form -->
    <section class="container forms show-signup">
        <div class="form signup">
            <div class="form-content">
                <header>House Information</header>
                <!-- Form for submitting house information -->
                <form action="houseprocess.php" method="post" enctype="multipart/form-data">

                    <!-- Field for uploading a photo -->
                    <div class="field">
                        <label for="photo">Upload Photo:</label>
                        <input style="border-color: #FFF;" type="file" id="photo" name="photo" accept="image/*">
                    </div>
                    <br>

                    <!-- Fields for house details -->
                    <div class="field">
                        <input type="text" id="location_age_photo" placeholder="Location" name="location_age_photo" required>
                    </div>
                    <div class="field">
                        <input type="text" id="floor_plan" placeholder="Floor Plan (including site's square footage)" name="floor_plan" required>
                    </div>
                    <div class="field short">
                        <input type="number" id="bedrooms" placeholder="Bedrooms" name="bedrooms" required>
                    </div>
                    <div class="field short">
                        <input type="number" id="bathrooms" placeholder="Bathrooms" name="bathrooms" required>
                    </div>
                    <div class="field">
                        <input type="text" id="facilities" placeholder="Facilities" name="facilities" required>
                    </div>
                    <div class="field">
                        <label for="garden">Presence of a Garden:</label>
                        <select id="garden" placeholder="Presence of a Garden" name="garden" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <br>

                    <!-- Fields for additional details -->
                    <div class="field">
                        <label for="parking">Parking Availability:</label>
                        <select id="parking" placeholder="Parking Availability" name="parking" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </div>
                    <br>

                    <div class="field">
                        <input type="text" id="proximity_facilities" placeholder="Proximity to Nearby Facilities" name="proximity_facilities" required>
                    </div>
                    <div class="field">
                        <input type="text" id="proximity_roads" placeholder="Proximity to Main Roads" name="proximity_roads" required>
                    </div>

                    <!-- Field for house price -->
                    <div class="field">
                        <input type="number" id="house_price" placeholder="House Price" name="house_price" required>
                    </div>

                    <!-- Button to submit the form -->
                    <div class="field button-field">
                        <button type="submit">Submit</button>
                    </div>
                    
                </form>
            </div>
        </div>
    </section>
</body>

</html>

