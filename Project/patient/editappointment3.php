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
			> Step 2a
			> Step 2b
			> <b>Step 3</b>
			
		</div>
	<div class="maincontainer">
		<div class="leftform">
		<form method="post" action="saveappointment.php" id="appointmentform">
		<?php
		include "../methods/dbconnect.php";
		$apptID = $_POST['apptID'];
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
		$time = $_POST['timeslot'];
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
		<table style="width:500px;"> 
			<th style="text-align:left; ">Step 3:</th>
			<tr><td colspan="2">Check your selection below.<br>
			<br>Go previous pages if you want to make changes to your selection.
			<br>If all information is correct, click 'Save Changes' to proceed.
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
			<tr style="height:50px;"><td colspan="2"><br></td></tr>
			<tr>
				<td>
				<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
				<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
				<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
				<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
				<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
				<input value='<?php echo $apptID; ?>' name='apptID' type='hidden'/>
				<input type="submit" value="Previous" class="primarybutton" formaction="editappointment2b.php" id="nextBtn"></input>
				</td>
				<td style="float:right;">
				<input type="submit" value="Save Changes" id="nextBtn" class="darkbluebutton"></input>
				</td>
			</tr>
			<tr style="height:50px;"><td colspan="2"><br></td></tr>

		</table>
		</form>
		</div>
		<div class="rightform">
		<?php include "../methods/getAppointment.php"; ?>
		</div>
	</div>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
