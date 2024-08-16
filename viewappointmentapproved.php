<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM appointment WHERE appointmentid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('appointment record deleted successfully..');</script>";
	}
}
if(isset($_GET['approveid']))
{
	$sql ="UPDATE appointment SET status='Approved' WHERE appointmentid='$_GET[approveid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('Appointment record Approved successfully..');</script>";
	}
}
?>
<div class="container-fluid">
<div class="block-header">
        <h2 class="text-center">View Appointments - Approved</h2>
    </div>

<div class="card">
	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">

			<thead>
				<tr>

					<td>Child Detail</td>
					<td>Date & Time</td>
					<td>Vaccine</td>
					<td>Hospital</td>
					<td>Status</td>
					<td><div align="center">Action</div></td>
				</tr>
			</thead>
			<tbody>
				<?php
				$sql ="SELECT * FROM appointment WHERE (status='Approved' OR status='Active')";
				if(isset($_SESSION['childid']))
				{
					$sql  = $sql . " AND childid='$_SESSION[childid]'";
				}
				if(isset($_SESSION['hospitalid']))
				{
					$sql  = $sql . " AND hospitalid='$_SESSION[hospitalid]'";			
				}
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{
					$sqlchi = "SELECT * FROM child WHERE childid='$rs[childid]'";
					$qsqlchi = mysqli_query($con,$sqlchi);
					$rschi = mysqli_fetch_array($qsqlchi);


					$sqlvacc = "SELECT * FROM vaccine WHERE vaccineid='$rs[vaccineid]'";
					$qsqlvacc = mysqli_query($con,$sqlvacc);
					$rsvacc = mysqli_fetch_array($qsqlvacc);

					$sqlhos= "SELECT * FROM hospital WHERE hospitalid='$rs[hospitalid]'";
					$qsqlhos = mysqli_query($con,$sqlhos);
					$rshos = mysqli_fetch_array($qsqlhos);
					echo "<tr>

					<td>&nbsp;$rschi[childname]<br>&nbsp;$rschi[mobileno]</td>		 
					<td>&nbsp;$rs[appointmentdate]&nbsp;$rs[appointmenttime]</td> 
					<td>&nbsp;$rsvacc[vaccinename]</td>
					<td>&nbsp;$rshos[hospitalname]</td>
					<td>&nbsp;$rs[status]</td>
					<td><div align='center'>";
					if($rs['status'] != "Approved")
					{
						if(!(isset($_SESSION['childid'])))
						{
							echo "<a href='appointmentapproval.php?editid=$rs[appointmentid]' class='btn btn-raised g-bg-cyan>Approve</a><hr>";
						}
						echo "  <a href='viewappointment.php?delid=$rs[appointmentid]' class='btn btn-raised g-bg-blush2'>Delete</a>";
					}
					else
					{
						echo "<a href='childreport.php?childid=$rs[childid]&appointmentid=$rs[appointmentid]' class='btn btn-primary'>View Report</a>";
					}
					echo "</center></td></tr>";
				}
				?>
			</tbody>
		</table>
	</section>

</div>
</div> 
<?php
include("adformfooter.php");
?>