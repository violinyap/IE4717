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
		<?php // Show registered name
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
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
		<b>Make An Appointment > </b>
		<b>Step 1a > </b>
		Step 1b
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$location = $_POST['location'];
	?>
		<form method="post" action="bookappointment2a.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 1b:</th>
			<tr><td>Select available doctors.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td><i>Note: Doctors available are subjected to a <u>first come first serve basis</u> and their available schedule. <br></i></td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>Doctors:</td></tr>
			<tr style="height:10px;"><td></td></tr>
			<?php 
			if ($location == "NTU Clinic Fullerton") {
				echo "
				<tr><td><input type='radio' value='Dr Tan' name='doctor' onInput='getdoctor();' checked='check'> 
				 <label>Dr Tan</label></td></tr>
				<tr style='height:10px;'><td></td></tr>
				<tr><td><input type='radio' value='Dr Stanford' name='doctor' onInput='getdoctor();' > 
				 <label>Dr Standford</label></td></tr>
				<tr style='height:25px;'><td></td></tr>
				 ";
				}
			else {
				echo "
				<tr><td><input type='radio' value='Dr Tasha' name='doctor' onInput='getdoctor();' checked='check'> 
				 <label>Dr Tasha</label></td></tr>
				<tr style='height:10px;'><td></td></tr>
				 <tr><td><input type='radio' value='Dr Strange' name='doctor' onInput='getdoctor();' > 
				 <label>Dr Strange</label></td></tr>
				<tr style='height:10px;'><td></td></tr>
				 <tr><td><input type='radio' value='Dr Kang' name='doctor' onInput='getdoctor();' > 
				 <label>Dr Kang</label></td></tr>
				";
				}
			?>
			<tr style="height:370px;"><td></td></tr> 
			<tr><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input></td></tr>
			</table>
		</form>
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