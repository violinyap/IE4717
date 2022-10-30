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
		<b>My Appointment</b> &nbsp; > &nbsp;<a href="editappointment.php" id="botnav">Edit Appointment</a>
	</dt>
	</div>
	<div class="maincontainer">
			
			<div class="rightside">
				<div class="leftside">
				<?php include "../methods/getAppointment.php" ?>
				</div>
		<form method="post" action="editappointment2b.php" id="appointmentform">
			
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
			 <input type="date" name="date" id="date" oninput="getDate()" required />
			</td></tr>
			<tr style="height:400px;"><td></td></tr>
			<tr><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn"></input>
			</td></tr>
			</table>
		</form>	
			</div>
			
		
	</div>
	</div>
	</div>
	<?php include "../footer.php";?>
	<script>
		var today = new Date();
		today = new Date(today.setDate(today.getDate() + 2))
			.toISOString()
			.split("T")[0];
		document.getElementsByName("date")[0].setAttribute("min", today);


	</script>
</div>
</body>
