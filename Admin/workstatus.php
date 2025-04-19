<?php
define('TITLE', 'work status');
define('PAGE', 'workstatus');
include('../dbConnection.php');
include('includes/header.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
 $aEmail = $_SESSION['aEmail'];
} else {
 echo "<script> location.href='login.php'; </script>";
} 

?>

<!--start 2nd column-->
<div class="col-sm-9 col-md-10 mt-5">
    <div class="container" style="max-width:50%;">
        <div class="text-center mt-2 mb-2">
            <h4>Search Bar</h4>
        </div>
        <form action="" method="POST">
            <div class="input-group">
                <input type="text" class="form-control" id="live_search" name="search_query" autocomplete="off" placeholder="Enter the Request ID or Mobile Number" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary" name="search">Search</button>
                </div>
            </div>
        </form>
    </div>
    <hr>

    <?php

if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    // Prevent SQL injection by escaping the input
    $search_query = $conn->real_escape_string($search_query);

    // Query to search by either request_id or requester_mobile
    $sql = "SELECT * FROM status_tb WHERE request_id = '$search_query' OR requester_mobile = '$search_query'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Req ID</th>';
        echo '<th scope="col">Req Info</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Address 1</th>';
        echo '<th scope="col">City</th>';
        echo '<th scope="col">Mobile</th>';
        echo '<th scope="col">Technician</th>';
        echo '<th scope="col">Assigned Date</th>';
        echo '<th scope="col">Tech ph.No</th>';
        echo '<th scope="col">Status</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        // Fetch and display the details of the request
        while ($row = $result->fetch_assoc()) {
            $status = trim($row['w_status']);
            switch ($status) {
                case 'completed':
                    $bgColor = 'green';
                    break;
                case 'Pending':
                    $bgColor = 'blue';
                    break;
                case 'outofstock':
                    $bgColor = '#DC3545';
                    break;
                default:
                    $bgColor = 'gray';  // Default color
                    break;
            }

            echo '<tr>';
            echo '<td>'.$row['request_id'].'</td>';
            echo '<td>'.$row['request_info'].'</td>';
            echo '<td>'.$row['requester_name'].'</td>';
            echo '<td>'.$row['requester_add2'].'</td>';
            echo '<td>'.$row['requester_city'].'</td>';
            echo '<td>'.$row['requester_mobile'].'</td>';
            echo '<td>'.$row['assign_tech'].'</td>';
            echo '<td>'.$row['assign_date'].'</td>';
            echo '<td>'.$row['tech_ph'].'</td>';
            echo '<td style="background-color: '.$bgColor.'; 
            color: white;
    padding: 11px 12px; /* Smaller padding for smaller button */
    margin-top: 0px 2px 0px 0px; /* Optional: move the button down slightly */
    border-radius: 90px;
    text-align: center;
    cursor: pointer;
    font-weight: bold;
    width: 60px; /* Reduced width for smaller button */
    height: 10px; /* Reduced height for smaller button */
    font-size: 17px; /* Smaller text size */
    text-overflow: ellipsis; /* Truncate text if too long */
    white-space: nowrap; /* Prevent text from wrapping */
    overflow: hidden; /* Hide overflow text */
    transition: background-color 0.3s ease;">' . $status . '</td>';

            echo '<td>';
            echo '<form action="editstatus.php" method="POST" class="d-inline">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
            echo '<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<h1 class="text-center">No request found with ID or Mobile: '.$search_query.'</h1>';
    }
} else {
    // Show all records if no search is performed
    $sql = "SELECT * FROM status_tb";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Req ID</th>';
        echo '<th scope="col">Req Info</th>';
        echo '<th scope="col">Name</th>';
        echo '<th scope="col">Address 1</th>';
        echo '<th scope="col">City</th>';
        echo '<th scope="col">Mobile</th>';
        echo '<th scope="col">Technician</th>';
        echo '<th scope="col">Assigned Date</th>';
        echo '<th scope="col">Tech ph.No</th>';
        echo '<th scope="col">Status</th>';
        echo '<th scope="col">Action</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';

        while ($row = $result->fetch_assoc()) {
            $status = trim($row['w_status']);
            switch ($status) {
                case 'completed':
                    $bgColor = 'green';
                    break;
                case 'Pending':
                    $bgColor = 'blue';
                    break;
                case 'outofstock':
                    $bgColor = '#DC3545';
                    break;
                default:
                    $bgColor = 'gray';
                    break;
            }

            echo '<tr>';
            echo '<td>'.$row['request_id'].'</td>';
            echo '<td>'.$row['request_info'].'</td>';
            echo '<td>'.$row['requester_name'].'</td>';
            echo '<td>'.$row['requester_add2'].'</td>';
            echo '<td>'.$row['requester_city'].'</td>';
            echo '<td>'.$row['requester_mobile'].'</td>';
            echo '<td>'.$row['assign_tech'].'</td>';
            echo '<td>'.$row['assign_date'].'</td>';
            echo '<td>'.$row['tech_ph'].'</td>';
            echo '<td style="background-color: '.$bgColor.'; 
            color: white;
    padding: 20px 2px; /* Smaller padding for smaller button */
    margin-top: 0px 2px 0px 0px;; /* Optional: move the button down slightly */
    border-radius: 90px;
    text-align: center;
    cursor: pointer;
    font-weight: bold;
    width: 60px; /* Reduced width for smaller button */
    height: 10px; /* Reduced height for smaller button */
    font-size: 15px; /* Smaller text size */
    text-overflow: ellipsis; /* Truncate text if too long */
    white-space: nowrap; /* Prevent text from wrapping */
    overflow: hidden; /* Hide overflow text */
    transition: background-color 0.3s ease;">' . $status . '</td>';

            echo '<td>';
            echo '<form action="editstatus.php" method="POST" class="d-inline">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
            echo '<button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<h1 class="text-center">No requests found</h1>';
    }
}
?>
</div>


    
<?php include('includes/footer.php')?>