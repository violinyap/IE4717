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

	<?php include 'header.php'; ?>
	
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
			echo "<td><span id='name'>".$currentUserData['docname']."</span></td>";
			echo "</tr>";
		
			// EMAIL
			echo "<tr>";
			echo "<th class='profile-col'>Email:</th>";
			echo "<td><span id='email'>".$currentUserData['email']."</span></td>";
			echo "</tr>";

			// CONTACT
			echo "<tr>";
			echo "<th class='profile-col'>Contact:</th>";
			echo "<td><span id='contact'>".$currentUserData['contact']."</span></td>";
			echo "</tr>";

			// DESCRIPTION
			echo "<tr>";
			echo "<th class='profile-col'>Description:</th>";
			echo "<td><span id='desc'>".$currentUserData['description']."</span></td>";
			echo "</tr>";

			// CERT
			echo "<tr>";
			echo "<th class='profile-col'>Certificate Expiry:</th>";
			echo "<td><span id='cert'>".$currentUserData['certexp']."</span></td>";
			echo "</tr>";

			// JOIN DATE
			echo "<tr>";
			echo "<th class='profile-col'>Joined since:</th>";
			echo "<td><span id='signupdate'>".$currentUserData['joindate']."</span></td>";
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
