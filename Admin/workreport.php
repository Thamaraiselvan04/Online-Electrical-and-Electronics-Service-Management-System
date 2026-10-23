<?php
define('TITLE', 'work report');
define('PAGE', 'work report');
include('../dbConnection.php');
include('includes/header.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
 $aEmail = $_SESSION['aEmail'];
} else {
 echo "<script> location.href='login.php'; </script>";
} 
?>

<!-- Start 2nd Column -->
<div class="col-12 page-head d-print-none">
  <span class="sec-tag">Reports</span>
  <h2>Work <span class="text-red">Report</span></h2>
</div>
<div class="col-12">
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-table"></i>Search by Date</h4></div>
<div class="panel-body">
  <form action="" method="POST" class="d-print-none">
    <div class="row g-3 align-items-end">
      <div class="col-sm-6 col-md-4 col-xl-3">
        <label class="form-label" for="startdate">From</label>
        <input type="date" class="form-control" id="startdate" name="startdate">
      </div>
      <div class="col-sm-6 col-md-4 col-xl-3">
        <label class="form-label" for="enddate">To</label>
        <input type="date" class="form-control" id="enddate" name="enddate">
      </div>
      <div class="col-md-4 col-xl-3">
        <input type="submit" class="btn btn-red w-100" name="searchsubmit" value="Search">
      </div>
    </div>
  </form>
  <div class="table-responsive">
 <?php 
  if(isset($_REQUEST['searchsubmit'])){
   $startdate = $_REQUEST['startdate'];
   $enddate = $_REQUEST['enddate'];
   $sql = "SELECT * FROM status_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
        echo '<h5 class="mt-4 mb-3">Details</h5>';
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
              }
       echo '<tr>';
       echo '<td>';
        echo '<input type="submit" class="btn btn-red btn-sm d-print-none" value="Print" onClick="window.print()">';
       echo '</td>';
      echo '</tr>';
      echo '</tbody>';
     echo '</table>';
    } else {
     echo "<div class='alert alert-warning mt-4 mb-0' role='alert'><i class='fa-solid fa-circle-info me-2'></i>No Records Found !</div>";
    }
   }
  
   ?>

</div>
</div>
</div>
</div>




<?php include('includes/footer.php')?>