<?php
define('TITLE', 'change password');
define('PAGE', 'changepassword');
include('../dbConnection.php');
include('includes/header.php');
session_start();
 if(isset($_SESSION['is_adminlogin'])){
  $aEmail = $_SESSION['aEmail'];
 } else {
  echo "<script> location.href='login.php'; </script>";
 }
 $aEmail = $_SESSION['aEmail'];
if(isset($_REQUEST['passupdate'])){
 if($_REQUEST['aPassword'] == ""){
  $passmsg = '<div class="alert alert-warning mt-3 mb-0">Fill All Fields</div>';
 } else {
  $aPass = $_REQUEST['aPassword'];
  $sql = "UPDATE adminlogin_tb SET a_password = '$aPass' WHERE a_email = '$aEmail'";
  if($conn->query($sql) == TRUE){
   $passmsg = '<div class="alert alert-success mt-3 mb-0">Updated Successfully</div>';
  } else {
   $passmsg = '<div class="alert alert-danger mt-3 mb-0">Unable to Update</div>';
  }
 }
}

?>
<div class="col-12 page-head">
  <span class="sec-tag">Security</span>
  <h2>Change <span class="text-red">Password</span></h2>
</div>
<div class="col-lg-8 col-xl-6"> <!-- Start Admin Change Password Form 2nd Column -->
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-key"></i>Update Password</h4></div>
 <form class="panel-body" action="" method="POST">
  <div class="mb-3">
   <label class="form-label" for="inputEmail">Email</label>
   <input type="email" class="form-control" id="inputEmail" value="<?php echo $aEmail; ?>" readonly>
  </div>
  <div class="mb-3">
   <label class="form-label" for="inputnewpassword">New Password</label>
   <div class="input-group">
     <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="aPassword">
     <button type="button" class="btn btn-outline-secondary pwd-eye" data-target="inputnewpassword" aria-label="Show password"><i class="fa-solid fa-eye"></i></button>
   </div>
  </div>
  <div class="form-actions justify-content-start">
  <button type="submit" class="btn btn-red" name="passupdate">Update</button>
  <button type="reset" class="btn btn-soft">Reset</button>
  </div>
  <?php if(isset($passmsg)){echo $passmsg;} ?>
 </form>
</div>
</div> <!-- End Admin Change Password Form 2nd Column -->




<!-- Show / hide password (eye button) -->
<script>
  document.querySelectorAll('.pwd-eye').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = document.getElementById(this.dataset.target);
      var show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      this.querySelector('i').className = show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye';
    });
  });
</script>

<?php include('includes/footer.php')?>