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
		Step 2b
	</dt>
	</div>
	<div class="maincontainer">
	<dt id="abcd">
	<?php include "../methods/dbconnect.php";
		$doctor = $_POST['doctor'];
		$location = $_POST['location'];
		$date = $_POST['date'];
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
			$time2 = $_POST['timeslot'];
		}
		else {
			$time2 = "";
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
		<div style="float:left; width: 800px;">
		<form method="post" action="bookappointment3.php" id="appointmentform">
			<?php
			echo "
			<table class='time-table'>
			<th style='text-align:left; padding-bottom:10px;'>Step 2b:
			<br><br>Select the available time slots as displayed below:</th>
			";
			$db = mysqli_connect('localhost', 'root', '');
			mysqli_select_db($db,'project');
			$sql=
			"SELECT doctor, date, time
			FROM appointments";
			$result = mysqli_query($db,$sql);
			$items = array();
			$items2 = array((strtotime("08:00")),(strtotime("09:00")), (strtotime("10:00")), (strtotime("11:00")),(strtotime("12:00")),(strtotime("13:00")),(strtotime("14:00")),(strtotime("15:00")), (strtotime("16:00")), (strtotime("17:00")));
			//$time2 = array("08:00");
			$firstTime = strtotime("08:00");
			$lastTime = strtotime("17:00");
			while ($row = mysqli_fetch_assoc($result)){
			if ( ($row['doctor'] == $doctor) && ($row['date'] == $date) ) {
			for ($i=$firstTime;$i<=$lastTime; $i+=3600) {
				$timeRetrieved= strtotime($row['time']);
				//$time = date("H:i" , $i);
				if ($timeRetrieved == $i)
				{
					$items[]=$i; //array $items[] contain occupied appointment slot
				}
			}
			}
			}
			$items3 = array();
			$items3 = array_diff($items2,$items);
			$time3 = array();
			$time3 = date("H:i" ,reset($items3));
			foreach($items3 as $items3){
			$time = date("H:i" , $items3);
			if ($time == $time2) {
			echo "
			<tr class='time-row'>
			<td colspan='2'>
			<p><input type='radio' value='". $time ."' name='timeslot' onInput='getTime();' checked>
			<label>" . $time . "</label><br></p>
			</td>
			</tr>
			";
			}
			else if ($time == $time3) {
			echo "
			<tr class='time-row'>
			<td colspan='2'>
			<p><input type='radio' value='". $time ."' name='timeslot' onInput='getTime();' checked>
			<label>" . $time . "</label><br></p>
			</td>
			</tr>
			";
			}
			else {
			echo "
			<tr class='time-row'>
			<td colspan='2'>
			<p><input type='radio' value='". $time ."' name='timeslot' onInput='getTime();' required>
			<label>" . $time . "</label><br></p>
			</td>
			</tr>
			";
			}
			}
			if (empty($items3)) {
			echo "
			<tr><td colspan='2'>All slots occupied! Go previous pages to change selection.
			<br>Or press 'restart to start from beginning again.
			<br>Please check <a href='doctors.php' id='botnav'>'Our Doctors'</a> page for their available schedule.
			</td></tr>
			<tr style='height:500px;'><td colspan='2'></td></tr>
			<tr><td>
			<input type='hidden' name='date' value='" .$date. "'></input>
			<input type='hidden' name='location' value='" .$location. "'></input>
			<input type='hidden' name='doctor' value='" .$doctor. "'></input>
			<input type='hidden' name='doctor2' value='" .$doctor2. "'></input>
			<input type='submit' value='Previous' formaction='bookappointment2a.php' id='nextBtn'></input>
			</td>
			<td>
			<input type='submit' value='Restart' formaction='bookappointment.php' id='nextBtn'></input>
			</td></tr>
			";
			}
			else {
			echo "
			<tr style='height:25px;'><td colspan='2'></td></tr>
			<tr><td>
			<input type='hidden' name='date' value='" .$date. "'></input>
			<input type='hidden' name='location' value='" .$location. "'></input>
			<input type='hidden' name='doctor' value='" .$doctor. "'></input>
			<input type='hidden' name='doctor2' value='" .$doctor2. "'></input>
			<input type='submit' value='Previous' formaction='bookappointment2a.php' id='nextBtn'></input>
			</td>
			<td>
			<input type='submit' value='Next' id='nextBtn'></input>
			</td></tr>
			";
			}
			$result->free();
			$db->close();
			echo "</table>";
			?>
		</form>
	</div>
	<div style="float:right; background-color: white; padding-top: 20px; width: 350px;">
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
	<?php
			if ($location == 1) {$j=2;} else {$j=3;}
			for ($i=0;$i<$j;$i+=1) {
				if ($doctor == $d_id[$i]) {
					$doctor2 = $d_name[$i];
				}
			}
		echo $doctor2;
	?>
	</td></tr>
	<tr><td colspan="2" style="height:25px;"></td></tr>
	<tr><th style="text-align:right;"> Date: </th>
	<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
	<?php
		echo $date;
	?>
	</td></tr>
	<tr><td colspan="2" style="height:25px;"></td></tr>
	<tr><th style="text-align:right;"> Time: </th>
	<td style="width:200px; background-color: #D9D9D9; border: 1px solid black;text-align:center;"> 
	<span id="time">
	<?php
	if ($time2 == "") {
		if (empty($items3)) {echo "TBD";}
		else {
		echo $time3;}}
	else {
		if (empty($items3)) {echo "TBD";}
		else {
		echo $time2;}}
	?>
	</span>
	</td></tr>
	</table>
	</div>
	<script type="text/javascript" src="bookappointment.js"></script>
	</div>
	</div>
	<?php include "footer.php";?>
</div>
</body>
