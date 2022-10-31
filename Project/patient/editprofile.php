<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />
<link rel='stylesheet' href="./profile.css" />
<style>
#maincontainer{
  background-color: #FFFFFF;
  position: absolute;
  top: 175px;
  left: 350px;
  height: 450px;
  width: 1200px;
}
#abcd{
  padding-top: 20px;
  padding-left: 20px;
}
#form{
  padding-top: 20px;
  padding-left: 50px;
}
</style>
<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div id="appointmentnav">
	<dt>
		<b>My Profile</b> &nbsp;
		>&nbsp;
		<a href="editprofile.php" class="botnav">Edit Profile</a>
	</dt>
	</div>
	<div id="maincontainer">
		<dt id="abcd"> <b>Fill the required fields and click change to confirm change.</b></dt>
		<br>
		<form method="post" action="editedprofile.php" id="form">
			<?php 
				include '../methods/getUserData.php';

				echo '<label for="fullname">*Name: </label>';
				echo '<input value="'.$currentUserData['name'].'" type="text" name="fullname" id="fullname" placeholder="Enter your full name here" required/>';
			
				echo '<br> <br> <br>';
				echo '<label for="myEmail">*E-mail: </label>';
				echo '<input value="'.$currentUserData['email'].'" type="email" name="myEmail" id="myEmail" placeholder="Enter your E-mail ID here" required />';

				echo '<br> <br> <br>';
				echo '<label for="contact">*Contact: </label>';
				echo '<input value="'.$currentUserData['contact'].'" type="tel" id="contact" name="contact" pattern="[0-9]{4}-[0-9]{4}" placeholder="9999-9999" required/>';
			?>
			
			<br> <br> <br>
			<input id="Change" type="submit" value="Change" /> &nbsp; &nbsp; 
			<input type ="button" value="Cancel" onclick="history.back()" /> 
		</form>
	</div>
	</div>
	<?php include "footer.php";?>
</body>
