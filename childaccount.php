<?php
include("childheader.php");

$dt = date("d-m-Y");
$tim = date("H:i");

include("dbconnection.php");
if(!isset($_SESSION['childid']))
{
	echo "<script>window.location='childlogin.php';</script>";
}

$sqlchild = "SELECT * FROM child WHERE childid='$_SESSION[childid]' ";
$qsqlchild = mysqli_query($con,$sqlchild);
$rschild = mysqli_fetch_array($qsqlchild);

$sqlchildappointment = "SELECT * FROM appointment WHERE childid='$_SESSION[childid]' ";
$qsqlchildappointment = mysqli_query($con,$sqlchildappointment);
$rschildappointment = mysqli_fetch_array($qsqlchildappointment);
?>

<style>

#exTab1 .tab-content {
  color : white;
  background-color: #428bca;
  padding : 5px 15px;
}


/* remove border radius for the tab */

#exTab1 .nav-pills > li > a {
  border-radius: 0;
}

</style>
<div class=" container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
    </div>
    <div class="card">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                        <div class="header">
                            <div class="alert bg-primary pt-4 pb-4">
                                <h3 class="text-white">Welcome , <?php echo $rschild['childname']; ?>! </h3>
                            </div>
                        </div>
                </div>
            </div>
        </div>


        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="exTab2">	
                    <ul class="nav nav-tabs">
			            <li class="active">
                            <a  href="#1" data-toggle="tab" class="btn btn-danger">Registration History</a>
			           </li>
			           <li style="margin-left: 15px;">
                            <a href="#2" data-toggle="tab" class="btn btn-danger">Appointment</a>
			           </li>
		           </ul>

			        <div class="tab-content ">
			            <div class="tab-pane active" id="1">
                            <h3 style="padding-top: 30px;" class=" font-weight-bolder">Registration History</h3>
                            <h3 class="pt-3">You are with us from <?php echo $rschild['admissiondate']; ?>
                            <?php echo $rschild['admissiontime']; ?></h3>
			        	</div>
			        	<div class="tab-pane" id="2">
                            <h3 style="padding-top: 30px;" class=" font-weight-bolder">Appointment</h3>
                            <?php
                        if(mysqli_num_rows($qsqlchildappointment) == 0)
                        {
                            ?>
                        <h3 class="pt-3">Appointment records not found.. </h3>
                        <?php
                        }
                        else
                        {
                            ?>
                        <h3 class="pt-3">Last Appointment taken on - <?php echo $rschildappointment['appointmentdate']; ?>
                            <?php echo $rschildappointment['appointmenttime']; ?> </h3>
                        <?php
                        }
                        ?>
			        	</div>
			        </div>
                </div>
            </div>
        </div>

    </div>
</div>


<?php
include("adformfooter.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>