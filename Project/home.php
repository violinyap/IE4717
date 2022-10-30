<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./home.css" />
<body>
<div id="wrapper">
	<?php include "header.php";?>
	
	<div id="bodycontent">
		<div class="home-banner">
			<h1>All new online service</h1>
			<h1>Book your appointment now!</h1>
			<div class="banner-button">
				<button class="primarybutton" onclick="location.href='patient/profile.php'" type="button">
					I am a Patient
				</button>
				<button class="primarybutton" onclick="location.href='patient/profile.php'" type="button">
					I am a Doctor
				</button>
			</div>
		</div>

		<div class="home-services">
			<div class="service-left">
				<h1>Best services</h1>
				<p>
				NTUClinic is build with the value of caring. Our clinic offer a full range of services,<br>
				from the management of acute and chronic medical conditions to minor procedures & medical testing. <br>
				We are also able to issue referrals to our specialist network & offer repeat prescription requests <br>
				for your convenience.
				</p>
			</div>
			<div class="service-right">
				<img src="images/home/consult.jpg" id="service-image"/>
			</div>
		</div>

		<div class="home-doctors"> 
			<h1>Our Doctors</h1> 
			<!-- TODO : FETCH DOCTORS -->
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
			</div>
			<button class="primarybutton" onclick="location.href='doctors.php'" type="button">
				More..
			</button>
		</div>

		<div class="home-news">
			<div class="news-left">
				<h1>Latest News</h1>
				<p>
					Here is some latest update about NTUClinic and medical industry. <br/>
					Click on the photo on the right to find out more.
				</p>
			</div>
			<div class="news-right">
				<div class="news-photos">
					<img class="news-img"/>
					<img class="news-img"/>
					<img class="news-img"/>
					<img class="news-img"/>
				</div>
			</div>
		</div>

		<div class="home-small-banner">
			small banner
		</div>


		<div class="home-queries">
			<div class="queries-left">
				<img class="queries-img"/>
			</div>
			<div class="queries-right">
				<h1>Any queries?</h1>
				<form class="queries-form">
					<input placeholder="name"/>
					<input placeholder="name"/>
					<button type="submit">
						Send
					</button>
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
						<li><a href="patient/profile.php" id="botnav">Profile</a> </li>
						<li><a href="myappointment.php" id="botnav">Your Appointments</a> </li>
						<li><a href="patient/book/appt.php" id="botnav">Book Appointments</a> </li>
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
