<!DOCTYPE html>
<html lang="en">
<head>
<title>NTUClinic</title>
<meta charset="utf-8">
<link rel="stylesheet" href="../style.css" />
<link rel="stylesheet" href="./sidepanel.css" />

<link rel="stylesheet" href="./bookappointment.css" />
</head>
<script type="text/javascript" src="../methods/getPath.js"></script>
<body>
<div id="wrapper">
	<?php include 'header.php'; ?>
	
	<div id="bodycontent">
	<?php include "sidepanel.php"; ?>

	<div class="leftcontent">
		<div class="breadcrumb">
			<a href="profile.php" class="botnav">Make An Appointment</a>
			><b>	Step 1a</b>
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
		$query = "SELECT * FROM clinics";
		$result = $dbcnx->query($query);
		$c_id = array();
		if ($result->num_rows >0 )
		{
			while ($row = mysqli_fetch_assoc($result)){
			$clinic_name = $row['clinicname'];
			$clinic_id = $row['clinicid'];
			$c_id[] = $clinic_id; 
			$c_name[] = $clinic_name;
			}
		}
	?>
		<div class="leftform">
		<form method="post" action="bookappointment1b.php" id="appointmentform">
			<table>
			<th style="float:left;">Step 1a:</th>
			<tr>
			<td colspan='2'>Select our locations.</td></tr>
			<tr style="height:25px;"><td></td></tr>
			<tr>
			<td colspan='2'>View <a href="javascript:getAbsolutePath('doctors.php','');" class="botnav"><i>'Our Doctors'</i></a> for their location, and available date and time slots.</td></tr>
			<tr style="height:25px;"><td colspan="2"></td></tr>
			<tr style="height:25px;text-align:left;"><th colspan="2">Locations:</th></tr>
			<tr>
			<td colspan='2' style="height:10px;"></td></tr>
			<?php 
			for ($i=0;$i<2;$i+=1) {
				if ($location == $c_id[$i]) {
				//echo $c_id[$i] ." ". $c_name[$i];
				echo '
				<tr><td colspan="2">
				<label for="clinic_'.$c_id[$i].'">
				<input type="radio" value="'.$c_id[$i].'" id="clinic_'.$c_id[$i].'" name="location" onInput="getlocation()"  checked>
				<span>'.$c_name[$i].'</span></label>
				</td></tr>
				<tr style="height:10px;"><td colspan="2"></td></tr>
				';
				}
				else {
				echo '
				<tr><td colspan="2">
				<label for="clinic_'.$c_id[$i].'">
				<input type="radio" value="'.$c_id[$i].'" id="clinic_'.$c_id[$i].'" name="location" onInput="getlocation()"   required>
				<span>'.$c_name[$i].'</span></label>
				</td></tr>
				<tr style="height:10px;"><td colspan="2"></td></tr>
				';
				}
			}
			$dbcnx->close();
			?>
			<tr>
			<td>
			<input type="submit" value="Previous" class="primarybutton" formaction="bookappointment.php" id="nextBtn"  class="primarybutton"></input></td>
			<td>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input type="submit" value="Next" id="nextBtn" class="darkbluebutton"></input></td>
			</tr>
			</table>
		</form>
		</div>
		<div class="rightform">
			<?php include "bookaptbox.php"?>
		</div>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
<script type="text/javascript" src="bookappointment.js"></script>
</body>
