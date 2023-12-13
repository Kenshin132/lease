<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Information CRUD</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Property Information CRUD</h1>

    <h2>Add Property</h2>
    <form action="create_property.php" method="POST">
        <label for="property_name">Property Name:</label>
        <input type="text" name="property_name" required>

        <label for="year_acquired">Year Acquired:</label>
        <input type="number" name="year_acquired" required>

        <label for="property_cost">Property Cost:</label>
        <input type="number" name="property_cost" required>

        <label for="lease_rate">Lease Rate:</label>
        <input type="number" name="lease_rate" required>

        <input type="submit" value="Add Property">
    </form>

    <hr>

    <h2>View Properties</h2>
    <?php include 'view_properties.php'; ?>

    <hr>

    <h2>Determine Leasing Cost</h2>
    <form action="get_leasing_cost.php" method="POST">
        <label for="property_id">Property ID:</label>
        <input type="number" name="property_id" required>

        <label for="terminal_year">Terminal Year of Leasing:</label>
        <input type="number" name="terminal_year" required>

        <input type="submit" value="Get Leasing Cost">
    </form>
</body>
</html>
