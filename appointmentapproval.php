<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
		if(isset($_GET['editid']))
		{
				$sql ="UPDATE child SET status='Active' WHERE childid='$_GET[childid]'";
				$qsql=mysqli_query($con,$sql);
			$roomid=0;
			$sql ="UPDATE appointment SET appointmenttype='$_POST[apptype]',vaccineid='$_POST[select5]',hospitalid='$_POST[select6]',status='Approved',appointmentdate='$_POST[appointmentdate]',appointmenttime='$_POST[time]' WHERE appointmentid='$_GET[editid]'";
			if($qsql = mysqli_query($con,$sql))
			{		
				echo "<script>alert('appointment record updated successfully...');</script>";				
				echo "<script>window.location='childreport.php?childid=$_GET[childid]&appointmentid=$_GET[editid]';</script>";
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
				
			$sql ="INSERT INTO appointment(appointmenttype,childid,vaccineid,appointmentdate,appointmenttime,hospitalid,status) values('$_POST[select2]','$_POST[select4]','$_POST[select3]','$_POST[select5]','$_POST[appointmentdate]','$_POST[time]','$_POST[select6]','$_POST[select]')";
			if($qsql = mysqli_query($con,$sql))
			{
				echo "<script>alert('Appointment record inserted successfully...');</script>";
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


<div class="card ">
 
    <div class="block-header">
	<h2 class="text-center">Appointment Approval Process</h2>
	</div>
   <form method="post" action="" name="frmappnt" onSubmit="return validateform()">
  
    <table class="table table-striped">                
        <tr>
          <td >Child</td>
          <td >
            <?php
			if(isset($_GET['childid']))
			{
				$sqlchild= "SELECT * FROM child WHERE childid='$_GET[childid]'";
				$qsqlchild = mysqli_query($con,$sqlchild);
				$rschild=mysqli_fetch_array($qsqlchild);
				echo $rschild['childname'] . " (Child ID - $rschild[childid])";
			}
			else
			{
				$sqlchild= "SELECT * FROM child WHERE status='Active'";
				$qsqlchild = mysqli_query($con,$sqlchild);
				while($rschild=mysqli_fetch_array($qsqlchild))
				{
					if($rschild['childid'] == $rsedit['childid'])
					{
					echo "<option value='$rschild[childid]' selected> $rschild[childname](Child ID - $rschild[childid])</option>";
					}
				}
			}
		  ?>
      </td>
        </tr>

        <tr>
          <td>Vaccine</td>
          <td><select name="select5" id="select5" class="form-control show-tick">
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
          </select></td>
        </tr>
		
        <tr>
          <td>Hospital</td>
          <td><select name="select6" id="select6" class="form-control show-tick">
            <option value="">Select</option>
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
          </select></td>
        </tr>
		
        <tr>
          <td>Appointment Date</td>
          <td><input class="form-control" type="date" name="appointmentdate" id="appointmentdate" value="<?php echo $rsedit['appointmentdate']; ?>" /></td>
        </tr>
        <tr>
          <td>Appointment Time</td>
          <td><input class="form-control" type="time" name="time" id="time" value="<?php echo $rsedit['appointmenttime']; ?>" /></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<?php
include("adformfooter.php");
?>
<script type="application/javascript">
function validateform()
{
	if(document.frmappnt.select4.value == "")
	{
		alert("Child name should not be empty..");
		document.frmappnt.select4.focus();
		return false;
	}
	else if(document.frmappnt.select3.value == "")
	{
		alert("Room type should not be empty..");
		document.frmappnt.select3.focus();
		return false;
	}
	else if(document.frmappnt.select5.value == "")
	{
		alert("Vaccine name should not be empty..");
		document.frmappnt.select5.focus();
		return false;
	}
	else if(document.frmappnt.appointmentdate.value == "")
	{
		alert("Appointment date should not be empty..");
		document.frmappnt.appointmentdate.focus();
		return false;
	}
	else if(document.frmappnt.time.value == "")
	{
		alert("Appointment time should not be empty..");
		document.frmappnt.time.focus();
		return false;
	}
	else if(document.frmappnt.select6.value == "")
	{
		alert("Hospital name should not be empty..");
		document.frmappnt.select6.focus();
		return false;
	}
	else if(document.frmappnt.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmappnt.select.focus();
		return false;
	}
	else
	{
		return true;
	}
}

</script>