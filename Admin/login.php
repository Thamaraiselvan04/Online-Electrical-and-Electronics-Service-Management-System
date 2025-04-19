<?php

include('../dbConnection.php');
session_start();
if(!isset($_SESSION['is_adminlogin']))
{
    if(isset($_REQUEST['aEmail']))
    {
    $aEmail=mysqli_real_escape_string($conn,trim($_REQUEST['aEmail']));
    $aPassword =mysqli_real_escape_string($conn,trim($_REQUEST['aPassword']));
    $sql="SELECT a_email, a_password FROM adminlogin_tb WHERE a_email= '".$aEmail."' AND a_password='".$aPassword."' limit 1";
    $result =$conn->query($sql);
        if($result->num_rows==1)
        {
        $_SESSION['is_adminlogin']=true;
        $_SESSION['aEmail']=$aEmail;
        echo "<script>location.href='dashboard.php';</script>";
        exit;
        }
        else
        {
        $msg='<div class="alert alert-warning mt-2">Enter  valid Email and password</div>';
        }
    }
}
else
{
    echo "<script>location.href='dashboard.php';</script>";
    

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap CSS-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--font awesome css-->
    <link rel="stylesheet" href="../css/all.min.css">
    

    <!------------------------------------------------------>

    <!--link boostrap--by thams-->

     <!-- google font-->

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <!--toggle-- button by thams --> 
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- font awesome like by thams-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

                <!------------------------------------------------------>
    <style>
        .custom-margin
        {
            margin-top:8vh;
        }

    </style>
<title>Login</title>
</head>
<body>
    <div class=" mb-3 mt-5 text-center" style="font-size: 30px;">
        <i class="fas fa-stethoscope"></i>
        <span>Online Service Management System</span>
    </div>
    <p class="text-center" style="font-size:20px;"><i class ="fas fa-user-secret text-danger"></i>Admin Area</p>
    <div class="container-fluid">
        <div class="row justify-content-center custom-margin">
            <div class="col-sm-6 col-md-4">
                <form action="" class="shadow-lg p-4" method="POST">
                    <div class="form-group">
                    <i class="fas fa-user"></i><label for="email" class="font-weight-bold pl-2">Email</label><input type="email"
                    class="form-control" placeholder="Email" name="aEmail">
                    <small class="form-text">We will never share your email your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                    <i class="fas fa-key"></i><label for="pass" class="font-weight-bold pl-2">Password</label>
                    <input type="password"
                    class="form-control" placeholder="Password" name="aPassword">
                    </div>
                    <button type="submit" class="btn btn-outline-danger mt-3 font-weight-bold btn-block shadow-sm">
                        Login
                    </button>
                    <?php if(isset($msg))
                    {
                        echo $msg;
                    }
                    ?>
                </form>
                <div class="text-center "><a href="../index.php" class="btn btn-info mt-3 font-weight-bold shadow-sm "> Back to Home</a></div>
            </div>
        </div>
    </div>
<!--javascript-- files-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<scirpt src="js/all.min.js"></scirpt>


</body>
</html>