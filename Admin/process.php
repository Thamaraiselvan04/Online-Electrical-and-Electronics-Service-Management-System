
<?php
    include('../dbConnection.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the total value from the hidden input
    $totalcost = $_POST['totalcost'];

    // Output for debugging
    echo "Total Value Received: " . htmlspecialchars($totalcost);


    // SQL query to insert the total into the database
    $sql = "INSERT INTO customer_tb (cptotal) VALUES ('$totalcost')";

    // Execute the query and check if insertion is successful
    if ($conn->query($sql) === TRUE) {
        echo "Data successfully inserted into the database.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    
}
?>
