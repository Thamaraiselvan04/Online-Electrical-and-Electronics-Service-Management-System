<?php
include('dbConnection.php');

if(isset($_REQUEST['rSignup']))
{
  //checking for empty fields
  if(($_REQUEST['rName']=="")|| ($_REQUEST['rEmail']=="")||($_REQUEST['rPassword']==""))
  {
     $regmsg= '<div class="alert  alert-warning mt-2" role="atert">All Fields are Required</div>';
  }
  else
  {
    $sql ="SELECT r_email FROM requesterlogin_tb WHERE r_email='".$_REQUEST['rEmail']."'";
    $result = $conn->query($sql);
    if($result -> num_rows==1)
    {
      $regmsg= '<div class="alert  alert-warning mt-2" role="atert">Email ID already registered</div>';
    }

    else
    {
      //assigning user's vlues to variable
      $rName=$_REQUEST['rName'];
      $rEmail=$_REQUEST['rEmail'];
      $rPassword=$_REQUEST['rPassword'];
      $sql= "INSERT INTO requesterlogin_tb(r_name,r_email,r_password) VALUES('$rName','$rEmail','$rPassword')";
        if($conn->query($sql)==TRUE)
        {
          $regmsg='<div class="alert  alert-success mt-2" role="atert">Account successfully created</div>';
        } 
        else
        {
        $regmsg='<div class="alert  alert-danger mt-2" role="atert">Unable to Create Account</div>';
        }
    }
  }
}
  

?>




<div class="container pt-5" id="Registration">
  <h2 class="text-center">Create an Account</h2>
  <div class="row mt-4 mb-4">
    <div class="col-md-6 offset-md-3">
      <form action="" class="shadow-lg p-4" method="POST">
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Name</label>
          <input type="text" class="form-control" placeholder="Name"
          name="rName">
        </div>
        <div class="form-group">
          <i class="fas fa-user"></i><label for="name" class="font-weight-bold pl-2">Email</label>
          <input type="email" class="form-control" placeholder="Email"
          name="rEmail">
          <small class="form-text">We will never share your email with anyone else.</small>
        </div>
          <div class="form-group">
          <i class="fas fa-key"></i><label for="name" class="font-weight-bold pl-2">Enter the Password</label>
          <input type="password" class="form-control" placeholder="password"
          name="rPassword">
          </div>
          <button type="submit" class="btn btn-danger mt-5 btn-block shadow-sm font-weight-bold" name="rSignup" >Sign Up</button>
          <em style="font-size:10px">Note - by clicking sign Up, you agree to our Terms, Data policy and cookie policy</em>
        <?php 
        if(isset($regmsg)) 
        {
          echo $regmsg;
          }
          ?>
        </form>
    </div>
  </div>
</div>