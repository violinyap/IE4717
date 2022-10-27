<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./myappointment.css" />
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
		<a href="payment.php" id="botnav">Payment</a>
		&nbsp;
	</div>
	
	<div class="maincontainer">
	<dt id="abcd">
		<?php include 'preappointmentRetrieval.php';
		echo "<p>
		Make payment here if you want to continue/edit your planned appointment.<br>
		Slots will be reserved only for 1 hour and will be deleted after the timing.<br><br>" .
		"<i>" . $count . " pre-appointment(s) found.</i></p><br>";
		?>
		<?php
		include "methods/getPatientsData.php";
		$db = mysqli_connect('localhost', 'root', '');
		mysqli_select_db($db,'project');
		$sql=
		"SELECT a.userid, a.location, a.doctor, a.date, a.time, 
		a.paid_status, a.book_status, a.timeCompleted
		FROM appointments a
		INNER JOIN patients p on a.userid = p.userid";
		$result = mysqli_query($db,$sql);
		while ($row = mysqli_fetch_assoc($result)){
		if ($row['userid'] == $currentUserData['userid']) {
		if ($row['paid_status'] == "0") {
			if ($row['book_status'] == "1")
			{
			$location = $row['location'];
			$doctor = $row['doctor'];
			$date = $row['date'];
			$time = $row['time'];
			$date2 = date("d-m-Y", strtotime($date));
			$timeCompleted = $row['timeCompleted'];
			echo "
			<table class='appointment-table' style='font-size:20px;border:1px solid black;height:300px;width:450px;'>
			<th colspan='2' style='float:left;font-size:24px;'>
				<i>Appointment Details</i>
			</th>
			<tr>
				<td style='width:250px;'><b>Doctor: </b></td>
				<td><span id='doctor'>
				$doctor
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Date: </b></td>
				<td><span id='date'>
				$date2
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Time: </b></td>
				<td><span id='time'>
				$time
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Location: </b></td>
				<td><span id='location'>
				$location
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Status: </b></td>
				<td><span id='status'>
				Unpaid
				</span></td>
			</tr>
			<tr>
				<td style='width:250px;'><b>Time Completed: </b></td>
				<td><span id='time_completed'>
				$timeCompleted
				</span></td>
			</tr>
			<tr>
			<td style='float: center; width:250px;'>
				<button id='editbutton' onclick='alertpopup2()'>Pay</button>
			</td>
			<td style='float: center;'>
				<button id='cancelbutton' onclick='alertpopup()'>Cancel</button>
			</td>
			</tr>
			</table><br>";
			}
			}
			}
			}
			$result->free();
			$db->close();
		?>
	<script>
	function alertpopup(){
		var val = confirm("Confirm to cancel the pre-appointment? Refund will be made.");
		if (val == true) {
		alert("Appointment successfully cancelled.");
		} else {
		alert("Appointment not cancelled. To confirm the appointment, click pay.");
		}
	}
	function alertpopup2(){
		var val1 = window.confirm("Open payment in new window?")
		if (val1 == true) {
		alert("Payment Successful!");
		}
		else {
		alert("Payment not successful. Try again.");
		}
		}
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
