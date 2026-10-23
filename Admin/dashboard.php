<?php
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
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
$sql = "SELECT * FROM submitrequest_tb";
$result = $conn->query($sql);
$submitrequest = $result->num_rows;

/*$sql = "SELECT max(request_id) FROM submitrequest_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$submitrequest = $row[0];*/

$sql = "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
$assignwork = $result->num_rows;

/*$sql = "SELECT * FROM assignwork_tb";
$result = $conn->query($sql);
$row = $result->fetch_row();
$assignwork = $row[0];*/

$sql = "SELECT * FROM technician_tb";
$result = $conn->query($sql);
$totaltech = $result->num_rows;
?>


<div class="col-12 page-head">
    <span class="sec-tag">Overview</span>
    <h2>Admin <span class="text-red">Dashboard</span></h2>
</div>
<!--start dashboard 2nd column-->
        <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="ic"><i class="fa-solid fa-inbox"></i></div>
            <div>
            <div class="num"><?php echo $submitrequest; ?></div>
            <p>Requests Received</p>
            <a href="request.php">View <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
        </div>
        </div>

        <div class="col-sm-6 col-xl-4">
        <div class="stat-card dark">
            <div class="ic"><i class="fa-solid fa-clipboard-list"></i></div>
            <div>
            <div class="num"><?php echo $assignwork; ?></div>
            <p>Assigned Work</p>
            <a href="work.php">View <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
        </div>
        </div>

        <div class="col-sm-6 col-xl-4">
        <div class="stat-card">
            <div class="ic"><i class="fa-solid fa-user-gear"></i></div>
            <div>
            <div class="num"><?php echo $totaltech ?></div>
            <p>No. of Technician</p>
            <a href="technician.php">View <i class="fa-solid fa-arrow-right ms-1"></i></a>
            </div>
        </div>
        </div>

        <div class="col-12">
        <div class="panel">
            <div class="panel-head"><h4><i class="fa-solid fa-users"></i>List of Requesters</h4></div>
            <div class="panel-body">
            <div class="table-responsive">
            <?php 
      $sql = "SELECT * FROM requesterlogin_tb";
      $result = $conn->query($sql);
      if($result->num_rows > 0)
      {
       echo '
       <table class="table table-osms">
        <thead>
         <tr>
          <th scope="col">Requester ID</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
         </tr>
        </thead>
        <tbody>';
         while($row = $result->fetch_assoc())
         {
         echo '<tr>';
          echo '<td>'.$row["r_login_id"].'</td>';
          echo '<td>'.$row["r_name"].'</td>';
          echo '<td>'.$row["r_email"].'</td>';
         echo '</tr>';
         }
        echo '</tbody>
       </table>';
      } else {
       echo '<div class="empty-box"><i class="fa-solid fa-users-slash"></i>0 Result</div>';
      }
     ?>
            </div>
            </div>
        </div>
        </div>
<!--end board 2nd column-->
<?php include('includes/footer.php')?>