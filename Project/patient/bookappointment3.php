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
		Step 3
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
		<form method="post" action="bookappointment4.php" id="appointmentform">
			<table style="width:500px;"> 
			<th style="text-align:left; ">Step 3:</th>
			<tr><td colspan="2">Check your selection below.<br>
			<br>Click 'Change' if you want to make changes to your selection.
			<br>If all information is correct, click 'Next' to proceed to Payment.
			</td></tr>
			<tr style="height:50px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Location: </td>
				<td class="confirmation-column"><span id="location">
					<?php 
						include "../methods/dbconnect.php";
						$query = "SELECT * FROM clinics WHERE clinicid='".$location."'";
						// echo "<br>" .$query. "<br>";
						$result = $dbcnx->query($query);
						if ($result->num_rows >0 )
						{
							while ($row = mysqli_fetch_assoc($result)){
								$clinic_name = $row['clinicname'];
								echo $clinic_name;
							}
						}
						$dbcnx->close();
					?>
				
				</span> </td>
			</tr>
			<tr style="height:35px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Doctor:  </td>
				<td class="confirmation-column"><span id="doctor">
				<?php 
						include "../methods/dbconnect.php";
						$query = "SELECT * FROM doctors WHERE doctorid='".$doctor."'";
						// echo "<br>" .$query. "<br>";
						$result = $dbcnx->query($query);
						if ($result->num_rows >0 )
						{
							while ($row = mysqli_fetch_assoc($result)){
								$doctor_name = $row['docname'];
								echo $doctor_name;
							}
						}
						$dbcnx->close();
					?>
			</span></td>
			</tr>
			<tr style="height:35px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Date: </td>
				<td class="confirmation-column"><span id="date"><?php echo $date;?></span></td>
			</tr>
			<tr style="height:35px;"><td colspan="2"></td></tr>
			<tr>
				<td style="font-size:30px;width:200px;">Time: </td>
				<td class="confirmation-column"><span id="time"><?php echo $time;?></span></td>
			</tr>
			<tr style="height:200px;"><td colspan="2"><br></td></tr>
			<tr>
				<td>
				<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
				<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
				<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
				<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
				<input type="submit" value="Next" id="nextBtn"></input>
				</td>
				<td>
				<a href="bookappointment1a.php" id="cancelButton">Change</a>
				</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>