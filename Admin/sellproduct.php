<?php
define('TITLE', 'Sell Product');
define('PAGE', 'assets');
include('includes/header.php');
include('../dbConnection.php');
session_start();
if(isset($_SESSION['is_adminlogin'])){
   $aEmail = $_SESSION['aEmail'];
} else {
   echo "<script> location.href='login.php'</script>";
}
if(isset($_REQUEST['psubmit'])){
 if(($_REQUEST['cname'] == "") || ($_REQUEST['cadd'] == "") || ($_REQUEST['pname'] == "") || ($_REQUEST['pquantity'] == "") || ($_REQUEST['psellingcost'] == "") || ($_REQUEST['selldate'] == "")){
  $msg = '<div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds </div>';
 } else {
  $pid = $_REQUEST['pid'];
  $pava = $_REQUEST['pava'] - $_REQUEST['pquantity'];

  $custname = $_REQUEST['cname'];
  $custadd = $_REQUEST['cadd'];
  $cpname = $_REQUEST['pname'];
  $cpquantity = $_REQUEST['pquantity'];
  $cpeach = $_REQUEST['psellingcost'];
  $cptotal = $_REQUEST['psellingcost'] * $_REQUEST['pquantity'];
  $cpdate = $_REQUEST['selldate'];
  $sql = "INSERT INTO customer_tb (custname, custadd, cpname, cpquantity, cpeach,cptotal, cpdate) VALUES 
  ('$custname', '$custadd', '$cpname', '$cpquantity', '$cpeach', '$cptotal','$cpdate')";
  if($conn->query($sql) == TRUE){
   $genid = mysqli_insert_id($conn);
   session_start();
   $_SESSION['myid'] = $genid;
   echo "<script> location.href='productsellsuccess.php'; </script>";
   echo "Added";
  }
  $sqlup = "UPDATE assets_tb SET pava = '$pava' WHERE pid = '$pid'";
  $conn->query($sqlup);
 }
} 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Start 2nd Column -->
<div class="col-sm-6 mt-5 mx-3 jumbotron">
  <h3 class="text-center">Customer Bill</h3>
  <?php 
   if(isset($_REQUEST['issue'])){
   $sql = "SELECT * FROM assets_tb WHERE pid = {$_REQUEST['id']}";
   $result = $conn->query($sql);
   $row = $result->fetch_assoc();
   }
  ?>
  <form action="" method="POST">
    <div class="form-group">
      <label for="pid">Product ID</label>
      <input type="text" class="form-control" id="pid" name="pid" value="<?php if(isset($row['pid'])) {echo $row['pid']; }?>" readonly>
    </div>
    <div class="form-group">
      <label for="cname">Customer Name</label>
      <input type="text" class="form-control" id="cname" name="cname">
    </div>
    <div class="form-group">
      <label for="cadd">Customer Address</label>
      <input type="text" class="form-control" id="cadd" name="cadd">
    </div>
    <div class="form-group">
      <label for="pname">Product Name</label>
      <input type="text" class="form-control" id="pname" name="pname" value="<?php if(isset($row['pname'])) {echo $row['pname']; }?>">
    </div>
    <div class="form-group">
      <label for="pava">Available</label>
      <input type="text" class="form-control" id="pava" name="pava" onkeypress="isInputNumber(event)" value="<?php if(isset($row['pava'])) {echo $row['pava']; }?>" readonly>
    </div>
    <div class="form-group">
    <label for="pquantity">Enter Quantity:</label>
    <input type="number" class="form-control" id="pquantity" name="pquantity" oninput="calculateTotal()">  
  </div>
    <div class="form-group">
      <label for="psellingcost">Price Each</label>
      <input type="text" class="form-control" id="psellingcost" name="psellingcost"
        onkeypress="isInputNumber(event)"value="<?php if(isset($row['psellingcost'])) {echo $row['psellingcost']; }?>">
    </div>
   
    <div class="form-row">
  <div class="form-group col-md-4 ">
      <label for="inputDate">Date</label>
      <input type="date" class="form-control" id="inputDate" name="selldate" min="">
    </div>
    </div>
    <br>
    <div class="form-row">
     <div class="form-group col-md-6">
      <h3>Total Rs:<span id="totalcost">0.00</span></h3>
    </div>
   
    <div class="form-group col-md-2">
      <button type="submit" class="btn btn-danger" id="psubmit" name="psubmit" 
     >Submit</button>
     </div>
     <div class="form-group col-md-2">
      <a href="assets.php" class="btn btn-secondary">Close</a>
  </div>
  </div>
    <?php if(isset($msg)) {echo $msg; } ?>
  </form>
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
 <!-- JavaScript to handle dynamic calculation -->
    <script>
        function calculateTotal() {
            var pquantity = $('#pquantity').val();  // Get quantity from input
            
            // Check if quantity is valid
            if (pquantity > 0) {
                $.ajax({
                    url: 'get_selling_cost.php',  // PHP script to fetch selling cost
                    type: 'GET',
                    data: { pquantity: pquantity },  // Send quantity as a parameter
                    success: function(response) {
                        var data = JSON.parse(response);  // Parse the JSON response
                        
                        // If selling cost is found, calculate the total
                        if (data.psellingcost) {
                            var totalcost = pquantity * data.psellingcost;
                            $('#totalcost').text(totalcost.toFixed(2));  // Update total on the page
                        } else {
                            $('#totalcost').text('0.00');  // If no selling cost found, show 0
                        }
                    },
                    error: function() {
                        alert('Error fetching selling cost.');
                    }
                });
            } else {
                $('#totalcost').text('0.00');  // Reset total if quantity is 0 or invalid
            }
        }
    </script>

<script>
    // Set today's date as the minimum value for the input
    document.getElementById('inputDate').min = new Date().toISOString().split('T')[0];
</script>

<?php
include('includes/footer.php'); 
?>