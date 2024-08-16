<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
			$sql ="UPDATE vaccine SET vaccinename='$_POST[vaccinename]',description='$_POST[textarea]',status='$_POST[select]' WHERE vaccineid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Vaccine record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
	$sql ="INSERT INTO vaccine(vaccinename,description,status) values('$_POST[vaccinename]','$_POST[textarea]','$_POST[select]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Vaccine record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM vaccine WHERE vaccineid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
	<div class="block-header">
            <h2 class="text-center">Add New Vaccine </h2>
            
        </div>
  <div class="card">

    <form method="post" action="" name="frmvacc" onSubmit="return validateform()">
    <table class="table table-hover">
      <tbody>
        <tr>
          <td width="34%">Vaccine Name</td>
          <td width="66%"><input placeholder=" Enter Here " class="form-control" type="text" name="vaccinename" id="vaccinename" value="<?php echo $rsedit['vaccinename']; ?>" /></td>
        </tr>
        <tr>
          <td>Description</td>
          <td><textarea placeholder=" Enter Here " class="form-control no-resize" name="textarea" id="textarea" cols="45" rows="5"><?php echo $rsedit['description'] ; ?></textarea></td>
        </tr>
        <tr>
          <td>Status</td>
          <td> <select name="select" id="select" class="form-control show-tick">
            <option value="">Select</option>
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
            </select></td>
        </tr>
        <tr>
          <td colspan="2" align="center"><input class="btn btn-primary" type="submit" name="submit" id="submit" value="Submit" /></td>
        </tr>
      </tbody>
    </table>
    </form>
    <p>&nbsp;</p>
  </div>
</div>
</div>
 <div class="clear"></div>
  </div>
</div>
<?php
include("adformfooter.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmvacc.vaccinename.value == "")
	{
		alert("Vaccine name should not be empty..");
		document.frmvacc.vaccinename.focus();
		return false;
	}
	else if(!document.frmvacc.vaccinename.value.match(alphaspaceExp))
	{
		alert("Vaccine name not valid..");
		document.frmvacc.vaccinename.focus();
		return false;
	}
	else if(document.frmvacc.select.value == "" )
	{
		alert("Kindly select the status..");
		document.frmvacc.select.focus();
		return false;
	}
	
	else
	{
		return true;
	}
}
</script>