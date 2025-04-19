<?php
define('TITLE', 'workorder');
define('PAGE', 'work');
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
if(isset($_REQUEST['view'])){
  $sql="SELECT * FROM assignwork_tb WHERE request_id={$_REQUEST['id']}";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}

if(isset($_REQUEST['save']))
{
  if(($_REQUEST['request_id']=="")||($_REQUEST['request_info']=="")||
  ($_REQUEST['requestername']=="")||($_REQUEST['address1']=="")||($_REQUEST['requestercity']=="")||
  ($_REQUEST['requestermobile']=="")||($_REQUEST['assigntech']=="")||
  ($_REQUEST['inputdate']=="")||($_REQUEST['techph']=="") ||($_REQUEST['status']==""))
  
  {
      $msg='<div class="alert alert-warning col-sm-6 ml-5 mt-2">Fill All Fields</div>';
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
                $sql="INSERT INTO status_tb (request_id,request_info, request_desc,
                requester_name, requester_add1,requester_add2,requester_city,
                requester_state,requester_zip,requester_email,requester_mobile,assign_tech,assign_date,tech_ph,w_status)
                VALUES ('$rid','$rinfo','$rdesc','$rname',' $radd1',' $radd2','$rcity','$rstate',
                '$rzip','$remail','$rmobile','$rassigntech','$rdate','$rtechph','$rstatus')";
                if($conn->query($sql)==TRUE)
      {
          $msg='<div class="alert alert-success col-sm-6 ml-5 mt-2">Save successfully</div>';
      }
      else
      {
          $msg='<div class="alert alert-danger col-sm-6 ml-5 mt-2">Unable to save</div>';
      }

  }
}

?>


<div class="col-sm-6 mt-5 mx-3 jumbotron"> <!-- Start Assigned Work 3rd Column-->
<form action="" method="POST">
<h5 class="text-center">Assigned Work Details</h5>

<div class="form-group">
     <label for="request_id">Request ID</label>
     <input type="text" class="form-control" id="request_id" name="request_id"  
     value="<?php if(isset($row['request_id'])) echo $row['request_id'];?>"readonly>

   </div>
   <div class="form-group">
     <label for="request_info">Request Info</label>
     <input type="text" class="form-control" id="request_info" name="request_info"
     value="<?php if(isset($row['request_info'])) echo $row['request_info'];?>">
   
   </div>
   <div class="form-group">
     <label for="requestdesc">Description</label>
     <input type="text" class="form-control" id="requestdesc" name="requestdesc" 
     value="<?php if(isset($row['request_desc'])) echo $row['request_desc'];?>">
   </div>
   <div class="form-group">
     <label for="requestername">Name</label>
     <input type="text" class="form-control" id="requestername" name="requestername"
     value="<?php if(isset($row['requester_name'])) echo $row['requester_name'];?>">
   </div>
   <div class="form-row">
    <div class="form-group col-md-6">
      <label for="address1">Address Line 1</label>
      <input type="text" class="form-control" id="address1" name="address1"
      value="<?php if(isset($row['requester_add1'])) echo $row['requester_add1'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="address2">Address Line 2</label>
      <input type="text" class="form-control" id="address2" name="address2"
      value="<?php if(isset($row['requester_add2'])) echo $row['requester_add2'];?>">
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md-4">
      <label for="requestercity">City</label>
      <input type="text" class="form-control" id="requestercity" name="requestercity"
      value="<?php if(isset($row['requester_city'])) echo $row['requester_city'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="requesterstate">State</label>
      <input type="text" class="form-control" id="requesterstate" name="requesterstate"
      value="<?php if(isset($row['requester_state'])) echo $row['requester_state'];?>">
    
    </div>
    <div class="form-group col-md-4">
      <label for="requesterzip">Zip</label>
      <input type="text" class="form-control" id="requesterzip" name="requesterzip" 
      value="<?php if(isset($row['requester_zip'])) echo $row['requester_zip'];?>"
    onkeypress="isInputNumber(event)">
    </div>
   </div>
   <div class="form-row">
    <div class="form-group col-md-8">
      <label for="requesteremail">Email</label>
      <input type="email" class="form-control" id="requesteremail" name="requesteremail"
      value="<?php if(isset($row['requester_email'])) echo $row['requester_email'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="requestermobile">Mobile</label>
      <input type="text" class="form-control" id="requestermobile" name="requestermobile"
      value="<?php if(isset($row['requester_mobile'])) echo $row['requester_mobile'];?>"
       onkeypress="isInputNumber(event)">
    </div>
   </div>


<div class="form-row">
    <div class="form-group col-md-6">
      <label for="assigntech">Technician</label>
      <input type="text" class="form-control" id="assigntech" name="assigntech"
      value="<?php if(isset($row['assign_tech'])) echo $row['assign_tech'];?>">
    </div>
    <div class="form-group col-md-6">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="inputdate"
      value="<?php if(isset($row['assign_date'])) echo $row['assign_date'];?>">
    </div>
   
    <div class="form-group col-md-6">
      <label for="techph">Technnican ph.No :</label>
      <input type="text" class="form-control" id="techph" name="techph"
      value="<?php if(isset($row['tech_ph'])) echo $row['tech_ph'];?>">
    </div>

    




   <div class="form-group col-md-6">
   <label for="status">Select the work status :</label>
<select id="status" name="status" class="form-control">
  <option value="">--Select Status--</option>
  <option value="completed">Completed</option>
  <option value="Pending">Pending</option>
  <option value="outofstock">Out of stock</option>
</select>
</div>

</div>
<div class="float-right">
<button type="submit" class="btn btn-success font-weight-bold shadow-sm"  onclick="submitForm()" name="save">Save</button>
<a href="workstatus.php" class="btn btn-secondary  font-weight-bold shadow-sm" >Close</a>
</div>
</div>

</form>
</form>
<div id="result"></div>
<?php if(isset($msg)){echo $msg;}?>


<?php include('includes/footer.php')?>