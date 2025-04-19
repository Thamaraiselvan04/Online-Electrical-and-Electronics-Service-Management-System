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
    col-md-2 mr-0" href="dashboard.php">OSMS</a></nav>

    <!--start container-->
    <div class="container-fluid " style="margin-top: 40px;">
    <div class="row"><!--start row-->
    <nav class="col-sm-2 bg-light sidebar py-5 d-print-none">
    
    <!--start side bar 1st column-->
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link <?php  if(PAGE=='dashboard')
                    { echo 'active';} ?>"
                     href="dashboard.php"><i class="fas fa-tachometer-alt"></i>Dashboard</a></li>

                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='work')
                     { echo 'active';} ?>"
                     href="work.php"><i class="fab fa-accessible-icon"></i>Word Order</a></li>

                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='request')
                     { echo 'active';} ?>"
                     href="request.php"><i class="fas fa-align-center"></i>request</a></li>

                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='assets')
                     { echo 'active';} ?>"
                     href="assets.php"><i class="fas fa-database"></i>assets</a></li>

                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='technician')
                     { echo 'active';} ?>"
                     href="technician.php"><i class="fab fa-teamspeak"></i>technician</a></li>

                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='requesters')
                     { echo 'active';} ?>"
                     href="requester.php"><i class="fas fa-users"></i>requesters</a></li>

                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='sellreport')
                     { echo 'active';} ?>"
                     href="soldproductreport.php"><i class="fas fa-table"></i>sell report</a></li>
                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='work report')
                     { echo 'active';} ?>"
                     href="workreport.php"><i class="fas fa-table"></i>Work Report</a></li>


                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='workstatus')
                     { echo 'active';} ?>"
                     href="workstatus.php"><i class="fas fa-signal"></i>Work Status</a></li>


                    <li class="nav-item"><a class="nav-link <?php  if(PAGE=='changepassword')
                     { echo 'active';} ?>"
                     href="changepass.php"><i class="fas fa-key"></i>Change Password</a></li>

                     


                     <li class="nav-item"><a class="nav-link <?php  if(PAGE=='')
                     { echo 'active';} ?>"
                     href="../logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a></li>
            
            
            </ul>
            </div>
        </nav>         
        <!--end side bar 1st column-->