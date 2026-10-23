<?php    
define('TITLE', 'Update Requester');
define('PAGE', 'requesters');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 ?>
 <!-- Start 2nd COlumn -->
 <div class="col-12 page-head">
  <span class="sec-tag">Requesters</span>
  <h2>Update Requester Details</h2>
</div>
<div class="col-lg-9 col-xl-7">
<div class="panel">
  <div class="panel-head"><h4><i class="fa-solid fa-user-pen"></i>Update Requester Details</h4></div>
  <div class="panel-body">
  <?php 
   if(isset($_REQUEST['edit'])){
   $sql = "SELECT * FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
   if(isset($_REQUEST['requpdate'])){
    if(($_REQUEST['r_login_id'] == "") || ($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "")){
     $msg = '<div class="alert alert-warning mt-3 mb-0" role="alert">Fill All Fileds</div>';
    } else {
     $rid = $_REQUEST['r_login_id'];
     $rname = $_REQUEST['r_name'];
     $remail = $_REQUEST['r_email'];
     $sql = "UPDATE requesterlogin_tb SET r_login_id = '$rid', r_name = '$rname', r_email = '$remail' WHERE r_login_id = '$rid'";
     if($conn->query($sql) ==  TRUE){
      $msg = '<div class="alert alert-success mt-3 mb-0" role="alert">Updated Successfully</div>';
     } else {
      $msg = '<div class="alert alert-danger mt-3 mb-0" role="alert">Unable to Update</div>';
     }
    }
   }
  ?>
  <form action="" method="POST">
   <div class="mb-3">
    <label class="form-label" for="r_login_id">Requester ID</label>
    <input type="text" class="form-control" name="r_login_id" id="r_login_id" 
    Value="<?php if(isset($row['r_login_id'])) { echo $row['r_login_id']; } ?>" readonly>
   </div>
   <div class="mb-3">
    <label class="form-label" for="r_name">Name</label>
    <input type="text" class="form-control" name="r_name" id="r_name" 
    Value="<?php if(isset($row['r_name'])) { echo $row['r_name']; } ?>">
   </div>
   <div class="mb-3">
    <label class="form-label" for="r_email">Email</label>
    <input type="text" class="form-control" name="r_email" id="r_email" 
    Value="<?php if(isset($row['r_email'])) { echo $row['r_email']; } ?>">
   </div>
   <div class="form-actions">
    <button type="submit" class="btn btn-red" id="requpdate" name="requpdate">Update</button>
    <a href="requester.php" class="btn btn-soft">Close</a>
   </div>
   <?php if(isset($msg)) {echo $msg; } ?>
  </form>
  </div>
</div>
</div> <!-- End 2nd COlumn -->

<?php
include('includes/footer.php'); 
?>