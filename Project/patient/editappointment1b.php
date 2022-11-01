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
		<b>My Appointment</b> &nbsp; > &nbsp; Edit Appointment
	</dt>
	</div>
	<?php
	$apptID = $_POST['apptID'];
	include "../methods/dbconnect.php";
	
		$location = $_POST['location'];
				
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
	<div class="maincontainer">
		<div style="float:left; width: 700px; margin-top: 20px; margin-left:15px;">
		<form method="post" action="editappointment2a.php" id="appointmentform">
			<table>
			
			<th style="float:left;">Step 1b:</th>
			<tr><td colspan='2'>Select available doctors.</td></tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr><td colspan='2'><i>Note: Doctors available are subjected to a <u>first come first serve basis</u> and their<br>available schedule. </i></td></tr>
			</tr>
			<tr style="height:25px;"><td colspan='2'></td></tr>
			<tr style="height:25px;text-align:left;"><th colspan='2'>Doctors:</th></tr>
			<tr style="height:10px;"><td colspan='2'></td></tr>
			<?php
			if ($location == 1) {$j=2;} else {$j=3;}
			for ($i=0;$i<$j;$i+=1) {
				if ($doctor == $d_id[$i]) {
					echo "
					<tr><td colspan='2'><input type='radio' value='".$d_id[$i]."' name='doctor' onInput='getdoctor()' checked>
					";
					}
				else {
				echo "
				<tr><td colspan='2'><input type='radio' value='".$d_id[$i]."' name='doctor' onInput='getdoctor()' required>
				";
				}
				echo "
				<label>".$d_name[$i]."</label></td></tr>
				<tr style='height:10px;'><td colspan='2'></td></tr>
				";
			}
			if ($location == 1) {$j=2;} else {$j=3;}
			for ($i=0;$i<$j;$i+=1) {
				if ($doctor == ""){$doctor2="TBD";}
				else if ($doctor == $d_id[$i]) {
					$doctor2 = $d_name[$i];
				}
			}
				$dbcnx->close();
		?>
		
			<tr style="height:370px;"><td colspan='2'></td></tr> 
			<tr height="35px"><td>
			<input type="hidden" name="location" value='<?php echo "$location"; ?>'></input>
			<input type="hidden" name="doctor2" value='<?php echo "$doctor2"; ?>'></input>
			<input type="hidden" name="date" value='<?php echo "$date";?>'></input>
			<input type="hidden" name="timeslot" value='<?php echo "$time"; ?>'></input>
			<input value='<?php echo $apptID; ?>' name='apptID' type='hidden'/>
			<input type="submit" value="Previous" formaction="editappointment1a.php" id="nextBtn"></input></td>
			<td><input type="submit" value="Next" id="nextBtn"></input></td>
			</tr>
			<!-- <input value="Back" id="nextBtn" onclick></input></td></tr> -->
			</table>
		</form>
		</div>
		<div style="float:right; padding-top: 20px;">
		<?php include "../methods/getAppointment.php"; ?>
		<table style="border:1px solid black;">
		<th>Options Selected:</th>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Location: </th>
		<td style="width:200px;background-color: #D9D9D9; border: 1px solid black;text-align:center;">
		<?php 
		if ($location == 1) {
			echo "NTU Clinic Fullerton";}
		else {echo "NTU Clinic Raffles";}
		?>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Doctor: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<span id="doctor">
			<?php
			echo $doctor2;
			?>
		</span>
		</td></tr>
		<tr><td colspan="2" style="height:25px;"></td></tr>
		<tr><th style="text-align:right;"> Date: </th>
		<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
		<?php
			if ($date == "") {
			echo "TBD";}
			else {echo $date;}
		?>
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
		<script type="text/javascript" src="bookappointment.js"></script>
	</div>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
