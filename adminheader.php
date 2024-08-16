<?php
session_start();
// error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>VM System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="images/hlogoo.png" type="image/x-icon">
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!--------------------------------------------- PHP ADMIN ----------------------------------------------------->



    <!-- Page Wrapper -->
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
                <a class="nav-link" href="dbmain.php">
                <i class="fa-solid fa-house" style="color: #ffffff;"></i>
                <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        
            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="viewchild.php">
                    <i class="fa-solid fa-circle-info" style="color: #ffffff;"></i>
                    <span>All Child Details</span>      
               </a>            
           </li>

           <hr class="sidebar-divider my-0">

           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fa-solid fa-hospital" style="color: #ffffff;"></i>
                    <span>Hospital</span>
               </a>
               <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="viewhospital.php">View Hospitals</a>
                        <a class="collapse-item" href="hospital.php">Add Hospital</a>
                    </div>
               </div>
           </li>

           <hr class="sidebar-divider my-0">

           <li class="nav-item">
                <a class="nav-link" href="viewvaccine.php">
                <i class="fa-solid fa-check" style="color: #ffffff;"></i>
                    <span>Available Vaccines</span>      
               </a>            
           </li>

           <hr class="sidebar-divider my-0">

           <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                   aria-expanded="true" aria-controls="collapseThree">
                   <i class="fa-solid fa-calendar-check" style="color: #ffffff;"></i>
                   <span>Appointments</span>
               </a>
               <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                  <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="appointment.php">New Appointments</a>
                        <a class="collapse-item" href="viewappointmentpending.php">Pending Appointments</a>
                        <a class="collapse-item" href="viewappointmentapproved.php">Approved Appointments</a>
                  </div>
               </div>
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
                                <span class="mr-2 d-none d-lg-inline text-light small">Admin</span>
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
                <!-- End of Topbar -->



                