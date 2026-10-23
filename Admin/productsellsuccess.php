<?php
session_start();
define('TITLE', 'Success');
define('PAGE', 'assets');
include('includes/header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }

$sql = "SELECT * FROM customer_tb WHERE custid = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 echo "<div class='col-lg-8 col-xl-7'>
 <div class='panel'>
 <div class='panel-head'><h4><i class='fa-solid fa-file-invoice-dollar'></i>Customer Bill</h4><span class='text-muted small'>OSMS Pvt Ltd</span></div>
 <div class='panel-body'>
 <div class='table-responsive'>
 <table class='table table-bordered table-detail'>
  <tbody>
  <tr>
    <th>Customer ID</th>
    <td>".$row['custid']."</td>
  </tr>
   <tr>
     <th>Customer Name</th>
     <td>".$row['custname']."</td>
   </tr>
   <tr>
     <th>Address</th>
     <td>".$row['custadd']."</td>
   </tr>
   <tr>
   <th>Product</th>
   <td>".$row['cpname']."</td>
  </tr>
   <tr>
    <th>Quantity</th>
    <td>".$row['cpquantity']."</td>
   </tr>
   <tr>
    <th>Price Each</th>
    <td>".$row['cpeach']."</td>
   </tr>
   <tr>
    <th>Total Cost</th>
    <td>".$row['cptotal']."</td>
   </tr>
   <tr>
   <th>Date</th>
   <td>".$row['cpdate']."</td>
  </tr>
  </tbody>
 </table>
 </div>
 <div class='d-flex justify-content-end gap-2 mt-4 d-print-none'>
  <a href='assets.php' class='btn btn-soft'>Close</a>
  <form><input class='btn btn-red' type='submit' value='Print' onClick='window.print()'></form>
 </div>
 </div>
 </div>
 </div>
 ";
} else {
  echo "Failed";
}
?>

<?php
include('includes/footer.php'); 
?>