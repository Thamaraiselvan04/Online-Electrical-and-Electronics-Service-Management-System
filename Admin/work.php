<?php
define('TITLE', 'work order');
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
?>
<!--start 2nd column-->
<div  class="col-sm-9 col-md-10 mt-5">
    <?php
    $sql="SELECT * FROM assignwork_tb";
    $result =$conn->query($sql);
    if($result->num_rows>0)
    {
        echo '<table class="table">';
        echo '<thead>';
         echo '<tr>';
          echo '<th scope="col">Req ID</th>';
          echo '<th scope="col">Req Info</th>';
          echo '<th scope="col">Name</th>';
          echo '<th scope="col">Address 1</th>';
          echo '<th scope="col">City</th>';
          echo '<th scope="col">Mobile</th>';
          echo '<th scope="col">Technician</th>';
          echo '<th scope="col">Assigned Date</th>';
          echo '<th scope="col">Tech ph.No</th>';
          echo '<th scope="col">Action</th>';
         echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
         while ($row = $result->fetch_assoc()){
          echo '<tr>';
           echo '<td>'.$row['request_id'].'</td>';
           echo '<td>'.$row['request_info'].'</td>';
           echo '<td>'.$row['requester_name'].'</td>';
           echo '<td>'.$row['requester_add2'].'</td>';
           echo '<td>'.$row['requester_city'].'</td>';
           echo '<td>'.$row['requester_mobile'].'</td>';
           echo '<td>'.$row['assign_tech'].'</td>';
           echo '<td>'.$row['assign_date'].'</td>';
           echo '<td>'.$row['tech_ph'].'</td>';
           echo '<td>';
           echo '<form action="viewassignwork.php" method="POST" class="d-inline mr-2">';
           echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-warning" name="view" value="View" type="submit"><i class="far fa-eye"></i></button>';
          echo '</form>';
          echo '<form action="" method="POST" class="d-inline" onsubmit="return confirmDelete();">';
          echo '<input type="hidden" name="id" value=' . $row['request_id'] . '>';
          echo '<button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
          echo '</form>';


          /*echo '<form action="" method="POST" class="d-inline">';
          echo '<input type="hidden" name="id" value='.$row['request_id'].'><button class="btn btn-secondary" name="delete" value="Delete" type="submit"><i class="far fa-trash-alt"></i></button>';
         echo '</form>';*/
         echo '</td>';
        echo '</tr>';
         }
        echo '</tbody>';
       echo '</table>';
    }else{
        echo '0 Result';
       }
       if(isset($_REQUEST['delete'])){
        $sql= "DELETE FROM assignwork_tb WHERE request_id = {$_REQUEST['id']}";
        if($conn->query($sql) == TRUE){
         echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
        } else {
         echo "Unable to Delete Data";
        }
        }
?>
</div>
<!--end 2nd column-->
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