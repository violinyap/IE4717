<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./contact.css" />
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
					echo "<a href='patient/profile.php' id='headerprofile'>";
					echo "<img src='images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"login.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
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
		<div class="contact-banner">
			<h1>Contact Us</h1>
		</div>

		<div class="home-queries">
			<div class="queries-left">
				<div id="leftcolumn">
					<div id="footerlogo">
						<img src="images/cliniclogo.png" width="38" height="38" id="icon" /> 
						<h2>NTUClinic</h2>
					</div>
						<p>55 Ubi Ave 1 #08-01 Singapore 408935
						<br>Fax: 6590 4389
						<br>Opens Monday to Friday, 8:30am to
						<br>6:00pm, except Public Holidays 
						</p>
				</div>
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

		<div class="home-services">
			<div class="service-left">
				<img src="images/home/consult.jpg" id="service-image"/>
			</div>
			<div class="service-right">
				<h1>Locations</h1>
				<div class="locations-box">
					<div class="locations-text">
						<h2>Location 1</h2>
						<p>here is location 1 ksldjlaksj </p>
					</div>
					<div class="locations-img">
						<img />
					</div>
				</div>
				<div class="locations-box">
					<div class="locations-img">
						<img />
					</div>
					<div class="locations-text">
						<h2>Location 2</h2>
						<p>here is location 2 ksldjlaksj </p>
					</div>
				</div>
				<div class="locations-box">
					<div class="locations-text">
						<h2>Location 3</h2>
						<p>here is location 3 ksldjlaksj </p>
					</div>
					<div class="locations-img">
						<img />
					</div>
				</div>
			</div>
		</div>
		

	</div>
		

	<?php include "footer.php";?>
</div>
</body>
