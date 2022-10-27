<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="./style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel='stylesheet' href="./profile.css" />
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
		<?php // Show registered name
				session_start();
        if (isset($_SESSION['valid_user']))
        { 
					echo "<a href='profile.php' id='headerprofile'>";
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"logout.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
					echo "</a>";
				} 
        else { 
					echo "<a href='login.php' id='headerprofile'>";
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo "Login / Signup"; 
					echo "</a>";
				}
      ?> 
	</header>
	
	<div id="bodycontent">
	<div class="sidecontainer">
		<nav id="sidepanel">
			<div id="panel1">
			<a href="profile.php"><img src="images/profile.png" width="75" height="75"> </a>
			<br><dt>Example Guy<!--to add javascript-->
			<br><b>User</b><br><br><!--to add javascript-->
			<a href="editprofile.php" id="botnav">Edit Profile</a>
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
		<a href="profile.php" id="botnav">My Profile</a>
		&nbsp;
	</div>
	
	<div class="maincontainer">
	<dt id="abcd">
	<table class="profile-table">
		<?php 
			include 'methods/getPatientsData.php';

			// NAME
			echo "<tr>";
			echo "<td rowspan='7' style='vertical-align: top; margin: auto'><img src='images/profile.png' width='75' height='75'></td>";
			echo "<th class='profile-row' style='text-align: left;'>Name:</th>";
			echo "<td><span id='name'>".$currentUserData['name']."</span></td>";
			echo "</tr>";
		
			// EMAIL
			echo "<tr>";
			echo "<th class='profile-col'>Email:</th>";
			echo "<td><span id='email'>".$currentUserData['email']."</span></td>";
			echo "</tr>";

			// NRIC
			echo "<tr>";
			echo "<th class='profile-col'>NRIC/FIN:</th>";
			echo "<td><span id='nric'>".$currentUserData['nric']."</span></td>";
			echo "</tr>";

			// BDAY
			echo "<tr>";
			echo "<th class='profile-col'>Birthday:</th>";
			echo "<td><span id='bday'>".$currentUserData['birthday']."</span></td>";
			echo "</tr>";

			// JOIN DATE
			echo "<tr>";
			echo "<th class='profile-col'>Joined since:</th>";
			echo "<td><span id='signupdate'>".$currentUserData['signupdate']."</span></td>";
			echo "</tr>";
		?>

	<tr>
		<td colspan="2" style="padding-top: 100px;"><button id="editprofilebutton" onclick="location.href='editprofile.php';">Edit Profile</button>
		</td>
	</tr>
	</table>
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
