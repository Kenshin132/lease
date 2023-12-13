<?php
include 'dbConnection.php';

function formatCurrency($value) {
    return '₱' . number_format($value, 2, '.', ',');
}

$sql = "SELECT * FROM properties";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    echo '<div class="table-container">';
    echo '<div class="table-column">';
    echo '<table>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Property Name</th>';
    echo '<th>Year Acquired</th>';
    echo '<th>Property Cost</th>';
    echo '<th>Leasing Cost</th>';
    echo '<th>Lease Rate</th>';
    echo '<th>Actions</th>';
    echo '</tr>';
    
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row['property_id'] . '</td>';
        echo '<td>' . $row['property_name'] . '</td>';
        echo '<td>' . $row['year_acquired'] . '</td>';
        echo '<td>' . formatCurrency($row['property_cost']) . '</td>';
        echo '<td>' . formatCurrency($row['leasing_cost']) . '</td>';
        echo '<td>' . $row['lease_rate'] . '%</td>';
        echo '<td>';
        echo '<a href="edit_property.php?id=' . $row['property_id'] . '">Edit</a>';
        echo ' | ';
        echo '<a href="delete_property.php?id=' . $row['property_id'] . '" onclick="return confirm(\'Are you sure you want to delete this property?\')">Delete</a>';
        echo '</td>';
        echo '</tr>';
    }
    
    echo '</table>';
    echo '</div>';
    echo '</div>';
} else {
    echo "No properties found";
}
?>
