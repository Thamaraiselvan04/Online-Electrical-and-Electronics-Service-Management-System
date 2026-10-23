<?php
include('../dbConnection.php'); // Include database connection



if (isset($_POST['empname'])) {
    $empname = $_POST['empname'];  // Get the empname from AJAX

    // Query to fetch the phone number baed on empname
    $sql = "SELECT empMobile FROM technician_tb  WHERE empname = ?";
    
    // Prepare the SQL statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the empname parameter
        $stmt->bind_param("s", $empname);

        // Execute the statement
        if ($stmt->execute()) {
            // Bind the result
            $stmt->bind_result($empMobile);

            // Fetch the phone number
            if ($stmt->fetch()) {
                echo $empMobile;  // Return the phone number
            } else {
                echo "No phone number found for this employee."; // If no result found
            }
        } else {
            // If execution failed, show an error
            echo "Error executing the query: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        // If preparing the statement failed, show an error
        echo "Error preparing the query: " . $conn->error;
    }
}

$conn->close(); // Close the database connection
?>



    




