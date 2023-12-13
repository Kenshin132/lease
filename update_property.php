<?php
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $property_name = $_POST['property_name'];
    $year_acquired = $_POST['year_acquired'];
    $property_cost = $_POST['property_cost'];
    $lease_rate = $_POST['lease_rate'];

    // Update the property in the database
    $sql = "UPDATE properties SET
            property_name = '$property_name',
            year_acquired = '$year_acquired',
            property_cost = '$property_cost',
            lease_rate = '$lease_rate'
            WHERE property_id = '$property_id'";

    if ($mysqli->query($sql)) {
        // Redirect to index.php after successful update
        header("Location: index.php");
        exit();
    } else {
        echo "Error updating property: " . $mysqli->error;
    }
} else {
    echo "Invalid request";
}
?>
