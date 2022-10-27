<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./bookappointment.css" />
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
	<div class="sidecontainer">
		<nav id="sidepanel">
			<div id="panel1">
			<a href="profile.php"><img src="images/profile.png" width="75" height="75"> </a>
			<br><dt>Example Guy<!--to add javascript-->
			<br><b>User</b><br><br><!--to add javascript-->
			<a href="editprofile.html" id="botnav">Edit Profile</a>
			</div>
			<div id="panel2">
			<a href="bookappointment.php" id="sidenav">
			<dt id="abc">Make An<br>Appointment</dt>
			<img src="images/bookappointment.png" width="43" height="43"> </a>
			</div>
			<div id="panel2">
			<a href="myappointment.php" id="sidenav">
			<dt id="abc">My<br>Appointment</dt>
			<img src="images/myappointment.png" width="43" height="43"> </a>
			</div>
			<div id="panel2">
			<a href="payment.php" id="sidenav">
			<dt id="abc">Payment</dt>
			<img src="images/payment.png" width="43" height="43"> </a>
			</div>
		</nav>
	</div>
	<div id="appointmentnav">
	<dt>
		<b>Make An Appointment</b>
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
		<form method="post" action="appointmentsuccessful.php" id="appointmentform">
		
			<div class="tab"> 
			<dt id="aheader"><b>Start booking an apppointment?</b></dt>
			<br><br><br>
			<dt>Follow the instructions for step 1 to 4 for a smooth process.
			<br><br><i>Note: <b><u>$5</u></b> payment for booking an appointment is required.</i>
			<br><br>View <a href="doctors.html" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</dt>
			
			 </div>
			
			<div class="tab"> 
			<dt><b>Step 1a:</b>
			<br>Select our locations.
			<br><br>View <a href="doctors.html" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</dt>
			<br><br>
			<dt>Locations: </dt>
			 <p><br><input type="radio" value="NTU Hive Clinic" name="location" onInput="getlocation();" checked="checked"> 
			 <label for="1">NTU Hive Clinic</label><br></p>
			 <p><input type="radio" value="NTU The Arc Clinic" name="location" onInput="getlocation();"> 
			 <label for="arc">NTU The Arc Clinic</label><br></p>
			 <p><input type="radio" value="NTU SPMs Clinic" name="location" onInput="getlocation();"> 
			 <label for="spms">NTU SPMs Clinic</label><br>
			 
			 </p>
			 </div>
			
			<div class="tab"> 
			<dt><b>Step 1b:</b>
			<br>Select available doctors.<br>
			<br><i>Note: Doctors available are subjected to a <u>first come first serve basis</u> and their available schedule. <br></i></dt>
			<br>
			<dt><br>Doctors:</dt>
			 <p><input type="radio" value="Dr. Scheider" name="doctor" onInput="getdoctor();" checked="checked> 
			 <label for="hive">Dr. Scheider</label><br></p>
			 <p><input type="radio" value="Dr. Chen L H" name="doctor" onInput="getdoctor();" > 
			 <label for="arc">Dr. Chen L H</label><br></p>
			 </div>
			
			<div class="tab">
			<dt><b>Step 2a:
			<br>Select the available dates as displayed below:</b>
			<br><br><i> Note: We only allow advance appointment up to the end of the week (Sunday).
			<br>We reserve the right to cancel the appointment <b>without prior notice</b>, refund will be made to your
			<br>bank account and a message will be send to your <u>registered email address</u>.
			<br><br>Choose available dates below.<br>
			</i>
			 <p>
			 <label for="appointmentdate">*Date:</label>
			 <input type="date" name="date" id="date" oninput="getDate()" />
			 </p>
			</div>
			
			<div class="tab">
			<dt><b>Step 2b:
			<br>Select the available time slots as displayed below: </b><br>
			<table class="time-table">
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="8:00" name="timeslot" onInput="getTime();" checked="checked">
			 <label>8:00am</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="9:00" name="timeslot" onInput="getTime();">
			 <label>9:00am</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			<p><input type="radio" value="10:00" name="timeslot" onInput="getTime();">
			 <label>10:00am</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			<p><input type="radio" value="11:00" name="timeslot" onInput="getTime();">
			 <label>11:00am</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="12:00" name="timeslot" onInput="getTime();">
			 <label>12:00pm</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			<p><input type="radio" value="13:00" name="timeslot" onInput="getTime();">
			 <label>1:00pm</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="14:00" name="timeslot" onInput="getTime();">
			 <label>2:00pm</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="15:00" name="timeslot" onInput="getTime();">
			 <label>3:00pm</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="16:00" name="timeslot" onInput="getTime();">
			 <label>4:00pm</label><br></p>
			</td>
			</tr>
			<tr class="time-row">
			<td>
			 <p><input type="radio" value="17:00" name="timeslot" onInput="getTime();">
			 <label>5:00pm</label><br></p>
			</td>
			</tr>
			</table>
			<br>
			</div>
			
			<div class="tab">
			<dt><b>Step 3:</b>
			<br>Check your selection below.
			<br>Go to previous pages if you want to make changes to your selection.
			</dt>
			<br>
			<div id="step3">
			<table class="confirmation-table"> 
			<tr>
				<td>Location: </td>
				<td class="confirmation-column"><span id="location">NTU Hive Clinic</span> </td>
			</tr>
			<tr><td colspan="2"><br></td></tr>
			<tr>
				<td>Doctor:  </td>
				<td class="confirmation-column"><span id="doctor">Dr. Scheider</span></td>
			</tr>
			<tr><td colspan="2"><br></td></tr>
			<tr>
				<td>Date: </td>
				<td class="confirmation-column"><input type="date" id="date-confirm" style="font-size:20px;text-align:center;background:transparent;border:0px;font-style:italic;" value="xx/xx/xx" disabled></td>
			</tr>
			<tr><td colspan="2"><br></td></tr>
			<tr>
				<td>Time: </td>
				<td class="confirmation-column"><span id="time">8:00</span></td>
			</tr>
			</table>
			</div>
			</div>
			
			<div class="tab">
			<dt><b>Step 4:</b>
			<br>Make your payment. </dt>
			<br>
			<p>A payment of $5.00 booking fee is required to confirm this appointment.
			<br>Proceed by clicking the submit button.<br>
			<br>Or press 'cancel' if you want to make payment later.
			<br><i>Note: Appointment(s) will only be saved for an hour before deletion.</i>
			</p>
			<br>
			<input type="submit" formaction="appointmentunsuccessful.php" id="cancelBtn" value="Cancel"></input><br><br>
			<input type="hidden" name="button_pressed" value="1" />
			</div>
			
			<div style="overflow:auto;">
			<div class="btn-holder">
			<button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> &nbsp;
			<button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
			</div>
			
			<div class="progress-indicator">
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			<span class="step"></span>
			</div>
			
		</form>	
			</div>
	<script type="text/javascript" src="bookappointment.js">
	</script>
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
						<li><a href="profile.php" id="botnav">Profile</a> </li>
						<li><a href="myappointment.php" id="botnav">Your Appointments</a> </li>
						<li><a href="bookappointment.php" id="botnav">Book Appointments</a> </li>
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
</body>
