<?php
include("dbconnection.php");
if(!isset($_SESSION['childid']))
{
	echo "<script>window.location='childlogin.php';</script>";
}

$sqlchild = "SELECT * FROM child WHERE childid='$_SESSION[childid]' ";
$qsqlchild = mysqli_query($con,$sqlchild);
$rschild = mysqli_fetch_array($qsqlchild);

?>

<?php
if(!isset($_GET['childid']))
{
?>
<form method="post" action="" name="frmchidet" onSubmit="return validateform()">
      <table class="table table-bordered table-striped">
      <tbody>
            <tr>
                <td width="17%"><strong>Child Name </strong></td>
                <td width="41%"><?php echo $rschild['childname'];?></td>
                <td width="16%"><strong>Child ID</strong></td>
                <td width="26%"><?php echo $rschild['childid'];?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td><?php echo $rschild['address'];?></td>
                <td><strong>Gender</strong></td>
                <td><?php echo $rschild['gender'];?></td>
              </tr>
              <tr>
                <td><strong>Contact Number</strong></td>
                <td><?php echo $rschild['mobileno'];?></td>
                <td><strong>Date Of Birth </strong></td>
                <td><?php echo $rschild['dob'];?></td>
            </tr>
        </tbody>
  </table>       
    </form>

<?php
}
?>


<script type="application/javascript">
function validateform()
{
	if(document.frmchidet.childname.value == "")
	{
		alert("Child name should not be empty..");
		document.frmchidet.childname.focus();
		return false;
	}
	else if(document.frmchidet.childid.value == "")
	{
		alert("Child ID should not be empty..");
		document.frmchidet.childid.focus();
		return false;
	}
	else if(document.frmchidet.admissiondate.value == "")
	{
		alert("Admission date should not be empty..");
		document.frmchidet.admissiondate.focus();
		return false;
	}
	else if(document.frmchidet.admissiontime.value == "")
	{
		alert("Admission time should not be empty..");
		document.frmchidet.admissiontime.focus();
		return false;
	}
	else if(document.frmchidet.address.value == "")
	{
		alert("Address should not be empty..");
		document.frmchidet.address.focus();
		return false;
	}
	else if(document.frmchidet.select.value == "")
	{
		alert("Gender should not be empty..");
		document.frmchidet.select.focus();
		return false;
	}
	else if(document.frmchidet.mobilenumber.value == "")
	{
		alert("Contact number should not be empty..");
		document.frmchidet.mobilenumber.focus();
		return false;
	}
	else if(document.frmchidet.dateofbirth.value == "")
	{
		alert("Date Of Birth should not be empty..");
		document.frmchidet.dateofbirth.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>