<?php // register.php
include "dbconnect.php";


if (isset($_POST['submit'])) {
	if (empty($_POST['email']) || empty ($_POST['pass'])
		|| empty ($_POST['cpass']) ) { // TODO: ADD ALL EMPTY
	echo "All records to be filled in";
	exit;}
	}
$email = $_POST['email'];
$password = $_POST['pass'];
$password2 = $_POST['cpass'];
$name =  $_POST['name'];
$image =  $_POST['image'];
$contact =  $_POST['contact'];
$nric =  $_POST['nric'];
$bday =  $_POST['bday'];
date_default_timezone_set("Asia/Singapore");
$signupdate = date("Y-m-d");

// echo ("hjsdajksa"."$email" . "<br />". "$password2" . "<br />");

if ($password != $password2) {
	echo "Sorry passwords do not match";
	exit;
}

$password = md5($password);
echo $password;
$sql = "INSERT INTO Patients (name,	contact, image,	nric,	signupdate,	birthday,	email,	password) 
		VALUES ('$name',	'$contact', 'img',	'$nric',	'$signupdate',	'$bday',	'$email',	'$password')";
	echo "<br>". $sql. "<br>";
$result = $dbcnx->query($sql);

echo "abc";
if (!$result) 
	echo "Your query failed.";
else
	echo "Welcome ". $name . ". You are now registered";
	
?>



<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./login.css" />
<body>
<div id="wrapper">

	<header>
		<div id="headerlogo">
			<img src="images/cliniclogo.png" width="50" height="50" class="icon"/> 
			<h1> NTUClinic </h1>
		</div>
		<nav id="headernav">
			<a href="home.html" class="topnav">Home</a>
			<a href="about.html" class="topnav">About Us</a>
			<a href="doctors.html" class="topnav">Our Doctors</a>
			<a href="contact.html" class="topnav">Contact Us</a>
		</nav>
		<a href="login.html" id="headerprofile">
			<img src="images/profile.png" width="38" height="38" class="icon">
			Login / Signup
		</a> 
	</header>
	
	<div id="bodycontent">
		<div class="login-banner">
			<div class="login-container">
        <h1>Signup</h1>
        <form class="login-form" action="signup.php">
					<label for="email">Email</label>
					<input type="email" class="login-input" id="email" name="email" placeholder="example@email.com">
					<label for="pass">Password</label>
          <input class="login-input" type="password" id="pass" name="pass"/>
          <div class="login-buttons">
            <a href="login.html">Already have an account? Login here</a>
            <button class="primarybutton">
              Signup
            </button>
          </div>
        </form>
      </div>
		</div>


	</div>
		

	<footer>
		<div id="footer1">
			<div id="leftcolumn">
				<div id="footerlogo">
					<img src="images/cliniclogo.png" width="38" height="38" id="icon" /> 
					<h2>NTUClinic</h2>
				</div>
				<small>
					<dt>55 Ubi Ave 1 #08-01 Singapore 408935
					<br>Fax: 6590 4389
					<br>Opens Monday to Friday, 8:30am to
					<br><dt id="lowesttext">6:00pm, except Public Holidays 
				</small>
			</div>
			<div class="footernav">
				<h3 class="footerheader">Information</h3>
				<nav>
					<ul>
						<li><a href="about.html" id="botnav">About Us</a> </li>
						<li><a href="doctor.html" id="botnav">Our Doctors</a> </li>
						<li><a href="contact.html" id="botnav">Contact Us</a> </li>
					</ul>
				</nav>
				
			</div>
			<div class="footernav">
				<h3 class="footerheader">Patient's Site</h3>
				<nav>
					<ul>
						<li><a href="profile.html" id="botnav">Profile</a> </li>
						<li><a href="myappointment.html" id="botnav">Your Appointments</a> </li>
						<li><a href="bookappointment.html" id="botnav">Book Appointments</a> </li>
					</ul>
				</nav>
			</div>
			<div id="rightcolumn">
				<p>Follow us through our social media.</p>
				<div id="socialmedia">
				<image src="images/facebook.png" width="35" height="35" id="contactlogo">
				<image src="images/instagram.png" width="35" height="35" id="contactlogo">
				<image src="images/whatsapp.png" width="35" height="35" id="contactlogo">
				</div>
			</div>
		</div>
		<div id="copyright">
			<small><i>Copyright &copy; 2022 NTUClinic </small>
		</div>
	</footer>
</div>
</body> -->
