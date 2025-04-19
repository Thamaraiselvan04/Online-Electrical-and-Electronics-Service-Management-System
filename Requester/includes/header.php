<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
<!--bootstrap CSS-->
<link rel="stylesheet" href="../css/bootstrap.min.css">

<!--font awesome css-->
<link rel="stylesheet" href="../css/all.min.css">


<!-- Custome CSS -->
<link rel="stylesheet" href="../css/custom.css">

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
        
    
</head>
<body>
    <!--Top Navbar-->
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow"><a class="navbar-brand col-sm-3 
    col-md-2 mr-0" href="RequesterProfile.php">OSMS</a></nav>
    <!--start container-->
    <div class="container-fluid " style="margin-top: 40px;">
    <div class="row"><!--start row-->
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    
    <!--start side bar 1st column-->
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link <?php  if(PAGE=='RequesterProfile')
                    { echo 'active';} ?>"
                     href="RequesterProfile.php"><i class="fas fa-user"></i>Profile</a></li>
                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='submitRequest')
                     { echo 'active';} ?>"
                     href="submitRequest.php"><i class="fab fa-accessible-icon"></i>Submit Request</a></li>
                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='CheckStatus')
                     { echo 'active';} ?>"
                     href="CheckStatus.php"><i class="fas fa-align-center"></i>Service Status</a></li>
                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='Requesterchangepassword')
                     { echo 'active';} ?>"
                     href="Requesterchangepassword.php"><i class="fas fa-key"></i>Change Password</a></li>
                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='')
                     { echo 'active';} ?>"
                     href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            
            
            </ul>
            </div>
        </nav>         
        <!--end side bar 1st column-->
       

