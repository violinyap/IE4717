<!DOCTYPE html>
<html lang="en">
<head>
	<title>NTUClinic</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="./login.css" />
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
		<div class="login-banner">
			<div class="login-container">
        <h1>Signup</h1>
        <form class="login-form" action="signup_auth.php" method="post">
					<label for="email">Email*</label>
					<input type="email" class="login-input" id="email" name="email" placeholder="example@email.com" required>
					<label for="pass">Password*</label>
          <input class="login-input" type="password" id="pass" name="pass" placeholder="Password" required/>
					<label for="cpass">Confirm Password*</label>
          <input class="login-input" type="password" id="cpass" name="cpass" placeholder="Password" required/>
					<label for="name">Name*</label>
					<input type="text" class="login-input" id="name" name="name" placeholder="Your name" required>
					<label for="name">Image*</label>
					<input type="file" class="login-input" id="image" name="image" placeholder="Your photo" required>
					<label for="contact">Contact*</label>
          <input class="login-input" type="tel" id="contact" name="contact" pattern="[0-9]{4}-[0-9]{4}" placeholder="9999-9999" required/>
					<label for="nric">NRIC*</label>
					<input type="text" class="login-input" id="nric" name="nric" placeholder="NRIC" required>
					<label for="bday">Birthday*</label>
					<input type="date" class="login-input" id="bday" name="bday" placeholder="Birthday" required>
          <div class="login-buttons">
            <a href="login.html">Already have an account? Login here</a>
            <button class="primarybutton">
              Signup
            </button>
          </div>
        </form>
      </div>
		</div>


	</div>
		

	<?php include "footer.php";?>
</div>
</body>
