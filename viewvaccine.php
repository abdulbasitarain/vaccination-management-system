<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_GET['delid']))
{
	$sql ="DELETE FROM vaccine WHERE vaccineid='$_GET[delid]'";
	$qsql=mysqli_query($con,$sql);
	if(mysqli_affected_rows($con) == 1)
	{
		echo "<script>
    Swal.fire({
      title: 'Done!',
      text: 'vaccine deleted successfully',
      type: 'success',
      
    })</script>";
  }
}
?>


<div class="container-fluid">
  <div class="block-header">
    <h2 class="text-center">View Vaccine Record</h2>
    
  </div>
  <div class="card">
    
    <section class="container">
     <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
      <tbody>
        <tr>
          <td><strong>Name</strong></td>
          <td><strong>Vaccine Description</strong></td>          
          <td><strong>Status</strong></td>
          <td><strong>Action</strong></td>
        </tr>
        <?php
        $sql ="SELECT * FROM vaccine";
        $qsql = mysqli_query($con,$sql);
        while($rs = mysqli_fetch_array($qsql))
        {
          echo "<tr>
          <td>$rs[vaccinename]</td>
          <td> $rs[description]</td>
          
          <td>&nbsp;$rs[status]</td>";
          echo "<td>&nbsp;
            <a href='vaccine.php?editid=$rs[vaccineid]'class='btn btn-sm btn-primary'>Edit</a>  <a href='viewvaccine.php?delid=$rs[vaccineid]'class='btn btn-sm btn-danger mt-2'>Delete</a> </td>";
          echo "</tr>";
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