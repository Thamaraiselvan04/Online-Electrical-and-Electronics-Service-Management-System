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
<div class="col-12 page-head">
  <span class="sec-tag">Track Jobs</span>
  <h2>Work <span class="text-red">Status</span></h2>
</div>
<div class="col-12">
<div class="panel">
<div class="panel-head">
  <h4><i class="fa-solid fa-signal"></i>All Work Status</h4>
  <form action="" method="POST" class="flex-grow-1" style="max-width:460px;">
      <div class="input-group">
          <input type="text" class="form-control" id="live_search" name="search_query" autocomplete="off" placeholder="Enter the Request ID or Mobile Number" required>
          <button type="submit" class="btn btn-red" name="search" style="border-radius:0 10px 10px 0;"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
  </form>
</div>
<div class="panel-body">
<div class="table-responsive">

    <?php

if (isset($_POST['search'])) {
    $search_query = $_POST['search_query'];
    // Prevent SQL injection by escaping the input
    $search_query = $conn->real_escape_string($search_query);

    // Query to search by either request_id or requester_mobile
    $sql = "SELECT * FROM status_tb WHERE request_id = '$search_query' OR requester_mobile = '$search_query'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<table class="table table-osms">';
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
            echo '<td><span class="status-pill" style="background-color: '.$bgColor.';">' . $status . '</span></td>';

            echo '<td>';
            echo '<form action="editstatus.php" method="POST" class="d-inline">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
            echo '<button type="submit" class="act-btn act-edit" name="edit" value="Edit" title="Edit"><i class="fas fa-pen"></i></button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="empty-box"><i class="fa-solid fa-magnifying-glass"></i>No request found with ID or Mobile: '.$search_query.'</div>';
    }
} else {
    // Show all records if no search is performed
    $sql = "SELECT * FROM status_tb";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo '<table class="table table-osms">';
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
            echo '<td><span class="status-pill" style="background-color: '.$bgColor.';">' . $status . '</span></td>';

            echo '<td>';
            echo '<form action="editstatus.php" method="POST" class="d-inline">';
            echo '<input type="hidden" name="id" value='.$row["request_id"].'>';
            echo '<button type="submit" class="act-btn act-edit" name="edit" value="Edit" title="Edit"><i class="fas fa-pen"></i></button>';
            echo '</form>';
            echo '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo '<div class="empty-box"><i class="fa-solid fa-folder-open"></i>No requests found</div>';
    }
}
?>
</div>
</div>
</div>
</div>


    
<?php include('includes/footer.php')?>