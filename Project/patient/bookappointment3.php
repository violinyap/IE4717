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
			<a href="profile.php" class="botnav">Make An Appointment</a>
			>	Step 1a
			>	Step 1b
			>	Step 2a
			>	Step 2b
			><b>	Step 3</b>
		</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php
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
	?>
		<form method="post" action="bookappointment4.php" id="appointmentform">
			<table style="width:500px;"> 
			<th style="text-align:left; ">Step 3:</th>
			<tr><td colspan="2">Check your selection below.<br>
			<br>Go previous pages if you want to make changes to your selection.
			<br>If all information is correct, click 'Book Appointment' to proceed.
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
				<input type="submit" value="Previous" class="primarybutton" formaction="bookappointment2b.php" id="nextBtn"></input>
				</td>
				<td style="float:right;"><input type="submit" value="Book Appointment" id="nextBtn" class="darkbluebutton" style="width:250px"></input>
				</td>
			</tr>
			</table>
		</form>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
