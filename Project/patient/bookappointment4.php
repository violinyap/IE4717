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
		<b>Step 2a > </b>
		<b>Step 2b > </b>
		<b>Step 3 > </b>
		Step 4
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
	?>
		<form method="post" action="appointmentsuccessful.php" id="appointmentform">
			<table style="width:550px;">
			<th style="text-align: left;">Step 4:</th>
			<tr><td colspan='2'>Make your payment. </td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr><td colspan='2'>A payment of <b><u>$5.00</u></b> booking fee is required to confirm this appointment.
			<br>Proceed by clicking the 'pay' button.<br><br>
			<br>Or press 'cancel' if you want to make payment later.
			<br><i>Note: Appointment(s) will only be saved for an hour before deletion.</i>
			</td></tr>
			<tr style="height:450px;"><td></td></tr>
			<tr>
			<td style="width: 250px;align-items: center;">
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Pay" id="nextBtn"></input><br><br>
			</td>
			<td style="width: 250px;align-items: center;">
			<input type="submit" formaction="appointmentunsuccessful.php" id="nextBtn" value="Cancel"></input><br><br>
			<input type="hidden" name="button_pressed" value="1" />
			</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
	<?php include "../footer.php";?>
</div>
</body>