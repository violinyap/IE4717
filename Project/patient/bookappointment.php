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
	<div style="float:left; width: 800px;">
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
			<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input>
		</td></tr>
	</table>
	</form>
	</div>
		<div style="float:right; background-color: white; padding-top: 20px; width: 350px;">
		<table style="border:1px solid black;">
		<th>Options Selected:</th>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Location: </th>
		<td style="width:200px;background-color: #D9D9D9; border: 1px solid black;text-align:center;">
		<?php
			if ($location == "") {
			echo "TBD";}
			else {
			if ($location == 1) {
			echo "NTU Clinic Fullerton";}
			else {echo "NTU Clinic Raffles";}
			}
		?>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Doctor: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<?php
			if ($doctor == "") {
			echo "TBD";}
			else {echo $doctor2;}
		?>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Date: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<span id="date_show">
		<?php
			if ($date == "") {
			echo "TBD";}
			else {echo $date;}
		?>
		</span>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Time: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<?php
			if ($time == "") {
			echo "TBD";}
			else {echo $time;}
		?>
		</td></tr>
		</table>
		</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
