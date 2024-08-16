<?php
include("dbconnection.php");
if(isset($_POST['submitchi']))
{
	$sql ="INSERT INTO child(childname,admissiondate,admissiontime,address,mobileno,gender,dob) values('$_POST[childname]','$_POST[admissiondate]','$_POST[admissiontime]','$_POST[address]','$_POST[mobilenumber]','$_POST[select]','$_POST[dateofbirth]')";
	if($qsql = mysqli_query($con,$sql))
	{
		echo "<script>alert('Childs record inserted successfully...');</script>";
	}
	else
	{
		echo mysqli_error($con);
	}
}

if(isset($_GET['editid']))
{
	$sql="SELECT * FROM child WHERE childid='$_GET[editid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>
<?php
if(!isset($_GET['childid']))
{
?>
<div class="container-fluid">
        <div class="block-header">
            <h2>Book Appointment</h2>
            
        </div>
        <div class="row clearfix">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="card">
					
					<div class="body">
                        <div class="row clearfix">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="childname" id="childname"/>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="childid" id="childid" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea name="address" id="address" cols="45" rows="5"> </textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group drop-custum">
                                    <select class="form-control show-tick">
                                        <option value="">-- Gender --</option>
                                        <option value="10">Male</option>
                                        <option value="20">Female</option>
                                    </select>
                                </div>
                            </div>
                         
                            <div class="col-sm-3 col-xs-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="mobilenumber" id="mobilenumber"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="date" name="dateofbirth" id="dateofbirth" />
                                    </div>
                                </div>
                            </div>
                    
                            <div class="col-sm-12">
                                <input type="submit" class="btn btn-raised" name="submitchi" id="submitchi" value="Submit" />
                                
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </div>
<form method="post" action="" name="frmchidet" onSubmit="return validateform()">
      <table class="table table-bordered table-striped">
      <tbody>
     <tr>
                <td width="17%"><strong>Child Name </strong></td>
                <td width="41%"><input type="text" name="childname" id="childname"/></td>
                <td width="16%"><strong>Child ID</strong></td>
                <td width="26%"><input type="text" name="childid" id="childid" /></td>
        </tr>
              <tr>
                <td><strong>Address</strong></td>
                <td align="right"><textarea name="address" id="address" cols="45" rows="5"> </textarea></td>
                <td><strong>Gender</strong></td>
                <td><label for="select"></label>
                  <select name="select" id="select">
                    <option value="">Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select></td>
              </tr>
              <tr>
                <td><strong>Contact Number</strong></td>
                <td><input type="text" name="mobilenumber" id="mobilenumber"/></td>
                <td><strong>Date Of Birth </strong></td>
                <td><input type="date" name="dateofbirth" id="dateofbirth" /></td>
              </tr>
              <tr>
                <td colspan="4" align="center"><input type="submit" name="submitchi" id="submitchi" value="Submit" /></td>
              </tr>
        </tbody>
  </table>       
    </form>
<?php
}
else
{
$sqlchild = "SELECT * FROM child where childid='$_GET[childid]'";
$qsqlchild = mysqli_query($con,$sqlchild);
$rschild=mysqli_fetch_array($qsqlchild);
?>

    <table class="table table-bordered table-striped">
      <tbody>
        <tr>
          <td width="16%"><strong>Child Name </strong></td>
          <td width="34%">&nbsp;<?php echo $rschild['childname']; ?></td>
          <td width="16%"><strong>Child ID</strong></td>
          <td width="34%">&nbsp;<?php echo $rschild['childid']; ?></td>
        </tr>
        <tr>
          <td><strong>Address</strong></td>
          <td>&nbsp;<?php echo $rschild['address']; ?></td>
          <td><strong>Gender</strong></td>
          <td> <?php echo $rschild['gender'];?></td>
        </tr>
        <tr>
          <td><strong>Contact Number</strong></td>
          <td>&nbsp;<?php echo $rschild['mobileno']; ?></td>
          <td><strong>Date Of Birth </strong></td>
          <td>&nbsp;<?php echo $rschild['dob']; ?></td>
        </tr>
      </tbody>
    </table>
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