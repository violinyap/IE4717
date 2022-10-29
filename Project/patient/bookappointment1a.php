<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel="stylesheet" href="./bookappointment.css" />
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
		<?php // Show registered name
		if(!isset($_SESSION)) 
		{ 
			session_start(); 
		} 
        if (isset($_SESSION['valid_user']))
        { 
					echo "<a href='patient/profile.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo $_SESSION["valid_user"]; 
					echo "<form method=\"post\" action=\"logout.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
					echo "</a>";
				} 
        else { 
					echo "<a href='login.php' id='headerprofile'>";
					echo "<img src='../images/profile.png' width='38' height='38' class='icon'>";
					echo "Login / Signup"; 
					echo "</a>";
				}
      ?> 
	</header>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
	<dt>
		<b>Make An Appointment > </b>
		Step 1a
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
		<form method="post" action="bookappointment1b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 1a:</th>
			<tr><td>Select our locations.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>View <a href="doctors.html" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>Locations: </td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td><input type="radio" value="NTU Clinic Fullerton" id="Fullerton" name="location" onclick="ShowHideDiv()" onInput="getlocation()" checked='check'> 
			<label for="">NTU Clinic Fullerton</label>
			</td></tr>
			<tr style='height:10px;'><td></td></tr>
			<tr><td><input type="radio" value="NTU Clinic Raffles" id="Raffles" name="location" onclick="ShowHideDiv()" onInput="getlocation();"> 
			<label for="">NTU Clinic Raffles</label><br>
			</td></tr>
			<tr style="height:400px;"><td></td></tr>
			<tr><td><input type="submit" value="Next" id="nextBtn"></input>
			</td></tr>
			</table>
		</form>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>