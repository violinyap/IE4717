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
	<div class="sidecontainer">
		<nav id="sidepanel">
			<div id="panel1">
			<a href="patient/profile.php"><img src="../images/profile.png" width="75" height="75"> </a>
			<br><dt>Example Guy<!--to add javascript-->
			<br><b>User</b><br><br><!--to add javascript-->
			<a href="editprofile.html" id="botnav">Edit Profile</a>
			</div>
			<div id="panel2">
			<a href="bookappointment.php" id="sidenav">
			<dt id="abc">Make An<br>Appointment</dt>
			<img src="../images/bookappointment.png" width="43" height="43"> </a>
			</div>
			<div id="panel2">
			<a href="myappointment.php" id="sidenav">
			<dt id="abc">My<br>Appointment</dt>
			<img src="../images/myappointment.png" width="43" height="43"> </a>
			</div>
			<div id="panel2">
			<a href="payment.php" id="sidenav">
			<dt id="abc">Payment</dt>
			<img src="../images/payment.png" width="43" height="43"> </a>
			</div>
		</nav>
	</div>
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
	<footer>
		<div id="footer1">
			<div id="leftcolumn">
				<div id="footerlogo">
					<img src="../images/cliniclogo.png" width="38" height="38" id="icon" /> 
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
						<li><a href="patient/profile.php" id="botnav">Profile</a> </li>
						<li><a href="myappointment.php" id="botnav">Your Appointments</a> </li>
						<li><a href="bookappointment.php" id="botnav">Book Appointments</a> </li>
					</ul>
				</nav>
			</div>
			<div id="rightcolumn">
				<p>Follow us through our social media.</p>
				<div id="socialmedia">
				<image src="../images/facebook.png" width="35" height="35" id="contactlogo">
				<image src="../images/instagram.png" width="35" height="35" id="contactlogo">
				<image src="../images/whatsapp.png" width="35" height="35" id="contactlogo">
				</div>
			</div>
		</div>
		<div id="copyright">
			<small><i>Copyright &copy; 2022 NTUClinic </small>
		</div>
	</footer>
</div>
</body>