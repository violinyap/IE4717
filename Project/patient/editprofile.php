<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel='stylesheet' href="./profile.css" />
</head>

<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div class="leftcontent">
	<div class="breadcrumb">
    <a href="profile.php" class="botnav">
    <b>My Profile</b> 
    </a>
    &nbsp;>&nbsp;
    <a href="editprofile.php" class="botnav">Edit Profile</a>
  </div>
	<div class="maincontainer">
		<h3> <b>Fill the required fields and click change to confirm change.</b></h3>
		<form method="post" action="editedprofile.php" id="form">
			<?php 
				include '../methods/getUserData.php';

				echo '<label for="fullname">*Name: </label>';
				echo '<input class="inputform" value="'.$currentUserData['name'].'" type="text" name="fullname" id="fullname" placeholder="Enter your full name here" required/>';
			
				echo '<br> <br> <br>';
				echo '<label for="myEmail">*E-mail: </label>';
				echo '<input class="inputform" value="'.$currentUserData['email'].'" type="email" name="myEmail" id="myEmail" placeholder="Enter your E-mail ID here" required />';

				echo '<br> <br> <br>';
				echo '<label for="contact">*Contact: </label>';
				echo '<input class="inputform" value="'.$currentUserData['contact'].'" type="tel" id="contact" name="contact" pattern="[0-9]{4}-[0-9]{4}" placeholder="9999-9999" required/>';
			?>
			
			<br> <br> <br>
			<input class="darkbluebutton" type="submit" value="Change" /> &nbsp; &nbsp; 
			<input class="primarybutton" type ="button" value="Cancel" onclick="history.back()" /> 
		</form>
	</div>
</div>
	</div>
	<?php include "footer.php";?>
</body>
