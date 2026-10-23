<?php
define('TITLE','Change Password');
define('PAGE','Requesterchangepassword');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login'])
{
$rEmail = $_SESSION['rEmail'];
} 
else
 {
echo "<script> location.href='RequesterLogin.php'; </script>";
 }
 if(isset($_REQUEST['passupdate']))
 {
    $rEmail = $_SESSION['rEmail'];
    if($_REQUEST['rPassword']=="")
    {
       $passmsg='<div class="alert alert-warning mt-3 mb-0">Fill ALL Fields</div>';
    }
    else
    {
        // Save the new password as a secure hash (same as the Sign Up page)
        $rPass = password_hash($_REQUEST['rPassword'], PASSWORD_DEFAULT);
    $sql = "UPDATE requesterlogin_tb SET r_password ='$rPass' WHERE r_email ='$rEmail'";
    if($conn->query($sql)==TRUE)
    {

    $passmsg='<div class="alert alert-success mt-3 mb-0">Updated successly</div>';
    }
    else
    {
    $passmsg='<div class="alert alert-danger mt-3 mb-0">Unable to update</div>';
    
    }
    }
    
 }
 

?>
<div class="col-12 page-head">
    <span class="sec-tag">Security</span>
    <h2>Change <span class="text-red">Password</span></h2>
</div>
<div class="col-lg-8 col-xl-6"><!--Start user  change password form 2nd column-->
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-key"></i>Update Password</h4></div>
<form class="panel-body" action="" method="POST">
    <div class="mb-3">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" class="form-control"  id="inputEmail" value="<?php echo $rEmail; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="inputnewpassword" class="form-label">New Password</label>
            <div class="input-group">
              <input type="password" class="form-control" id="inputnewpassword" placeholder="New Password" name="rPassword">
              <button type="button" class="btn btn-outline-secondary pwd-eye" data-target="inputnewpassword" aria-label="Show password"><i class="fa-solid fa-eye"></i></button>
            </div>
        </div>
        <div class="form-actions justify-content-start">
        <button type="submit" class="btn btn-red" name="passupdate">Update</button>
        <button type="reset" class="btn btn-soft">Reset</button>
        </div>
        <?php if(isset($passmsg)) {echo $passmsg;}?>
    </form>
</div>
</div><!--end user  change password form 2nd column-->


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

<?php
include('includes/footer.php');
?>