<?php
define('TITLE', 'Add New Product');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['psubmit'])){
 if(($_REQUEST['pname'] == "") || ($_REQUEST['pdop'] == "") || 
 ($_REQUEST['pava'] == "") || ($_REQUEST['ptotal'] == "") ||
  ($_REQUEST['poriginalcost'] == "") || ($_REQUEST['psellingcost'] == "")){
  $msg = '<div class="alert alert-warning mt-3 mb-0" role="alert"> Fill All Fileds </div>';
 } else {
  $pname = $_REQUEST['pname'];
  $pdop = $_REQUEST['pdop'];
  $pava = $_REQUEST['pava'];
  $ptotal = $_REQUEST['ptotal'];
  $poriginalcost = $_REQUEST['poriginalcost'];
  $psellingcost = $_REQUEST['psellingcost'];
  $sql = "INSERT INTO assets_tb (pname, pdop, pava, ptotal, poriginalcost, psellingcost) VALUES 
  ('$pname', '$pdop','$pava', '$ptotal', '$poriginalcost', '$psellingcost')";
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
  <span class="sec-tag">Assets</span>
  <h2>Add New Product</h2>
</div>
<div class="col-lg-9 col-xl-7">
<div class="panel">
  <div class="panel-head"><h4><i class="fa-solid fa-box-open"></i>Add New Product</h4></div>
  <div class="panel-body">
  <form action="" method="POST">
    <div class="mb-3">
      <label class="form-label" for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname">
    </div>
    <div class="mb-3">
      <label class="form-label" for="pdop">Date of Purchase</label>
      <input type="date" class="form-control" id="pdop" name="pdop">
    </div>
    <div class="mb-3">
      <label class="form-label" for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)">
    </div>
    <div class="mb-3">
      <label class="form-label" for="ptotal">Total</label>
      <input type="text" class="form-control" id="ptotal" name="ptotal" onkeypress="isInputNumber(event)">
    </div>
    <div class="mb-3">
      <label class="form-label" for="poriginalcost">Original Cost Each</label>
      <input type="text" class="form-control" id="poriginalcost" name="poriginalcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="mb-3">
      <label class="form-label" for="psellingcost">Selling Cost Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost" onkeypress="isInputNumber(event)">
    </div>
    <div class="form-actions">
      <button type="submit" class="btn btn-red" id="psubmit" name="psubmit">Submit</button>
      <a href="assets.php" class="btn btn-soft">Close</a>
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