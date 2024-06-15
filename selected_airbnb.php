<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="airbnb.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Airbnbs</title>
</head>
<?php
// Include your database connection file or config.php
include "config.php";

// Check if the ID is present in the URL
if (isset($_GET['id'])) {
    $airbnb_id = $_GET['id'];

    // Fetch details of the selected Airbnb using the ID
    $sql = "SELECT * FROM beach WHERE id = $airbnb_id"; // Adjust table name accordingly
    $result = mysqli_query($con, $sql);

    // Check if any data was retrieved
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        // Access and display the details of the Airbnb
        $name = $row['name'];
        $description = $row['description'];
        $price = $row['price'];
        $image_path = $row['path'];

        // Display the details of the selected Airbnb
        echo '<div class="selected-airbnb">';
        echo '<img src="' . $image_path . '" alt="Airbnb Image">';
        echo '<h2>' . $name . '</h2>';
        echo '<p>' . $description . '</p>';
        echo '<p>Price: $' . $price . ' per night</p>';
        echo '</div>';
    } else {
        echo "No Airbnb found with the provided ID.";
    }
} else {
    echo "No Airbnb ID provided in the URL.";
}

// Close the database connection
mysqli_close($con);
?>
