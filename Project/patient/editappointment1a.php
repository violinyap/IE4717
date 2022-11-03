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
			<a href="myappointment.php" class="botnav">My Appointment</a>
			> Edit Appointment
			> <b>Step 1a</b>
		</div>
	<?php
	$apptID = $_POST['apptID'];
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
						$query = "SELECT * FROM clinics";
						// echo "<br>" .$query. "<br>";
						$result = $dbcnx->query($query);
						//echo "<input value='$apptID' name='apptID' type='hidden'/>";
						$c_id = array();
						if ($result->num_rows >0 )
						{
							while ($row = mysqli_fetch_assoc($result)){
							$clinic_name = $row['clinicname'];
							$clinic_id = $row['clinicid'];
							$c_id[] = $clinic_id; 
							//print_r($c_id); echo "<br>";
							$c_name[] = $clinic_name;
							//print_r($c_name); echo "<br>";
							}
						}
	?>
	<div class="maincontainer">
		<div class="leftform">
		<form method="post" action="editappointment1b.php" id="appointmentform">
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
				<input type="radio" value="'.$c_id[$i].'" id="clinic_'.$c_id[$i].'" name="location" onInput="getlocation()" checked>
				<span>'.$c_name[$i].'</span></label>
				</td></tr>
				<tr style="height:25px;"><td colspan="2"></td></tr>
				';
				}
				else {
				echo '
				<tr><td colspan="2">
				<label for="clinic_'.$c_id[$i].'">
				<input type="radio" value="'.$c_id[$i].'" id="clinic_'.$c_id[$i].'" name="location" onInput="getlocation()" required>
				<span>'.$c_name[$i].'</span></label>
				</td></tr>
				<tr style="height:25px;"><td colspan="2"></td></tr>
				';
				}
			}
			$dbcnx->close();
			?>
			<tr>
			<td>
			<input type="submit" value="Previous" class="primarybutton" id="nextBtn" formaction="editappointment.php"></input></td>
			<td>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="doctor" value='<?php echo "$doctor"; ?>'></input>
			<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input value='<?php echo $apptID; ?>' name='apptID' type='hidden'/>
			<input type="submit" value="Next" class="darkbluebutton" id="nextBtn"></input></td>
			</tr>
			</table>
		</form>
		</div>
		<div class="rightside" style="float-right; padding-top: 25px;">
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
