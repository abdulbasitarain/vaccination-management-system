<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
  if(isset($_GET['editid']))
  {
   $sql ="UPDATE appointment SET childid='$_POST[select4]',vaccineid='$_POST[select5]',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[time]',hospitalid='$_POST[select6]',status='$_POST[select]' WHERE appointmentid='$_GET[editid]'";
   if($qsql = mysqli_query($con,$sql))
   {
    echo "<script>alert('appointment record updated successfully...');</script>";
}
else
{
    echo mysqli_error($con);
}	
}
else
{
   $sql ="UPDATE child SET status='Active' WHERE childid='$_POST[select4]'";
   $qsql=mysqli_query($con,$sql);

   $sql ="INSERT INTO appointment(childid, vaccineid, appointmentdate, appointmenttime, hospitalid, status) values('$_POST[select4]','$_POST[select5]','$_POST[appointmentdate]','$_POST[time]','$_POST[select6]','$_POST[select]')";
   if($qsql = mysqli_query($con,$sql))
   {
    echo "<script>alert('Appointment record inserted successfully...');</script>";
    echo "<script>window.location='childreport.php?childid=$_POST[select4]';</script>";
}
else
{
    echo mysqli_error($con);
}
}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>

<style>
    .card {
        border-radius: 20px;
    }
</style>

<div class="container-fluid">
    <div class="block-header mt-3">
        <h2 class="text-center">Book Appointment</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2 class="text-center mt-4">Appointment Information </h2>

                </div>
                <form class="px-5" method="post" action="" name="frmappnt" onSubmit="return validateform()">
                    <input type="hidden" name="select2" value="Offline">
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <?php
                                        if(isset($_GET['chiid']))
                                        {
                                          $sqlchild= "SELECT * FROM child WHERE childid='$_GET[chiid]'";
                                          $qsqlchild = mysqli_query($con,$sqlchild);
                                          $rschild=mysqli_fetch_array($qsqlchild);
                                          echo $rschild['childname'] . " (Child ID - $rschild[childid])";
                                          echo "<input type='hidden' name='select4' value='$rschild[childid]'>";
                                      }
                                      else
                                      {
                                          ?>
                                          <label>Select Child Name:</label>
                                        <select name="select4" id="select4" class=" form-control show-tick">
                                            <option value="">Select Child</option>
                                            <?php
                                            $sqlchild= "SELECT * FROM child WHERE status='Active'";
                                            $qsqlchild = mysqli_query($con,$sqlchild);
                                            while($rschild=mysqli_fetch_array($qsqlchild))
                                            {
                                                if($rschild['childid'] == $rsedit['childid'])
                                                {
                                                 echo "<option value='$rschild[childid]' selected>$rschild[childid] - $rschild[childname]</option>";
                                             }
                                             else
                                             {
                                                 echo "<option value='$rschild[childid]'>$rschild[childid] - $rschild[childname]</option>";
                                             }

                                         }
                                         ?>
                                        </select>
                                        <?php
                                 }
                                 ?>

                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>Select Vaccine:</label>
                                        <select name="select5" id="select5" class=" form-control show-tick">
                                            <option value="">Select</option>
                                            <?php
                                    $sqlvaccine= "SELECT * FROM vaccine WHERE status='Active'";
                                    $qsqlvaccine = mysqli_query($con,$sqlvaccine);
                                    while($rsvaccine=mysqli_fetch_array($qsqlvaccine))
                                    {
                                       if($rsvaccine['vaccineid'] == $rsedit['vaccineid'])
                                       {
                                        echo "<option value='$rsvaccine[vaccineid]' selected>$rsvaccine[vaccinename]</option>";
                                    }
                                    else
                                    {
                                        echo "<option value='$rsvaccine[vaccineid]'>$rsvaccine[vaccinename]</option>";
                                    }

                                }
                                ?>
                                        </select>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>Select Appointment Date:</label>
                                        <input class="form-control" type="date" name="appointmentdate"
                                            id="appointmentdate" value="<?php echo $rsedit['appointmentdate']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>Select Appointment Time:</label>
                                        <input class="form-control" type="time" name="time" id="time"
                                            value="<?php echo $rsedit['appointmenttime']; ?>" />
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                    <label>Select Hospital:</label>
                                        <select name="select6" id="select6" class=" form-control show-tick">
                                            <option value="">Select Hospital</option>
                                            <?php
                                $sqlhospital= "SELECT * FROM hospital INNER JOIN vaccine ON vaccine.vaccineid=hospital.vaccineid WHERE hospital.status='Active'";
                                $qsqlhospital = mysqli_query($con,$sqlhospital);
                                while($rshospital = mysqli_fetch_array($qsqlhospital))
                                {
                                   if($rshospital['hospitalid'] == $rsedit['hospitalid'])
                                   {
                                    echo "<option value='$rshospital[hospitalid]' selected>$rshospital[hospitalname] ( $rshospital[vaccinename] ) </option>";
                                }
                                else
                                {
                                    echo "<option value='$rshospital[hospitalid]'>$rshospital[hospitalname] ( $rshospital[vaccinename] )</option>";				
                                }
                            }
                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>




                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-4 ">
                                <div class="form-group drop-custum">
                                    <label>Select Child Status:</label>
                                    <select name="select" id="select" class=" form-control show-tick">
                                        <option value="">Select Status</option>
                                        <?php
                                            $arr = array("Active","Inactive");
                                            foreach($arr as $val)
                                            {
                                               if($val == $rsedit['status'])
                                               {
                                                echo "<option value='$val' selected>$val</option>";
                                               }
                                               else
                                               {
                                                echo "<option value='$val'>$val</option>";			  
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-sm-12">

                                <input type="submit" class="btn btn-primary mb-5" name="submit" id="submit"
                                    value="Submit" />

                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
















<?php include 'adformfooter.php'; ?>
<script type="application/javascript">
function validateform() {
    if (document.frmappnt.select4.value == "") {
        alert("Child name should not be empty..");
        document.frmappnt.select4.focus();
        return false;
    } else if (document.frmappnt.select5.value == "") {
        alert("Vaccine name should not be empty..");
        document.frmappnt.select5.focus();
        return false;
    } else if (document.frmappnt.appointmentdate.value == "") {
        alert("Appointment date should not be empty..");
        document.frmappnt.appointmentdate.focus();
        return false;
    } else if (document.frmappnt.time.value == "") {
        alert("Appointment time should not be empty..");
        document.frmappnt.time.focus();
        return false;
    } else if (document.frmappnt.select6.value == "") {
        alert("Hospital name should not be empty..");
        document.frmappnt.select6.focus();
        return false;
    } else if (document.frmappnt.select.value == "") {
        alert("Kindly select the status..");
        document.frmappnt.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>