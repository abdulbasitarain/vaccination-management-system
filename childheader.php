<?php
session_start();
error_reporting(0);
include("dbconnection.php");
$dt = date("d-m-Y");
$tim = date("H:i");
?>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VM System</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/hlogoo.png" type="image/x-icon">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">


</head>

<body>
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->    
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="images/hlogo.png" alt="" style="width: 53px; height: 53px;">
        </div>
        <div class="sidebar-brand-text mx-3">VM System</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="childaccount.php">
        <i class="fa-solid fa-house" style="color: #ffffff;"></i>
        <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link" href="childprofile.php">
            <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
            <span>Child Details</span>      
       </a>            
   </li>

   <hr class="sidebar-divider my-0">

   <li class="nav-item">
        <a class="nav-link" href="next.php">
            <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
            <span>Next Vaccine</span>      
       </a>            
   </li>

   <hr class="sidebar-divider my-0">

   <li class="nav-item">
        <a class="nav-link" href="report.php">
        <i class="fa-solid fa-check" style="color: #ffffff;"></i>
            <span>Report</span>      
       </a>            
   </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand topbar mb-4 static-top shadow" style="background-color: #4e73df;">

            <!-- Sidebar Toggle (Topbar) -->
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">


                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-light small">Child</span>
                        <img class="img-profile rounded-circle"
                            src="images/svgs/undraw_profile.svg">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
