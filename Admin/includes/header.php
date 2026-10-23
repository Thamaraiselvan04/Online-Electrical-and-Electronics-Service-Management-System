<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo TITLE ?> | OSMS Admin</title>
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
<a class="navbar-brand" href="dashboard.php"><span class="bolt"><i class="fa-solid fa-bolt"></i></span>OSMS</a>
</div>
<span class="area-tag"><i class="fa-solid fa-user-shield me-1"></i>Admin</span>
</div>
</nav>

<div class="dash-wrap">
<!-- Sidebar (slides in on mobile) -->
<aside class="dash-side d-print-none">
<div class="offcanvas-lg offcanvas-start" tabindex="-1" id="sideMenu">
<div class="offcanvas-header"><span class="auth-brand">Menu</span><button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sideMenu" aria-label="Close"></button></div>
<div class="offcanvas-body">
<ul class="side-nav">
<li><a class="<?php if(PAGE=='dashboard') { echo 'active';} ?>" href="dashboard.php"><i class="fa-solid fa-gauge-high"></i>Dashboard</a></li>
<li><a class="<?php if(PAGE=='work') { echo 'active';} ?>" href="work.php"><i class="fa-solid fa-clipboard-list"></i>Work Order</a></li>
<li><a class="<?php if(PAGE=='request') { echo 'active';} ?>" href="request.php"><i class="fa-solid fa-inbox"></i>Requests</a></li>
<li><a class="<?php if(PAGE=='assets') { echo 'active';} ?>" href="assets.php"><i class="fa-solid fa-boxes-stacked"></i>Assets</a></li>
<li><a class="<?php if(PAGE=='technician') { echo 'active';} ?>" href="technician.php"><i class="fa-solid fa-user-gear"></i>Technician</a></li>
<li><a class="<?php if(PAGE=='requesters') { echo 'active';} ?>" href="requester.php"><i class="fa-solid fa-users"></i>Requesters</a></li>
<li><a class="<?php if(PAGE=='sellreport') { echo 'active';} ?>" href="soldproductreport.php"><i class="fa-solid fa-file-invoice"></i>Sell Report</a></li>
<li><a class="<?php if(PAGE=='work report') { echo 'active';} ?>" href="workreport.php"><i class="fa-solid fa-table"></i>Work Report</a></li>
<li><a class="<?php if(PAGE=='workstatus') { echo 'active';} ?>" href="workstatus.php"><i class="fa-solid fa-signal"></i>Work Status</a></li>
<li><a class="<?php if(PAGE=='changepassword') { echo 'active';} ?>" href="changepass.php"><i class="fa-solid fa-key"></i>Change Password</a></li>
<li class="logout"><a href="../logout.php"><i class="fa-solid fa-right-from-bracket"></i>Logout</a></li>
</ul>
</div>
</div>
</aside>

<!-- Page content -->
<main class="dash-main">
<div class="container-fluid">
<div class="row g-4">
