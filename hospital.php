<?php
include("adminheader.php");
include("dbconnection.php");
if (isset($_POST['submit'])) {
	if (isset($_GET['editid'])) {
	$sql = "UPDATE hospital SET hospitalname='$_POST[hospitalname]',mobileno='$_POST[mobilenumber]',vaccineid='$_POST[select3]'
	,loginid='$_POST[loginid]',password='$_POST[password]',status='$_POST[select]',address='$_POST[address]' WHERE hospitalid='$_GET[editid]'";
	if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('hospital record updated successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	} else {
		$sql = "INSERT INTO hospital(hospitalname,mobileno,vaccineid,loginid,password,status,address) values('$_POST[hospitalname]','$_POST[mobilenumber]','$_POST[select3]','$_POST[loginid]','$_POST[password]','Active','$_POST[address]')";
		if ($qsql = mysqli_query($con, $sql)) {
			echo "<script>alert('Hospital record inserted successfully...');</script>";
		} else {
			echo mysqli_error($con);
		}
	}
	}
if (isset($_GET['editid'])) {
	$sql = "SELECT * FROM hospital WHERE hospitalid='$_GET[editid]' ";
	$qsql = mysqli_query($con, $sql);
	$rsedit = mysqli_fetch_array($qsql);

}
?>

<div class="container-sm">
	<div class="block-header">
		<h2 class="text-center"> Add New Hospital </h2>
	</div>
	<div class="row clearfix">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="card">


				<form method="post" action="" name="frmdoct" onSubmit="return validateform()"
					style="padding: 10px">



					<div class="form-group"><label>Hospital Name</label>
						<div class="form-line">
							<input class="form-control" type="text" name="hospitalname" id="hospitalname" />
						</div>
					</div>


					<div class="form-group"><label>Mobile Number</label>
						<div class="form-line">
							<input class="form-control" type="text" name="mobilenumber" id="mobilenumber"  ?> 
						</div>
					</div>


					<div class="form-group"><label>Vaccine</label>
						<div class="form-line">
							<select name="select3" id="select3" class="form-control show-tick">
								<option value="">Select</option>
								<?php
								$sqlvaccine = "SELECT * FROM vaccine WHERE status='Active'";
								$qsqlvaccine = mysqli_query($con, $sqlvaccine);
								while ($rsvaccine = mysqli_fetch_array($qsqlvaccine)) {
									if ($rsvaccine['vaccineid'] == $rsedit['vaccineid']) {
										echo "<option value='$rsvaccine[vaccineid]' selected>$rsvaccine[vaccinename]</option>";
									} else {
										echo "<option value='$rsvaccine[vaccineid]'>$rsvaccine[vaccinename]</option>";
									}

								}
								?>
							</select>
						</div>
					</div>

					<div class="form-group"><label>Login ID</label>
						<div class="form-line">
							<input class="form-control" type="text" name="loginid" id="loginid"  ?> 
						</div>
					</div>


					<div class="form-group"><label>Password</label>
						<div class="form-line">
							<input class="form-control" type="password" name="password" id="password"  ?>
						</div>
					</div>


					<div class="form-group"><label>Confirm Password</label>
						<div class="form-line">
							<input class="form-control" type="password" name="cnfirmpassword" id="cnfirmpassword"
								>
						</div>
					</div>


					<div class="form-group"><label>Address</label>
						<div class="form-line">
							<input class="form-control" type="text" name="address" id="address"> 
						</div>
					</div>

					<div class="form-group">
						<label>Status</label>
						<div class="form-line">
							<select class="form-control show-tick" name="select" id="select">
								<option value="" selected="" hidden>Select</option>
								<?php
								$arr = array("Active", "Inactive");
								foreach ($arr as $val) {
									if ($val == $rsedit['status']) {
										echo "<option value='$val' selected>$val</option>";
									} else {
										echo "<option value='$val'>$val</option>";
									}
								}
								?>
							</select>
						</div>
					</div>



					<input  class="btn btn-default btn-primary" type="submit" name="submit" id="submit"
						value="submit" />



				</form>
			</div>
		</div>
	</div>
</div>
<?php
include("adformfooter.php");
?>
<script type="application/javascript">
	var addressExp = /^[a-zA-Z0-9\s\.,#-]+$/;
	var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
	var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
	var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
	var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
	var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

	function validateform() {
		if (document.frmdoct.hospitalname.value == "") {
			alert("Hospital name should not be empty..");
			document.frmdoct.hospitalname.focus();
			return false;
		}
		else if (!document.frmdoct.hospitalname.value.match(alphaspaceExp)) {
			alert("Hospital name not valid..");
			document.frmdoct.hospitalname.focus();
			return false;
		}
		else if (document.frmdoct.mobilenumber.value == "") {
			alert("Mobile number should not be empty..");
			document.frmdoct.mobilenumber.focus();
			return false;
		}
		else if (!document.frmdoct.mobilenumber.value.match(numericExpression)) {
			alert("Mobile number not valid..");
			document.frmdoct.mobilenumber.focus();
			return false;
		}
		else if (document.frmdoct.select3.value == "") {
			alert("Vaccine ID should not be empty..");
			document.frmdoct.select3.focus();
			return false;
		}
		else if (document.frmdoct.loginid.value == "") {
			alert("loginid should not be empty..");
			document.frmdoct.loginid.focus();
			return false;
		}
		else if (!document.frmdoct.loginid.value.match(alphanumericExp)) {
			alert("loginid not valid..");
			document.frmdoct.loginid.focus();
			return false;
		}
		else if (document.frmdoct.password.value == "") {
			alert("Password should not be empty..");
			document.frmdoct.password.focus();
			return false;
		}
		else if (document.frmdoct.password.value.length < 8) {
			alert("Password length should be more than 8 characters...");
			document.frmdoct.password.focus();
			return false;
		}
		else if (document.frmdoct.password.value != document.frmdoct.cnfirmpassword.value) {
			alert("Password and confirm password should be equal..");
			document.frmdoct.password.focus();
			return false;
		}
		function validateform() {
    // ...
    else if (document.frmdoct.address.value == "") {
        alert("Address should not be empty..");
        document.frmdoct.address.focus();
        return false;
    }
    else if (!document.frmdoct.address.value.match(addressExp)) {
        alert("Invalid address. Please enter a valid address.");
        document.frmdoct.address.focus();
        return false;
    }
    // ...
}

		// else if (document.frmdoct.address.value == "") {
		// 	alert("Address should not be empty..");
		// 	document.frmdoct.address.focus();
		// 	return false;
		// }
		// else if (!document.frmdoct.address.value.match(alphaExp)) {
		// 	alert("Address not valid..");
		// 	document.frmdoct.address.focus();
		// 	return false;
		// }
		else if (document.frmdoct.select.value == "") {
			alert("Kindly select the status..");
			document.frmdoct.select.focus();
			return false;
		}
		else {
			return true;
		}
	}
</script>