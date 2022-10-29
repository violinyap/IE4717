<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./doctors.css" />
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
		<div class="doctors-banner">
			<h1>Our Doctors</h1>
		</div>

    <div class="doctors-section">
      <a href="./doctors/1.php">
        <div class="doctor-card">
          <img class="doctor-card-img">
          <div class="doctor-card-text">
            <h2>Dr. Lim</h2>
            <p>Specialised in medicine</p>
          </div>
        </div>
      </a>
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
    
	</div>

	

	<?php include "footer.php";?>
</div>
</body>
