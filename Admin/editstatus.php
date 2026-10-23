<?php
define('TITLE', 'Update status');
define('PAGE', 'workstatus');
include('../dbConnection.php');
include('includes/header.php');
session_start();
if(isset($_SESSION['is_adminlogin']))
{
    $aEmail=$_SESSION['aEmail'];

}
else{
    echo "<script>location.href='login.php'</script>";
}


if(isset($_REQUEST['update']))
{
  if(($_REQUEST['request_id']=="")||($_REQUEST['request_info']=="")||
  ($_REQUEST['requestername']=="")||($_REQUEST['address1']=="")||($_REQUEST['requestercity']=="")||
  ($_REQUEST['requestermobile']=="")||($_REQUEST['assigntech']=="")||
  ($_REQUEST['inputdate']=="")||($_REQUEST['techph']=="") ||($_REQUEST['status']==""))
  
  {
      $msg='<div class="alert alert-warning mt-3 mb-0">Fill All Fields</div>';
  }
  else
  {
                $rid = $_REQUEST['request_id'];
                $rinfo=$_REQUEST['request_info'];
                $rdesc=$_REQUEST['requestdesc'];
                $rname=$_REQUEST['requestername'];
                $radd1=$_REQUEST['address1'];
                $radd2=$_REQUEST['address2'];
                $rcity=$_REQUEST['requestercity'];
                $rstate=$_REQUEST['requesterstate'];
                $rzip=$_REQUEST['requesterzip'];
                $remail=$_REQUEST['requesteremail'];
                $rmobile=$_REQUEST['requestermobile'];
                $rassigntech=$_REQUEST['assigntech'];
                $rdate=$_REQUEST['inputdate'];
                $rtechph=$_REQUEST['techph'];
                $rstatus=$_REQUEST['status'];
                $sql="UPDATE status_tb SET request_info ='$rinfo', request_desc='$rdesc',
                requester_name='$rname', requester_add1='$radd1',requester_add2='$radd2',
                requester_city='$rcity',
                requester_state='$rstate',requester_zip='$rzip',requester_email='$remail',
                requester_mobile='$rmobile',assign_tech='$rassigntech',assign_date='$rdate',tech_ph='$rtechph',w_status=' $rstatus'
                 WHERE request_id='$rid'";
                if($conn->query($sql)==TRUE)
      {
          $msg='<div class="alert alert-success mt-3 mb-0">Update successfully</div>';
      }
      else
      {
          $msg='<div class="alert alert-danger mt-3 mb-0">Unable to update</div>';
      }

  }
}

?>


<div class="col-12 page-head">
  <span class="sec-tag">Work Status</span>
  <h2>Update <span class="text-red">Status</span></h2>
</div>
<!-- Start Assigned Work 3rd Column-->
<div class="col-xl-9">
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-pen-to-square"></i>Assigned Work Details</h4></div>
<div class="panel-body">
    <?php

if(isset($_REQUEST['edit'])){
    $sql="SELECT * FROM status_tb WHERE request_id={$_REQUEST['id']}";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
  }
?>
<form action="" method="POST">
<div class="row g-3 mb-3">

<div class="col-md-6">
     <label class="form-label" for="request_id">Request ID</label>
     <input type="text" class="form-control" id="request_id" name="request_id"  
     value="<?php if(isset($row['request_id'])) echo $row['request_id'];?>"readonly>

   </div>
   <div class="col-md-6">
     <label class="form-label" for="request_info">Request Info</label>
     <input type="text" class="form-control" id="request_info" name="request_info"
     value="<?php if(isset($row['request_info'])) echo $row['request_info'];?>" >
   
   </div>
   <div class="col-md-6">
     <label class="form-label" for="requestdesc">Description</label>
     <input type="text" class="form-control" id="requestdesc" name="requestdesc" 
     value="<?php if(isset($row['request_desc'])) echo $row['request_desc'];?>">
   </div>
   <div class="col-md-6">
     <label class="form-label" for="requestername">Name</label>
     <input type="text" class="form-control" id="requestername" name="requestername"
     value="<?php if(isset($row['requester_name'])) echo $row['requester_name'];?>">
   </div>
   </div>
   <div class="row g-3 mb-3">
    <div class="col-md-6">
      <label class="form-label" for="address1">Address Line 1</label>
      <input type="text" class="form-control" id="address1" name="address1"
      value="<?php if(isset($row['requester_add1'])) echo $row['requester_add1'];?>">
    </div>
    <div class="col-md-6">
      <label class="form-label" for="address2">Address Line 2</label>
      <input type="text" class="form-control" id="address2" name="address2"
      value="<?php if(isset($row['requester_add2'])) echo $row['requester_add2'];?>">
    </div>
   </div>
   <div class="row g-3 mb-3">
    <div class="col-md-4">
      <label class="form-label" for="requestercity">City</label>
      <input type="text" class="form-control" id="requestercity" name="requestercity"
      value="<?php if(isset($row['requester_city'])) echo $row['requester_city'];?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="requesterstate">State</label>
      <input type="text" class="form-control" id="requesterstate" name="requesterstate"
      value="<?php if(isset($row['requester_state'])) echo $row['requester_state'];?>">
    
    </div>
    <div class="col-md-4">
      <label class="form-label" for="requesterzip">Zip</label>
      <input type="text" class="form-control" id="requesterzip" name="requesterzip" 
      value="<?php if(isset($row['requester_zip'])) echo $row['requester_zip'];?>"
    onkeypress="isInputNumber(event)">
    </div>
   </div>
   <div class="row g-3 mb-3">
    <div class="col-md-8">
      <label class="form-label" for="requesteremail">Email</label>
      <input type="email" class="form-control" id="requesteremail" name="requesteremail"
      value="<?php if(isset($row['requester_email'])) echo $row['requester_email'];?>">
    </div>
    <div class="col-md-4">
      <label class="form-label" for="requestermobile">Mobile</label>
      <input type="text" class="form-control" id="requestermobile" name="requestermobile"
      value="<?php if(isset($row['requester_mobile'])) echo $row['requester_mobile'];?>"
       onkeypress="isInputNumber(event)">
    </div>
   </div>


<div class="row g-3 mb-3">
    <div class="col-md-6">
      <label class="form-label" for="assigntech">Technician</label>
      <input type="text" class="form-control" id="assigntech" name="assigntech"
      value="<?php if(isset($row['assign_tech'])) echo $row['assign_tech'];?>">
    </div>
    <div class="col-md-6">
      <label class="form-label" for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="inputdate"
      value="<?php if(isset($row['assign_date'])) echo $row['assign_date'];?>">
    </div>
   
    <div class="col-md-6">
      <label class="form-label" for="techph">Technnican ph.No :</label>
      <input type="text" class="form-control" id="techph" name="techph"
      value="<?php if(isset($row['tech_ph'])) echo $row['tech_ph'];?>">
    </div>
   <div class="col-md-6">
   <label class="form-label" for="status">Select the work status :</label>
<select id="status" name="status" class="form-select">
  <option value="">Select Status--</option>
  <option value="completed">Completed</option>
  <option value="Pending">Pending</option>
  <option value="outofstock">Out of stock</option>
</select>
</div>
</div>

<div class="form-actions">
<a href="workstatus.php" class="btn btn-soft" >Close</a>
<button type="submit" class="btn btn-red" name="update"><i class="fa-solid fa-floppy-disk me-2"></i>Update</button>
</div>

</form>
<?php if(isset($msg)){echo $msg;}
?>
</div>
</div>
</div> <!-- End Assigned Work 3rd Column-->
 
<?php include('includes/footer.php')?>