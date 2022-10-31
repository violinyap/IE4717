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
		<b>Make An Appointment > </b>
		<b>Step 1a > </b>
		<b>Step 1b > </b>
		Step 2a
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
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
		<form method="post" action="bookappointment2b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 2a:</th>
			<tr><td><b>Select the available dates as displayed below:</b></td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td><i> Note: Appointment(s) can only be booked for the next day.
			<br>We reserve the right to cancel the appointment <b>without prior notice</b>, refund will be made to your
			<br>bank account and a message will be send to your <u>registered email address</u></i>. </td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>Choose available dates below.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td>
			 <label for="appointmentdate">*Date:</label>
			 <input type="date" name="date" id="date" value="<?php echo $date; ?>" required />
			</td></tr>
			<tr style="height:400px;"><td></td></tr>
			<tr><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Previous" formaction="bookappointment1b.php" id="nextBtn"></input>
			</td>
			<td>
			<input type="submit" value="Next" id="nextBtn"></input>
			</td></tr>
			</table>
		</form>	
	<script type="text/javascript" src="bookappointment.js"></script>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
