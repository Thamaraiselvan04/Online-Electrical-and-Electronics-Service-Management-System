<?php
define('TITLE', 'Technician');
define('PAGE', 'technician');
include('../dbConnection.php');
include('includes/header.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
?>
<!-- Start 2nd Column -->
<div class="col-12 page-head">
    <span class="sec-tag">Our Team</span>
    <h2>Tech<span class="text-red">nicians</span></h2>
</div>
<div class="col-12">
<div class="panel">
<div class="panel-head">
  <h4><i class="fa-solid fa-user-gear"></i>List of Technician</h4>
  <a href="insertemp.php" class="btn btn-red btn-sm"><i class="fas fa-plus me-1"></i>Add Technician</a>
</div>
<div class="panel-body">
<div class="table-responsive">

 <?php 
  $sql = "SELECT * FROM technician_tb"; 
  $result = $conn->query($sql);
  if($result->num_rows > 0){
   echo '<table class="table table-osms">';
    echo '<thead>';
     echo '<tr>';
      echo '<th scope="col">Emp ID</th>';
      echo '<th scope="col">Name</th>';
      echo '<th scope="col">City</th>';
      echo '<th scope="col">Mobile</th>';
      echo '<th scope="col">Email</th>';
      echo '<th scope="col">Action</th>';
     echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
     while($row = $result->fetch_assoc()){
      echo '<tr>';
       echo '<td>'.$row["empid"].'</td>';
       echo '<td>'.$row["empName"].'</td>';
       echo '<td>'.$row["empCity"].'</td>';
       echo '<td>'.$row["empMobile"].'</td>';
       echo '<td>'.$row["empEmail"].'</td>';
       echo '<td>';
        echo '<form action="editemp.php" class="d-inline" method="POST">';
         echo '<input type="hidden" name="id" value='.$row["empid"].'>
         <button type="submit" class="act-btn act-edit" name="edit" value="Edit" title="Edit"><i class="fas fa-pen"></i></button>';
        echo '</form>';

        echo '<form action="" method="POST" class="d-inline" onsubmit="return confirmDelete();">';
        echo '<input type="hidden" name="id" value=' . $row["empid"] . '>';
        echo '<button class="act-btn act-del" name="delete" value="Delete" type="submit" title="Delete"><i class="far fa-trash-alt"></i></button>';
        echo '</form>';

        
       echo '</td>';
      echo '</tr>';
     }
    echo '</tbody>';
   echo '</table>';
  } else {
   echo '<div class="empty-box"><i class="fa-solid fa-folder-open"></i>0 Result</div>';
  }
 ?>
</div>
</div>
</div>
</div>
<?php
 if(isset($_REQUEST['delete'])){
 $sql = "DELETE FROM technician_tb WHERE empid = {$_REQUEST['id']}";
 if($conn->query($sql) == TRUE){
  echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
 } else {
  echo 'Unable to Delete';
 }
 }
?>

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