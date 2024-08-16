<?php
include("dbconnection.php");
if(isset($_POST['submitapp']))
{
	$sql ="INSERT INTO appointment(appointmenttype,vaccineid,appointmentdate,appointmenttime,hospitalid) values('$_POST[select]','$_POST[select3]','$_POST[date]','$_POST[time]','$_POST[select5]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('appointment record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}

if(isset($_GET['editid']))
{
	$sql="SELECT * FROM appointment WHERE appointmentid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}

	$sqlappointment1 = "SELECT max(appointmentid) FROM appointment where childid='$_GET[childid]' AND (status='Active' OR status='Approved')";
	$qsqlappointment1 = mysqli_query($con,$sqlappointment1);
	$rsappointment1=mysqli_fetch_array($qsqlappointment1);
	
	$sqlappointment = "SELECT * FROM appointment where appointmentid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	$rsappointment=mysqli_fetch_array($qsqlappointment);
	
if(mysqli_num_rows($qsqlappointment) == 0)
{
	echo "<center><h2>No Appointment records found..</h2></center>";
}
else
{
	$sqlappointment = "SELECT * FROM appointment where appointmentid='$rsappointment1[0]'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	$rsappointment=mysqli_fetch_array($qsqlappointment);
	
	$sqlvaccine = "SELECT * FROM vaccine where vaccineid='$rsappointment[vaccineid]'";
	$qsqlvaccine = mysqli_query($con,$sqlvaccine);
	$rsvaccine =mysqli_fetch_array($qsqlvaccine);
	
	$sqlhospital = "SELECT * FROM hospital where hospitalid='$rsappointment[hospitalid]'";
	$qsqlhospital = mysqli_query($con,$sqlhospital);
	$rshospital =mysqli_fetch_array($qsqlhospital);
?>
<table class="table table-bordered table-striped">
  
  
  <tr>
    <td>Vaccine</td>
    <td>&nbsp;<?php echo $rsvaccine['vaccinename']; ?></td>
  </tr>
  <tr>
    <td>Hospital</td>
    <td>&nbsp;<?php echo $rshospital['hospitalname']; ?></td>
  </tr>
  <tr>
    <td>Appointment Date</td>
    <td>&nbsp;<?php echo date("d-M-Y",strtotime($rsappointment['appointmentdate'])); ?></td>
  </tr>
  <tr>
    <td>Appointment Time</td>
    <td>&nbsp;<?php echo date("h:i A",strtotime($rsappointment['appointmenttime'])); ?></td>
  </tr>
</table>
<?php
}
?>
<script type="application/javascript">
function validateform()
{
	
	if(document.frmappntdetail.select.value == "")
	{
		alert("Appointment type should not be empty..");
		document.frmappntdetail.select.focus();
		return false;
	}
	else if(document.frmappntdetail.select3.value == "")
	{
		alert("Vaccine name should not be empty..");
		document.frmappntdetail.select3.focus();
		return false;
	}
	else if(document.frmappntdetail.date.value == "")
	{
		alert("Appointment date should not be empty..");
		document.frmappntdetail.date.focus();
		return false;
	}
	else if(document.frmappntdetail.time.value == "")
	{
		alert("Appointment time should not be empty..");
		document.frmappntdetail.time.focus();
		return false;
	}
	else if(document.frmappntdetail.select5.value == "")
	{
		alert("Hospital name should not be empty..");
		document.frmappntdetail.select5.focus();
		return false;
	}
	else
	{
		return true;
	}
}
</script>