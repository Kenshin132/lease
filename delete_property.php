<?php
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $property_id = $_GET['id'];

    // Delete the property from the database
    $sql = "DELETE FROM properties WHERE property_id = '$property_id'";

    if ($mysqli->query($sql)) {
        // Redirect to view_properties.php after successful delete
        header("Location: index.php");
        exit();
    } else {
        echo "Error deleting property: " . $mysqli->error;
    }
} else {
    echo "Invalid request";
}
?>
