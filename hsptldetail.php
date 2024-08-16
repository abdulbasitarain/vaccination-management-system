<?php

include("hospitalheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
	if(isset($_SESSION['hospitalid']))
	{
		$sql ="UPDATE hospital SET hospitalname='$_POST[hospitalname]',mobileno='$_POST[mobilenumber]',vaccineid='$_POST[select3]',loginid='$_POST[loginid]',address='$_POST[address]' WHERE hospitalid='$_SESSION[hospitalid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Hospital profile updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO hospital(hospitalname,mobileno,vaccineid,loginid,password,status,address) values('$_POST[hospitalname]','$_POST[mobilenumber]','$_POST[select3]','$_POST[loginid]','$_POST[password]','$_POST[select]','$_POST[address]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('Hospital record inserted successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_SESSION['hospitalid']))
{
	$sql="SELECT * FROM hospital WHERE hospitalid='$_SESSION[hospitalid]' ";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>
<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center"> Hospital's Profile</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <form method="post" action="" name="frmhospprfl" onSubmit="return validateform()" style="padding: 10px">
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Hospital Name</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="hospitalname" id="hospitalname"
                                        value="<?php echo $rsedit['hospitalname']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Mobile Number</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="mobilenumber" id="mobilenumber"
                                        value="<?php echo $rsedit['mobileno']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Vaccine</label>
                                <div class="form-line">
                                    <select name="select3" id="select3" class="form-control show-tick">
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
                    <div class="row">
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Login ID</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="loginid" id="loginid"
                                        value="<?php echo $rsedit['loginid']; ?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                            <div class="form-group">
                                <label>Address</label>
                                <div class="form-line">
                                    <input class="form-control" type="text" name="address" id="address"
                                        value="<?php echo $rsedit['address']; ?>" />
                                </div>
                            </div>
                        </div>
                            <input class="btn btn-primary m-3" type="submit" name="submit" id="submit" value="Submit" />
                    </div>

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

function validateform() {
    if (document.frmhospprfl.hospitalname.value == "") {
        alert("Hospital name should not be empty..");
        document.frmhospprfl.hospitalname.focus();
        return false;
    } else if (!document.frmhospprfl.hospitalname.value.match(alphaspaceExp)) {
        alert("Hospital name not valid..");
        document.frmhospprfl.hospitalname.focus();
        return false;
    } else if (document.frmhospprfl.mobilenumber.value == "") {
        alert("Mobile number should not be empty..");
        document.frmhospprfl.mobilenumber.focus();
        return false;
    } else if (!document.frmhospprfl.mobilenumber.value.match(numericExpression)) {
        alert("Mobile number not valid..");
        document.frmhospprfl.mobilenumber.focus();
        return false;
    } else if (document.frmhospprfl.select3.value == "") {
        alert("Vaccine ID should not be empty..");
        document.frmhospprfl.select3.focus();
        return false;
    } else if (document.frmhospprfl.loginid.value == "") {
        alert("Login ID should not be empty..");
        document.frmhospprfl.loginid.focus();
        return false;
    } else if (!document.frmhospprfl.loginid.value.match(alphanumericExp)) {
        alert("loginid not valid..");
        document.frmhospprfl.loginid.focus();
        return false;
    } else if (document.frmhospprfl.password.value == "") {
        alert("Password should not be empty..");
        document.frmhospprfl.password.focus();
        return false;
    } else if (document.frmhospprfl.password.value.length < 8) {
        alert("Password length should be more than 8 characters...");
        document.frmhospprfl.password.focus();
        return false;
    } else if (document.frmhospprfl.password.value != document.frmhospprfl.cnfirmpassword.value) {
        alert("Password and confirm password should be equal..");
        document.frmhospprfl.password.focus();
        return false;
    } else if (document.frmhospprfl.address.value == "") {
        alert("Address should not be empty..");
        document.frmhospprfl.address.focus();
        return false;
    } else if (!document.frmhospprfl.address.value.match(alphaExp)) {
        alert("Address not valid..");
        document.frmhospprfl.address.focus();
        return false;
    } else if (document.frmhospprfl.select.value == "") {
        alert("Kindly select the status..");
        document.frmhospprfl.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>