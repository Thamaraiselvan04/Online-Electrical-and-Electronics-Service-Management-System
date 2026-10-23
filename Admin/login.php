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
  <title>Admin Login | OSMS</title>
  <!-- Bootstrap 5, Font Awesome 6, Google Fonts (same as home page) -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="../css/custom.css?v=2">
</head>
<body>

<div class="auth-page">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-xl-10">
        <div class="reg-wrap">
          <div class="row g-0">

            <!-- Left: image + info -->
            <div class="col-lg-5">
              <div class="reg-side" style="background-image:url('https://images.pexels.com/photos/33694019/pexels-photo-33694019.jpeg?auto=compress&cs=tinysrgb&w=800');">
                <a href="../index.php" class="auth-brand mb-4"><span class="bolt"><i class="fa-solid fa-bolt"></i></span>OSMS</a>
                <span class="badge bg-light text-danger mb-3 px-3 py-2 rounded-pill align-self-start"><i class="fa-solid fa-user-shield me-1"></i>Admin Area</span>
                <h3 class="mb-3">Admin Control Panel</h3>
                <ul class="list-unstyled mb-0">
            <li><i class="fa-solid fa-circle-check"></i>Assign technicians to requests</li>
            <li><i class="fa-solid fa-circle-check"></i>Manage assets &amp; sell products</li>
            <li><i class="fa-solid fa-circle-check"></i>View work &amp; sales reports</li>
                </ul>
              </div>
            </div>

            <!-- Right: login form -->
            <div class="col-lg-7">
              <form action="" method="POST" class="reg-form">
                <h4 class="mb-1">Admin Login</h4>
                <p class="text-muted small mb-4">Enter your email and password to continue.</p>

                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="email" id="email" class="form-control" placeholder="Email" name="aEmail">
                  </div>
                  <div class="form-text">We will never share your email with anyone else.</div>
                </div>

                <div class="mb-4">
                  <label for="pass" class="form-label">Password</label>
                  <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                    <input type="password" id="pass" class="form-control" placeholder="Password" name="aPassword">
                    <button type="button" class="btn btn-outline-secondary pwd-eye" data-target="pass" aria-label="Show password"><i class="fa-solid fa-eye"></i></button>
                  </div>
                </div>

                <button type="submit" class="btn btn-red w-100 py-2">
                  <i class="fa-solid fa-right-to-bracket me-2"></i>Login
                </button>

                <?php if(isset($msg))
                {
                    echo $msg;
                }
                ?>

                <p class="text-center mt-3 mb-0"><a href="../index.php" class="back-link"><i class="fa-solid fa-arrow-left me-1"></i>Back to Home</a></p>
              </form>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Show / hide password (eye button) -->
<script>
  document.querySelectorAll('.pwd-eye').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var input = document.getElementById(this.dataset.target);
      var show = input.type === 'password';
      input.type = show ? 'text' : 'password';
      this.querySelector('i').className = show ? 'fa-solid fa-eye-slash' : 'fa-solid fa-eye';
    });
  });
</script>
</body>
</html>
