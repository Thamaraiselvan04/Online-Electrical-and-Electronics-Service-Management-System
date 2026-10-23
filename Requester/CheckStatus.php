<?php
define('TITLE','status');
define('PAGE','CheckStatus');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if($_SESSION['is_login'])
{
    $rEmail=$_SESSION['rEmail'];
}
else{
    echo "<script>location.href='RequesterLogin.php'</script>";
}
?>
<!-- start 2nd column-->
<div class="col-12 page-head d-print-none">
    <span class="sec-tag">Track</span>
    <h2>Service <span class="text-red">Status</span></h2>
</div>
 <div class="col-lg-10 col-xl-8">
 <div class="panel">
 <div class="panel-head d-print-none"><h4><i class="fa-solid fa-magnifying-glass"></i>Check Your Request</h4></div>
 <div class="panel-body">
    <form action="" method="POST" class="d-print-none">
        <label for="checkid" class="form-label">Enter Request ID:</label>
        <div class="d-flex flex-column flex-sm-row gap-2">
            <input type="text" class="form-control" name="checkid" id="checkid" placeholder="e.g. 12" onkeypress="isInputNumber(event)">
            <button type ="submit" class="btn btn-red px-4"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
        </div>
    </form>
    <?php
     if(isset($_REQUEST['checkid']))
     {
   if($_REQUEST['checkid'] == ""){
    $msg = '<div class="alert alert-warning mt-3 mb-0" role="alert"> Fill All Fileds </div>';
   }
        else{
            $sql = "SELECT * FROM assignwork_tb WHERE request_id = {$_REQUEST['checkid']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if((isset($row['request_id']) == isset($_REQUEST['checkid'])))
        {
        
        ?>
     <h4 class="mt-4 mb-3"><i class="fa-solid fa-clipboard-check text-red me-2"></i>Assigned work details</h4>
     <div class="table-responsive">
     <table class="table table-bordered table-detail">
        <tbody>
            <tr>
                <th>Request ID</th>
                <td><?php if(isset($row['request_id']))
                {
                    echo $row['request_id'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Request Info</th>
                <td><?php if(isset($row['request_info']))
                {
                    echo $row['request_info'];
                }
                ?></td>
            </tr>
            <tr>
                <th>Request Description</th>
                <td><?php if(isset($row['request_desc']))
                {
                    echo $row['request_desc'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Name</th>
                <td><?php if(isset($row['requester_name']))
                {
                    echo $row['requester_name'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Address1</th>
                <td><?php if(isset($row['requester_add1']))
                {
                    echo $row['requester_add1'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Address2</th>
                <td><?php if(isset($row['requester_add2']))
                {
                    echo $row['requester_add2'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php if(isset($row['requester_city']))
                {
                    echo $row['requester_city'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php if(isset($row['requester_state']))
                {
                    echo $row['requester_state'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php if(isset($row['requester_email']))
                {
                    echo $row['requester_email'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Customer mobile</th>
                <td><?php if(isset($row['requester_mobile']))
                {
                    echo $row['requester_mobile'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Technician Name</th>
                <td><?php if(isset($row['assign_tech']))
                {
                    echo $row['assign_tech'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Technician Mobile</th>
                <td><?php if(isset($row['tech_ph']))
                {
                    echo $row['tech_ph'];
                } 
                ?></td>
            </tr>
            <tr>
                <th>Customer</th>
                <td></td>
              </tr>
              <tr>
                <th>Technician Sign</th>
                <td></td>
              </tr>
        </tbody>
     </table>
     </div>
     <div class="text-end">
        <form action=""  class="mt-3 d-print-none">
            <input class="btn btn-red" type="submit" value="Print" onClick="window.print()">
            <input class="btn btn-soft" type="submit" value="Close" >
        </form>
     </div>
     <?php }else {
        echo '<div class="alert alert-info mt-4 mb-0"><i class="fa-solid fa-hourglass-half me-2"></i>Your Request is Still Pending</div>';
    } 
        }
        }?>
        <?php if(isset($msg)){echo $msg;}?>
 </div>
 </div>
 </div>
<!-- end 2nd column-->
 <!--only number for input fields-->
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