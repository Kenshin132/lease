<?php
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_name = $_POST['property_name'];
    $year_acquired = $_POST['year_acquired'];
    $property_cost = $_POST['property_cost'];
    $lease_rate = $_POST['lease_rate'];

    $sql = "INSERT INTO properties (property_name, year_acquired, property_cost, lease_rate)
            VALUES ('$property_name', '$year_acquired', '$property_cost', '$lease_rate')";

    if ($mysqli->query($sql) === TRUE) {
        echo "Property added successfully";
        echo '<br><a href="index.php"><button type="button">Return to Home</button></a>';
    } else {
        echo "Error: " . $sql . "<br>" . $mysqli->error;
    }
}
?>
