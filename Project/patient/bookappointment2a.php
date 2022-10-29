<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./bookappointment.css" />
<body>
<div id="wrapper">
	<header>
		<div id="headerlogo">
			<img src="../images/cliniclogo.png" width="50" height="50" class="icon"/> 
			<h1> NTUClinic </h1>
		</div>
		<nav id="headernav">
			<a href="home.php" class="topnav">Home</a>
			<a href="about.php" class="topnav">About Us</a>
			<a href="doctors.php" class="topnav">Our Doctors</a>
			<a href="contact.php" class="topnav">Contact Us</a>
		</nav>
		<?php // Show registered name
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
        if (isset($_SESSION['valid_user']))
        { 
					echo "<a href='patient/profile.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"logout.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
					echo "</a>";
				} 
        else { 
					echo "<a href='login.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo "Login / Signup"; 
					echo "</a>";
				}
      ?> 
	</header>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
	<dt>
		<b>Make An Appointment > </b>
		<b>Step 1a > </b>
		<b>Step 1b > </b>
		Step 2a
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
	?>
		<form method="post" action="bookappointment2b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 2a:</th>
			<tr><td><b>Select the available dates as displayed below:</b></td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td><i> Note: Appointment(s) can only be booked for the next day.
			<br>We reserve the right to cancel the appointment <b>without prior notice</b>, refund will be made to your
			<br>bank account and a message will be send to your <u>registered email address</u></i>. </td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>Choose available dates below.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>
			 <label for="appointmentdate">*Date:</label>
			 <input type="date" name="date" id="date" oninput="getDate()" required />
			</td></tr>
			<tr style="height:400px;"><td></td></tr>
			<tr><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input>
			</td></tr>
			</table>
		</form>	
	<script type="text/javascript" src="bookappointment.js"></script>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>