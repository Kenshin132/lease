<?php
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $property_id = $_GET['id'];

    $sql = "SELECT * FROM properties WHERE property_id = '$property_id'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Display the edit form with pre-filled values
        echo '<form action="update_property.php" method="POST">';
        echo '<input type="hidden" name="property_id" value="' . $row['property_id'] . '">';
        echo 'Property Name: <input type="text" name="property_name" value="' . $row['property_name'] . '" required><br>';
        echo 'Year Acquired: <input type="number" name="year_acquired" value="' . $row['year_acquired'] . '" required><br>';
        echo 'Property Cost: <input type="number" name="property_cost" value="' . $row['property_cost'] . '" required><br>';
        echo 'Lease Rate: <input type="number" name="lease_rate" value="' . $row['lease_rate'] . '" required><br>';
        echo '<input type="submit" value="Update Property">';
        echo '</form>';
    } else {
        echo "Property not found";
    }
} else {
    echo "Invalid request";
}
?>
