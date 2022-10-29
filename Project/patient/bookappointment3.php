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
		<b>Step 2a > </b>
		<b>Step 2b > </b>
		Step 3
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
	?>
		<form method="post" action="bookappointment4.php" id="appointmentform">
			<table style="width:500px;"> 
			<th style="text-align:left; ">Step 3:</th>
			<tr><td colspan="2">Check your selection below.<br>
			<br>Click 'Change' if you want to make changes to your selection.
			<br>If all information is correct, click 'Next' to proceed to Payment.
			</td></tr>
			<tr style="height:50px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Location: </td>
				<td class="confirmation-column"><span id="location"><?php echo $location;?></span> </td>
			</tr>
			<tr style="height:35px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Doctor:  </td>
				<td class="confirmation-column"><span id="doctor"><?php echo $doctor;?></span></td>
			</tr>
			<tr style="height:35px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Date: </td>
				<td class="confirmation-column"><span id="date"><?php echo $date;?></span></td>
			</tr>
			<tr style="height:35px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Time: </td>
				<td class="confirmation-column"><span id="time"><?php echo $time;?></span></td>
			</tr>
			<tr style="height:200px;"><td colspan="2"><br></td></tr>
			<tr>
				<td>
				<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
				<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
				<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
				<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
				<input type="submit" value="Next" id="nextBtn"></input>
				</td>
				<td>
				<a href="bookappointment1a.php" id="cancelButton">Change</a>
				</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>