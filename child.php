<?php
include("adminheader.php");
include("dbconnection.php");
if(isset($_POST['submit']))
{
	if(isset($_GET['editid']))
	{
		$sql ="UPDATE child SET childname='$_POST[childname]',admissiondate='$_POST[admissiondate]',admissiontime='$_POST[admissiontme]',address='$_POST[address]',mobileno='$_POST[mobilenumber]',city='$_POST[city]',pincode='$_POST[pincode]',loginid='$_POST[loginid]',password='$_POST[password]',bloodgroup='$_POST[select2]',gender='$_POST[select3]',dob='$_POST[dateofbirth]',status='$_POST[select]' WHERE childid='$_GET[editid]'";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('child record updated successfully...');</script>";
		}
		else
		{
			echo mysqli_error($con);
		}	
	}
	else
	{
		$sql ="INSERT INTO child(childname,admissiondate,admissiontime,address,mobileno,city,pincode,loginid,password,bloodgroup,gender,dob,status) values('$_POST[childname]','$dt','$tim','$_POST[address]','$_POST[mobilenumber]','$_POST[city]','$_POST[pincode]','$_POST[loginid]','$_POST[password]','$_POST[select2]','$_POST[select3]','$_POST[dateofbirth]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
			echo "<script>alert('childs record inserted successfully...');</script>";
			$insid= mysqli_insert_id($con);
			if(isset($_SESSION['adminid']))
			{
				echo "<script>window.location='appointment.php?chiid=$insid';</script>";	
			}
			else
			{
				echo "<script>window.location='childlogin.php';</script>";	
			}		
		}
		else
		{
			echo mysqli_error($con);
		}
	}
}
if(isset($_GET['editid']))
{
	$sql="SELECT * FROM child WHERE childid='$_GET[editid]'";
	$qsql = mysqli_query($con,$sql);
	$rsedit = mysqli_fetch_array($qsql);
	
}
?>


