<?php
define('TITLE', 'Success'); 
define('PAGE','submitRequest');
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
}$sql = "SELECT * FROM submitrequest_tb WHERE request_id = {$_SESSION['myid']}";
$result = $conn->query($sql);
if($result->num_rows == 1)
{
$row = $result->fetch_assoc();
echo "<div class='col-lg-8 col-xl-7'>
<div class='panel'>
<div class='panel-head'><h4><i class='fa-solid fa-circle-check'></i>Request Submitted Successfully</h4></div>
<div class='panel-body'>
<div class='table-responsive'>
<table class='table table-bordered table-detail'>
<tbody>
<tr>
<th>Request ID</th>
<td>".$row['request_id']."</td>
</tr>
<tr>
<th>Name</th>
<td>".$row['requester_name']."</td>
</tr>
<tr>
<th>Email ID</th>
<td>".$row['requester_email']."</td>
</tr>
<tr>
<th>Request Info</th>
<td>".$row['request_info']."</td>
</tr>
<tr>
<th>Request Description</th>
<td>".$row['request_desc']."</td>
</tr>
</tbody>
</table>
</div>
<form class='d-print-none mt-4 text-end'>
<button class='btn btn-red' type='submit' onClick='window.print()'><i class='fa-solid fa-print me-2'></i>Print</button>
</form>
</div>
</div>
</div>";
}
 else
 {
echo "Failed";
}
include('includes/footer.php');
?>


