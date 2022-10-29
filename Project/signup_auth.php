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
        <?php // register.php
          include "methods/dbconnect.php";


          if (isset($_POST['submit'])) {
            if (empty($_POST['email']) || empty ($_POST['pass'])
              || empty ($_POST['cpass']) ) { // TODO: ADD ALL EMPTY
            echo "All records to be filled in";
            exit;}
            }
          $email = $_POST['email'];
          $password = $_POST['pass'];
          $password2 = $_POST['cpass'];
          $name =  $_POST['name'];
          $image =  $_POST['image'];
          $contact =  $_POST['contact'];
          $nric =  $_POST['nric'];
          $bday =  $_POST['bday'];
          date_default_timezone_set("Asia/Singapore");
          $signupdate = date("Y-m-d");

          if ($password != $password2) {
            echo "Sorry passwords do not match";
            exit;
          }

          $password = md5($password);
          $sql = "INSERT INTO Patients (name,	contact, image,	nric,	signupdate,	birthday,	email,	password) 
              VALUES ('$name',	'$contact', 'img',	'$nric',	'$signupdate',	'$bday',	'$email',	'$password')";
            // echo "<br>". $sql. "<br>";
          $result = $dbcnx->query($sql);


          if (!$result) 
            echo "Your query failed.";
          else
            echo "<h3>Welcome ". $name . ". You are now registered </h3>";
            echo "<a class=\"login-buttons\" href=\"login.html\">
                    <button class=\"primarybutton\">
                      Login
                    </button>
                  </a>";
            
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
						<li><a href="patient/profile.php" id="botnav">Profile</a> </li>
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