<div class="container-fluid">
    <div class="block-header">
        <h2 class="text-center">Child Registration Panel</h2>

    </div>
    <div class="card">

        <form method="post" action="" name="frmchild" onSubmit="return validateform()" style="padding: 10px">



            <div class="form-group"><label>Child Name</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="childname" id="childname"
                        value="" />
                </div>
            </div>

            <?php
			if(isset($_GET['editid']))
			{
				?>

            <div class="form-group"><label>Admission Date</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="admissiondate" id="admissiondate"
                        value="" readonly />
                </div>
            </div>


            <div class="form-group"><label>Admission Time</label>
                <div class="form-line">
                    <input class="form-control" type="time" name="admissiontme" id="admissiontme"
                        value="" readonly />
                </div>
            </div>

            <?php
			}
			?>
            <div class="form-group">
                <label>Address</label>
                <div class="form-line">
                    <input class="form-control " name="address" id="tinymce" value="">
                </div>
            </div>

            <div class="form-group"><label>Mobile Number</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="mobilenumber" id="mobilenumber"
                        value="" />
                </div>
            </div>


            <div class="form-group"><label>City</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="city" id="city"
                        value="" />
                </div>
            </div>


            <div class="form-group"><label>PIN Code</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="pincode" id="pincode"
                        value="" />
                </div>
            </div>


            <div class="form-group"><label>Login ID</label>
                <div class="form-line">
                    <input class="form-control" type="text" name="loginid" id="loginid"
                        value="" />
                </div>
            </div>


            <div class="form-group"><label>Password</label>
                <div class="form-line">
                    <input class="form-control" type="password" name="password" id="password"
                        value="" />
                </div>
            </div>


            <div class="form-group"><label>Confirm Password</label>
                <div class="form-line">
                    <input class="form-control" type="password" name="confirmpassword" id="confirmpassword"
                        value="" />
                </div>
            </div>


            <div class="form-group"><label>Blood Group</label>
                <div class="form-line"><select class="form-control show-tick" name="select2" id="select2">
                        <option value="">Select</option>
                        <?php
					$arr = array("A+","A-","B+","B-","O+","O-","AB+","AB-");
					foreach($arr as $val)
					{
						if($val == $rsedit['bloodgroup'])
						{
							echo "<option value='$val' selected>$val</option>";
						}
						else
						{
							echo "<option value='$val'>$val</option>";			  
						}
					}
					?>
                    </select>
                </div>
            </div>


            <div class="form-group"><label>Gender</label>
                <div class="form-line"><select class="form-control show-tick" name="select3" id="select3">
                        <option value="">Select</option>
                        <?php
				$arr = array("MALE","FEMALE");
				foreach($arr as $val)
				{
					if($val == $rsedit['gender'])
					{
						echo "<option value='$val' selected>$val</option>";
					}
					else
					{
						echo "<option value='$val'>$val</option>";			  
					}
				}
				?>
                    </select>
                </div>
            </div>


            <div class="form-group"><label>Date Of Birth</label>
                <div class="form-line">
                    <input class="form-control" type="date" name="dateofbirth" max="<?php echo date("d-m-Y"); ?>"
                        id="dateofbirth" value="<?php echo $rsedit['dob']; ?>" />
                </div>
            </div>





            <input class="btn btn-default btn-primary" type="submit" name="submit" id="submit" value="Submit" />




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
    if (document.frmchild.childname.value == "") {
        alert("child name should not be empty..");
        document.frmchild.childname.focus();
        return false;
    } else if (!document.frmchild.childname.value.match(alphaspaceExp)) {
        alert("child name not valid..");
        document.frmchild.childname.focus();
        return false;
    } else if (document.frmchild.admissiondate.value == "") {
        alert("Admission date should not be empty..");
        document.frmchild.admissiondate.focus();
        return false;
    } else if (document.frmchild.admissiontme.value == "") {
        alert("Admission time should not be empty..");
        document.frmchild.admissiontme.focus();
        return false;
    } else if (document.frmchild.address.value == "") {
        alert("Address should not be empty..");
        document.frmchild.address.focus();
        return false;
    } else if (document.frmchild.mobilenumber.value == "") {
        alert("Mobile number should not be empty..");
        document.frmchild.mobilenumber.focus();
        return false;
    } else if (!document.frmchild.mobilenumber.value.match(numericExpression)) {
        alert("Mobile number not valid..");
        document.frmchild.mobilenumber.focus();
        return false;
    } else if (document.frmchild.city.value == "") {
        alert("City should not be empty..");
        document.frmchild.city.focus();
        return false;
    } else if (!document.frmchild.city.value.match(alphaspaceExp)) {
        alert("City not valid..");
        document.frmchild.city.focus();
        return false;
    } else if (document.frmchild.pincode.value == "") {
        alert("Pincode should not be empty..");
        document.frmchild.pincode.focus();
        return false;
    } else if (!document.frmchild.pincode.value.match(numericExpression)) {
        alert("Pincode not valid..");
        document.frmchild.pincode.focus();
        return false;
    } else if (document.frmchild.loginid.value == "") {
        alert("Login ID should not be empty..");
        document.frmchild.loginid.focus();
        return false;
    } else if (!document.frmchild.loginid.value.match(alphanumericExp)) {
        alert("Login ID not valid..");
        document.frmchild.loginid.focus();
        return false;
    } else if (document.frmchild.password.value == "") {
        alert("Password should not be empty..");
        document.frmchild.password.focus();
        return false;
    } else if (document.frmchild.password.value.length < 8) {
        alert("Password length should be more than 8 characters...");
        document.frmchild.password.focus();
        return false;
    } else if (document.frmchild.password.value != document.frmchild.confirmpassword.value) {
        alert("Password and confirm password should be equal..");
        document.frmchild.confirmpassword.focus();
        return false;
    } else if (document.frmchild.select2.value == "") {
        alert("Blood Group should not be empty..");
        document.frmchild.select2.focus();
        return false;
    } else if (document.frmchild.select3.value == "") {
        alert("Gender should not be empty..");
        document.frmchild.select3.focus();
        return false;
    } else if (document.frmchild.dateofbirth.value == "") {
        alert("Date Of Birth should not be empty..");
        document.frmchild.dateofbirth.focus();
        return false;
    } else if (document.frmchild.select.value == "") {
        alert("Kindly select the status..");
        document.frmchild.select.focus();
        return false;
    } else {
        return true;
    }
}
</script>