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
 if(isset($_REQUEST['reqsubmit'])){
  if(($_REQUEST['r_name'] == "") || ($_REQUEST['r_email'] == "") || ($_REQUEST['r_password'] == "")){
   $msg = '<div class="alert alert-warning mt-3 mb-0" role="alert"> Fill All Fileds </div>';
  } else {
    $rname = $_REQUEST['r_name'];
    $rEmail = $_REQUEST['r_email'];
    $rPassword = $_REQUEST['r_password'];
    $sql = "INSERT INTO requesterlogin_tb (r_name, r_email, r_password) VALUES ('$rname', '$rEmail', '$rPassword')";
    if($conn->query($sql) == TRUE){
     $msg = '<div class="alert alert-success mt-3 mb-0" role="alert"> Added Successfully </div>';
    } else {
     $msg = '<div class="alert alert-danger mt-3 mb-0" role="alert"> Unable to Add </div>';
    }
  }
  }
 ?>
<!-- Start 2nd Column -->
<div class="col-12 page-head">
  <span class="sec-tag">Requesters</span>
  <h2>Add New Requester</h2>
</div>
<div class="col-lg-9 col-xl-7">
<div class="panel">
  <div class="panel-head"><h4><i class="fa-solid fa-user-plus"></i>Add New Requester</h4></div>
  <div class="panel-body">
  <form action="" method="POST">
    <div class="mb-3">
      <label class="form-label" for="r_name">Name</label>
      <input type="text" class="form-control" id="r_name" name="r_name">
    </div>
    <div class="mb-3">
      <label class="form-label" for="r_email">Email</label>
      <input type="email" class="form-control" id="r_email" name="r_email">
    </div>
    <div class="mb-3">
      <label class="form-label" for="r_password">Password</label>
      <input type="password" class="form-control" id="r_password" name="r_password">
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-red" id="reqsubmit" name="reqsubmit">Submit</button>
      <a href="requester.php" class="btn btn-soft">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
  </div>
</div>
</div>
<?php
include('includes/footer.php'); 
?>
