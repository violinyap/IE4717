<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel='stylesheet' href="./profile.css" />
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
					echo "<form method=\"post\" action=\"login.php\" ><button class=\"profiledrop\" type=\"submit\">V</button></form>";
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
		<a href="profile.php" id="botnav">My Profile</a>
		&nbsp;
	</div>
	
	<div class="maincontainer">
	<dt id="abcd">
	<table class="profile-table">
		<?php 
			include '../methods/getUserData.php';
			
			// NAME
			echo "<tr>";
			echo "<td rowspan='7' style='vertical-align: top; margin: auto'><img src='../images/profile.png' width='75' height='75'></td>";
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
	<?php include "../footer.php";?>
</div>
</body>
