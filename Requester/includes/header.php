<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo TITLE ?> | OSMS</title>
<!-- Bootstrap 5, Font Awesome 6, Google Fonts (same as home page) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&family=Rajdhani:wght@500;600;700&display=swap" rel="stylesheet">
<!-- Custom CSS -->
<link rel="stylesheet" href="../css/custom.css?v=2">
</head>
<body class="dash-body">

<!-- Top Navbar -->
<nav class="navbar dash-top sticky-top d-print-none">
<div class="container-fluid">
<div class="d-flex align-items-center">
<button class="menu-btn d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#sideMenu" aria-label="Menu"><i class="fa-solid fa-bars"></i></button>
<a class="navbar-brand" href="RequesterProfile.php"><span class="bolt"><i class="fa-solid fa-bolt"></i></span>OSMS</a>
</div>
<a href="../index.php" class="area-tag"><i class="fa-solid fa-house me-1"></i>Home</a>
</div>
</nav>

<div class="dash-wrap">
<!-- Sidebar (slides in on mobile) -->
<aside class="dash-side d-print-none">
<div class="offcanvas-lg offcanvas-start" tabindex="-1" id="sideMenu">
<div class="offcanvas-header"><span class="auth-brand">Menu</span><button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sideMenu" aria-label="Close"></button></div>
<div class="offcanvas-body">
<ul class="side-nav">
<li><a class="<?php if(PAGE=='RequesterProfile') { echo 'active';} ?>" href="RequesterProfile.php"><i class="fa-solid fa-user"></i>Profile</a></li>
<li><a class="<?php if(PAGE=='submitRequest') { echo 'active';} ?>" href="submitRequest.php"><i class="fa-solid fa-file-pen"></i>Submit Request</a></li>
<li><a class="<?php if(PAGE=='CheckStatus') { echo 'active';} ?>" href="CheckStatus.php"><i class="fa-solid fa-magnifying-glass"></i>Service Status</a></li>
<li><a class="<?php if(PAGE=='Requesterchangepassword') { echo 'active';} ?>" href="Requesterchangepassword.php"><i class="fa-solid fa-key"></i>Change Password</a></li>
<li class="logout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
</ul>
</div>
</div>
</aside>

<!-- Page content -->
<main class="dash-main">
<div class="container-fluid">
<div class="row g-4">
