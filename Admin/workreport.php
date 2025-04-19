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
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <form action="" method="POST" class="d-print-none">
   <div class="form-row">
     <div class="form-group col-md-2">
       <input type="date" class="form-control" id="startdate" name="startdate">
     </div> <span> to </span>
     <div class="form-group col-md-2">
       <input type="date" class="form-control" id="enddate" name="enddate">
     </div>
     <div class="form-group">
       <input type="submit" class="btn btn-primary" name="searchsubmit" value="Search">
     </div>
   </div>
 </form>
 <?php 
  if(isset($_REQUEST['searchsubmit'])){
   $startdate = $_REQUEST['startdate'];
   $enddate = $_REQUEST['enddate'];
   $sql = "SELECT * FROM status_tb WHERE assign_date BETWEEN '$startdate' AND '$enddate'";
       $result = $conn->query($sql);
       if ($result->num_rows > 0) {
        echo '<p class="bg-dark text-white p-2 mt-4">Details</p>';
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
       padding: 11px 12px; /* Smaller padding for smaller button */
       margin-top: 0px 2px 0px 0px; /* Optional: move the button down slightly */
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
              }
       echo '<tr>';
       echo '<td>';
        echo '<input type="submit" class="btn btn-danger d-print-none" value="Print" onClick="window.print()">';
       echo '</td>';
      echo '</tr>';
      echo '</tbody>';
     echo '</table>';
    } else {
     echo "<div class='alert alert-warning col-sm-6 ml-5 mt-2' role='alert'> No Records Found ! </div>";
    }
   }
  
   ?>

</div>




<?php include('includes/footer.php')?>