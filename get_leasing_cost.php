<?php
include 'dbConnection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $property_id = $_POST['property_id'];
    $terminal_year = $_POST['terminal_year'];

    $sql = "SELECT * FROM properties WHERE property_id = '$property_id'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $initial_leasing_cost = $row['leasing_cost'];
        $lease_rate = $row['lease_rate'];
        $year_acquired = $row['year_acquired'];

        // Initialize leasing cost for the first year
        $leasing_cost = $initial_leasing_cost;

        // Loop through each year from acquisition year to terminal year
        for ($year = $year_acquired + 1; $year <= $terminal_year; $year++) {
            // Adjust leasing cost based on lease rate
            if ($year % 5 == 0) {
                if ($year - $year_acquired <= 15) {
                    // Increase leasing cost every 5th year for the first 15 years
                    $leasing_cost += $leasing_cost * ($lease_rate / 100);
                } else {
                    // Decrease leasing cost every 5th year for years beyond 15
                    $leasing_cost -= $leasing_cost * ($lease_rate / 100);
                }
            }

            // If the current year is the terminal year, echo the leasing cost and exit the loop
            if ($year == $terminal_year) {
                // Format leasing cost as Philippine Peso with two decimal places
                $formatted_leasing_cost = number_format($leasing_cost, 2, '.', ',');

                // Display the leasing cost for the specified terminal year
                echo "Leasing Cost on $terminal_year: ₱$formatted_leasing_cost";
                break;
            }
        }
    } else {
        echo "Property not found";
    }
}
?>
