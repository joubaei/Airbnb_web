<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Search Result</title>
   <link rel="stylesheet" href="airbnb.css">

</head>
<?php
// Start the session to access session variables
session_start();

// Check if the session variable is set and not empty
if(isset($_SESSION['airbnb_results']) && !empty($_SESSION['airbnb_results'])) {
    // Loop through the stored Airbnb results and display information
    echo '<div class="row1">';
    foreach($_SESSION['airbnb_results'] as $fetch_airbnb) {
        echo '<div class="column">';
        echo '<div class="card">';
        echo '<img src="' . $fetch_airbnb['path'] . '" alt="" class="image">';
        echo '<div class="name">' . $fetch_airbnb['name'] . '</div>';
        echo '<div class="price">$' . $fetch_airbnb['price'] . ' $ </div>';
        echo '<input type="hidden" name="name" value="' . $fetch_airbnb['name'] . '">';
        echo '<input type="hidden" name="price" value="' . $fetch_airbnb['price'] . '">';
        echo '<input type="hidden" name="image" value="' . $fetch_airbnb['path'] . '">';
        echo '</div>';
        echo '</div>';
    }
    echo '</div>';
    // Unset the session variable after displaying the results
    unset($_SESSION['airbnb_results']);
} else {
    // If no results found or session variable is empty
    echo "No results found!";
}
?>
