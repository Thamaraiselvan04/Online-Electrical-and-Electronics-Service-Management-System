<?php
define('TITLE', 'requesters');
define('PAGE', 'requesters');
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
<!--start 2nd column-->
<div class="col-sm-9 col-md-10 mt-5 text-center">
 <p class="bg-dark text-white p-2">List of Requesters</p>
 <?php 
  $sql = "SELECT * FROM requesterlogin_tb"; 
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">Requester ID</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">Email</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$row["r_login_id"].'</td>';
       echo '<td>'.$row["r_name"].'</td>';
       echo '<td>'.$row["r_email"].'</td>';
       echo '<td>';
        echo '<form action="editreq.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$row["r_login_id"].'><button type="submit" class="btn btn-info mr-3" name="edit" value="Edit"><i class="fas fa-pen"></i></button>';
        echo '</form>';



        echo '<form action="" method="POST" class="d-inline" onsubmit="return confirmDelete();">';
        echo '<input type="hidden" name="id" value=' . $row['r_login_id'] . '>';
        echo '<button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
        echo '</form>';

    
       echo '</td>';
      echo '</tr>';
     }
    echo '</tbody>';
   echo '</table>';
  } else {
   echo '0 Result';
  }
 ?>
</div>
<?php
 if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM requesterlogin_tb WHERE r_login_id = {$_REQUEST['id']}";
 if($conn->query($sql) == TRUE){
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
 } else {
  echo 'Unable to Delete';
 }
 }
?>
  </div> <!-- End Row -->
  <div class="float-right"><a href="insertreq.php" class="btn btn-danger"><i class="fas fa-plus fa-2x"></i></a></div>
 </div> <!-- End Container -->

</div>


<script type="text/javascript">
    // JavaScript function to show a confirmation dialog before form submission
    function confirmDelete() {
        var result = confirm("Are you sure you want to delete this request?");
        // If the user clicks OK, proceed with form submission (return true)
        if (result) {
            return true;
        } else {
            return false; // Prevent form submission if Cancel is clicked
        }
    }
</script>
<?php include('includes/footer.php')?>