<?php
session_start();
// error_reporting(0);
include("dbconnection.php");
$dt = date("Y-m-d");
$tim = date("H:i:s");

include("dbconnection.php");
if(isset($_SESSION['childid']))
{
	echo "<script>window.location='childaccount.php';</script>";
}
$err='';
if(isset($_POST['submit']))
{
	if(isset($_POST['g-recaptcha-response'])) {
		$loginid = $_POST['loginid'];
		$secretKey = "6Le595MeAAAAAMZpePjlx2iBRCmwLhzNURzqVqsq";
		$responseKey = $_POST['g-recaptcha-response'];
		$userIP = $_SERVER['REMOTE_ADDR'];
		$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
		$response = file_get_contents($url);
		$response = json_decode($response);
        if ($response->success) {
			$sql = "SELECT * FROM child WHERE loginid='$_POST[loginid]' AND password='$_POST[password]' AND status='Active'";
			$qsql = mysqli_query($con,$sql);
			if(mysqli_num_rows($qsql) >= 1)
			{
				$rslogin = mysqli_fetch_array($qsql);
				$_SESSION['childid']= $rslogin['childid'] ;
				echo "<script>window.location='childaccount.php';</script>";
			}
			else
			{
				$err = "<div class='alert alert-danger'>
				<strong>Oh !</strong> Change a few things up and try submitting again.
			</div>";
			}
		}
		else {
			$err = "<div class='alert alert-danger'>Invalid Recaptcha...!</div>";
		}
	}	
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>VM System</title>
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
<link rel="icon" href="favicon.ico" type="image/x-icon">
<!-- Custom Css -->
<link href="assets/css/main.css" rel="stylesheet">
<link href="assets/css/login.css" rel="stylesheet">

<!-- Swift Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="assets/css/themes/all-themes.css" rel="stylesheet" />
</head>
<body class="theme-cyan login-page authentication">
<!-- header section -->



<div class="container">
	<div id = "err"><?php echo $err;
	
?></div>
    <div class="card-top"></div>
    <div class="card">
        <h1 class="title"><span>Hospital Management System</span>Login <span class="msg">Hello, Child!</span></h1>
        <div class="col-md-12">

    <form method="post" action="" name="frmadminlogin" id="sign_in" onSubmit="return validateform()">
    <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-account"></i> </span>
                    <div class="form-line">
					<input type="text" name="loginid" id="loginid" class="form-control" placeholder="Username" /></div>
                </div>
                <div class="input-group"> <span class="input-group-addon"> <i class="zmdi zmdi-lock"></i> </span>
                    <div class="form-line">
					<input type="password" name="password" id="password" class="form-control"  placeholder="Password" /> </div>
                </div>
                <div>
                    <!-- <div class="">
                        <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                        <label for="rememberme">Remember Me</label>
                    </div> -->
					<div class="g-recaptcha" data-sitekey="6Le595MeAAAAAO7mYFN91lzHlk2zheuRgVo0Ftig"></div>
                    <div class="text-center">
					<input type="submit" name="submit" id="submit" value="Login" class="btn btn-raised waves-effect g-bg-cyan" /></div>
                    <!-- <div class="text-center"> <a href="forgot-password.html">Forgot Password?</a></div> -->
                </div>
            </form>
        </div>
    </div>    
</div>
 <div class="clear"></div>
 <div class="theme-bg"></div>
  </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script> <!-- google recaptcha -->
<script type="application/javascript">
var alphaExp = /^[a-zA-Z]+$/; //Variable to validate only alphabets
var alphaspaceExp = /^[a-zA-Z\s]+$/; //Variable to validate only alphabets and space
var numericExpression = /^[0-9]+$/; //Variable to validate only numbers
var alphanumericExp = /^[0-9a-zA-Z]+$/; //Variable to validate numbers and alphabets
var emailExp = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/; //Variable to validate Email ID 

function validateform()
{
	if(document.frmchilogin.loginid.value == "")
	{
		alert("Login ID should not be empty..");
		document.frmchilogin.loginid.focus();
		return false;
	}
	else if(document.frmchilogin.password.value == "")
	{
		alert("Password should not be empty..");
		document.frmchilogin.password.focus();
		return false;
	}
	else if(document.frmchilogin.password.value.length < 8)
	{
		alert("Password length should be more than 8 characters...");
		document.frmchilogin.password.focus();
		return false;
	}
}
	</script>