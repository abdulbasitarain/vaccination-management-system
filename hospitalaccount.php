<?php
include 'hospitalheader.php';
include 'dbconnection.php';
?>


<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <div class="col-xl-4 col-md-5 mb-5">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-primary text-uppercase mb-1">
                                                Total Childs</div>
                                            <div class="number h5 mb-0 font-weight-bold text-gray-900">
                                                <?php
                                                $sql = "SELECT * FROM child WHERE status='Active'";
                                                $qsql = mysqli_query($con,$sql);
                                                echo mysqli_num_rows($qsql);
                                                ?>
                                           </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-circle-info fa-2xl" style="color: #3472f7;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-5 mb-5">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                                Total Hospitals</div>
                                            <div class="number h5 mb-0 font-weight-bold text-gray-900">
                                                <?php
                                                $sql = "SELECT * FROM hospital WHERE status='Active' ";
                                                $qsql = mysqli_query($con,$sql);
                                                echo mysqli_num_rows($qsql);
                                                ?>
                                           </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-hospital fa-2xl" style="color: #3472f7;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-4 col-md-5 mb-5">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Available Vaccines</div>
                                            <div class="number h5 mb-0 font-weight-bold text-gray-900">
                                                <?php
                                                $sql = "SELECT * FROM vaccine WHERE status='Active'";
                                                $qsql = mysqli_query($con,$sql);
                                                echo mysqli_num_rows($qsql);
                                                ?>
                                           </div>
                                        </div>
                                        <div class="col-auto">
                                        <i class="fa-solid fa-check fa-2xl" style="color: #3472f7;"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</div>


<?php
include 'adformfooter.php';
?>