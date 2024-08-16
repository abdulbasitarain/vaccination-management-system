<?php

include("header.php");
include("dbconnection.php");
$readonly = "";
if(isset($_POST['submit']))
{
	if(isset($_SESSION['childid']))
	{
		$lastinsid =$_SESSION['childid'];
	}
	else
	{
		$dt = date("Y-m-d");
		$tim = date("H:i:s");
		$sql ="INSERT INTO child(childname,admissiondate,admissiontime,address,city,mobileno,loginid,password,gender,dob,status) values('$_POST[childe]','$dt','$tim','$_POST[textarea]','$_POST[city]','$_POST[mobileno]','$_POST[loginid]','$_POST[password]','$_POST[select6]','$_POST[dob]','Active')";
		if($qsql = mysqli_query($con,$sql))
		{
		}
		else
		{
			echo mysqli_error($con);
		}
		$lastinsid = mysqli_insert_id($con);
	}
	
	$sqlappointment="SELECT * FROM appointment WHERE appointmentdate='$_POST[appointmentdate]' AND appointmenttime='$_POST[appointmenttime]' AND hospitalid='$_POST[hosp]' AND status='Approved'";
	$qsqlappointment = mysqli_query($con,$sqlappointment);
	if(mysqli_num_rows($qsqlappointment) >= 1)
	{
		echo "<script>alert('Appointment already scheduled for this time..');</script>";
	}
	else
	{
		$sql ="INSERT INTO appointment(appointmenttype,childid,appointmentdate,appointmenttime,status,vaccineid,hospitalid) values('ONLINE','$lastinsid','$_POST[appointmentdate]','$_POST[appointmenttime]','Pending','$_POST[vaccine]','$_POST[hosp]')";
		if($qsql = mysqli_query($con,$sql))
		{
			// echo "<script>alert('Appointment record inserted successfully...');</script>";
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
if(isset($_SESSION['childid']))
{
    $sqlchild = "SELECT * FROM child WHERE childid='$_SESSION[childid]' ";
    $qsqlchild = mysqli_query($con,$sqlchild);
    $rschild = mysqli_fetch_array($qsqlchild);
    $readonly = "readonly";
}
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Style -->

<style>
    .book-img {
        position: relative;
        top: 80px;
    }
    @media screen and (max-width:992px) { 
        .book-img {
            top: 0;
        }
    }
</style>

<div class="wrapper col4">
    <div id="container">

        <?php
        if(isset($_POST['submit']))
        {
           if(mysqli_num_rows($qsqlappointment) >= 1)
           {		
             echo "<h2>Appointment already scheduled for ". date("d-M-Y", strtotime($_POST['appointmentdate'])) . " " . date("H:i A", strtotime($_POST['appointmenttime'])) . " .. </h2>";
         }
         else
         {
          if(isset($_SESSION['childid']))
          {
             echo "<h2 class='text-center'>Appointment taken successfully.. </h2>";
             echo "<p class='text-center'>Appointment record is in pending process. Kinldy check the appointment status. </p>";
             echo "<p class='text-center'> <a href='viewappointment.php'>View Appointment record</a>. </p>";			
         }
         else
         {
             echo "<h2 class='text-center'>Appointment taken successfully.. </h2>";
             echo "<p class='text-center'>Appointment record is in pending process. Please wait for confirmation message.. </p>";
             echo "<p class='text-center'> <a href='childlogin.php'>Click here to Login</a>. </p>";	
         }
     }
 }
 else
 {
   ?>
        <!-- Content -->
        <div id="content">



            <!-- Make an Appointment -->
            <section class="main-oppoiment ">
                <div class="container">
                    <div class="row">

                        <!-- Make an Appointment -->
                        <div class="col-lg-7">
                            <div class="appointment">

                                <!-- Heading -->
                                <div class="heading-block head-left margin-bottom-50">
                                    <h4>Make an Appointment</h4>
                                    
                                </div>
                                <form method="post" action="" name="frmchiapp" onSubmit="return validateform()"
                                    class="appointment-form">
                                    <ul class="row">
                                        <li class="col-sm-6">
                                            <label>


                                                <input placeholder="Child's Name" type="text" class="form-control"
                                                    name="childe" id="childe"
                                                    value=""
                                                    <?php echo $readonly; ?>>
                                                <i class="icon-user"></i>
                                            </label>

                                        </li>

                                        <li class="col-sm-6">
                                            <label><input placeholder="Address" type="text" class="form-control"
                                                    name="textarea" id="textarea"
                                                    value=""
                                                    <?php echo $readonly; ?>><i class="icon-compass"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label><input placeholder="City" type="text" class="form-control"
                                                    name="city" id="city" value=""
                                                    <?php echo $readonly; ?>><i class="icon-pin"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Contact Number" type="text" class="form-control"
                                                    name="mobileno" id="mobileno"
                                                    value=""
                                                    <?php echo $readonly; ?>><i class="icon-phone"></i>
                                            </label>

                                        </li>
                                        <?php
                            if(!isset($_SESSION['childid']))
                            {        
                                ?>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Login ID" type="text" class="form-control"
                                                    name="loginid" id="loginid"
                                                    value=""
                                                    <?php echo $readonly; ?>><i class="icon-login"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>

                                                <input placeholder="Password" type="password" class="form-control"
                                                    name="password" id="password"
                                                    value=""
                                                    <?php echo $readonly; ?>><i class="icon-lock"></i>
                                            </label>

                                        </li>
                                        <?php
                            }
                            ?>
                                        <li class="col-sm-6">
                                            <label>

                                                <?php 
                                    if(isset($_SESSION['childid']))
                                    {
                                       echo $rschild['gender'];
                                   }
                                   else
                                   {
                                    ?>
                                                <select name="select6" id="select6" class="selectpicker">
                                                    <option value="" selected="" hidden="">Select Gender</option>
                                                    <?php
                                        $arr = array("Male","Female","others");
                                        foreach($arr as $val)
                                        {
                                            echo "<option value='$val'>$val</option>";
                                        }
                                        ?>
                                                </select>
                                                <?php
                                }
                                ?>
                                                <i class="ion-transgender"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Date of birth" type="text" class="form-control"
                                                    name="dob" id="dob" onfocus="(this.type='date')"
                                                    value="" <?php echo $readonly; ?>><i
                                                    class="ion-calendar"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Appointment Date" type="text" class="form-control"
                                                    min="<?php echo date("Y-m-d"); ?>" name="appointmentdate"
                                                    onfocus="(this.type='date')" id="appointmentdate"><i
                                                    class="ion-calendar"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <input placeholder="Appointment Time" type="text"
                                                    onfocus="(this.type='time')" class="form-control"
                                                    name="appointmenttime" id="appointmenttime"><i
                                                    class="ion-ios-clock"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>

                                                <select name="vaccine" class="selectpicker" id="vaccine"
                                                    >
                                                    <option value="">Select Vaccine</option>
                                                    <?php
                                $sqlvacc = "SELECT * FROM vaccine WHERE status='Active'";
                                $qsqlvacc = mysqli_query($con,$sqlvacc);
                                while($rsvacc = mysqli_fetch_array($qsqlvacc))
                                {
                                 echo "<option value='$rsvacc[vaccineid]'>$rsvacc[vaccinename]</option>";
                             }
                             ?>
                                                </select>
                                                <i class="ion-university"></i>
                                            </label>

                                        </li>
                                        <li class="col-sm-6">
                                            <label>
                                                <select name="hosp" class="selectpicker" id="vaccine"
                                                    >
                                                    <option value="">Select Hospital</option>
                                                    <?php
                                                    $sqlvacc = "SELECT * FROM hospital WHERE status='Active'";
                                                    $qsqlvacc = mysqli_query($con,$sqlvacc);
                                                    while($rsvacc = mysqli_fetch_array($qsqlvacc))
                                                    {
                                                        echo "<option value='$rsvacc[hospitalid]'>$rsvacc[hospitalname] (";
                                                        $sqlvacc = "SELECT * FROM vaccine WHERE vaccineid='$rsvacc[vaccineid]'";
                                                        $qsqlvacca = mysqli_query($con,$sqlvacc);
                                                        $rsvacc = mysqli_fetch_array($qsqlvacca);
                                                        echo $rsvacc['vaccinename'];

                                                        echo ")</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <i class="ion-medkit"></i>

                                            </label>

                                        </li>

                                        <li class="col-sm-12">
                                            <button type="submit" class="btn" name="submit" id="submit">make an
                                                appointment</button>
                                        </li>
                                </form>
                            </div>
                        </div>
                        <!-- img -->
                        <div class="col-md-5">
                            <img class="img-responsive book-img" src="images/svgs/book-img.svg" alt="">
                        </div>
                    </div>
                </div>


                <?php
}
?>

        </div>
    </div>
</div>
</section>
</div>



<?php
include("footer.php");
?>
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform() {
    if (document.frmchiapp.childe.value == "") {
        alert("Child name should not be empty..");
        document.frmchiapp.childe.focus();
        return false;
    } else if (!document.frmchiapp.childe.value.match(alphaspaceExp)) {
        alert("Child name not valid..");
        document.frmchiapp.childe.focus();
        return false;
    } else if (document.frmchiapp.textarea.value == "") {
        alert("Address should not be empty..");
        document.frmchiapp.textarea.focus();
        return false;
    } else if (document.frmchiapp.city.value == "") {
        alert("City should not be empty..");
        document.frmchiapp.city.focus();
        return false;
    } else if (!document.frmchiapp.city.value.match(alphaspaceExp)) {
        alert("City name not valid..");
        document.frmchiapp.city.focus();
        return false;
    } else if (document.frmchiapp.mobileno.value == "") {
        alert("Mobile number should not be empty..");
        document.frmchiapp.mobileno.focus();
        return false;
    } else if (!document.frmchiapp.mobileno.value.match(numericExpression)) {
        alert("Mobile number not valid..");
        document.frmchiapp.mobileno.focus();
        return false;
    } else if (document.frmchiapp.loginid.value == "") {
        alert("login ID should not be empty..");
        document.frmchiapp.loginid.focus();
        return false;
    } else if (!document.frmchiapp.loginid.value.match(alphanumericExp)) {
        alert("login ID not valid..");
        document.frmchiapp.loginid.focus();
        return false;
    } else if (document.frmchiapp.password.value == "") {
        alert("Password should not be empty..");
        document.frmchiapp.password.focus();
        return false;
    } else if (document.frmchiapp.password.value.length < 8) {
        alert("Password length should be more than 8 characters...");
        document.frmchiapp.password.focus();
        return false;
    } else if (document.frmchiapp.select6.value == "") {
        alert("Gender should not be empty..");
        document.frmchiapp.select6.focus();
        return false;
    } else if (document.frmchiapp.dob.value == "") {
        alert("Date Of Birth should not be empty..");
        document.frmchiapp.dob.focus();
        return false;
    } else if (document.frmchiapp.appointmentdate.value == "") {
        alert("Appointment date should not be empty..");
        document.frmchiapp.appointmentdate.focus();
        return false;
    } else if (document.frmchiapp.appointmenttime.value == "") {
        alert("Appointment time should not be empty..");
        document.frmchiapp.appointmenttime.focus();
        return false;
    } else {
        return true;
    }
}

function loadhospital(vaccid) {
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else {
        // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("divdoc").innerHTML = this.responseText;
        }
    };
    xmlhttp.open("GET", "departmentDoctor.php?vaccid=" + vaccid, true);
    xmlhttp.send();
}
</script>