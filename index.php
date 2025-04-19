<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap css-->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!--fontawsome css-->
    <link rel="stylesheet" href="css/all.min.css">

    <!-- google font-->

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Ubuntu+Sans:ital,wght@0,100..800;1,100..800&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    
    <!--custom css-->
    <link rel="stylesheet" href="css/custom.css">
    <title>OSMS⚙️</title>


    <!--toggle-- button by thams --> 
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

    <!-- font awesome like by thams-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />



</head>
<body>
    <!--start navigation-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <a href="index.php" class="navbar-brand"> 🛠️OSMS</a>
  <span class="navbar-text">Customer's Happiness is our aim!   </span>
    <button  type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#myMenu" aria-controls="myMenu" aria-expanded="false" >
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class = "collapse navbar-collapse" id="myMenu">

      <ul class="navbar-nav pl-5 custom-nav">
        <li class="nav-item"><a href="index.php" class="nav-link">   Home</a></li>
        <li class="nav-item"><a href="#Services" class="nav-link">Services</a></li>
        <li class="nav-item"><a href="#Registration" class="nav-link">Registration</a></li>
        <li class="nav-item"><a href="Requester/RequesterLogin.php" class="nav-link">Login</a></li>
        <li class="nav-item"><a href="#Contact" class="nav-link">Contact</a></li>

      </ul>
      
    </div>
  
</nav>
<!--end navigation-->
<!-- start header jumbotron-->
 <header  class="jumbotron back-image" style="background-image:url(images/Banner1.jpg);">

 <div class="myclass  mainHeading">
  <h1 class="text-uppercase text-white font-weight-bold">Welcome to online services management system</h1>
  <p class="font-italic">Customer's happiness is our aim</p>
  <a href="Requester/RequesterLogin.php" class="btn btn-success mr-4">Login</a>
  <a href="#Registration" class="btn btn-danger mr-4">Sign up</a>
</div>
</header >
<!-- end header jumbotron-->
<!-- start  introducation section--> 
<div class="container" >
  <div class="jumbotron">
    <h3 class="text-center">OSMS Services</h3>
    <p?> OSMS Services is india's leading chain of multi-brand Electronics and Electrical service
        workshops offering
        wide array of services. We focus on enhancing your uses experience by offering world-class
        Electronic
        Appliances maintenance services. Our sole mission is “To provide Electronic Appliances care
        services to
        keep the devices fit and healthy and customers happy and smiling”.

        With well-equipped Electronic Appliances service centres and fully trained mechanics, we
        provide quality
        services with excellent packages that are designed to offer you great savings.

        Our state-of-art workshops are conveniently located in many cities across the country. Now you
        can book
        your service online by doing Registration.
</p>
  </div>
</div>
<!-- end  introducation section--> 


<!--start  services section-->
<div class="container text-center border-bottom" id="Services">
  <h2>Our Services</h2>
  <div class="row mt-4">
    <div class="col-sm-4 mb-4">
      <a href="#"><i class="fas fa-tv fa-8x text-success"></i></a>
      <h4 class="mt-4">Electronic Appliances</h4>
    </div>
    <div class="col-sm-4 mb-4">
      <a href="#"><i class="fas fa-sliders-h fa-8x text-primary"></i></a>
      <h4 class="mt-4">Preventive Maintenance</h4>
    </div>
    <div class="col-sm-4 mb-4">
      <a href="#"><i class="fas fa-cogs fa-8x text-info"></i></a>
      <h4 class="mt-4">Fault Repair</h4>
    </div>
  </div>
</div>
<!--end  services section-->

<!--start registration form-->
<?php include('UserRegistration.php') ?>
<!--end registration form-->

<!-- start happy costomer-->
 <div class="jumbotron bg-dark">
<div class="container">
  <h2 class="text-center text-white">Our Happy Customers</h2>
  <div class="row mt-5">
  <div class="col-lg-3 col-sm-6">
    <!-- start the first column-->
    <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar1.jpeg" class="img-fluid" style="border-radius: 100px;" alt="avt1">
              <h4 class="card-title">ravi kumar</h4>
              <p class="card-text">This service was really awsome, thank you.</p>
            </div>
          </div>
        </div> <!-- End Customer 1st Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 2nd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="avt3">
              <h4 class="card-title">vijay </h4>
              <p class="card-text">This service was really awsome, thank you</p>
            </div>
          </div>
        </div> <!-- End Customer 2nd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 3rd Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar1.jpeg" class="img-fluid" style="border-radius: 100px;" alt="avt1">
              <h4 class="card-title">ravi ram</h4>
              <p class="card-text">This service was really awsome, thank you</p>
            </div>
          </div>
        </div> <!-- End Customer 3rd Column-->

        <div class="col-lg-3 col-sm-6">
          <!-- Start Customer 4th Column-->
          <div class="card shadow-lg mb-2">
            <div class="card-body text-center">
              <img src="images/avtar3.jpeg" class="img-fluid" style="border-radius: 100px;" alt="avt3">
              <h4 class="card-title">kumar </h4>
              <p class="card-text">This service was really awsome, thank you</p>
            </div>
          </div>
        </div> <!-- End Customer 4th Column-->
  </div>
</div>
 </div>
 <!--happy customer end-->


<!-- start contact us-->
<div class="container" id="Contact">
  <h2 class="text-center mb-4">Contact Us</h2>
  <div class="row">
          <!--start 1st column-->
          <?php include('contactform.php');?>
  <!--end 1st column-->

    <!--start 2nd column-->
    <div class="col-md-4 text-center">
    <strong>Headquarter:</strong><br>
    OSMS pvt Ltd,<br>
    Ashok Nagar,tnagar<br>
    chennai - 600497<br>
    phone: +000000000<br>
    <a href="#" target="_blank">www.osms.com</a><br>
    <br><br>
    <strong>Branch:</strong><br>
    OSMS pvt Ltd,<br>
    gandhi Nagar,<br>
    cuddalore - 600494<br>
    phone: +000000000<br>
    <a href="#" target="_blank">www.osms.com</a><br>
    </div>
    <!--end 2nd column-->
  </div>
</div>
<!--end contact us-->


<!--start footer-->
<footer class="container-fluid bg-dark mt-5 text-white" style="border-top: 3px solid #DC3545;">
  <div class="container">
    <div class="row py-3">
      <div class="col-md-6">
        <!--start 1st column-->
        <span class="pr-2">Follow Us:</span>
        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-facebook-f"></i></a>
        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-twitter"></i></a>
        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-youtube"></i></a>
        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" target="_blank" class="pr-2 fi-color"><i class="fas fa-rss"></i></a>
        
      </div>
       <!--end 1st column-->

       <!--start 2 column-->
       <div class="col-md-6 text-right">
        <small>Designed by lotus @2024</small>
        <small class="ml-2"><a href="Admin/login.php" class="btn btn-warning mr-1"><b>Admin Login</b></a></small>
      </div>
      <!--end 2nd column-->
    </div>
  </div>
</footer>


<!-- javascript-->
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<scirpt src="js/all.min.js"></scirpt>


</body>
</html>