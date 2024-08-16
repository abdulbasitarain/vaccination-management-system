<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM hospital WHERE hospitalid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>alert('hospital record deleted successfully..');</script>";
	}
}
?>
<div class="container-fluid">
	<div class="block-header">
		<h2 class="text-center">View Available Hospital</h2>

	</div>

<div class="card">

	<section class="container">
		<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			<thead>
				<tr>
					<td>Name</td>
					<td>Contact</td>
					<td>Vaccine</td>
					<td>LoginID</td>
					<td>Address</td>
					<td>Status</td>
					<td>Action</td>
				</tr>
			</thead>
			<tbody>
				
				<?php
				$sql ="SELECT * FROM hospital";
				$qsql = mysqli_query($con,$sql);
				while($rs = mysqli_fetch_array($qsql))
				{

					$sqlvacc = "SELECT * FROM vaccine WHERE vaccineid='$rs[vaccineid]'";
					$qsqlvacc = mysqli_query($con,$sqlvacc);
					$rsvacc = mysqli_fetch_array($qsqlvacc);
					echo "<tr>
					<td>&nbsp;$rs[hospitalname]</td>
					<td>&nbsp;$rs[mobileno]</td>
					<td>&nbsp;$rsvacc[vaccinename]</td>
					<td>&nbsp;$rs[loginid]</td>
					<td>&nbsp;$rs[address]</td>
					<td>$rs[status]</td>
					<td>&nbsp;
					<a href='hospital.php?editid=$rs[hospitalid]' class='btn btn-sm btn-primary'>Edit</a> <a href='viewhospital.php?delid=$rs[hospitalid]' class='btn btn-sm btn-danger mt-2'>Delete</a> </td>
					</tr>";
				}
				?>      </tbody>
			</table>
		</section>
	</div>
</div>
	<?php
	include("adformfooter.php");
	?>