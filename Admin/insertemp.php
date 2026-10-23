<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 if(isset($_REQUEST['empsubmit'])){
  if(($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")){
   $msg = '<div class="alert alert-warning mt-3 mb-0" role="alert"> Fill All Fileds </div>';
  } else {
   $eName = $_REQUEST['empName'];
   $eCity = $_REQUEST['empCity'];
   $eMobile = $_REQUEST['empMobile'];
   $eEmail = $_REQUEST['empEmail'];
   $sql = "INSERT INTO technician_tb (empName, empCity, empMobile, empEmail) VALUES ('$eName', '$eCity','$eMobile', '$eEmail')";
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
  <span class="sec-tag">Technician</span>
  <h2>Add New Technician</h2>
</div>
<div class="col-lg-9 col-xl-7">
<div class="panel">
  <div class="panel-head"><h4><i class="fa-solid fa-user-plus"></i>Add New Technician</h4></div>
  <div class="panel-body">
  <form action="" method="POST">
    <div class="mb-3">
      <label class="form-label" for="empName">Name</label>
      <input type="text" class="form-control" id="empName" name="empName">
    </div>
    <div class="mb-3">
      <label class="form-label" for="empCity">City</label>
      <input type="text" class="form-control" id="empCity" name="empCity">
    </div>
    <div class="mb-3">
      <label class="form-label" for="empMobile">Mobile</label>
      <input type="text" class="form-control" id="empMobile" name="empMobile" onkeypress="isInputNumber(event)">
    </div>
    <div class="mb-3">
      <label class="form-label" for="empEmail">Email</label>
      <input type="email" class="form-control" id="empEmail" name="empEmail">
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-red" id="empsubmit" name="empsubmit">Submit</button>
      <a href="technician.php" class="btn btn-soft">Close</a>
    </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
  </div>
</div>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
<?php
include('includes/footer.php'); 
?>
