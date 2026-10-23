<?php
define('TITLE','Submit Request');
define('PAGE','submitRequest');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['rEmail'];
}
else
{
echo "<script>location.href='RequesterLogin.php'</script>";
}

if(isset($_REQUEST['submitrequest']))
{//checking for empty fields
    if(($_REQUEST['requestinfo']=="")|| ($_REQUEST['requestdesc']=="")
    ||($_REQUEST['requestername']=="")||($_REQUEST['requesteradd1']=="")||
    ($_REQUEST['requesteradd2']=="")||($_REQUEST['requestercity']=="")||

    ($_REQUEST['requesterstate']=="")||($_REQUEST['requesterzip']=="")||

    ($_REQUEST['requesteremail']=="")||($_REQUEST['requestermobile']=="")||
    ($_REQUEST['requestdate']==""))
    {
        $msg="<div class='alert alert-warning mt-3 mb-0'>ALL FIELDS ARE REQUIRED</div>";
    }
    else{
       $rinfo= $_REQUEST['requestinfo'];
       $rdesc= $_REQUEST['requestdesc'];
       $rname= $_REQUEST['requestername'];
       $radd1= $_REQUEST['requesteradd1'];
       $radd2= $_REQUEST['requesteradd2'];
       $rcity= $_REQUEST['requestercity'];
       $rstate= $_REQUEST['requesterstate'];
       $rzip= $_REQUEST['requesterzip'];
       $remail= $_REQUEST['requesteremail'];
       $rmobile= $_REQUEST['requestermobile'];
       $rdate= $_REQUEST['requestdate'];
       $sql = "INSERT INTO submitrequest_tb(request_info,request_desc,requester_name,requester_add1,
       requester_add2,requester_city,requester_state,requester_zip,
       requester_email,requester_mobile,request_date)
       VALUES('$rinfo','$rdesc','$rname','$radd1','$radd2',
       '$rcity','$rstate','$rzip','$remail','$rmobile','$rdate')"; 
       if($conn->query($sql)==TRUE)
       {
        $genid=mysqli_insert_id($conn);
        $msg="<div class='alert alert-success mt-3 mb-0'>Request submitted successfully!</div>";
        $_SESSION['myid']=$genid;
        echo "<script>location.href='submitrequestsuccess.php'</script>";
       }
       else
       {
        $msg="<div class='alert alert-danger mt-3 mb-0'>Unable to submit your Request</div>";
    
       }

    }
}

?>

<div class="col-12 page-head">
    <span class="sec-tag">New Service</span>
    <h2>Submit a <span class="text-red">Request</span></h2>
</div>
<div class="col-12 col-xl-10"><!--start service request from 2 column-->
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-file-pen"></i>Service Request Form</h4></div>
<form class="panel-body" action="" method="POST">
  <div class="row g-3">
    <div class="col-md-6">
        <label for="inputRequestInfo" class="form-label">Request Info</label>
        <input type="text" class="form-control" id="inputRequestInfo" placeholder="Enter your Info"
        name="requestinfo">
    </div>

    <div class="col-md-6">
        <label for="inputRequestDescription" class="form-label">Description</label>
        <input type="text" class="form-control" id="inputRequestDescription" placeholder="Write Your Description"
        name="requestdesc">
    </div>

    <div class="col-12">
        <label for="inputName" class="form-label">Name</label>
        <input type="text" class="form-control" id="inputName" placeholder="Enter your Name"
        name="requestername">
    </div>

    <div class="col-md-6">
        <label for="inputAddress" class="form-label">Address Line 1</label>
        <input type="text" class="form-control" id="inputAddress" placeholder="Enter your address-1"
        name="requesteradd1">
    </div>
    <div class="col-md-6">
        <label for="inputAddress2" class="form-label">Address Line 2</label>
        <input type="text" class="form-control" id="inputAddress2" placeholder="Enter your address-2"
        name="requesteradd2">
    </div>

    <div class="col-md-5">
        <label for="inputCity" class="form-label">City</label>
        <input type="text" class="form-control" id="inputCity" placeholder="Enter your city"
        name="requestercity">
    </div>
    <div class="col-sm-7 col-md-4">
        <label for="inputState" class="form-label">State</label>
        <input type="text" class="form-control" id="inputState" placeholder="Enter your state"
        name="requesterstate">
    </div>
    <div class="col-sm-5 col-md-3">
        <label for="inputZip" class="form-label">Zip</label>
        <input type="text" class="form-control" id="inputZip"
        name="requesterzip"  placeholder="Enter your zip" onkeypress="isInputNumber(event)">
    </div>

    <div class="col-md-5">
        <label for="inputEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="inputEmail"
        name="requesteremail" placeholder="Enter your Email">
    </div>
    <div class="col-sm-7 col-md-4">
        <label for="inputMobile" class="form-label">Mobile</label>
        <input type="text" class="form-control" id="inputMobile"
        name="requestermobile" placeholder="Enter your mobile No." onkeypress="isInputNumber(event)">
    </div>
    <div class="col-sm-5 col-md-3">
        <label for="inputDate" class="form-label">Date</label>
        <input type="date" class="form-control" id="inputDate"
        name="requestdate" min="">
    </div>
  </div>
  <div class="form-actions mt-4">
    <button type="reset" class="btn btn-soft">Reset</button>
    <button type="submit" class="btn btn-red" name="submitrequest"><i class="fa-solid fa-paper-plane me-2"></i>Submit</button>
  </div>
<?php if(isset($msg))
{
    echo $msg;
}
?>
</form>
</div>
</div><!--end service request from 2 column-->

<!--only number for input fields-->

<script>
    function isInputNumber(evt)
    {
        var ch=String.fromCharCode(evt.which);
        if(!(/[0-9]/.test(ch))){
        evt.preventDefault();
    }
    }
</script>
<script>
        // Get today's date in YYYY-MM-DD format
        var today = new Date().toISOString().split('T')[0];
        
        // Set the value of the datepicker input to today's date
        document.getElementById('inputDate').value = today;
        
        // Restrict the date picker to only allow today's date
        document.getElementById('inputDate').setAttribute('min', today);
        document.getElementById('inputDate').setAttribute('max', today);
    </script>
<?php
include('includes/footer.php');

?>

