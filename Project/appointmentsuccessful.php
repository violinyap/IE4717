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
			<a href="home.php" class="topnav">Home</a>
			<a href="about.php" class="topnav">About Us</a>
			<a href="doctors.php" class="topnav">Our Doctors</a>
			<a href="contact.php" class="topnav">Contact Us</a>
		</nav>
		<a href="login.php" id="headerprofile">
			<img src="images/profile.png" width="38" height="38" class="icon">
			<?php // Show registered name
				session_start();
        if (isset($_SESSION['valid_user']))
        { echo $_SESSION["valid_user"]; } 
        else { echo "Login / Signup"; }
      ?>
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
		<a href="bookappointment.php" id="botnav">Make An Appointment </a> > <b>Appointment Successful</b>
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$location = $_POST['location'];
		$doctor = $_POST['doctor'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
		date_default_timezone_set("Asia/Singapore");
		$timeCompleted = date('H:i');
		$date2 = date("d-m-Y", strtotime($date));
		echo "<b>Appointment booked successfully!</b><br>
		<i>Check your email for the softcopy confirmation. </i> <br><br>";
		echo 
		"<div id='step3'><table class='confirmation-table'>
			<tr>
				<td>Location: </td>
				<td class='confirmation-column'>" . $location . "</td>
			</tr>
			<tr><td colspan='2'><br></td></tr>
			<tr>
				<td>Doctor:  </td>
				<td class='confirmation-column'>" . $doctor . "</td>
			</tr>
			<tr><td colspan='2'><br></td></tr>
			<tr>
				<td>Date: </td>
				<td class='confirmation-column'>" . $date2 . "</td>
			</tr>
			<tr><td colspan='2'><br></td></tr>
			<tr>
				<td>Time: </td>
				<td class='confirmation-column'>" . $time . "</td>
			</tr>
			</tr>
			<tr><td colspan='2'><br></td></tr>
			<tr>
				<td>Paid Status: </td>
				<td class='confirmation-column'>Yes</td>
			</tr>
		</table></div>" .
		"<a href='myappointment.php'><button id='viewBtn'>View Your Appointments</button></a>" .
		"<a href='bookappointment.php'><button id='anotherBtn'>Make Another Appointment</button></a>";
		
		@ $db = new mysqli('localhost', 'root', '', 'project');

		if (mysqli_connect_errno()) {
		echo "Error: Could not connect to database.  Please try again later.";
		exit;
		}
		$query = "insert into appointments values
				(NULL,'".$location."','".$doctor."', '".$date."', '".$time."', '".$timeCompleted."' ,true, true)";
		$result = $db->query($query);
		if ($result) {
			echo "<p><br>Please be on time for your appointment(s).<br>You can re-schedule your appointment on your appointment page. <br>*Terms & Conditions applies</p>";
			} else {
			echo "An error has occurred.  The appointment was not registered.";
			}
			
		$db->close();
	?>
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
						<li><a href="about.php" id="botnav">About Us</a> </li>
						<li><a href="doctor.php" id="botnav">Our Doctors</a> </li>
						<li><a href="contact.php" id="botnav">Contact Us</a> </li>
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