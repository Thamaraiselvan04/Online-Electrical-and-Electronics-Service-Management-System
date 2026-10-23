<?php
define('TITLE','Requester Profile');
define('PAGE','RequesterProfile');
include('../dbConnection.php');
include('includes/header.php');
session_start();
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['rEmail'];
}
else
{
echo "<script>location.href='RequesterLogin.php'</script>";
}
$sql="SELECT r_name, r_email FROM requesterlogin_tb WHERE r_email='$rEmail'";
$result=$conn->query($sql);
if($result->num_rows == 1)
{
    $row=$result->fetch_assoc();
    $rName=$row['r_name'];
    
}
if(isset($_REQUEST['nameupdate']))
{
    if($_REQUEST['rName']=="")
    {
        $passmsg = '<div class="alert alert-warning mt-3 mb-0" role="alert">Fill All Fields</div>';
    }
    else
    {
       $rName = $_REQUEST['rName'];
       $sql = "UPDATE requesterlogin_tb SET r_name='$rName' WHERE r_email='$rEmail'";
       if($conn->query($sql)== TRUE)
       {
        $passmsg='<div class="alert alert-success mt-3 mb-0"  role="alert">Updated Successfully</div>';
       }
       else
       {
        $passmsg='<div class="alert alert-danger mt-3 mb-0"  role="alert">Unable to update</div>';

       }
    }
}

?>



<div class="col-12 page-head">
    <span class="sec-tag">My Account</span>
    <h2>Requester <span class="text-red">Profile</span></h2>
</div>
<div class="col-lg-8 col-xl-6"><!--start profile area 2nd column-->
<div class="panel">
    <div class="panel-head"><h4><i class="fa-solid fa-user"></i>Profile Details</h4></div>
    <form action="" method="POST" class="panel-body">
        <div class="mb-3">
            <label for="rEmail" class="form-label">Email</label><input type="email"
             class="form-control" name="rEmail" id="rEmail" value="<?php echo $rEmail ?>" readonly>
        </div>
        <div class="mb-4"><label for="rName" class="form-label">Name</label><input type="text"
        class="form-control" name="rName" id="rName" value="<?php echo $rName ?>">
    </div>
    <button type="submit" class="btn btn-red" name="nameupdate"><i class="fa-solid fa-floppy-disk me-2"></i>Update</button>
    <?php if(isset($passmsg))
    {
        echo $passmsg;
    }

    ?>
    </form>
</div>
</div>
<!--end profile area 2nd column-->

<?php
include('includes/footer.php');
?>
