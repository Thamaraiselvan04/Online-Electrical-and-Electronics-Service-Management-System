<?php
define('TITLE', 'request');
define('PAGE', 'request');
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
?>
<div class="col-12 page-head">
  <span class="sec-tag">Incoming</span>
  <h2>Service <span class="text-red">Requests</span></h2>
</div>
<!--start 2nd column-->
<div class="col-lg-5">
<div class="panel">
<div class="panel-head"><h4><i class="fa-solid fa-inbox"></i>New Requests</h4></div>
<div class="panel-body">
    <?php
            $sql = "SELECT request_id, request_info, request_desc, request_date FROM
             submitrequest_tb";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
             while($row = $result->fetch_assoc()){
              echo '<div class="req-card">';
               echo '<div class="req-id">';
                echo 'Request ID: '. $row['request_id'];
               echo '</div>';
               echo '<div>';
               echo '<h5>Request Info: '.$row['request_info'];
               echo '</h5>';
               echo '<p>'.$row['request_desc'];
               echo '</p>';
               echo '<p class="small"><i class="fa-regular fa-calendar me-1"></i>Request Date: '.$row['request_date'];
               echo '</p>';
              echo '<div class="d-flex justify-content-end">';
              echo '<form action="" method="POST" class="d-flex gap-2">';
              echo '<input type="hidden" name="id" value='.$row['request_id'].'>';
              echo '<input type="submit" class="btn btn-red btn-sm" value="View" name="view">';
              echo '<input type="submit" class="btn btn-soft btn-sm" value="Close" name="close">';
              echo '</form>';
              echo '</div>';
               echo '</div>';
              echo '</div>';
             }
            }
           ?>
          </div>
          </div>
          </div> <!-- End 2nd Column -->

<?php 
include('assignworkform.php');
include('includes/footer.php');
?>