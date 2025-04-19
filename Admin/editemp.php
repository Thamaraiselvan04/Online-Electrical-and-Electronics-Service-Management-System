<?php    
define('TITLE', 'Update Technician');
define('PAGE', 'technician');
include('includes/header.php'); 
include('../dbConnection.php');
session_start();
if (isset($_SESSION['is_adminlogin'])) {
    $aEmail = $_SESSION['aEmail'];
} else {
    echo "<script> location.href='login.php'; </script>";
}

if (isset($_REQUEST['empupdate'])) {
    if (($_REQUEST['empName'] == "") || ($_REQUEST['empCity'] == "") || ($_REQUEST['empMobile'] == "") || ($_REQUEST['empEmail'] == "")) {
        $msg = 'Fill All Fields';
        $alertType = "warning"; // Alert type for empty fields
    } else {
        $eId = $_REQUEST['empId'];
        $eName = $_REQUEST['empName'];
        $eCity = $_REQUEST['empCity'];
        $eMobile = $_REQUEST['empMobile'];
        $eEmail = $_REQUEST['empEmail'];
        $sql = "UPDATE technician_tb SET 
        empName = '$eName', empCity = '$eCity', empMobile = '$eMobile', empEmail = '$eEmail' WHERE empid = '$eId'";
        if ($conn->query($sql) === TRUE) {
            $msg = 'Updated Successfully';
            $alertType = "success"; // Alert type for successful update
        } else {
            $msg = 'Unable to Update';
            $alertType = "danger"; // Alert type for error
        }
    }
}
?>

<div class="col-sm-6 mt-5 mx-3 jumbotron">
    <h3 class="text-center">Update Technician Details</h3>
    <?php
    if (isset($_REQUEST['edit'])) {
        $sql = "SELECT * FROM technician_tb
         WHERE empid = {$_REQUEST['id']}";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }
    ?>
    <!-- Update Technician Form -->
    <form action="" method="POST">
        <div class="form-group">
            <label for="empId">Emp ID</label>
            <input type="text" class="form-control" id="empId" name="empId" value="<?php if (isset($row['empid'])) { echo $row['empid']; } ?>" readonly>
        </div>
        <div class="form-group">
            <label for="empName">Name</label>
            <input type="text" class="form-control" id="empName" name="empName" value="<?php if (isset($row['empName'])) { echo $row['empName']; } ?>">
        </div>
        <div class="form-group">
            <label for="empCity">City</label>
            <input type="text" class="form-control" id="empCity" name="empCity" value="<?php if (isset($row['empCity'])) { echo $row['empCity']; } ?>">
        </div>
        <div class="form-group">
            <label for="empMobile">Mobile</label>
            <input type="text" class="form-control" id="empMobile" name="empMobile" value="<?php if (isset($row['empMobile'])) { echo $row['empMobile']; } ?>" onkeypress="isInputNumber(event)">
        </div>
        <div class="form-group">
            <label for="empEmail">Email</label>
            <input type="email" class="form-control" id="empEmail" name="empEmail" value="<?php if (isset($row['empEmail'])) { echo $row['empEmail']; } ?>">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-danger" id="empupdate" name="empupdate">Update</button>
            <a href="technician.php" class="btn btn-secondary">Close</a>
        </div>
    </form>
</div>

<!-- Success/Error Popup Message -->
<?php if (isset($msg)): ?>
    <div id="alertMessage" class="alert alert-<?php echo $alertType; ?> alert-dismissible fade show" role="alert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 9999; width: 60%; text-align: center; font-size: 18px;">
        <?php echo $msg; ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <script>
        // Automatically hide the alert after 3 seconds
        setTimeout(function() {
            $('#alertMessage').fadeOut();
        }, 3000);
    </script>
<?php endif; ?>

<!-- Only Number for input fields -->
<script>
    function isInputNumber(evt) {
        var ch = String.fromCharCode(evt.which);
        if (!(/[0-9]/.test(ch))) {
            evt.preventDefault();
        }
    }
</script>

<!-- Include Bootstrap JS for the alert functionality -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

<?php include('includes/footer.php'); ?>
