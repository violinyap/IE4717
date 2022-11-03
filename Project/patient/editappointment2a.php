<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />

<link rel="stylesheet" href="./bookappointment.css" />
</head>
<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>
	<div class="leftcontent">
		<div class="breadcrumb">
			<a href="myappointment.php" class="botnav">My Appointment</a>
			> Edit Appointment
			> Step 1a
			> Step 1b
			> <b>Step 2a</b>
			
		</div>
	<?php
	$apptID = $_POST['apptID'];
	include "../methods/dbconnect.php";
	
		$doctor = $_POST['doctor'];
		if (!empty($_POST['location'])) {
			$location = $_POST['location'];
		}
		else {
			$location = "";
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
		$query = "SELECT * FROM doctors WHERE clinicid='".$location."'";
		$result = $dbcnx->query($query);
		if ($result->num_rows >0 )
		{
			while ($row = mysqli_fetch_assoc($result)){
			$doctor_name = $row['docname'];
			$doctor_id = $row['doctorid'];
			$d_id[] = $doctor_id;
			$d_name[] = $doctor_name;
			}
		}
	?>
	<div class="maincontainer">
		<div class="leftform">
		<form method="post" action="editappointment2b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 2a:</th>
			<tr><td colspan='2'><b>Select the available dates as displayed below:</b></td></tr>
			<tr style="height:25px;"><td colspan='2'></td>
			<tr><td colspan='2'><i> Note: Appointment(s) can only be booked for the next day. We reserve the right to cancel
			<br>the appointment <b>without prior notice</b>,  your refund will be made to bank account and a
			<br>message will be send to your<u> registered email address</u></i>. </td></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr><td colspan='2'>Choose available dates below.</td></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr><td colspan='2'>
			 <label for="appointmentdate">*Date:</label>
			 <input type="date" name="date" id="date" value="<?php echo $date; ?>" onInput="getDate()" required />
			</td></tr>
			<tr><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input value='<?php echo $apptID; ?>' name='apptID' type='hidden'/>
			<input type="submit" value="Previous" class="primarybutton" formaction="editappointment1b.php" id="nextBtn"></input>
			</td>
			<td>
			<input type="submit" value="Next" class="darkbluebutton" id="nextBtn"></input>
			</td></tr>
			</table>
		</form>
		</div>
		<div class="rightform">
		<?php include "../methods/getAppointment.php"; ?>
		</div>
		<script type="text/javascript" src="bookappointment.js"></script>
	</div>
	</div>
	</div>
		</div>
	<?php include "footer.php";?>
</div>
</body>
