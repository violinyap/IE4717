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
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>

	<div class="leftcontent">
		<div class="breadcrumb">
			<a href="profile.php" class="botnav">Make An Appointment</a>
		</div>
		<div class="maincontainer">
		<?php 
			include "../methods/dbconnect.php";
					
				if (!empty($_POST['location'])) {
					$location = $_POST['location'];
				}
				else {
					$location = "";
				}
				if (!empty($_POST['doctor'])) {
					$doctor = $_POST['doctor'];
				}
				else {
					$doctor = "";
				}
				if (!empty($_POST['doctor2'])) {
					$doctor2 = $_POST['doctor2'];
				}
				else {
					$doctor2 = "";
				}
				if (!empty($_POST['date'])) {
					$date = $_POST['date'];
				}
				else {
					$date = "";
				}
				if (!empty($_POST['timeslot'])) {
					$time = $_POST['timeslot'];
				}
				else {
					$time = "";
				}
		?>
		<form method="post" action="bookappointment1a.php" id="appointmentform">
			<div class="leftform">
			<table>
				<h3>Start booking an apppointment?</h3>
				<tr><td>Follow the instructions for step 1 to 4 for a smooth process.</td></tr>
				<tr><td><i>Note: <b><u>$5</u></b> payment for booking an appointment is required.</i></td></tr>
				<tr><td>View <a href="doctors.php" class="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>

				</table>
				<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
				<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
				<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
				<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
				<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
				<input type="submit" value="Next" class="darkbluebutton" id="nextBtn"></input>
			</div>
		</form>
		<div class="rightform">
			<?php include "bookaptbox.php"?>
		</div>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
