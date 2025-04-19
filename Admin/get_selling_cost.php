<?php
// Database connection details (replace with your actual credentials)
include('../dbConnection.php');

// Check if quantity is passed via GET request
if (isset($_GET['pquantity'])) {
    $pquantity = (int)$_GET['pquantity'];  // Get the quantity from GET request
    
    // Query to fetch the selling cost (this assumes a single item with a fixed cost)
    // Replace with your actual table and column names
    $query = "SELECT psellingcost FROM assets_tb LIMIT 1";  // Assuming 'products' table with a 'selling_cost' column
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        // Get the selling cost from the database
        $row = $result->fetch_assoc();
        $psellingcost = $row['psellingcost'];
        
        // Return the selling cost as a JSON object
        echo json_encode(['psellingcost' => $psellingcost]);
    } else {
        // If no data found, return 0
        echo json_encode(['psellingcost' => 0]);
    }
}


?>
