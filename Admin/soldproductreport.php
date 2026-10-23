<?php
define('TITLE', 'sell report');
define('PAGE', 'sellreport');
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
  <h2>Sell <span class="text-red">Report</span></h2>
</div>
<div class="col-12">
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-file-invoice"></i>Search by Date</h4></div>
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
    $sql = "SELECT * FROM customer_tb WHERE cpdate BETWEEN '$startdate' AND '$enddate'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
     echo '<h5 class="mt-4 mb-3">Details</h5>';
     echo '<table class="table table-osms">';
      echo '<thead>';
       echo '<tr>';
        echo '<th scope="col">Customer ID</th>';
        echo '<th scope="col">Customer Name</th>';
        echo '<th scope="col">Address</th>';
        echo '<th scope="col">Product Name</th>';
        echo '<th scope="col">Quantity</th>';
        echo '<th scope="col">Price Each</th>';
        echo '<th scope="col">Total</th>';
        echo '<th scope="col">Date</th>';
       echo '</tr>';
      echo '</thead>';
      echo '<tbody>';
      while($row = $result->fetch_assoc()){
       echo '<tr>';
        echo '<td>'.$row['custid'].'</td>';
        echo '<td>'.$row['custname'].'</td>';
        echo '<td>'.$row['custadd'].'</td>';
        echo '<td>'.$row['cpname'].'</td>';
        echo '<td>'.$row['cpquantity'].'</td>';
        echo '<td>'.$row['cpeach'].'</td>';
        echo '<td>'.$row['cptotal'].'</td>';
        echo '<td>'.$row['cpdate'].'</td>';
       echo '</tr>';
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