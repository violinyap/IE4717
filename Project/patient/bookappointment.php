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
	<div id="appointmentnav">
	<dt>
		<b>Make An Appointment</b>
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
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
	<table>
		<th style="float:left;font-size:24px;">Start booking an apppointment?</th>
		<tr style="height:25px;"><td></tr></td>
		<tr><td>Follow the instructions for step 1 to 4 for a smooth process.</td></tr>
		<tr style="height:25px;"><td></tr></td>
		<tr><td><i>Note: <b><u>$5</u></b> payment for booking an appointment is required.</i></td></tr>
		<tr style="height:25px;"><td></tr></td>
		<tr><td>View <a href="doctors.php" id="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>
		<tr style="height:25px;"><td></tr></td>
		<tr><td>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input>
		</td></tr>
	</table>
	</form>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
