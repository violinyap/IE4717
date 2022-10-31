<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../style.css" />
	<link rel="stylesheet" href="../doctors.css" />
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
		<a href="login.php" id="headerprofile">
			<img src="../images/profile.png" width="38" height="38" class="icon">
			<?php // Show registered name
				session_start();
        if (isset($_SESSION['valid_user']))
        { echo $_SESSION["valid_user"]; } 
        else { echo "Login / Signup"; }
      ?>
		</a> 
	</header>
	
	<div id="bodycontent">
		<div class="doctors-banner">
			<h1>Our Doctors</h1>
		</div>

    <div class="doctors-section">
      <div class="doctor-card">
        <img class="doctor-card-img">
        <div class="doctor-card-text">
          <h2>Dr. Lim</h2>
          <p>Specialised in medicine</p>
        </div>
      </div>
      <div class="doctor-card">
        <img class="doctor-card-img">
        <div class="doctor-card-text">
          <h2>Dr. Lim</h2>
          <p>Specialised in medicine</p>
        </div>
      </div>
      <div class="doctor-card">
        <img class="doctor-card-img">
        <div class="doctor-card-text">
          <h2>Dr. Lim</h2>
          <p>Specialised in medicine</p>
        </div>
      </div>
      <div class="doctor-card">
        <img class="doctor-card-img">
        <div class="doctor-card-text">
          <h2>Dr. Lim</h2>
          <p>Specialised in medicine</p>
        </div>
      </div>
      <div class="doctor-card">
        <img class="doctor-card-img">
        <div class="doctor-card-text">
          <h2>Dr. Lim</h2>
          <p>Specialised in medicine</p>
        </div>
      </div>
      <div class="doctor-card">
        <img class="doctor-card-img">
        <div class="doctor-card-text">
          <h2>Dr. Lim</h2>
          <p>Specialised in medicine</p>
        </div>
      </div>
    </div>
    
		<div class="doctors-detail-modal">
			<div class="close-modal">
				<a class="close" href="../doctors.php">&times;</a>
			</div>
			<div class="detail-wrapper">
				<div class="detail-left">
					<h1>Dr. Lim</h1>
					<p>
						specialised in family medicine <br/>
						ID: 2138128 <br/>
						Clinic: Jurong <br/>
						Contact no: 6327-2819 <br/>
						<br/>
						Working days: Mon, Tue, Wed, Thu, Fri 
					</p>
					<button class="primarybutton">
						Book Appointment
					</button>
				</div>
				<div class="detail-right">
					<h2>Availability in the next 5 days</h2>
					<table class="availability-table">
						<tr class="availability-row">
							<th>Day/Date</th>
							<th>10-11</th>
							<th>11-12</th>
							<th>13-14</th>
							<th>14-15</th>
							<th>15-16</th>
						</tr>
						<tr class="availability-row">
							<td>Tue, 13 Sep</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
						</tr>
						<tr class="availability-row">
							<td>Tue, 13 Sep</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
						</tr>
						<tr class="availability-row">
							<td>Tue, 13 Sep</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
						</tr>
						<tr class="availability-row">
							<td>Tue, 13 Sep</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
						</tr>
						<tr class="availability-row">
							<td>Tue, 13 Sep</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/avail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
							<td>
								<img src="../images/notavail.svg" />
							</td>
						</tr>
					</table>
				</div>
			</div>
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